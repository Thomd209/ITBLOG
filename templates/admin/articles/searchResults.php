<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/checkAccess.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/articles/action.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/articles/searchArticles.php'); 

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php'); 
?>

<div class="wrapper">
    <h3 class="main-page-link">
        <a class="categories-main-page" href="articles.php">Вернуться на главную</a>
    </h3>
    <h3 class="search-title">Результаты поиска:</h3>
    <h4 class="amount-articles">Найдено статей: <?= $articlesAmount ?></h4>
    <?php if (! empty($articles)): ?>
        <div class="search-table table-responsive">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th class="table-header">Название</th>
                        <th class="table-header">Категория</th>
                        <th class="table-header">Дата публикации</th>
                        <th class="table-header"></th>
                        <th class="table-header"></th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php foreach ($articles as $article): ?>
                        <tr class="table-row">
                            <td class="table-cell"><?= $article['articleTitle'] ?></td>
                            <td class="table-cell"><?= $article['categoryTitle'] ?></td>
                            <td class="table-cell"><?= $article['publicationDate'] ?></td>
                            <td class="table-cell">
                                <a href="updateArticle.php?action=show&id=<?= $article['id'] ?>">Редактировать</a>
                            </td>
                            <td class="table-cell">
                                <a href="searchResults.php?action=delete&id=<?= $article['id'] ?>">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>