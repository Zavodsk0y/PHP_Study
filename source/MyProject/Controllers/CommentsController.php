<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\ForbiddenException;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnAuthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Comments\Comment;

class CommentsController extends AbstractController
{
    public function edit(int $commentId)
    {
        $comment = Comment::getById($commentId);

        if ($comment === null) {
            throw new NotFoundException('Такого комметария не существует!');
        }

        if ($this->user === null) {
            throw new UnauthorizedException('Вы не авторизованы!');
        }

        if ($this->user->getRole() !== 'admin' || $this->user->getId() !== $comment->getAuthor()->getId()) {
            throw new ForbiddenException('Комментарий может редактировать только владелец или администратор!');
        }

        if (!empty($_POST)) {
            try {
                $comment->updateFromArray($_POST);
                header('Location: /articles/' . $comment->getArticleId() . '#comment' . $comment->getId());
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('comments/edit.php', ['error' => $e->getMessage(), 'comment' => $comment]);
                return;
            }
        }


        $this->view->renderHtml('comments/edit.php', ['comment' => $comment]);
    }

    public function create(int $articleId)
    {
        if ($this->user === null) {
            throw new ForbiddenException('Вы должны быть авторизованы, чтобы оставить комментарий.');
        }

        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException('Статья не найдена.');
        }

        if (!empty($_POST)) {
            try {
                $comment = Comment::createFromArray($_POST, $this->user, $articleId);
                header('Location: /articles/' . $article->getId() . '#comment' . $comment->getId());
                exit();
            } catch (InvalidArgumentException $e) {

                $this->view->renderHtml('articles/view.php', [
                    'article' => $article,
                    'error' => $e->getMessage()
                ]);
                return;
            }
        }
    }
}
