$(".l-header__left__menu__botton").click(function () {
  $(".l-sidebar").toggleClass("__is-open");
  $(".l-sidebar__batsu").toggleClass("__is-open")
});

$(".l-sidebar__batsu").click(function () {
  $(".l-sidebar").toggleClass("__is-open");
  $(".l-sidebar__batsu").toggleClass("__is-open")
});