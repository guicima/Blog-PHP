<?php

class SuperCookie{

    public static function put($key, $value){
        $_COOKIE[$key] = $value;
    }

    public static function get($key){
        return (isset($_COOKIE[$key]) ? $_COOKIE[$key] : null);
    }

    public static function forget($key){
        unset($_COOKIE[$key]);
    }
}
