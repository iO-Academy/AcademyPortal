document.querySelector('.completed-courses-btn').addEventListener('click', () => {
    document.querySelector('#completed-courses').classList.toggle('hidden')
})

document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.querySelector('.courseCategoryFilter');
    const sortColumn = document.querySelectorAll('.sortHeader');

    // Set the dropdown based on the URL parameter
    const
        urlParams = new URLSearchParams(window.location.search);
    const categoryParam = urlParams.get('category');
    if (categoryParam) {
        dropdown.value = categoryParam;
    }

    // Event listener for changing the dropdown
    dropdown.addEventListener('change', () => {
        const dropdownValue = dropdown.value;
        const headerValue = urlParams.get('sortColumn');
        window.location.href = `/courses?category=${dropdownValue}&sortColumn=${headerValue}`;
    });

    // Event listener for ordering the data by header value
    sortColumn.forEach((item) => {
        item.addEventListener('click', () => {
            const headerValue = item.value;
            const dropdownValue = dropdown.value;
            window.location.href = `/courses?category=${dropdownValue}&sortColumn=${headerValue}`
        })
    })
});