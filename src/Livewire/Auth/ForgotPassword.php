<?php

namespace RafaelMiano\AuthKit\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public $email = '';
    public $status;

    public function submit()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $this->status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($this->status === Password::RESET_LINK_SENT) {
            session()->flash('success', __($this->status));
        } else {
            $this->addError('email', __($this->status));
        }
    }

    public function render()
    {
        return view('auth-kit::auth.forgot-password')
            ->layout('auth-kit::layouts.auth', ['title' => 'Forgot Password']);
    }
}
