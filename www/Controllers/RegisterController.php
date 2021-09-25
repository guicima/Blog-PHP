<?php

    class RegisterController extends Controller 
    {
        
        public static function Mount()
        {
            self::$page_title = 'S\'inscrire';
            
            if (isset($_POST['createaccount'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                if (!self::query('SELECT nickname FROM users WHERE nickname=:username', array(':username' => $username)) && !self::query('SELECT email FROM users WHERE email=:email', array(':email' => $email))) {

                    if (strlen($username) >= 3 && strlen($username) <= 32) {
                        if (preg_match('/[a-zZ-Z0-9_]+/', $username)) {
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                if (strlen($password) >= 8 && strlen($password) <= 32) {

                                    self::query('INSERT INTO users VALUE (null, :username, :email, :password, 0, null, null, null)', array(':username' => $username, ':password' => password_hash($password, PASSWORD_BCRYPT), ':email' => $email));
                                    echo 'success';

                                } else {
                                    echo 'invalid password';
                                }

                            } else {
                                echo 'invalid email';
                            }
                        } else {
                            echo 'invalid username';
                        }
                    } else {
                        echo 'invalid username';
                    }

                } else {
                    echo 'user already exists';
                }
            }
        }

    }

?>