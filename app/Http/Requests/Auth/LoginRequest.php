<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class LoginRequest extends FormRequest
{
    // ...

    public function authorize(): bool
    {
        Log::info('Autorisation de la requête de login.');
        return true;
    }

    // ...

    public function authenticate(): void
    {
        Log::info('Début de l\'authentification.');


        // Vérification de la présence de l'utilisateur
        $user = User::where('Email', $this->input('Email'))->first();

        if ($user) {
            Log::info('Utilisateur trouvé en base de données.');
        } else {
            Log::info('Aucun utilisateur trouvé avec cet email.');
            throw ValidationException::withMessages([
                'Email' => trans('auth.failed'),
            ]);
        }

        $this->ensureIsNotRateLimited();

        // Vérification du mot de passe
        if (! Hash::check($this->input('Password'), $user->Password)) {
            Log::info('Échec de l\'authentification pour l\'email: ' . $this->input('Email'));
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'Password' => trans('auth.failed'),
            ]);
        }

        Auth::login($user, $this->boolean('remember'));

        Log::info('Authentification réussie.');
        RateLimiter::clear($this->throttleKey());

    }

    public function ensureIsNotRateLimited(): void
    {
        Log::info('Vérification du contrôle du taux.');
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            Log::info('La requête n\'est pas limitée par le contrôle du taux.');
            return;
        }

        Log::info('Requête limitée par le contrôle du taux.');
        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'Email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->input('Email')).'|'.$this->ip());
    }
}
