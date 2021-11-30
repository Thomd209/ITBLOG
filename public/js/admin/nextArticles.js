const btnNextArticles = document.querySelector('.btn-next-articles');
btnNextArticles.addEventListener('click', showNextArticles);

function showNextArticles() {
    const url = 'http://itblog_host.com/scripts/admin/articles/getArticles.php';
    const formData = createFormDataNextArticles();

    requestNextArticles(url, formData)
    .then(
        response => response.text(),
    ).then(
        text => {
            const tableBody = getTableBody();
            tableBody.innerHTML += text;
            hideBtnNextArticles();
        }
    ).catch(
        error => {
            alert(`Such error as ${error} was occured`);
        }
    )
}

function createFormDataNextArticles() {
    const lastRowId = getLastRowId();
    
    const formData = new FormData();
    formData.append('startId', lastRowId);

    return formData;
}

function getLastRowId() {
    const rows = document.querySelectorAll('.table-row');

    return rows.length == 0 ? 0 : rows[rows.length - 1].dataset.id;
}

function getTableBody() {
    const tableBody = document.querySelector('.table-body');

    return tableBody;
}

async function requestNextArticles(url, formData) {
    const response = await fetch(url, {
        method: 'POST',
        body: formData
    });
    
    return response;
}