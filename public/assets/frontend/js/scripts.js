jQuery(function ($) {
  "use strict";
  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 0) {
      $(".navbar").addClass("affix");
      $(".scroll-to-target").addClass("open");
    } else {
      $(".navbar").removeClass("affix");
      $(".scroll-to-target").removeClass("open");
    }
    if ($(this).scrollTop() > 500) {
      $(".scroll-to-target").addClass("open");
    } else {
      $(".scroll-to-target").removeClass("open");
    }
  });
  if ($(".scroll-to-target").length) {
    $(".scroll-to-target").on("click", function () {
      var target = $(this).attr("data-target");
      $("html, body").animate({ scrollTop: $(target).offset().top }, 500);
    });
  }
  $(".client-testimonial-1").owlCarousel({
    loop: true,
    margin: 30,
    nav: false,
    dots: true,
    responsiveClass: true,
    autoplay: true,
    autoplayHoverPause: true,
    lazyLoad: true,
    items: 1,
  });
  $(".client-testimonial").owlCarousel({
    loop: true,
    margin: 30,
    nav: true,
    dots: false,
    responsiveClass: true,
    autoplay: true,
    autoplayHoverPause: true,
    lazyLoad: true,
    responsive: {
      0: { items: 1 },
      500: { items: 1 },
      600: { items: 2 },
      800: { items: 2 },
      1200: { items: 3 },
    },
  });
  if ($("#auto-type").length) {
    var typed = new Typed("#auto-type", {
      strings: ["Guest Posting", "Link Building", "Content Writing"],
      typeSpeed: 150,
      backSpeed: 150,
      loop: true,
    });
  }
  $("#sites_data_table").DataTable({
    responsive: true,
    pageLength: 100,
    order: [],
    columnDefs: [
      { responsivePriority: 1, targets: 0 },
      { responsivePriority: 2, targets: 1 },
      { responsivePriority: 3, targets: 2 },
      { responsivePriority: 4, targets: 4 },
    ],
  });
});
