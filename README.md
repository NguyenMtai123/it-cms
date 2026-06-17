# University CMS - Hệ Thống Quản Trị Nội Dung Website Trường Đại Học

![Laravel](https://img.shields.io/badge/Laravel-11-red)
![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple)
![License](https://img.shields.io/badge/License-Educational-green)

## Giới thiệu

University CMS là hệ thống quản trị nội dung (Content Management System - CMS) được phát triển bằng Laravel Framework và MySQL nhằm hỗ trợ xây dựng và quản lý cổng thông tin điện tử cho trường đại học.

Hệ thống cho phép quản trị viên dễ dàng quản lý nội dung website, bài viết, trang thông tin, menu điều hướng, banner quảng bá, người dùng và các cấu hình hệ thống thông qua giao diện quản trị trực quan.

Dự án được thực hiện trong khuôn khổ đồ án tốt nghiệp ngành Công nghệ Thông tin.

---

## Chức năng chính

### Quản lý nội dung

* Quản lý trang tĩnh (Pages)
* Quản lý bài viết (Posts)
* Quản lý danh mục bài viết (Categories)
* Quản lý nội dung trang chủ
* Hiển thị bài viết theo danh mục

### Quản lý giao diện

* Quản lý Menu động
* Hỗ trợ menu đa cấp
* Quản lý Banner / Slider
* Quản lý logo website
* Quản lý favicon
* Cấu hình giao diện người dùng

### Quản lý người dùng

* Đăng nhập hệ thống
* Đăng ký thành viên
* Quên mật khẩu
* Hồ sơ cá nhân
* Phân quyền người dùng

### Quản lý hệ thống

* Quản lý cấu hình website
* Quản lý liên kết nhanh
* Quản lý thông tin footer
* Upload và quản lý hình ảnh
* Tìm kiếm nội dung

---

## Công nghệ sử dụng

### Backend

* PHP 8.x
* Laravel Framework
* Eloquent ORM

### Database

* MySQL

### Frontend

* HTML5
* CSS3
* Bootstrap 5
* JavaScript
* jQuery
* Font Awesome

### Công cụ phát triển

* Composer
* Git
* GitHub
* XAMPP

---

## Kiến trúc hệ thống

Hệ thống được xây dựng theo mô hình MVC (Model – View – Controller).

### Model

Chịu trách nhiệm xử lý dữ liệu và tương tác với cơ sở dữ liệu.

### View

Hiển thị giao diện người dùng và giao diện quản trị.

### Controller

Tiếp nhận yêu cầu từ người dùng, xử lý nghiệp vụ và trả về kết quả.

---

## Cơ sở dữ liệu

Các bảng dữ liệu chính:

* users
* roles
* pages
* posts
* categories
* menus
* menu_items
* sliders
* settings

---

## Giao diện hệ thống

### Trang chủ

* Banner Slider
* Tin tức nổi bật
* Danh mục bài viết
* Menu điều hướng
* Footer động

### Trang quản trị

* Dashboard
* Quản lý bài viết
* Quản lý trang
* Quản lý menu
* Quản lý banner
* Quản lý người dùng
* Cấu hình website

---

## Hướng dẫn cài đặt

### 1. Clone dự án

```bash
git clone https://github.com/your-username/university-cms.git
```

```bash
cd university-cms
```

### 2. Cài đặt thư viện

```bash
composer install
```

### 3. Tạo file môi trường

```bash
cp .env.example .env
```

### 4. Sinh khóa ứng dụng

```bash
php artisan key:generate
```

### 5. Cấu hình Database

Mở file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=university_cms
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Chạy Migration

```bash
php artisan migrate
```

### 7. Tạo symbolic link cho thư mục storage

```bash
php artisan storage:link
```

### 8. Khởi động hệ thống

```bash
php artisan serve
```

Truy cập:

```text
http://127.0.0.1:8000
```

---

## Tài khoản đăng nhập

### Quản trị viên

```text
Email: admin@example.com
Password: 123456
```

### Thành viên

```text
Email: member@example.com
Password: 123456
```

---

## Cấu trúc thư mục

```text
app/
├── Http/
│   ├── Controllers/
│   ├── Middleware/
│
├── Models/

resources/
├── views/
├── css/
├── js/

routes/
├── web.php

database/
├── migrations/

public/
├── storage/
```

---

## Kết quả đạt được

* Xây dựng hoàn chỉnh hệ thống CMS bằng Laravel.
* Xây dựng giao diện website trường đại học.
* Quản lý menu động đa cấp.
* Quản lý bài viết và trang nội dung.
* Upload và hiển thị hình ảnh.
* Hệ thống đăng nhập và phân quyền.
* Giao diện responsive trên nhiều thiết bị.
* Tối ưu khả năng mở rộng hệ thống.

---

## Hạn chế

* Chưa hỗ trợ đa ngôn ngữ.
* Chưa tích hợp REST API.
* Chưa triển khai hệ thống cache nâng cao.
* Chưa hỗ trợ thông báo thời gian thực.

---

## Hướng phát triển

* Bổ sung đa ngôn ngữ.
* Tích hợp RESTful API.
* Tối ưu hiệu năng hệ thống.
* Bổ sung hệ thống thông báo.
* Xây dựng ứng dụng Mobile kết nối CMS.

---

## Tác giả

Sinh viên thực hiện: Nguyễn Văn ...

Ngành: Công nghệ Thông tin

Trường Đại học Nha Trang

Năm thực hiện: 2026

---

## Giấy phép

Dự án được xây dựng phục vụ mục đích học tập, nghiên cứu và báo cáo đồ án tốt nghiệp.
