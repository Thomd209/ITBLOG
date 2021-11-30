<?php 
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getCategories.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/searchSuggestions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/user/articles/getArticles.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php'); 
?>
<div class="wrapper">
    <?php if (! empty($_SESSION['user']) && $_SESSION['user']['login'] === 'thomd729' && password_verify('redFish99', $_SESSION['user']['hash'])): ?>
        <h3 class="main-page-admin-title">
            <a href="templates/admin/articles/articles.php" class="main-page-admin-link">Вернуться в панель управления</a>
        </h3>
    <?php endif; ?>
    <?php if (! empty($_SESSION['user']) && $_SESSION['user']['login'] !== 'thomd729'): ?>
        <button class="message-btn btn btn-dark">
            <a href="templates/user/message/message.php" class="feedback-link">Написать сообщение администратору</a>
        </button>
        <button class="answers-btn btn btn-dark">
            <a href="templates/user/message/answers.php" class="feedback-link">Посмотреть ответы на сообщения</a>
        </button>
    <?php endif; ?>
    <h3 class="categories-main-page-title">Категории</h3>
    <div class="categories-container">
        <ul class="categories-list">
            <?php if (! empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <li class="categories-list-item">
                        <a href="index.php?categoryId=<?= $category['id'] ?>" class="categories-list-link"><?= $category['categoryTitle'] ?></a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/user/articles/searchForm.php'); ?>
    <div class="suggestions"></div>
    <div class="articles">
        <span data-articles-amount="<?= $articlesAmount[0]['amount'] ?>" class="articles-amount"></span>
        <span data-biggest-id="<?= $biggestId[0]['id'] ?>" class="biggest-id"></span>
        <?php if (! empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <div data-id="<?= $article['id'] ?>" class="article">
                    <h2 class="article-title"><?= $article['articleTitle'] ?></h2>
                    <img class="article-image" src="<?= $article['image'] ?>">
                    <span class="article-date">Дата публикации: <?= $article['publicationDate'] ?></span>
                    <p class="article-summary"><?= $article['summary'] ?></p>
                    <button class="btn-article btn btn-primary">
                        <a class="page-article-link" href="templates/user/articles/article.php?articleId=<?= $article['id'] ?>">Читать</a>
                    </button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <button class="btn-next-articles btn btn-primary">Показать следующие 5 статей</button>
</div>

<script src="public/js/searchSuggestions.js"></script>
<script src="public/js/addSuggestionToInput.js"></script>
<script src="public/js/user/nextArticles.js"></script>
<script src="public/js/user/hideBtnNextArticles.js"></script>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>
