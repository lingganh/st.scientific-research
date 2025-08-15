<div>
    <link rel="stylesheet" href="{{ asset('client/workshop.css') }}">

    <section class="page-header workshop-header-banner">
        <div class="overlay"></div>
        <div class="container text-center content">
            <h1 class="display-5 fw-bold mb-3">Sự kiện & Hội thảo</h1>
            <p class="lead mb-0">Nơi chia sẻ kiến thức, kinh nghiệm và các nghiên cứu khoa học mới nhất.</p>
        </div>
    </section>

     <section class="workshop-list py-5">
        <div class="container">
             <div class="row justify-content-center mb-5 g-3">
                <div class="col-lg-6">
                    <div class="workshop-search-bar">
                        <i class="fas fa-search search-icon" aria-hidden="true"></i>
                        <input
                            type="text"
                            class="form-control form-control-lg"
                            placeholder="Tìm kiếm hội thảo theo tên..."
                            wire:model.live="search"
                            aria-label="Tìm kiếm hội thảo theo tên">
                    </div>
                </div>
                <div class="col-lg-3">
                    <input
                        type="date"
                        class="form-control form-control-lg workshop-date-input"
                        wire:model.live="searchDate"
                        aria-label="Lọc theo ngày">
                </div>
            </div>

             <div class="row g-4">
                @forelse($workshops as $workshop)
                    <div class="col-xl-4 col-md-6">
                        <a href="{{ route('workshop.detail', ['workshop' => $workshop->id]) }}" class="glass-card">
                            <div class="card-background" style="--bg: url('{{ $workshop->img }}')"></div>

                            <div class="card-scrim"></div>

                            <div class="card-content">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <span class="badge rounded-pill date-badge">
                                        <i class="fas fa-calendar-alt me-2" aria-hidden="true"></i>
                                        {{ $workshop->start_time->format('d/m/Y') }}
                                    </span>
                                </div>

                                <h3 class="card-heading">{{ $workshop->title }}</h3>
                                <p class="card-description mb-0">{{ Str::limit($workshop->description, 120) }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state text-center p-5">
                            <div class="empty-icon mb-3">
                                <i class="fas fa-search"></i>
                            </div>
                            <h5 class="mb-2">Không tìm thấy hội thảo phù hợp</h5>
                            <p class="text-muted mb-0">Hãy thử đổi từ khóa  nhé.</p>
                        </div>
                    </div>
                @endforelse
            </div>

             <div class="d-flex justify-content-center mt-5">
                {{ $workshops->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>


</div>
