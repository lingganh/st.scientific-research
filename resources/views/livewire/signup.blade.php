<div>
    <br> <br> <br>
    <link rel="stylesheet" href="{{ asset('client/signin.css') }}">
    <div class="user-auth-wrapper">
        <div class="user-auth-card-layout">
            <div class="user-auth-form-panel">
                <div class="auth-panel-header">
                    <h1>Tạo Tài Khoản Mới</h1>
                    <p>Nhập thông tin của bạn để đăng ký.</p>
                </div>

                <form class="auth-form-submission">
                    <div class="form-input-section">
                        <label for="auth_name_input">Tên Đầy Đủ :</label>
                        <input type="text" id="auth_name_input" name="full_name" placeholder="Ví dụ: Nguyễn Văn A" required autocomplete="name">
                    </div>

                    <div class="form-input-section">
                        <label for="auth_email_input">Email :</label>
                        <input type="email" id="auth_email_input" name="email" placeholder="abc@example.com" required autocomplete="email">
                    </div>

                    <div class="form-input-section">
                        <label for="auth_password_input">Mật Khẩu :</label>
                        <input type="password" id="auth_password_input" name="password" placeholder="Tối thiểu 8 ký tự" required autocomplete="new-password">
                    </div>

                    <div class="form-input-section">
                        <label for="auth_confirm_password_input">Xác Nhận Mật Khẩu :</label>
                        <input type="password" id="auth_confirm_password_input" name="password_confirmation" placeholder="Nhập lại mật khẩu" required autocomplete="new-password">
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

                  <br>
                    <br>
                    <br>


                    <p class="auth-signup-prompt">
                        Đã Có Tài Khoản? <a href="{{ route('login') }}" class="auth-signup-link">Đăng Nhập</a>
                    </p>
                </form>
            </div>

            <div class="user-auth-visual-panel"> </div>

        </div>


    </div>
    <br> <br> <br>
</div>
