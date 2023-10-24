<?php include __DIR__ . '/../header.php'; ?>
<?php if (!empty($error)): ?>
    <div style="color: red;"><?= $error ?></div>
<?php endif; ?>
<h1><?= $article->getName() ?></h1>
<p><?= $article->getText() ?></p>
<p>Автор: <?= $article->getAuthor()->getNickname() ?></p>

<h2>Комментарии</h2>
<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
        <p>Автор: <?= $comment->getAuthor()->getNickname() ?></p>
        <p><?= $comment->getText() ?></p>
        <a href="/articles/comments/<?= $comment->getId() ?>/edit">Редактировать</a>
    <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Пока нет комментариев.</p>
<?php endif; ?>
<?php if ($user !== null): ?>
    <h4>Хотите оставить комментарий?</h4>
    <form action="/articles/<?= $article->getId() ?>/comments/create" method="post">
        <label for="text">Текст комментария</label><br>
        <textarea name="text" id="text" rows="10" cols="80"><?= $_POST['text'] ?? '' ?></textarea><br>
        <br>
        <input type="submit" value="Отправить">
    </form>
<?php elseif ($user === null): ?>
    <p>Вы должны быть авторизованы, чтобы отправить комментарий</p>
<?php endif ?>
<?php include __DIR__ . '/../footer.php'; ?>








