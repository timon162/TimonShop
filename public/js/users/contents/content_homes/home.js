$(".btn-add-home-user").on("click", function (e) {
    e.preventDefault();

    const product_user_id = $(this)
        .closest(".product-home-user")
        .data("product-id");

    $.ajax({
        type: "POST",
        url: "/post-cart",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            product_id: product_user_id,
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
