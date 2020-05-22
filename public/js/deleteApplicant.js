const deleteButtons = document.querySelectorAll('.deleteBtn');
deleteButtons.forEach(deleteBtn => {
    deleteBtn.addEventListener('click', (e) => {
        const id = e.target.dataset.id;
        fetch('/api/deleteApplicant', {
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
