<?php
declare(strict_types=1);
use Thomd729\Itblog\User\Article;

$categoryId = ! empty($_GET['categoryId']) 
? (int) $_GET['categoryId'] : 1;

$articlesAmount = 0;

if (! empty($_POST['searchPattern'])) {
    $pattern = $_POST['searchPattern'];

    $articlesAmount = findSearchArticlesAmount($pdo, $categoryId, 
    $pattern)[0]['amount'];

    $articles = findSearchArticles($pdo, $categoryId, $pattern);
}

function findSearchArticlesAmount(object $pdo, int $categoryId, 
string $pattern): array
{
    return Article::findSearchArticlesAmount($pdo, $categoryId, 
    $pattern);
}

function findSearchArticles(object $pdo, int $categoryId,
string $pattern): object
{
    return Article::findSearchArticles($pdo, $categoryId, $pattern);
}
