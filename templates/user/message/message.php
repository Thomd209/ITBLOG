<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/user/checkAccess.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/user/message/message.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php');
?>

<div class="wrapper-feedBack">
    <h3 class="feedBack-title">Форма обратной связи</h3>
    <form method="post">
        <div class="form-group">
            <label for="message">Сообщение:</label>
            <textarea class="feedBack-message" name="message" id="message"></textarea>
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