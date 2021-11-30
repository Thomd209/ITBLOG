<?php
declare(strict_types=1);
namespace Thomd729\Itblog;

class Restore 
{
    public static function findlogin(object $pdo, 
    string $email): array
    {
        $query = 'SELECT login FROM user WHERE email = :email';
        $stm = $pdo->prepare($query);
        $stm->bindValue(':email', $email);
        $stm->execute();

        return $stm->fetchAll();
    }

    public static function saveTmpPassword(object $pdo, 
    string $login): void 
    {
        $query = 'UPDATE user SET password = :password 
        WHERE login = :login';
        $stm = $pdo->prepare($query);
        $stm->bindValue(':password', $login);
        $stm->bindValue(':login', $login);
        $stm->execute();
    }

    public static function changePassword(object $pdo, 
    string $password): void 
    {
        $query = 'UPDATE user SET password = :password 
        WHERE login = password';
        $stm = $pdo->prepare($query);
        $stm->bindValue(':password', $password);
        $stm->execute();
    }
}