<form id="id-form-container-infor-category">
    <div class="header-infor-category">
        <h3>TRANG LOẠI SẢN PHẨM</h3>
    </div>
    <div class="content-infor-category">
        <table class="table-infor-category">
            <tr>
                <th>Loại sản phẩm HOT</th>
                <th>Tên loại sản phẩm</th>
                <th>Hình ảnh loại sản phẩm</th>
                <th>Tùy chỉnh loại sản phẩm</th>
            </tr>
            <tr class="item-category">
                <td><input type="checkbox" class="check-hot"></td>
                <td><input type="text" class="category_name" placeholder="Nhập tên loại sản phẩm"></td>
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
            </tr>
        </table>
        <div class="button-category-zone">

            <button type="click" class="add-more-category">Tạo thêm hàng</button>

            <button type="submit">Thêm tất cả vào hệ thống</button>

        </div>
    </div>
</form>
