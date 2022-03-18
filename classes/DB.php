<?php
declare(strict_types=1);

class DB 
{
    private static object $instance;
    const DSN = 'mysql:dbname=itblog;host=127.0.0.1';
    const USER = 'root';
    const PASSWORD = 'redFish99';
    const OPTIONS = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    private function __construct(){}

    public static function getInstance(): object
    {
        if (! isset(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public static function getConn(): object
    {
        $pdo = new PDO(self::DSN, self::USER, self::PASSWORD,
        self::OPTIONS);

        return $pdo;
    }
}