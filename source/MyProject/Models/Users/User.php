<?php

namespace MyProject\Models\Users;

use MyProject\Models\ActiveRecordEntity;

class User extends ActiveRecordEntity
{
    protected string $nickname;

    protected string $email;

    protected bool $isConfirmed;

    protected string $role;

    protected string $passwordHash;

    protected string $authToken;

    protected $createdAt;

    public function getNickname(): string
    {
        return $this->nickname;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}
