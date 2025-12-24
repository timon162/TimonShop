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
                @foreach ($dataCategory as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->category_name }}</td>
                        <td>
                            <div class="img-infor-category-zone">
                                <img src="{{ $item->category_image }}"class="img-infor-category">
                            </div>
                        </td>
                        <td>
                            <div class="button-infor-category-zone">
                                <a class="show-detail-category" data-id="" href="">
                                    Xem chi tiết
                                </a>
                                <a class="update-detail-category" data-id="">
                                    Cập nhật
                                </a>
                                <a class="delete-detail-category" data-id="">
                                    Xóa
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
