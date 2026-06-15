<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('perfil', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'numero_contacto' => ['nullable', 'string', 'max:20'],
            'current_password' => ['required_with:new_password', 'nullable', 'string'],
            'new_password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();
        $user->name = $validated['name'];
        $user->numero_contacto = $validated['numero_contacto'] ?? null;

        if (! empty($validated['new_password'])) {
            if (! Hash::check($validated['current_password'] ?? '', $user->password)) {
                return back()->withErrors(['current_password' => 'La contraseña actual no coincide.'])->withInput();
            }

            $user->password = Hash::make($validated['new_password']);
        }

        $user->save();

        return back()->with('success', 'Perfil actualizado ✅');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string'],
        ]);

        $user = Auth::user();

        if (! Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'La contraseña no coincide.']);
        }

        DB::transaction(function () use ($user) {
            $user->orders()->delete();
            $user->delete();
        });

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Cuenta eliminada correctamente.');
    }
}
