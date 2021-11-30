<?php
declare(strict_types=1);
namespace Thomd729\Itblog;

class Category
{
    private string $name;
    private static string $imagesPath = 
    '../../../public/images/';

    public function __construct(string $name) 
    {
        $this->name = $name;
    }

    public static function getCategories(object $pdo): object
    {
        $query = "SELECT id, categoryTitle FROM category";
        $stm = $pdo->query($query);

        return $stm;
    }

    public function addCategory(object $pdo): void
    {
        $query = 'INSERT INTO category (categoryTitle) 
        VALUES (?)';
        $stm = $pdo->prepare($query);
        $stm->execute([$this->name]);

        self::redirect();
    }

    public function createDirectory(): object 
    {
        $dirname = self::$imagesPath . $this->name;

        if (! is_dir($dirname)) {
            mkdir($dirname);
        }

        return $this;
    }

    public function updateCategory(object $pdo, int $id): void
    {
        $query = 'UPDATE category SET categoryTitle = :name
        WHERE id = :id';

        $stm = $pdo->prepare($query);
        $stm->bindValue(':name', $this->name);
        $stm->bindValue(':id', $id);
        $stm->execute();

        self::redirect();
    }

    public function renameDirectory(string $oldName): object
    {
        $oldPath = self::$imagesPath . $oldName;

        $newPath = self::$imagesPath . $this->name;

        if (is_dir($oldPath)) {
            rename($oldPath, $newPath);
        }

        return $this;
    }

    public static function deleteCategory(object $pdo, int $id): void
    {
        $query = 'DELETE FROM category WHERE id = ?';
        $stm = $pdo->prepare($query);
        $stm->execute([$id]);

        self::redirect();
    }

    public static function deleteDirectory(string $name): void
    {
        if (is_dir(self::$imagesPath . $name)) {
            rmdir(self::$imagesPath . $name);
        }
    }

    private static function redirect(): void 
    {
        header('Location: http://itblog_host.com/templates/admin/categories/categories.php');
    }
}