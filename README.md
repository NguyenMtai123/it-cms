# University CMS

![Laravel](https://img.shields.io/badge/Laravel-11-red)
![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![MySQL](https://img.shields.io/badge/MySQL-10.4-orange)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple)
![Architecture](https://img.shields.io/badge/Architecture-Modular%20Monolith-success)

## Giới thiệu

University CMS là hệ thống quản trị nội dung (Content Management System - CMS) được xây dựng bằng Laravel Framework và MySQL, phục vụ cho việc quản lý và vận hành cổng thông tin điện tử của trường đại học.

Hệ thống cho phép quản trị viên quản lý nội dung website, bài viết, trang thông tin, menu điều hướng, banner quảng bá, tài khoản người dùng và cấu hình hệ thống thông qua giao diện quản trị trực quan.

Dự án được phát triển theo kiến trúc **Modular Monolith**, giúp dễ dàng mở rộng, bảo trì và tái sử dụng mã nguồn.

---

## Mục tiêu dự án

* Xây dựng hệ thống CMS phục vụ quản lý website trường đại học.
* Tách biệt rõ ràng giữa giao diện và nghiệp vụ.
* Hỗ trợ mở rộng chức năng thông qua Packages và Plugins.
* Xây dựng kiến trúc linh hoạt, dễ bảo trì và phát triển lâu dài.
* Áp dụng mô hình MVC trên nền tảng Laravel Framework.

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

Dự án được xây dựng theo mô hình:

```text
Architecture : Modular Monolith
Pattern      : MVC
Framework    : Laravel
Database     : MySQL
Frontend     : Bootstrap 5 + jQuery
```

### Cấu trúc thư mục

```text
platform/
│
├── core/
│   ├── acl/
│   ├── base/
│   ├── dashboard/
│   └── media/
│
├── packages/
│   ├── page/
│   └── slug/
│
├── plugins/
│   ├── blog/
│   ├── slider/
│   ├── contact/
│   └── ...
│
└── themes/
    └── university/
```

---

## Core Modules

### ACL Module

Quản lý:

* Người dùng
* Vai trò (Roles)
* Phân quyền (Permissions)
* Xác thực đăng nhập

### Base Module

Cung cấp:

* Base Model
* Base Controller
* Repository Pattern
* Service Provider
* Helper Functions

### Dashboard Module

Quản lý:

* Giao diện quản trị
* Dashboard tổng quan
* Thống kê hệ thống

### Media Module

Quản lý:

* Upload hình ảnh
* Thư viện ảnh
* Quản lý tập tin
* Storage

---

## Packages

### Page Package

Quản lý:

* Trang nội dung tĩnh
* Giới thiệu
* Liên hệ
* Các trang thông tin

### Slug Package

Quản lý:

* URL thân thiện
* SEO URL
* Routing động

---

## Plugins

Hệ thống hỗ trợ mở rộng chức năng thông qua Plugin.

### Blog Plugin

* Quản lý bài viết
* Quản lý danh mục
* Tin tức

### Slider Plugin

* Quản lý banner
* Trình chiếu hình ảnh

### Contact Plugin

* Biểu mẫu liên hệ
* Quản lý phản hồi

### Các Plugin khác

Có thể mở rộng thêm:

* Gallery
* FAQ
* Download
* Event
* Notification

---

## Theme System

Hệ thống hỗ trợ nhiều giao diện độc lập.

Ví dụ:

```text
themes/
└── university/
    ├── layouts/
    ├── partials/
    ├── pages/
    ├── blog/
    ├── assets/
    └── widgets/
```

Ưu điểm:

* Tách biệt giao diện và nghiệp vụ.
* Dễ thay đổi giao diện.
* Không ảnh hưởng dữ liệu khi thay Theme.

---

## Chức năng chính

### Quản lý nội dung

* Quản lý bài viết
* Quản lý danh mục
* Quản lý trang tĩnh
* Quản lý menu động
* Quản lý liên kết nhanh

### Quản lý giao diện

* Quản lý Slider
* Quản lý Logo
* Quản lý Favicon
* Quản lý Footer
* Quản lý Theme

### Quản lý người dùng

* Đăng nhập
* Đăng ký thành viên
* Quên mật khẩu
* Hồ sơ cá nhân
* Phân quyền

### Quản lý hệ thống

* Cấu hình website
* Upload Media
* SEO URL
* Tìm kiếm nội dung

---

## Cơ sở dữ liệu

Các bảng dữ liệu chính:

```text
users
roles
permissions

pages
posts
categories

menus
menu_items

sliders

settings

media_files

slugs
```

---

## Giao diện hệ thống

### Frontend

* Trang chủ
* Tin tức
* Chi tiết bài viết
* Trang nội dung
* Tìm kiếm
* Liên hệ

### Backend

* Dashboard
* Quản lý nội dung
* Quản lý Media
* Quản lý Menu
* Quản lý Banner
* Quản lý Người dùng
* Cấu hình hệ thống

---

## Hướng dẫn cài đặt

### Clone source code

```bash
git clone https://github.com/your-username/university-cms.git
```

```bash
cd university-cms
```

### Cài đặt thư viện

```bash
composer install
```

### Tạo file môi trường

```bash
cp .env.example .env
```

### Sinh Application Key

```bash
php artisan key:generate
```

### Cấu hình Database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=university_cms
DB_USERNAME=root
DB_PASSWORD=
```

### Chạy Migration

```bash
php artisan migrate
```

### Tạo symbolic link

```bash
php artisan storage:link
```

### Khởi động hệ thống

```bash
php artisan serve
```

Truy cập:

```text
http://127.0.0.1:8000
```

---

## Tài khoản quản trị

```text
Email    : admin@example.com
Password : 123456
```

---

## Kết quả đạt được

* Xây dựng thành công hệ thống CMS hoàn chỉnh.
* Áp dụng kiến trúc Modular Monolith.
* Quản lý nội dung linh hoạt.
* Hỗ trợ Menu đa cấp.
* Hỗ trợ URL thân thiện SEO.
* Quản lý Banner và Media.
* Hỗ trợ phân quyền người dùng.
* Giao diện Responsive trên nhiều thiết bị.
* Hỗ trợ mở rộng bằng Packages và Plugins.

---

## Hạn chế

* Chưa hỗ trợ đa ngôn ngữ.
* Chưa triển khai REST API.
* Chưa tối ưu cache cho dữ liệu lớn.
* Chưa tích hợp hệ thống thông báo thời gian thực.

---

## Hướng phát triển

* Xây dựng RESTful API.
* Hỗ trợ đa ngôn ngữ.
* Tích hợp Elasticsearch.
* Tối ưu hiệu năng hệ thống.
* Phát triển Mobile App kết nối CMS.
* Bổ sung Plugin Marketplace.

---

## Tác giả

**Sinh viên thực hiện:** Nguyễn Văn ...

**Ngành:** Công nghệ Thông tin

**Trường:** Đại học Nha Trang

**Năm thực hiện:** 2026

---

## Giấy phép

Dự án được phát triển phục vụ mục đích học tập, nghiên cứu và báo cáo đồ án tốt nghiệp.
