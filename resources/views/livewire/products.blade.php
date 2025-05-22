<div>
    <section style="background-color: #efefda;">
        <div class="container about-section">
            <h2> Tất Cả Sản Phẩm</h2>
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
                                    <div class="product-price"> {{ ($pd->price !== null) ? number_format($pd->price, 0, ',', '.') . ' VND' : 'Liên Hệ' }}</div>                                    <div class="product-links">
                                        <a href="#"><i class="fa fa-heart"></i></a>
                                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
