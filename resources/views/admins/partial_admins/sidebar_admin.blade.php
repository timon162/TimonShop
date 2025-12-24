<button class="toggle-btn" onclick="toggleSidebar()">
    <i class="fas fa-chevron-left"></i>
</button>

<div class="p-3 ">
    <h4 class="logo-text fw-bold mb-0">Timon Web</h4>
</div>

<div class="nav flex-column">
    <a href="" class="sidebar-link text-decoration-none p-3">
        <i class="fas fa-home me-3"></i>
        <span class="hide-on-collapse">Home</span>
    </a>

    <a href="{{ route('admin') }}" class="sidebar-link text-decoration-none p-3">
        <i class="fa fa-cart-plus me-3"></i>
        <span class="hide-on-collapse">Add product</span>
    </a>

    <a href="{{ route('viewInformationProduct') }}" class="sidebar-link text-decoration-none p-3">
        <i class="fa fa-list-alt me-3"></i>
        <span class="hide-on-collapse">Information product</span>
    </a>

    <a href="" class="sidebar-link text-decoration-none p-3">
        <i class='fa fa-shopping-cart me-3'></i>
        <span class="hide-on-collapse">Cart</span>
    </a>

    <a href="#" class="sidebar-link text-decoration-none p-3">
        <i class="fa fa-address-card me-3"></i>
        <span class="hide-on-collapse">Profile</span>
    </a>

    <a href="#" class="sidebar-link text-decoration-none p-3">
        <i class="fa fa-cog me-3"></i>
        <span class="hide-on-collapse">Settings</span>
    </a>
</div>

<div class="profile-section mt-auto p-2 d-flex">
    <div class="d-flex align-items-center">

        <div class="avatar-sidebar">
            <img src="/storage/avatar/FPQkVcHQFDxhW5Mu6ipCEqXrRg5nZQNLpHwM57XY.jpg" style="height:45px"
                class="rounded-circle" alt="Profile">
        </div>
        <div class="profile-info">
            <h6 class="text-white mb-0">tên admin</h6>
            <small class="text-white">email</small>
        </div>
        <div class="logout-zone">
            <button id="id-Logout-btn">Logout</button>
        </div>
    </div>

</div>
