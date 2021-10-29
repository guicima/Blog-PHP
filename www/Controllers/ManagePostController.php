<?php

    class ManagePostController extends Controller 
    {
        
        public static function Mount()
        {
            self::$page_title = 'Gestion d\'article';

            if (isset($_POST['posttodraft'])) {
                $post = new Post($_POST['posttodraft']);
                $post->toDraft();
                $post->save();
            } elseif (isset($_POST['posttopublic'])) {
                $post = new Post($_POST['posttopublic']);
                $post->toPublic();
                $post->save();
            } elseif (isset($_POST['posttotrash'])) {
                $post = new Post($_POST['posttotrash']);
                $post->toTrash();
                $post->save();
            } elseif (isset($_POST['deletepost'])) {
                $post = new Post($_POST['deletepost']);
                $post->delete();
            }
        }

    }
