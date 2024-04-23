document.querySelector('.completed-courses-btn').addEventListener('click', () => {
    document.querySelector('#completed-courses').classList.toggle('hidden')
})

document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.querySelector('.courseCategoryFilter');
    // Set the dropdown based on the URL parameter
    const urlParams = new URLSearchParams(window.location.search);
    const categoryParam = urlParams.get('category');
    if (categoryParam) {
        dropdown.value = categoryParam;
    }
    // Event listener for changing the dropdown
    dropdown.addEventListener('change', () => {
        const selectedValue = dropdown.value;
        window.location.href = `/courses?category=${selectedValue}`;
    });
});