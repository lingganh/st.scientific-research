<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            {{-- Logo và Brand (Bên trái) --}}
            <a class="navbar-brand" href="{{ route('home') }}">
                <div class="logo">
                    <img src="https://vitc.edu.vn/Frond_end/images/logo_vnua-1.png" alt="VNUA Logo" class="vnua-logo">
                    <div class="logo-text">
                        <span>ST Scientific Research</span>
                        <span class="logo-subtext">Vietnam National University of Agriculture</span>
                    </div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- Nội dung menu (sẽ thu gọn) --}}
            <div class="collapse navbar-collapse" id="mainNavbar">
                {{-- Các link chính (căn giữa) --}}
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product') }}">Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('workshop') }}">Hội Thảo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Bài Viết</a>
                    </li>


                {{-- CÁC LINK CHỮ CHO MOBILE (sẽ ẩn trên desktop) --}}
                <ul class="navbar-nav d-lg-none">
                    <li class="nav-item">
                        <a class="nav-link" href="giohang.html">Giỏ hàng</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="mobileUserDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="mobileUserDropdown">
                                <a class="dropdown-item" href="{{ route('profile.user') }}">Hồ sơ của tôi</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Đăng xuất</button>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Tài khoản</a>
                        </li>
                    @endif

            </div>

            {{-- CÁC ICON CHO DESKTOP (sẽ ẩn trên mobile) --}}
            <ul class="navbar-nav align-items-center d-none d-lg-flex">
                <li class="nav-item">
                    <a class="nav-link" href="giohang.html">
                        <i class="fa fa-shopping-cart cart-icon"></i>
                        <span class='badge badge-warning' id='lblCartCount'>5</span>
                    </a>
                </li>
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="desktopUserDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa-regular fa-circle-user fa-2x user-icon"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="desktopUserDropdown">
                            <a class="dropdown-item" href="{{ route('profile.user') }}">{{ Auth::user()->name }}</a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Đăng xuất</button>
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa-regular fa-circle-user fa-2x user-icon"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
