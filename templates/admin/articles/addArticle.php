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
    <h2 class="page-title">Новая статья</h2>
    <form enctype="multipart/form-data" action="addArticle.php?action=add" method="post">
        <div class="form-group">
            <label class="form-label" for="title">Название:</label>
            <input class="input-field input-title" type="text" name="title" id="title">
        </div>
        <div class="form-group">
            <label class="form-label" for="summary">Краткое описание:</label>
            <textarea class="input-field input-summary" name="summary" id="summary"></textarea>
        </div>
        <div class="form-group">
            <label class="form-label" for="category">Категория:</label>
            <select class="input-field input-category" name="category" id="category">
                <?php if (! empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['categoryTitle'] ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="form-group">
            <label class="form-label" for="image">Загрузить изображение:</label>
            <input class="input-field" type="file" name="image" id="image">
        </div>
        <div class="form-group">
            <label class="form-label" for="content">Содержание статьи:</label>
            <textarea class="input-field input-content" name="content" id="content"></textarea>
        </div>
        <div class="form-group">
            <label class="form-label" for="date">Дата публикации:</label>
            <input class="input-field input-date" type="date" name="date" id="date">
        </div>
        <?php if (! empty($error) && ! empty($_POST)): ?>
            <span class="error"><?= $error ?></span>
        <?php endif; ?>
        <button class="btn btn-primary btn-add-article" type="submit">Добавить</button>
    </form>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>