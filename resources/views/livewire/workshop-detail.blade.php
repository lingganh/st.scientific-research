<div>
    <link rel="stylesheet" href="{{ asset('client/workshopdetail.css') }}">

    <section class="hero-ed" style="--img:url('{{ $workshop->img }}')">
        <div class="hero-ed__bg" aria-hidden="true"></div>
        <div class="hero-ed__overlay" aria-hidden="true"></div>
        <div class="container">
            <div class="row g-4 align-items-end">
                <div class="col-lg-7">
                    <nav class="crumbs" aria-label="breadcrumb">
                        <span class="crumb">Sự kiện</span>
                        <span class="sep" aria-hidden="true">/</span>
                        <span class="crumb current">Workshop</span>
                    </nav>
                    <h1 class="title-ed">{{ $workshop->title }}</h1>
                    <div class="meta-ed">
                        <span class="chip"><i class="fas fa-calendar-alt me-2"></i>{{ $workshop->start_time->format('d/m/Y') }}</span>
                        <span class="chip"><i class="fas fa-map-marker-alt me-2"></i>{{ $workshop->location }}</span>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="img-frame" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="body-ed">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <article class="card-ed">
                        <h2 class="h-ed">Về hội thảo</h2>
                        <p class="lead text-muted">{{ $workshop->description }}</p>
                    </article>
                </div>
                <div class="col-lg-4">
                    <aside class="side-ed">
                        <div class="block-ed">
                            <div class="lbl">Ngày</div>
                            <div class="val">{{ $workshop->start_time->format('d/m/Y') }}</div>
                        </div>
                        <div class="block-ed">
                            <div class="lbl">Thời gian</div>
                            <div class="val">
                                {{ $workshop->start_time->format('H:i') }}
                                @if(!empty($workshop->end_time)) – {{ $workshop->end_time->format('H:i') }} @endif
                            </div>
                        </div>
                        <div class="block-ed">
                            <div class="lbl">Sức chứa</div>
                            <div class="val">{{ $workshop->capacity ?? '—' }} người</div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>


</div>
