<?php
declare(strict_types=1);
use Thomd729\Itblog\Admin\Article;

$categoryId = ! empty($_GET['categoryId'])
? (int) $_GET['categoryId'] : Article::getFirstCategory($pdo);

if (! empty($_POST['searchPattern'])) {
    $searchPattern = strip_tags($_POST['searchPattern']);

    $articlesAmount = findSearchArticlesAmount($pdo,
    $categoryId, $searchPattern);

    $articles = findSearchArticles($pdo, $categoryId, 
    $searchPattern);
}

$articlesAmount = ! empty($articlesAmount) 
? $articlesAmount[0]['amount'] : 0;

function findSearchArticlesAmount(object $pdo, int $categoryId, 
string $searchPattern): array
{
    return Article::findSearchArticlesAmount($pdo, $categoryId, 
    $searchPattern);
}

function findSearchArticles(object $pdo, int $categoryId, 
string $searchPattern): object
{
    return Article::findSearchArticles($pdo, $categoryId, 
    $searchPattern);
}