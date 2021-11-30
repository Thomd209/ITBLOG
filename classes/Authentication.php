<?php
declare(strict_types=1);
namespace Thomd729\Itblog;

class Authentication
{
    public static function checkLogin(object $pdo, string $login): string 
    {
        $user = self::findUser($pdo, $login);

        return ! empty($user) ? $user[0]['password'] : '';
    }

    private static function findUser(object $pdo, string $login): array
    {
        $query = 'SELECT password FROM user WHERE login = :login';
        $stm = $pdo->prepare($query);
        $stm->bindValue(':login', $login);
        $stm->execute();

        return $stm->fetchAll();
    }

    public static function isCorrectPassword(string $password, 
    string $hash): bool 
    {
        return password_verify($password, $hash);
    }

    public static function getStatus(object $pdo, string $login): string 
    {
        $query = 'SELECT status FROM user WHERE login = :login';
        $stm = $pdo->prepare($query);
        $stm->bindValue(':login', $login);
        $stm->execute();

        return $stm->fetchAll()[0]['status'];
    }

    public static function logIn(string $login, string $hash): void 
    {
        session_start();

        setcookie('login', $login, time() + 3600, '/');

        $_SESSION['user'] = [
            'login' => $login,
            'hash' => $hash
        ];
    }
}