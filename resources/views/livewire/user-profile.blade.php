<div>
    <link rel="stylesheet" href="{{ asset('client/userProfile.css') }}">

    <br><br>
    <div class="container">
        <div class="profile-layout">
            <div class="profile-search-bar" style="margin-left: 3%">
                <input type="text" placeholder="Tìm kiếm đơn hàng" class="search-input">
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
                        <form method="POST" action="{{route('logout')}}" class="sidebar-logout-form">
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
                            <span class="detail-value">{{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('d/m/Y') : 'Chưa cập nhật' }}</span>
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
                        {{-- Nút kích hoạt modal chỉnh sửa --}}
                        <button type="button" class="profile-edit-button" onclick="showEditProfileModalAndLoadData()">
                            <i class="fas fa-edit"></i> Chỉnh sửa hồ sơ
                        </button>
                        <a href=" " class="profile-change-password-button">
                            <i class="fas fa-key"></i> Đổi mật khẩu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>


    <div id="editProfileModal" class="custom-modal-backdrop" style="display: none;">
        <div class="custom-modal-content" wire:ignore.self>
            <div class="custom-modal-header">
                <h5 class="custom-modal-title">Sửa Thông Tin Cá Nhân</h5>
                <button type="button" class="custom-close-button" onclick="hideModal('editProfileModal')">
                    <i class="fas fa-times"></i> {{-- Icon dấu X --}}
                </button>
            </div>
            <div class="custom-modal-body">
                <form wire:submit.prevent="updateProfile">
                    <div class="mb-3 text-center">
                        <img src="{{ $img ? $img->temporaryUrl() : ($currentImg ? Storage::url(str_replace('/storage/', '', $currentImg)) : 'https://cdn2.fptshop.com.vn/small/avatar_trang_1_cd729c335b.jpg') }}"
                             alt="Current Avatar" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; object-position: center;">
                        <div class="mt-2">
                            <label for="imageUpload" class="form-label d-block text-primary" style="cursor: pointer;">
                                <u>Chọn ảnh mới</u>
                            </label>
                            <input type="file" id="imageUpload" wire:model="img" class="d-none">
                            @error('img') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Tên</label>
                        <input type="text" class="form-control" id="name" wire:model.defer="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" wire:model.defer="email" readonly>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Giới tính</label>
                        <select class="form-control" id="gender" wire:model.defer="gender">
                            <option value="">Chọn giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                            <option value="Khác">Khác</option>
                        </select>
                        @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Ngày Sinh</label>
                        <input type="date" class="form-control" id="dob" wire:model.defer="dob">
                        @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="phone" wire:model.defer="phone">
                        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa Chỉ</label>
                        <textarea class="form-control" id="address" wire:model.defer="address"></textarea>
                        @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Tiểu sử</label>
                        <textarea class="form-control" id="bio" wire:model.defer="bio"></textarea>
                        @error('bio') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="custom-modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="hideModal('editProfileModal')">Đóng</button>
                        <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="successModal" class="custom-modal-backdrop" style="display: none;">
        <div class="custom-modal-content custom-modal-sm">
            <div class="custom-modal-header custom-modal-success-header">
                <h5 class="custom-modal-title">
                    <i class="fas fa-check-circle me-2"></i> Thành Công!
                </h5>
                <button type="button" class="custom-close-button" onclick="hideModal('successModal')">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="custom-modal-body text-center">
                <p>Thông tin hồ sơ của bạn đã được cập nhật thành công!</p>
            </div>
            <div class="custom-modal-footer custom-modal-footer-center">
                <button type="button" class="btn btn-success" onclick="hideModal('successModal')">Đóng</button>
            </div>
        </div>
    </div>

    <script>
        function showEditProfileModalAndLoadData() {
            showModal('editProfileModal');
        @this.call('loadUserData');
        }
    </script>
</div>
