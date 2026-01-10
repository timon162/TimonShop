@extends('defaults.default_view')
@section('content-default')
    <div class="container-product">
        <div class="wrap-list-product row g-4">
            @foreach ($dataProduct['product'] as $item)
                <div class="product">
                    <div class="product-card bg-white rounded-4 shadow-sm h-100 position-relative">
                        <a class="overflow-hidden" href="{{ route('user.detail.view', ['id' => $item['productId']]) }}"
                            style="cursor: pointer;">
                            <img id="img-product" src="{{ $item['productImage'] }}" class="product-image w-100" alt="Product">
                        </a>
                        <div class="p-4 ">
                            <h5 class="fw-bold mb-3">{{ $item['productName'] }}</h5>
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-2">
                                    số lượng sản phẩm
                                </div>
                                <small class=" fw-bold text-muted">{{ $item['productQuantity'] }}</small>
                            </div>

                            <div class="d-flex flex-column justify-content-between ">
                                <span class="price">{{ number_format($item['productPrice'], 0, ',', '.') }}
                                    đ</span>
                                <div class="change-product d-flex flex-column justify-content-between">
                                    <button type="button" class="btn-add btn-custom text-white px-4 py-2 rounded-pill">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
@endsection
