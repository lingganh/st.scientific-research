<div>
    <br><br><br>
    <div class="pdp-wrapper">

        <link rel="stylesheet" href="{{ asset('client/productDetail.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

        @if ($product)
            <div class="pdp-container">
                <div class="pdp-card">
                    <section class="pdp-gallery">
                        <div class="pdp-gallery__main-image">
                            <img id="pdp-main-product-image" src="{{ $product->img ?? asset('path/to/default-image.jpg') }}" alt="{{ $product->name ?? 'Sản phẩm chính' }}">
                        </div>
                        <div class="pdp-gallery__thumbnails">
                            <img class="pdp-gallery__thumbnail-img active" src="{{ $product->img ?? asset('path/to/default-image.jpg') }}" alt="{{ $product->name }}">
                            <img class="pdp-gallery__thumbnail-img" src="https://images.pexels.com/photos/7974/pexels-photo.jpg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Thumbnail 2">
                            <img class="pdp-gallery__thumbnail-img" src="https://images.pexels.com/photos/341523/pexels-photo-341523.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Thumbnail 3">
                            <img class="pdp-gallery__thumbnail-img" src="https://images.pexels.com/photos/6625032/pexels-photo-6625032.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Thumbnail 4">
                        </div>
                    </section>

                    <section class="pdp-info">
                        <div class="pdp-info__category">{{ $product->categories->name ?? 'Chưa phân loại' }}</div>
                        <h1 class="pdp-info__title">{{ $product->name ?? 'Tên sản phẩm' }}</h1>

                        <div class="pdp-info__price">
                            @if ($product->price !== null)
                                <span>{{ number_format($product->price, 0, ',', '.') }}₫</span>
                            @else
                                <span>Liên hệ</span>
                            @endif

                            @if ($product->old_price ?? false)
                                <span class="pdp-info__old-price">{{ number_format($product->old_price, 0, ',', '.') }}₫</span>
                            @endif
                        </div>

                        <p class="pdp-info__description">
                            {{ $product->short_description ?? 'Sản phẩm chưa có mô tả ngắn. Trải nghiệm hiệu năng đỉnh cao và thiết kế sang trọng.' }}
                        </p>

                        <div class="pdp-action-group">
                            <div class="pdp-main-actions">
                                <div class="pdp-quantity-selector">
                                    <button class="pdp-quantity-selector__btn" data-action="minus">-</button>
                                    <input type="text" id="pdp-quantity-input" value="1" readonly>
                                    <button class="pdp-quantity-selector__btn" data-action="plus">+</button>
                                </div>

                                <button id="pdp-wishlist-btn" class="pdp-btn pdp-btn--wishlist" aria-label="Yêu thích">
                                    <i class="far fa-heart"></i>
                                </button>

                                <button class="pdp-btn pdp-btn--add-to-cart"><i class="fas fa-shopping-cart" style="margin-right: 8px;"></i> Thêm vào giỏ</button>
                            </div>
                            <button class="pdp-btn pdp-btn--buy-now">Mua ngay</button>
                        </div>
                    </section>
                </div>

                <div class="pdp-details-accordion">
                    <div class="pdp-accordion-item active">
                        <div class="pdp-accordion-header">
                            <span>Mô tả chi tiết</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="pdp-accordion-content">
                            {!! $product->description ?? 'Sản phẩm hiện chưa có mô tả chi tiết.' !!}
                        </div>
                    </div>

                    <div class="pdp-accordion-item">
                        <div class="pdp-accordion-header">
                            <span>Thông số kỹ thuật</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="pdp-accordion-content">
                            @if ($product->specs ?? false)
                                <ul>
                                    @foreach($product->specs as $spec)
                                        <li><strong>{{ $spec['name'] }}:</strong> {{ $spec['value'] }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p>Chưa có thông số kỹ thuật chi tiết cho sản phẩm này.</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="pdp-customer-reviews">
                    <h2 class="pdp-reviews-title">Đánh giá từ khách hàng</h2>

                    @if (($product->reviews_count ?? 0) > 0)
                        <div class="pdp-reviews-summary">
                            <div class="pdp-summary-score">
                                <div class="pdp-score-value">{{ number_format($product->average_rating ?? 0, 1) }}</div>
                                <div class="pdp-stars">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                </div>
                                <div class="pdp-total-reviews">{{ $product->reviews_count ?? 0 }} đánh giá</div>
                            </div>
                            <div class="pdp-summary-bars">
                                <div class="pdp-rating-bar-row"><div class="pdp-label">5 sao</div><div class="pdp-progress-bg"><div class="pdp-progress-fg" style="width: 85%;"></div></div><div class="pdp-count">...</div></div>
                                <div class="pdp-rating-bar-row"><div class="pdp-label">4 sao</div><div class="pdp-progress-bg"><div class="pdp-progress-fg" style="width: 10%;"></div></div><div class="pdp-count">...</div></div>
                            </div>
                        </div>

                        <div class="pdp-reviews-list">
                            <h3 class="pdp-reviews-list-title">Nhận xét chi tiết</h3>
                            @foreach($product->reviews as $review)
                                <div class="pdp-review-card">
                                    <div class="pdp-review-header">
                                        <img class="pdp-review-avatar" src="{{ $review->user->avatar ?? 'https://i.pravatar.cc/150?u='.$review->user->id }}" alt="{{ $review->user->name }}">
                                        <span class="pdp-review-author">{{ $review->user->name ?? 'Người dùng' }}</span>
                                        <div class="pdp-review-rating">
                                            @for ($i = 0; $i < 5; $i++)
                                                <i class="{{ $i < $review->rating ? 'fas' : 'far' }} fa-star"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <p class="pdp-review-text">{{ $review->comment }}</p>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="pdp-no-reviews-message">Chưa có đánh giá nào cho sản phẩm này.</div>
                    @endif
                </div>

            </div>
        @else
            <div class="pdp-container">
                <p class="pdp-no-product-found">Sản phẩm không tồn tại hoặc đã bị xóa.</p>
            </div>
        @endif

        <br><br><br>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const wrapper = document.querySelector('.pdp-wrapper');
                if (!wrapper) {
                    console.error('PDP Wrapper not found!');
                    return;
                }

                // --- Xử lý Gallery Ảnh ---
                const mainImage = wrapper.querySelector('#pdp-main-product-image');
                const thumbnails = wrapper.querySelectorAll('.pdp-gallery__thumbnail-img');
                thumbnails.forEach(thumb => {
                    thumb.addEventListener('click', function() {
                        const currentActive = wrapper.querySelector('.pdp-gallery__thumbnail-img.active');
                        if(currentActive) currentActive.classList.remove('active');
                        this.classList.add('active');
                        if(mainImage) mainImage.src = this.src;
                    });
                });

                // --- Xử lý Accordion ---
                const accordionItems = wrapper.querySelectorAll('.pdp-accordion-item');
                accordionItems.forEach(item => {
                    const header = item.querySelector('.pdp-accordion-header');
                    header.addEventListener('click', () => {
                        item.classList.toggle('active');
                    });
                });

                // --- Xử lý Quantity Selector ---
                const quantityInput = wrapper.querySelector('#pdp-quantity-input');
                const quantityBtns = wrapper.querySelectorAll('.pdp-quantity-selector__btn');
                if(quantityInput && quantityBtns) {
                    quantityBtns.forEach(btn => {
                        btn.addEventListener('click', function() {
                            let currentValue = parseInt(quantityInput.value);
                            if (this.dataset.action === 'plus') {
                                currentValue++;
                            } else {
                                currentValue = currentValue > 1 ? currentValue - 1 : 1;
                            }
                            quantityInput.value = currentValue;
                        });
                    });
                }

                // --- Xử lý Nút Yêu thích (Tim) ---
                const wishlistBtn = wrapper.querySelector('#pdp-wishlist-btn');
                if (wishlistBtn) {
                    const heartIcon = wishlistBtn.querySelector('i');
                    wishlistBtn.addEventListener('click', function() {
                        this.classList.toggle('active');

                        if (this.classList.contains('active')) {
                            heartIcon.classList.remove('far');
                            heartIcon.classList.add('fas');
                        } else {
                            heartIcon.classList.remove('fas');
                            heartIcon.classList.add('far');
                        }
                    });
                }
            });
        </script>
    </div>
</div>
