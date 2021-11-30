<?php
declare(strict_types=1);
namespace Thomd729\Itblog;

abstract class Feedback
{
    public static function getBiggestId(object $pdo): array 
    {
        $query = 'SELECT MAX(id) as maxId FROM user_message';
        $stm = $pdo->query($query);

        return $stm->fetchAll();
    }

    public static function getSmallestId(object $pdo): array 
    {
        $query = 'SELECT MIN(id) as minId FROM user_message';
        $stm = $pdo->query($query);

        return $stm->fetchAll();
    }

    public static function getRowsAmount(object $pdo): array 
    {
        $query = 'SELECT COUNT(id) as rowsAmount 
        FROM user_message';
        $stm = $pdo->query($query);

        return $stm->fetchAll();
    }
}