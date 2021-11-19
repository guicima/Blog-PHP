<?php

class LoginController extends Controller
{

    public static function Mount()
    {
        self::$page_title = 'Connexion';

        if (!is_null(SuperPost::get('login'))) {
            $email = SuperPost::get('email');
            $password = SuperPost::get('password');
            $message = AuthController::Login($email, $password);
            if ($message = "logged in") {
                header("Location: /dashboard");
                exit();
            } else {
                self::$errors[] = $message;
            }
        }
    }
}
