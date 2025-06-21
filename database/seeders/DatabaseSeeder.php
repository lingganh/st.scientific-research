<?php

use App\Models\ProductImage;
use App\Models\Review;
use App\Models\Wishlist;
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
        User::create(['name' => 'Quản trị viên hệ thống', 'email' => 'admin@vnua.edu.vn', 'password' => bcrypt('vnua@123')]);
        User::create(['name' => 'Nguyễn Văn A', 'email' => 'nguyenvana@example.com', 'password' => bcrypt('password123')]);
        User::create(['name' => 'Trần Thị B', 'email' => 'tranthib@example.com', 'password' => bcrypt('securepass')]);
        User::create(['name' => 'Nguyễn Thị D', 'email' => 'nguyenthid@example.com', 'password' => bcrypt('pass1234')]);
        User::create(['name' => 'Lê Văn E', 'email' => 'levane@example.com', 'password' => bcrypt('secureword')]);

        // Seed Authors
        Author::create(['name' => 'GS. TS. Lê Sỹ Thanh', 'bio' => 'Giáo sư, Tiến sĩ đầu ngành về Nông nghiệp Công nghệ cao.']);
        Author::create(['name' => 'PGS. TS. Hoàng Kim Anh', 'bio' => 'Phó Giáo sư, Tiến sĩ chuyên về Công nghệ Sinh học Thực vật.']);
        Author::create(['name' => 'ThS. Nguyễn Thị Cẩm Vân', 'bio' => 'Thạc sĩ, Nghiên cứu viên tại Viện Nghiên cứu Kinh tế Nông nghiệp.']);
        Author::create(['name' => 'TS. Trần Quang Huy', 'bio' => 'Tiến sĩ, Nghiên cứu viên cao cấp về Tự động hóa Nông nghiệp.']);
        Author::create(['name' => 'ThS. Phạm Thị Thu Hà', 'bio' => 'Thạc sĩ, Chuyên gia về Kinh tế Nông nghiệp Quốc tế.']);

        // Seed Categories
        Category::create(['name' => 'Nông Nghiệp và Sinh Học']);
        Category::create(['name' => 'Kỹ Thuật và Công Nghệ']);
        Category::create(['name' => 'Khoa Học Xã Hội và Luật']);
        Category::create(['name' => 'Kinh Tế và Quản Lý']);
        Category::create(['name' => 'Tài Nguyên và Môi Trường']);
        Category::create(['name' => 'Công nghệ Sau Thu Hoạch']);
        Category::create(['name' => 'Phát triển Nông thôn Bền vững']);
        Category::create(['name' => 'Giống Cây Trồng và Vật Nuôi']);
        Category::create(['name' => 'Phân Bón và Thuốc Bảo Vệ Thực Vật']);
        Category::create(['name' => 'Máy móc và Thiết bị Nông nghiệp']);

        // Seed Products with more reliable image URLs
        Product::create([
            'name' => 'Hạt giống lúa chịu hạn NK7328',
            'idTG' => 1,
            'img' => 'https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 8,
            'moTa' => 'Giống lúa thuần chất lượng cao, chịu hạn tốt, năng suất ổn định.',
            'price'=>1000
        ]);
        Product::create([
            'name' => 'Phần mềm quản lý trang trại thông minh FarmPro',
            'idTG' => 2,
            'img' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 2,
            'moTa' => 'Giải pháp quản lý toàn diện cho trang trại, từ theo dõi cây trồng, vật nuôi đến quản lý tài chính.',
            'price'=>1000

        ]);
        Product::create([
            'name' => 'Sách: Luật Đất đai và các văn bản hướng dẫn thi hành',
            'idTG' => 3,
            'img' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 3,
            'moTa' => 'Tuyển tập các văn bản pháp luật quan trọng về đất đai.',
            'price'=>1000

        ]);
        Product::create([
            'name' => 'Mô hình kinh tế tuần hoàn trong nông nghiệp',
            'idTG' => 1,
            'img' => 'https://images.unsplash.com/photo-1586771107445-d3ca888129ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 4,
            'moTa' => 'Nghiên cứu về ứng dụng mô hình kinh tế tuần hoàn để phát triển nông nghiệp bền vững.',
            'price'=>1000

        ]);
        Product::create([
            'name' => 'Thiết bị đo chất lượng nước cầm tay WT-3000',
            'idTG' => 2,
            'img' => 'https://images.unsplash.com/photo-1561571994-3c61c554181a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 10,
            'moTa' => 'Thiết bị nhỏ gọn, dễ sử dụng để kiểm tra các chỉ số quan trọng của nước.',
            'price'=>1000

        ]);
        Product::create([
            'name' => 'Máy sấy nông sản đa năng SUNSAY',
            'idTG' => 3,
            'img' => 'https://images.unsplash.com/photo-1594122230683-02c6e95a9b0a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 6,
            'moTa' => 'Máy sấy khô các loại nông sản với công nghệ tiên tiến, tiết kiệm năng lượng.',
            'price'=>1000

        ]);
        Product::create([
            'name' => 'Hệ thống giám sát môi trường trang trại iFarm',
            'idTG' => 4,
            'img' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 2,
            'moTa' => 'Hệ thống cảm biến và phần mềm giám sát nhiệt độ, độ ẩm, ánh sáng, dinh dưỡng cho cây trồng.',
            'price'=>1000

        ]);
        Product::create([
            'name' => 'Nghiên cứu về chính sách hỗ trợ tái cơ cấu ngành nông nghiệp',
            'idTG' => 4,
            'img' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 4,
            'moTa' => 'Phân tích và đề xuất các chính sách nhằm thúc đẩy quá trình tái cơ cấu ngành nông nghiệp Việt Nam.',
            'price'=>1000

        ]);
        Product::create([
            'name' => 'Bản đồ sử dụng đất nông nghiệp ứng dụng công nghệ viễn thám',
            'idTG' => 1,
            'img' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 5,
            'moTa' => 'Bản đồ chi tiết về tình hình sử dụng đất nông nghiệp, hỗ trợ quy hoạch và quản lý.',
            'price'=>1000

        ]);
        Product::create([
            'name' => 'Quy trình bảo quản rau quả sau thu hoạch bằng công nghệ MAP',
            'idTG' => 3,
            'img' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 6,
            'moTa' => 'Nghiên cứu về quy trình và ứng dụng công nghệ MAP (Modified Atmosphere Packaging) để kéo dài thời gian bảo quản rau quả.',
            'price'=>1000

        ]);
        Product::create([
            'name' => 'Giống lúa ST25',
            'idTG' => 1,
            'img' => 'https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 8,
            'moTa' => 'Giống lúa thơm đặc sản, chất lượng gạo ngon, được ưa chuộng trên thị trường.',
            'price'=>1000

        ]);
        Product::create([
            'name' => 'Máy cấy lúa Kubota NSP-68NSF',
            'idTG' => 4,
            'img' => 'https://images.unsplash.com/photo-1581092921461-39b2f2f8a6b6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 10,
            'moTa' => 'Máy cấy lúa hàng ngang, năng suất cao, tiết kiệm chi phí nhân công.',
            'price'=>1000

        ]);
        Product::create([
            'name' => 'Phân bón hữu cơ vi sinh BioGro',
            'idTG' => 2,
            'img' => 'https://images.unsplash.com/photo-1586771107445-d3ca888129ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 9,
            'moTa' => 'Phân bón hữu cơ giúp cải tạo đất, tăng độ phì nhiêu và an toàn cho cây trồng.'
            ,            'price'=>1000

        ]);
        Product::create([
            'name' => 'Thuốc trừ sâu sinh học Neem Oil',
            'idTG' => 3,
            'img' => 'https://images.unsplash.com/photo-1516054575922-f0b8eeadec1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 9,
            'moTa' => 'Thuốc trừ sâu có nguồn gốc tự nhiên, an toàn cho người và môi trường.'
        ]);
        Product::create([
            'name' => 'Hệ thống tưới nhỏ giọt Israel Rivulis',
            'idTG' => 1,
            'img' => 'https://images.unsplash.com/photo-1567899378494-47b22a2ae96a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80',
            'idDM' => 10,
            'moTa' => 'Hệ thống tưới tiết kiệm nước, cung cấp nước chính xác cho từng gốc cây.'
        ]);

        // Seed Awards
        Award::create(['name' => 'Giải thưởng Sao Khuê', 'description' => 'Giải thưởng uy tín trong lĩnh vực công nghệ thông tin tại Việt Nam.','product_id'=>'1']);
        Award::create(['name' => 'Bằng khen của Bộ Nông nghiệp và PTNT', 'description' => 'Vinh danh các đóng góp xuất sắc trong ngành nông nghiệp.','product_id'=>'2']);
        Award::create(['name' => 'Giải thưởng Sinh viên Nghiên cứu Khoa học', 'description' => 'Khuyến khích và vinh danh sinh viên có thành tích nghiên cứu khoa học.','product_id'=>'3']);
        Award::create(['name' => 'Giải thưởng VIFOTEC', 'description' => 'Giải thưởng khoa học và công nghệ uy tín của Việt Nam.','product_id'=>'4']);
        Award::create(['name' => 'Gương mặt trẻ Khoa học Công nghệ', 'description' => 'Vinh danh các nhà khoa học trẻ có đóng góp nổi bật.','product_id'=>'5']);

        // Seed Posts with more reliable image URLs
        Post::create(['title' => 'Ứng dụng công nghệ AI trong giám sát sâu bệnh', 'content' => 'Bài viết về các giải pháp ứng dụng trí tuệ nhân tạo để phát hiện và phòng trừ sâu bệnh hại cây trồng một cách hiệu quả.', 'user_id' => 1, 'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subDays(5)]);
        Post::create(['title' => 'Giải pháp tưới tiêu thông minh cho vùng đất khô hạn', 'content' => 'Nghiên cứu về các hệ thống tưới tiêu tự động, tiết kiệm nước cho các khu vực có điều kiện khí hậu khắc nghiệt.', 'user_id' => 2, 'image' => 'https://images.unsplash.com/photo-1567899378494-47b22a2ae96a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subDays(10)]);
        Post::create(['title' => 'Phát triển giống cây trồng biến đổi gen chịu mặn', 'content' => 'Bài viết về quá trình nghiên cứu và tạo ra các giống cây trồng có khả năng sinh trưởng tốt trong môi trường đất nhiễm mặn.', 'user_id' => 1, 'image' => 'https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subWeeks(2)]);
        Post::create(['title' => 'Chính sách hỗ trợ nông nghiệp hữu cơ giai đoạn 2025-2030', 'content' => 'Phân tích các chính sách mới của nhà nước nhằm thúc đẩy phát triển nông nghiệp hữu cơ bền vững.', 'user_id' => 3, 'image' => 'https://images.unsplash.com/photo-1586771107445-d3ca888129ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subMonths(1)]);
        Post::create(['title' => 'Ứng dụng GIS trong quản lý tài nguyên đất nông nghiệp', 'content' => 'Bài viết về việc sử dụng hệ thống thông tin địa lý để theo dõi, đánh giá và quản lý hiệu quả tài nguyên đất đai trong nông nghiệp.', 'user_id' => 2, 'image' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subMonths(2)]);
        Post::create(['title' => 'Tác động của biến đổi khí hậu đến sản xuất nông nghiệp', 'content' => 'Nghiên cứu về những ảnh hưởng tiêu cực của biến đổi khí hậu như hạn hán, lũ lụt đến năng suất và chất lượng cây trồng, vật nuôi.', 'user_id' => 1, 'image' => 'https://images.unsplash.com/photo-1615874694520-8229a12a604b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subMonths(3)]);
        Post::create(['title' => 'Các mô hình hợp tác xã nông nghiệp kiểu mới', 'content' => 'Giới thiệu các mô hình hợp tác xã tiên tiến, mang lại lợi ích thiết thực cho người nông dân.', 'user_id' => 3, 'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subMonths(4)]);
        Post::create(['title' => 'Xu hướng phát triển nông nghiệp đô thị', 'content' => 'Bài viết về sự phát triển của các hình thức trồng trọt và chăn nuôi ngay trong khu vực đô thị.', 'user_id' => 2, 'image' => 'https://images.unsplash.com/photo-1516054575922-f0b8eeadec1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subMonths(5)]);
        Post::create(['title' => 'Ứng dụng drone trong nông nghiệp chính xác', 'content' => 'Bài viết về các ứng dụng của máy bay không người lái (drone) trong việc giám sát, phun thuốc, bón phân và thu thập dữ liệu trong nông nghiệp.', 'user_id' => 2, 'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subDays(2)]);
        Post::create(['title' => 'Mô hình nông nghiệp kết hợp du lịch sinh thái', 'content' => 'Giới thiệu các mô hình trang trại kết hợp phát triển du lịch sinh thái, mang lại nguồn thu nhập đa dạng cho người nông dân.', 'user_id' => 3, 'image' => 'https://images.unsplash.com/photo-1586771107445-d3ca888129ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subDays(7)]);
        Post::create(['title' => 'Các giải pháp công nghệ nâng cao chất lượng nông sản xuất khẩu', 'content' => 'Bài viết về các công nghệ và quy trình tiên tiến giúp nâng cao chất lượng và giá trị nông sản Việt Nam trên thị trường quốc tế.', 'user_id' => 1, 'image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subWeeks(3)]);
        Post::create(['title' => 'Phát triển chuỗi giá trị nông sản bền vững', 'content' => 'Nghiên cứu về các yếu tố và giải pháp để xây dựng chuỗi giá trị nông sản hiệu quả và bền vững từ sản xuất đến tiêu thụ.', 'user_id' => 4, 'image' => 'https://images.unsplash.com/photo-1581092921461-39b2f2f8a6b6?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subMonths(2)]);
        Post::create(['title' => 'Ứng dụng IoT trong quản lý chăn nuôi thông minh', 'content' => 'Bài viết về việc sử dụng các thiết bị IoT (Internet of Things) để theo dõi sức khỏe, dinh dưỡng và môi trường sống của vật nuôi.', 'user_id' => 2, 'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80', 'created_at' => Carbon::now()->subMonths(4)]);

        // Seed Texts
        Text::create(['key' => 'homepage_title', 'value' => 'Trang chủ - Nông nghiệp và Công nghệ VNUA', 'locale' => 'vi']);
        Text::create(['key' => 'about_us', 'value' => 'Giới thiệu về các hoạt động nghiên cứu, đào tạo và chuyển giao công nghệ trong lĩnh vực nông nghiệp và công nghệ tại VNUA.', 'locale' => 'vi']);
        Text::create(['key' => 'van_ban_khcn', 'value' => 'Văn bản Khoa học và Công nghệ', 'locale' => 'vi']);
        Text::create(['key' => 'nhiem_vu_khcn_cap_bo', 'value' => 'Danh sách các nhiệm vụ khoa học và công nghệ cấp Bộ đang triển khai.', 'locale' => 'vi']);
        Text::create(['key' => 'nhiem_vu_khcn_cap_quoc_gia', 'value' => 'Tổng hợp các nhiệm vụ khoa học và công nghệ cấp quốc gia có sự tham gia của VNUA.', 'locale' => 'vi']);
        Text::create(['key' => 'huong_dan_du_toan_kinh_phi', 'value' => 'Tài liệu hướng dẫn về cách lập dự toán kinh phí cho các đề tài, dự án khoa học và công nghệ.', 'locale' => 'vi']);
        Text::create(['key' => 'featured_products', 'value' => 'Sản phẩm nổi bật', 'locale' => 'vi']);
        Text::create(['key' => 'latest_news', 'value' => 'Tin tức mới nhất', 'locale' => 'vi']);
        Text::create(['key' => 'contact_us', 'value' => 'Liên hệ với chúng tôi', 'locale' => 'vi']);

        // Seed Workshops with more reliable image URLs
        Workshop::create(['title' => 'Hội thảo: Ứng dụng Blockchain trong truy xuất nguồn gốc nông sản', 'description' => 'Thảo luận về tiềm năng và các ứng dụng thực tế của công nghệ Blockchain trong việc đảm bảo nguồn gốc và chất lượng nông sản.', 'start_time' => Carbon::now()->addDays(7)->setTime(9, 0, 0), 'end_time' => Carbon::now()->addDays(7)->setTime(12, 0, 0), 'location' => 'Hội trường A, Học viện Nông nghiệp Việt Nam', 'capacity' => 150, 'img' => 'https://images.unsplash.com/photo-1639762681057-408e52192e55?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80']);
        Workshop::create(['title' => 'Tập huấn: Kỹ thuật canh tác hữu cơ theo tiêu chuẩn VietGAP', 'description' => 'Buổi tập huấn cung cấp kiến thức và kỹ năng thực hành về các quy trình canh tác hữu cơ, đạt chứng nhận VietGAP.', 'start_time' => Carbon::now()->addDays(15)->setTime(14, 0, 0), 'end_time' => Carbon::now()->addDays(15)->setTime(17, 0, 0), 'location' => 'Trung tâm Nghiên cứu và Phát triển Nông nghiệp Bền vững', 'capacity' => 80, 'img' => 'https://images.unsplash.com/photo-1516054575922-f0b8eeadec1a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80']);
        Workshop::create(['title' => 'Seminar: Khởi nghiệp trong lĩnh vực công nghệ nông nghiệp (AgTech)', 'description' => 'Chia sẻ kinh nghiệm và cơ hội khởi nghiệp trong lĩnh vực công nghệ ứng dụng vào nông nghiệp.', 'start_time' => Carbon::now()->addDays(25)->setTime(10, 0, 0), 'end_time' => Carbon::now()->addDays(25)->setTime(11, 30, 0), 'location' => 'Phòng hội thảo tầng 3, Nhà Hành chính', 'capacity' => 120, 'img' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80']);
        Workshop::create(['title' => 'Hội thảo chuyên đề: Giải pháp canh tác thích ứng với biến đổi khí hậu', 'description' => 'Cập nhật các kỹ thuật canh tác mới nhất giúp giảm thiểu tác động của biến đổi khí hậu lên sản xuất nông nghiệp.', 'start_time' => Carbon::now()->addDays(12)->setTime(9, 30, 0), 'end_time' => Carbon::now()->addDays(12)->setTime(11, 30, 0), 'location' => 'Hội trường B, Khoa Nông học', 'capacity' => 100, 'img' => 'https://images.unsplash.com/photo-1615874694520-8229a12a604b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80']);
        Workshop::create(['title' => 'Tọa đàm: Phát triển nông nghiệp tuần hoàn tại Việt Nam', 'description' => 'Trao đổi về các mô hình kinh tế tuần hoàn đã và đang được triển khai trong lĩnh vực nông nghiệp ở Việt Nam.', 'start_time' => Carbon::now()->addDays(20)->setTime(15, 0, 0), 'end_time' => Carbon::now()->addDays(20)->setTime(16, 30, 0), 'location' => 'Phòng 205, Nhà Thư viện', 'capacity' => 60, 'img' => 'https://images.unsplash.com/photo-1586771107445-d3ca888129ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80']);
        Workshop::create(['title' => 'Khóa học: Ứng dụng GIS và viễn thám trong quản lý tài nguyên nông nghiệp', 'description' => 'Đào tạo về các công cụ và kỹ năng sử dụng GIS và ảnh viễn thám để quản lý đất đai, cây trồng và các tài nguyên khác trong nông nghiệp.', 'start_time' => Carbon::now()->addDays(30)->setTime(8, 0, 0), 'end_time' => Carbon::now()->addDays(32)->setTime(17, 0, 0), 'location' => 'Trung tâm Tin học, Học viện Nông nghiệp Việt Nam', 'capacity' => 40, 'img' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80']);

        // Seed Feedback
        Feedback::create(['name' => 'Lê Văn Minh', 'message' => 'Website rất hữu ích, cung cấp nhiều thông tin giá trị về nông nghiệp và công nghệ.']);
        Feedback::create(['name' => 'Hoàng Thu Trang', 'message' => 'Tôi rất quan tâm đến các hội thảo được tổ chức, mong sẽ có nhiều hơn nữa.']);
        Feedback::create(['name' => 'Phạm Đức Anh', 'message' => 'Giao diện website thân thiện, dễ sử dụng. Cảm ơn ban quản trị.']);
        Feedback::create(['name' => 'Lê Thị Hồng', 'message' => 'Tôi rất thích các bài viết về công nghệ mới trong nông nghiệp.']);
        Feedback::create(['name' => 'Trần Văn Nam', 'message' => 'Mong muốn có thêm nhiều hội thảo về kỹ thuật canh tác tiên tiến.']);
        Feedback::create(['name' => 'Nguyễn Hoàng Anh', 'message' => 'Website cung cấp thông tin rất đầy đủ và hữu ích cho sinh viên và người làm nông nghiệp.']);
        // 1. Seed Product Images (Thư viện ảnh sản phẩm)
        $this->command->info('Seeding Product Images with variety...');
        $products = Product::all();

        // Tạo một "bể" ảnh lớn hơn với các chủ đề xanh lá, be, vàng, tự nhiên
        $imagePool = [
            'https://images.pexels.com/photos/4226881/pexels-photo-4226881.jpeg',
            'https://images.pexels.com/photos/4207892/pexels-photo-4207892.jpeg',
            'https://images.pexels.com/photos/4033148/pexels-photo-4033148.jpeg',
            'https://images.pexels.com/photos/6625032/pexels-photo-6625032.jpeg',
            'https://images.pexels.com/photos/133459/pexels-photo-133459.jpeg',
            'https://images.pexels.com/photos/159844/cellular-phone-mobile-phone-notebook-macbook-159844.jpeg',
            'https://images.pexels.com/photos/930004/pexels-photo-930004.jpeg',
            'https://images.pexels.com/photos/4210866/pexels-photo-4210866.jpeg',
            'https://images.pexels.com/photos/450597/pexels-photo-450597.jpeg',
            'https://images.pexels.com/photos/276583/pexels-photo-276583.jpeg',
            'https://images.pexels.com/photos/2089698/pexels-photo-2089698.jpeg',
            'https://images.pexels.com/photos/3932930/pexels-photo-3932930.jpeg',
            'https://images.pexels.com/photos/5717413/pexels-photo-5717413.jpeg',
            'https://images.pexels.com/photos/4112028/pexels-photo-4112028.jpeg',
            'https://images.pexels.com/photos/4393433/pexels-photo-4393433.jpeg'
        ];

        foreach ($products as $product) {
            // Lấy ngẫu nhiên từ 2 đến 4 ảnh cho mỗi sản phẩm
            $numberOfImages = rand(2, 4);
            $randomImageKeys = array_rand($imagePool, $numberOfImages);

            // Đảm bảo $randomImageKeys luôn là một mảng
            if (!is_array($randomImageKeys)) {
                $randomImageKeys = [$randomImageKeys];
            }

            foreach ($randomImageKeys as $key) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePool[$key]
                ]);
            }
        }


        // 2. Seed Reviews (Đánh giá sản phẩm) - Giữ nguyên
        $this->command->info('Seeding Reviews...');
        $users = User::all();
        $comments = [
            'Sản phẩm tuyệt vời, chất lượng rất tốt, tôi rất hài lòng!',
            'Giao hàng nhanh, đóng gói cẩn thận. Sản phẩm đúng như mô tả.',
            'Chất lượng sản phẩm ổn trong tầm giá. Sẽ tiếp tục ủng hộ.',
            'Rất đáng tiền, sản phẩm này đã giúp ích cho tôi rất nhiều.',
            'Mới dùng thử nhưng cảm thấy khá tốt. Hy vọng sẽ bền.'
        ];

        foreach ($products as $product) {
            $reviewCount = rand(2, 5);
            for ($i = 0; $i < $reviewCount; $i++) {
                Review::create([
                    'product_id' => $product->id,
                    'user_id' => $users->random()->id,
                    'rating' => rand(4, 5),
                    'comment' => $comments[array_rand($comments)]
                ]);
            }
        }


        // 3. Seed Wishlists (Sản phẩm yêu thích) - Giữ nguyên
        $this->command->info('Seeding Wishlists...');
        $wishlisted = [];

        for ($i = 0; $i < 10; $i++) {
            $userId = $users->random()->id;
            $productId = $products->random()->id;
            $key = $userId . '-' . $productId;

            if (!in_array($key, $wishlisted)) {
                Wishlist::create([
                    'user_id' => $userId,
                    'product_id' => $productId,
                ]);
                $wishlisted[] = $key;
            }
        }
     }
}
