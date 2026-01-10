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

$("#add-to-cart").on("click", function (e) {
    e.preventDefault();

    var product_id = $(this).closest(".cart").data("id-add-detail-product");

    $.ajax({
        type: "POST",
        url: "/post-cart",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            product_id: product_id,
        },
        success: function (res) {
            Swal.fire({
                title: "Timon Shop",
                text: res.success,
                icon: "success",
            });
        },
        error: function (errors) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: errors,
            });
        },
    });
});

$(".btn-pay-now").on("click", function (e) {
    e.preventDefault();

    var product_id = $(this).data("id-buy-detail-product");

    $.ajax({
        type: "POST",
        url: "/user/post-cart",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            product_id: product_id,
        },
        success: function (res) {
            Swal.fire({
                title: "Timon Shop",
                text: res.success,
                icon: "success",
            }).then(() => {
                window.location.href = "/admin/cart";
            });
        },
        error: function (errors) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: errors,
            });
        },
    });
});
