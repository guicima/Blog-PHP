<?php

    class ManageCommentController extends Controller 
    {
        
        public static function Mount()
        {
            self::$page_title = 'Gestion des commentaires';

            if (!is_null(SuperPost::get('commenttodraft'))) {
                $comment = new Comment(SuperPost::get('commenttodraft'));
                $comment->toDraft();
                $comment->save();

            } elseif (!is_null(SuperPost::get('commenttopublic'))) {
                $comment = new Comment(SuperPost::get('commenttopublic'));
                $comment->toPublic();
                $comment->save();
                
            } elseif (!is_null(SuperPost::get('deletecomment'))) {
                $comment = new Comment(SuperPost::get('deletecomment'));
                $comment->delete();
            }
        }

    }
