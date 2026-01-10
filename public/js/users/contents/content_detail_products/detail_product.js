$(".user-background-click").on("click", function (e) {
    e.preventDefault();
    $(".user-detail-information-option").css("display", "none");
    $(".user-wrap-information-product").css("opacity", 1);
});

$(".user-show-all-information").on("click", function (e) {
    e.preventDefault();
    $(".user-detail-information-option").css("display", "flex");
    $(".user-wrap-information-product").css("opacity", 0.5);
});

$("#add-to-cart").on("click", function (e) {
    e.preventDefault();

    var product_id = $(this)
        .closest(".user-cart")
        .data("id-add-detail-product");

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
            if (res === "Add to cart") {
                Swal.fire({
                    title: "Timon Shop",
                    text: res.success,
                    icon: "success",
                });
            }
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

$(".user-btn-pay-now").on("click", function (e) {
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
            if (!res) {
                Swal.fire({
                    title: "Timon Shop",
                    text: res.success,
                    icon: "success",
                }).then(() => {
                    window.location.href = "/user/cart";
                });
            } else {
                Swal.fire({
                    title: "Oops...",
                    text: res.error,
                    icon: "error",
                }).then(() => {
                    window.location.href = "/user/cart";
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "Oops...",
                text: xhr.responseJSON.message,
                icon: "error",
            });
        },
    });
});
