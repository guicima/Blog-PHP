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
                        $cryptostrong = true;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cryptostrong));
                        $user_id = self::query('SELECT id FROM users WHERE email=:email', array(':email' => $email))[0]['id'];
                        self::query('INSERT INTO auth VALUES (null, :token, :user_id)', array(':token' => hash('sha256', $token), ':user_id' => $user_id));
                        
                        setcookie('AuthToken', $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie('tokenrefresh', 1, time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                        echo 'logged in';
                        echo $token;
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