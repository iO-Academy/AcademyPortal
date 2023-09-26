
 const toggleLocks = document.querySelectorAll('#lockToggle')
     toggleLocks.forEach(toggleLock => {
         toggleLock.addEventListener('click',(e) => {
             e.target.classList.toggle("bi-lock");
             e.target.classList.toggle("bi-unlock");
         })
     });
