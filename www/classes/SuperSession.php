<?php

class SuperSession{

    public static function put($key, $value) : void {
        $_SESSION[$key] = $value;
    }

    public static function get($key) : mixed {
        return (isset($_SESSION[$key]) ? $_SESSION[$key] : null);
    }

    public static function forget($key) : void{
        unset($_SESSION[$key]);
    }
}
