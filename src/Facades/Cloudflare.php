<?php

namespace Cloudflare\Facades;

use Illuminate\Support\Facades\Facade;

class Cloudflare extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'cloudflare';
    }
}
