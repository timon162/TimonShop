$(".btn-add-home-admin").on("click", function (e) {
    e.preventDefault();

    var product_id = $(this).closest(".product-home-admin").data("product-id");

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

$(".btn-delete-home-admin").on("click", function (e) {
    e.preventDefault();
    const idProduct = $(this).data("id-delete-product");

    $.ajax({
        type: "DELETE",
        url: "/delete-product",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            product_id: idProduct,
        },
        success: function (res) {
            Swal.fire({
                title: "Timon Shop",
                text: res.success,
                icon: "success",
            }).then(() => {
                location.reload();
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
