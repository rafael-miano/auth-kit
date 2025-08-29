<?php

namespace RafaelMiano\AuthKit\Livewire\Dashboard;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('auth-kit::dashboard.index')
            ->layout('auth-kit::layouts.dashboard', [
                'title' => 'Dashboard'
            ]);
    }
}
