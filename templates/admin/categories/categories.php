<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/checkAccess.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/categories/action.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getCategories.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php');
?>

<div class="wrapper">
    <h3 class="main-page-link">
        <a class="categories-main-page" href="../articles/articles.php">Вернуться на главную</a>
    </h3>
    <h3>Категории</h3>
    <form class="form-add-category" action="categories.php?categoryAction=add" method="post">
        <label for="add">Добавить новую категорию</label>
        <input type="text" name="title" id="add">
        <button class="btn btn-success" type="submit">Добавить</button>
    </form>
    <?php if (! empty($_GET['categoryAction']) && $_GET['categoryAction'] == 'update' && ! empty($_GET['id']) && ! empty($_GET['title'])): ?>
        <form class="form-update-category" action="categories.php?categoryAction=update&id=<?= $_GET['id'] ?>&title=<?= $_GET['title'] ?>" method="post">
            <label for="update">Изменить название категории "<?= $_GET['title'] ?>":</label>
            <input type="text" name="title" id="update">
            <button class="btn btn-primary" type="submit">Изменить</button>
        </form>
    <?php endif; ?>
    <?php if (! empty($_POST) && ! empty($error)): ?>
        <span class="empty-category"><?= $error ?></span>
    <?php endif; ?>
    <?php if (! empty($categories)): ?>
        <?php foreach ($categories as $category): ?>
            <ul class="action-categories-list">
                <li class="action-category-title"><?= $category['categoryTitle'] ?></li>
                <li class="action-categories-list-item">
                    <button class="action-category-btn btn btn-primary" type="button">
                        <a class="btn-update action-category-link" href="categories.php?categoryAction=update&id=<?= $category['id'] ?>&title=<?= $category['categoryTitle'] ?>">Изменить</a>
                    </button>
                </li>
                <li class="action-categories-list-item">
                    <button class="action-category-btn btn btn-danger" type="button">
                        <a class="action-category-link" href="categories.php?categoryAction=delete&id=<?= $category['id'] ?>&title=<?= $category['categoryTitle'] ?>">Удалить</a>
                    </button>
                </li>
            </ul>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>