<?php
declare(strict_types=1);
namespace Thomd729\Itblog;

abstract class Publication 
{
    abstract public static function findSearchArticles(object $pdo, 
    int $categoryId, string $pattern): object;

    abstract public static function getArticles(object $pdo, 
    int $categoryId, int $startId): object;

    public static function getCategoriesAmount($pdo): array
    {
        $query = 'SELECT COUNT(*) as amount FROM category';
        $stm = $pdo->query($query);

        return $stm->fetchAll();
    }

    public static function getArticlesAmount(object $pdo, 
    int $categoryId): array
    {
        $query = "SELECT COUNT(*) as amount FROM article
        WHERE categoryId = ?";
        $stm = $pdo->prepare($query);
        $stm->execute([$categoryId]);
        
        return $stm->fetchAll();
    }

    public static function getFirstCategory($pdo): array
    {
        $limit = 1;
        $query = 'SELECT id FROM category
        LIMIT ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$limit]);

        return $stm->fetchAll();
    }

    public static function getBiggestId(object $pdo,
    int $categoryId): array 
    {
        $limit = 1;
        $query = 'SELECT id FROM article WHERE categoryId = ?
        ORDER BY id DESC LIMIT ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$categoryId, $limit]);
        
        return $stm->fetchAll();
    }

    public static function findSuggestions(object $pdo, 
    int $categoryId, string $pattern): object 
    {
        $query = 'SELECT articleTitle FROM article 
        WHERE categoryId = ? AND articleTitle LIKE ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$categoryId, "$pattern%"]);

        return $stm;
    }

    public static function findSearchArticlesAmount(object $pdo, 
    int $categoryId, string $pattern): array
    {
        $query = 'SELECT COUNT(*) as amount FROM article 
        WHERE categoryId = ? AND articleTitle LIKE ?
        OR lower(articleTitle) LIKE ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$categoryId, "$pattern%", "$pattern%"]);

        return $stm->fetchAll();
    }
}