const btnNextArticles = document.querySelector('.btn-next-articles');
btnNextArticles.addEventListener('click', showNextArticles);

function showNextArticles() {
    const url = 'http://itblog_host.com/scripts/user/articles/getArticles.php';
    const formData = createFormDataNextArticles();

    requestNextArticles(url, formData)
    .then(
        response => response.text()
    ).then(
        text => {
            const articles = getArticlesBlock();
            articles.innerHTML += text;
            hideBtnNextArticles();
        }
    ).catch(
        error => {
            alert(`Such error as ${error} was occured`);
        }
    )
}

function createFormDataNextArticles() {
    const lastRowId = getLastArticle();
    
    const formData = new FormData();
    formData.append('startId', lastRowId);

    return formData;
}

function getArticlesBlock() {
    const block = document.querySelector('.articles');

    return block;
}

async function requestNextArticles(url, formData) {
    const response = await fetch(url, {
        method: 'POST',
        body: formData
    });
    
    return response;
}