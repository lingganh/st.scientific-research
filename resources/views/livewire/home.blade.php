<div>
    <section id="home" style="background-color: #f3f4f0; padding: 3rem 0;">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($workshops as $workshop)

                <div class="carousel-item active">
                    <div class="container">
                        <div class="row align-items-center" style="min-height: 70vh;">
                            <div class="col-lg-6 hero-contents">
                                <h1 class="hero-text">{{ $workshop->title }}</h1>
                                <p class="hero-subText">{{ $workshop->description }}</p>
                                <a href="{{ route('workshop.detail', ['workshopId' => $workshop->id]) }}  "  class="cta button">
                                    Xem Ngay
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="col-lg-6 hero-image-container text-center">
                                <img src="{{ $workshop->img }}" class="img-fluid rounded shadow-lg" alt="Workshop Image"  >
                            </div>
                        </div>

                    </div>
                </div>
                    @endforeach
            </div>

             <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>    <section id="ab" class="relative" style="background-color: rgb(238, 240, 231); ">
        <div class="container about-section">
            <h2>Bài Viết </h2>
            <br>
            <div class="marquee-container">

            <div class="marquee-carousel" >
                @foreach($posts as $post)

                <article class="marquee-card">
                    <img
                        class="marquee-card__background"
                        src="{{$post->image}}"
                        alt="The Cross"
                        width="1920"
                        height="2193"
                    />
                    <div class="marquee-card__content | marquee-card-flow">
                        <div class="marquee-card__content-container | marquee-card-flow">
                            <h2 class="marquee-card__title">{{ Str::limit($post->title, 32, '...') }}</h2>


                        </div>
                        <button class="marquee-card__button">Xem Thêm</button>
                    </div>
                </article>
                @endforeach
            </div>
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
                                <div class="product-price">{{ ($pd->price !== null) ? number_format($pd->price, 0, ',', '.') . ' VND' : 'Liên Hệ' }}</div>
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
