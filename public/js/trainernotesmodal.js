let trainerNames = document.querySelectorAll('.myBtn')
trainerNames.forEach(trainer => {
    trainer.addEventListener('click' , (e) => {
        document.querySelector('#name').textContent = e.target.dataset.name
        document.querySelector('#notes').textContent = e.target.dataset.notes
        document.querySelector('#trainerNotesModal').modal()
    })
})