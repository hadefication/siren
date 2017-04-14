<?php

namespace Hadefication\Siren;

use Illuminate\Support\Facades\Facade;

class SirenFacade extends Facade
{
    /**
     * Get facade accessor
     *
     * @return string
     * @author hadefication
     */
    protected static function getFacadeAccessor()
    {
        return 'siren';
    }
}
