$(".table-infor-category").on("change", ".image-input-category", function (e) {
    e.preventDefault();
    let file = this.files[0];
    if (file) {
        let imgUrl = null;
        imgUrl = URL.createObjectURL(file);
        let row = $(this).closest(".item-category");
        row.find(".img-infor-category-zone").css("display", "none");
        row.find(".img-category-zone").css("display", "flex");
        row.find(".class-img-category").attr("src", imgUrl);
    }
});

$(".add-more-category").on("click", function (e) {
    e.preventDefault();
    const html = `<tr class="item-category">
    <td><input type="checkbox" class="check-hot"></td>
                <td><input type="text" class='category_name' placeholder="Nhập tên loại sản phẩm"></td>
                <td>
                    <div class="img-infor-category-zone">
                        <label class="custom-file-btn">
                            Hình ảnh loại sản phẩm
                            <input type="file" class="image-input-category" style="display:none;" name="image">
                        </label>
                    </div>
                    <div class="img-category-zone">
                        <div class="img-category">
                            <button type="button" class="close-img-category">X</button>
                            <img class="class-img-category">
                        </div>
                    </div>

                </td>
                <td>
                    <div class="button-infor-category-zone">
                        <a class="delete-detail-category">
                            Xóa
                        </a>
                    </div>
                </td>
            </tr>`;

    $(".table-infor-category").append(html);
});

$(".table-infor-category").on("click", ".delete-detail-category", function () {
    $(this).closest(".item-category").remove();
});

$("#id-form-container-infor-category").on("submit", function (e) {
    e.preventDefault();
    let formData = new FormData();

    $(".item-category").each(function (i) {
        formData.append(
            `item_category[${i}][name]`,
            $(this).find(".category_name").val()
        );

        let file = $(this).find(".image-input-category")[0].files[0];
        if (file) {
            formData.append(`item_category[${i}][file_img]`, file);
        }

        formData.append(
            `item_category[${i}][check_hot]`,
            $(this).find(".check-hot").prop("checked") ? 1 : 0
        );
    });

    $.ajax({
        type: "POST",
        url: "/post-category",
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
