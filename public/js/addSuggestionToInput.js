const suggestions = document.querySelector('.suggestions');
suggestions.addEventListener('click', (e) => {
    const searchInput = document.querySelector('.input-search');
    searchInput.value = e.target.innerHTML;
});