<form id="id-form-container-infor-product">
    <div class="header-infor-product">
        <div class="left-header-information">
            <select class="number-row-select">
                <option value="10" selected>10 dòng</option>
                <option value="20">20 dòng</option>
                <option value="30">30 dòng</option>
            </select>

            <div class="filter-infor-product">
                <button type="button">
                    Bộ lọc
                </button>
            </div>
        </div>

        <div class="right-header-information">
            <div class="search-zone">
                <input type="text" placeholder="tìm kiếm sản phẩm">
            </div>
        </div>
    </div>
    <div class="content-infor-product">
        <table class="table-infor-product">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh sản phẩm</th>
                <th>Mã sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Số lượng sản phẩm</th>
                <th>Thương hiệu sản phẩm</th>
                <th>Tùy chỉnh sản phẩm</th>
            </tr>
            <tbody class="detail-items">
                @foreach ($dataProduct as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>
                            <div class="img-infor-product-zone">
                                <img src="{{ $item->product_image }}"class="img-infor-product">
                            </div>
                        </td>
                        <td>{{ $item->product_code }}</td>
                        <td>{{ $item->product_price }}</td>
                        <td>{{ $item->category->category_name }}</td>
                        <td>{{ $item->product_quantity }}</td>
                        <td>{{ $item->supplier->supplier_name }}</td>
                        <td>
                            <div class="button-infor-product-zone">
                                <a class="show-detail-product" data-id="{{ $item->id }}" href="">
                                    Xem chi tiết
                                </a>
                                <a class="update-detail-product" data-id="{{ $item->id }}">
                                    Cập nhật
                                </a>
                                <a class="delete-detail-product" data-id="{{ $item->id }}">
                                    Xóa
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="list-count-product">
            <ul class="detail-list-count-product">

                <li>
                    <a class="item-page" href="#">1</a>
                </li>

            </ul>
        </div>
    </div>
</form>
</div>
