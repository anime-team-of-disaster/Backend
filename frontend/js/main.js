var btn = document.querySelector(".menu");
btn.addEventListener("click", function() {
  var navigation = document.querySelector(".navigation__nav");
  navigation.classList.toggle("active");

  var span = document.querySelector(".menu__span");

  span.classList.toggle("active--span");
});

//slider

var swiper = new Swiper(".swiper-container", {
  slidesPerView: 1,
  spaceBetween: 10,
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
    640: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 40
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 50
    },
    1400: {
      slidesPerView: 5,
      spaceBetween: 50
      // grabCursor: true
    }
  }
});
