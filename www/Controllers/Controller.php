<?php

    class Controller extends Database
    {
        public static $url;
        public static $page_title = '';
        public static $errors = [];
        public static $success = [];

        public static function LoadView(string $viewName) : void
        {   

            self::$url = $_GET['url'];
            static::Mount();

            require_once("./Views/partials/Head.php");
            require_once("./Views/partials/Header.php");
            
            require_once("./Views/$viewName.php");
            
            require_once("./Views/partials/Footer.php");
        }

        public static function isLoggedIn() : mixed
        {
            if (isset($_COOKIE['AuthToken'])) {
                if (self::query('SELECT user_id FROM auth WHERE token=:token', array(':token' => hash('sha256', $_COOKIE['AuthToken'])))) {
                    $user_id = self::query('SELECT user_id FROM auth WHERE token=:token', array(':token' => hash('sha256', $_COOKIE['AuthToken'])))[0]['user_id'];
                    $user = self::query('SELECT * FROM users WHERE id=:user_id', array(':user_id' => $user_id))[0];
                    if (isset($_COOKIE['tokenrefresh'])) {
                        return $user;
                    } else {
                        $cryptostrong = true;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cryptostrong));
                        self::query('INSERT INTO auth VALUES (null, :token, :user_id)', array(':token' => hash('sha256', $token), ':user_id' => $user_id));
                        self::query('DELETE FROM auth WHERE token=:token', array(':token' => hash('sha256', $_COOKIE['AuthToken'])));

                        setcookie('AuthToken', $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie('tokenrefresh', 1, time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                        return $user;
                    }
                }
            }
            return false;
        }
    }

?>