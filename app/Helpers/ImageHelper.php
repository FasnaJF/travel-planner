<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    /**
     * Get the full URL for an image stored in the public disk
     *
     * @param string $path The image path
     * @return string The full URL
     */
    public static function getImageUrl(string $path): string
    {
        // Ensure the path doesn't start with 'storage/' to avoid double storage prefix
        $path = ltrim($path, 'storage/');
        
        return Storage::url($path);
    }
    
    /**
     * Get the full URL for an image with fallback
     *
     * @param string|null $path The image path
     * @param string $fallback The fallback image path
     * @return string The full URL
     */
    public static function getImageUrlWithFallback(?string $path, string $fallback = '/images/placeholder.jpg'): string
    {
        if (empty($path)) {
            return asset($fallback);
        }
        
        return self::getImageUrl($path);
    }
}
