<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<div class="loader-container">
    <div class="loader"></div>
</div>
<div class="overlay"></div>
<body class="relative">
<header>
    <div class="container header-section">
        <div aria-details="logo" class="logo">
            <img src="https://vitc.edu.vn/Frond_end/images/logo_vnua-1.png" alt="VNUA Logo" class="vnua-logo">

            <div class="logo-text">
                <a href="{{route('home')}}">Scientific Research</a>
                <span class="logo-subtext">Vietnam National University of Agriculture</span>
            </div>

        </div>
        <div class="menu" id="menu">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </div>
        <nav>
            <ul class="nav-links">

                <li style="--d: 0.1s">
                    <a href="{{route('product')}}">Sản Phẩm </a>
                </li>
                <li style="--d: 0.2s">
                    <a href="{{route('workshop')}}">Hội Thảo</a>
                </li>
                <li style="--d: 0.3s">
                    <a href="#about">Bài Viết</a>
                </li>

                <div class="search-container">
                    <input type="text" name="search" placeholder="Search..." class="search-input">
                    <a href="#" class="search-btn">
                        <i class="fas fa-search fa-2x"></i>
                    </a>
                </div>
                <li style="--d: 0.12s">
                    <a class="nav-link" href="giohang.html"><i class="fa" style="font-size:24px;color:black">&#xf07a;</i>
                        <span class='badge badge-warning' id='lblCartCount'> 5 </span>
                    </a>
                <li style="--d: 0.11s">
                     @if (!Auth::check())
                        <a class="nav-link" href="{{ route('login') }}"><i class="fa-regular fa-circle-user fa-2x"  ></i></a>
                    @else
                        <a class="nav-link" href="{{route('home')}}"><i class="fa-regular fa-circle-user fa-2x"  ></i></a>
                    @endif

                </li>
            </ul>


        </nav>
    </div>
</header>
