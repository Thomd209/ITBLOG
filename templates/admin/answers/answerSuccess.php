<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/checkAccess.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php');
?>

<div class="answer-success-wrapper">
    <a class="success-link" href="messages.php" class="messages-link">Вернуться к сообщениям от пользователей</a>
    <span class="success-message">Ваш ответ был отправлен пользователю.</span>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>
