
<div class="flex min-h-screen items-center justify-center bg-mute p-6 md:p-10"
     x-data="{ passwordVisible: false, confirmPasswordVisible: false }">
    <div class="w-full max-w-sm md:max-w-3xl">
        <div class="flex flex-col gap-6">
            <div class="overflow-hidden rounded-lg shadow bg-white dark:bg-zinc-800 transition-colors duration-300">
                <form wire:submit.prevent="register" class="flex flex-col gap-4 p-6 md:p-8">
                    {{-- Heading --}}
                    <div class="text-center">
                        <h2 class="text-2xl font-bold text-zinc-900 dark:text-white transition-colors duration-300">REGISTER</h2>
                        <p class="text-muted-foreground dark:text-zinc-300 transition-colors duration-300">Create your account</p>
                    </div>

                    {{-- Name --}}
                    <div class="grid gap-2">
                        <label class="text-sm font-medium text-zinc-800 dark:text-zinc-100 transition-colors duration-300">Name</label>
                        <x-auth-kit::text-input
                            wire:model.defer="name"
                            type="text"
                            placeholder="Your name"
                            class="mt-1 dark:bg-zinc-700 dark:text-white dark:border-zinc-600 transition-colors duration-300"
                        />
                        @error('name')
                            <p class="text-red-500 dark:text-red-400 text-sm transition-colors duration-300">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="grid gap-2">
                        <label class="text-sm font-medium text-zinc-800 dark:text-zinc-100 transition-colors duration-300">Email</label>
                        <x-auth-kit::text-input
                            wire:model.defer="email"
                            type="email"
                            placeholder="you@example.com"
                            class="mt-1 dark:bg-zinc-700 dark:text-white dark:border-zinc-600 transition-colors duration-300"
                        />
                        @error('email')
                            <p class="text-red-500 dark:text-red-400 text-sm transition-colors duration-300">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="grid gap-2">
                        <label class="text-sm font-medium text-zinc-800 dark:text-zinc-100 transition-colors duration-300">Password</label>
                        <div class="relative">
                            <x-auth-kit::text-input
                                id="password"
                                x-bind:type="passwordVisible ? 'text' : 'password'"
                                wire:model.defer="password"
                                placeholder="Password"
                                class="pr-10 dark:bg-zinc-700 dark:text-white dark:border-zinc-600 transition-colors duration-300"
                            />
                            <button type="button"
                                @click="passwordVisible = !passwordVisible"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground dark:text-zinc-300 hover:text-primary dark:hover:text-primary-light focus:outline-none transition-colors duration-300"
                                tabindex="-1">
                                <x-heroicon-s-eye x-show="!passwordVisible" x-cloak class="w-5 h-5" />
                                <x-heroicon-s-eye-slash x-show="passwordVisible" x-cloak class="w-5 h-5" />
                            </button>
                            @error('password')
                                <p class="text-red-500 dark:text-red-400 text-sm mt-1 transition-colors duration-300">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Confirm Password --}}
                    <div class="grid gap-2">
                        <label class="text-sm font-medium text-zinc-800 dark:text-zinc-100 transition-colors duration-300">Confirm Password</label>
                        <div class="relative">
                            <x-auth-kit::text-input
                                x-bind:type="confirmPasswordVisible ? 'text' : 'password'"
                                wire:model.defer="password_confirmation"
                                placeholder="Repeat password"
                                class="pr-10 dark:bg-zinc-700 dark:text-white dark:border-zinc-600 transition-colors duration-300"
                            />
                            <button type="button"
                                @click="confirmPasswordVisible = !confirmPasswordVisible"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-muted-foreground dark:text-zinc-300 hover:text-primary dark:hover:text-primary-light focus:outline-none transition-colors duration-300"
                                tabindex="-1">
                                <x-heroicon-s-eye x-show="!confirmPasswordVisible" x-cloak class="w-5 h-5" />
                                <x-heroicon-s-eye-slash x-show="confirmPasswordVisible" x-cloak class="w-5 h-5" />
                            </button>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <x-auth-kit::button type="submit"
                        class="flex items-center justify-center w-full px-3 py-2 rounded-md text-white text-sm font-medium shadow-[0px_4px_15px_-4px_#000] transition-all duration-300 hover:bg-neutral-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black disabled:opacity-50 disabled:cursor-not-allowed">
                        Register
                    </x-auth-kit::button>

                    {{-- Already have an account --}}
                    <div class="text-center text-sm text-muted-foreground dark:text-zinc-300 transition-colors duration-300">
                        Already have an account?
                        <a wire:navigate href="{{ route('login') }}" class="underline hover:text-primary dark:hover:text-primary-light transition-colors duration-300">
                            Login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
