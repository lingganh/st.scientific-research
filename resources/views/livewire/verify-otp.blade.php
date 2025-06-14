<div>
    <br> <br> <br>
    <link rel="stylesheet" href="{{ asset('client/signin.css') }}">
    <div class="user-auth-wrapper">
        <div class="user-auth-card-layout">
            <div class="user-auth-form-panel">
                <div class="auth-panel-header">
                    <h1>Xác Thực Tài Khoản</h1>
                    <p>Mã OTP đã được gửi đến email của bạn: <strong>{{ $email }}</strong></p>
                    <p>Vui lòng nhập mã để xác thực tài khoản.</p>
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

                <form wire:submit.prevent="verifyOtp">
                    <div class="form-input-section">
                        <label for="otp_input">Mã OTP :</label>
                        <input type="text" id="otp_input" placeholder="Nhập 6 chữ số OTP" required wire:model.defer="otp">
                        @error('otp') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="auth-action-button" style="width: 100%; padding: 16px 25px; background-color: #2e4d1b; color: #fff; border-radius: 8px; font-size: 1.15em; font-weight: 600; letter-spacing: 0.7px;">
                        Xác Thực
                    </button>
                </form>

                <div class="auth-section-divider">
                    <span>Bạn chưa nhận được mã? </span>
                </div>

                 @if($showResendButton)
                    <button wire:click="resendOtp" class="auth-action-button" style="width: 100%; padding: 16px 25px; background-color: #5cb85c; color: #fff; border-radius: 8px; font-size: 1.15em; font-weight: 600; letter-spacing: 0.7px;">
                        Gửi Lại Mã OTP
                    </button>
                @else
                    <button class="auth-action-button" disabled style="width: 50%; padding: 16px 25px; background-color: #ccc; color: #666; border-radius: 8px; font-size: 17px; font-weight: 600; letter-spacing: 0.7px; cursor: not-allowed;">Gửi Lại OTP({{ $resendTimer }}s)
                    </button>
                @endif
            </div>

            <div class="user-auth-visual-panel"> </div>
        </div>
    </div>
    <br> <br> <br>

    <script>
        window.addEventListener('resend-timer-start', () => {
            let timer = 120;
            const interval = setInterval(() => {
                if (timer > 0) {
                    timer--;
                    Livewire.emit('updateTimer', timer);
                } else {
                    clearInterval(interval);
                    Livewire.emit('enableResend');
                }
            }, 1000);
        });
    </script>




</div>
