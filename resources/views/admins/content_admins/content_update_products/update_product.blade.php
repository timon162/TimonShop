@extends('admins.layout_master_admin')
@section('content-admin')
    <form id="id-form-container-update-infor-product" data-id-product="{{ $detailProduct['productId'] }}">
        <div class="update-zone-basic-infor-product">
            <div class="update-img-product">
                <div class="update-main-img">
                    <label class="update-title-img">Ảnh chính sản phẩm</label>
                    <div class="update-main-avatar-add-product">
                        <button type="button" class="update-main-avatar" id="update-close-main-avatar">X</button>
                        <img src="{{ $detailProduct['productImage'] }}">
                    </div>
                    <div class="update-main-img-product">
                        <label class="update-custom-file-btn">
                            Chọn ảnh
                            <input type="file" id="update-imageInput" style="display:none;" name="image">
                        </label>
                    </div>
                    <div class="update-avatar-add-product">
                        <button type="button" class="update-close-avatar" id="update-close-avatar">X</button>
                        <img id="update-preview">
                    </div>
                </div>
                <div class="update-description-img">
                    <div class="update-list-description-img">
                        @foreach ($detailProduct['imageDescription'] as $item)
                            <div class="update-img-decription" data-update-index="${item.id}">
                                <img class="old-img-decription" src="{{ $item['imageUrl'] }}" alt="">
                                <span class="update-delete-img-decription">X</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="update-wrap-btn-add-img">
                        <label class="update-btn-add-img">
                            +
                            <input type="file" id="update-btn-add-img" style="display:none;">
                        </label>

                    </div>
                </div>
            </div>
            <div class="update-input-infor-product">
                <div class="update-item-input-product">
                    <label>Tên sản phẩm</label>
                    <input type="text" id="input-name-update" placeholder="nhập tên sản phẩm"
                        value="{{ $detailProduct['productName'] }}">
                </div>
                <div class="update-item-input-product">
                    <label>Giá sản phẩm</label>
                    <input type="text" id="input-price-update" placeholder="nhập giá sản phẩm"
                        value="{{ $detailProduct['productPrice'] }}">
                </div>
                <div class="update-item-input-product">
                    <label>Số lượng sản phẩm</label>
                    <input type="text" id="input-quantity-update" placeholder="nhập số lượng sản phẩm"
                        value="{{ $detailProduct['productQuantity'] }}">
                </div>
                <div class="update-item-input-product">
                    <label>Mã sản phẩm</label>
                    <input id="input-code-update" type="text" placeholder="nhập Mã sản phẩm"
                        value="{{ $detailProduct['productCode'] }}">
                    <label class="update-note-error">* mã sản phẩm phải dài hơn 6 số</label>
                    <label class="update-note-success">* mã sản phẩm hợp lệ</label>
                </div>
                <div class="update-item-input-product">
                    <select class="update-category-select">
                        <option value="{{ $detailProduct['categoryId'] }}">{{ $detailProduct['categoryName'] }}</option>
                        @foreach ($dataCategory['category'] as $item)
                            <option value="{{ $item['categoryId'] }}">
                                {{ $item['categoryName'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="update-item-input-product">
                    <select class="update-supplier-select">
                        <option value="{{ $detailProduct['supplierId'] }}">{{ $detailProduct['supplierName'] }}</option>
                        @foreach ($dataSupplier['supplier'] as $item)
                            <option value="{{ $item['supplierId'] }}">
                                {{ $item['supplierName'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="update-item-input-product">
                    <label>Mô tả sản phẩm</label>
                    <textarea id="input-decription-update" type="text" placeholder="nhập mô tả sản phẩm">{{ $detailProduct['productDecription'] }}</textarea>
                </div>
                <button type="submit" class="update-btn-update-product">
                    Update product
                </button>
            </div>
        </div>

        <div class="update-add-more-function-product">
            <div class="update-basic-option-product">
                <h2>Chức năng cơ bản</h2>

                <div class="update-zone-basic-option-product">
                    @foreach ($detailProduct['basicOption'] as $item)
                        <div class="update-input-basic-option-product">
                            <div class="update-item-input-basic-option-product">
                                <label>Tên option:</label>
                                <input class="update-name-basic-option" type="text" placeholder="tên option"
                                    value="{{ $item['basicOptionName'] }}">
                            </div>
                            <div class="update-item-input-basic-option-product">
                                <label>Chi tiết option:</label>
                                <input class="update-detail-basic-option" type="text" placeholder="chi tiết option"
                                    value="{{ $item['basicOptionDescription'] }}">
                            </div>
                            <span class="update-delete-option">X</span>
                        </div>
                    @endforeach
                </div>

                <button class="update-btn-more-basic-option-product">more basic option</button>
            </div>
            <div class="update-option-buy-product">
                <h2>Chức năng mua kèm</h2>

                <div class="update-zone-option-buy-product">
                    @foreach ($detailProduct['buyOption'] as $item)
                        <div class="update-input-buy-option-product">
                            <div class="update-item-input-option-buy-product">
                                <label>Tên option:</label>
                                <input class="update-name-buy-option" type="text" placeholder="tên option"
                                    value="{{ $item['buyOptionName'] }}">
                            </div>
                            <div class="update-item-input-option-buy-product">
                                <label>Chi tiết option:</label>
                                <input class="update-detail-buy-option" type="text" placeholder="chi tiết option"
                                    value="{{ $item['buyOptionDescription'] }}">
                            </div>
                            <div class="update-item-input-option-buy-product">
                                <label>Giá option:</label>
                                <input class="update-price-buy-option" type="text" placeholder="Giá option"
                                    value="{{ $item['buyOptionPrice'] }}">
                            </div>
                            <span class="update-delete-buy-option">X</span>
                        </div>
                    @endforeach

                </div>
                <button class="update-btn-more-option-buy-product">more buy option</button>
            </div>
        </div>
    </form>
@endsection
