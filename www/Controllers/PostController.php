<?php

    class PostController extends Controller 
    {
        public static $post;
        
        public static function Mount()
        {
            self::$page_title = 'Nouvel article';

            if (!empty($_GET['id']) && self::query(
                'SELECT * FROM articles WHERE id=:postid', 
                array(':postid' => $_GET['id'])
            )[0]) {

                static::$post = new Post($_GET['id']);
                
                if (isset($_POST['comment'])) {
                    $comment = new Comment();
                    $comment->fill(
                        intval($_POST['user_id']), 
                        intval($_GET['id']), 
                        $_POST['text'], 
                        isset($_POST['response_id']) ? true : false, 
                        $_POST['response_id'] ?? null,
                    );
                    $comment->save();
                }

            } else {
                header("Location: /");
            }
        }

    }
