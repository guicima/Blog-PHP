<?php

class SuperPost{

    public static function put($key, $value) : void {
        $_POST[$key] = $value;
    }

    public static function get($key) : mixed {
        return (isset($_POST[$key]) ? $_POST[$key] : null);
    }

    public static function forget($key) : void {
        unset($_POST[$key]);
    }
}
