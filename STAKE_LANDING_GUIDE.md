# Stake Landing Page

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
