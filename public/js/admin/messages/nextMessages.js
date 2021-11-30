const btnFeedbacks = document.querySelector('.btn-next-feedbacks');
btnFeedbacks.addEventListener('click', function() {
    const url = 'http://itblog_host.com/scripts/admin/answers/messages.php';
    const startId = getLastRow();
    const formData = new FormData();
    formData.append('startId', startId);

    feedbacksRequest(url, formData)
    .then(
        response => response.text()
    ).then(
        text => {
            const feedbacks = findFeedbacks();
            feedbacks.innerHTML += text;
            defineBtn();
        }
    ).catch(
        error => {
            console.log(`Some error as ${error} was occured`);
        }
    )
});

async function feedbacksRequest(url, formData) {
    const response = await fetch(url, {
        method: 'POST',
        body: formData
    });

    return response;
}

function findFeedbacks() {
    return document.querySelector('.feedbacks');
}