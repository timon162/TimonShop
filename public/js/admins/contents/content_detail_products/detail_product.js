$(".background-click").on("click", function (e) {
    e.preventDefault();
    $(".detail-information-option").css("display", "none");
    $(".wrap-information-product").css("opacity", 1);
});

$(".show-all-information").on("click", function (e) {
    e.preventDefault();
    $(".detail-information-option").css("display", "flex");
    $(".wrap-information-product").css("opacity", 0.5);
});
