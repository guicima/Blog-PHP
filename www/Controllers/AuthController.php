<?php

class AuthController extends Database
{

    public static function Login(String $email, String $password): void
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
                header("Location: /dashboard");
                SuperCookie::putArray('success', 'Vous vous êtes connecté.', strtotime('+1 seconds'));
                exit();
            } else {
                SuperCookie::putArray('errors', 'Mot de passe incorrect.', strtotime('+1 seconds'));
                header("Refresh:0");
            }
        } else {
            SuperCookie::putArray('errors', "Cet utilisateur n'existe pas", strtotime('+1 seconds'));
            header("Refresh:0");
        }
    }

    public static function isLoggedIn(): mixed
    {
        if (!(SuperCookie::get('AuthToken') === null)) {
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

                if (!(SuperCookie::get('tokenrefresh') === null)) {
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
        if (!(SuperCookie::get('AuthToken') === null)) {

            self::query(
                'DELETE FROM auth WHERE token=:token', 
                array(':token' => hash('sha256', SuperCookie::get('AuthToken')))
            );

            SuperCookie::forget('AuthToken');

            if (!(SuperCookie::get('tokenrefresh') === null)) {
                SuperCookie::forget('tokenrefresh');
            }

            SuperCookie::putArray('success', "Vous vous êtes déconnecté", strtotime('+1 seconds'));
            header("Refresh:0");
        }
    }
}
