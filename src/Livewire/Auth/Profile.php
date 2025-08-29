<?php

namespace RafaelMiano\AuthKit\Livewire\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $name;
    public $email;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $user = auth()->user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        $user = auth()->user();
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Profile updated.');
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required|current_password',
            'new_password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = auth()->user();
        $user->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);

        session()->flash('success', 'Password updated.');
    }

    public function deleteAccount()
    {
        $user = auth()->user();
        Auth::logout();
        $user->delete();

        return redirect('/login');
    }

    public function render()
    {
        return view('auth-kit::auth.profile')
            ->layout('auth-kit::layouts.dashboard', [
                'title' => 'Update Profile'
            ]);
    }
}
