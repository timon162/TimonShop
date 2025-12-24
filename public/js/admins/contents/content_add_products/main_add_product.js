$(".header-add-content").on("click", ".item-title-add-content", function () {
    $(".item-title-add-content").removeClass("active");
    $(".form-add-content").removeClass("active");

    $(this).addClass("active");
    $("#" + $(this).data("target")).addClass("active");
});
