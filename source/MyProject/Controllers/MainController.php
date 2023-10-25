<?php

namespace MyProject\Controllers;

use MyProject\Models\Articles\Article;
use MyProject\Models\Users\UsersAuthService;

class MainController extends AbstractController
{
    public function main(): void
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
            'user' => UsersAuthService::getUserByToken()
        ]);
    }
}
