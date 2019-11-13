# mald/cdn-helper
CDN helper

- [Installation](#installation)
    - [Requirements](#requirements)
- [Testing](#testing)
## Installation

1. First install the helper with composer:

`composer require mald/cdn-helper`

2. Publish assets:

`php artisan vendor:publish --tag=mald-cdn-helper`

Add CDN_URL to the .env of the project with the correct url towards the cdn, for example:

CDN_URL=https://cdn.mald.digital

## Usage

Within our project you can use the cdn() helper function which accepts 3 parameters:

```php
<?php

if (!function_exists('cdn')) {
    function cdn(string $path, ?string $dimensions = null, ?string $mode = 'crop'): string
    {
        return new \CdnHelper\Url($path, $dimensions, $mode);
    }
}

```
## Testing

Run the tests with;

``./vendor/bin/phpunit``
