const inputSearch = document.querySelector('.input-search');
inputSearch.addEventListener('keydown', searchSuggestions);

function searchSuggestions() {
    const url = 'http://itblog_host.com/scripts/searchSuggestions.php';
    const form = findForm();
    const formData = createSearchSuggestionsFormData(form);

    requestSuggestions(url, formData).then(
        response => response.text()
    ).then(
        text => {
            console.log(text);
            const suggestions = findSuggestions();
            suggestions.innerHTML = text;
        }
    ).catch(
        error => alert(`Such error as ${error} was occured.`)
    )
}

function findForm() {
    const form = document.querySelector('.search-form');

    return form;
}

function createSearchSuggestionsFormData(form) {
    const formData = new FormData(form);
    const params = location.search;
    const id = params.split('=');

    typeof id[1] !== 'undefined' 
    ? formData.append('categoryId', id[1])
    : formData.append('categoryId', 0);

    return formData;
}

async function requestSuggestions(url, formData) {
    const response = await fetch(url, {
        method: 'POST',
        body: formData
    });

    return response;
}

function findSuggestions() {
    const suggestions = document.querySelector('.suggestions');

    return suggestions;
}