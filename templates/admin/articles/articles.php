<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/checkAccess.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getCategories.php'); 

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/searchSuggestions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/articles/action.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/articles/getArticles.php'); 

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php'); 
?>
<div class="wrapper">
    <button class="feedbacks-btn btn btn-dark">
        <a href="../answers/messages.php" class="feedback-link">Сообщения от пользователей</a>
    </button>
    <button type="button" class="btn-categories btn btn-primary">
        <a class="btn-categories-link" href="../categories/categories.php">Изменить категории</a>
    </button>
    <h3 class="categories-title">Категории</h3>
    <div class="categories-container">
        <ul class="categories-list">
            <?php if (! empty($categories)): ?>
                <?php foreach ($categories as $category): ?>
                    <li class="categories-list-item">
                        <a href="articles.php?categoryId=<?= $category['id'] ?>" class="categories-list-link"><?= $category['categoryTitle'] ?></a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/admin/articles/searchForm.php'); ?>
    <div class="suggestions"></div>
    <button class="btn btn-primary btn-add-article">
        <a class="add-article-link" href="addArticle.php">Создать статью</a>
    </button>
    <div class="table-articles table-responsive">
    <span data-articles-amount="<?= $articlesAmount[0]['amount'] ?>" class="articles-amount"></span>
        <span data-biggest-id="<?= $biggestId[0]['id'] ?>" class="biggest-id"></span>
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
                <?php if (! empty($articles)): ?>
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
            </tbody>
        </table>
        <button class="btn-next-articles btn btn-primary">Показать следкющие 5 статей</button>
    </div>
</div>

<script src="../../../public/js/searchSuggestions.js"></script>
<script src="../../../public/js/addSuggestionToInput.js"></script>
<script src="../../../public/js/admin/nextArticles.js"></script>
<script src="../../../public/js/admin/hideBtnNextArticles.js"></script>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>