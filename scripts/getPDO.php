<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/classes/DB.php');

$DB = DB::getInstance();
$pdo = $DB->getConn();