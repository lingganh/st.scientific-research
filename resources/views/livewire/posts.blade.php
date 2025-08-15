<div>

    <section class="page-header post-header-banner">
        <div class="overlay"></div>
        <div class="container text-center content">
            <h1 class="display-5 fw-bold mb-2">Bài Viết & Tin Tức</h1>
            <p class="lead mb-0">Cập nhật những nghiên cứu và tin tức mới nhất.</p>
        </div>
    </section>

     <section class="post-list py-5">
        <div class="container">

            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="post-search-bar">
                        <i class="fas fa-search search-icon" aria-hidden="true"></i>
                        <input
                            type="text"
                            class="form-control form-control-lg"
                            placeholder="Tìm kiếm bài viết..."
                            wire:model.live="search"
                            aria-label="Tìm kiếm bài viết"
                        >
                    </div>
                </div>
            </div>

             <div class="row g-4">
                @forelse($posts as $post)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('post.detail', ['post' => $post->id]) }}" class="post-card">
                            <div class="card-image">
                                <img
                                    src="{{ $post->image }}"
                                    alt="{{ $post->title }}"
                                    loading="lazy"
                                    onerror="this.onerror=null;this.src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKHsWP6E5HXYQSDgYWbXeVphjCi8R7uB-d8PkWT9tORcn6fbIwfNG2wmq2AAp2hzGCz7A&usqp=CAU';"
                                >
                                <span class="card-category">Tin tức</span>
                                <span class="image-scrim" aria-hidden="true"></span>
                            </div>

                            <div class="card-body">
                                <h3 class="card-title">{{ $post->title }}</h3>
                                <p class="card-excerpt">
                                    {{ Str::limit($post->excerpt ?? strip_tags($post->content), 120) }}
                                </p>
                                <div class="card-meta">
                                    <span class="meta-item">
                                        <i class="fas fa-calendar-alt me-2"></i>{{ $post->created_at->format('d/m/Y') }}
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="empty-state text-center p-5">
                            <div class="empty-icon mb-3"><i class="fas fa-newspaper"></i></div>
                            <h5 class="mb-1">Không tìm thấy bài viết nào</h5>
                            <p class="text-muted mb-0">Thử đổi từ khóa tìm kiếm nhé.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-5">
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>

    <style>

        :root{
            --brand:#2E4D1B;
            --brand-100:#ecf4ea;
            --ink:#0f172a;
            --muted:#64748b;
            --line:#e5e7eb;
            --surface:#ffffff;
            --radius:16px;
            --shadow-1:0 10px 30px rgba(0,0,0,.08);
            --shadow-2:0 20px 50px rgba(0,0,0,.16);
        }


    </style>
</div>
