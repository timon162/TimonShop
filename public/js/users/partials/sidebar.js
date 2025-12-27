function toggleSidebar() {
    const sidebar = document.querySelector(".sidebar");
    sidebar.classList.toggle("collapsed");
}

$("#id-Logout-btn").on("click", function (e) {
    $.ajax({
        type: "POST",
        url: "/logout",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function () {
            window.location.href = "/";
        },
    });
});
