<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/restore/newPassword.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php');
?>

<div class="signIn-form-wrapper">
    <h3 class="sighIn-title">Смена пароля</h3>
    <form class="signIn-form" method="post">
        <div class="signIn-form-group">
            <label class="signIn-label" for="password">Пароль:</label>
            <input class="signIn-input" type="text" name="password" id="password">
        </div>
        <button class="btn-submit btn btn-dark">Сменить пароль</button>
    </form>
    <?php if (! empty($_POST)): ?>
        <span class="error"><?= $error ?></span>
    <?php endif; ?>
</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>
