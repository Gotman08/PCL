<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Ajoutez ce use pour la classe Log
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        Log::info('Affichage de la vue d\'inscription');
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        Log::info('Demande d\'inscription reçue', $request->all());
        $validatedData = $request->validate([
            'FirstName' => ['required', 'string', 'max:50'],
            'LastName' => ['required', 'string', 'max:50'],
            'Email' => ['required', 'string', 'email', 'max:50', 'unique:users,Email'],
            'Password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Log::info('Données validées', $validatedData);

        $user = User::create([
            'FirstName' => $request->FirstName,
            'LastName' => $request->LastName,
            'Email' => $request->Email,
            'Password' => Hash::make($request->Password),
        ]);

        Log::info('Utilisateur créé', ['user_id' => $user->Id_User]);

        event(new Registered($user));

        Auth::login($user);

        Log::info('Utilisateur connecté', ['user_id' => $user->Id_User]);

        return redirect()->route('welcome');

    }
}
