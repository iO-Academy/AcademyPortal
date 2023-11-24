const deleteButtons = document.querySelectorAll('.deleteCatBtn');
const deleteError = document.querySelector('.deleteError')
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
            if (responseData.success) {
                window.location.reload();
            } else {
                deleteError.classList.remove('hidden');
                deleteError.innerText = responseData.message;
                setTimeout(() => {
                    deleteError.classList.add('hidden');
                }, 5000);
            }
        } catch (error) {
            deleteError.classList.remove('hidden');
            deleteError.innerText = error.message;
            setTimeout(() => {
                deleteError.classList.add('hidden');
            }, 5000);
        }
    });
});
