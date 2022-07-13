<?php

if (!function_exists('cdn')) {
    /**
     * @param string $path
     * @param string|null $dimensions
     * @param string|null $mode
     * @param string|null url
     * @return string
     */
    function cdn(string $path, ?string $dimensions = null, ?string $mode = 'crop', ?string $url = null): string
    {
        return new \CdnHelper\Url($path, $dimensions, $mode, $url);
    }
}
