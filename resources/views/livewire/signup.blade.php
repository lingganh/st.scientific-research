<div>
     <link rel="stylesheet" href="{{ asset('client/signin.css') }}">
    <div class="user-auth-wrapper">
        <div class="user-auth-card-layout">
            <div class="user-auth-form-panel">
                <div class="auth-panel-header">
                    <h1>Tạo Tài Khoản Mới</h1>
                    <p>Nhập thông tin của bạn để đăng ký.</p>
                </div>

                 @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session()->has('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif

                 <form class="auth-form-submission" wire:submit.prevent="register">

                    <div class="form-input-section">
                        <label for="auth_name_input">Tên Đầy Đủ :</label>
                        <input type="text" id="auth_name_input" name="name" placeholder="Ví dụ: Nguyễn Văn A" required autocomplete="name" wire:model.defer="name">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-input-section">
                        <label for="auth_email_input">Email :</label>
                        <input type="email" id="auth_email_input" name="email" placeholder="abc@example.com" required autocomplete="email" wire:model.defer="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-input-section">
                        <label for="auth_password_input">Mật Khẩu :</label>
                        <input type="password" id="auth_password_input" name="password" placeholder="Tối thiểu 8 ký tự" required autocomplete="new-password" wire:model.defer="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-input-section">
                        <label for="auth_confirm_password_input">Xác Nhận Mật Khẩu :</label>
                        <input type="password" id="auth_confirm_password_input" name="password_confirmation" placeholder="Nhập lại mật khẩu" required autocomplete="new-password" wire:model.defer="password_confirmation">
                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="auth-action-button" style="  width: 100%;
                             padding: 16px 25px;
                             background-color: #2e4d1b;
                             color: #fff;
                             border-radius: 8px;
                             font-size: 1.15em;
                             font-weight: 600;
                             letter-spacing: 0.7px;">
                        Đăng Ký
                    </button>
                </form>

                <br>
                <br>
                <br>

                <p class="auth-signup-prompt">
                    Đã Có Tài Khoản? <a href="{{ route('login') }}" class="auth-signup-link">Đăng Nhập</a>
                </p>
            </div>
            <div class="user-auth-visual-panel"> </div>

        </div>

    </div>
</div>
