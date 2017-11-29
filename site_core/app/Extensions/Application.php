<?php

namespace App\Extensions;

use Illuminate\Foundation\Application as LaravelApplication;

/**
 * Custom extension to override Laravel's default public folder location
 */
class Application extends LaravelApplication
{
    public function publicPath()
    {
        return $this->basePath().DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'public_html';
    }
}