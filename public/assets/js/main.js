$(function () {
  "use strict";

  $('[data-toggle="offcanvas"]').on("click", function () {
    $(".main-sidebar").toggleClass("sidebar-active");
    $(".hamburger").toggleClass("is-active");
    $('body').toggleClass('sidebar-fixed')
  });
});

WebFont.load({
  google: {
    families: ["Roboto:300,400,500,700,900"],
  },
});