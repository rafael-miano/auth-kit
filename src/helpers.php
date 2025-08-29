<?php

use Illuminate\Support\Str;

if (!function_exists('user_avatar_url')) {
    /**
     * Generate a UI Avatars URL based on a name.
     *
     * @param string|null $name
     * @param string $background  Hex color without #
     * @param string $color       Hex color without #
     * @param int $size           Size in pixels (default: 64)
     * @return string
     */
    function user_avatar_url(?string $name, string $background = 'E5E7EB', string $color = '374151', int $size = 64): string
    {
        $name = $name ?: 'User';

        $initials = collect(explode(' ', $name))
            ->map(fn($part) => strtoupper(Str::substr($part, 0, 1)))
            ->join('');

        return "https://ui-avatars.com/api/?name={$initials}&background={$background}&color={$color}&size={$size}";
    }
}
