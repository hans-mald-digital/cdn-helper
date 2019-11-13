<?php

namespace CdnHelper;

use Illuminate\Support\ServiceProvider;

class CdnHelperServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/cdn_helper.php' => config_path('cdn_helper.php'),
        ], 'mald-cdn-helper');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/cdn_helper.php', 'cdn_helper');
    }
}
