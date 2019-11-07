//search ajax

// var inputText = document.getElementById('search_text');
// inputText.addEventListener('click', function () {

//   var inputResult = document.getElementById('result');

//   inputResult.classList.toggle('active-form');


// });

var inputText = document.getElementById('search_text');
inputText.addEventListener('click', function (event) {
  event.stopPropagation();
  var inputResult = document.getElementById('result');
  inputResult.classList.toggle('active-form');

});
document.body.addEventListener("click", function () {
  var inputResult = document.getElementById('result');
  inputResult.classList.remove('active-form');

});

// var inputText = document.getElementById('search_text');
// var inputResult = document.getElementById('result');

// inputText.addEventListener('focus', function () {
//   inputResult.classList.add('active-form');
// });

// inputText.addEventListener('focusout', () => {
//   inputResult.classList.remove('active-form');
// });



function runTest() {

  $(document).ready(function () {
    load_data();

    function load_data(query) {
      $.ajax({
        url: "fetch.php",
        method: "post",
        data: {
          query: query
        },
        success: function (data) {
          $('#result').html(data);
        }
      });
    }

    $('#search_text').keyup(function () {
      var search = $(this).val();
      if (search != '') {
        load_data(search);
      } else {
        load_data();
      }
    });
  });

};

runTest();


// menu
var btn = document.querySelector(".menu");
btn.addEventListener("click", function () {
  var navigation = document.querySelector(".navigation__nav");
  navigation.classList.toggle("active");

  var span = document.querySelector(".menu__span");

  span.classList.toggle("active--span");
});

// nav hiding on scroll

var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currnetScrollpos = window.pageYOffset;

  if (this.prevScrollpos > currnetScrollpos) {
    this.document.getElementById("navbar").style.transform = "translateY(0)";
  } else {
    this.document.getElementById("navbar").style.transform =
      "translateY(-200px)";
  }

  this.prevScrollpos = currnetScrollpos;
};

//smoothscroll

const scroll = new SmoothScroll('a[href*="#"]', {
  speed: 800
});

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