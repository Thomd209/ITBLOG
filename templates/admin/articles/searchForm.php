<form class="search-form" action="searchResults.php?categoryId=<?= $categoryId ?>" method="post">
    <label class="label-search" for="search">Найти статью:</label>
    <div class="search-from-group">
        <input class="input-search" type="search" placeholder="Название статьи:" name="searchPattern" id="search">
        <button type="submit" class="btn-search btn btn-primary">Найти</button>
    </div>
</form>
