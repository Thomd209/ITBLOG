<?php
declare(strict_types=1);
namespace Thomd729\Itblog;

class Registration
{
    public static function doesUserExist(object $pdo, string $login): bool 
    {
        if (! empty(self::findUser($pdo, $login)->fetchAll())) {
            return true;
        }

        return false;
    }

    private static function findUser(object $pdo, string $login): object
    {
        $query = 'SELECT login FROM user WHERE login = :login';

        $stm = $pdo->prepare($query);

        $stm->bindValue(':login', $login);
        $stm->execute();

        return $stm;
    }

    public static function addUser(object $pdo, string $login, string $password,
    string $email): void 
    {
        $query = 'INSERT INTO user (login, password, email, status) VALUES (:login, 
        :password, :email, :user)';

        $stm = $pdo->prepare($query);

        $stm->bindValue(':login', $login);
        $stm->bindValue(':password', $password);
        $stm->bindValue(':email', $email);
        $stm->bindValue(':user', 'user');

        $stm->execute();
    }
}