<?php

namespace RafaelMiano\AuthKit;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AuthKitServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'auth-kit');

        Livewire::component('auth.login', \RafaelMiano\AuthKit\Livewire\Auth\Login::class);
        Livewire::component('auth.register', \RafaelMiano\AuthKit\Livewire\Auth\Register::class);
        Livewire::component('dashboard.index', \RafaelMiano\AuthKit\Livewire\Dashboard\Index::class);
        Livewire::component('auth.profile', \RafaelMiano\AuthKit\Livewire\Auth\Profile::class);

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/auth-kit'),
        ], 'authkit-views');

        if (is_dir(__DIR__ . '/../public')) {
            $this->publishes([
                __DIR__ . '/../public' => public_path('auth-kit'),
            ], 'authkit-assets');
        }

        if (file_exists(__DIR__ . '/../config/authkit.php')) {
            $this->publishes([
                __DIR__ . '/../config/authkit.php' => config_path('authkit.php'),
            ], 'authkit-config');
        }

        $publishPaths = [];

        if (is_dir(__DIR__ . '/../resources/views')) {
            $publishPaths += [__DIR__ . '/../resources/views' => resource_path('views/auth-kit')];
        }

        if (is_dir(__DIR__ . '/../public')) {
            $publishPaths += [__DIR__ . '/../public' => public_path('auth-kit')];
        }

        if (file_exists(__DIR__ . '/../config/authkit.php')) {
            $publishPaths += [__DIR__ . '/../config/authkit.php' => config_path('authkit.php')];
        }

        $this->publishes($publishPaths, 'authkit');
    }


    public function register()
    {
        if (file_exists(__DIR__ . '/../config/authkit.php')) {
            $this->mergeConfigFrom(__DIR__ . '/../config/authkit.php', 'authkit');
        }
    }
}
