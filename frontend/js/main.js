// menu
var btn = document.querySelector(".menu");
btn.addEventListener("click", function() {
  var navigation = document.querySelector(".navigation__nav");
  navigation.classList.toggle("active");

  var span = document.querySelector(".menu__span");

  span.classList.toggle("active--span");
});

// nav hiding on scroll

var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currnetScrollpos = window.pageYOffset;

  if (this.prevScrollpos > currnetScrollpos) {
    this.document.getElementById("navbar").style.transform = "translateY(0)";
  } else {
    this.document.getElementById("navbar").style.transform =
      "translateY(-200px)";
  }

  this.prevScrollpos = currnetScrollpos;
};
//slider

var swiper = new Swiper(".swiper-container", {
  slidesPerView: 1,
  spaceBetween: 20,
  // init: false,
  pagination: {
    el: ".swiper-pagination"
    // clickable: true
  },
  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  breakpoints: {
    300: {
      slidesPerView: 1,
      spaceBetween: 20,
      grabCursor: true
    },
    600: {
      slidesPerView: 2,
      spaceBetween: 50,
      grabCursor: true
    },
    800: {
      slidesPerView: 3,
      spaceBetween: 50,
      grabCursor: true
    },
    1000: {
      slidesPerView: 3,
      spaceBetween: 50,
      grabCursor: true
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 50
      //
    }
  }
});
