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

<img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/c4e3f9ff-2eb4-4586-ba9e-65c8c6ac08be" />

## Giao diện hệ thống

### Frontend

* Trang chủ

  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/8517fc7b-3995-4bf1-92ca-09c419d3a648" />

* Tin tức
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/51b69404-8569-4a59-a85e-95d06a70a9a9" />

* Chi tiết bài viết
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/6b21b66e-4ed3-40a9-bf36-57350887e89e" />

* Tìm kiếm
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/4617a178-b735-4c27-b5f4-fd6585bf8e3d" />

* Liên hệ

  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/5e21e58a-d0f5-4eb5-9768-608ae9f9965a" />


### Backend

* Dashboard
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/916dab16-003c-4997-9bf7-e103b88a5bba" />
  
* Quản lý nội dung
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/4965a95f-1c1c-4447-aaf2-02490544e855" />
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/7dab747f-8c58-4d72-afed-7cc654db5c7e" />
  
* Quản lý Media
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/170d4739-69e6-4095-995f-5af11fdfbf44" />

* Quản lý Menu
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/21f74a81-bd4f-4d3e-a959-5bbc78438662" />

* Quản lý Banner
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/108aa809-bd4c-440d-9ad3-c96057a3ae81" />

* Quản lý Người dùng
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/f62e9cb9-581d-4525-9472-96e2489a7d3b" />

* Phân quyền
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/0572bff0-d3be-49df-a0d8-3abd81777162" />

* Cấu hình hệ thống
  
  <img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/a51bf404-62f9-4c5c-8510-4e98b0193e4b" />

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
DB_DATABASE=it_cms
DB_USERNAME=root
DB_PASSWORD=
```

### Chạy Migration hoặc import file.sql vào xampp

```bash
php artisan migrate
```
* hoặc import sql: it_cms(10).sql
* bước 1: Tạo database tên:  it_cms
* bước 2: chọn import file sql:

<img width="1899" height="810" alt="image" src="https://github.com/user-attachments/assets/b2e73369-d2e0-4bec-865a-b4dc766027ab" />


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
Email    : admin@gmail.com
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

**Sinh viên thực hiện:** Nguyễn Minh Tài

**Ngành:** Công Nghệ Thông Tin

**Trường:** Đại học Nha Trang

**Năm thực hiện:** 2026

---

## Giấy phép

Dự án được phát triển phục vụ mục đích học tập, nghiên cứu và báo cáo đồ án tốt nghiệp.
