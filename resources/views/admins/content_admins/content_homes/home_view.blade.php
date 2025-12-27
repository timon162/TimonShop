@extends('admins.layout_master_admin')

@section('content-admin')
    <div class="container-product-home-admin">
        <div class="wrap-list-product-home-admin row g-4">
            @foreach ($dataProduct as $item)
                <div class="product-home-admin" data-product-id="{{ $item->id }}">
                    <div class="product-card-home-admin bg-white rounded-4 shadow-sm h-100 position-relative">
                        <a class="overflow-hidden-home-admin" href="{{ route('detail.view', ['id' => $item->id]) }}"
                            style="cursor: pointer;">
                            <img id="img-product-home-admin" src="{{ $item->product_image }}" class="product-image w-100"
                                alt="Product">
                        </a>
                        <div class="p-4">
                            <h5 class="fw-bold mb-3">{{ $item->product_name }}</h5>
                            <div class="d-flex align-items-center-home-admin mb-3">
                                <div class="me-2">
                                    số lượng sản phẩm
                                </div>
                                <small class=" fw-bold text-muted-home-admin">{{ $item->product_quantity }}</small>
                            </div>

                            <div class="pay-zoneprice-home-admin d-flex flex-column justify-content-between ">
                                <span class="price-home-admin">{{ $item->product_price }} đ</span>
                                <div class="change-product-home-admin d-flex flex-column justify-content-between">
                                    <button type="button"
                                        class="btn-add-home-admin btn-home-admin-custom text-white px-4 py-2 rounded-pill">
                                        Add to Cart
                                    </button>
                                    <button class="btn-home-admin btn-home-admin-custom text-white px-4 py-2 rounded-pill">
                                        Update product
                                    </button>
                                    <button class="btn-home-admin btn-home-admin-custom text-white px-4 py-2 rounded-pill">
                                        Delete product
                                    </button>
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
