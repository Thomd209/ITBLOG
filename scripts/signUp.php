<?php
declare(strict_types=1);
use Thomd729\Itblog\Registration;

if (! isNotEmpty()) {
    $error = 'Все поля формы должны быть заполнены';
} else if (isNotEmpty()) {
    $errors = [
        checkLogin() => 'Поле логин содержит недопустимые символы',
        checkPassword() => 'Поле пароль содержит недопустимые символы или его длина слишком мала',
        checkEmail() => 'Поле email содержит недопустимые символы'
    ];

    $error = checkFieldsForErrors($errors);
}

if (empty($error)) {
    if (! Registration::doesUserExist($pdo, $_POST['login'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        Registration::addUser($pdo, $_POST['login'], $password, 
        $_POST['email']);

        redirect();
    } else {
        $error = 'Пользователь с таким логином уже существует';
    }
}

function redirect(): void 
{
    header('Location: http://itblog_host.com/templates/signUpSuccess.php');
}


function checkFieldsForErrors(array $errors)
{
    foreach ($errors as $function => $error) {
        if ($function === 0) {
            return $error;
        }
    }
}

function checkLogin(): int
{
    return preg_match('/^[\w]*$/', $_POST['login']);
}

function checkPassword(): int
{
    return preg_match('/^[\w.-]{7,}$/', $_POST['password']);
}

function checkEmail(): int
{
    return preg_match('/^[\w@.]*$/', $_POST['email']);
}

function isNotEmpty(): bool
{
    return ! empty($_POST['login']) && ! empty($_POST['password']) 
    && ! empty($_POST['email']);
}