<?php

    class ContactController extends Controller 
    {
        
        public static function Mount()
        {
            self::$page_title = 'Contact';

            if (!(SuperPost::get('contact') === null)) {
                
                mail('guilherme.cimabatista@gmail.com', 'Contact blog', SuperPost::get('message'), [
                    'From' => SuperPost::get('email'),
                    'Reply-To' => SuperPost::get('email'),
                    'X-Mailer' => 'PHP/' . phpversion(),
                ]);
                SuperCookie::putArray('success', 'Merci pour votre message.', strtotime('+1 seconds'));
                header('Refresh:0');

            }
        }

    }

?>