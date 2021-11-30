<?php
declare(strict_types=1);
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php';

use Thomd729\Itblog\User\Article;

$categoriesAmount = 
Article::getCategoriesAmount($pdo)[0]['amount'];

if ($categoriesAmount > 0) {
    $categoryId = ! empty($_GET['categoryId']) 
    ? (int) $_GET['categoryId']
    : Article::getFirstCategory($pdo)[0]['id'];

    $articlesAmount = 
    Article::getArticlesAmount($pdo, $categoryId);
    $biggestId = Article::getBiggestId($pdo, $categoryId);

    $startId = ! empty($_POST['startId']) 
    ? (int) $_POST['startId'] : 0;

    $articles = Article::getArticles($pdo, $categoryId, $startId);
}



?>

<?php if (! empty($articles) && ! empty($_POST)): ?>
    <?php foreach ($articles as $article): ?>
        <div data-id="<?= $article['id'] ?>" class="article">
            <h2 class="article-title"><?= $article['articleTitle'] ?></h2>
            <img src="<?= $article['image'] ?>" class="article-image">
            <span class="article-date"><?= $article['publicationDate'] ?></span>
            <p class="article-summary"><?= $article['summary'] ?></p>
            <button class="btn-article btn btn-primary">
                <a class="page-article-link" href="../../../templates/user/articles/article.php?articleId=<?= $article['id'] ?>">Читать</a>
            </button>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
