<?php
declare(strict_types=1);
use Thomd729\Itblog\Authentication;

if (! isNotEmpty()) {
    $error = 'Все поля должны быть заполнены';
} else if (isNotEmpty()) {
    $login = strip_tags($_POST['login']);
    $password = strip_tags($_POST['password']);

    $hash = Authentication::checkLogin($pdo, $login);
    if (empty($hash)) {
        $error = 'Пользователя с таким логином не существует';
    } else if (! empty($hash)) {
        $error = ! Authentication::isCorrectPassword($password, $hash) 
        ? 'Неправильный пароль' : '';
    }
}

if (empty($error)) {
    $userStatus = Authentication::getStatus($pdo, $login);

    Authentication::logIn($login, $hash);
    redirect($userStatus);
}

function redirect(string $status): void 
{
    if ($status === 'admin') {
        header('Location: ../templates/admin/articles/articles.php');
    } else {
        header('Location: ../index.php');
    }
}

function isNotEmpty(): bool 
{
    return ! empty($_POST['login']) && ! empty($_POST['password']);
}