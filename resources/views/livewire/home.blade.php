<div>
    <section id="home" class="hero-slider-container" >


        <div class="hero-slider"  >

            <div class="hero-slide">
                <div class="container hero-section">
                    <div class="hero-contents">
                        <h1 class="hero-text">

                            {{$workshop->title}}
                            <pre>
                            </pre>

                        </h1>
                        <br/>

                        <p class="hero-subText">{{$workshop->description}}</p>

                        <a href="#features" class="cta button">
                            Xem Ngay
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <article class="hero-image-container">
                        <img
                            src="{{$workshop->img}}"
                            alt="green plants"
                            loading="lazy"
                            width="80"
                            height="80"
                        />
                    </article>

                </div>
            </div>


        </div>
    </section>
    <section id="ab" class="relative" style="background-color: rgb(238, 240, 231); ">
        <div class="container about-section">
            <h2>Bài Viết </h2>
            <div class="carousel"  mask>

            </div>
        </div>
    </section>

    <section id="features" class="relative">
        <div class="strip-line horizontal"></div>
        <div class="strip-line horizontal"></div>
        <div class="strip-line horizontal"></div>

        <div class="container features-section relative">
            <h2 class="features_heading w-full">Giải Thưởng Khoa Học 🌴</h2>

            <div class="features flex-group relative">
                <div class="strip-line vertical"></div>
                @foreach($awards as $award)
                    <div class="feature {{ $loop->iteration % 2 == 0 ? 'feature-two' : 'feature-one' }} flex-group">
                        <div class="circle absolute"></div>
                        <div class="feature {{ $loop->iteration % 2 == 0 ? 'feature-two' : 'feature-one' }} flex-group">
                            <div class="circle absolute"></div>
                            @if ($loop->iteration % 2 != 0)
                                <div class="image-section">
                                    @if ($award->product && $award->product->img)
                                        <img
                                            src="{{ $award->product->img }}"
                                            alt="{{ $award->product->name ?? '' }}"
                                            width="100"
                                            height="100"
                                            loading="lazy"
                                        />
                                    @else
                                        <img
                                            src="https://via.placeholder.com/100"
                                            alt="Không có ảnh sản phẩm"
                                            width="100"
                                            height="100"
                                            loading="lazy"
                                        />
                                    @endif
                                </div>
                            @endif
                            <article class="text-section">
                                <h3 class="title">
                                    <span>{{$award->name}} </span>
                                </h3>
                                <p class="description">
                                    {{ $award->description }}
                                </p>
                                <a href=" " class="button more-btn">Khám Phá
                                </a>
                            </article>
                            @if ($loop->iteration % 2 == 0)
                                <div class="image-section">
                                    @if ($award->product && $award->product->img)
                                        <img
                                            src="{{ $award->product->img }}"
                                            alt="{{ $award->product->name ?? '' }}"
                                            width="100"
                                            height="100"
                                            loading="lazy"
                                        />
                                    @else
                                        <img
                                            src="https://via.placeholder.com/100"
                                            alt="Không có ảnh sản phẩm"
                                            width="100"
                                            height="100"
                                            loading="lazy"
                                        />
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section style="background-color: rgb(241, 244, 230); margin-left:-2%">
        <div class="container features-section relative">
            <h2 class="features_heading w-full">Danh Mục Sản Phẩm</h2>
            <div class="ag-format-container">
                <div class="ag-courses_box   product-carousel" id="autoScrollingCarousel">
                    @foreach($category as $cate)
                        <div class="ag-courses_item">
                            <a href="/danh-muc/1" class="ag-courses-item_link">
                                <div class="ag-courses-item_bg"></div>
                                <br>
                                <div class="ag-courses-item_title">
                                    {{$cate->name}}
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #efefda;">
        <div class="container about-section">
            <h2>Gợi Ý Hôm Nay </h2>
            <div class="container features-section relative">

             <div class="product-grid-container">
                @foreach($allProduct as $pd)
                    <div class="product-card">
                         <div class="product-tumb">
                             <img src="{{$pd->img}}" alt="{{$pd->name ?? 'Sản phẩm'}}">
                        </div>
                        <div class="product-details">
                             <span class="product-catagory">{{$pd->categories->name ?? 'Chưa phân loại'}}</span>
                            <h4><a href="#">{{$pd->name}}</a></h4>
                            <div class="product-bottom-details">
                                 <div class="product-price"> {{ number_format($pd->price )  ?? 'Liên Hệ'}}đ</div>
                                <div class="product-links">
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

             </div>
                <div class="text-box">
                    <a href="{{route('product')}}" class="btn btn-white btn-animate">Xem Thêm</a>
                </div>


            </div>


        </div>

    </section>


    <script src="{{ asset('client/script.js') }}"></script>
    <script src="{{ asset('client/observer.js') }}"></script>


    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


    <script>
        $(document).ready(function () {
            $('.product-carousel').slick({
                dots: false, // desktop
                infinite: true,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                responsive: [
                    {
                        breakpoint: 1024, // Tablet
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 768, // Mobile
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: false,
                            arrows:true
                        }
                    }
                ]
            });


        });
    </script>
</div>
