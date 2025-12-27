<div class="wrap-header d-flex w-100 bg-dark">
    <div class="left-header">
        <h2 class="logo-text fw-bold mb-0">Timon Web</h2>
    </div>
    <div class="center-header">
        <div class="input-zone">
            <input type="text" placeholder="Nhập tên sản phẩm cần tìm ....">
            <span><i class='bx bx-search '></i></span>
        </div>
    </div>
    <div class="right-header text-white">
        <div class="user-cart-zone">
            <a href="{{ route('home.view') }}" id="icon-user-login" class="icon-user"><img src="{{ $userAvatar }} "
                    style="height:45px" class="rounded-circle" alt="Profile"></a>
            <a class="icon-cart"><i class='bx bxs-cart'></i>Giỏ hàng</a>
        </div>
    </div>
</div>
