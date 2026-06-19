<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Auth\Notifications\ResetPassword as BaseResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends BaseResetPassword
{
    use Queueable;

    public function toMail($notifiable): MailMessage
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->subject('Restablece tu contraseña')
            ->greeting('Hola, ' . ($notifiable->name ?? 'cliente'))
            ->line('Recibimos una solicitud para restablecer tu contraseña en ' . config('app.name') . '.')
            ->action('Crear nueva contraseña', $url)
            ->line('Este enlace es de un solo uso y vencerá automáticamente.')
            ->line('Si no solicitaste este cambio, puedes ignorar este correo.');
    }
}
