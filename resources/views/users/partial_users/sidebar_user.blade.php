<button class="toggle-btn" onclick="toggleSidebar()">
    <i class="fas fa-chevron-left"></i>
</button>

<div class="p-4">
    <h4 class="logo-text fw-bold mb-0">Timon Web</h4>
    <p class="text-muted small hide-on-collapse">Dashboard</p>
</div>

<div class="nav flex-column">
    <a href="{{ route('Home.user') }}"
        class="sidebar-link {{ request()->routeIs('Home.user') ? 'active' : '' }} text-decoration-none p-3">
        <i class="fas fa-home me-3"></i>
        <span class="hide-on-collapse">Home</span>
    </a>

    <a href="{{ route('Cart.user') }}"
        class="sidebar-link {{ request()->routeIs('Cart.user') ? 'active' : '' }} text-decoration-none p-3">
        <i class='fa fa-shopping-cart me-3'></i>
        <span class="hide-on-collapse">Cart</span>
    </a>

    <a href="{{ route('profile.user') }}"
        class="sidebar-link {{ request()->routeIs('profile.user') ? 'active' : '' }} text-decoration-none p-3">
        <i class="fa fa-address-card me-3"></i>
        <span class="hide-on-collapse">Profile user</span>
    </a>

</div>

<div class="profile-section mt-auto p-2 d-flex">
    <div class="d-flex align-items-center">

        <div class="avatar-sidebar">
            <img src="{{ $userAvatar }}" style="height:45px" class="rounded-circle" alt="Profile">
        </div>
        <div class="profile-info">
            <h6 class="text-white mb-0">{{ $userName }}</h6>
            <small class="text-white">{{ $userEmail }}</small>
        </div>

        <div class="logout-zone">
            <button id="id-Logout-btn">Logout</button>
        </div>
    </div>


</div>
