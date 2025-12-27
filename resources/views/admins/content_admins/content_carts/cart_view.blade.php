@extends('admins.layout_master_admin')

@section('content-admin')
    <form class="cart-view">
        <div class="content-product-cart-view-zone">
            <div class="list-product-cart-view-zone">
                @if ($cart)
                    @foreach ($cart as $item)
                        <div class="item-product-cart-view" data-id-prduct-cart="{{ $item['product_id'] }}">
                            <div class="img-product-cart-view">
                                <img src="{{ $item['product_image'] }}" alt="">
                            </div>
                            <div class="name-product-cart-view">
                                <span>{{ $item['product_name'] }}</span>
                            </div>
                            <div class="name-product-cart-view">
                                <span>{{ $item['product_name'] }}</span>
                            </div>
                            <div class="price-product-cart-view">
                                <span>{{ $item['total_price_product'] }}</span>
                            </div>
                            <div class="quantity-product-cart-view">
                                <button class="minus-quantity-product-cart-view">-</button>
                                <input class="input-quantity-cart-view" type="number"
                                    value="{{ $item['product_quantity'] }}">
                                <button class="plus-quantity-product-cart-view">+</button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="pay-zone-cart-view">
            <div class="title-pay-cart-view">
                <span>Thông tin thanh toán</span>
                <div class="total-pay-cart-view">
                    <span>Tổng tiền</span>
                    <p>{{ $priceBill }}</p>
                </div>
            </div>
            <div class="content-pay-cart-view">
                <div class="total-discount-cart-view">
                    <span>Tổng khuyến mãi</span>
                    <p>-760.000đ</p>
                </div>
                <div class="list-discount-cart-view">
                    <div class="item-discount-cart-view">
                        <span>tên voucher</span>
                        <p>giá voucher</p>
                    </div>
                    <div class="item-discount-cart-view">
                        <span>tên voucher</span>
                        <p>giá voucher</p>
                    </div>
                    <div class="item-discount-cart-view">
                        <span>tên voucher</span>
                        <p>giá voucher</p>
                    </div>
                </div>
            </div>
            <div class="price-pay-zone-cart-view">
                <div class="price-pay-cart-view">
                    <span>Tổng cần thanh toán</span>
                    <p>giá tiền</p>
                </div>
                <button class="btn-pay-cart-view" type="submit">Xác nhận thanh toán</button>
            </div>
        </div>
    </form>
@endsection
