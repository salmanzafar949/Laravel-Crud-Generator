<?php

namespace Salman\CrudGenerator;

use Illuminate\Support\ServiceProvider;
use Salman\CrudGenerator\Commands\CrudGenerator;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
           CrudGenerator::class,
        ]);
    }
}
