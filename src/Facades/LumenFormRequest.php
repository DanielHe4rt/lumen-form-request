<?php

namespace danielhe4rt\LumenFormRequest\Facades;

use Illuminate\Support\Facades\Facade;

class LumenFormRequest extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lumenformrequest';
    }
}
