$(function () {
  "use strict";

  $('[data-toggle="offcanvas"]').on("click", function () {
    $(".main-sidebar").toggleClass("sidebar-active");
    $(".hamburger").toggleClass("is-active");
    $('body').toggleClass('sidebar-fixed')
  });
});

$(function () {
  "use strict";

  $('.sidebardrop').on("click", function () {
    $('.main-sidebar-sidebardrop').toggleClass('active-sidebardrop');
  });
});


WebFont.load({
  google: {
    families: ["Roboto:300,400,500,700,900"],
  },
});