
let currentSlide = 0;

let slides = document.querySelectorAll(".slide");

function showSlide(index) {

    slides.forEach(function(slide) {
        slide.classList.remove("active");
    });

    if (index >= slides.length) {
        currentSlide = 0;
    }
    else if (index < 0) {
        currentSlide = slides.length - 1;
    }
    else {
        currentSlide = index;
    }

    slides[currentSlide].classList.add("active");
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function previousSlide() {
    showSlide(currentSlide - 1);
}

// Automatically change slide every 4 seconds
setInterval(function() {
    nextSlide();
}, 4000);
