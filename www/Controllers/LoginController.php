<?php

    class LoginController extends Controller 
    {
        
        public static function Mount()
        {
            self::$page_title = 'Connexion';

            if (isset($_POST['login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (self::query('SELECT email FROM users WHERE email=:email', array(':email' => $email))) {
                    if (password_verify($password, self::query('SELECT password FROM users WHERE email=:email', array(':email' => $email))[0]['password'])) {
                        echo 'logged in';
                    } else {
                        echo 'password incorrect';
                    }
                } else {
                    echo 'user do not exist';
                }
            }
        }

    }

?>