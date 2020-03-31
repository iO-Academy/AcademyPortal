
let deleteButton = document.getElementById('deleteBtn')

    deleteButton.addEventListener('click', function (e) {
        let id = e.target.dataset.id

        fetch('/api/deleteApplicant', {
            method: 'DELETE',
            body: JSON.stringify({"id": id}),
            headers: {
                "Content-Type": "application/json"
            } .then(function(response){
            console.log(response.status)
                if (response.status) === 200 {
                    let elem = document
                    } else {
                    //display
                }

        })

        });

    })