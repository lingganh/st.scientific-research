<div class="container py-5">
    <h2 class="mb-4">Giỏ hàng của bạn</h2>
    @if(count($cartItems) > 0)
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @foreach($cartItems as $item)
                            <div class="row mb-3 align-items-center">
                                <div class="col-md-2">
                                    <img src="{{ $item->attributes->image }}" alt="{{ $item->name }}" class="img-fluid rounded">
                                </div>
                                <div class="col-md-4">
                                    <h5>{{ $item->name }}</h5>
                                </div>
                                <div class="col-md-2">
                                    <input type="number"
                                           class="form-control"
                                           value="{{ $item->quantity }}"
                                           min="1"
                                           wire:change="updateQuantity('{{ $item->id }}', $event.target.value)">
                                </div>
                                <div class="col-md-3 text-end">
                                    <strong>{{ number_format($item->getPriceSum()) }} VND</strong>
                                </div>
                                <div class="col-md-1 text-end">
                                    <button class="btn btn-sm btn-outline-danger" wire:click="removeItem('{{ $item->id }}')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            @if(!$loop->last) <hr> @endif
                        @endforeach
                    </div>
                </div>
                <button class="btn btn-outline-secondary mt-3" wire:click="clearCart">Xóa tất cả</button>
            </div>
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Tổng cộng</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tạm tính</span>
                                <span>{{ number_format($total) }} VND</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <strong>Tổng cộng</strong>
                                <strong>{{ number_format($total) }} VND</strong>
                            </li>
                        </ul>
                        <a href="#" class="btn btn-success w-100 mt-3">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center p-5 border rounded">
            <p>Giỏ hàng của bạn đang trống.</p>
            <a href="{{ route('product') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
        </div>
    @endif
</div>
