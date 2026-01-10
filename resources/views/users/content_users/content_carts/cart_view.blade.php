@extends('users.layout_master_user')

@section('content-user')
    <form class="user-cart-view">
        <div class="user-content-product-cart-view-zone">
            <div class="user-list-product-cart-view-zone">
                @foreach ($cart as $item)
                    <div class="user-item-product-cart-view" data-id-prduct-cart="{{ $item['product_id'] }}">
                        <div class="user-img-product-cart-view">
                            <img src="{{ $item['product_image'] }}" alt="">
                        </div>
                        <div class="user-name-product-cart-view">
                            <span>{{ $item['product_name'] }}</span>
                        </div>
                        <div class="user-name-product-cart-view">
                            <span>{{ $item['product_supplier'] }}</span>
                        </div>
                        <div class="user-price-product-cart-view">
                            <span>{{ number_format($item['total_price_product'], 0, ',', '.') }} đ</span>
                        </div>
                        <div class="user-quantity-product-cart-view">
                            <button class="user-minus-quantity-product-cart-view">-</button>
                            <input class="user-input-quantity-cart-view" type="number"
                                value="{{ $item['product_quantity'] }}">
                            <button class="user-plus-quantity-product-cart-view">+</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="user-pay-zone-cart-view">
            <div class="user-title-pay-cart-view">
                <span>Thông tin thanh toán</span>
                <div class="user-total-pay-cart-view">
                    <span>Tổng tiền</span>
                    <p>{{ number_format($totalCart, 0, ',', '.') }} đ</p>
                </div>
            </div>
            <div class="user-content-pay-cart-view">
                <div class="user-total-discount-cart-view">
                    <span>Tổng khuyến mãi</span>
                    <p>0đ</p>
                </div>
                <div class="user-list-discount-cart-view">
                    <div class="user-item-discount-cart-view">
                        <span>tên voucher</span>
                        <p>giá voucher</p>
                    </div>
                    <div class="user-item-discount-cart-view">
                        <span>tên voucher</span>
                        <p>giá voucher</p>
                    </div>
                    <div class="user-item-discount-cart-view">
                        <span>tên voucher</span>
                        <p>giá voucher</p>
                    </div>
                </div>
            </div>
            <div class="user-price-pay-zone-cart-view">
                <div class="user-price-pay-cart-view">
                    <span>Tổng cần thanh toán</span>
                    <p>giá tiền</p>
                </div>
                <button class="user-btn-pay-cart-view" id="id-btn-pay" type="submit">Xác nhận thanh toán</button>
            </div>
        </div>
    </form>
@endsection
