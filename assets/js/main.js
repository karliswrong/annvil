var Scrollbar, scrollbar;

$(document).ready(function() {

  var w = $(window).width();

  var body = $("body");

  var lazy = new LazyLoad();

  console.log(lazy.loadingCount);

  Scrollbar = window.Scrollbar;

  scrollbar = Scrollbar.init(document.getElementById("scroll"), {
    speed: 1,
    damping: 0.1,
    continuousScrolling: true
  });

  scrollbar.addListener(Scroll);

  $(".footer .contact-us .more-button").height($(".footer .contact-us .text").outerHeight());

  var title_h = $(".project-title .title").outerHeight();

  $(".project-title").height(title_h);

  if ($("body").hasClass("page-template-home")) {
    getAbout();
  }

  $(".header a.home").addClass("show");

  $(".header .nav ul li").each(function(i) {
    var me = $(this);

    var int = setInterval(function() {
      me.addClass("show");
    }, 200 * i);

  });

  if (w < 1024) {
    $(".welcome p").each(function(i) {
      var me = $(this);

      var int = setInterval(function() {
        me.addClass("show");
      }, 300 * i);

    });

    $(".page-title, .portfolio-items, .filters, .about-wrapper, .selfwork-items, .contact-wrapper, .project-title, .project-picture, ._404-wrapper, .paklajs").addClass("show");

  } else {

    $(".footer .bottom .links .social").height($(".footer .bottom .links .nav").height());

    setInterval(function() {


      $(".welcome p").each(function(i) {
        var me = $(this);

        var int = setInterval(function() {
          me.addClass("show");
        }, 300 * i);

      });
      $(".page-title, .portfolio-items, .filters, .about-wrapper, .selfwork-items, .contact-wrapper, .project-title, .project-picture, ._404-wrapper, .paklajs").addClass("show");


    }, 700);

  }



});

$(document).on("click tap", ".welcome a.more", function() {
  console.log("show more");
  var pop = $(".about-popup");
  pop.addClass("show");

  $(".about-wrapper").addClass("show");

  return false;
});

$(document).on("click tap", ".header a.show-mob-nav", function() {
  $(".mobile-nav").addClass("show");

  if ($(".mobile-nav").hasClass("show")) {

    setTimeout(function() {
      $(".mobile-nav .menu-header-menu-container").addClass("show");
    }, 500);

    setTimeout(function() {
      $(".mobile-nav .inst").addClass("show");
    }, 1000);


  }

  return false;
});

$(document).on("click tap", ".mobile-nav a.close-mob-nav", function() {
  $(".mobile-nav").removeClass("show");

  if (!$(".mobile-nav").hasClass("show")) {
    $(".mobile-nav .menu-header-menu-container").removeClass("show");
    $(".mobile-nav .inst").removeClass("show");
  }

  return false;
});