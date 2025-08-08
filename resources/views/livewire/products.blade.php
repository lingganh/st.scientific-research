<div>
    <!--AlpineJS-->
     <section style="background-color: #efefda;"
             x-data
             x-init="
                let perPageValue = 9;
                if (window.innerWidth < 992) {
                    perPageValue = 6;
                } else if (window.innerWidth < 1463) {
                    perPageValue = 8;
                }
                 $dispatch('per-page-updated', { perPage: perPageValue });
             "
    >
        <div class="container about-section">
            <div class="top-search-bar">
                <input type="text"
                       placeholder="Tìm kiếm sản phẩm..."
                       class="search-input-full-width"
                       wire:model.live="search">
                <i class="fas fa-search search-icon-full-width"></i>
            </div>

            <div class="product-page-layout">
                <div class="product-sidebar-filters">
                    <h3>Bộ Lọc Sản Phẩm</h3>
                    <div class="filter-section">
                        <h4>Danh mục</h4>
                        <select id="category-filter" class="filter-select" wire:model.live="selectedCategory">
                            <option value="">Tất cả</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="filter-section">
                        <h4>Sắp xếp</h4>
                        <select id="sort-order" class="filter-select" wire:model.live="sortOrder">
                            <option value="default">Mặc định</option>
                            <option value="price_asc">Giá: Thấp đến Cao</option>
                            <option value="price_desc">Giá: Cao đến Thấp</option>
                        </select>
                    </div>
                </div>

                <div class="product-main-content">
                    <div class="product-grid-container">
                        @forelse($allProduct as $pd)
                            <div class="product-card">
                                <div class="product-tumb">
                                    <img src="{{$pd->img}}" alt="{{$pd->name ?? 'Sản phẩm'}}">
                                </div>
                                <div class="product-details">
                                     <span class="product-catagory">
                                         {{ $pd->categories->first()->name ?? 'Chưa phân loại' }}
                                    </span>
                                    <h4><a href="{{ route('product.detail', ['productId' => $pd->id]) }}">{{$pd->name}}</a></h4>
                                    <div class="product-bottom-details">
                                        <div class="product-price">{{ ($pd->price !== null) ? number_format($pd->price, 0, ',', '.') . ' VND' : 'Liên Hệ' }}</div>
                                        <div class="product-links">
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="no-products-message">Không tìm thấy sản phẩm nào phù hợp với tiêu chí của bạn.</p>
                        @endforelse
                    </div>
                    <div class="pagination-wrapper">
                        <div class="pagination">
                            {{ $allProduct->links() }}
                        </div>
                    </div>
            </div>
        </div>
        </div>
    </section>

 </div>
