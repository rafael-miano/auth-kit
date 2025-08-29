<?php

namespace RafaelMiano\AuthKit\Livewire\Auth;

use Devrabiul\ToastMagic\Facades\ToastMagic;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    #[Rule('required|email')]
    public $email = '';

    #[Rule('required')]
    public $password = '';
    public $remember = false;
    public bool $passwordVisible = false;


    public function login()
    {

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            // After authenticating the user successfully
            ToastMagic::success("Success!", "Successfully logged in!");
            return redirect()->route('dashboard')->with('login_success', true);
        }

        $this->addError('email', 'Invalid credentials.');
    }

    public function render()
    {
        return view('auth-kit::auth.login')
            ->layout('auth-kit::layouts.auth', [
                'title' => 'Login'
            ]);
    }

}
