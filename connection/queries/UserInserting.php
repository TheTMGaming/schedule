<?php

require_once 'IQuery.php';

class UserInserting implements IQuery
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function GetParameters(): array
    {
        return [
            'login' => $this->user->GetLogin(),
            'email' => $this->user->GetEmail(),
            'password' => $this->user->GetPassword()
        ];
    }

    public function GetQuery(): string
    {
        return "INSERT INTO users VALUES (NULL, :login, :email, :password)";
    }
}