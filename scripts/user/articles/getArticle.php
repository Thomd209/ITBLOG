<?php
use Thomd729\Itblog\User\Article;

if (! empty($_GET['articleId'])) {
    $articleId = (int) $_GET['articleId'];

    $article = Article::getArticle($pdo, $articleId);
    $articleContent = html_entity_decode($article[0]['content']);
}