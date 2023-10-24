<?php

namespace MyProject\Models\Comments;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;
use MyProject\Services\Db;

class Comment extends ActiveRecordEntity
{
    protected string $text;

    protected int $articleId;
    protected int $authorId;

    public function setText($text): void
    {
        $this->text = $text;
    }

    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }

    public function setArticleId($articleId): void
    {
        $this->articleId = $articleId;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public static function getCommentsForArticle(int $articleId): array
    {
        $db = Db::getInstance();

        $sql = 'SELECT * FROM ' . static::getTableName() . ' WHERE article_id = :article_id';
        $params = [':article_id' => $articleId];

        return $db->query($sql, $params, static::class);
    }

    public function getArticleId(): int
    {
        return $this->articleId;
    }

    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }

    public static function createFromArray(array $fields, User $author, int $articleId): Comment
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException('Статья не найдена.');
        }

        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Введите текст комментария');
        }

        $comment = new Comment();
        $comment->setAuthor($author);
        $comment->setText($fields['text']);
        $comment->setArticleId($articleId);
        $comment->save();

        return $comment;
    }

    public function updateFromArray(array $fields): Comment
    {
        if (empty($fields['text'])) {
            throw new InvalidArgumentException('Отсутсвует текст статьи');
        }

        $this->setText($fields['text']);

        $this->save();

        return $this;
    }

    protected static function getTableName(): string
    {
        return 'comments';
    }
}

