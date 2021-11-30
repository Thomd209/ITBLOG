<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/checkAccess.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/admin/answers/answer.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php');
?>

<div class="wrapper-feedBack">
    <a href="messages.php" class="messages-link">Вернуться к сообщениям от пользователей</a>
    <?php if (! empty($_GET['login'])): ?>
        <h3 class="feedBack-title">Ответ пользователю с логином <?= $_GET['login'] ?></h3>
    <?php endif; ?>
    <form method="post">
        <div class="form-group">
            <label for="answer">Сообщение:</label>
            <textarea class="feedBack-message" name="answer" id="answer"></textarea>
        </div>
        <div class="form-group">
            <label for="date">Дата:</label>
            <input type="date" name="date" id="date">
        </div>
        <button class="btn-send-feedBack btn btn-dark">Отправить сообщение</button>
    </form>
    <?php if (! empty($_POST) && ! empty($error)): ?>
        <span class="error"><?= $error ?></span>
    <?php endif; ?>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>