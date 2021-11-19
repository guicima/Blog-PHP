<?php

    class AddPostController extends Controller 
    {
        
        public static function Mount()
        {
            self::$page_title = 'Nouvel article';

            if (!is_null(SuperPost::get('addpost'))) {
                if (!is_null(SuperPost::get('postid'))) {
                    $post = new Post(SuperPost::get('postid'));
                    
                } else {
                    $post = new Post();
                }
                if (SuperPost::get('addpost') == 'draft') {
                    $post->fill(
                        SuperPost::get('title'), 
                        SuperPost::get('description'), 
                        SuperPost::get('content'), 
                        'DRAFT'
                    );

                } elseif(SuperPost::get('addpost') == 'public') {
                    $post->fill(
                        SuperPost::get('title'), 
                        SuperPost::get('description'), 
                        SuperPost::get('content'), 
                        'PUBLIC'
                    );

                }
                $post->save();
                header("Location: /managepost");

            }
        }

    }
