<form id="id-form-container-infor-supplier">
    <div class="header-infor-supplier">
        <div class="left-header-supplier">
            <select class="number-row-select">
                <option value="10" selected>10 dòng</option>
                <option value="20">20 dòng</option>
                <option value="30">30 dòng</option>
            </select>

            <div class="filter-infor-supplier">
                <button type="button">
                    Bộ lọc
                </button>
            </div>
        </div>

        <div class="right-header-supplier">
            <div class="search-zone-supplier">
                <input type="text" placeholder="tìm kiếm sản phẩm">
            </div>
        </div>
    </div>
    <div class="content-infor-supplier">
        <table class="table-infor-supplier">
            <tr>
                <th>STT</th>
                <th>Tên thương hiệu</th>
                <th>Hình ảnh thương hiệu</th>
                <th>Tùy chỉnh thương hiệu</th>
            </tr>
            <tbody class="detail-items-supplier">
                @foreach ($dataSupplier as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->supplier_name }}</td>
                        <td>
                            <div class="img-infor-supplier-zone">
                                <img src="{{ $item->supplier_image }}"class="img-infor-supplier">
                            </div>
                        </td>
                        <td>
                            <div class="button-infor-supplier-zone">
                                <a class="show-detail-supplier" data-id="" href="">
                                    Xem chi tiết
                                </a>
                                <a class="update-detail-supplier" data-id="">
                                    Cập nhật
                                </a>
                                <a class="delete-detail-supplier" data-id="">
                                    Xóa
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="list-count-supplier">
            <ul class="detail-list-count-supplier">
                <li>
                    <a class="item-page" href="#">1</a>
                </li>
            </ul>
        </div>
    </div>
</form>
