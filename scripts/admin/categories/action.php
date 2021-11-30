<?php
declare(strict_types=1);
use Thomd729\Itblog\Category;

$action = ! empty($_GET['categoryAction']) 
? $_GET['categoryAction'] : '';
$id = ! empty($_GET['id']) ? (int) $_GET['id'] : '';
$name = ! empty($_GET['title']) ? $_GET['title'] : '';

$error = ! empty($_POST['title']) ? '' 
: 'Поле формы должно быть заполнено';

if (empty($error)) {
    $newName = strip_tags($_POST['title']);

    $category = new Category($newName);
}

if (empty($error) && $action == 'add') {
    $category->createDirectory()->addCategory($pdo);
} else if (empty($error) && $action == 'update') {
    $category->renameDirectory($name)->updateCategory($pdo, $id);
} else if ($action == 'delete') {
    Category::deleteDirectory($name);
    Category::deleteCategory($pdo, $id);
}