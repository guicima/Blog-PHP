<?php

class SuperCookie{

    public static function put($key, $value, $time = null) : void {
        setcookie($key, $value, $time ?? strtotime('+7 days'));
    }

    public static function get($key) : mixed {
        return (isset($_COOKIE[$key]) ? $_COOKIE[$key] : null);
    }

    public static function forget($key) : void {
        unset($_COOKIE[$key]);
        setcookie($key, '', 1);
    }

    public static function forgetAll() : void {
        foreach($_COOKIE as $key => $value){
            self::forget($key);
        }
    }

    public static function has($key) : bool {
        return isset($_COOKIE[$key]);
    }

    public static function getArray($key) : array {

        return self::has($key) ? json_decode(self::get($key)) : [];
    }
    
    public static function putArray($key, $value, $time = null) : void {
        $array = self::pullArray($key);
        $array[] = $value;
        self::put($key, json_encode($array), $time);
    }
    
    public static function pull($key) : mixed {
        $value = self::get($key);
        self::forget($key);
        return $value;
    }

    public static function pullArray($key) : array {
        $value = self::getArray($key);
        self::forget($key);
        return $value;
    }

}
