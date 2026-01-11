<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimonShopProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [];

        $row1 = [
            'product_name' => 'Laptop Asus Vivobook Gaming K3605VC-RP431W i5-13420H/16GB/512GB/16" WUXGA/RTX 3050 4GB/W11',
            'category_id' => 3,
            'supplier_id' => 1,
            'product_price' => '19490000',
            'product_quantity' => '100',
            'product_image' => 'http://timon_shop.local/storage/product/asus_gaming_vivobook_k3605_black_1_6dec3a2e8f.webp',
            'product_code' => '00918026',
            'product_decription' => 'Asus Vivobook Gaming K3605VC-RP431W với sự kết hợp của CPU Intel Core i5 13420H cùng card đồ họa rời NVIDIA GeForce RTX 3050 sẽ giúp bạn hoàn thành mọi công việc phức tạp cũng như giải trí hàng ngày. Đặc biệt, chiếc laptop này vô cùng mỏng nhẹ và thời trang, đảm bảo tính di động trong cuộc sống hiện đại.',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row1);

        $row2 = [
            'product_name' => 'Laptop Asus TUF Gaming FA506NCG-HN184W R7-7445HS/16GB/512GB/15.6"/Nvidia GeForce RTX3050 4GB/Win11',
            'category_id' => 3,
            'supplier_id' => 1,
            'product_price' => '21290000',
            'product_quantity' => '100',
            'product_image' => 'http://timon_shop.local/storage/product/asus_tuf_gaming_fa506ncg_01_a7b188268b.webp',
            'product_code' => '00921546',
            'product_decription' => 'Sở hữu độ bền chuẩn quân sự và mang lại hiệu năng tốt trong tầm giá, Asus TUF Gaming FA506NCG-HN184W là lựa chọn đáng tin cậy cho những ai yêu thích eSport và thiết kế đồ họa bán chuyên. Máy được trang bị chip xử lý AMD Ryzen 7 7445HS, card đồ họa NVIDIA GeForce RTX 3050 4GB GDDR6 cùng màn hình 15.6 inch Full HD tần số quét 144Hz',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row2);

        $row3 = [
            'product_name' => 'Samsung Galaxy Z Fold7 5G 12GB 256GB',
            'category_id' => 1,
            'supplier_id' => 3,
            'product_price' => '40990000',
            'product_quantity' => '100',
            'product_image' => 'http://timon_shop.local/storage/product/poco_m7_pro_titannium_1_4fbb9d8719.webp',
            'product_code' => '00919910',
            'product_decription' => 'Samsung Galaxy Z Fold 7 mở ra một kỷ nguyên mới cho điện thoại gập khi kết hợp hoàn hảo giữa kiểu dáng mỏng nhẹ, phần cứng mạnh mẽ và trí tuệ nhân tạo thông minh. Với diện mạo đẳng cấp cùng màn hình gập 8 inch siêu lớn, đây là thiết bị dành cho người dùng yêu cầu sự khác biệt và đột phá về trải nghiệm.',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row3);

        $row4 = [
            'product_name' => 'Samsung Galaxy Z Flip7 5G 12GB 256GB',
            'category_id' => 1,
            'supplier_id' => 3,
            'product_price' => '24990000',
            'product_quantity' => '100',
            'product_image' => 'http://timon_shop.local/storage/product/samsung_galaxy_z_fold7_xam_1_de1fb8f431.webp',
            'product_code' => '00919890',
            'product_decription' => 'Galaxy Z Flip 7 là thế hệ điện thoại gập mới sở hữu màn hình ngoài lớn 4.1 inch, thiết kế thời thượng cùng bộ sưu tập màu sắc trẻ trung. Viên pin 4300mAh kết hợp chip Exynos 2500 cho hiệu năng mạnh mẽ, xử lý mượt mà các tác vụ AI. Đây chính là trợ lý thông minh nhỏ gọn, phù hợp với người dùng yêu công nghệ và thời trang.',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row4);

        $row5 = [
            'product_name' => 'Xiaomi Poco M7 Pro 5G 8GB 256GB',
            'category_id' => 1,
            'supplier_id' => 4,
            'product_price' => '5490000',
            'product_quantity' => '100',
            'product_image' => 'http://timon_shop.local/storage/product/poco_m7_pro_titannium_1_4fbb9d8719.webp',
            'product_code' => '00917821',
            'product_decription' => 'Asus Vivobook Gaming K3605VC-RP431W với sự kết hợp của CPU Intel Core i5 13420H cùng card đồ họa rời NVIDIA GeForce RTX 3050 sẽ giúp bạn hoàn thành mọi công việc phức tạp cũng như giải trí hàng ngày. Đặc biệt, chiếc laptop này vô cùng mỏng nhẹ và thời trang, đảm bảo tính di động trong cuộc sống hiện đại.',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row5);

        $row6 = [
            'product_name' => 'Xiaomi Poco X7 5G 12GB 512GB',
            'category_id' => 1,
            'supplier_id' => 4,
            'product_price' => '7490000',
            'product_quantity' => '100',
            'product_image' => 'http://timon_shop.local/storage/product/xiaomi_poco_x7_den_vang_5_9d618c2219.webp',
            'product_code' => '00918994',
            'product_decription' => 'Với những gì được trang bị, POCO X7 5G dễ dàng trở thành lựa chọn nổi bật trong tầm giá dưới 10 triệu đồng. Từ thiết kế sang trọng, màn hình xuất sắc, hiệu năng mạnh mẽ đến pin trâu, máy hội tụ đầy đủ các yếu tố mà người dùng mong đợi. Đây là sản phẩm lý tưởng cho cả người dùng phổ thông, sinh viên đến dân công nghệ.',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row6);

        $row7 = [
            'product_name' => 'Honor X7d 8GB 256GB',
            'category_id' => 1,
            'supplier_id' => 2,
            'product_price' => '5290000',
            'product_quantity' => '100',
            'product_image' => 'http://timon_shop.local/storage/product/honor_x7d_xanh_5_9b4befb387.webp',
            'product_code' => '00922801',
            'product_decription' => 'HONOR X7d là mẫu smartphone có độ bền tốt, thời lượng pin dài lâu cùng khả năng nhiếp ảnh ấn tượng. Sản phẩm sở hữu viên pin kép với tổng dung lượng 6.500mAh, camera AI 108MP, màn hình 6.77 inch tần số quét 120Hz và khả năng chống nước đạt chuẩn IP65. Với thiết kế hiện đại cùng bộ nhớ 256GB, HONOR X7d hướng đến người dùng thường xuyên di chuyển và cần một chiếc điện thoại bền bỉ.',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row7);

        $row8 = [
            'product_name' => 'Honor X9d 5G 12GB 512GB',
            'category_id' => 1,
            'supplier_id' => 2,
            'product_price' => '10890000',
            'product_quantity' => '100',
            'product_image' => 'http://timon_shop.local/storage/product/honor_x9d_kem_docquyen_46a1fee739.webp',
            'product_code' => '00923679',
            'product_decription' => 'Ngoài việc ghi điểm bởi thiết kế bền bỉ, HONOR X9d 12GB RAM còn đa nhiệm mượt mà và có năng lực hiển thị nổi bật. Màn hình OLED 6.79 inch độ sáng đỉnh 6.000 nits kết hợp chip Snapdragon 6 Gen 4, camera 108MP và viên pin 8.300mAh tạo nên trải nghiệm vượt trội so với các sản phẩm cùng phân khúc. Phiên bản bạn đang theo dõi được trang bị 12GB RAM, thể hiện năng lực đa nhiệm vượt trội so với bản 8GB RAM tiêu chuẩn.',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        array_push($list, $row8);


        DB::table('timon_shop_products')->insert($list);
    }
}
