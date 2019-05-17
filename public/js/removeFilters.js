let searchBarBox = document.querySelector('#searchBar')
let applyBtn = document.querySelector('.apply')

/**
 *   resets all the hidden rows (show all)
 */
function clearFilter() {
    tableRows.forEach(function(tableRow) {
        if(tableRow.classList.contains('hidden')){
            tableRow.classList.remove('hidden')
        }
    })
}

/**
 *  removes the content/value of search bar box
 */
function removeSearchBarText(){
    document.querySelector('#searchBar').value = ' '
}

/**
 * removes date filters when search bar box is clicked
 */
function removeSearchFilter() {
    searchBarBox.addEventListener('focus', function () {
        clearFilter()
    })
}

/**
 * removes search filter and clears search bar box when applyBtn is clicked
 */
function removeDateFilter() {
    applyBtn.addEventListener('click', function () {
        clearFilter()
        removeSearchBarText()
    })
}

removeSearchFilter()
removeDateFilter()
