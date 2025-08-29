<?php

namespace RafaelMiano\AuthKit\Livewire\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use App\Models\User;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    public function render()
    {
        return view('auth-kit::auth.register')
            ->layout(
                'auth-kit::layouts.auth',
                [
                    'title' => 'Register'
                ]
            );
    }
}
