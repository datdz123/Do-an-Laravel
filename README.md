# Xây dựng website bán hàng thời trang bằng Laravel

## Giới thiệu dự án

Đây là một dự án xây dựng website bán hàng thời trang sử dụng Laravel, một framework PHP mạnh mẽ.

### Thông tin dự án

- **Tên đề tài:** Xây dựng website bán hàng thời trang bằng Laravel
- **Ngôn ngữ:** PHP ^8.0.2
- **Framework:** Laravel 9.x
- **Tên nhà phát triển:** Lê Đăng Quang
- **IDE (Khuyến khích):** VS Code
- **Kiểu dự án:** Ứng dụng web
- **Cơ sở dữ liệu:** MySQL

## Hướng dẫn cài đặt

### Các bước cài đặt:

1. Giải nén file và chuyển vào thư mục `xampp/htdocs`.
2. Cài đặt [Composer](https://getcomposer.org/download/).
3. Mở Command Prompt trong thư mục dự án và chạy lệnh `composer install`.
4. Tiếp theo, chạy lệnh `php artisan key:generate`.
5. Tạo mới một database trong phpMyAdmin hoặc MySQL trên XAMPP, sau đó import file database (`dq_shop.sql`) trong dự án vào database vừa tạo.
6. Cấu hình database trong file `.env`, bao gồm:
   - `DB_DATABASE` là tên database vừa tạo.
   - `DB_USERNAME` là tên người dùng (mặc định là root).
   - `DB_PASSWORD` là mật khẩu (mặc định là rỗng).
7. Chạy lệnh `php artisan serve` để khởi chạy dự án trên một server. Sau đó, sao chép đường dẫn được cung cấp và dán vào trình duyệt.

## Các lưu ý

- Đảm bảo rằng bạn đã cài đặt XAMPP hoặc một máy chủ web tương tự để chạy dự án.
- Luôn kiểm tra và cập nhật các thông số cấu hình như tên database, người dùng và mật khẩu trong file `.env`.
- Nếu gặp bất kỳ vấn đề gì trong quá trình cài đặt, hãy kiểm tra lại các bước và đảm bảo rằng môi trường đáp ứng yêu cầu cài đặt của dự án.


fix lỗi không di chuyển được ảnh trong file manager

cho đoạn code này vào hàm translateFromUtf8($input) 

mb_detect_encoding($input)

        if ($this->isRunningOnWindows() && is_string($input)) {
            $input = iconv('UTF-8', 'UTF-8', $input);
        }

        return $input;
