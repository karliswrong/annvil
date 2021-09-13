var Scrollbar, scrollbar;

$(document).ready(function() {

  var body = $("body");

  new LazyLoad();

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

});

$(document).on("click tap", ".welcome a.more", function() {
  console.log("show more");
  var pop = $(".about-popup");
  pop.addClass("show");
  return false;
});

$(document).on("click tap", ".header a.show-mob-nav", function() {
  $(".mobile-nav").stop().slideDown("fast");
  return false;
});

$(document).on("click tap", ".mobile-nav a.close-mob-nav", function() {
  $(".mobile-nav").stop().slideUp("fast");
  return false;
});