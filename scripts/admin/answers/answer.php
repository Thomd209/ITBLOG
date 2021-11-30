<?php
declare(strict_types=1);
use Thomd729\Itblog\Admin\Answer;

if (! isNotEmpty()) {
    $error = 'Все поля должны быть заполнены';
} else if (isNotEmpty()) {
    $answer = strip_tags($_POST['answer']);
    $date = strip_tags($_POST['date']);
    $id = (int) $_GET['id'];

    $answer = new Answer($answer, $date);

    $answer->answer($pdo, $id);
    $answer->setReplied($pdo, $id);

    header('Location: ../../../templates/admin/answers/answerSuccess.php');
}

function isNotEmpty(): bool 
{
    return ! empty($_POST['answer']) && ! empty($_POST['date'])
    && ! empty($_GET['id']);
}