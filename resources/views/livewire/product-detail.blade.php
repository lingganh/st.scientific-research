<div class="product-detail-page">
    <link rel="stylesheet" href="{{ asset('client/productDetail.css') }}">

@if ($product)
        <div class="product-detail-container">
            <div class="product-image-section">
                <img src="{{ $product->img }}" alt="{{ $product->name ?? 'Sản phẩm' }}" class="product-main-image">
                {{-- Nếu có nhiều ảnh, bạn có thể thêm carousel hoặc gallery ở đây --}}
            </div>

            <div class="product-info-section">
                <h1 class="product-title">{{ $product->name }}</h1>

                <p class="product-category">
                    Danh mục: <span class="category-name">{{ $product->categories->name ?? 'Chưa phân loại' }}</span>
                </p>

                <div class="product-price">
                    Giá:
                    @if ($product->price !== null)
                        <span class="price-value">{{ number_format($product->price, 0, ',', '.') }} VND</span>
                    @else
                        <span class="price-value">Liên Hệ</span>
                    @endif
                </div>

                <div class="product-description">
                    <h3>Mô tả sản phẩm:</h3>
                    <p>{{ $product->description ?? 'Không có mô tả.' }}</p>
                </div>

                <div class="product-actions">
                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                    <button class="add-to-wishlist-btn"><i class="fa fa-heart"></i> Yêu thích</button>
                </div>

                {{-- Bạn có thể thêm các thông tin khác như tồn kho, SKU, đánh giá, v.v. --}}
            </div>
        </div>
    @else
        <p class="no-product-found">Sản phẩm không tồn tại hoặc đã bị xóa.</p>
    @endif
</div>


