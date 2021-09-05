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

});