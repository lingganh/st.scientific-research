<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product; // Import model Product
use App\Models\Category; // Có thể cần nếu muốn hiển thị danh mục liên quan

class ProductDetail extends Component
{
    public $productId; // Biến để lưu trữ ID sản phẩm từ URL
    public $product;   // Biến để lưu trữ đối tượng sản phẩm

    // Phương thức mount được gọi khi component được khởi tạo
    public function mount($productId)
    {
        $this->productId = $productId;
        $this->loadProduct();
    }

    // Phương thức để tải sản phẩm
    public function loadProduct()
    {
        // Tìm sản phẩm bằng ID, hoặc chuyển hướng nếu không tìm thấy
        $this->product = Product::with('categories')->find($this->productId);

        if (!$this->product) {
            // Chuyển hướng về trang sản phẩm nếu không tìm thấy
            // Bạn có thể tùy chỉnh route này
            return redirect()->route('products');
        }
    }

    public function render()
    {
        return view('livewire.product-detail', [
            'product' => $this->product,
        ])->extends('components.layouts.app') // Kế thừa layout chính của bạn
        ->section('content'); // Đặt nội dung vào section 'content'
    }
}
