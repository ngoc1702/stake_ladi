# Stake Landing Page

## Trang Blog Review

Landing, blog và bài chi tiết dùng chung `template-parts/site-header.php` và `site-footer.php`. Header/footer của blog lấy dữ liệu ACF từ trang chủ đang chọn trong Settings → Reading, nên chỉnh logo, nút và nội dung footer trên landing sẽ áp dụng cho blog.

Font và thang chữ chung của landing/blog nằm trong `assets/css/typography.css`, được tải sau CSS trang: Montserrat, body 16px với line-height 1.8, H1 38px, H2 30px, H3/card 20px, sidebar 14px. Trên mobile H1/H2/H3 lần lượt 26/22/18px; body giữ 16px. Điều chỉnh các biến `--stake-*` trong file này để thay đổi đồng bộ.

Ảnh đại diện và ngày đăng 24/11/2019 của bài mẫu được áp dụng bằng `php scripts/update-review-media.php`. Script lấy ảnh `assets/images/prop-firm-review.png`, nhập vào Media Library và đặt Featured Image mà không thay nội dung bài. Hai banner mở đầu đã bỏ; trang chi tiết giữ tiêu đề/ngày đăng trong bài, sidebar desktop rộng 340px và khoảng cách nội dung 32px.

Trang `/blog` dùng template **Blog — Review Grid**, hiển thị bài trong chuyên mục **Reviews** theo grid 3 cột trên desktop, 2 trên tablet và 1 trên mobile. Hiện có một bài review tiếng Anh. Chỉnh bài tại **Posts → What Is a Prop Firm?**. Thêm bài vào chuyên mục **Reviews** để tự hiển thị trong grid và dùng giao diện chi tiết đồng bộ. Có thể chọn Featured Image cho từng bài; bài chưa có ảnh dùng ảnh minh họa mặc định.

Trên một database mới, chạy `php scripts/create-blog-review.php` sau khi cấu hình WordPress/MySQL để tạo trang blog và bài mẫu. Chạy với `--refresh` khi muốn thay nội dung bài mẫu bằng bản trong source. Trang chủ tự hiển thị liên kết Blog & Reviews khi trang blog đã xuất bản. CSS/JS nằm trong `assets/css/blog-review.css` và `assets/js/blog-review.js`; template chi tiết nằm ở `page-blog-review.php`.

## Chạy local bằng npm

1. Bật MySQL trong Laragon (database được cấu hình trong `wp-config.php`).
2. Chạy `npm install` tại thư mục gốc. Không cần cài thêm thư viện Node.
3. Chạy `npm run dev` rồi mở `http://127.0.0.1:8000`.

Lệnh tự tìm PHP trong PATH hoặc thư mục PHP của Laragon. Có thể đặt biến môi trường `PHP_BINARY` để chọn PHP và `PORT` để đổi cổng. Nhấn `Ctrl+C` để dừng server. Đây là server phát triển PHP; WordPress vẫn sử dụng MySQL và mã theme hiện có.

Landing page nằm trong theme `Stake`, được dựng theo giao diện xanh đậm của ảnh mẫu và quản trị nội dung bằng ACF Pro.

## Cách sử dụng

1. Kích hoạt theme `Stake` và plugin `Advanced Custom Fields PRO`.
2. Tạo hoặc sửa một Page trong WordPress.
3. Chọn template **Stake Landing Page**.
4. Nhập nội dung trong khối **Nội dung Landing Page Stake** và đăng trang.

Landing gồm 20 nhóm ACF:

- Hero, hai nút CTA và các kênh đăng ký.
- Danh sách trò chơi nổi bật.
- Bảng thông tin tổng quan.
- Thư viện ảnh giao diện.
- Danh sách ưu và nhược điểm.
- Danh sách tính năng.
- Đối tác và đại sứ thương hiệu.
- Pháp lý và bảo mật.
- Welcome Bonus.
- Hướng dẫn ứng dụng Android/iOS.
- Các môn cá cược thể thao.
- eSports.
- Virtual Sports.
- Các loại cược.
- Tùy chọn cá cược nâng cao.
- Danh sách slot và live casino.
- Phương thức nạp/rút tiền.
- Header với logo và nút tài khoản.
- FAQ dạng accordion.
- Footer nhiều cột, nút tải app và mạng xã hội.

Khi một nhóm chưa được nhập, trang dùng nội dung mẫu để bố cục luôn hiển thị đầy đủ. Có thể dùng shortcode `[landing_page]` nếu không muốn chọn page template.

## File chính

- `wp-content/themes/Stake/custom/acf-stake-landing.php`: khai báo field và helper.
- `wp-content/themes/Stake/template-parts/stake-landing.php`: HTML của các section.
- `wp-content/themes/Stake/assets/css/landing.css`: giao diện desktop, tablet và mobile.
- `wp-content/themes/Stake/assets/js/landing.js`: cuộn mượt cho anchor nội bộ.
- `wp-content/themes/Stake/page-landing.php`: page template.

Ảnh trò chơi nên dùng tỉ lệ khoảng `16:9`, ảnh hero khoảng `900x650`, ảnh gallery khoảng `16:10`. WebP được ưu tiên để trang tải nhanh.
