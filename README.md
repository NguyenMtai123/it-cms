# 🎓 University CMS

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-11-red)
![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![MySQL](https://img.shields.io/badge/MySQL-10.4-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple)
![Architecture](https://img.shields.io/badge/Architecture-Modular%20Monolith-success)

**Hệ thống quản trị nội dung (CMS) dành cho cổng thông tin điện tử trường đại học**

</div>

---

# 📖 Giới thiệu

University CMS là hệ thống quản trị nội dung được phát triển bằng **Laravel Framework** và **MySQL**, cho phép quản lý toàn bộ nội dung website trường đại học thông qua giao diện quản trị trực quan.

Hệ thống hỗ trợ quản lý bài viết, trang nội dung, menu điều hướng, banner, người dùng, cấu hình website và nhiều thành phần khác nhằm đáp ứng nhu cầu vận hành cổng thông tin điện tử hiện đại.

Dự án được xây dựng trong khuôn khổ **Đồ án Tốt nghiệp ngành Công nghệ Thông tin**.

---

# ✨ Chức năng nổi bật

## 📄 Quản lý nội dung

* Quản lý trang nội dung (Pages)
* Quản lý bài viết (Posts)
* Quản lý danh mục (Categories)
* Hiển thị tin tức theo danh mục
* Tìm kiếm bài viết

## 🖼️ Quản lý giao diện

* Quản lý Menu động
* Hỗ trợ Menu đa cấp
* Quản lý Banner / Slider
* Quản lý Logo Website
* Quản lý Favicon
* Quản lý Footer
* Quản lý liên kết nhanh

## 👥 Quản lý người dùng

* Đăng nhập
* Đăng xuất
* Đăng ký thành viên
* Quên mật khẩu
* Hồ sơ cá nhân
* Phân quyền người dùng

## ⚙️ Quản lý hệ thống

* Cấu hình website
* Upload hình ảnh
* Quản lý tập tin Media
* Quản lý thông tin liên hệ

---

# 🏗️ Kiến trúc hệ thống

Hệ thống được xây dựng theo kiến trúc:

## Modular Monolith Architecture

Ứng dụng được triển khai dưới dạng một hệ thống thống nhất (Monolith) nhưng được chia thành nhiều module độc lập theo từng chức năng nghiệp vụ.

### Các module chính

```text
platform/
└── Core/
    ├── ACL
    ├── Base
    ├── Blog
    ├── Page
    ├── Menu
    ├── Media
    ├── Slider
    └── Setting
```

Mỗi module được tổ chức theo mô hình MVC:

```text
Blog/
├── Models/
├── Http/
│   ├── Controllers/
│   └── Requests/
├── Resources/
│   └── Views/
├── Routes/
└── Providers/
```

### Ưu điểm

* Dễ mở rộng
* Dễ bảo trì
* Tách biệt nghiệp vụ rõ ràng
* Giảm sự phụ thuộc giữa các thành phần
* Phù hợp với hệ thống CMS quy mô vừa và lớn

---

# 🧱 Công nghệ sử dụng

## Backend

* PHP 8.x
* Laravel Framework
* Eloquent ORM

## Frontend

* HTML5
* CSS3
* Bootstrap 5
* JavaScript
* jQuery
* Font Awesome

## Database

* MySQL

## Công cụ phát triển

* Composer
* Git
* GitHub
* XAMPP

---

# 📂 Cấu trúc dự án

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/

platform/
└── Core/
    ├── ACL/
    ├── Base/
    ├── Blog/
    ├── Menu/
    ├── Media/
    ├── Page/
    ├── Setting/
    └── Slider/

storage/
vendor/
```

---

# 🗄️ Cơ sở dữ liệu

Các bảng dữ liệu chính:

```text
users
roles

posts
categories

pages

menus
menu_items

sliders

settings

media_files
```

---

# 🚀 Cài đặt dự án

## 1. Clone source code

```bash
git clone https://github.com/your-username/university-cms.git
```

```bash
cd university-cms
```

---

## 2. Cài đặt thư viện

```bash
composer install
```

---

## 3. Tạo file môi trường

```bash
cp .env.example .env
```

---

## 4. Sinh Application Key

```bash
php artisan key:generate
```

---

## 5. Cấu hình Database

Mở file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=university_cms
DB_USERNAME=root
DB_PASSWORD=
```

---

## 6. Chạy Migration

```bash
php artisan migrate
```

---

## 7. Tạo Storage Link

```bash
php artisan storage:link
```

---

## 8. Chạy ứng dụng

```bash
php artisan serve
```

Truy cập:

```text
http://127.0.0.1:8000
```

---

# 📸 Giao diện hệ thống

## Trang chủ

```md
![Home](docs/screenshots/home.png)
```

## Trang tin tức

```md
![Blog](docs/screenshots/blog.png)
```

## Trang quản trị

```md
![Admin](docs/screenshots/admin.png)
```

---

# 🔐 Tài khoản mặc định

## Administrator

```text
Email: admin@example.com
Password: 123456
```

## Member

```text
Email: member@example.com
Password: 123456
```

---

# 🎯 Kết quả đạt được

* Xây dựng thành công CMS bằng Laravel.
* Áp dụng kiến trúc Modular Monolith.
* Quản lý bài viết và trang nội dung.
* Quản lý menu động đa cấp.
* Quản lý banner và slider.
* Quản lý cấu hình website.
* Hệ thống phân quyền người dùng.
* Upload và quản lý hình ảnh.
* Giao diện responsive trên nhiều thiết bị.

---

# ⚠️ Hạn chế

* Chưa hỗ trợ đa ngôn ngữ.
* Chưa triển khai REST API.
* Chưa tối ưu cache cho hệ thống lớn.
* Chưa tích hợp thông báo thời gian thực.

---

# 🔮 Hướng phát triển

* Hỗ trợ đa ngôn ngữ.
* Xây dựng RESTful API.
* Tối ưu hiệu năng và cache.
* Tích hợp thông báo thời gian thực.
* Xây dựng Mobile App kết nối CMS.

---

# 👨‍🎓 Thông tin đồ án

**Tên đề tài:**

Xây dựng Hệ thống Quản trị Nội dung (CMS) cho Cổng Thông tin Điện tử Trường Đại học

**Sinh viên thực hiện:**

Nguyễn Văn ...

**Ngành:**

Công nghệ Thông tin

**Trường:**

Đại học Nha Trang

**Năm thực hiện:**

2026

---

# 📄 Giấy phép

Dự án được phát triển phục vụ mục đích học tập, nghiên cứu và báo cáo đồ án tốt nghiệp.

Mọi hình thức sử dụng thương mại cần có sự cho phép của tác giả.
