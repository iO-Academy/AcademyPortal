
let eventBoxes = document.getElementsByClassName("event")
let clicked = 0

for(i=0;i<eventBoxes.length;i++) {
eventBoxes[i].addEventListener('click', function() {
    clicked++
    if(clicked%2) {
        this.querySelector(".arrowBox").innerHTML = "<span>&#x21E7;</span>"
        this.querySelector('.lower').classList.add("show")
        this.querySelector('.lower').classList.remove("hide")


    }
    else {
        this.querySelector(".arrowBox").innerHTML = "<span>&#x21E9;</span>"
        this.querySelector('.lower').classList.remove("show")
        this.querySelector('.lower').classList.add("hide")

    }
})}