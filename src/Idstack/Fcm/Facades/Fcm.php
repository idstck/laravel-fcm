<?php
/**
 * Created by PhpStorm.
 * User: kiddie
 * Date: 11/18/17
 * Time: 9:38 PM
 */

namespace Idstack\Fcm\Facades;


use Illuminate\Support\Facades\Facade;

class Fcm extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'fcm';
    }
}