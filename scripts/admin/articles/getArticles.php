<?php
declare(strict_types=1);
require_once $_SERVER['DOCUMENT_ROOT'] .  '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php';

use Thomd729\Itblog\Admin\Article;

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
        <tr data-id="<?= $article['id'] ?>" class="table-row">
            <td class="table-cell"><?= $article['articleTitle'] ?></td>
            <td class="table-cell"><?= $article['categoryTitle'] ?></td>
            <td class="table-cell"><?= $article['publicationDate'] ?></td>
            <td class="table-cell">
                <a href="updateArticle.php?action=show&id=<?= $article['id'] ?>">Редактировать</a>
            </td>
            <td class="table-cell">
                <a href="articles.php?action=delete&id=<?= $article['id'] ?>">Удалить</a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php endif; ?>