<?php

    class AddPostController extends Controller 
    {
        
        public static function Mount()
        {
            self::$page_title = 'Nouvel article';

            if (isset($_POST['addpost'])) {
                if (isset($_POST['postid'])) {
                    $post = new Post($_POST['postid']);
                    
                } else {
                    $post = new Post();
                }
                if ($_POST['addpost'] == 'draft') {
                    $post->fill($_POST['title'], $_POST['description'], $_POST['content'], 'DRAFT');
                } elseif($_POST['addpost'] == 'public') {
                    $post->fill($_POST['title'], $_POST['description'], $_POST['content'], 'PUBLIC');
                }
                $post->save();
                header("Location: /managepost");

            }
        }

    }
