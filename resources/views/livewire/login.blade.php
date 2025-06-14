<div>
    <br> <br> <br>
    <div class="user-auth-wrapper">
        <div class="user-auth-card-layout">
            <div class="user-auth-form-panel">
                <div class="auth-panel-header">
                    <h1> Chào Mừng Bạn Trở Lại </h1>
                    <p>Hãy nhập đầy đủ thông tin để đăng nhập nhé !</p>
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

                <form class="auth-form-submission" wire:submit.prevent="login">
                    <div class="form-input-section">
                        <label for="auth_email_input">Email :</label>
                        <input type="email" id="auth_email_input" name="email" placeholder="abc@example.com" required autocomplete="email" wire:model.defer="email">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-input-section">
                        <label for="auth_password_input">Mật Khẩu :</label>
                        <input type="password" id="auth_password_input" name="password" placeholder="Tối thiểu 8 ký tự " required autocomplete="current-password" wire:model.defer="password">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                        <a href=" " class="form-link-recovery">Quên Mật Khẩu ?</a>
                    </div>

                    <button type="submit" class="auth-action-button" style="  width: 100%;
                         padding: 16px 25px;
                         background-color: #2e4d1b;
                         color: #fff;
                         border-radius: 8px;
                         font-size: 1.15em;
                         font-weight: 600;
                         letter-spacing: 0.7px;">
                        Đăng Nhập </button>
                </form>

                <div class="auth-section-divider">
                    <span>Hoặc Tiếp Tục Với </span>
                </div>

                <div class="auth-social-logins">
                    <a href="{{route('google.login')}}" class="social-login-button google-provider">
                        <img src="https://c.animaapp.com/4fm4rMYc/img/icons8-google-1.svg" alt="Google icon">
                        Đăng Nhập Với Google
                    </a>
                    <a href="#" class="social-login-button apple-provider">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTi8mtfkGk3-p9fuvZpNV3MD0GtKhJX9Qsdw&s" alt="Apple icon">
                        Đăng Nhập Với SSO
                    </a>
                </div>

                <p class="auth-signup-prompt">
                    Bạn Không Có Tài Khoản? <a href="{{route('signup')}}" class="auth-signup-link">Tạo Tài Khoản</a>
                </p>
            </div>

            <div class="user-auth-visual-panel"> </div>

        </div>
        <link rel="stylesheet" href="{{ asset('client/signin.css') }}">

    </div>
    <br> <br> <br>

</div>
