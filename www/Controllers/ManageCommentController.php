<?php

    class ManageCommentController extends Controller 
    {
        
        public static function Mount()
        {
            self::$page_title = 'Gestion des commentaires';

            if (isset($_POST['commenttodraft'])) {
                $comment = new Comment($_POST['commenttodraft']);
                $comment->toDraft();
                $comment->save();

            } elseif (isset($_POST['commenttopublic'])) {
                $comment = new Comment($_POST['commenttopublic']);
                $comment->toPublic();
                $comment->save();
                
            } elseif (isset($_POST['deletecomment'])) {
                $comment = new Comment($_POST['deletecomment']);
                $comment->delete();
            }
        }

    }
