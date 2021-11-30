document.addEventListener('DOMContentLoaded', hideBtnNextArticles);

function hideBtnNextArticles() {
    const rowsAmount = getRowsAmount();
    const biggestId = getBiggestId();
    const lastRowId = getLastRowId();

    if (rowsAmount < 6 || rowsAmount >= 6 && biggestId == lastRowId) {
        btnNextArticles.style.display = 'none';
    }
}

function getRowsAmount() {
    const articles = document.querySelector('.articles-amount');

    return ! isNaN(articles.dataset.articlesAmount) 
    ? articles.dataset.articlesAmount : 0;
}

function getBiggestId() {
    const biggestId = document.querySelector('.biggest-id');

    return biggestId.dataset.biggestId == ''
    ? '' : biggestId.dataset.biggestId;
}
