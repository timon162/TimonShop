$("#id-form-login").on("submit", function (e) {
    e.preventDefault();
    var email = $("#id-email").val();
    var password = $("#id-password").val();
    var remember = $(".form-check-input").prop("checked") ? 1 : 0;

    $postData = {
        email: email,
        password: password,
        remember: remember,
    };

    $.ajax({
        type: "POST",
        url: "/post-login",
        data: $postData,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (res) {
            if (res.mess == "undefined") {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Sai thông tin đăng nhập",
                });
            } else {
                window.location.href = "/admin";
            }
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
