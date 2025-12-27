@extends('admins.layout_master_admin')
@section('content-admin')
    <div class="container-add-content">
        <div class="header-add-content">
            <div class="list-title-add-content">
                <div class="item-title-add-content active" data-target='id-container-add-product'>
                    <span>Thêm sản phẩm</span>
                </div>
                <div class="item-title-add-content" data-target='id-container-add-category'>
                    <span>Thêm loại sản phẩm</span>
                </div>
                <div class="item-title-add-content" data-target='id-container-add-supplier'>
                    <span>Thêm thương hiệu</span>
                </div>
            </div>
        </div>
        <div class="main-add-content">
            <div id="id-container-add-category" class="form-add-content">
                @include('admins/content_admins/content_add_products/add_category')
            </div>
            <div id="id-container-add-supplier" class="form-add-content">
                @include('admins/content_admins/content_add_products/add_supplier')
            </div>
            <div id="id-container-add-product" class="form-add-content active">
                @include('admins/content_admins/content_add_products/add_product')
            </div>
        </div>
    </div>
@endsection
