<?php
declare(strict_types=1);
namespace Thomd729\Itblog\User;
use Thomd729\Itblog\Publication;

class Article extends Publication
{
    public static function findSearchArticles(object $pdo,
    int $categoryId, string $pattern): object
    {
        $query = 'SELECT id, articleTitle, image, publicationDate FROM article 
        WHERE categoryId = ? AND articleTitle LIKE ? OR lower(articleTitle) LIKE ?';
        $stm = $pdo->prepare($query);

        $params = [$categoryId, "$pattern%", "$pattern%"];
        $stm->execute($params);

        return $stm;
    }

    public static function getArticles(object $pdo, 
    int $categoryId, int $startId): object
    {
        $limit = 6;
        $query = 'SELECT id, articleTitle, summary, image,
        publicationDate
        FROM article WHERE categoryId = :categoryId 
        AND id > :startId LIMIT :limit';
        $stm = $pdo->prepare($query);

        $stm->bindValue(':categoryId', $categoryId);
        $stm->bindValue(':startId', $startId);
        $stm->bindValue(':limit', $limit);
        $stm->execute();

        return $stm;
    }

    public static function getArticle(object $pdo, 
    int $articleId): array
    {
        $query = 'SELECT articleTitle, image, publicationDate,
        content FROM article WHERE id = ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$articleId]);

        return $stm->fetchAll();
    }
}