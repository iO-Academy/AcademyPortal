document.getElementById('submitApplicant').addEventListener('click', function (e) {
    e.preventDefault()
    let formData = document.querySelectorAll(".form-control")
    let data = {}
    formData.forEach(function (formItem) {
        data[formItem.name] = formItem.value
    })
    console.log(data)
})
