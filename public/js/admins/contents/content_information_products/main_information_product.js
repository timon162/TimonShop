$(".header-information-content").on(
    "click",
    ".item-title-information-content",
    function () {
        $(".item-title-information-content").removeClass("active");
        $(".form-information-content").removeClass("active");

        $(this).addClass("active");
        $("#" + $(this).data("target")).addClass("active");
    }
);
