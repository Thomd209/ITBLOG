<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/user/articles/searchArticles.php'); 

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php');
?>
<div class="wrapper">
    <h3 class="main-page-link">
        <a class="categories-main-page" href="../../../index.php">Вернуться на главную</a>
    </h3>
    <h3 class="search-title">Результаты поиска:</h3>
    <h4 class="amount-articles">Найдено статей: <?= $articlesAmount ?></h4>
    <div class="articles">
        <?php if (! empty($articles)): ?>
            <?php foreach ($articles as $article): ?>
                <div class="article">
                    <h2 class="article-title"><?= $article['articleTitle'] ?></h2>
                    <img class="article-image" src="<?= $article['image'] ?>">
                    <span class="article-date">Дата публикации: <?= $article['publicationDate'] ?></span>
                    <button class="btn-article btn btn-primary">
                        <a class="page-article-link" href="article.php?articleId=<?= $article['id'] ?>">Читать</a>
                    </button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>
