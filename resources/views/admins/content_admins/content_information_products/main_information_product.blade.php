@extends('admins.layout_master_admin')
@section('content-admin')
    <link rel="stylesheet"
        href="{{ asset('css/admins/contents/content_information_products/main_information_product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admins/contents/content_information_products/information_supplier.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admins/contents/content_information_products/information_category.css') }}">
    <div class="container-information-content">
        <div class="header-information-content">
            <div class="list-title-information-content">
                <div class="item-title-information-content " data-target='id-container-information-product'>
                    <span>Danh sách sản phẩm</span>
                </div>
                <div class="item-title-information-content" data-target='id-container-information-category'>
                    <span>Danh sách loại sản phẩm</span>
                </div>
                <div class="item-title-information-content active" data-target='id-container-information-supplier'>
                    <span>Danh sách thương hiệu</span>
                </div>
            </div>
        </div>
        <div class="main-information-content">
            <div id="id-container-information-category" class="form-information-content">
                @include('admins/content_admins/content_information_products/information_category')
            </div>
            <div id="id-container-information-supplier" class="form-information-content active">
                @include('admins/content_admins/content_information_products/information_supplier')
            </div>
            {{-- <div id="id-container-information-product" class="form-information-content ">
                @include('admins/content_admins/content_information_products/information_product')
            </div> --}}
        </div>
    </div>
    <script src="{{ asset('js/admins/contents/content_information_products/main_information_product.js') }}"></script>
@endsection
