<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
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

             <div class="collapse navbar-collapse" id="mainNavbar">
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
                        <a class="nav-link" href="{{ route('posts') }}">Bài Viết</a>
                    </li>


                 <ul class="navbar-nav d-lg-none">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart')}}">Giỏ hàng</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.user') }}">Xin chào, {{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">
                                 Đăng xuất
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Tài khoản</a>
                        </li>
                    @endif
                </ul>
            </div>

             <div class="d-none d-lg-flex align-items-center">
                <a class="nav-link no-underline-hover" href="{{route('cart')}}">
                    <i class="fa fa-shopping-cart cart-icon"></i>
                    <span class='badge badge-warning' id='lblCartCount'>5</span>
                </a>
                @if (Auth::check())
                    <a class="nav-link ml-2 no-underline-hover" href="{{ route('profile.user') }}">
                        <i class="fa-regular fa-circle-user fa-2x user-icon"></i>
                    </a>

                @else
                     <a class="nav-link ml-2 no-underline-hover" href="{{ route('login') }}">
                        <i class="fa-regular fa-circle-user fa-2x user-icon"></i>
                    </a>
                @endif
            </div>
        </div>
    </nav>
</header>


