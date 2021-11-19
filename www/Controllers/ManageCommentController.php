<?php

    class ManageCommentController extends Controller 
    {
        
        public static function Mount()
        {
            self::$page_title = 'Gestion des commentaires';

            if (!(SuperPost::get('commenttodraft') === null)) {
                $comment = new Comment(SuperPost::get('commenttodraft'));
                $comment->toDraft();
                $comment->save();

            } elseif (!(SuperPost::get('commenttopublic') === null)) {
                $comment = new Comment(SuperPost::get('commenttopublic'));
                $comment->toPublic();
                $comment->save();
                
            } elseif (!(SuperPost::get('deletecomment') === null)) {
                $comment = new Comment(SuperPost::get('deletecomment'));
                $comment->delete();
            }
        }

    }
