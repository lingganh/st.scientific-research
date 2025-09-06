<div>
    {{-- ========================= HERO ========================= --}}
    <section id="home" class="section-hero">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6000" aria-label="Workshops carousel">
            {{-- Indicators --}}
            <div class="carousel-indicators">
                @foreach($workshops as $workshop)
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $loop->iteration }}"></button>
                @endforeach
            </div>

            {{-- Slides --}}
            <div class="carousel-inner">
                @foreach($workshops as $workshop)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="container py-5">
                            <div class="row align-items-center min-vh-60 g-4">
                                <div class="col-lg-6">
                                    <div class="hero-copy">
                                        <span class="eyebrow">Workshop</span>
                                        <h1 class="hero-title">{{ $workshop->title }}</h1>
                                        <p class="hero-desc">{{ Str::limit($workshop->description, 180) }}</p>
                                        <div class="hero-meta">
                                            <span class="chip"><i class="fas fa-calendar-alt me-2"></i>{{ $workshop->start_time->format('d/m/Y') }}</span>
                                            <span class="chip"><i class="fas fa-map-marker-alt me-2"></i>{{ $workshop->location }}</span>
                                        </div>
                                        <a href="{{ route('workshop.detail', ['workshop' => $workshop->id]) }}" class="btn btn-hero mt-3">
                                            Xem ngay <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <div class="hero-media">
                                        <img src="{{ $workshop->img }}" class="hero-img img-fluid rounded-4 shadow-lg" alt="{{ $workshop->title }}" loading="eager" decoding="async" />
                                        <div class="hero-badge">Sắp diễn ra</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Controls --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev" aria-label="Previous slide">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next" aria-label="Next slide">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container text-end mt-2">
            {{-- Link đúng route danh sách workshop theo routes của bạn --}}
            <a class="link-more" href="{{ route('workshop') }}">Xem tất cả workshop</a>
        </div>
    </section>

    {{-- ========================= POSTS ========================= --}}
    <section class="section section-light">
        <div class="container">
            <div class="section-head">
                <h2 class="section-title">Bài viết</h2>
                <a href="{{ route('posts') }}" class="link-more">Xem tất cả</a>
            </div>

            {{-- Scroll ngang mượt, không cần JS --}}
            <div class="scroll-row" role="region" aria-label="Bài viết mới">
                @foreach($posts as $post)
                    <article class="post-card">
                        <a href="{{ route('post.detail', ['post' => $post->id]) }}" class="stretched-link" aria-label="{{ $post->title }}"></a>
                        <div class="ratio ratio-16x9 overflow-hidden rounded-3">
                            <img class="w-100 h-100 object-cover" src="{{ $post->image }}" alt="{{ $post->title }}" loading="lazy" decoding="async" />
                        </div>
                        <h3 class="post-title mt-3">{{ Str::limit($post->title, 48, '…') }}</h3>
                        <div class="post-meta">
                            <span class="dot"></span>
                            <span>Đọc nhanh</span>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ========================= AWARDS ========================= --}}
    <section class="section">
        <div class="container">
            <h2 class="section-title">Giải thưởng khoa học 🌴</h2>
            <div class="award-list">
                @foreach($awards as $award)
                    <div class="award-item {{ $loop->iteration % 2 == 0 ? 'reverse' : '' }}">
                        <div class="award-media">
                            @php $img = optional($award->product)->img; @endphp
                            <img src="{{ $img ?: 'https://via.placeholder.com/600x400?text=No+Image' }}"
                                 alt="{{ optional($award->product)->name ?: 'Không có ảnh sản phẩm' }}"
                                 width="600" height="400" loading="lazy" decoding="async" class="rounded-4 shadow-sm w-100 object-cover" />
                        </div>
                        <div class="award-content">
                            <h3 class="h5 fw-bold mb-2">{{ $award->name }}</h3>
                            <p class="text-muted mb-3">{{ $award->description }}</p>
                            @if($award->product)
                                <a href="{{ route('product.detail', ['productId' => $award->product->id]) }}" class="btn btn-outline-dark btn-sm">Xem sản phẩm</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ========================= CATEGORIES ========================= --}}
    <section class="section section-soft">
        <div class="container">
            <div class="section-head">
                <h2 class="section-title">Danh mục sản phẩm</h2>
                <a href="{{ route('product') }}" class="link-more">Tất cả sản phẩm</a>
            </div>
            <div class="product-carousel">
                @foreach($category as $cate)
                    <div class="cat-card">
                        <a href="{{ route('product', ['category' => $cate->id]) }}" class="cat-card__link">
                            <div class="cat-card__bg"></div>
                            <div class="cat-card__title">{{ $cate->name }}</div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ========================= SUGGESTED PRODUCTS ========================= --}}
    <section class="section section-alt">
        <div class="container">
            <div class="section-head">
                <h2 class="section-title">Gợi ý hôm nay</h2>
                <a href="{{ route('product') }}" class="btn btn-outline-dark btn-sm">Xem thêm</a>
            </div>

            <div class="product-grid">
                @foreach($allProduct as $pd)
                    <div class="p-card">
                        <a href="{{ route('product.detail', ['productId' => $pd->id]) }}" class="stretched-link" aria-label="{{ $pd->name }}"></a>
                        <div class="p-thumb ratio ratio-4x3">
                            <img src="{{ $pd->img }}" alt="{{ $pd->name }}" loading="lazy" decoding="async" class="w-100 h-100 object-cover" />
                        </div>
                        <div class="p-body">
                            <span class="p-cat">{{ optional($pd->categories)->name ?? 'Chưa phân loại' }}</span>
                            <h4 class="p-title">{{ Str::limit($pd->name, 56, '…') }}</h4>
                            <div class="p-meta">
                                <span class="p-price">{{ $pd->price !== null ? number_format($pd->price, 0, ',', '.') . ' VND' : 'Liên hệ' }}</span>
                                <div class="p-actions">
                                    <button class="icon-btn" aria-label="Yêu thích"><i class="fa fa-heart"></i></button>
                                    <button class="icon-btn" aria-label="Thêm vào giỏ"><i class="fa fa-shopping-cart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ========================= SCRIPTS ========================= --}}
    {{-- jQuery (one version only) --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- Slick core --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    {{-- App scripts --}}
    <script src="{{ asset('client/script.js') }}" defer></script>
    <script src="{{ asset('client/observer.js') }}" defer></script>

    <script>
        $(function () {
            // Categories carousel
            $('.product-carousel').slick({
                slide: '.cat-card',
                arrows: true,
                dots: false,
                infinite: true,
                speed: 450,
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2200,
                responsive: [
                    { breakpoint: 1200, settings: { slidesToShow: 4 } },
                    { breakpoint: 992,  settings: { slidesToShow: 3 } },
                    { breakpoint: 768,  settings: { slidesToShow: 2 } },
                    { breakpoint: 576,  settings: { slidesToShow: 1 } }
                ]
            });
        });
    </script>

    {{-- ========================= STYLES ========================= --}}
    <style>
        :root{
            --ink:#0f172a;          /* text */
            --muted:#64748b;        /* secondary */
            --line:#e2e8f0;         /* borders */
            --bg:#ffffff;           /* surface */
            --soft:#f7f7f2;         /* soft section (ấm hơn) */
            --alt:#f1f5f9;          /* alt section */
            --brand:#0ea5e9;        /* primary */
            --brand-2:#22c55e;      /* secondary accent */
        }

        /* Utilities */
        .min-vh-60{ min-height: 60vh }
        .object-cover{ object-fit: cover }
        .section{ padding: 48px 0 }
        .section-light{ background: var(--soft) }
        .section-soft{ background: var(--alt) }
        .section-alt{ background: #efefda }
        .section-head{ display:flex; justify-content:space-between; align-items:center; margin-bottom: 18px }
        .section-title{ font-weight: 900; letter-spacing: -.02em }
        .link-more{ font-weight: 700; color: var(--brand) }

        /* HERO */
        .section-hero{ background: linear-gradient(180deg, #f4f6ff 0%, #f3f4f0 60%, #fff 100%) }
        .eyebrow{ display:inline-block; font-size:.8rem; letter-spacing:.1em; text-transform:uppercase; color: var(--brand); font-weight:800; margin-bottom:.25rem }
        .hero-title{ font-weight: 900; letter-spacing:-.02em; margin-bottom:.5rem }
        .hero-desc{ color:#334155 }
        .hero-meta{ display:flex; gap:.5rem; flex-wrap:wrap }
        .chip{ display:inline-flex; align-items:center; gap:.45rem; background:#fff; border:1px solid var(--line); padding:.35rem .6rem; border-radius: 999px; font-weight:700; box-shadow:0 8px 20px rgba(2,6,23,.05) }
        .btn-hero{ background: linear-gradient(135deg, var(--brand), #38bdf8); color:#fff; border:0; border-radius:.8rem; padding:.8rem 1.15rem; box-shadow: 0 10px 24px rgba(14,165,233,.28) }
        .hero-media{ position:relative; display:inline-block }
        .hero-img{ max-height: 440px; object-fit: cover }
        .hero-badge{ position:absolute; left:12px; bottom:12px; background:#fff; border:1px solid var(--line); border-radius:999px; padding:.35rem .6rem; font-weight:800; font-size:.8rem; color:#0f172a }

        /* POSTS */
        .scroll-row{ display:grid; grid-auto-flow: column; grid-auto-columns: minmax(260px, 1fr); gap:16px; overflow-x:auto; padding-bottom:8px; scroll-snap-type:x mandatory }
        .post-card{ background:var(--bg); border:1px solid var(--line); border-radius:16px; padding:12px; box-shadow:0 8px 20px rgba(2,6,23,.06); min-width: 260px; scroll-snap-align:start; position:relative; transition:transform .15s ease, box-shadow .15s ease }
        .post-card:hover{ transform: translateY(-2px); box-shadow:0 16px 28px rgba(2,6,23,.08) }
        .post-title{ font-weight:800; font-size:1rem; line-height:1.3; margin:0 }
        .post-meta{ display:flex; align-items:center; gap:.5rem; color:#64748b; font-weight:700; font-size:.85rem }
        .post-meta .dot{ width:6px; height:6px; border-radius:50%; background:#cbd5e1 }

        /* AWARDS */
        .award-list{ display:grid; gap:28px }
        .award-item{ display:grid; grid-template-columns: 1.2fr 1fr; gap:24px; align-items:center }
        .award-item.reverse{ grid-template-columns: 1fr 1.2fr }
        .award-item.reverse .award-media{ order:2 }
        .award-item.reverse .award-content{ order:1 }
        .award-content{ padding: 6px 0 }
        .award-media img{ height: 100%; max-height: 320px }

        /* CATEGORIES */
        .cat-card{ padding: 10px }
        .cat-card__link{ display:block; position:relative; background:#fff; border:1px solid var(--line); border-radius:16px; height: 120px; overflow:hidden; box-shadow:0 8px 20px rgba(2,6,23,.06) }
        .cat-card__bg{ position:absolute; inset:0; background: radial-gradient(400px 200px at 20% -10%, rgba(14,165,233,.15), transparent 60%), radial-gradient(400px 200px at 100% 10%, rgba(34,197,94,.15), transparent 60%) }
        .cat-card__title{ position:absolute; left:16px; bottom:14px; font-weight:800 }

        /* PRODUCTS */
        .product-grid{ display:grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 16px }
        .p-card{ background:#fff; border:1px solid var(--line); border-radius:16px; overflow:hidden; box-shadow:0 8px 20px rgba(2,6,23,.06); position:relative; transition:transform .15s ease, box-shadow .15s ease }
        .p-card:hover{ transform: translateY(-2px); box-shadow:0 16px 28px rgba(2,6,23,.08) }
        .p-thumb img{ border-bottom:1px solid var(--line) }
        .p-body{ padding:12px 14px }
        .p-cat{ font-size:.8rem; color:var(--muted); text-transform:uppercase; letter-spacing:.06em; font-weight:800 }
        .p-title{ font-weight:800; margin:.15rem 0 .4rem; font-size:1rem }
        .p-meta{ display:flex; align-items:center; justify-content:space-between }
        .p-price{ font-weight:900 }
        .icon-btn{ border:1px solid var(--line); background:#fff; width:36px; height:36px; border-radius:999px }

        /* Responsive */
        @media (max-width: 1199.98px){ .product-grid{ grid-template-columns: repeat(3, 1fr) } }
        @media (max-width: 991.98px){ .award-item, .award-item.reverse{ grid-template-columns: 1fr } .hero-img{ max-height: 340px } }
        @media (max-width: 767.98px){ .product-grid{ grid-template-columns: repeat(2, 1fr) } }
        @media (max-width: 575.98px){ .product-grid{ grid-template-columns: 1fr } }
    </style>
</div>
