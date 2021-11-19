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
                
                if (!is_null(SuperPost::get('comment'))) {
                    $comment = new Comment();
                    $comment->fill(
                        intval(SuperPost::get('user_id')), 
                        intval(SuperGet::get('id')), 
                        SuperPost::get('text'), 
                        !is_null(SuperPost::get('response_id')) ? true : false, 
                        SuperPost::get('response_id'),
                    );
                    $comment->save();
                }

            } else {
                header("Location: /");
            }
        }

    }
