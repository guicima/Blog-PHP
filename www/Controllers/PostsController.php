<?php

    class PostsController extends Controller 
    {
        public static $posts;

        public static function Mount()
        {
            self::$page_title = 'Articles';

            $variable = self::query(
                'SELECT id FROM articles WHERE state=:state ORDER BY created_at DESC', 
                array(
                    ':state' => 'PUBLIC'
                )
            );

            foreach ($variable as $value) {
                self::$posts[] = new Post($value[0]);
            }
        }
    }

?>