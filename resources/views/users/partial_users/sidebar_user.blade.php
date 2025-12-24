<button class="toggle-btn" onclick="toggleSidebar()">
    <i class="fas fa-chevron-left"></i>
</button>

<div class="p-4">
    <h4 class="logo-text fw-bold mb-0">Timon Web</h4>
    <p class="text-muted small hide-on-collapse">Dashboard</p>
</div>

<div class="nav flex-column">
    <a href="" class="sidebar-link text-decoration-none p-3">
        <i class="fas fa-home me-3"></i>
        <span class="hide-on-collapse">Home</span>
    </a>

    <a href="" class="sidebar-link text-decoration-none p-3">
        <i class='fa fa-shopping-cart me-3'></i>
        <span class="hide-on-collapse">Cart</span>
    </a>

    <a href="#" class="sidebar-link text-decoration-none p-3">
        <i class="fa fa-address-card me-3"></i>
        <span class="hide-on-collapse">Profile user</span>
    </a>

    <a href="#" class="sidebar-link text-decoration-none p-3">
        <i class="fas fa-gear me-3"></i>
        <span class="hide-on-collapse">Settings</span>
    </a>
</div>

<div class="profile-section mt-auto p-2 d-flex">
    <div class="d-flex align-items-center">
        @auth
            <div class="avatar-sidebar">
                <img src="{{ auth()->user()->image_user }}" style="height:45px" class="rounded-circle" alt="Profile">
            </div>
            <div class="profile-info">
                <h6 class="text-white mb-0">{{ auth()->user()->name }}</h6>
                <small class="text-white">{{ auth()->user()->email }}</small>
            </div>
        @endauth
        <div class="logout-zone">
            <button id="id-Logout-btn">Logout</button>
        </div>
    </div>


</div>
