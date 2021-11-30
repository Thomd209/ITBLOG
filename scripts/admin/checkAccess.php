<?php
session_start();

if (empty($_SESSION['user']) || ! empty($_SESSION['user']) && $_SESSION['user']['login'] !== 'thomd729'
    && ! password_verify('redFish99', $_SESSION['user']['hash'])) {

    header('Location: http://itblog_host.com');
}