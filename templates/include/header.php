<?php 
if (! isset($_SESSION)) {
    session_start();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITBLOG</title>
    <link rel="stylesheet" href="http://itblog_host.com/public/css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="http://itblog_host.com/public/css/style.css"></link>
</head>
<body>
    <header>
        <a class="title" href="http://itblog_host.com">ITBLOG</a>
        <ul class="entry-point">
            <?php if (empty($_SESSION['user'])): ?>
                <li class="entry-point-item">
                    <a href="http://itblog_host.com/templates/signUp.php" class="entry-point-item-link">Регистрация</a>
                </li>
                <li class="entry-point-item">
                    <a href="http://itblog_host.com/templates/signIn.php" class="entry-point-item-link">Вход</a>
                </li>
            <?php endif; ?>
            <?php if (! empty($_SESSION['user']) && ! empty($_COOKIE['login'])): ?>
                <li class="entry-point-item">
                    <span class="login"><?= $_COOKIE['login'] ?></span>
                </li>
            <?php endif; ?>
        </ul>
    </header>