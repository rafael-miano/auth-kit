<div class="flex min-h-screen items-center justify-center bg-mute p-6 md:p-10" x-data="{ passwordVisible: false, eyeActive: false }">
    <div class="w-full max-w-sm md:max-w-3xl">
        <div class="flex flex-col gap-6">
            <div class="overflow-hidden rounded-lg shadow bg-white dark:bg-zinc-800 transition-colors duration-300">
                <div>
                    {{-- Login Form --}}
                    <form wire:submit.prevent="login" class="flex flex-col gap-4 p-6 md:p-8">
                        {{-- Heading --}}
                        <div class="text-center">
                            <h1 class="text-2xl font-bold text-zinc-900 dark:text-white transition-colors duration-300">
                                LOGIN</h1>
                            <p class="text-muted-foreground dark:text-zinc-300 transition-colors duration-300">Welcome
                                Back</p>
                        </div>

                        {{-- Email Field --}}
                        <div class="grid gap-2">
                            <label for="email"
                                class="text-sm font-medium text-zinc-800 dark:text-zinc-100 transition-colors duration-300">Email</label>
                            <x-auth-kit::text-input id="email" type="email" wire:model.defer="email"
                                placeholder="you@example.com"
                                class="mt-1 dark:bg-zinc-700 dark:text-white dark:border-zinc-600 transition-colors duration-300"
                                required />
                            @error('email')
                                <p class="text-red-500 dark:text-red-400 text-sm transition-colors duration-300">
                                    {{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Password Field --}}
                        <div class="grid gap-2">
                            <div class="flex items-center justify-between">
                                <label for="password"
                                    class="text-sm font-medium text-zinc-800 dark:text-zinc-100 transition-colors duration-300">Password</label>
                                <a wire:navigate href="{{ route('password.request') }}"
                                    class="text-sm text-muted-foreground dark:text-zinc-300 underline hover:text-primary dark:hover:text-primary-light transition-colors duration-300">
                                    Forgot Password?
                                </a>
                            </div>

                            <div x-data="{ passwordVisible: false }" class="relative">
                                <x-auth-kit::text-input id="password"
                                    x-bind:type="passwordVisible ? 'text' : 'password'" wire:model.defer="password"
                                    placeholder="Password"
                                    class="pr-10 dark:bg-zinc-700 dark:text-white dark:border-zinc-600 transition-colors duration-300"
                                    required />

                                <button type="button" @click="passwordVisible = !passwordVisible"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground dark:text-zinc-300 hover:text-primary dark:hover:text-primary-light focus:outline-none transition-colors duration-300"
                                    tabindex="-1" aria-label="Toggle password visibility">
                                    <x-heroicon-s-eye x-show="!passwordVisible" x-cloak class="w-5 h-5" />
                                    <x-heroicon-s-eye-slash x-show="passwordVisible" x-cloak class="w-5 h-5" />
                                </button>
                            </div>



                            @error('password')
                                <p class="text-red-500 dark:text-red-400 text-sm mt-1 transition-colors duration-300">
                                    {{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Remember Me --}}
                        <x-auth-kit::checkbox wire:model.defer="remember" label="Remember Me" name="remember"
                            class="border border-black dark:border-white dark:text-zinc-100" />


                        {{-- Submit Button --}}
                        <x-auth-kit::button type="submit"
                            class="flex items-center justify-center w-full px-3 py-2 rounded-md text-white text-sm font-medium shadow-[0px_4px_15px_-4px_#000] transition-all duration-300 hover:bg-neutral-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black disabled:opacity-50 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="login">Login</span>
                            <span wire:loading.inline wire:target="login">Logging in...</span>
                        </x-auth-kit::button>

                        {{-- Register Link --}}
                        <div
                            class="text-center text-sm text-muted-foreground dark:text-zinc-300 transition-colors duration-300">
                            Don't have an account?
                            <a wire:navigate href="{{ route('register') }}"
                                class="underline hover:text-primary dark:hover:text-primary-light transition-colors duration-300">
                                Sign up
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
