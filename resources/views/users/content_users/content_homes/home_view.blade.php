@extends('users.layout_master_user')

@section('content-user')
    <div class="container-product-home-user">
        <div class="wrap-list-product-home-user row g-4">
            @foreach ($dataProduct['product'] as $item)
                <div class="product-home-user" data-product-id="{{ $item['productId'] }}">
                    <div class="product-card-home-user bg-white rounded-4 shadow-sm h-100 position-relative">
                        <a class="overflow-hidden-home-user"
                            href="{{ route('user.detail.view', ['id' => $item['productId']]) }}" style="cursor: pointer;">
                            <img id="img-product-home-user" src="{{ $item['productImage'] }}" class="product-image w-100"
                                alt="Product">
                        </a>
                        <div class="p-4 content-items-product-card-home-user">
                            <h5 class="fw-bold mb-3">{{ $item['productName'] }}</h5>
                            <div class="d-flex align-items-center-home-user mb-3">
                                <div class="me-2">
                                    số lượng sản phẩm
                                </div>
                                <small class=" fw-bold text-muted-home-user">{{ $item['productQuantity'] }}</small>
                            </div>

                            <div class="pay-zoneprice-home-user d-flex flex-column justify-content-between ">
                                <span class="price-home-user">{{ number_format($item['productPrice'], 0, ',', '.') }}
                                    đ</span>
                                <div class="change-product-home-user d-flex flex-column justify-content-between">
                                    <a
                                        class="btn-add-home-user btn-home-user-custom text-white px-4 py-2 rounded-pill d-flex justify-content-center">
                                        Add to Cart
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
                </div>
            @endforeach
        </div>
    </div>
@endsection
