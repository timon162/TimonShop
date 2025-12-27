<form id="id-form-container-infor-product">
    <div class="zone-basic-infor-product">
        <div class="img-product">
            <div class="main-img">
                <label class="title-img">Ảnh chính sản phẩm</label>
                <div class="main-img-product">
                    <label for="imageInput" class="custom-file-btn">Chọn ảnh</label>
                    <input type="file" id="imageInput" style="display:none;" name="image">
                </div>
                <div class="avatar-add-product">
                    <button type="button" class="close-avatar" id="close-avatar">X</button>
                    <img id="preview">
                </div>

            </div>
            <div class="description-img">
                <div class="list-description-img">
                    {{-- items hình ảnh trong này --}}
                </div>

                <div class="wrap-btn-add-img">
                    <label for="btn-add-img" class="btn-add-img">+</label>
                    <input type="file" id="btn-add-img" style="display:none;">
                </div>
            </div>
        </div>
        <div class="input-infor-product">
            <div class="item-input-product">
                <label>Tên sản phẩm</label>
                <input type="text" id="input-name-create" placeholder="nhập tên sản phẩm">
            </div>
            <div class="item-input-product">
                <label>Giá sản phẩm</label>
                <input type="text" id="input-price-create" placeholder="nhập giá sản phẩm">
            </div>
            <div class="item-input-product">
                <label>Số lượng sản phẩm</label>
                <input type="text" id="input-quantity-create" placeholder="nhập số lượng sản phẩm">
            </div>
            <div class="item-input-product">
                <label>Mã sản phẩm</label>
                <input id="input-code-create" type="text" placeholder="nhập Mã sản phẩm">
                <label class="note-error">* mã sản phẩm phải dài hơn 6 số</label>
                <label class="note-success">* mã sản phẩm hợp lệ</label>
            </div>
            <div class="item-input-product">
                <select class="category-select">
                    <option value="">-- Chọn loại sản phẩm --</option>
                    @foreach ($dataCategory as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->category_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="item-input-product">
                <select class="supplier-select">
                    <option value="">-- Chọn thương hiệu --</option>
                    @foreach ($dataSupplier as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->supplier_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="item-input-product">
                <label>Mô tả sản phẩm</label>
                <textarea id="input-decription-create" type="text" placeholder="nhập mô tả sản phẩm"></textarea>
            </div>
            <button type="submit" class="btn-create-product">
                Create product
            </button>
        </div>
    </div>

    <div class="add-more-function-product">
        <div class="basic-option-product">
            <h2>Chức năng cơ bản</h2>

            <div class="zone-basic-option-product">
                <div class="input-basic-option-product">
                    <div class="item-input-basic-option-product">
                        <label>Tên option:</label>
                        <input class="name-basic-option" type="text" placeholder="tên option">
                    </div>
                    <div class="item-input-basic-option-product">
                        <label>Chi tiết option:</label>
                        <input class="detail-basic-option" type="text" placeholder="chi tiết option">
                    </div>
                    <span class="delete-option">X</span>
                </div>
            </div>

            <button class="btn-more-basic-option-product">more basic option</button>
        </div>
        <div class="option-buy-product">
            <h2>Chức năng mua kèm</h2>

            <div class="zone-option-buy-product">
                <div class="input-buy-option-product">
                    <div class="item-input-option-buy-product">
                        <label>Tên option:</label>
                        <input class="name-buy-option" type="text" placeholder="tên option">
                    </div>
                    <div class="item-input-option-buy-product">
                        <label>Chi tiết option:</label>
                        <input class="detail-buy-option" type="text" placeholder="chi tiết option">
                    </div>
                    <div class="item-input-option-buy-product">
                        <label>Giá option:</label>
                        <input class="price-buy-option" type="text" placeholder="Giá option">
                    </div>
                    <span class="delete-buy-option">X</span>
                </div>
            </div>
            <button class="btn-more-option-buy-product">more buy option</button>
        </div>
    </div>
</form>
