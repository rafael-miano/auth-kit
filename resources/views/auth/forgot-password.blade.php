{{-- Ensure this style is in your layout --}}
<style>[x-cloak] { display: none !important; }</style>

<div class="flex min-h-screen items-center justify-center bg-mute p-6 md:p-10">
    <div class="w-full max-w-sm md:max-w-md">
        <div class="flex flex-col gap-6">
            <div class="overflow-hidden rounded-lg shadow bg-white dark:bg-zinc-800 transition-colors duration-300">
                <form wire:submit.prevent="submit" class="flex flex-col gap-4 p-6 md:p-8">
                    
                    {{-- Back Link with Icon --}}
                    <a wire:navigate href="{{ route('login') }}"
                        class="flex items-center text-sm text-muted-foreground dark:text-zinc-300 hover:text-primary dark:hover:text-primary-light transition-colors duration-300 w-fit">
                        <x-heroicon-s-arrow-left class="w-4 h-4 mr-1" />
                        Back
                    </a>

                    {{-- Heading --}}
                    <div class="text-center">
                        <h2 class="text-2xl font-bold text-zinc-900 dark:text-white transition-colors duration-300">Forgot Password</h2>
                        <p class="text-sm text-muted-foreground dark:text-zinc-300 mt-1 transition-colors duration-300">
                            We'll send you a link to reset your password.
                        </p>
                    </div>

                    {{-- Success Message --}}
                    @if (session()->has('success'))
                        <div class="text-green-600 dark:text-green-400 text-sm text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Email --}}
                    <div class="grid gap-2">
                        <label for="email" class="text-sm font-medium text-zinc-800 dark:text-zinc-100 transition-colors duration-300">Email</label>
                        <x-auth-kit::text-input
                            wire:model.defer="email"
                            type="email"
                            id="email"
                            placeholder="Enter your email"
                            class="dark:bg-zinc-700 dark:text-white dark:border-zinc-600 transition-colors duration-300"
                        />
                        @error('email')
                            <p class="text-red-500 dark:text-red-400 text-sm transition-colors duration-300">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <x-auth-kit::button type="submit"
                        class="flex items-center justify-center w-full px-3 py-2 rounded-md text-white text-sm font-medium shadow-[0px_4px_15px_-4px_#000] transition-all duration-300 hover:bg-neutral-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black disabled:opacity-50 disabled:cursor-not-allowed">
                        Send Password Reset Link
                    </x-auth-kit::button>
                </form>
            </div>
        </div>
    </div>
</div>
