var lastScrollTop;

function Scroll(status) {

  var st = status.offset.y;

  if (st > 125) {
    $(".header").addClass("hidden");
  } else {
    $(".header").removeClass("hidden");
  }

  if (st > lastScrollTop) {
    $(".header").addClass("hidden");
    $(".header").removeClass("sticky");
  } else {
    $(".header").removeClass("hidden");
    $(".header").addClass("sticky");
  }

  lastScrollTop = st;

  // console.log(st);

}