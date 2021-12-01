<?php

class LoginController extends Controller
{

    public static function Mount()
    {
        self::$page_title = 'Connexion';

        if (!(SuperPost::get('login') === null)) {
            $email = SuperPost::get('email');
            $password = SuperPost::get('password');
            AuthController::Login($email, $password);
        }
    }
}
