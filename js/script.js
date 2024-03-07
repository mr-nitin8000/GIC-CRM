var navItems = document.querySelectorAll(".mobile-bottom-nav__item");
navItems.forEach(function (e, i) {
  e.addEventListener("click", function (e) {
    navItems.forEach(function (e2, i2) {
      e2.classList.remove("mobile-bottom-nav__item--active");
    });
    this.classList.add("mobile-bottom-nav__item--active");
  });
});
window.onload = function () {
  var elements = document.querySelectorAll(".fade-in");
  elements.forEach(function (element) {
    element.classList.add("active");
  });
};
