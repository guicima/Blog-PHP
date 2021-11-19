<?php

    class ManagePostController extends Controller 
    {
        
        public static function Mount()
        {
            self::$page_title = 'Gestion d\'article';

            if (!is_null(SuperPost::get('posttodraft'))) {
                $post = new Post(SuperPost::get('posttodraft'));
                $post->toDraft();
                $post->save();

            } elseif (!is_null(SuperPost::get('posttopublic'))) {
                $post = new Post(SuperPost::get('posttopublic'));
                $post->toPublic();
                $post->save();

            } elseif (!is_null(SuperPost::get('posttotrash'))) {
                $post = new Post(SuperPost::get('posttotrash'));
                $post->toTrash();
                $post->save();
                
            } elseif (!is_null(SuperPost::get('deletepost'))) {
                $post = new Post(SuperPost::get('deletepost'));
                $post->delete();
            }
        }

    }
