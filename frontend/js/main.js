var btn = document.querySelector(".menu");
btn.addEventListener("click", function() {
  var change = document.querySelector(".navigation__nav");

  change.classList.toggle("active");
});
