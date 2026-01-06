<form id="id-form-container-infor-category">
    <div class="header-infor-category">
        <div class="left-header-category">
            <select class="number-row-select">
                <option value="10" selected>10 dòng</option>
                <option value="20">20 dòng</option>
                <option value="30">30 dòng</option>
            </select>

            <div class="filter-infor-category">
                <button type="button">
                    Bộ lọc
                </button>
            </div>
        </div>

        <div class="right-header-category">
            <div class="search-zone-category">
                <input type="text" placeholder="tìm kiếm sản phẩm">
            </div>
        </div>
    </div>
    <div class="content-infor-category">
        <table class="table-infor-category">
            <tr>
                <th>STT</th>
                <th>Tên loại sản phẩm</th>
                <th>Hình ảnh loại sản phẩm</th>
                <th>Tùy chỉnh loại sản phẩm</th>
            </tr>
            <tbody class="detail-items-category">
                @foreach ($dataCategory['category'] as $key => $item)
                    <tr class="item-infor-category">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item['categoryName'] }}</td>
                        <td>
                            <div class="img-infor-category-zone">
                                <img src="{{ $item['categoryImage'] }}"class="img-infor-category">
                            </div>
                        </td>
                        <td>
                            <div class="button-infor-category-zone">
                                <a class="update-detail-category" data-id="" href="">
                                    Cập nhật
                                </a>
                                <a class="delete-detail-category" data-id="{{ $item['categoryId'] }}" href="">
                                    Xóa
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr class="item-edit-category" style="display: none">
                        <td>{{ $key + 1 }}</td>
                        <td><input class="input-edit-name-category" type="text" value="{{ $item['categoryName'] }}">
                        </td>
                        <td>
                            <div class="img-edit-category-zone">
                                <div class="custom-file-edit-category-btn">
                                    <img src="{{ $item['categoryImage'] }}" class="img-edit-category">
                                    <button type="button" class="close-old-file-edit-category">X</button>
                                </div>
                            </div>
                            <div class="img-edit-new-category-zone"style="display:none">
                                <div class="img-file-edit-category">
                                    <label class="btn-image-category-eidt">
                                        Chọn ảnh
                                        <input type="file" class="input-image-edit-category" hidden>
                                    </label>
                                    <button type="button" class="close-img-file-edit-category">X</button>
                                    <img class="class-img-file-edit-category" style="display:none">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="button-edit-category-zone">
                                <a class="submit-edit-detail-category" data-id="{{ $item['categoryId'] }}">
                                    Cập nhật
                                </a>
                                <a class="submit-back-category">
                                    Quay lại
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="list-count-category">
            <ul class="detail-list-count-category">
                <li>
                    <a class="item-page" href="#">1</a>
                </li>
            </ul>
        </div>
    </div>
</form>
