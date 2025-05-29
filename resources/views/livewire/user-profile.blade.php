<div>
    <br><br>
    <div class="container">
        <link rel="stylesheet" href="{{ asset('client/userPro5.css') }}">
        <div class="profile-layout">

            <div class="profile-search-bar" style="margin-left: 3%">
                <input type="text"

                       placeholder="Tìm kiếm trong hồ sơ..."
                       class="search-input">
                <button class="search-button">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        <div class="profile-layout">

            <div class="profile-sidebar">
                <h3 class="sidebar-title">Quản lý tài khoản</h3>
                <ul class="sidebar-nav">
                    <li>
                        <a href=" " class="sidebar-nav-item active">
                            <i class="fas fa-user-circle"></i> Thông tin tài khoản
                        </a>
                    </li>
                    <li>
                        <a href=" " class="sidebar-nav-item">
                            <i class="fas fa-shopping-bag"></i> Đơn mua của tôi
                        </a>
                    </li>
                    <li>
                        <a href=" " class="sidebar-nav-item">
                            <i class="fas fa-bell"></i> Thông báo
                        </a>
                    </li>
                    <li>
                        <form method="POST" action=" " class="sidebar-logout-form">
                            @csrf
                            <button type="submit" class="sidebar-logout-button">
                                <i class="fas fa-sign-out-alt"></i> Đăng xuất
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

            <div class="profile-main-content">
                <div class="profile-card">
                    <div class="profile-header">
                        <div class="profile-avatar-wrapper">
                            <img src="{{ $user->img ?? 'https://cdn2.fptshop.com.vn/small/avatar_trang_1_cd729c335b.jpg' }}" alt="Ảnh đại diện" class="profile-avatar">
                        </div>
                        <div class="profile-info">
                            <h1 class="profile-name">{{ $user->name ?? 'Tên Người Dùng' }}</h1>
                            <p class="profile-email">{{ $user->email ?? 'email@example.com' }}</p>
                        </div>
                    </div>

                    <div class="profile-details">
                        <div class="detail-item">
                            <span class="detail-label"><i class="fas fa-venus-mars"></i> Giới tính:</span>
                            <span class="detail-value">{{ $user->gender ?? 'Chưa cập nhật' }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label"><i class="fas fa-birthday-cake"></i> Ngày sinh:</span>
                            <span class="detail-value">{{ $user->dob ?? 'Chưa cập nhật' }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label"><i class="fas fa-phone-alt"></i> Số điện thoại:</span>
                            <span class="detail-value">{{ $user->phone ?? 'Chưa cập nhật' }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label"><i class="fas fa-map-marker-alt"></i> Địa chỉ:</span>
                            <span class="detail-value">{{ $user->address ?? 'Chưa cập nhật' }}</span>
                        </div>
                    </div>

                    <div class="profile-bio">
                        <h3 class="bio-title">Giới thiệu về tôi</h3>
                        <p class="bio-content">{{ $user->bio ?? 'Chưa có thông tin giới thiệu. Bạn có thể chỉnh sửa để thêm.' }}</p>
                    </div>

                    <div class="profile-actions">
                        <a href=" " class="profile-edit-button">
                            <i class="fas fa-edit"></i> Chỉnh sửa hồ sơ
                        </a>
                        <a href=" " class="profile-change-password-button">
                            <i class="fas fa-key"></i> Đổi mật khẩu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>

</div>
