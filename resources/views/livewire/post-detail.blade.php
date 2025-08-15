<div class="pd2" style="--pd2-img:url('{{ $post->image }}')">
    {{-- HERO --}}
    <section class="pd2-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <div class="pd2-eyebrow">BÀI VIẾT • TIN TỨC</div>
                    <h1 class="pd2-title">{{ $post->title }}</h1>
                    <div class="pd2-meta">
                        <span class="pd2-meta-item">
                            <i class="fas fa-calendar-alt me-2"></i>{{ $post->created_at->format('d/m/Y') }}
                        </span>
                        @if(optional($post->user)->name)
                            <span class="pd2-dot">•</span>
                            <span class="pd2-meta-item">
                            <i class="fas fa-user me-2"></i>{{ $post->user->name }}
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="pd2-hero-card">
                        <img
                            src="{{ $post->image }}"
                            alt="{{ $post->title }}"
                            loading="lazy"
                            onerror="this.onerror=null;this.src='https://placehold.co/900x600?text=No+Image';">
                    </div>
                </div>
            </div>
        </div>
    </section>

     <section class="pd2-main">
        <div class="container">
            <div class="row g-4">
                 <div class="col-lg-8">
                    <div class="pd2-card">
                        <div class="pd2-card-head">Về bài viết</div>
                        <article class="pd2-prose">
                            {!! $post->content !!}
                        </article>
                    </div>
                </div>

                 <div class="col-lg-4">
                    <div class="pd2-stack">
                        <div class="pd2-info">
                            <div class="pd2-info-label">NGÀY ĐĂNG</div>
                            <div class="pd2-info-value">{{ $post->created_at->format('d/m/Y') }}</div>
                        </div>

                        @if(optional($post->user)->name)
                            <div class="pd2-info">
                                <div class="pd2-info-label">TÁC GIẢ</div>
                                <div class="pd2-info-value">{{ $post->user->name }}</div>
                            </div>
                        @endif

                        <div class="pd2-info">
                            <div class="pd2-info-label">CẬP NHẬT</div>
                            <div class="pd2-info-value">{{ $post->updated_at->format('d/m/Y H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
