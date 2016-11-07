<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use File;

class WordPressServiceProvider extends ServiceProvider
{
    protected $bootstrapFilePath = __DIR__.'/../../../wp/wp-load.php';
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if(File::exists($this->bootstrapFilePath)) {
            require_once $this->bootstrapFilePath;
        } else throw new \RuntimeException('WordPress Bootstrap file not found!');
    }
}
