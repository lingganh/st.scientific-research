<div>
    <section id="home" class="hero-slider-container"  style="margin-top: -7%">
        @foreach($workshop as $workshops)

        <div class="hero-slider" >

            <div class="hero-slide"  >
                <div class="container hero-section"> <div class="hero-contents">
                        <h1 class="hero-text" > {{$workshops->title}} </h1>
                        <br />

                        <p class="hero-subText">{{$workshops->description}}</p>
                        <a href="#features" class="cta button">
                            Xem Ngay
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <article class="hero-image-container">
                        <img
                            src="{{$workshops->img}}"
                            alt="green plants"
                            loading="lazy"
                            width="80"
                            height="80"
                        />
                    </article>

                </div>
            </div>


        @endforeach
        </div>
    </section>
    <section id="ab" class="relative" style="background-color: rgb(238, 240, 231); margin-top: -88%">
        <div class="container about-section">
            <h2>Bài Viết </h2>
            <div class="article-carousel">
                @foreach($posts as $post)
                <div class="article-card">
                    <div class="content">
                        <p class="date">{{$post->created_up}}</p>
                        <p class="title">{{$post->title}}</p>
                    </div>
                    <img src="{{$post->image}} " alt="article-cover" />
                </div>
        @endforeach
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
                                <a href=" " class="button more-btn">Khám Phá</a>
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
    </section>

    <section style="background-color: rgb(241, 244, 230);">
        <div class="container features-section relative">
            <h2 class="features_heading w-full">Danh Mục Sản Phẩm</h2>
            <div class="ag-format-container">
                <div class="ag-courses_box   product-carousel"  id="autoScrollingCarousel">
                    <div class="ag-courses_item">
                        <a href="/danh-muc/1" class="ag-courses-item_link">
                            <div class="ag-courses-item_bg"></div>
                            <br>
                            <div class="ag-courses-item_title">
                                Công Nghệ Thông Tin
                            </div>
                        </a>
                    </div>

                    <div class="ag-courses_item">
                        <a href="/danh-muc/2" class="ag-courses-item_link">
                            <div class="ag-courses-item_bg"></div>
                            <br>
                            <div class="ag-courses-item_title">
                                Nông Nghiệp và Sinh Học
                            </div>
                        </a>
                    </div>

                    <div class="ag-courses_item">
                        <a href="/danh-muc/3" class="ag-courses-item_link">
                            <div class="ag-courses-item_bg"></div>
                            <br>
                            <div class="ag-courses-item_title">
                                Khoa Học Xã Hội và Luật
                            </div>
                        </a>
                    </div>

                    <div class="ag-courses_item">
                        <a href="/danh-muc/4" class="ag-courses-item_link">
                            <div class="ag-courses-item_bg"></div>
                            <br>
                            <div class="ag-courses-item_title">
                                Kinh Tế và Quản Lý
                            </div>
                        </a>
                    </div>
                    <div class="ag-courses_item">
                        <a href="/danh-muc/4" class="ag-courses-item_link">
                            <div class="ag-courses-item_bg"></div>
                            <br>
                            <div class="ag-courses-item_title">
                                Tài Nguyên và Môi Trường
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
     <script src="{{ asset('client/script.js') }}"></script>
    <script src="{{ asset('client/observer.js') }}"></script>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>    <script>

        $(document).ready(function() {
            $('.product-carousel').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });

            $('.article-carousel').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
            });
            $('.hero-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 5000,
            });

        });


    </script>



</div>
