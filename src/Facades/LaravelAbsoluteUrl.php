<?php namespace Sukohi\LaravelAbsoluteUrl\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelAbsoluteUrl extends Facade {

    /**
    * Get the registered name of the component.
    *
    * @return string
    */
    protected static function getFacadeAccessor() { return 'laravel-absolute-url'; }

}