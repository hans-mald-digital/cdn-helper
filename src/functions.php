<?php

if (!function_exists('cdn')) {
    /**
     * @param string $path
     * @param string|null $dimensions
     * @param string|null $mode
     * @return string
     */
    function cdn(string $path, ?string $dimensions = null, ?string $mode = 'crop'): string
    {
        return new \CdnHelper\Url($path, $dimensions, $mode);
    }
}
