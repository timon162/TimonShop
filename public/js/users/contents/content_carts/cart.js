function numberQuatity(step, button) {
    let item = button.closest(".user-item-product-cart-view");
    let input = item.find(".user-input-quantity-cart-view");

    let quantity = parseInt(input.val());
    let valueQuantity = quantity + step;
    let idCartProduct = item.data("id-prduct-cart");
    input.val(valueQuantity);

    $.ajax({
        type: "POST",
        url: "/update-cart",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            quantity: valueQuantity,
            product_id: idCartProduct,
        },
        success: function (res) {
            location.reload();
        },
    });
}

$(".user-minus-quantity-product-cart-view").on("click", function (e) {
    e.preventDefault();
    numberQuatity(-1, $(this));
});

$(".user-plus-quantity-product-cart-view").on("click", function (e) {
    e.preventDefault();
    numberQuatity(1, $(this));
});

$("#id-btn-pay").on("click", function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/user/post-bill",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
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
                text: errors.responseJSON?.error ?? "Có lỗi xảy ra",
            });
        },
    });
});
