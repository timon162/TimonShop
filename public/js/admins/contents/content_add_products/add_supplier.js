$(".table-infor-supplier").on("change", ".image-input-supplier", function (e) {
    e.preventDefault();
    let file = this.files[0];
    if (file) {
        let imgUrl = null;
        imgUrl = URL.createObjectURL(file);
        let row = $(this).closest(".item-supplier");
        row.find(".img-infor-supplier-zone").css("display", "none");
        row.find(".img-supplier-zone").css("display", "flex");
        row.find(".class-img-supplier").attr("src", imgUrl);
    }
});

$(".add-more-supplier").on("click", function (e) {
    e.preventDefault();
    const html = `<tr class="item-supplier">
    <td><input type="checkbox" class="check-hot"></td>
                <td><input type="text" class='supplier_name' placeholder="Nhập tên loại sản phẩm"></td>
                <td>
                    <div class="img-infor-supplier-zone">
                        <label class="custom-file-btn">
                            Hình ảnh loại sản phẩm
                            <input type="file" class="image-input-supplier" style="display:none;" name="image">
                        </label>
                    </div>
                    <div class="img-supplier-zone">
                        <div class="img-supplier">
                            <button type="button" class="close-img-supplier">X</button>
                            <img class="class-img-supplier">
                        </div>
                    </div>

                </td>
                <td>
                    <div class="button-infor-supplier-zone">
                        <a class="delete-detail-supplier">
                            Xóa
                        </a>
                    </div>
                </td>
            </tr>`;

    $(".table-infor-supplier").append(html);
});

$(".table-infor-supplier").on("click", ".delete-detail-supplier", function () {
    $(this).closest(".item-supplier").remove();
});

$("#id-form-container-infor-supplier").on("submit", function (e) {
    e.preventDefault();
    let formData = new FormData();

    $(".item-supplier").each(function (i) {
        formData.append(
            `item_supplier[${i}][name]`,
            $(this).find(".supplier_name").val()
        );

        let file = $(this).find(".image-input-supplier")[0].files[0];
        if (file) {
            formData.append(`item_supplier[${i}][file_img]`, file);
        }

        formData.append(
            `item_supplier[${i}][check_hot]`,
            $(this).find(".check-hot").prop("checked") ? 1 : 0
        );
    });

    $.ajax({
        type: "POST",
        url: "/post-supplier",
        data: formData,
        processData: false,
        contentType: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            Swal.fire({
                title: "Timon Shop",
                text: res.mess,
                icon: "success",
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
});
