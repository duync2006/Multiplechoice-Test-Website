var dropdownElements = document.getElementsByClassName("dropdown");

console.log(dropdownElements.length);

for(var i = 0; i < dropdownElements.length; i++) {
    dropdownElements[i].addEventListener("mouseover", function() {
        var dropdownIcon = this.getElementsByClassName("subnav-toggler");
        dropdownIcon[0].classList.remove("fa-caret-down");
        dropdownIcon[0].classList.add("fa-caret-up");
    })

    dropdownElements[i].addEventListener("mouseout", function() {
        var dropdownIcon = this.getElementsByClassName("subnav-toggler");
        dropdownIcon[0].classList.remove("fa-caret-up");
        dropdownIcon[0].classList.add("fa-caret-down");
    })
}