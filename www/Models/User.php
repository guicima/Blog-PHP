<?php

class User extends Database
{

    public int $user_id;
    public string $name;
    public string $email;
    public bool $admin;
    public string $state;

    public function __construct(int $user_id) {
        $this->user_id = $user_id;
        $user = self::query('SELECT * FROM users WHERE id=:user_id', array(':user_id' => $user_id))[0];
        $this->name = $user['username'];
        $this->email = $user['email'];
        $this->admin = $user['is_admin'];
        $this->state = $user['state'] ?? 'VERIFIED';
    }

}