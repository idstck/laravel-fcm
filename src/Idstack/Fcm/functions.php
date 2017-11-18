<?php
/**
 * Created by PhpStorm.
 * User: kiddie
 * Date: 11/18/17
 * Time: 9:40 PM
 */

if (!function_exists('fcm')) {
    /**
     * Return app instance of Notify.
     *
     * @return Idstack\Fcm\FcmExc
     */
    function fcm() {
        return app('fcm');
    }
}