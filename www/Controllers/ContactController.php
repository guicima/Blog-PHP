<?php

    class ContactController extends Controller 
    {
        
        public static function test()
        {
            print_r(self::query("SELECT * FROM users"));
        }

    }

?>