<?php
session_start();

if (empty($_SESSION['user'])) {
    header('Location: http://itblog_host.com/');
}