<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/signUp.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/header.php');
?>
<div class="signUp-form-wrapper">
    <h3 class="sighUp-title">Регистрация</h3>
    <form class="signUp-form" method="post">
        <div class="signUp-form-group">
            <label class="signUp-label" for="login">Логин:</label>
            <input class="signUp-input" type="text" name="login" id="login">
        </div>
        <div class="signUp-form-group">
            <label class="signUp-label" for="password">Пароль:</label>
            <input class="signUp-input" type="text" name="password" id="password">
        </div>
        <div class="signUp-form-group">
            <label class="signUp-label" for="email">Email:</label>
            <input class="signUp-input" type="text" name="email" id="email">
        </div>
        <button class="btn-submit btn btn-dark">Зарегистрироваться</button>
    </form>
    <?php if (! empty($_POST)): ?>
        <span class="error"><?= $error ?></span>
    <?php endif; ?>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/include/footer.php'); ?>