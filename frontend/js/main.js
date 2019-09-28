var btn = document.querySelector(".menu");
btn.addEventListener("click", function() {
  var navigation = document.querySelector(".navigation__nav");
  navigation.classList.toggle("active");

  var span = document.querySelector(".menu__span");

  span.classList.toggle("active--span");
});
