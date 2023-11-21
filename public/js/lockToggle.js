const urlParams = new URLSearchParams(window.location.search);
const urlID = urlParams.get('id');
 document.querySelectorAll('.lockToggle').forEach(toggleLock => {
        toggleLock.addEventListener('click',(e) => {
            const fieldName = toggleLock.dataset.field;
            const fieldNameError = document.querySelector(`#${fieldName}Error`);
            const URL = `http://localhost:8080/api/lockApplicantField?id=${urlID}&field=${fieldName}`;
                fetch(URL)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                                e.target.classList.toggle("bi-unlock");
                                e.target.classList.toggle("bi-lock");
                        } else {
                                fieldNameError.textContent = data.message;
                                fieldNameError.classList.toggle('hidden');
                        }
                    })
                    .catch(error => {
                        fieldNameError.innerHTML = "Error, the lock toggle not working";
                        fieldNameError.classList.toggle('hidden');
                    })
        })
    });