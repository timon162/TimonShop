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
                @foreach ($dataSupplier['supplier'] as $key => $item)
                    <tr class="item-infor-supplier">
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item['supplierName'] }}</td>
                        <td>
                            <div class="img-infor-supplier-zone">
                                <img src="{{ $item['supplierImage'] }}" class="img-infor-supplier">
                            </div>
                        </td>
                        <td>
                            <div class="button-infor-supplier-zone">
                                <a class="update-detail-supplier" data-id="" href="">
                                    Cập nhật
                                </a>
                                <a class="delete-detail-supplier" data-id="{{ $item['supplierId'] }}">
                                    Xóa
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr class="item-edit-supplier" style="display:none">
                        <td>{{ $key + 1 }}</td>
                        <td><input class="input-edit-name-supplier" type="text" value="{{ $item['supplierName'] }}">
                        </td>
                        <td>
                            <div class="img-edit-supplier-zone">
                                <div class="custom-file-edit-supplier-btn">
                                    <img src="{{ $item['supplierImage'] }}" class="img-edit-supplier">
                                    <button type="button" class="close-old-file-edit-supplier">X</button>
                                </div>
                            </div>
                            <div class="img-edit-new-supplier-zone"style="display:none">
                                <div class="img-file-edit-supplier">
                                    <label class="btn-image-supplier-eidt">
                                        Chọn ảnh
                                        <input type="file" class="input-image-edit-supplier" hidden>
                                    </label>
                                    <button type="button" class="close-img-file-edit-supplier">X</button>
                                    <img class="class-img-file-edit-supplier" style="display:none">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="button-edit-supplier-zone">
                                <a class="submit-edit-detail-supplier" data-id="{{ $item['supplierId'] }}">
                                    Cập nhật
                                </a>
                                <a class="submit-back-supplier">
                                    Quay lại
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
