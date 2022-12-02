var dropdownElements = document.querySelectorAll("li.dropdown");

console.log(dropdownElements);

for(var dropdownElement of dropdownElements) {
    var dropdownIcon = dropdownElement.querySelector("i.subnav-toggler");
    var dropdownMenu = dropdownElement.querySelector("ul.dropdown-menu");

    var subnavDisplayed = dropdownMenu.style.display === "block";

    console.log(subnavDisplayed);
    
    if(subnavDisplayed) {
        dropdownIcon.classList.remove('fa-caret-down');
        dropdownIcon.classList.add('fa-caret-up');
    }
    else {
        dropdownIcon.classList.remove('fa-caret-up');
        dropdownIcon.classList.add('fa-caret-down');
    }
}