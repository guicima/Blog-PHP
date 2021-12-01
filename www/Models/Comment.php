<?php

class Comment extends Database
{
    public mixed $id;
    public int $user_id;
    public int $article_id;
    public string $text;
    public string $state = 'DRAFT';
    public DateTime $modified_at;
    public DateTime $created_at;
    public bool $is_response;
    public mixed $comment_id;


    public function __construct(int $id = null) {

        $this->id = $id;

        if ($id != null) {
            $comment = self::query(
                'SELECT * FROM comments WHERE id=:id', 
                array(
                    ':id' => $id
                )
            )[0];
            $this->user_id = $comment['user_id'];
            $this->article_id = $comment['article_id'];
            $this->text = $comment['text'];
            $this->state = $comment['state'];
            $this->modified_at = new DateTime($comment['modified_at']);
            $this->created_at = new DateTime($comment['created_at']);
            $this->is_response = $comment['is_response'];
            $this->comment_id = $comment['comment_id'];
        }
    }

    public function fill(int $user_id, int $article_id, string $text, bool $is_response = false, int $comment_id = null) : void
    {
        $this->user_id = $user_id;
        $this->article_id = $article_id;
        $this->text = $text;
        $this->is_response = $is_response;
        $this->comment_id = $comment_id;
    }

    public function toDraft() : void
    {
        $this->state = 'DRAFT';
    }

    public function toPublic() : void
    {
        $this->state = 'PUBLIC';
    }

    public function delete() : void
    {
        self::query(
            'DELETE FROM comments WHERE comment_id=:comment_id AND is_response = TRUE ORDER BY created_at ASC',
            array(
                ':comment_id' => $this->id
            )
        );

        self::query(
            'DELETE FROM comments WHERE id=:id', 
            array(
                ':id' => $this->id
            )
        );
    }

    public function save() : void
    {
        $this->modified_at = new DateTime('NOW');

        if ($this->id != null) {
            self::query(
                'UPDATE comments SET user_id = :user_id, article_id = :article_id, text = :comment, state = :state, modified_at = :modified_at, is_response = :is_response, comment_id = :comment_id WHERE id = :id', 
                array(
                    ':user_id' => $this->user_id, 
                    ':article_id' => $this->article_id, 
                    ':comment' => $this->text, 
                    ':state' => $this->state, 
                    ':id' => $this->id, 
                    ':modified_at' => $this->modified_at->format('c'), 
                    ':is_response' => (int)$this->is_response, 
                    ':comment_id' => $this->comment_id
                )
            );
        } else {
            $this->created_at = new DateTime('NOW');
            self::query(
                'INSERT INTO comments VALUE (null, :user_id, :article_id, :comment, :state, :modified_at, :created_at, :is_response, :comment_id)', 
                array(
                    ':user_id' => $this->user_id, 
                    ':article_id' => $this->article_id, 
                    ':comment' => $this->text, 
                    ':state' => $this->state, 
                    ':modified_at' => $this->modified_at->format('c'), 
                    ':created_at' => $this->created_at->format('c'), 
                    ':is_response' => (int)$this->is_response, 
                    ':comment_id' => $this->comment_id
                )
            );
        }
    }

    public function getUser() : User
    {
        return new User($this->user_id);
    }

    public function hasResponses(): bool
    {
        $comments = self::query(
            'SELECT id FROM comments WHERE comment_id=:comment_id AND is_response = TRUE ORDER BY created_at ASC', 
            array(
                ':comment_id' => $this->id
            )
        );
        return $comments != null ? true : false;
    }
    
    public function getResponses(): array
    {
        $comments = self::query(
            'SELECT id FROM comments WHERE comment_id=:comment_id AND is_response=TRUE AND state=:state ORDER BY created_at ASC', 
            array(
                ':comment_id' => $this->id, 
                'state' => 'PUBLIC'
            )
        );
        if ($comments != null) {
            foreach ($comments as $comment_id) {
                $comments_array[] = new Comment($comment_id[0]);
            }
            return $comments_array;
        } else {
            return [];
        }
    }

}