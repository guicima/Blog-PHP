<?php

class AuthController extends Database
{

    public static function Login(String $email, String $password): String
    {
        if (self::query(
            'SELECT email FROM users WHERE email=:email', 
            array(':email' => $email)
        )) {

            if (password_verify(
                    $password, 
                    self::query(
                        'SELECT password FROM users WHERE email=:email', 
                        array(':email' => $email)
                    )[0]['password']
                )) {

                $cryptostrong = true;
                $token = bin2hex(openssl_random_pseudo_bytes(64, $cryptostrong));

                $user_id = self::query(
                    'SELECT id FROM users WHERE email=:email', 
                    array(':email' => $email)
                )[0]['id'];

                self::query(
                    'DELETE FROM auth WHERE user_id=:user_id', 
                    array(':user_id' => $user_id)
                );

                self::query(
                    'INSERT INTO auth VALUES (null, :token, :user_id)', 
                    array(
                        ':token' => hash('sha256', $token), 
                        ':user_id' => $user_id
                    )
                );

                setcookie('AuthToken', $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                setcookie('tokenrefresh', 1, time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                return 'logged in';
            } else {
                return 'Mot de passe incorrect';
            }
        } else {
            return 'Utilisateur n\'existe pas';
        }
    }

    public static function isLoggedIn(): mixed
    {
        if (!is_null(SuperCookie::get('AuthToken'))) {
            if (self::query('SELECT user_id FROM auth WHERE token=:token', array(':token' => hash('sha256', SuperCookie::get('AuthToken'))))) {

                $user_id = self::query(
                    'SELECT user_id FROM auth WHERE token=:token', 
                    array(
                        ':token' => hash('sha256', SuperCookie::get('AuthToken'))
                    )
                )[0]['user_id'];

                $user = self::query(
                    'SELECT * FROM users WHERE id=:user_id', 
                    array(':user_id' => $user_id)
                )[0];

                if (!is_null(SuperCookie::get('tokenrefresh'))) {
                    return $user;
                } else {
                    $cryptostrong = true;
                    $token = bin2hex(openssl_random_pseudo_bytes(64, $cryptostrong));

                    self::query(
                        'INSERT INTO auth VALUES (null, :token, :user_id)', 
                        array(
                            ':token' => hash('sha256', $token), 
                            ':user_id' => $user_id
                        )
                    );

                    self::query(
                        'DELETE FROM auth WHERE token=:token', 
                        array(':token' => hash('sha256', SuperCookie::get('AuthToken')))
                    );

                    setcookie('AuthToken', $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                    setcookie('tokenrefresh', 1, time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

                    return $user;
                }
            }
        }
        return false;
    }

    public static function Logout(): void
    {
        if (!is_null(SuperCookie::get('AuthToken'))) {

            self::query(
                'DELETE FROM auth WHERE token=:token', 
                array(':token' => hash('sha256', SuperCookie::get('AuthToken')))
            );

            SuperCookie::forget('AuthToken');

            if (!is_null(SuperCookie::get('tokenrefresh'))) {
                SuperCookie::forget('tokenrefresh');
            }
        }
    }
}
