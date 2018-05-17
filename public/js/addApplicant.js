let getFormOptions = () => {
    return fetch('/api/applicationForm')
    .then(res => res.json())
    .then(myJson => myJson)
}
console.log(getFormOptions())