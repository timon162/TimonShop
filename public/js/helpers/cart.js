function numberQuatity(step, button) {
    let item = button.closest(".item-product-cart-view");
    let input = item.find(".input-quantity-cart-view");

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

$(".minus-quantity-product-cart-view").on("click", function (e) {
    e.preventDefault();
    numberQuatity(-1, $(this));
});

$(".plus-quantity-product-cart-view").on("click", function (e) {
    e.preventDefault();
    numberQuatity(1, $(this));
});
