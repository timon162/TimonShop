<form id="id-form-container-infor-supplier">
    <div class="header-infor-supplier">
        <h3>TRANG THƯƠNG HIỆU</h3>
    </div>
    <div class="content-infor-supplier">
        <table class="table-infor-supplier">
            <tr>
                <th>Thương hiệu HOT</th>
                <th>Tên thương hiệu</th>
                <th>Hình ảnh thương hiệu</th>
                <th>Tùy chỉnh thương hiệu</th>
            </tr>
            <tr class="item-supplier">
                <td><input type="checkbox" class="check-hot"></td>
                <td><input type="text" class="supplier_name" placeholder="Nhập tên thương hiệu"></td>
                <td>
                    <div class="img-infor-supplier-zone">
                        <label class="custom-file-btn">
                            Hình ảnh thương hiệu
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
            </tr>
        </table>
        <div class="button-supplier-zone">

            <button type="click" class="add-more-supplier">Tạo thêm hàng</button>

            <button type="submit">Thêm tất cả vào hệ thống</button>

        </div>
    </div>
</form>
