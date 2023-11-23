const deleteButtons = document.querySelectorAll('.deleteCatBtn');
deleteButtons.forEach(deleteCatBtn => {
    deleteCatBtn.addEventListener('click', async (e) => {
        const id = e.target.dataset.id;

        try {
            const response = await fetch('/api/deleteCategory', {
                method: 'POST',
                body: JSON.stringify({"id": id}),
                headers: {
                    "Content-Type": "application/json"
                }
            });
            const responseData = await response.json();
            document.cookie = `response = ${responseData.message}`;
            window.location.reload();
        } catch (error) {
            console.error('Error', error);
        }
    });
});
