<?php

class Post extends Database
{
    public mixed $id;
    public string $title;
    public string $tiny_text;
    public string $text;
    public string $image_url;
    public string $state;
    public DateTime $modified_at;
    public DateTime $created_at;

    public function __construct(int $id = null) {

        $this->id = $id;

        if ($id != null) {
            $post = self::query('SELECT * FROM articles WHERE id=:postid', array(':postid' => $id))[0];
            $this->title = $post['title'];
            $this->tiny_text = $post['tiny_text'];
            $this->text = $post['text'];
            //$this->image_url = $post['image_url'];
            $this->state = $post['state'];
            $this->modified_at = new DateTime($post['modified_at']);
            $this->created_at = new DateTime($post['created_at']);
        }
    }

    public function fill(string $title, string $tiny_text, string $text, string $state) : void
    {
        $this->title = $title;
        $this->tiny_text = $tiny_text;
        $this->text = $text;
        $this->state = $state;
    }

    public function toDraft() : void
    {
        $this->state = 'DRAFT';
    }

    public function toPublic() : void
    {
        $this->state = 'PUBLIC';
    }

    public function toTrash() : void
    {
        $this->state = 'TRASH';
    }

    public function save() : void
    {
        $this->modified_at = new DateTime('NOW');
        if ($this->id != null) {
            self::query('UPDATE articles SET title = :title, tiny_text = :tiny_text, text = :text, state = :state, modified_at = :modified_at WHERE id = :post_id', array(':title' => $this->title, ':tiny_text' => $this->tiny_text, ':text' => $this->text, ':state' => $this->state, ':post_id' => $this->id, ':modified_at' => $this->modified_at->format('c')));
        } else {
            $this->created_at = new DateTime('NOW');
            self::query('INSERT INTO articles VALUE (null, :title, :tiny_text, :text, null, :state, :modified_at, :created_at)', array(':title' => $this->title, ':tiny_text' => $this->tiny_text, ':text' => $this->text, ':state' => $this->state, ':modified_at' => $this->modified_at->format('c'), ':created_at' => $this->created_at->format('c')));
        }
    }

    public function delete() : void
    {
        if ($this->state == 'TRASH') {
            self::query('DELETE FROM articles WHERE id=:postid', array(':postid' => $this->id));
        }
    }

    public function getComments() : array
    {
        $comments = self::query('SELECT id FROM comments WHERE article_id=:article_id ORDER BY created_at DESC', array(':article_id' => $this->id));
        if ($comments != null) {
            foreach ($comments as $key => $comment_id) {
                $comments_array[] = new Comment($comment_id[0]);
            }
            return $comments_array;
        } else {
            return [];
        }
    }

}