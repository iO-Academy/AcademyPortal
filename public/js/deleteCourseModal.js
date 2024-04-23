function testingClick(){
    console.log('testing click');
}
let deleteButtons  = document.querySelectorAll('.btnDeleteCourse');
for (let db of deleteButtons) {
    let courseId = db.getAttribute('data-courseId');
    console.log(courseId);
    db.addEventListener("click", () => {
        const courseIdTag = document.querySelector('#courseId');
        courseIdTag.innerHTML=courseId;
        console.log(courseId)
    });
}
