const urlParams = new URLSearchParams(window.location.search);
const urlID = urlParams.get('id');
 document.querySelectorAll('#lockToggle').forEach(toggleLock => {
        toggleLock.addEventListener('click',(e) => {
            const fieldName = toggleLock.dataset.field;
            const URL = `http://localhost:8080/api/lockApplicantField?id=${urlID}&field=${fieldName}`;
                fetch(URL)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                                e.target.classList.toggle("bi-unlock");
                                e.target.classList.toggle("bi-lock");
                        } else {
                                document.querySelector(`#${fieldName}Error`).textContent = data.message;
                                document.querySelector(`#${fieldName}Error`).classList.toggle('hidden');
                        }
                    })
                    .catch(error => {
                        document.querySelector(`#${fieldName}Error`).innerHTML = "Error, the lock toggle not working";
                        document.querySelector(`#${fieldName}Error`).classList.toggle('hidden');
                    })
        })
    });