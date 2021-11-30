<?php
declare(strict_types=1);
use Thomd729\Itblog\Admin\Article;

$action = ! empty($_GET['action']) ? $_GET['action'] : '';
$id = ! empty($_GET['id']) ? (int) $_GET['id'] : '';

$error = showError();

if (empty($error)) {
    $title = htmlentities($_POST['title']);
    $summary = htmlentities($_POST['summary']);
    $image = $_FILES['image'];

    $content = htmlentities($_POST['content']);
    $date = $_POST['date'];
    $category = (int) $_POST['category'];

    $article = new Article($title, $summary, $_FILES['image'], 
    $content, $date, $category);
}

if (empty($error) && $action == 'add') {
    $imagePath = $article->downloadImage($pdo);
    $article->addArticle($pdo, $imagePath);
} else if (empty($error) && $action == 'update') {
    $imagePath = Article::findImage($pdo, $id);
    Article::deleteImage($imagePath);

    $imagePath = $article->downloadImage($pdo);
    $article->updateArticle($pdo, $imagePath, $id);
} else if ($action == 'show' || $action == 'update') {
    $article = Article::getArticleForUpdate($pdo, $id);
} else if ($action == 'delete') {
    $imagePath = Article::findImage($pdo, $id);
    Article::deleteImage($imagePath);

    Article::deleteArticle($pdo, $id);
}

function showError(): string
{
    return ! isFilled() ? 'Не все поля были заполнены' 
    : checkImage();
}

function isFilled(): bool
{
    return ! empty($_POST['title']) && ! empty($_POST['summary'])
    && ! empty($_POST['category']) 
    && $_FILES['image']['error'] === UPLOAD_ERR_OK
    && ! empty($_POST['content']) && ! empty($_POST['date']);
}

function checkImage(): string
{
    return (checkType() && checkSize())
    ? '' : 'Не удалось загрузить картинку';
}

function checkType(): bool
{
    $type = explode('/', $_FILES['image']['type'])[1];

    return in_array($type, ['jpg', 'jpeg', 'png']);
}

function checkSize(): bool 
{
    return $_FILES['image']['size'] <= 10485760;
}
