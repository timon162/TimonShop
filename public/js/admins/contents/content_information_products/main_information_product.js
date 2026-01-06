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

$(".delete-detail-supplier").on("click", function (e) {
    e.preventDefault();

    let supplier_id = $(this).data("id");

    $.ajax({
        type: "DELETE",
        url: "/delete-supplier",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            supplier_id: supplier_id,
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

$(document).on("click", ".update-detail-supplier", function (e) {
    e.preventDefault();
    $item = $(this).closest(".item-infor-supplier").hide();
    $editRow = $item.next(".item-edit-supplier").show();
});

$(document).on("click", ".submit-edit-detail-supplier", function (e) {
    e.preventDefault();
    const value = $(this).closest(".item-edit-supplier");
    const formData = new FormData();
    const input = value.find(".input-image-edit-supplier")[0];

    formData.append(
        "supplier_name",
        value.find(".input-edit-name-supplier").val()
    );
    if (input.files.length > 0) {
        formData.append("supplier_img", input.files[0]);
    }

    formData.append("supplier_id", $(this).data("id"));

    $.ajax({
        type: "POST",
        url: "/update-supplier",
        processData: false,
        contentType: false,
        data: formData,
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
            let error = errors.responseJSON.errors;
            for (let filed in error) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error[filed][0],
                });
            }
        },
    });

    $item = $(this).closest(".item-edit-supplier").hide();
    $editRow = $item.prev(".item-infor-supplier").show();
});

$(document).on("click", ".close-old-file-edit-supplier", function (e) {
    e.preventDefault();
    const $container = $(this).closest(".img-edit-supplier-zone");
    $container.hide();
    $container.next(".img-edit-new-supplier-zone").show();
});

$(document).on("change", ".input-image-edit-supplier", function () {
    const file = this.files[0];
    if (!file) return;
    const $item = $(this).closest(".img-file-edit-supplier");
    const imgUrl = URL.createObjectURL(file);
    $item.find(".btn-image-supplier-eidt").hide();
    $item.find(".class-img-file-edit-supplier").attr("src", imgUrl).show();
});

$(document).on("click", ".close-img-file-edit-supplier", function () {
    const $item = $(this).closest(".img-file-edit-supplier");
    $item.find(".btn-image-supplier-eidt").show();
    $item.find(".class-img-file-edit-supplier").hide();
    $item.find(".input-image-edit-supplier").val("");
});

$(document).on("click", ".submit-back-supplier", function (e) {
    e.preventDefault();
    $item = $(this).closest(".item-edit-supplier").hide();
    $editRow = $item.prev(".item-infor-supplier").show();
});

$(".delete-detail-category").on("click", function (e) {
    e.preventDefault();
    const category_id = $(this).data("id");
    $.ajax({
        type: "DELETE",
        url: "/delete-category",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            category_id: category_id,
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

$(document).on("click", ".update-detail-category", function (e) {
    e.preventDefault();
    const $item = $(this).closest(".item-infor-category");
    $item.hide();
    $item.next(".item-edit-category").show();
});

$(document).on("click", ".submit-back-category", function (e) {
    e.preventDefault();
    const $item = $(this).closest(".item-edit-category");
    $item.hide();
    $item.prev(".item-infor-category").show();
});

$(document).on("click", ".close-old-file-edit-category", function (e) {
    e.preventDefault();
    const $item = $(this).closest(".item-edit-category");

    $item.find(".img-edit-category-zone").hide();
    $item.find(".img-edit-new-category-zone").show();
});

$(document).on("change", ".input-image-edit-category", function () {
    const file = this.files[0];
    if (!file) return;
    const item = $(this).closest(".img-file-edit-category");
    const imgUrl = URL.createObjectURL(file);
    item.find(".btn-image-category-eidt").hide();
    item.find(".class-img-file-edit-category").attr("src", imgUrl).show();
});

$(document).on("click", ".close-img-file-edit-category", function () {
    const item = $(this).closest(".img-file-edit-category");
    item.find(".class-img-file-edit-category").hide();
    item.find(".btn-image-category-eidt").show();
});

$(document).on("click", ".submit-edit-detail-category", function (e) {
    e.preventDefault();
    const value = $(this).closest(".item-edit-category");
    const formData = new FormData();
    const input = value.find(".input-image-edit-category")[0];

    formData.append(
        "category_name",
        value.find(".input-edit-name-category").val()
    );

    if (input.files.length > 0) {
        formData.append("category_img", input.files[0]);
    }

    formData.append("category_id", $(this).data("id"));

    $.ajax({
        type: "POST",
        url: "/update-category",
        processData: false,
        contentType: false,
        data: formData,
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
            let error = errors.responseJSON.errors;
            for (let filed in error) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: error[filed][0],
                });
            }
        },
    });

    $item = $(this).closest(".item-edit-category").hide();
    $editRow = $item.prev(".item-infor-category").show();
});
