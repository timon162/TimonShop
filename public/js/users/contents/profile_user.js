$(".btn-post-zone").on("click", function (e) {
    e.preventDefault();
    $(".infor-user-zone").css("display", "none");
    $(".change-infor-user-zone").css("display", "flex");
});

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
    const image_user = $("#input-avatar-user")[0];

    formData.append("name", $("#input-name").val());
    formData.append("email", $("#input-email").val());
    formData.append("phone_number", $("#input-phone-number").val());
    if (image_user.files.length > 0) {
        formData.append("image_user", image_user.files[0]);
    }

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
                text: res.success,
                icon: "success",
            }).then(() => {
                location.reload();
            });
        },
        error: function (errors) {
            const errorObj = errors.responseJSON?.errors || {};
            const messages = Object.values(errorObj)
                .map((err) => `• ${err[0]}`)
                .join("<br>");

            Swal.fire({
                icon: "error",
                title: "Oops...",
                html: messages,
            });
        },
    });
    $(".infor-user-zone").css("display", "flex");
    $(".change-infor-user-zone").css("display", "none");
});
