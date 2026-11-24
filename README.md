# Skybet / Stake — Next.js

Website Next.js App Router thuần, deploy trực tiếp lên Vercel. Không cần PHP, WordPress, MySQL hoặc Laragon.

## Chạy local

Yêu cầu Node.js 20.9+.

```powershell
npm install
npm run dev
```

Mở `http://localhost:3000`.

## Build production

```powershell
npm run build
npm start
```

## Deploy Vercel

Đẩy toàn bộ thay đổi lên Git, bao gồm việc xóa mã nguồn cũ. Import repo hoặc redeploy project hiện có với:

- **Framework Preset:** Next.js
- **Root Directory:** thư mục gốc repo (`.`)
- **Build Command:** `npm run build`
- **Output Directory:** `.next` (mặc định của Next.js); bỏ override `dist` hoặc `.` cũ
- **Install Command:** `npm ci`

`vercel.json` đã khai báo Next.js và các lệnh build/install. Không cần biến môi trường database. Sau khi deployment mới thành công, gắn `skybet.work` và `www.skybet.work` vào đúng project. Kiểm tra URL `.vercel.app` trước khi chuyển tên miền nếu tạo project mới.

## Chỉnh sửa

- `data/site.json`: logo, tên miền canonical, nút Login/Registration.
- `components/Header.jsx` và `components/Footer.jsx`: header/footer dùng chung.
- `content/home.html`: nội dung landing page.
- `content/footer.html`: nội dung footer hiện tại.
- `data/articles.json`: danh sách bài, tiêu đề, ảnh, ngày đăng.
- `content/articles/prop-firm-review.html`: nội dung review tiếng Anh.
- `public/images/`: ảnh và icon.
- `app/styles/`: CSS landing/blog và thang chữ dùng chung.

Các route hiện có: `/`, `/blog`, `/prop-firm-review.html`, `/robots.txt`, `/sitemap.xml`.

Blog giữ grid 3/2/1 cột. Header/footer, ảnh đại diện và ngày đăng 24/11/2019 được giữ lại. FAQ, slider, mục lục và nút sao chép chạy bằng React. Bộ chọn ngôn ngữ dùng Google Translate phía trình duyệt khi người dùng chọn ngôn ngữ khác; font và Font Awesome được tải từ CDN.
