<?php

class SuperGet{

    public static function put($key, $value){
        $_GET[$key] = $value;
    }

    public static function get($key){
        return (isset($_GET[$key]) ? $_GET[$key] : null);
    }

    public static function forget($key){
        unset($_GET[$key]);
    }
}
