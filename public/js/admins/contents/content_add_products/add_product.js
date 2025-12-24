$(".code-product").on("input", function () {
    let val = $(this).val();
    if (val.length < 6) {
        $(".note-success").hide();
        $(".note-error").show();
    } else {
        $(".note-success").show();
        $(".note-error").hide();
    }
});

$(".btn-more-basic-option-product").on("click", function (e) {
    e.preventDefault();
    const html = `
        <div class="input-basic-option-product">
            <div class="item-input-basic-option-product">
                <label>Tên option:</label>
                <input class="name-basic-option" type="text" placeholder="tên option">
            </div>
            <div class="item-input-basic-option-product">
                <label>Chi tiết option:</label>
                <input class="detail-basic-option" type="text" placeholder="chi tiết option">
            </div>
            <span class="delete-option">X</span>
        </div>
`;
    $(".zone-basic-option-product").append(html);
});

$(".btn-more-option-buy-product").on("click", function (e) {
    e.preventDefault();
    const html = `
        <div class="input-buy-option-product">
            <div class="item-input-option-buy-product">
                <label>Tên option:</label>
                <input class="name-buy-option" type="text" placeholder="tên option">
            </div>
            <div class="item-input-option-buy-product">
                <label>Chi tiết option:</label>
                <input class="detail-buy-option" type="text" placeholder="chi tiết option">
            </div>
            <div class="item-input-option-buy-product">
                <label>Giá option:</label>
                <input class="price-buy-option" type="text" placeholder="Gía option">
            </div>
            <span class="delete-buy-option">X</span>
        </div>
`;
    $(".zone-option-buy-product").append(html);
});

$("#imageInput").on("change", function () {
    let file = this.files[0];
    if (file) {
        let imgUrl = null;
        imgUrl = URL.createObjectURL(file);

        $(".main-img-product").css("display", "none");
        $(".avatar-product").css("display", "flex");
        $("#preview").attr("src", imgUrl);
    }
});

let listFilesImg = [];
$("#btn-add-img").on("change", function () {
    const file = this.files[0];
    listFilesImg.push(file);
    const index = listFilesImg.length - 1;
    const imgUrl = URL.createObjectURL(file);

    const html = `<div class="img-decription" data-index="${index}">
                    <img src="${imgUrl}" alt="">
                    <span class="delete-img-decription">X</span>
                </div>`;
    $(".list-description-img").prepend(html);
    this.value = "";
});

$("#close-avatar").on("click", function () {
    $(".main-img-product").css("display", "flex");
    $(".avatar-product").css("display", "none");

    $("#imageInput").val("");
});

$("#id-form-container-infor-product").on("submit", function (e) {
    e.preventDefault();
    let formData = new FormData();

    formData.append("name_create_product", $("#input-name-create").val());
    formData.append("price_create_product", $("#input-price-create").val());
    formData.append(
        "quantity_create_product",
        $("#input-quantity-create").val()
    );
    formData.append("code_create_product", $("#input-code-create").val());
    formData.append(
        "decription_create_product",
        $("#input-decription-create").val()
    );

    formData.append("file_main_img_product", $("#imageInput")[0].files[0]);

    formData.append("category_select", $(".category-select").val());

    formData.append("supplier_select", $(".supplier-select").val());

    listFilesImg.forEach((file, i) => {
        formData.append(`imgDescription[${i}]`, file);
    });

    $(".input-basic-option-product").each(function (i) {
        formData.append(
            `basicOptions[${i}][name]`,
            $(this).find(".name-basic-option").val()
        );
        formData.append(
            `basicOptions[${i}][detail]`,
            $(this).find(".detail-basic-option").val()
        );
    });

    $(".input-buy-option-product").each(function (i) {
        formData.append(
            `buyOptions[${i}][name]`,
            $(this).find(".name-buy-option").val()
        );
        formData.append(
            `buyOptions[${i}][detail]`,
            $(this).find(".detail-buy-option").val()
        );
        formData.append(
            `buyOptions[${i}][price]`,
            $(this).find(".price-buy-option").val()
        );
    });

    $.ajax({
        type: "POST",
        url: "/post-product",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData,
        processData: false,
        contentType: false,
        success: function (res) {
            Swal.fire({
                title: "Thêm thành công sản phẩm : " + res.nameProduct,
                icon: "success",
            });
        },
        error: function (error) {
            let errors = error.responseJSON.errors;
            for (let field in errors) {
                Swal.fire({
                    icon: "error",
                    title: "Tạo sản phẩm thất bại",
                    text: errors[field][0],
                });
            }
        },
    });
});

$(".zone-basic-option-product").on("click", ".delete-option", function () {
    $(this).closest(".input-basic-option-product").remove();
});

$(".zone-option-buy-product").on("click", ".delete-buy-option", function () {
    $(this).closest(".input-buy-option-product").remove();
});

$(".list-description-img").on("click", ".delete-img-decription", function () {
    const getIndex = $(this).closest(".img-decription");
    const index = getIndex.data("index");

    listFilesImg.splice(index, 1);

    getIndex.remove();

    $(".img-decription").each(function (i) {
        $(this).attr("data-index", i);
    });
});
