<?php
declare(strict_types=1);
use Thomd729\Itblog\User\Message;

if (! isNotEmpty()) {
    $error = 'Все поля должны быть заполнены';
} else if (isNotEmpty() && ! empty($_COOKIE['login'])) {
    $login = $_COOKIE['login'];
    $messageText = strip_tags($_POST['message']);
    $date = $_POST['date'];

    $message = new Message($messageText, $date);

    $userId = $message->findUserId($pdo, $login);
    $message->message($pdo, (int) $userId[0]['id']);
    
    header('Location: ../../../templates/user/message/messageSuccess.php');
}

function isNotEmpty(): bool
{
    return ! empty($_POST['message']) && ! empty($_POST['date']);
}