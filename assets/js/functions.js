var lastScrollTop;

$.fn.isInViewport = function() {

  var w = $(window).width();

  if (w < 1024) {
    var elementTop = $(this).offset().top + $(window).height() / 2;
  } else {
    var elementTop = $(this).offset().top + $(window).height() / 2;
  }

  var elementBottom = elementTop + $(this).outerHeight();

  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();

  return elementBottom > viewportTop && elementTop < viewportBottom;
};

var anim_1 = true;
var anim_2 = true;

function animateIn(type) {

  if (type == "anim_1") {

    if (anim_1) {
      console.log("show");

      var el = $(".lines").find("svg");

      var $svg = el.drawsvg({
        duration: 2000,
        callback: function() {}
      });

      $svg.drawsvg('animate');

      $(".isAnimate").addClass("show");

    }

    anim_1 = false;
  }

  if (type == "anim_2") {

    if (anim_2) {
      console.log("show");

      $(".isAnimate").addClass("show");

    }

    anim_2 = false;
  }

}

function Scroll(status) {

  var st = status.offset.y;

  if (st > 125) {
    $(".header").addClass("hidden");

    if (st > lastScrollTop) {
      $(".header").addClass("hidden");
      $(".header").removeClass("sticky");
    } else {
      $(".header").removeClass("hidden");
      $(".header").addClass("sticky");
    }

    lastScrollTop = st;

  } else {
    $(".header").removeClass("hidden");
  }

  var isAnimate = $(".isAnimate");

  if ($("body").hasClass("page-template-home") || $("body").hasClass("page-template-about")) {

    isAnimate.each(function() {

      var me = $(this);

      if (me.isInViewport()) {
        var anim = me.data("anim");
        animateIn(anim);
      }

    });

  }

}

function getAbout() {

  $.ajax({
    type: 'POST',
    url: $("body").data("ajaxurl"),
    data: {
      action: 'getAbout',
    },
    dataType: 'html',
    success: function(result) {
      var pop = $(".about-popup");
      pop.html(result);
      new LazyLoad();

      var more = pop.find(".more")

      more.on("click tap", function() {
        pop.removeClass("show");
        return false;
      });

    },
    error: function(result) {
      console.log(result);
    }
  });

}