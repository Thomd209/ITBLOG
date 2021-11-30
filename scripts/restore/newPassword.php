<?php
declare(strict_types=1);
use Thomd729\Itblog\Restore;

if (! isNotEmpty()) {
    $error = 'Поле должно быть заполнено';
} else if (isNotEmpty()) {
    $password = strip_tags($_POST['password']);
    $error = checkForWrongSymbols($password) 
    ? 'Поле содержит недопустимые символы' : '';

    if (empty($error)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        Restore::changePassword($pdo, $password);
        header('Location: ../../templates/restore/passwordSuccess.php');
    }
}

function isNotEmpty(): bool 
{
    return ! empty($_POST['password']);
}

function checkForWrongSymbols(string $password): bool 
{
    if (! preg_match('/^[\w.-]*$/', $password)) {
        return true;
    }

    return false;
}