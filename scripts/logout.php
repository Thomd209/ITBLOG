<?php
setcookie('login', "", -7200, '/');
setcookie('PHPSESSID', "", -7200, '/');
$_SESSION = [];

header('Location: http://itblog_host.com');