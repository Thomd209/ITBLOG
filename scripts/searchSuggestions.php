<?php
declare(strict_types=1);

require_once($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/scripts/getPDO.php');

use Thomd729\Itblog\Publication;

if (! empty($_POST['searchPattern'])) {
    $categoryId = ! empty($_POST['categoryId']) 
    ? (int) $_POST['categoryId']
    : Publication::getFirstCategory($pdo)[0]['id'];
    
    $searchPattern = strip_tags($_POST['searchPattern']);

    $suggestions = Publication::findSuggestions($pdo, $categoryId, 
    $searchPattern);
}
?>

<ul class="suggestions-list">
    <?php if (! empty($suggestions)): ?>
        <?php foreach ($suggestions as $suggestion): ?>
            <li class="suggestion"><?= $suggestion['articleTitle'] ?></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>