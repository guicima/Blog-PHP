<?php

class SuperGet{

    public static function put($key, $value) : void {
        $_GET[$key] = $value;
    }

    public static function get($key) : mixed {
        return (isset($_GET[$key]) ? $_GET[$key] : null);
    }

    public static function forget($key) : void {
        unset($_GET[$key]);
    }
}
