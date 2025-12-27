<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/partials/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/partials/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admins/layout_master_admin.css') }}">

    <link rel="stylesheet" href="{{ asset('css/admins/contents/content_add_products/main_add_product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admins/contents/content_add_products/add_category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admins/contents/content_add_products/add_product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admins/contents/content_add_products/add_supplier.css') }}">

    <link rel="stylesheet"
        href="{{ asset('css/admins/contents/content_information_products/main_information_product.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/admins/contents/content_information_products/information_product.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/admins/contents/content_information_products/information_supplier.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/admins/contents/content_information_products/information_category.css') }}">

    <link rel="stylesheet" href="{{ asset('css/admins/contents/content_carts/cart_view.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admins/contents/content_homes/home_view.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admins/contents/content_detail_products/detail_product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admins/contents/content_profiles/profile_admin.css') }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin View</title>
</head>

<body>
    <header class="header-user">
        @include('partials.header')
    </header>
    <main class="content">
        <nav class="sidebar d-flex flex-column">
            @include('admins.partial_admins.sidebar_admin')
        </nav>
        <div class="main-content d-flex flex-column">
            @yield('content-admin')
        </div>
    </main>
</body>
<script src="{{ asset('js/users/partials/sidebar.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/admins/contents/content_add_products/add_category.js') }}"></script>
<script src="{{ asset('js/admins/contents/content_add_products/add_supplier.js') }}"></script>
<script src="{{ asset('js/admins/contents/content_add_products/add_product.js') }}"></script>
<script src="{{ asset('js/admins/contents/content_add_products/main_add_product.js') }}"></script>
<script src="{{ asset('js/admins/contents/content_homes/home.js') }}"></script>
<script src="{{ asset('js/admins/contents/content_detail_products/detail_product.js') }}"></script>
<script src="{{ asset('js/admins/profile_admin.js') }}"></script>
<script src="{{ asset('js/helpers/cart.js') }}"></script>
<script src="{{ asset('js/admins/contents/content_information_products/main_information_product.js') }}"></script>

</html>
