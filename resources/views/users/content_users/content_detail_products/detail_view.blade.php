@extends('users.layout_master_user')

@section('content-user')
    <div class="user-information-product">
        <div class="user-wrap-information-product">
            <div class="user-container-information">
                <div class="user-detail-information-product">
                    <div class="user-wrap-detail-information-product">
                        <div class="user-wrap-avatar-product">
                            <button class="user-btn-move-left-information-product"
                                id="id-btn-move-left-information-product">&#10094</button>
                            <div class="user-avatar-product">
                                <div class="user-list-avatar-product">
                                    <img src="{{ $detailProduct['productImage'] }}">
                                </div>
                            </div>
                            <button class="user-btn-move-right-information-product"
                                id="id-btn-move-right-information-product">&#10095</button>
                        </div>
                        <div class="user-list-information-image-product">
                            <button class="user-btn-move-left-list-information-image-product"
                                id="id-btn-move-left-list-information-image-product">&#10094</button>
                            <div class="user-list-option-image">
                                @foreach ($detailProduct['imageDescription'] as $item)
                                    <div class="user-option-image">
                                        <img src="{{ $item['imageUrl'] }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <button class="user-btn-move-right-list-information-image-product"
                                id="id-btn-move-right-list-information-image-product">&#10095</button>
                        </div>
                        <div class="user-outstanding-information">
                            <div class="user-title-outstanding-information">
                                <p>Thông số nổi bật</p>
                                <span class="user-show-all-information">
                                    Xem tất cả thông số
                                </span>
                            </div>
                            <div class="user-detail-outstanding-information">
                                @foreach ($detailProduct['showOption'] as $item)
                                    <div class="user-wrap-detail-outstanding-information-1">
                                        <p>{{ $item['basic_option_name'] }}</p>
                                        <div class="user-image-outstanding-information">
                                            <p>{{ $item['basic_option_description'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-detail-option-product">
                    <div class="user-small-information-porduct">
                        <div class="user-information-ship">
                            <img src="https://cdn2.fptshop.com.vn/svg/Mien_phi_giao_hang_Detail_f24a37cad5.svg"
                                alt="">
                        </div>
                        <div class="user-name-product">
                            <p>{{ $detailProduct['productName'] }}</p>
                        </div>
                        <div class="user-more-information">
                            <div class="user-code-product">
                                <span>No.{{ $detailProduct['productCode'] }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="user-option-product">
                        @foreach ($detailProduct['nameBuyOption'] as $name => $items)
                            <div class="user-wrap-option">
                                <span class="user-type-option">{{ $name }}</span>
                                <div class="user-list-option">
                                    @foreach ($items as $option)
                                        <a class="user-btn-option text-decoration-none text-dark" href="">
                                            {{ $option['buyOptionDescription'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <div class="user-main-detail-option-product">
                            <div class="user-detail-price-product">
                                <div class="user-warp-detail-price-product">
                                    <div class="user-content-detail-price-product">
                                        <div class="user-content-price">
                                            <div class="user-one-pay">
                                                <div class="user-unit-price">
                                                    {{ number_format($detailProduct['productPrice'], 0, ',', '.') }} đ
                                                </div>
                                                <div class="user-price-discount">
                                                    <span
                                                        class="user-old-price">{{ number_format(19590000, 0, ',', '.') }}đ</span>
                                                    <span class="user-pecent-disscount"> 13% </span>
                                                </div>
                                                <div class="user-gift-point">
                                                    <img src="" alt="">
                                                    <span>+<?= number_format(4274, 0, ',', '.') ?> điểm thưởng</span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="user-voucher-product">
                                            <div class="user-title-voucher-product">
                                                <img src="" alt="">
                                                <span>Khuyến mãi được hưởng</span>
                                            </div>
                                            <div class="user-wrap-list-voucher-product">
                                                <div class="user-list-voucher-product">
                                                    <div class="user-element-voucher-product">Giảm ngay 2,600,000đ áp dụng
                                                        đến
                                                        16/10
                                                    </div>
                                                    <div class="user-element-voucher-product">AirPods giảm đến 500,000đ khi
                                                        mua
                                                        kèm
                                                        iPhone</div>
                                                    <div class="user-element-voucher-product">Giảm thêm đến 2.5 triệu khi
                                                        mua kèm
                                                        SIM FPT FVIP150/F299/F399 6-12 tháng <a href="">Xem chi
                                                            tiết</a>
                                                    </div>
                                                    <div class="user-element-voucher-product">Trả góp 0%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="user-area-order">
                            <div class="user-wrap-cart">
                                <button class="user-cart" id="add-to-cart"
                                    data-id-add-detail-product="{{ $detailProduct['productId'] }}">
                                    <i class='bx bxs-cart-add'></i>
                                </button>
                            </div>
                            <div class="user-wrap-btn-pay-now">
                                <button class="user-btn-pay-now"
                                    data-id-buy-detail-product="{{ $detailProduct['productId'] }}">Mua
                                    ngay</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="user-comment-zone">
                <form class="user-cmt-zone" data-id="{{ $detailProduct['productId'] }}">
                    <input type="text" placeholder="Nhập nội dung bình luận ..." class="user-input-cmt">
                    <button type="submit">Gửi bình luận</button>
                </form>
                <div class="user-view-cmt">
                    {{-- @foreach ($comentProduct as $item) --}}
                    <div class="user-content-view-comment">
                        <div class="user-avatar-user">
                            {{-- <img src="/storage/duy.jpg" alt=""> --}}
                        </div>
                        <div class="user-content-comment">
                            {{-- <p>{{ $item->user->name }}</p>
                            <span>{{ $item->cmt }}</span> --}}
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
        <div class="user-detail-information-option">
            <div class="user-background-click"></div>
            <div class="user-show-detail-option-zone">
                <h3>Thông số chi tiết</h3>
                <div class="user-list-basic-option">
                    @foreach ($detailProduct['basicOption'] as $item)
                        <div class="user-item-option">
                            <span>{{ $item['basicOptionName'] }}</span>
                            <span>{{ $item['basicOptionDescription'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
