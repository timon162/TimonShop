@extends('users.layout_master_user')
@section('content-user')
    <h3>Thông tin cá nhân</h3>
    <div class="wrap-form-profile">
        <div class="avatar-user-zone">
            <div class="avatar-user">
                <img src="{{ $userAvatar }}" alt="" id="arvatar">
            </div>
        </div>
        <div class="infor-user-zone">
            @auth
                <div class="row-infor">
                    <p class="title-infor">Họ và tên</p>
                    <p>{{ $userProfile->name }}</p>
                </div>
                <div class="row-infor">
                    <p class="title-infor">Số điện thoại</p>
                    <p>{{ $userProfile->phone_number }}</p>
                </div>
                <div class="row-infor">
                    <p class="title-infor">Gmail</p>
                    <p>{{ $userProfile->email }}</p>
                </div>
                <div class="row-infor">
                    <p class="title-infor">Tiền</p>
                    <p>2.000.000</p>
                </div>
            @endauth
            <div class="btn-post-zone">
                <button>Chỉnh sửa thông tin</button>
            </div>
        </div>
        <form class="change-infor-user-zone">
            <label for="input-avatar-user" class="change-avatar-user">Thay đổi ảnh đại diện</label>
            <input type="file" id="input-avatar-user" style="display:none;" name="image">
            @auth
                <div class="row-change-infor">
                    <p class="title-change-infor">Họ và tên</p>
                    <input id="input-name" type="text" placeholder="Họ và tên" value="{{ $userProfile->name }}">
                </div>
                <div class="row-change-infor">
                    <p class="title-change-infor">Số điện thoại</p>
                    <input id="input-phone-number" type="text" placeholder="Số điện thoại"
                        value="{{ $userProfile->phone_number }}">
                </div>
                <div class="row-change-infor">
                    <p class="title-change-infor">Email</p>
                    <input id="input-email" type="email" placeholder="Email" value="{{ $userProfile->email }}">
                </div>
                <div class="btn-change-infor">
                    <button type="submit">Cập nhật thông tin</button>
                </div>
            @endauth
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
