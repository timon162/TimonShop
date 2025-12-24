$(".btn-post-zone").on("click", function (e) {
    e.preventDefault();
    $(".infor-user-zone").css("display", "none");
    $(".change-infor-user-zone").css("display", "flex");
});

// $(".btn-change-infor").on("click", function (e) {
//     e.preventDefault();

// });

$("#input-avatar-user").on("change", function () {
    let file = this.files[0];
    if (file) {
        let imgUrl = null;
        imgUrl = URL.createObjectURL(file);
        $("#arvatar").attr("src", imgUrl);
    }
});

$(".change-infor-user-zone").on("submit", function (e) {
    e.preventDefault();
    let formData = new FormData();

    formData.append("name", $("#input-name").val());
    formData.append("email", $("#input-email").val());
    formData.append("phone_number", $("#input-phone-number").val());
    formData.append("image_user", $("#input-avatar-user")[0].files[0]);

    $.ajax({
        type: "POST",
        url: "/post-profile",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: formData,
        processData: false,
        contentType: false,
        success: function (res) {
            Swal.fire({
                title: "Wellcom To Timon Shop",
                text: res.mess,
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
    $(".infor-user-zone").css("display", "flex");
    $(".change-infor-user-zone").css("display", "none");
});
