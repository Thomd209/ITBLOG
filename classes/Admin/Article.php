<?php
declare(strict_types=1);
namespace Thomd729\Itblog\Admin;
use Thomd729\Itblog\Publication;

class Article extends Publication
{
    private string $title;
    private string $summary;
    private array $image;
    private string $content;
    private string $date;
    private int $category;

    public function __construct(string $title, 
    string $summary, array $image,  string $content,
    string $date, int $category)
    {
        $this->title = $title;
        $this->summary = $summary;
        $this->image = $image;
        $this->content = $content;
        $this->date = $date;
        $this->category = $category;
    }

    public static function findSearchArticles(object $pdo, 
    int $categoryId,  $pattern): object 
    {
        $query = 'SELECT article.id, 
        articleTitle, categoryTitle, article.publicationDate 
        FROM article JOIN category 
        ON article.categoryId = category.id 
        WHERE categoryId = ? AND articleTitle LIKE ?
        OR lower(articleTitle) LIKE ? 
        GROUP BY article.id, articleTitle, categoryTitle, 
        article.publicationDate';
        $stm = $pdo->prepare($query);
        $stm->execute([$categoryId, "$pattern%", "$pattern%"]);

        return $stm;
    }

    public static function getArticles($pdo, $categoryId, 
    $startId): object
    {
        $limit = 5;
        $query = 'SELECT article.id, articleTitle, categoryTitle,
        publicationDate FROM article JOIN category
        ON article.categoryId = category.id
        WHERE categoryId = ? AND article.id > ? LIMIT ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$categoryId, $startId, $limit]);

        return $stm;
    }

    public function addArticle(object $pdo,  $image): void
    {
        $query = 'INSERT INTO article (articleTitle,
        summary, image, content, publicationDate, categoryId)
        VALUES (?, ?, ?, ?, ?, ?)';
        $stm = $pdo->prepare($query);
        $stm->execute([$this->title, $this->summary, $image, 
        $this->content, $this->date, $this->category]);

        self::redirect();
    }

    public static function getArticleForUpdate(object $pdo, 
    int $id): array
    {
        $query = 'SELECT article.id, articleTitle, summary, 
        category.categoryTitle, image, content, publicationDate 
        FROM article JOIN category 
        ON article.categoryId = category.id WHERE article.id = ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$id]);

        return $stm->fetchAll();
    }

    public function updateArticle(object $pdo,  $image, 
    int $id): void 
    {
        $query = 'UPDATE article SET articleTitle = ?,
        summary = ?, image = ?, content = ?, publicationDate = ?,
        categoryId = ? WHERE id = ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$this->title, $this->summary, $image,
        $this->content, $this->date, $this->category, $id]);

        self::redirect();
    }

    public static function deleteArticle(object $pdo, 
    int $id): void 
    {
        $query = 'DELETE FROM article WHERE id = ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$id]);

        self::redirect();
    }

    private static function redirect(): void 
    {
        header('Location: http://itblog_host.com/templates/admin/articles/articles.php');
    }

    public static function findImage(object $pdo, int $id): string
    {
        $query = 'SELECT image FROM article WHERE id = ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$id]);

        return $stm->fetchAll()[0]['image'];
    }

    public static function deleteImage( $image): void 
    {
        if (file_exists($image)) {
            unlink($image);
        }
    }

    public function downloadImage(object $pdo): string
    {
        $from = $this->image['tmp_name'];
        $category = self::getCategory($pdo);

        $filePath = '../../../public/images/' . $category . '/';
        $fileName = $this->image['name'];

        $to = $filePath . $fileName;
        move_uploaded_file($from, $to);

        return $to;
    }

    private function getCategory(object $pdo): string
    {
        $query = 'SELECT categoryTitle FROM category WHERE
        id = ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$this->category]);

        return $stm->fetchAll()[0]['categoryTitle'];
    }
}