<?php

    class Controller extends Database
    {

        public static function LoadView($viewName)
        {   
            require_once("./Views/partials/Head.php");
            require_once("./Views/partials/Header.php");
            
            require_once("./Views/$viewName.php");
            //static::test();
            
            require_once("./Views/partials/Footer.php");
        }
    }

?>