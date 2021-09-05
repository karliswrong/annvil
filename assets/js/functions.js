var lastScrollTop;

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

  // console.log(st);

}