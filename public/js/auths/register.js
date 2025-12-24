$("#id-form-register").on("submit", function (e) {
    e.preventDefault();

    var name = $("#id-name").val();
    var email = $("#id-email").val();
    var password = $("#id-password").val();
    var password_confirmation = $("#id-password-confirmation").val();

    $postData = {
        name: name,
        email: email,
        password: password,
        password_confirmation: password_confirmation,
    };

    $.ajax({
        type: "POST",
        url: "/post-register",
        data: $postData,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            Swal.fire({
                title: "Wellcom To Timon Shop",
                text: res.mess,
                icon: "success",
            });
            window.location.href = "/admin";
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
