<?php

    class ManagePostController extends Controller 
    {
        public static $posts;
        
        public static function Mount()
        {
            self::$page_title = 'Gestion d\'article';

            if (!(SuperPost::get('posttodraft') === null)) {
                $post = new Post(SuperPost::get('posttodraft'));
                $post->toDraft();
                $post->save();

            } elseif (!(SuperPost::get('posttopublic') === null)) {
                $post = new Post(SuperPost::get('posttopublic'));
                $post->toPublic();
                $post->save();

            } elseif (!(SuperPost::get('posttotrash') === null)) {
                $post = new Post(SuperPost::get('posttotrash'));
                $post->toTrash();
                $post->save();
                
            } elseif (!(SuperPost::get('deletepost') === null)) {
                $post = new Post(SuperPost::get('deletepost'));
                $post->delete();
            }

            $variable = self::query('SELECT id FROM articles ORDER BY created_at DESC');

            foreach ($variable as $value) {
                self::$posts[] = new Post($value[0]);
            }
        }

    }
