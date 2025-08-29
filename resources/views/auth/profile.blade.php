<div class="max-w-4xl mx-auto p-0 bg-transparent">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Update Profile -->
        <div
            class="bg-white dark:bg-zinc-800 rounded shadow p-6 flex flex-col justify-between min-h-[380px] transition-colors duration-300">
            <div>
                <h2 class="text-xl font-semibold mb-6 text-gray-800 dark:text-white">Profile</h2>

                @if (session()->has('success'))
                    <div
                        class="mb-4 p-2 bg-green-100 dark:bg-green-200/20 text-green-700 dark:text-green-400 rounded text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form wire:submit.prevent="updateProfile" class="space-y-4">
                    <div>
                        <label class="block text-xs mb-1 text-gray-500 dark:text-zinc-300">Name</label>
                        <x-auth-kit::text-input type="text" wire:model.defer="name" class="w-full" />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs mb-1 text-gray-500 dark:text-zinc-300">Email</label>
                        <x-auth-kit::text-input type="email" wire:model.defer="email" class="w-full" />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-auth-kit::button type="submit" class="w-full mt-2">Save</x-auth-kit::button>
                </form>
            </div>
        </div>

        <!-- Update Password & Delete Account -->
        <div
            class="bg-white dark:bg-zinc-800 rounded shadow p-6 flex flex-col justify-between min-h-[380px] transition-colors duration-300">
            <div>
                <h2 class="text-xl font-semibold mb-6 text-gray-800 dark:text-white">Password</h2>

                <form wire:submit.prevent="updatePassword" class="space-y-4" x-data="{ showCurrent: false, showNew: false, showConfirm: false }">
                    <div>
                        <label class="block text-xs mb-1 text-gray-500 dark:text-zinc-300">Current Password</label>
                        <div class="relative">
                            <x-auth-kit::text-input x-bind:type="showCurrent ? 'text' : 'password'" wire:model.defer="current_password"
                                class="w-full pr-10" />
                            <button type="button" @click="showCurrent = !showCurrent"
                                class="absolute inset-y-0 right-2 flex items-center text-gray-400 hover:text-gray-600 dark:text-zinc-400 dark:hover:text-white"
                                tabindex="-1">
                                <template x-if="showCurrent">
                                    <x-heroicon-s-eye-slash class="w-5 h-5" />
                                </template>
                                <template x-if="!showCurrent">
                                    <x-heroicon-s-eye class="w-5 h-5" />
                                </template>
                            </button>
                        </div>
                        @error('current_password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs mb-1 text-gray-500 dark:text-zinc-300">New Password</label>
                        <div class="relative">
                            <x-auth-kit::text-input x-bind:type="showNew ? 'text' : 'password'" wire:model.defer="new_password"
                                class="w-full pr-10" />
                            <button type="button" @click="showNew = !showNew"
                                class="absolute inset-y-0 right-2 flex items-center text-gray-400 hover:text-gray-600 dark:text-zinc-400 dark:hover:text-white"
                                tabindex="-1">
                                <template x-if="showNew">
                                    <x-heroicon-s-eye-slash class="w-5 h-5" />
                                </template>
                                <template x-if="!showNew">
                                    <x-heroicon-s-eye class="w-5 h-5" />
                                </template>
                            </button>
                        </div>
                        @error('new_password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs mb-1 text-gray-500 dark:text-zinc-300">Confirm New Password</label>
                        <div class="relative">
                            <x-auth-kit::text-input x-bind:type="showConfirm ? 'text' : 'password'" wire:model.defer="new_password_confirmation"
                                class="w-full pr-10" />
                            <button type="button" @click="showConfirm = !showConfirm"
                                class="absolute inset-y-0 right-2 flex items-center text-gray-400 hover:text-gray-600 dark:text-zinc-400 dark:hover:text-white"
                                tabindex="-1">
                                <template x-if="showConfirm">
                                    <x-heroicon-s-eye-slash class="w-5 h-5" />
                                </template>
                                <template x-if="!showConfirm">
                                    <x-heroicon-s-eye class="w-5 h-5" />
                                </template>
                            </button>
                        </div>
                    </div>

                    <x-auth-kit::button type="submit" class="w-full mt-2">Update Password</x-auth-kit::button>
                </form>
            </div>

            <!-- Danger Zone -->
            <div class="mt-8">
                <h3 class="text-xs uppercase font-bold text-red-500 mb-3 tracking-wide">Danger Zone</h3>
                <button wire:click="deleteAccount"
                    class="w-full bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-400 py-2 rounded hover:bg-red-100 dark:hover:bg-red-800 transition text-sm font-medium border border-red-200 dark:border-red-500/30">
                    Delete Account
                </button>
            </div>
        </div>

    </div>
</div>
