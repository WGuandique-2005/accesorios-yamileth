<?php

namespace Tests\Feature;

use App\Models\User;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_se_puede_solicitar_un_enlace_de_restablecimiento_por_correo(): void
    {
        Notification::fake();

        $user = User::factory()->create([
            'email' => 'cliente@example.com',
        ]);

        $this->get(route('password.request'))->assertOk();

        $this->post(route('password.email'), [
            'email' => $user->email,
        ])->assertRedirect()
            ->assertSessionHas('status');

        Notification::assertSentTo($user, ResetPasswordNotification::class);

        $this->assertDatabaseHas('password_reset_tokens', [
            'email' => $user->email,
        ]);
    }

    public function test_el_enlace_es_de_un_solo_uso_y_cierra_las_sesiones_previas(): void
    {
        Notification::fake();
        config(['session.driver' => 'database']);

        $user = User::factory()->create([
            'email' => 'cliente-reset@example.com',
            'password' => Hash::make('Password123'),
        ]);

        $this->post(route('password.email'), [
            'email' => $user->email,
        ])->assertRedirect()
            ->assertSessionHas('status');

        $token = null;

        Notification::assertSentTo($user, ResetPasswordNotification::class, function (ResetPasswordNotification $notification) use (&$token) {
            $token = $notification->token;

            return true;
        });

        $this->assertNotNull($token);

        DB::table('sessions')->insert([
            [
                'id' => 'old-session-1',
                'user_id' => $user->id,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Test Agent 1',
                'payload' => '',
                'last_activity' => now()->timestamp,
            ],
            [
                'id' => 'old-session-2',
                'user_id' => $user->id,
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Test Agent 2',
                'payload' => '',
                'last_activity' => now()->timestamp,
            ],
        ]);

        $this->post(route('password.update'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'NuevaClave123',
            'password_confirmation' => 'NuevaClave123',
        ])->assertRedirect('/home');

        $user->refresh();

        $this->assertTrue(Hash::check('NuevaClave123', $user->password));
        $this->assertAuthenticatedAs($user);
        $this->assertDatabaseMissing('password_reset_tokens', [
            'email' => $user->email,
        ]);
        $this->assertDatabaseMissing('sessions', [
            'id' => 'old-session-1',
        ]);
        $this->assertDatabaseMissing('sessions', [
            'id' => 'old-session-2',
        ]);
        $this->assertDatabaseHas('sessions', [
            'id' => session()->getId(),
            'user_id' => $user->id,
        ]);
    }
}
