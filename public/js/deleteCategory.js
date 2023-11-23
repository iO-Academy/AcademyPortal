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
            if (responseData.success) {
                window.location.reload();
            } else {
                console.error('Error')
            }
        } catch (error) {
            console.error('Error', error);
        }
    });
});
