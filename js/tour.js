// Source: adapted from 2019-S1 DECO1400 Website Assignment, "The Little Rover That Could", Josh Hill

let tourPages = document.querySelectorAll(".tourpage");
let current = 0;
let prevBtn = document.querySelector(".prev")
let nextBtn = document.querySelector(".next")

// calls the first page to show
startpage();

// listens for clicks to either advance a page or go back a page
prevBtn.addEventListener('click', function () {
    if (current === 0) {
        current = tourPages.length;
    }
    slideLeft();
})

nextBtn.addEventListener('click', function () {
    if (current === tourPages.length - 1) {
        current = -1;
    }
    nextBtn.hide("fade");
    prevBtn.hide("fade");
    slideRight();
})

// reset function to call on each page action to shift through the array of divs correctly so they don't overlap and show on top of eachother
function reset() {
    for (let i = 0; i < tourPages.length; i++) {
        $(tourPages[i]).hide("fade");
    }
}

function startpage() {
    reset();
    nextBtn.show("fade");
    prevBtn.show("fade");
    $(tourPages[0]).show("fade")
    
}
// move slide left and right with slow transition time and using the fade effect from jQueryUI
function slideLeft() {
    reset();
    nextBtn.show("fade");
    prevBtn.show("fade");
    $(tourPages[current - 1]).show("fade", 2000);
    current--;

}

function slideRight() {
    reset();
    nextBtn.show("fade");
    prevBtn.show("fade");
    $(tourPages[current + 1]).show("fade", 2000)
    current++;
}