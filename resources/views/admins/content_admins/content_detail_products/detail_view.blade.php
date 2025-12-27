@extends('admins.layout_master_admin')

@section('content-admin')
    <div class="information-product">
        <div class="wrap-information-product">
            <div class="container-information">
                <div class="detail-information-product">
                    <div class="wrap-detail-information-product">
                        <div class="wrap-avatar-product">
                            <button class="btn-move-left-information-product"
                                id="id-btn-move-left-information-product">&#10094</button>
                            <div class="avatar-product">
                                <div class="list-avatar-product">
                                    <img src="{{ $detailProduct->product_image }}">
                                </div>
                            </div>
                            <button class="btn-move-right-information-product"
                                id="id-btn-move-right-information-product">&#10095</button>
                        </div>
                        <div class="list-information-image-product">
                            <button class="btn-move-left-list-information-image-product"
                                id="id-btn-move-left-list-information-image-product">&#10094</button>
                            <div class="list-option-image">
                                @foreach ($imageDescription as $item)
                                    <div class="option-image">
                                        <img src="{{ $item->image_url }}" alt="">
                                    </div>
                                @endforeach
                            </div>
                            <button class="btn-move-right-list-information-image-product"
                                id="id-btn-move-right-list-information-image-product">&#10095</button>
                        </div>
                        <div class="outstanding-information">
                            <div class="title-outstanding-information">
                                <p>Thông số nổi bật</p>
                                <span class="show-all-information">
                                    Xem tất cả thông số
                                </span>
                            </div>
                            <div class="detail-outstanding-information">
                                @foreach ($showOption as $item)
                                    <div class="wrap-detail-outstanding-information-1">
                                        <p>{{ $item->basic_option_name }}</p>
                                        <div class="image-outstanding-information">
                                            <p>{{ $item->basic_option_description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail-option-product">
                    <div class="small-information-porduct">
                        <div class="information-ship">
                            <img src="https://cdn2.fptshop.com.vn/svg/Mien_phi_giao_hang_Detail_f24a37cad5.svg"
                                alt="">
                        </div>
                        <div class="name-product">
                            <p>{{ $detailProduct->product_name }}</p>
                        </div>
                        <div class="more-information">
                            <div class="code-product">
                                <span>No.{{ $detailProduct->product_code }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="option-product">
                        @foreach ($nameBuyOption as $buyOptionName => $items)
                            <div class="wrap-option">
                                <span class="type-option">{{ $buyOptionName }}</span>
                                <div class="list-option">
                                    @foreach ($items as $option)
                                        <a class="btn-option text-decoration-none text-dark" href="">
                                            {{ $option->buy_option_description }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <div class="main-detail-option-product">
                            <div class="detail-price-product">
                                <div class="warp-detail-price-product">
                                    <div class="content-detail-price-product">
                                        <div class="content-price">
                                            <div class="one-pay">
                                                <div class="unit-price">
                                                    {{ number_format($detailProduct->product_price, 0, ',', '.') }} đ
                                                </div>
                                                <div class="price-discount">
                                                    <span
                                                        class="old-price">{{ number_format(19590000, 0, ',', '.') }}đ</span>
                                                    <span class="pecent-disscount"> 13% </span>
                                                </div>
                                                <div class="gift-point">
                                                    <img src="" alt="">
                                                    <span>+<?= number_format(4274, 0, ',', '.') ?> điểm thưởng</span>
                                                </div>
                                            </div>
                                            <div class="center">
                                                <span>Hoặc</span>
                                            </div>
                                            <div class="installment">
                                                <span>Trả góp</span>
                                                <div class="price-installment">
                                                    <?= number_format(1344500, 0, ',', '.') ?>/tháng
                                                </div>
                                            </div>
                                        </div>
                                        <div class="voucher-product">
                                            <div class="title-voucher-product">
                                                <img src="" alt="">
                                                <span>Khuyến mãi được hưởng</span>
                                            </div>
                                            <div class="wrap-list-voucher-product">
                                                <div class="list-voucher-product">
                                                    <div class="element-voucher-product">Giảm ngay 2,600,000đ áp dụng đến
                                                        16/10
                                                    </div>
                                                    <div class="element-voucher-product">AirPods giảm đến 500,000đ khi mua
                                                        kèm
                                                        iPhone</div>
                                                    <div class="element-voucher-product">Giảm thêm đến 2.5 triệu khi mua kèm
                                                        SIM FPT FVIP150/F299/F399 6-12 tháng <a href="">Xem chi
                                                            tiết</a>
                                                    </div>
                                                    <div class="element-voucher-product">Trả góp 0%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="area-order">
                            <div class="wrap-cart">
                                <button class="cart">
                                    <i class='bx bxs-cart-add'></i>
                                </button>
                            </div>
                            <div class="wrap-btn-pay-now">
                                <button class="btn-pay-now">Mua ngay</button>
                            </div>
                            <div class="wrap-btn-installment">
                                <button class="btn-installment">Trả góp <span>(chỉ tử
                                        <?= number_format(1344500, 0, ',', '.') ?> đ)</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment-zone">
                <form class="cmt-zone" data-id="{{ $detailProduct->id }}">
                    @csrf
                    <input type="text" placeholder="Nhập nội dung bình luận ..." class="input-cmt">
                    <button type="submit">Gửi bình luận</button>
                </form>
                <div class="view-cmt">
                    {{-- @foreach ($comentProduct as $item) --}}
                    <div class="content-view-comment">
                        <div class="avatar-user">
                            {{-- <img src="/storage/duy.jpg" alt=""> --}}
                        </div>
                        <div class="content-comment">
                            {{-- <p>{{ $item->user->name }}</p>
                            <span>{{ $item->cmt }}</span> --}}
                        </div>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
        <div class="detail-information-option">
            <div class="background-click"></div>
            <div class="show-detail-option-zone">
                <h3>Thông số chi tiết</h3>
                <div class="list-basic-option">
                    @foreach ($basicOption as $item)
                        <div class="item-option">
                            <span>{{ $item->basic_option_name }}</span>
                            <span>{{ $item->basic_option_description }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
