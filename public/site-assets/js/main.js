$(window).on("load", function () {
  "use strict";
  // Loading
  $(".load_cont").fadeOut(function () {
    $(this).parent().fadeOut();
    $("body").css({
      "overflow-y": "visible",
    });
  });
  // Animation
  AOS.init({
    offset: 100,
    duration: 500,
    easing: "ease-in-out",
  });
});

$(window).scroll(function () {
  let scroll = $(window).scrollTop();
  if (scroll >= 47) {
    $(".top_header, header").addClass("move");
  } else {
    $(".top_header, header").removeClass("move");
  }
});

$(document).ready(function () {
  "use strict";
  //up button
  var scrollbutton = $(".up_btn");
  $(window).scroll(function () {
    $(this).scrollTop() >= 500 ? scrollbutton.show() : scrollbutton.hide();
  });
  // Mouse
  function mousecursor() {
    if ($("body")) {
      const e = document.querySelector(".cursor-inner"),
        t = document.querySelector(".cursor-outer");
      let n,
        i = 0,
        o = !1;
      (window.onmousemove = function (s) {
        o ||
          (t.style.transform =
            "translate(" + s.clientX + "px, " + s.clientY + "px)"),
          (e.style.transform =
            "translate(" + s.clientX + "px, " + s.clientY + "px)"),
          (n = s.clientY),
          (i = s.clientX);
      }),
        $("body").on("mouseenter", "a, .cursor-pointer", function () {
          e.classList.add("cursor-hover"), t.classList.add("cursor-hover");
        }),
        $("body").on("mouseleave", "a, .cursor-pointer", function () {
          ($(this).is("a") && $(this).closest(".cursor-pointer").length) ||
            (e.classList.remove("cursor-hover"),
            t.classList.remove("cursor-hover"));
        }),
        (e.style.visibility = "visible"),
        (t.style.visibility = "visible");
    }
  }
  $(function () {
    mousecursor();
  });
  // Blog Slider
  $(".blog_slider").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    smartSpeed: 3000,
    margin: 25,
    autoplay: true,
    responsive: {
      0: { items: 1 },
      577: { items: 2, margin: 15 },
      768: { items: 2 },
      992: { items: 3 },
    },
  });
  // Team Slider
  $(".team_slider").owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    smartSpeed: 3000,
    margin: 25,
    autoplay: true,
    responsive: {
      0: { items: 1, margin: 15 },
      480: { items: 2, margin: 15 },
      577: { items: 3, margin: 15 },
      768: { items: 2 },
      992: { items: 3 },
    },
  });
  //Project
  $(".project_slider").owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    smartSpeed: 3000,
    margin: 0,
    autoplay: true,
    responsive: {
      0: { items: 1 },
      992: { items: 1 },
    },
  });
});
let c = new Date().getFullYear();
this_year.innerHTML = c;
