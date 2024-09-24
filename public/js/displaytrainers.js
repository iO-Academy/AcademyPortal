document.querySelectorAll('.clipboard').forEach(button => {

    button.addEventListener('click', (e) => {
        let copyText = e.currentTarget.dataset.email
        navigator.clipboard.writeText(copyText);
        e.currentTarget.innerHTML = '<span>Copied!</span>'
    })
})

const deleteButtons = document.querySelectorAll('.btn-danger');
deleteButtons.forEach(deleteBtn => {
    deleteBtn.addEventListener('click', (e) => {
        const id = e.target.dataset.id;
        fetch('/api/deleteTrainer', {
            method: 'DELETE',
            body: JSON.stringify({"id": id}),
            headers: {
                "Content-Type": "application/json"
            }
        }).then((response) => {
            return response.json();
        }).then((responseData) => {
            document.cookie = `response = ${responseData.message}`;
            window.location.reload();
        });
    });
});