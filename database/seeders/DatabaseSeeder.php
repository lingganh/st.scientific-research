<?php

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;
use App\Models\Award;
use App\Models\Post;
use App\Models\Product;
use App\Models\Text;
use App\Models\Workshop;
use App\Models\Feedback;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed Users
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        User::create([
            'name' => 'User 1',
            'email' => 'user1@example.com',
            'password' => bcrypt('password'),
        ]);

        // Seed Authors
        Author::create(['name' => 'Tác giả A', 'bio' => 'Tiểu sử tác giả A']);
        Author::create(['name' => 'Tác giả B', 'bio' => 'Tiểu sử tác giả B']);

        // Seed Categories
        Category::create(['name' => 'Nông Nghiệp và Sinh Học']);
        Category::create(['name' => 'Kỹ Thuật và Công Nghệ']);
        Category::create(['name' => 'Khoa Học Xã Hội và Luật']);
        Category::create(['name' => 'Kinh Tế và Quản Lý']);

        // Seed Awards
        Award::create(['name' => 'Giải thưởng 1', 'description' => 'Mô tả giải thưởng 1']);
        Award::create(['name' => 'Giải thưởng 2', 'description' => 'Mô tả giải thưởng 2']);

        // Seed Products
        Product::create(['name' => 'Sản phẩm X', 'idTG' => 1, 'idDM' => 1, 'moTa' => 'Mô tả sản phẩm X']);
        Product::create(['name' => 'Sản phẩm Y', 'idTG' => 2, 'idDM' => 2, 'moTa' => 'Mô tả sản phẩm Y']);

        // Seed Posts
        Post::create([
            'title' => 'Bài viết 1',
            'content' => 'Nội dung bài viết 1',
            'user_id' => 1,
        ]);
        Post::create([
            'title' => 'Bài viết 2',
            'content' => 'Nội dung bài viết 2',
            'user_id' => 2,
        ]);

        // Seed Texts
        Text::create(['key' => 'homepage_title', 'value' => 'Chào mừng đến trang web', 'locale' => 'vi']);
        Text::create(['key' => 'about_us', 'value' => 'Đây là trang giới thiệu', 'locale' => 'vi']);
        Text::create(['key' => 'van_ban_khcn', 'value' => 'Văn bản KH&CN', 'locale' => 'vi']);
        Text::create(['key' => 'nhiem_vu_khcn_cap_bo', 'value' => 'Nhiệm vụ khoa học và công nghệ cấp Bộ', 'locale' => 'vi']);
        Text::create(['key' => 'nhiem_vu_khcn_cap_quoc_gia', 'value' => 'Nhiệm vụ khoa học và công nghệ cấp quốc gia', 'locale' => 'vi']);
        Text::create(['key' => 'huong_dan_du_toan_kinh_phi', 'value' => 'Hướng dẫn dự toán kinh phí nhiệm vụ khoa học và công nghệ', 'locale' => 'vi']);

        // Seed Workshops
        Workshop::create([
            'title' => 'Hội thảo A',
            'description' => 'Mô tả hội thảo A',
            'start_time' => Carbon::now()->addDays(10),
            'end_time' => Carbon::now()->addDays(10)->addHours(3),
            'location' => 'Hà Nội',
            'capacity' => 50,
        ]);
        Workshop::create([
            'title' => 'Hội thảo B',
            'description' => 'Mô tả hội thảo B',
            'start_time' => Carbon::now()->addDays(20),
            'end_time' => Carbon::now()->addDays(20)->addHours(5),
            'location' => 'TP.HCM',
            'capacity' => 100,
        ]);

        // Seed Feedback
        Feedback::create(['name' => 'Khách 1', 'message' => 'Góp ý 1']);
        Feedback::create(['name' => 'Khách 2', 'message' => 'Góp ý 2']);
    }
}
