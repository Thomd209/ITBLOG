document.addEventListener('DOMContentLoaded', hideBtnNextArticles);

function hideBtnNextArticles() {
    const rowsAmount = getRowsAmount();
    const biggestId = getBiggestId();
    const lastArticle = getLastArticle();

    if (rowsAmount < 7 || rowsAmount >= 7 
        && biggestId == lastArticle) {
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
    ? '': biggestId.dataset.biggestId;
}

function getLastArticle() {
    const rows = document.querySelectorAll('.article');

    return rows.length == 0 ? 0 : rows[rows.length - 1].dataset.id;
}
