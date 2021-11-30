<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/user/articles/getArticle.php'); 

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php'); 
?>

<div class="wrapper">
    <h3 class="main-page-link">
        <a class="categories-main-page" href="../../../index.php">Вернуться на главную</a>
    </h3>
    <?php if (! empty($article)): ?>
        <div class="article-page">
            <h2 class="article-page-title"><?= $article[0]['articleTitle'] ?></h2>
            <img src="<?= $article[0]['image'] ?>" class="article-page-image">
            <span class="article-page-date"><?= $article[0]['publicationDate'] ?></span>
            <div class="article-page-content-container"><?= $articleContent ?></div>
        </div>
    <?php endif; ?>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>