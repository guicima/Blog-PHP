<?php

    class Controller extends Database
    {
        public static $url;
        public static $page_title = '';

        public static function LoadView($viewName)
        {   

            self::$url = $_GET['url'];
            static::Mount();

            require_once("./Views/partials/Head.php");
            require_once("./Views/partials/Header.php");
            
            require_once("./Views/$viewName.php");
            
            require_once("./Views/partials/Footer.php");
        }
    }

?>