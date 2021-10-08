<?php

class LoginController extends Controller
{

    public static function Mount()
    {
        self::$page_title = 'Connexion';

        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $message = User::Login($email, $password);
            if ($message = "logged in") {
                header("Location: /dashboard");
                die();
            } else {
                self::$errors[] = $message;
            }
        }
    }
}
