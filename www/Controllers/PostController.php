<?php

    class PostController extends Controller 
    {
        public static $post;
        
        public static function Mount()
        {
            self::$page_title = 'Nouvel article';

            if (!empty(SuperGet::get('id')) && self::query(
                'SELECT * FROM articles WHERE id=:postid', 
                array(':postid' => SuperGet::get('id'))
            )[0]) {

                static::$post = new Post(SuperGet::get('id'));
                
                if (!(SuperPost::get('comment') === null)) {
                    $comment = new Comment();
                    $comment->fill(
                        intval(SuperPost::get('user_id')), 
                        intval(SuperGet::get('id')), 
                        SuperPost::get('text'), 
                        !(SuperPost::get('response_id') === null) ? true : false, 
                        SuperPost::get('response_id'),
                    );
                    $comment->save();
                }

            } else {
                header("Location: /");
            }
        }

    }
