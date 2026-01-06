$(document).on("click", "#update-close-main-avatar", function (e) {
    e.preventDefault();

    const item = $(this).closest(".update-main-img");

    item.find(".update-main-avatar-add-product").css("display", "none");
    item.find(".update-main-img-product").css("display", "flex");
});

$(document).on("click", "#update-close-avatar", function (e) {
    e.preventDefault();

    const item = $(this).closest(".update-main-img");

    item.find("#update-imageInput").val("");
    item.find(".update-avatar-add-product").css("display", "none");
    item.find(".update-main-img-product").css("display", "flex");
});

$(".update-btn-more-basic-option-product").on("click", function (e) {
    e.preventDefault();
    const html = `
        <div class="update-input-basic-option-product">
            <div class="update-item-input-basic-option-product">
                <label>Tên option:</label>
                <input class="update-name-basic-option" type="text" placeholder="tên option">
            </div>
            <div class="update-item-input-basic-option-product">
                <label>Chi tiết option:</label>
                <input class="update-detail-basic-option" type="text" placeholder="chi tiết option">
            </div>
            <span class="update-delete-option">X</span>
        </div>
`;
    $(".update-zone-basic-option-product").append(html);
});

$(".update-btn-more-option-buy-product").on("click", function (e) {
    e.preventDefault();
    const html = `
        <div class="update-input-buy-option-product">
            <div class="update-item-input-option-buy-product">
                <label>Tên option:</label>
                <input class="update-name-buy-option" type="text" placeholder="tên option">
            </div>
            <div class="update-item-input-option-buy-product">
                <label>Chi tiết option:</label>
                <input class="update-detail-buy-option" type="text" placeholder="chi tiết option">
            </div>
            <div class="update-item-input-option-buy-product">
                <label>Giá option:</label>
                <input class="update-price-buy-option" type="text" placeholder="Gía option">
            </div>
            <span class="update-delete-buy-option">X</span>
        </div>`;
    $(".update-zone-option-buy-product").append(html);
});

$("#update-imageInput").on("change", function () {
    let file = this.files[0];
    if (file) {
        let imgUrl = null;
        imgUrl = URL.createObjectURL(file);

        $(".update-main-img-product").css("display", "none");
        $(".update-avatar-add-product").css("display", "flex");
        $("#update-preview").attr("src", imgUrl);
    }
});

let listUpdateFilesImg = [];

$("#update-btn-add-img").on("change", function () {
    const file = this.files[0];
    const item = { id: Math.random(), file };
    listUpdateFilesImg.push(item);
    const imgUrl = URL.createObjectURL(file);

    const html = `<div class="update-img-decription" data-update-index="${item.id}">
                    <img src="${imgUrl}" alt="">
                    <span class="update-delete-img-decription">X</span>
                </div>`;
    $(".update-list-description-img").prepend(html);
});

$(".update-list-description-img").on(
    "click",
    ".update-delete-img-decription",
    function () {
        const getIndex = $(this).closest(".update-img-decription");
        const index = getIndex.data("update-index");

        listUpdateFilesImg.splice(index, 1);

        getIndex.remove();
    }
);

$(".update-zone-basic-option-product").on(
    "click",
    ".update-delete-option",
    function () {
        $(this).closest(".update-input-basic-option-product").remove();
    }
);

$(".update-zone-option-buy-product").on(
    "click",
    ".update-delete-buy-option",
    function () {
        $(this).closest(".update-input-buy-option-product").remove();
    }
);
