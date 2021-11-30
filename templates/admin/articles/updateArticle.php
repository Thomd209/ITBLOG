<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/checkAccess.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getCategories.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/articles/action.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php'); 
?>

<div class="wrapper">
    <h3 class="main-page-link">
        <a class="categories-main-page" href="articles.php">Вернуться на главную</a>
    </h3>
    <h3 class="title-update">Редактировать статью</h3>
    <?php if (! empty($article)): ?>
        <form enctype="multipart/form-data" action="updateArticle.php?action=update&id=<?= $article[0]['id'] ?>" method="post">
            <div class="form-group">
                <label class="form-label" for="title">Название:</label>
                <input class="input-field input-title" type="text" name="title" id="title" value="<?= $article[0]['articleTitle'] ?>">
            </div>
            <div class="form-group">
                <label class="form-label" for="summary">Краткое описание:</label>
                <textarea class="input-field input-summary" name="summary" id="summary"><?= $article[0]['summary'] ?></textarea>
            </div>
            <span class="update-category-explanation">Категория: <?= $article[0]['categoryTitle'] ?></span>
            <div class="form-group">
                <label class="form-label" for="category">Изменить категорию:</label>
                <select class="input-field input-category" name="category" id="category">
                    <?php if (! empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['categoryTitle'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <span class="update-image-explanation">Изображение:</span>
            <img class="update-image" src="<?= $article[0]['image'] ?>">
            <div class="form-group">
                <label class="form-label" for="image">Загрузить изображение:</label>
                <input class="input-field" type="file" name="image" id="image">
            </div>
            <div class="form-group">
                <label class="form-label" for="content">Содержание статьи:</label>
                <textarea class="input-field input-content" name="content" id="content"><?= $article[0]['content'] ?></textarea>
            </div>
            <div class="form-group">
                <label class="form-label" for="date">Дата публикации:</label>
                <input class="input-field input-date" type="date" name="date" id="date" value="<?= $article[0]['publicationDate'] ?>">
            </div>
            <?php if (! empty($error) && ! empty($_POST)): ?>
                <span class="error"><?= $error ?></span>
            <?php endif; ?>
            <button class="btn btn-primary btn-add-article" type="submit">Обновить</button>
        </form>
    <?php endif; ?>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>