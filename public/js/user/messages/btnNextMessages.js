document.addEventListener('DOMContentLoaded', defineBtn);

function defineBtn() {
    const rowsAmount = getRowsAmount();
    if (rowsAmount > 0) {
        const smallestId = getSmallestId();
        const lastRow = getLastRow();

        if (rowsAmount < 6 || rowsAmount >= 6 
            && smallestId === lastRow) {
            
            hideBtn();
        }
    } else {
        hideBtn();
    }
}

function hideBtn() {
    const btn = document.querySelector('.btn-next-feedbacks');
    btn.style.display = 'none';
}

function getRowsAmount() {
    return document.querySelector('.feedbacks-rows-amount').dataset.rowsAmount;
}

function getSmallestId() {
    return document.querySelector('.feedbacks-smallest-id').dataset.smallestId;
}

function getLastRow() {
    const rows = document.querySelectorAll('.feedback-wrapper');
    const lastRow = rows[rows.length - 1];

    return lastRow.dataset.rowId;
}