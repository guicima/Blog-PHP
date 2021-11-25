<?php
    class Route {

        public static $validRoutes = array();

        public static function set($route, $function)
        {
            self::$validRoutes[] = $route;

            if (SuperGet::get('url') == $route) {
                $function->__invoke();
            }
        }
    }
?>