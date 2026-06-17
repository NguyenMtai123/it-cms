-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2026 at 11:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_links`
--

CREATE TABLE `about_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_links`
--

INSERT INTO `about_links` (`id`, `title`, `icon`, `url`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Giới thiệu NTU', 'fa fa-info', 'https://ntu.edu.vn/gioi-thieu/gioi-thieu-chung', 0, 1, '2026-06-13 02:22:52', '2026-06-13 02:28:04'),
(2, 'Lịch tiếp Công nhân', 'fa fa-map-marker', 'https://ntu.edu.vn/gioi-thieu/ban-do-truong-dai-hoc-nha-trang', 1, 1, '2026-06-13 02:37:27', '2026-06-13 02:37:27'),
(3, 'Tham quan trường qua ảnh', 'fa fa-camera', 'https://65.ntu.edu.vn/hinh-anh', 2, 1, '2026-06-13 02:39:20', '2026-06-13 02:39:20'),
(4, 'Lịch tiếp Công dân', 'fa fa-calendar', 'https://phongttpc.ntu.edu.vn/lich-tiep-cong-dan', 3, 1, '2026-06-13 02:40:50', '2026-06-13 02:41:06'),
(5, 'Lịch sử phát triển', 'fas fa-history', 'https://ntu.edu.vn/gioi-thieu/lich-su-phat-trien', 4, 1, '2026-06-13 02:42:26', '2026-06-13 02:44:28'),
(6, 'Video NTU', 'fas fa-video', 'https://ntu.edu.vn/Gioi-thieu/Tham-quan-truong-qua-video', 5, 1, '2026-06-13 02:45:34', '2026-06-13 02:46:13'),
(7, 'Quy tắc ứng xử', 'fa fa-gavel', 'https://ntu.edu.vn/page/quy-tac-ung-xu', 6, 1, '2026-06-13 02:47:22', '2026-06-13 02:47:22'),
(8, 'Chuẩn mực HD giảng dạy', 'fa fa-star', 'https://ntu.edu.vn/page/chuan-muc-hoat-dong-giang-day', 7, 1, '2026-06-13 02:48:35', '2026-06-13 02:48:35'),
(9, 'Cơ sở dự liệu chuyên gia', 'fa fa-users', 'https://chuyengia.ntu.edu.vn/ChuyenGia/Timkiem/Index', 8, 1, '2026-06-13 02:50:31', '2026-06-13 02:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(120) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `title`, `description`, `url`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TUYỂN SINH ĐẠI HỌC CHÍNH QUY', 'Điện thoại: 0258 383 1145 - 0258 383 1148 \r\nWebsite: tuyensinh.ntu.edu.vn', 'https://tuyensinh.ntu.edu.vn/', 0, 1, '2026-06-12 17:46:44', '2026-06-16 02:05:49'),
(2, 'TUYỂN SINH THẠC SĨ TIẾN SĨ', 'Điện thoại: 0258.383.1145\r\nWebsite: pdtsaudaihoc.ntu.edu.vn', 'https://pdtsaudaihoc.ntu.edu.vn/', 1, 1, '2026-06-12 18:09:14', '2026-06-12 20:06:52'),
(3, 'TUYỂN SINH HỆ VỪA HỌC VỪA LÀM', 'Điện thoại: 0258 222 0913\r\nWebsite: trungtamdtbd.ntu.edu.vn', 'https://trungtamdtbd.ntu.edu.vn/', 2, 1, '2026-06-12 18:10:26', '2026-06-12 18:10:26'),
(4, 'CHƯƠNG TRÌNH ĐÀO TẠO ĐẶC BIỆT', '13 Chương trình đào tạo. Trong đó 7 CTĐT tiên tiến chất lượng cao và 6 CTĐT theo đặt hàng doanh nghiệp', 'https://tuyensinh.ntu.edu.vn/ctdt-dac-biet', 3, 1, '2026-06-12 18:11:20', '2026-06-15 03:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `admission_settings`
--

CREATE TABLE `admission_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT 'Thông tin tuyển sinh',
  `banner_image` varchar(255) DEFAULT NULL,
  `banner_url` varchar(255) DEFAULT NULL,
  `career_image` varchar(255) DEFAULT NULL,
  `career_url` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_settings`
--

INSERT INTO `admission_settings` (`id`, `title`, `banner_image`, `banner_url`, `career_image`, `career_url`, `background_image`, `created_at`, `updated_at`) VALUES
(1, 'Thông tin tuyển sinh', 'media/folder1-1781276674/phuong-huong-tuyen-sinh-2026-1781278243-XCRJnX.png', 'https://tuyensinh.ntu.edu.vn/tuyen-sinh/thong-tin-tuyen-sinh-2026', 'media/folder1-1781276674/download-1781278357-aEkSik.png', 'https://tuyensinh.ntu.edu.vn/nganh-nghe-dao-tao', 'media/folder1-1781276674/truong-trong-anh-20190401-1-1781313347-Jn8yyM.JPG', '2026-06-12 17:57:25', '2026-06-16 01:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `publish_at` timestamp NULL DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `slug`, `summary`, `content`, `attachment`, `publish_at`, `expired_at`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Thông báo tuyển dụng viên chức của Trường Đại học Nha Trang năm 2026', 'thong-bao-tuyen-dung-vien-chuc-cua-truong-dai-hoc-nha-trang-nam-2026', NULL, '<p><strong>THÔNG BÁO TUYỂN DỤNG VIÊN CHỨC</strong></p><p>Trường Đại học Nha Trang thông báo tuyển dụng viên chức năm 2026: số lượng viên chức cần tuyển là 48 giảng viên</p><p>Yêu cầu về tiêu chuẩn, điều kiện và các vị trí tuyển dụng xin&nbsp;<a href=\"https://ntu.edu.vn/uploads/42/266-Th%C3%B4ng%20b%C3%A1o%20tuy%E1%BB%83n%20d%E1%BB%A5ng%20vi%C3%AAn%20ch%E1%BB%A9c%20n%C4%83m%202026%20c%E1%BB%A7a%20Tr%C6%B0%E1%BB%9Dng%20%C4%90H%20Nha%20Trang%20(%C4%91%E1%BB%A3t%201).pdf\">xem chi tiết <strong>Thông báo&nbsp;tại đây.</strong></a></p><p>Địa điểm nhận hồ sơ: Phòng Tổ chức - Nhân sự, Trường Đại hoc Nha Trang</p><p>Địa chỉ: Số 02 đường Nguyễn Đình Chiểu, phường Bắc Nha Trang, tỉnh Khánh Hòa</p><p>Thời hạn nhận hồ sơ: trong thời hạn 30 ngày kể từ ngày đăng thông báo.</p><p>Thông tin chi tiết, xin liên hệ qua điện thoại: 0258 3833969 (gọi trong giờ hành chính), hoặc email:&nbsp;<a href=\"mailto:tochuc@ntu.edu.vn\">tochuc@ntu.edu.vn</a></p><p><a href=\"https://ntu.edu.vn/uploads/42/266-3.%20Mau_phieu_dang_ky_du_tuyen_vien_chuc%20n%C4%83m%202026.docx\"><i>Lấy file Mẫu Phiếu đăng ký dự tuyển tại đây.</i></a></p>', NULL, '2026-06-16 11:00:00', '2026-06-18 11:00:00', 1, '2026-06-15 04:00:59', '2026-06-15 04:00:59'),
(2, 'Thông báo Hội nghị Sinh viên nghiên cứu khoa học năm học 2025 - 2026', 'thong-bao-hoi-nghi-sinh-vien-nghien-cuu-khoa-hoc-nam-hoc-2025-2026', NULL, '<p>Phòng Khoa học và Công nghệ xin gửi đến Quý thầy Cô và các bạn sinh viên Thông báo tổ chức&nbsp; <i><strong>Hội nghị Sinh viên nghiên cứu khoa học năm học 2025 - 2026</strong></i></p><p><strong>1. Lễ Khai mạc và họp Hội đồng đánh giá các đề tài dự thi</strong></p><p>- Thời gian: Sáng ngày 26/5/2026.</p><p>- Địa điểm: Lễ khai mạc (Hội trường số 1); Hội đồng họp đánh giá đề tài (Hội trường số 1; Giảng đường G5.104, G5.103, G5.102, G4.101).</p><p><strong>2.</strong>&nbsp;<strong>Triển lãm sản phẩm nghiên cứu</strong></p><p>- Thời gian triển lãm: 07g30-17g00 ngày 26/5/2026.</p><p>- Địa điểm triển lãm: Khu tự học (Bên ngoài Hội trường số 1).</p><p><strong>3.&nbsp;Lễ tổng kết và trao giải các đề tài dự thi đạt giải</strong></p><p>- Thời gian: Chiều ngày 26/5/2026 <i>(Chương trình chi tiết kèm theo)</i></p><p>- Địa điểm: Hội trường số 1</p><p>Chi tiết thêm về Hội nghị và chương trình vui lòng tham khảo Thông báo đính kèm.</p><p>File đính kèm:</p><p><a href=\"https://ntu.edu.vn/uploads/23/files/Thong%20bao/2026/286-Thong%20bao%20%20To%20chuc%20Hoi%20nghi%20sinh%20vien%20NCKH%20nam%20hoc%202025-2026.pdf\"><i>Thông báo Hội nghị sinh viên nghiên cứu khoa học năm học 2025-2026</i></a></p>', 'media/thong-bao-to-chuc-hoi-nghi-sinh-vien-nckh-nam-hoc-2025-2026-260516170347-1781578658-uSa90Z.pdf', '2026-06-15 02:57:00', '2026-06-24 02:57:00', 1, '2026-06-15 19:57:45', '2026-06-16 02:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `image`, `link`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Banner 1', NULL, 'media/banners-1781509128/50-nam-260514150616-1781509153-38lIQ6.png', 'https://ntu.edu.vn/Uploads/6/Sliders/1866/50-nam-260514150616.png', 0, 1, '2026-06-15 00:39:20', '2026-06-16 02:02:02'),
(2, 'Banner 2', NULL, 'media/banners-1781509128/su-menh-tam-nhin-triet-ly-giao-duc-ntu-251222143420-1781509293-6a7aCc.png', 'https://ntu.edu.vn/Uploads/6/Sliders/1725/su-menh-tam-nhin-triet-ly-giao-duc-ntu-251222143420.png', 1, 1, '2026-06-15 00:41:38', '2026-06-16 02:02:12'),
(3, 'Banner3', NULL, 'media/ngay-da-duong-the-gioi-260604081519-1781580054-rsMjZi.jpg', 'link', 2, 1, '2026-06-15 20:20:58', '2026-06-16 04:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `description` text DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `parent_id`, `status`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Tin tức chung', 'tin-tuc-chung', NULL, NULL, 1, 0, '2026-06-12 07:59:35', '2026-06-12 07:59:35'),
(2, 'Tin tức Đào tạo', 'tin-tuc-dao-tao', NULL, NULL, 1, 1, '2026-06-12 08:00:46', '2026-06-12 08:00:46'),
(3, 'Hợp tác đối ngoại', 'hop-tac-doi-ngoai', NULL, NULL, 1, 2, '2026-06-12 08:01:13', '2026-06-12 08:01:13'),
(4, 'Khoa học Công Nghệ', 'khoa-hoc-cong-nghe', NULL, NULL, 1, 3, '2026-06-12 08:01:35', '2026-06-12 08:01:35'),
(5, 'NTU trong tôi', 'ntu-trong-toi', NULL, NULL, 1, 4, '2026-06-12 08:01:57', '2026-06-12 08:01:57'),
(6, 'NTU - Góc nhìn và chia sẻ', 'ntu-goc-nhin-va-chia-se', NULL, NULL, 1, 5, '2026-06-12 08:02:13', '2026-06-12 08:02:13'),
(7, 'Tạp chí KH-CN thủy sản', 'tap-chi-kh-cn-thuy-san', NULL, NULL, 1, 6, '2026-06-12 08:02:26', '2026-06-12 08:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_links`
--

CREATE TABLE `footer_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `group` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_links`
--

INSERT INTO `footer_links` (`id`, `title`, `url`, `group`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ban Giám hiệu', 'https://ntu.edu.vn/co-cau-to-chuc/ban-giam-hieu', 'organization', 0, 1, '2026-06-13 03:47:17', '2026-06-13 03:47:17'),
(2, 'Đảng ủy', 'https://danguy.ntu.edu.vn/', 'organization', 1, 1, '2026-06-13 03:48:01', '2026-06-13 03:48:01'),
(4, 'Đoàn thể và các Hội', 'https://ntu.edu.vn/co-cau-to-chuc/%C4%91oan-the-va-cac-hoi', 'organization', 2, 1, '2026-06-13 03:48:44', '2026-06-13 03:48:44'),
(5, 'Hội đồng Giáo sư', 'https://ntu.edu.vn/hoi-dong-giao-su', 'organization', 3, 1, '2026-06-13 03:49:54', '2026-06-13 03:49:54'),
(6, 'Hội đồng Khoa học và Đào tạo Trường', 'https://ntu.edu.vn/co-cau-to-chuc/hoi-dong-khoa-hoc-va-dao-tao-truong', 'organization', 4, 1, '2026-06-13 03:50:37', '2026-06-13 03:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `footer_settings`
--

CREATE TABLE `footer_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rector` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_settings`
--

INSERT INTO `footer_settings` (`id`, `name`, `rector`, `description`, `address`, `phone`, `email`, `website`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'TRƯỜNG ĐẠI HỌC NHA TRANG', 'TS. Quách Hoài Nam', 'Trải qua 65 năm xây dựng và phát triển, Trường Đại học Nha Trang đã trở thành một trong những cơ sở đào tạo đa ngành, đa lĩnh vực quy mô lớn; là cơ sở nghiên cứu chủ đạo, triển khai ứng dụng công nghệ tiên tiến, đặc biệt trong lĩnh vực thủy sản phục vụ phát triển kinh tế xã hội khu vực Nam Trung Bộ, Tây Nguyên và phạm vi cả nước.', '02 Nguyễn Đình Chiểu, phường Bắc Nha Trang, Khánh Hòa', '02583831149', 'dhnt@ntu.edu.vn', 'www.ntu.edu.vn', NULL, '2026-06-13 03:37:31', '2026-06-13 03:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media_files`
--

CREATE TABLE `media_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `folder_id` bigint(20) UNSIGNED DEFAULT 0,
  `mime_type` varchar(120) NOT NULL,
  `size` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `visibility` varchar(255) NOT NULL DEFAULT 'public',
  `options` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_files`
--

INSERT INTO `media_files` (`id`, `user_id`, `name`, `alt`, `folder_id`, `mime_type`, `size`, `url`, `visibility`, `options`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '316-olym-ta_tdh.jpg', NULL, 3, 'image/jpeg', 116303, 'media/tin-tuc-chung-1781277523/316-olym-ta-tdh-1781276809-PfVO6i.jpg', 'public', NULL, '2026-06-12 08:06:50', '2026-06-12 08:18:43', NULL),
(2, 1, 'trien-lam-san-pham-khoi-nghiep-ntu-2026-lan-toa-tinh-than-doi-moi-sang-tao.jpg', NULL, 3, 'image/jpeg', 1526760, 'media/tin-tuc-chung-1781277523/trien-lam-san-pham-khoi-nghiep-ntu-2026-lan-toa-tinh-than-doi-moi-sang-tao-1781276966-sMnxEx.jpg', 'public', NULL, '2026-06-12 08:09:26', '2026-06-12 08:18:43', NULL),
(3, 1, '316-ppk_5.jpg', NULL, 3, 'image/jpeg', 156803, 'media/tin-tuc-chung-1781277523/316-ppk-5-1781277289-HElKWX.jpg', 'public', NULL, '2026-06-12 08:14:49', '2026-06-12 08:18:43', NULL),
(5, 1, 'tong-ket-va-trao-giai-cuoc-thi-xay-dung-video-tuyen-truyen-nang-cao-nhan-thuc-ve.jpg', NULL, 3, 'image/jpeg', 1318546, 'media/tin-tuc-chung-1781277523/tong-ket-va-trao-giai-cuoc-thi-xay-dung-video-tuyen-truyen-nang-cao-nhan-thuc-ve-1781277860-rMJ1WS.jpg', 'public', NULL, '2026-06-12 08:24:20', '2026-06-12 08:24:20', NULL),
(6, 1, 'dong-chi-ho-tung-mau-nguoi-chien-s-cong-san-kien-trung-nha-lanh-dao-tien-boi.jpg', NULL, 3, 'image/jpeg', 14560, 'media/tin-tuc-chung-1781277523/dong-chi-ho-tung-mau-nguoi-chien-s-cong-san-kien-trung-nha-lanh-dao-tien-boi-1781277964-bUFvJd.jpg', 'public', NULL, '2026-06-12 08:26:04', '2026-06-12 08:26:04', NULL),
(7, 1, 'phuong-huong-tuyen-sinh-2026.png', NULL, 1, 'image/png', 337134, 'media/folder1-1781276674/phuong-huong-tuyen-sinh-2026-1781278243-XCRJnX.png', 'public', NULL, '2026-06-12 08:30:43', '2026-06-12 08:30:43', NULL),
(8, 1, 'download.png', NULL, 1, 'image/png', 398035, 'media/folder1-1781276674/download-1781278357-aEkSik.png', 'public', NULL, '2026-06-12 08:32:37', '2026-06-12 08:32:37', NULL),
(9, 1, 'Trương Trọng Ánh_20190401 (1).JPG', NULL, 1, 'image/jpeg', 74614, 'media/folder1-1781276674/truong-trong-anh-20190401-1-1781313347-Jn8yyM.JPG', 'public', NULL, '2026-06-12 18:15:47', '2026-06-12 18:15:47', NULL),
(10, 1, 'ecogiv.png', NULL, 2, 'image/png', 6753, 'media/folder2-1781276684/ecogiv-1781323849-3aEgmV.png', 'public', NULL, '2026-06-12 21:10:49', '2026-06-12 21:10:49', NULL),
(11, 1, 'emsiv.png', NULL, 2, 'image/png', 30940, 'media/folder2-1781276684/emsiv-1781324311-gjEzQw.png', 'public', NULL, '2026-06-12 21:18:31', '2026-06-12 21:18:31', NULL),
(12, 1, 'ecovip.png', NULL, 2, 'image/png', 34254, 'media/folder2-1781276684/ecovip-1781325326-T1RD8x.png', 'public', NULL, '2026-06-12 21:35:26', '2026-06-12 21:35:26', NULL),
(13, 1, 'dive.jpg', NULL, 2, 'image/jpeg', 17007, 'media/folder2-1781276684/dive-1781325388-OeCp3O.jpg', 'public', NULL, '2026-06-12 21:36:29', '2026-06-12 21:36:29', NULL),
(14, 1, 'degital-move.jpg', NULL, 2, 'image/jpeg', 15588, 'media/folder2-1781276684/degital-move-1781325450-zsBSWu.jpg', 'public', NULL, '2026-06-12 21:37:30', '2026-06-12 21:37:30', NULL),
(15, 1, 'devices.jpg', NULL, 2, 'image/jpeg', 49808, 'media/folder2-1781276684/devices-1781325560-ld9XAB.jpg', 'public', NULL, '2026-06-12 21:39:20', '2026-06-12 21:39:20', NULL),
(16, 1, 'revfin-250623093404.jpg', NULL, 2, 'image/jpeg', 16293, 'media/folder2-1781276684/revfin-250623093404-1781329477-L9HKyv.jpg', 'public', NULL, '2026-06-12 22:44:37', '2026-06-12 22:44:37', NULL),
(17, 1, 'iuu-250806092455.jpg', NULL, 2, 'image/jpeg', 9723, 'media/folder2-1781276684/iuu-250806092455-1781329699-nQjCtn.jpg', 'public', NULL, '2026-06-12 22:48:19', '2026-06-12 22:48:19', NULL),
(18, 1, 'thuc-tap-tai-duc-buoc-ngoat-cho-nhung-nha-lam-truyen-thong-tuong-lai-ntu.jpg', NULL, 4, 'image/jpeg', 189419, 'media/chia-se-1781335505/thuc-tap-tai-duc-buoc-ngoat-cho-nhung-nha-lam-truyen-thong-tuong-lai-ntu-1781335517-dwGDjL.jpg', 'public', NULL, '2026-06-13 00:25:17', '2026-06-13 00:25:17', NULL),
(19, 1, '325-hop-tac-dn-3.jpg', NULL, 4, 'image/jpeg', 121130, 'media/chia-se-1781335505/325-hop-tac-dn-3-1781335912-ZjwGca.jpg', 'public', NULL, '2026-06-13 00:31:52', '2026-06-13 00:31:52', NULL),
(20, 1, 'chao-co-dau-quy-net-dp-van-hoa-truong-dai-hoc-nha-trang.jpg', NULL, 4, 'image/jpeg', 341737, 'media/chia-se-1781335505/chao-co-dau-quy-net-dp-van-hoa-truong-dai-hoc-nha-trang-1781336406-znKyYA.jpg', 'public', NULL, '2026-06-13 00:40:06', '2026-06-13 00:40:06', NULL),
(21, 1, 'dsc05927-240403140634.jpg', NULL, 5, 'image/jpeg', 100445, 'media/ntu-1781338641/dsc05927-240403140634-1781338651-wIZmdr.jpg', 'public', NULL, '2026-06-13 01:17:32', '2026-06-13 01:17:32', NULL),
(22, 1, 'khoa-ngoai-ngu-to-chuc-nhieu-hoat-dong-mung-ngay-nha-giao-viet-nam-20-11.jpg', NULL, 5, 'image/jpeg', 148662, 'media/ntu-1781338641/khoa-ngoai-ngu-to-chuc-nhieu-hoat-dong-mung-ngay-nha-giao-viet-nam-20-11-1781338750-GZV1Pw.jpg', 'public', NULL, '2026-06-13 01:19:10', '2026-06-13 01:19:10', NULL),
(25, 1, 'giang-vien-khoa-ngoai-ngu-cap-nhat-phuong-phap-giang-day-hien-dai-cung-chuyen-gia.jpg', NULL, 6, 'image/jpeg', 2230929, 'media/dao-tao-1781428402/giang-vien-khoa-ngoai-ngu-cap-nhat-phuong-phap-giang-day-hien-dai-cung-chuyen-gia-1781430022-4PMhV6.jpg', 'public', NULL, '2026-06-14 02:40:23', '2026-06-14 02:40:23', NULL),
(26, 1, 'sinh-vien-canada-trai-nghiem-hoc-tieng-viet-va-van-hoa-viet-nam-tai-truong-dai-ho.jpg', NULL, 6, 'image/jpeg', 1026252, 'media/dao-tao-1781428402/sinh-vien-canada-trai-nghiem-hoc-tieng-viet-va-van-hoa-viet-nam-tai-truong-dai-ho-1781434218-guqMEO.jpg', 'public', NULL, '2026-06-14 03:50:18', '2026-06-14 03:50:18', NULL),
(27, 1, '316-apa_logo.jpg', NULL, 6, 'image/jpeg', 101587, 'media/dao-tao-1781428402/316-apa-logo-1781434447-IQbAJL.jpg', 'public', NULL, '2026-06-14 03:54:07', '2026-06-14 03:54:07', NULL),
(28, 1, 'truong-dai-hoc-nha-trang-ky-ket-thoa-thuan-hop-tac-toan-dien-voi-bidv-khanh-hoa.jpg', NULL, 6, 'image/jpeg', 4090184, 'media/dao-tao-1781428402/truong-dai-hoc-nha-trang-ky-ket-thoa-thuan-hop-tac-toan-dien-voi-bidv-khanh-hoa-1781434532-ZbX2H8.jpg', 'public', NULL, '2026-06-14 03:55:32', '2026-06-14 03:55:32', NULL),
(29, 1, 'danh-gia-luan-an-tien-s-nghien-cuu-quy-trinh-san-xuat-vac-xin-bach-hau-uon-van.jpg', NULL, 0, 'image/jpeg', 8005496, 'media/danh-gia-luan-an-tien-s-nghien-cuu-quy-trinh-san-xuat-vac-xin-bach-hau-uon-van-1781435076-V5CasA.jpg', 'public', NULL, '2026-06-14 04:04:36', '2026-06-14 04:04:36', NULL),
(30, 1, 'hoi-thao-tesf-2026-thuc-day-chuyen-doi-so-va-cong-nghe-thong-minh-trong-nganh-thu.jpg', NULL, 0, 'image/jpeg', 5871703, 'media/hoi-thao-tesf-2026-thuc-day-chuyen-doi-so-va-cong-nghe-thong-minh-trong-nganh-thu-1781435182-wFLEGV.jpg', 'public', NULL, '2026-06-14 04:06:22', '2026-06-14 04:06:22', NULL),
(31, 1, 'hoi-nghi-sinh-vien-nghien-cuu-khoa-hoc-nam-hoc-2025-2026-lan-toa-tinh-than-doi.jpg', NULL, 0, 'image/jpeg', 1699886, 'media/hoi-nghi-sinh-vien-nghien-cuu-khoa-hoc-nam-hoc-2025-2026-lan-toa-tinh-than-doi-1781435262-JLOxGZ.jpg', 'public', NULL, '2026-06-14 04:07:42', '2026-06-14 04:07:42', NULL),
(32, 1, '50-nam-260514150616.png', NULL, 7, 'image/png', 1849938, 'media/banners-1781509128/50-nam-260514150616-1781509153-38lIQ6.png', 'public', NULL, '2026-06-15 00:39:14', '2026-06-15 00:39:14', NULL),
(33, 1, 'su-menh-tam-nhin-triet-ly-giao-duc-ntu-251222143420.png', NULL, 7, 'image/png', 476608, 'media/banners-1781509128/su-menh-tam-nhin-triet-ly-giao-duc-ntu-251222143420-1781509293-6a7aCc.png', 'public', NULL, '2026-06-15 00:41:33', '2026-06-15 00:41:33', NULL),
(34, 1, 'Báo cáo đồ án tốt nghiệp_Nguyen_Minh_Tai_1.pdf', NULL, 0, 'application/pdf', 1619175, 'media/bao-cao-do-an-tot-nghiep-nguyen-minh-tai-1-1781517314-07atGs.pdf', 'public', NULL, '2026-06-15 02:55:14', '2026-06-15 02:55:14', NULL),
(35, 1, 'chien-luoc-tam-nhin-250515155521.pdf', NULL, 0, 'application/pdf', 1363244, 'media/chien-luoc-tam-nhin-250515155521-1781518758-vYYLAz.pdf', 'public', NULL, '2026-06-15 03:19:18', '2026-06-15 03:19:18', NULL),
(37, 1, 'ecogiv.png', NULL, 0, 'image/png', 6753, 'media/ecogiv-1781520296-6XNpOg.png', 'public', NULL, '2026-06-15 03:44:56', '2026-06-15 03:44:56', NULL),
(38, 1, 'logo.png', NULL, 0, 'image/png', 19225, 'media/logo-1781523545-JlAg1k.png', 'public', NULL, '2026-06-15 04:39:05', '2026-06-15 04:39:05', NULL),
(39, 1, 'thong-bao--to-chuc-hoi-nghi-sinh-vien-nckh-nam-hoc-2025-2026-260516170347.pdf', NULL, 0, 'application/pdf', 4323193, 'media/thong-bao-to-chuc-hoi-nghi-sinh-vien-nckh-nam-hoc-2025-2026-260516170347-1781578658-uSa90Z.pdf', 'public', NULL, '2026-06-15 19:57:39', '2026-06-15 19:57:39', NULL),
(40, 1, 'ngay-da-duong-the-gioi-260604081519.jpg', NULL, 0, 'image/jpeg', 289498, 'media/ngay-da-duong-the-gioi-260604081519-1781580054-rsMjZi.jpg', 'public', NULL, '2026-06-15 20:20:54', '2026-06-15 20:20:54', NULL),
(44, 1, 'Screenshot 2026-06-17 045308.png', NULL, 0, 'image/png', 455461, 'media/screenshot-2026-06-17-045308-1781646833-eQGjeR.png', 'public', NULL, '2026-06-16 14:53:54', '2026-06-16 14:53:54', NULL),
(45, 1, 'Screenshot 2026-06-17 050631.png', NULL, 0, 'image/png', 627531, 'media/screenshot-2026-06-17-050631-1781647603-xczkC2.png', 'public', NULL, '2026-06-16 15:06:43', '2026-06-16 15:06:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_folders`
--

CREATE TABLE `media_folders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT 0,
  `color` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media_folders`
--

INSERT INTO `media_folders` (`id`, `user_id`, `name`, `slug`, `parent_id`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'folder1', 'folder1-1781276674', 0, NULL, '2026-06-12 08:04:34', '2026-06-12 08:04:34', NULL),
(2, 1, 'folder2', 'folder2-1781276684', 0, NULL, '2026-06-12 08:04:44', '2026-06-12 08:04:44', NULL),
(3, 1, 'tin-tuc-chung', 'tin-tuc-chung-1781277523', 0, NULL, '2026-06-12 08:05:12', '2026-06-12 08:18:43', NULL),
(4, 1, 'chia-se', 'chia-se-1781335505', 0, NULL, '2026-06-13 00:25:05', '2026-06-13 00:25:05', NULL),
(5, 1, 'ntu', 'ntu-1781338641', 0, NULL, '2026-06-13 01:17:21', '2026-06-13 01:17:21', NULL),
(6, 1, 'dao-tao', 'dao-tao-1781428402', 0, NULL, '2026-06-14 02:13:22', '2026-06-14 02:13:22', NULL),
(7, 1, 'banners', 'banners-1781509128', 0, NULL, '2026-06-15 00:38:48', '2026-06-15 00:38:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media_settings`
--

CREATE TABLE `media_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(120) NOT NULL,
  `value` text DEFAULT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `location` varchar(60) NOT NULL DEFAULT 'main',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `location`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Top Header', 'top-header', 'topbar', 1, '2026-06-13 03:27:55', '2026-06-13 03:27:55'),
(2, 'Main menu', 'main-menu', 'navbar', 1, '2026-06-13 03:28:12', '2026-06-13 03:28:12'),
(3, 'Header Menu', 'header-menu', 'header', 1, '2026-06-15 00:19:49', '2026-06-15 00:19:49'),
(4, 'Footer', 'footer', 'footer', 1, '2026-06-15 04:02:37', '2026-06-15 04:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT 0,
  `label` varchar(120) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT 'custom',
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `route_name` varchar(255) DEFAULT NULL,
  `route_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`route_params`)),
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `target_blank` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `parent_id`, `label`, `type`, `page_id`, `url`, `route_name`, `route_params`, `order`, `target_blank`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 3, NULL, 'Cán bộ', 'custom', NULL, 'https://canbo.ntu.edu.vn/Account/Login?ReturnUrl=%2f', NULL, NULL, 0, 1, 1, '2026-06-15 00:20:18', '2026-06-15 00:22:25'),
(3, 3, NULL, 'Giảng viên', 'custom', NULL, 'https://qldt.ntu.edu.vn/', NULL, NULL, 1, 1, 1, '2026-06-15 00:20:30', '2026-06-15 00:22:09'),
(4, 3, NULL, 'Sinh viên', 'custom', NULL, 'https://sinhvien.ntu.edu.vn/', NULL, NULL, 2, 1, 1, '2026-06-15 00:21:00', '2026-06-15 00:21:54'),
(5, 3, NULL, 'Thư viện', 'custom', NULL, 'https://thuvien.ntu.edu.vn/', NULL, NULL, 3, 1, 1, '2026-06-15 00:21:31', '2026-06-15 00:25:56'),
(6, 3, NULL, 'CTĐT', 'custom', NULL, 'https://ctdt.ntu.edu.vn/', NULL, NULL, 4, 1, 1, '2026-06-15 00:22:48', '2026-06-15 00:22:48'),
(7, 1, NULL, 'Bộ GD&ĐT', 'custom', NULL, 'https://moet.gov.vn/', NULL, NULL, 0, 1, 1, '2026-06-15 00:29:30', '2026-06-15 00:29:36'),
(8, 1, NULL, 'Tra cứu VB', 'custom', NULL, '/tra-cuu-van-bang', NULL, NULL, 1, 1, 1, '2026-06-15 00:31:08', '2026-06-15 01:12:05'),
(9, 1, NULL, 'E-learning', 'custom', NULL, 'https://elearning.ntu.edu.vn/', NULL, NULL, 2, 1, 1, '2026-06-15 00:31:49', '2026-06-15 00:31:49'),
(10, 1, NULL, 'E-Office', 'custom', NULL, 'https://sso.ntu.edu.vn/cas/login?service=https%3A%2F%2Fvpdt.vnptioffice.vn%2Fqlvbdh_ntu%2F', NULL, NULL, 3, 1, 1, '2026-06-15 00:32:14', '2026-06-15 00:32:14'),
(14, 2, NULL, 'Giới thiệu', 'page', 5, '/gioi-thieu', NULL, NULL, 1, 1, 1, '2026-06-15 02:21:14', '2026-06-16 04:56:46'),
(16, 2, NULL, 'Trang chủ', 'custom', NULL, '/', NULL, NULL, 0, 1, 1, '2026-06-15 02:22:39', '2026-06-15 02:22:39'),
(18, 2, 14, 'Chiến lược phát triển', 'page', 8, '/gioi-thieu/chien-luoc-phat-trien', NULL, NULL, 1, 1, 1, '2026-06-16 04:55:56', '2026-06-16 04:55:56'),
(19, 2, 14, 'Giới thiệu chung', 'page', 6, '/gioi-thieu/gioi-thieu-chung', NULL, NULL, 0, 1, 1, '2026-06-16 04:56:32', '2026-06-16 04:56:32'),
(20, 2, NULL, 'Cơ cấu tổ chức', 'custom', 10, '/co-cau-to-chuc', NULL, NULL, 2, 1, 1, '2026-06-16 14:52:22', '2026-06-16 15:02:03'),
(21, 2, 20, 'Ban giám hiệu', 'page', 9, '/co-cau-to-chuc/ban-giam-hieu', NULL, NULL, 1, 1, 1, '2026-06-16 14:59:08', '2026-06-16 15:03:27'),
(22, 2, 20, 'Đảng ủy', 'custom', NULL, 'https://danguy.ntu.edu.vn/', NULL, NULL, 0, 1, 1, '2026-06-16 15:03:10', '2026-06-16 15:03:10'),
(23, 2, 14, 'Lịch sử phát triển', 'page', 11, '/gioi-thieu/lich-su-phat-trien', NULL, NULL, 2, 1, 1, '2026-06-16 15:07:23', '2026-06-16 15:07:23'),
(24, 2, 14, 'Thông điệp của Trường Đại học Nha Trang', 'page', 12, '/gioi-thieu/thong-diep-cua-truong-dai-hoc-nha-trang', NULL, NULL, 3, 1, 1, '2026-06-16 15:09:44', '2026-06-16 15:09:44'),
(25, 2, 14, 'Cơ sở vật chất', 'page', 13, '/gioi-thieu/co-so-vat-chat', NULL, NULL, 4, 1, 1, '2026-06-16 15:14:02', '2026-06-16 15:14:02'),
(26, 2, 14, 'Ba công khai', 'page', 14, '/gioi-thieu/ba-cong-khai', NULL, NULL, 5, 1, 1, '2026-06-16 15:16:03', '2026-06-16 15:16:03'),
(27, 2, 14, 'Chỉ đường đến NTU', 'page', 15, '/gioi-thieu/chi-duong-den-ntu', NULL, NULL, 6, 1, 1, '2026-06-16 15:17:45', '2026-06-16 15:17:45'),
(28, 2, 20, 'Hội đồng Khoa học và Đào tạo Trường', 'page', 16, '/co-cau-to-chuc/hoi-dong-khoa-hoc-va-dao-tao-truong', NULL, NULL, 2, 1, 1, '2026-06-16 15:19:42', '2026-06-16 15:19:42'),
(29, 2, NULL, 'Tuyển sinh', 'custom', NULL, 'https://tuyensinh.ntu.edu.vn/', NULL, NULL, 3, 1, 1, '2026-06-16 15:21:56', '2026-06-16 15:21:56'),
(30, 2, NULL, 'Đào tạo', 'page', 17, '/dao-tao', NULL, NULL, 4, 1, 1, '2026-06-16 15:23:43', '2026-06-16 15:23:43'),
(31, 2, 30, 'Chương trình đào tạo đặc biệt', 'custom', NULL, 'https://tuyensinh.ntu.edu.vn/ctdt-dac-biet', NULL, NULL, 0, 1, 1, '2026-06-16 15:24:33', '2026-06-16 15:24:33'),
(32, 2, NULL, 'Sinh viên', 'page', 18, '/sinh-vien', NULL, NULL, 5, 1, 1, '2026-06-16 15:30:08', '2026-06-16 15:30:08'),
(33, 2, NULL, 'Nghiên cứu khoa học', 'page', 19, '/nghien-cuu-khoa-hoc', NULL, NULL, 6, 1, 1, '2026-06-16 15:52:04', '2026-06-16 15:52:04'),
(34, 2, NULL, 'Hợp tác đối ngoại', 'page', 20, '/hop-tac-doi-ngoai', NULL, NULL, 7, 1, 1, '2026-06-16 15:52:21', '2026-06-16 15:52:21'),
(35, 2, NULL, 'Liên hệ', 'page', 21, '/lien-he', NULL, NULL, 8, 1, 1, '2026-06-16 15:52:36', '2026-06-16 15:52:36'),
(36, 2, 32, 'Đời sống Sinh viên', 'page', 22, '/sinh-vien/doi-song-sinh-vien', NULL, NULL, 0, 1, 1, '2026-06-16 16:00:47', '2026-06-16 16:00:47'),
(37, 2, 32, 'Sinh viên quốc tế', 'page', 23, '/sinh-vien/sinh-vien-quoc-te', NULL, NULL, 1, 1, 1, '2026-06-16 16:01:09', '2026-06-16 16:01:09'),
(38, 2, 32, 'Học tập và việc làm', 'page', 24, '/hoc-tap-va-viec-lam', NULL, NULL, 2, 1, 1, '2026-06-16 16:01:28', '2026-06-16 16:01:28'),
(39, 2, 32, 'Giáo dục trực tuyến E-learning', 'custom', NULL, 'https://elearning.ntu.edu.vn/', NULL, NULL, 3, 1, 1, '2026-06-16 16:03:20', '2026-06-16 16:03:20'),
(40, 2, 33, 'Phòng thí nghiệm', 'page', 25, '/nghien-cuu-khoa-hoc/phong-thi-nghiem', NULL, NULL, 0, 1, 1, '2026-06-16 16:03:41', '2026-06-16 16:03:41'),
(41, 2, 33, 'Nhân lực Khoa học Công nghệ', 'page', 26, '/nghien-cuu-khoa-hoc/nhan-luc-khoa-hoc-cong-nghe', NULL, NULL, 1, 1, 1, '2026-06-16 16:03:58', '2026-06-16 16:03:58'),
(42, 2, 34, 'Mạng lưới đối tác', 'page', 27, '/hop-tac-doi-ngoai/mang-luoi-doi-tac', NULL, NULL, 0, 1, 1, '2026-06-16 16:04:19', '2026-06-16 16:04:19'),
(43, 2, 34, 'Hoạt động hợp tác', 'page', 28, '/hop-tac-doi-ngoai/hoat-dong-hop-tac', NULL, NULL, 1, 1, 1, '2026-06-16 16:04:33', '2026-06-16 16:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2016_06_10_230148_create_acl_tables', 2),
(5, '2026_06_05_000001_create_plugins_table', 2),
(6, '2026_06_06_000001_create_media_tables', 2),
(7, '2026_06_09_000000_create_pages_table', 2),
(8, '2026_07_07_add_status_to_plugins_table', 2),
(9, '2026_08_08_000002_add_description_to_plugins_table', 2),
(10, '2026_08_08_000004_create_settings_table', 2),
(12, '2026_09_09_000002_create_menus_tables', 2),
(13, '2026_12_97_02389_create_themes_table', 2),
(15, '2026_01_01_000001_create_posts_table', 4),
(16, '2026_02_06_000002_add_sort_order_to_categories_table', 4),
(17, '2026_06_10_000000_create_announcements_table', 5),
(18, '2026_199_09_000000_create_banners_table', 6),
(19, '2026_01_01_000001_create_events_table', 7),
(20, '2026_06_13_000001_create_quick_links_table', 8),
(22, '2026_01_01_000000_create_admissions_table', 9),
(23, '2026_01_00_000000_create_admission_settings_table', 10),
(24, '2026_03_00_976326_add_urls_to_admission_settings', 11),
(25, '2026_01_01_000000_create_projects_table', 12),
(27, '2026_06_13_000000_create_videos_table', 13),
(28, '2026_07_07_000000_add_description_to_videos_table', 13),
(29, '2026_02_08_92837_create_about_links_table', 14),
(34, '2026_01_01_000001_create_footer_settings_table', 15),
(35, '2026_01_01_000002_create_footer_links_table', 15),
(36, '2026_03_08_000001_add_views_to_posts_table', 16),
(37, '2026_08_11_000000_add_parent_id_to_pages_table', 17),
(38, '2026_17_99_0918281_add_page_id_to_menu_items_table', 18),
(39, '2026_11_11_000000_add_file_to_pages_table', 19),
(40, '2026_07_07_818212_add_attachment_to_announcements_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `excerpt` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `parent_id`, `excerpt`, `content`, `image`, `file`, `status`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Tra cứu văn bằng', 'tra-cuu-van-bang', NULL, NULL, '<h2>Tra cứu văn bằng</h2><p><strong>HƯỚNG DẪN TRA CỨU VÀ XÁC MINH VĂN BẰNG:</strong></p><p>1- Địa chỉ tra cứu: <a href=\"https://qldt.ntu.edu.vn/tracuuvanbangchungchi.html\">https://qldt.ntu.edu.vn/tracuuvanbangchungchi.html</a></p><p>2- Nhu cầu xác minh văn bằng bằng email hoặc bản giấy: vui lòng gửi nhu cầu về Phòng Đảm bảo chất lượng và Khảo thí qua địa chỉ email: <a href=\"mailto:dbcltt@ntu.edu.vn\">dbcltt@ntu.edu.vn</a> <i>(gửi kèm theo email bản scan công văn của cơ quan có nhu cầu và bản scan văn bằng cần xác minh)</i>. Phòng Đảm bảo chất lượng và Khảo thí sẽ hồi đáp kết quả xác minh qua email hoặc gửi bản giấy cho Quý cơ quan (nếu cần).</p><p>3- Các thông tin phản hồi về văn bằng, vui lòng gửi về Phòng Đảm bảo chất lượng và Khảo thí qua địa chỉ email: <a href=\"mailto:dbcltt@ntu.edu.vn\">dbcltt@ntu.edu.vn</a>.</p>', NULL, NULL, 1, '2026-06-14 08:12:00', '2026-06-15 01:13:19', '2026-06-15 01:34:34', NULL),
(5, 'Giới thiệu', 'gioi-thieu', NULL, NULL, '<h4>Giới thiệu</h4><p><a href=\"https://ntu.edu.vn/gioi-thieu/ba-cong-khai\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Ba công khai\" width=\"16px\" height=\"16px\">Ba công khai</a></p><p><a href=\"https://ntu.edu.vn/gioi-thieu/ban-do-truong-dai-hoc-nha-trang\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Bản đồ Trường\" width=\"16px\" height=\"16px\">Bản đồ Trường</a></p><p><a href=\"https://ntu.edu.vn/gioi-thieu/co-so-vat-chat\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Cơ sở vật chất\" width=\"16px\" height=\"16px\">Cơ sở vật chất</a></p><p><a href=\"https://ntu.edu.vn/gioi-thieu/chi-%C4%91uong-%C4%91en-ntu\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Chỉ đường đến NTU\" width=\"16px\" height=\"16px\">Chỉ đường đến NTU</a></p><p><a href=\"https://ntu.edu.vn/gioi-thieu/chien-luoc-phat-trien\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Chiến lược phát triển\" width=\"16px\" height=\"16px\">Chiến lược phát triển</a></p><p><a href=\"https://ntu.edu.vn/gioi-thieu/gioi-thieu-chung\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Giới thiệu chung\" width=\"16px\" height=\"16px\">Giới thiệu chung</a></p><p><a href=\"https://ntu.edu.vn/gioi-thieu/lich-su-phat-trien\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Lịch sử phát triển\" width=\"16px\" height=\"16px\">Lịch sử phát triển</a></p><p><a href=\"https://67.ntu.edu.vn/hinh-anh\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Tham quan Trường qua ảnh\" width=\"16px\" height=\"16px\">Tham quan Trường qua ảnh</a></p><p><a href=\"https://ntu.edu.vn/gioi-thieu/tham-quan-truong-qua-video\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Tham quan Trường qua video\" width=\"16px\" height=\"16px\">Tham quan Trường qua video</a></p><p><a href=\"https://ntu.edu.vn/gioi-thieu/thong-diep-cua-truong-dai-hoc-nha-trang\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Thông điệp của Trường Đại học Nha Trang\" width=\"16px\" height=\"16px\">Thông điệp của Trường Đại học Nha Trang</a></p>', NULL, NULL, 1, '2026-06-14 08:37:00', '2026-06-15 01:37:15', '2026-06-15 01:37:15', NULL),
(6, 'Giới thiệu chung', 'gioi-thieu-chung', 5, NULL, '<h3><strong>Giới thiệu chung</strong></h3><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/khuan-vien-dh-nha-trang.JPG\" alt=\"Tòa nhà Hành chính\" width=\"891\" height=\"496\"></p><ul><li><a href=\"https://ntu.edu.vn/lich-su-phat-trien\">Lịch sử phát triển</a></li><li><a href=\"https://ntu.edu.vn/chien-luoc-phat-trien\">Chiến lược phát triển</a></li></ul><p>Tiền thân của Trường Đại học Nha Trang là Khoa Thủy sản, thuộc Học viện Nông Lâm Hà Nội, được thành lập vào ngày 01/8/1959, sau đó được tách ra và lấy tên là Trường Thủy sản vào ngày 16/8/1966. Năm 1976, Trường chuyển từ TP. Hải Phòng vào TP. Nha Trang (tỉnh Khánh Hòa) và lần lượt đổi tên thành Trường ĐH Hải sản (năm 1977) và Trường Đại học Thủy sản (năm 1980). Theo Quyết định số 172/2006/QĐ-TTg của Thủ tướng Chính phủ, kể từ ngày 25/7/2006, Trường chính thức mang tên “Trường Đại học Nha Trang”.</p><p>Tọa lạc trên ngọn đồi Lasan phía Đông Bắc thành phố biển Nha Trang, với 2 mặt giáp biển, Trường Đại học Nha Trang là một trong những trường đại học có cảnh quan đẹp nhất Việt Nam. Trải qua hơn 65 năm xây dựng và phát triển, đến nay, Trường Đại học Nha Trang đã trở thành một cơ sở đào tạo đa ngành, đa lĩnh vực, đa cấp học có uy tín, với nền tảng, thế mạnh là lĩnh vực khoa học - công nghệ biển và thủy sản. Với vị thế là đơn vị đào tạo hàng đầu về khoa học nghề cá và nuôi trồng thủy sản ở cấp quốc gia, Trường Đại học Nha Trang tiếp tục giữ vai trò quan trọng trong việc thúc đẩy phát triển kinh tế biển Việt Nam, góp phần cung cấp nguồn nhân lực cần thiết đáp ứng quá trình hội nhập tất yếu của quốc gia.</p><p>Với 20 khoa, viện, trung tâm nghiên cứu, trung tâm chuyển giao công nghệ, Trường ĐH Nha Trang hiện có khoảng 15.000 sinh viên theo học, đến từ mọi miền đất nước và nhiều quốc gia trên thế giới. Trường ĐH Nha Trang đã ba lần được công nhận đạt chuẩn kiểm định quốc gia. Lần thứ nhất, năm 2009, Trường ĐH Nha Trang là một trong 20 trường đại học đầu tiên của cả nước được Hội đồng Quốc gia kiểm định chất lượng giáo dục công nhận đạt tiêu chuẩn chất lượng giáo dục. Lần thứ 2, Trường được Trung tâm Kiểm định chất lượng giáo dục (ĐH Quốc gia TP.HCM)&nbsp;công nhận đạt chuẩn chất lượng giáo dục vào ngày 31/1/2018. Lần thứ 3 vào năm 2023, Trường được Trung tâm Kiểm định Chất lượng giáo dục (ĐH Quốc gia TP.HCM) công nhận. Ngày 15/7/2024 vừa qua, Viện Đổi mới sáng tạo UPM đã công bố kết quả xếp hạng đối sánh theo Bộ tiêu chuẩn của UPM với 8 tiêu chuẩn và 52 tiêu chí. Trường Đại học Nha Trang đã đạt được kết quả tổng thể ở mức 5 sao theo định hướng đổi mới sáng tạo và ứng dụng với 763/1000 điểm. Trong đó, 4/8 lĩnh vực cùng đạt 5 sao. Theo kế hoạch đến năm 2025 toàn bộ các CTĐT Nhà trường đều hoàn thành công tác tự đánh giá và khoảng 50% các CTĐT đã được kiểm định trong nước và quốc tế.</p><p>Hiện nay, Trường ĐH Nha Trang đang đào tạo 60 ngành/chuyên ngành trình độ đại học, 19 ngành trình độ thạc sĩ và 11 ngành trình độ tiến sĩ. Ngoài ra, Trường còn tham gia thực hiện nhiều chương trình đào tạo nghề, các khóa đào tạo ngắn hạn, các chương trình hè… đáp ứng nhu cầu của xã hội. Nguồn lực nhân sự cũng là một thế mạnh của Trường với trên 650 cán bộ giảng viên, trong đó có 31 Giáo sư, Phó Giáo sư; hơn 170 Tiến sĩ; hơn 350 Thạc sĩ, trong đó hơn 40% cán bộ, giảng viên được đào tạo tại các nước phát triển.</p><ul><li><strong>Thông tin người đại diện pháp luật:&nbsp;</strong><a href=\"https://canbo.ntu.edu.vn/NhanSuPublic/PersonelInfo/565\">Ông Quách Hoài Nam – Hiệu trưởng</a></li><li><strong>Người phát ngôn/người đại diện để liên hệ:&nbsp;</strong><a href=\"https://canbo.ntu.edu.vn/NhanSuPublic/PersonelInfo/213\">Ông Phạm Ngọc Bích – Chánh Văn phòng Trường</a></li></ul><p>Trường ĐH Nha Trang cũng đặc biệt chú trọng đến việc mở rộng quan hệ hợp tác trong đào tạo và nghiên cứu khoa học, coi đây là một trong những trọng tâm phát triển của Nhà trường. Trường đã xây dựng nhiều mối quan hệ hợp tác với các đối tác trong và ngoài nước, đặc biệt trong lĩnh vực thuỷ sản, Trường có mối liên hệ với hầu hết các trường, viện có ưu thế về đào tạo, nghiên cứu thuỷ sản trên thế giới. Từ những thành tựu gặt hái trong nhiều năm qua, Trường Đại học Nha Trang &nbsp;tiếp tục bước từng bước vững chắc trên con đường thực hiện sứ mệnh của mình là đào tạo nguồn nhân lực chất lượng cao, chuyển giao công nghệ và cung cấp dịch vụ chuyên môn đa lĩnh vực, đáp ứng nhu cầu phát triển kinh tế xã hội ngày càng cao của đất nước và hội nhập quốc tế.</p><p>Với những đóng góp quan trọng trong đào tạo và nghiên cứu, Trường Đại học Nha Trang đã nhận được nhiều phần thưởng cao quý của Chính phủ như Huân chương Lao động, Huân chương Độc lập, cũng như phần thưởng cao quý nhất - Huân chương Anh hùng Lao động thời kỳ đổi mới.</p><p><strong>Sứ mệnh</strong></p><p>&nbsp; &nbsp; Nghiên cứu khoa học, đào tạo nhân lực trình độ cao và chuyển giao tri thức đa lĩnh vực, chú trọng phát huy thế mạnh lĩnh vực khoa học - công nghệ biển và thủy sản.</p><p><strong>Giá trị cốt lõi</strong></p><p><strong>&nbsp; &nbsp; Tiên phong&nbsp;-&nbsp;Đoàn kết&nbsp;-&nbsp;Hội nhập&nbsp;- Năng động&nbsp;-&nbsp;Trách nhiệm</strong></p><p><strong>Triết lý giáo dục</strong></p><p>&nbsp; &nbsp;&nbsp;<strong>Khai phóng - Dụng hành - Phụng sự</strong></p><ul><li>Khai phóng: Có tư duy độc lập, sáng tạo không ngừng, thích ứng suốt đời.</li><li>Dụng hành: Học đi đôi với hành, gắn kết thực tiễn.</li><li>Phụng sự: Sống có trách nhiệm, vì cộng đồng.</li></ul><p><strong>Tầm nhìn đến năm 2045</strong></p><p>&nbsp; &nbsp; Đến năm 2045 là đại học có thứ hạng cao của Việt Nam; thuộc nhóm đầu các đại học ở Châu Á về một số ngành khoa học - công nghệ biển và thủy sản.</p><p><strong>Ngày đăng: 31/12/2024</strong></p>', NULL, NULL, 1, '2026-06-14 08:38:00', '2026-06-15 01:38:51', '2026-06-15 01:38:51', NULL),
(8, 'Chiến lược phát triển', 'chien-luoc-phat-trien', 5, NULL, '<h2>Chiến lược phát triển đến năm 2030 tầm nhìn 2050</h2>', NULL, 'media/chien-luoc-tam-nhin-250515155521-1781518758-vYYLAz.pdf', 1, '2026-06-14 10:11:00', '2026-06-15 03:12:27', '2026-06-16 02:03:07', NULL),
(9, 'Ban giám hiệu', 'ban-giam-hieu', 10, NULL, NULL, 'media/screenshot-2026-06-17-045308-1781646833-eQGjeR.png', NULL, 1, '2026-06-15 21:53:00', '2026-06-16 14:54:15', '2026-06-16 15:00:37', NULL),
(10, 'Cơ cấu tổ chức', 'co-cau-to-chuc', NULL, NULL, NULL, NULL, NULL, 1, '2026-06-15 21:55:00', '2026-06-16 14:56:21', '2026-06-16 14:56:21', NULL),
(11, 'Lịch sử phát triển', 'lich-su-phat-trien', 5, NULL, NULL, 'media/screenshot-2026-06-17-050631-1781647603-xczkC2.png', NULL, 1, '2026-06-15 22:06:00', '2026-06-16 15:06:50', '2026-06-16 15:06:50', NULL),
(12, 'Thông điệp của Trường Đại học Nha Trang', 'thong-diep-cua-truong-dai-hoc-nha-trang', 5, NULL, '<p><strong>Chào mừng quý vị đến với website Trường Đại học Nha Trang!</strong></p><p>&nbsp; &nbsp; Tiền thân của Trường Đại học Nha Trang là Khoa Thủy sản, thành lập năm 1959 tại Học viện Nông Lâm. Trải qua hơn 65 năm xây dựng và phát triển, trường đã trở thành một trong những cơ sở đào tạo đa ngành, đa lĩnh vực quy mô lớn; là cơ sở nghiên cứu chủ đạo, triển khai ứng dụng công nghệ tiên tiến, đặc biệt trong lĩnh vực thủy sản phục vụ phát triển kinh tế xã hội Khu vực Nam Trung Bộ, Tây Nguyên và trong cả nước.</p><p>&nbsp; &nbsp; Trường Đại học Nha Trang là một trong 20 trường đầu tiên được Hội đồng kiểm định chất lượng giáo dục quốc gia chứng nhận là trường chuẩn chất lượng.</p><p>Hiện nay Trường Đại học Nha Trang đào tạo 11 chuyên ngành tiến sĩ, 19 chuyên ngành thạc sĩ, với 60 ngành/chuyên ngành trình độ đại học. Nhà trường hiện có hơn 650 cán bộ giảng dạy, nghiên cứu trong đó có 31 Giáo sư, Phó Giáo sư; hơn 170 Tiến sĩ và 350 Thạc sĩ, trong đó có trên 40% được đào tạo ở các nước phát triển. Nhà trường không ngừng mở rộng quy mô đào tạo, nâng cao cơ sở vật chất, đổi mới chương trình, phương pháp dạy và học để từng bước trở thành trường đại học định hướng ứng dụng đa lĩnh vực, hướng đến đại học định hướng nghiên cứu.</p><p>&nbsp; &nbsp; Với bề dày truyền thống, Trường Đại học Nha Trang luôn mong muốn mở rộng hợp tác với các trường, viện trong nước và trên thế giới, các tổ chức quốc tế về đào tạo, nghiên cứu khoa học và chuyển giao công nghệ nhằm tưng bước hòa nhập với nền giáo dục tiên tiến của thế giới, đáp ứng nhu cầu hội nhập phát triển kinh tế - xã hội của đất nước.</p>', NULL, NULL, 1, '2026-06-15 22:09:00', '2026-06-16 15:09:13', '2026-06-16 15:09:13', NULL),
(13, 'Cơ sở vật chất', 'co-so-vat-chat', 5, NULL, '<p>Tọa lạc tại thành phố biển đẹp nhất Việt Nam, được bao quanh bởi một trong những vịnh đẹp nhất thế giới - Vịnh Nha Trang, cơ sở chính của Trường Đại học Nha Trang (NTU) có vị trí đẹp nhất so với các trường đại học khác tại Việt Nam. Ngoài cơ sở chính 20 ha, NTU còn có một số cơ sở khác như Trại nuôi trồng thủy sản thực nghiệm nước mặn Cam Ranh, Trại thực nghiệm nước ngọt Ninh Phụng, Xưởng đóng tàu tại Phước Đồng và Trung tâm Giáo dục Quốc phòng và An ninh tại Cam Lâm với tổng diện tích trên 50 ha.</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/khuan-vien-dh-nha-trang.JPG\" alt=\"Khuân viên hơn 20 ha của trường Đại học Nha Trang\" width=\"891\" height=\"496\"></p><p>Hiện nay, Trường ĐHNT có 8 khu nhà giảng đường với tổng số 120 phòng học, trong đó 100% đã được trang bị phương tiện dạy học hiện đại. Các cơ sở này đủ điều kiện để tổ chức hội thảo, hội nghị quốc tế và hội nghị truyền hình trực tuyến. NTU có 120 phòng trên diện tích 15.000 m2, có khả năng cung cấp đồng thời 6.000 chỗ cho sinh viên.</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/giang-duong-g1.JPG\" alt=\"Giảng đường G1 Đại học Nha Trang\" width=\"600\" height=\"448\"></p><p><img src=\"https://ntu.edu.vn/uploads/6/images/giang-duong/giang-duong-g2-dhnt.jpg\" alt=\"Giảng đường G2\" width=\"600\" height=\"400\"></p><p><img src=\"https://ntu.edu.vn/uploads/6/images/giang-duong/giang-duong-g3-dhnt.jpg\" alt=\"Giảng đường G3 Trường Đại học Nha Trang\" width=\"600\" height=\"338\"></p><p><img src=\"https://ntu.edu.vn/uploads/6/images/giang-duong/giang-duong-g5-dhnt.jpg\" alt=\"Giảng đường G5 Đại học Nha Trang\" width=\"600\" height=\"400\"></p><p><img src=\"https://ntu.edu.vn/uploads/6/images/giang-duong/giang-duong-g7.jpg\" alt=\"Giảng đường G7 Trường Đại học Nha Trang\" width=\"600\" height=\"400\"></p><p><img src=\"https://ntu.edu.vn/uploads/6/images/giang-duong/giang-duong-g8-dhnt.jpg\" alt=\"Giảng đường G8 Đại học Nha Trang\" width=\"600\" height=\"400\"></p><p>Thư viện của NTU bao gồm 3 tòa nhà trong đó có 7 phòng đọc với tổng số 1.000 chỗ ngồi, 2 kho sách và phòng tạp chí để truy cập Internet và cơ sở dữ liệu đa phương tiện.</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/thu-vien-dh-nha-trang.jpeg\" alt=\"Thư viện trường Đại học Nha Trang\" width=\"800\" height=\"487\"></p><p>Thư viện có một lượng lớn tài liệu và tài nguyên bao gồm 18.000 đầu sách khác nhau (46.000 bản), trong đó 23.000 bản bằng tiếng nước ngoài. Gần 3.500 luận án và 300 loại báo, tạp chí trong nước và quốc tế. Thư viện cũng có một cơ sở dữ liệu điện tử gồm 4.000 cuốn sách và hàng trăm nghìn tài liệu tham khảo có bản quyền được cung cấp theo đường dẫn trực tuyến. Nguồn thông tin được cập nhật hàng năm với 2.000 đầu sách mới (5.000 bản).</p><h3><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/ky-tuc-xa-dh-nha-trang.JPG\" alt=\"\" width=\"250\" height=\"164\">Ký túc Xá</h3><p>Hệ thống Ký túc xá bao gồm 8 tòa nhà (K1 -K8), được thiết kế xây dựng đặt trong Khuôn viên Trường. Nhà trường có&nbsp;405 phòng ở nội trú với sức chứa hơn 2,682 chỗ, luôn là nơi rất thuận tiện cho việc sinh hoạt, học tập của Sinh viên.</p><p>Ký túc xá Sau Đại học và Ký túc xá dành cho sinh viên xuất sắc. Tất cả các ký túc xá đều được trang bị tốt và nằm bên trong khuôn viên chính. Sinh viên có thể đến ký túc xá bằng cách đi bộ từ bất kỳ tòa nhà nào trong khuôn viên trường. Nó cũng có các cơ sở phụ như nhà ăn, phòng giặt, phòng học, sân vận động trong nhà và ngoài trời và phòng tập thể dục, phòng chơi bóng bàn, và các phòng sinh hoạt chung, Wifi và Internet được cung cấp miễn phí tại tất cả các ký túc xá và các tòa nhà trong khuôn viên trường.</p><p><i><strong>♦&nbsp;Phòng tập thể dục</strong></i></p><p>Nhà thi đấu NTU là khu thể thao phức hợp. Nó bao gồm một sân vận động trong nhà với 800 chỗ ngồi cho bóng đá, và hai sân cho bóng chuyền và cầu thủ bóng rổ. Sinh viên và các khoa có thể đến và thưởng thức các môn thể thao yêu thích của họ bất cứ lúc nào trong ngày. Nhiều sự kiện quan trọng như thi đấu thể thao toàn quốc, ngày kỷ niệm trường ĐHNT, ngày nhà giáo Việt Nam đã diễn ra tại nhà thi đấu.</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/nha-thi-dau.jpg\" alt=\"Nhà thi đấu đa năng trường đại học Nha Trang\" width=\"700\" height=\"466\"></p><p><i><strong>♦&nbsp;Sân vận động</strong></i></p><p>Một sân vận động ngoài cửa tiêu chuẩn mới đã được hoàn thành gần đây với cỏ nhân tạo. Với sức chứa 500 chỗ ngồi, sân sẽ là địa điểm hấp dẫn tổ chức các sự kiện thể thao quan trọng, không chỉ cho sinh viên, cán bộ trường ĐHNT mà còn cho các tuyển thủ thể thao chuyên nghiệp tỉnh Khánh Hòa và các tỉnh Nam Trung bộ.</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/san-bong-da-dh-nha-trang.JPG\" alt=\"Sân bóng đá tại Đại học Nha Trang\" width=\"700\" height=\"463\"></p><p>Hơn nữa:<br><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/phong-thi-nghiem-cong-nghe-cao.JPG\" alt=\"Phòng thí nghiệm Việc Công nghệ sinh học và Môi trường\" width=\"600\" height=\"398\"></p><p>NTU sở&nbsp;hữu 50 phòng thí nghiệm bao gồm nhiều lĩnh vực như hóa học, sinh học thực nghiệm, công nghệ sinh học, hóa sinh, vi sinh, ngư cụ hàng hải, động cơ tàu, hàng hải và hàng hải, công nghệ thực phẩm, kỹ thuật điện lạnh và sản xuất. Tất cả đều được trang bị các thiết bị hiện đại đủ khả năng phục vụ sinh viên và nghiên cứu viên tiến hành và thực hiện các đề tài nghiên cứu các cấp.</p>', NULL, NULL, 1, '2026-06-15 22:13:00', '2026-06-16 15:13:27', '2026-06-16 15:13:27', NULL),
(14, 'Ba công khai', 'ba-cong-khai', 5, NULL, '<h2>BA CÔNG KHAI</h2><p>(1) Công khai cam kết chất lượng giáo dục và chất lượng thực tế, (2) Công khai điều kiện đảm bảo chất lượng, (3) Công khai tài chính</p><p><strong>Năm học 2025-2026</strong></p><p><i><strong>Thực hiện Thông tư số 09/2024/TT-BGDĐT ngày 03 tháng 6 năm 2024 của Bộ Giáo dục và Đào tạo Quy định về công khai trong hoạt động của các cơ sở giáo dục thuộc hệ thống giáo dục quốc dân, Trường Đại học Nha Trang&nbsp;thực hiện công khai các nội dung năm học 2025 - 2026 như sau:</strong></i></p><p>THÔNG TIN CÔNG KHAI TRƯỜNG ĐẠI HỌC NHA TRANG NĂM HỌC <a href=\"https://ntu.edu.vn/uploads/56/316-di%E1%BB%81u%20ch%E1%BB%89nh_TH%C3%94NG%20TIN%20C%C3%94NG%20KHAI%20TR%C6%AF%E1%BB%9CNG%20%C4%90%E1%BA%A0I%20H%E1%BB%8CC%20NHA%20TRANG%20N%C4%82M%20H%E1%BB%8CC%202025.pdf\">2025 -2026</a>&nbsp;(tính đến 30/6/2025)</p><p><a href=\"https://ntu.edu.vn/uploads/6/files/Cong-khai/tai-chinh/1-NQ50%20DMKTKT%20DAI%20HOC.pdf\">Định mức kinh tế - kỹ thuật các chương trình đào tạo đại học Nghị quyết</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/6/files/Cong-khai/tai-chinh/1-NQ%2050-Nghi%20Quyet%20ban%20hanh%20dinh%20muc%20KTKT.pdf\">Danh mục</a></p><p><strong>Năm học 2024-2025</strong></p><p>1. Kiểm định tiêu chuẩn chất lượng giáo dục (<a href=\"https://ntu.edu.vn/Uploads/56/QD%20108_TTKD%20(31.7.23)%20Cong%20nhan%20Truong%20DHNT%20dat%20tieu%20chuan%20chat%20luong%20giao%20duc.pdf\">Quyết định</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/GCN%20KDCL%20Truong%20DHNT%20(chu%20ky%202).pdf\">Chứng nhận</a>)</p><p>2. Công khai tài chính năm học 2023 - 2024 (<a href=\"https://ntu.edu.vn/Uploads/56/C%C3%94NG%20KHAI%20D%E1%BB%B0%20TO%C3%81N%202024.pdf\">dự toán năm 2024</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/C%C3%94NG%20KHAI%20NSNN%20Q.1-2024%20M%E1%BB%9AI.pdf\">NSNN quý I</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/C%C3%94NG%20KHAI%20NSNN%20Q.2-2024%20M%E1%BB%9AI.pdf\">NSNN quý II&nbsp;</a>|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/C%C3%94NG%20KHAI%20NSNN%206%20TH%C3%81NG-2024%20M%E1%BB%9AI.pdf\">NSNN 6 tháng đầu năm</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/C%C3%94NG%20KHAI%20NSNN%20Q.3-2024.pdf\">NSNN quý III</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/C%C3%94NG%20KHAI%20T%C3%80I%20CH%C3%8DNH%20GI%C3%81O%20D%E1%BB%A4C%202023.pdf\">Biểu mẫu 21</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/C%C3%94NG%20KHAI%20QUY%E1%BA%BET%20TO%C3%81N%202023.pdf\">quyết toán năm 2023</a>)</p><p>3. Công khai thông tin cơ sở vật chất năm học 2023-2024 (<a href=\"https://ntu.edu.vn/Uploads/56/bi%E1%BB%83u%20m%E1%BA%ABu%2019_NH%2024-25.pdf\">biểu mẫu 19</a>)</p><p>4. Công khai thông tin đội ngũ giảng viên cơ hữu năm học 2023-2024&nbsp; (<a href=\"https://ntu.edu.vn/Uploads/56/bi%E1%BB%83u%20m%E1%BA%ABu%2020_NH%2024-25%20-%20Copy%201.pdf\">biểu mẫu 20</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/Bi%E1%BB%83u%20m%E1%BA%ABu%2020a%20c%E1%BA%ADp%20nh%E1%BA%ADt%2028.6.pdf\">biểu mẫu 20a</a>)</p><p>5.&nbsp;Công khai cam kết chất lượng đào tạo của Trường Đại học Nha Trang năm học 2022-2023 (<a href=\"https://ntu.edu.vn/Uploads/56/Bi%E1%BB%83u%20m%E1%BA%ABu%2017_NH%2024-25.pdf\">biểu mẫu 17</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/t%E1%BB%95ng%20h%E1%BB%A3p%20BM%2018_NH%2024-25.pdf\">biếu mẫu 18</a>)</p><p>6.<a href=\"https://ntu.edu.vn/Uploads/56/1.4%20li%C3%AAn%20k%E1%BA%BFt%20h%E1%BB%A3p%20t%C3%A1c.pdf\">&nbsp;</a><a href=\"https://ntu.edu.vn/Uploads/56/%C4%91%C3%A0o%20t%E1%BA%A1o%20b%E1%BB%93i%20d%C6%B0%E1%BB%A1ng.pdf\">Công khai các liên kết hợp tác&nbsp;và&nbsp;Đào tạo bồi dưỡng</a></p><p>7. Danh mục minh chứng (<a href=\"https://ntu.edu.vn/uploads/56/dhnt_DMMC%20ct%C4%91t%20QLTS_02.04.2024.pdf\">QLTS</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/dhnt_DMMC%20ct%C4%91t%20CNTP_02.04.24.pdf\">CNTP</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/dhnt_DMMC%20ct%C4%91t%20QTDVDL&amp;LH_02.04.24.pdf\">QTDL&amp;LH</a>&nbsp;|<a href=\"https://ntu.edu.vn/uploads/56/dhnt_DMMC%20ct%C4%91t%20Ky%20thuat%20co%20khi_08.2024.pdf\">&nbsp;KTCK</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt-DMMC%20ctdt_Ky%20thuat%20Oto_08.2024.pdf\">KTOT</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt_DMMC%20ctdt%20Ky%20thuat%20xay%20dung_08.2024.pdf\">KTXD</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt_DMMC%20ctdt%20Kinh%20doanh%20thuong%20mai_08.2024.pdf\">KDTM</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt_DMMC%20ctdt%20Tai%20chinh%20ngan%20hang_08.2024.pdf\">TCNH</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt_DMMC%20ctdt%20Ngon%20ngu%20Anh_08.2024.pdf\">NNA</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt_DMMC%20ctdt%20Ky%20thuat%20dien%20(2020-2024).pdf\">KTD</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">)</a></p><p>8. Báo cáo tự đánh giá&nbsp;(<a href=\"https://ntu.edu.vn/uploads/56/dhnt_bctdg%20ct%C4%91t%20QLTS_02.04.2024.pdf\">QLTS</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/dhnt_bctdg%20ct%C4%91t%20CNTP_02.4.2024.pdf\">CNTP</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/dhnt_bctdg%20ct%C4%91t%20QTDVDL&amp;LH_02.04.24.pdf\">QTDL&amp;LH</a>&nbsp;|<a href=\"https://ntu.edu.vn/uploads/56/dhnt_bctdg%20ctdt%20Ky%20thuat%20co%20khi_08.2024.pdf\">KTCK</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt_bctdg%20ctdt_Ky%20thuat%20Oto_08.2024.pdf\">KTOT</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt_bctdg%20ctdt%20Ky%20thuat%20xay%20dung_08.2024.pdf\">KTXD</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt_bctdg%20ctdt%20Kinh%20doanh%20thuong%20mai_08.2024.pdf\">KDTM</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt_bctdg%20ctdt%20Tai%20chinh%20Ngan%20hang_08.2024.pdf\">TCNH</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt_bctdg%20ctdt%20Ngon%20ngu%20Anh_08.2024.pdf\">NNA</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/dhnt_bctdg%20ctdt%20Ky%20thuat%20dien%20(2020-2024).pdf\">KTD</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">)</a></p><p>9. Chứng nhận&nbsp;(<a href=\"https://ntu.edu.vn/uploads/56/QLTS.pdf\">QLTS</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/CNTP.pdf\">CNTP</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">QTDL&amp;LH|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/1-GCN%20KDCL%20KTCK-NTU.pdf\">KTCK</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/2-GCN%20KDCL%20KTOT-NTU.pdf\">KTOT</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/3-GCN%20KDCL%20KTXD-NTU.pdf\">KTXD</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/4-GCN%20KDCL%20KDTM-NTU.pdf\">KDTM</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/5-GCN%20KDCL%20TCNH-NTU.pdf\">TCNH</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/6-GCN%20KDCL%20NNA-NTU.pdf\">NNA</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">&nbsp;|&nbsp;</a><a href=\"https://ntu.edu.vn/uploads/56/7-GCN%20KDCL%20KTD-NTU.pdf\">KTD</a><a href=\"https://ntu.edu.vn/uploads/56/QT%20DLLH.pdf\">)</a></p><p>10. Quyết định&nbsp;(<a href=\"https://ntu.edu.vn/uploads/56/Q%C4%90%20354_QLTS.pdf\">QLTS</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/QD355_CNTP.pdf\">CNTP</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/QD356_QTDVDLLH.pdf\">QTDL&amp;LH</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/1.%20QD%20cong%20nhan%20va%20cap%20GCN-KTCK-NTU.pdf\">KTCK</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/2.%20QD%20cong%20nhan%20va%20cap%20GCN-KTOT-NTU.pdf\">KTOT</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/3.%20QD%20cong%20nhan%20va%20cap%20GCN-KTXD-NTU.pdf\">KTXD</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/4.%20QD%20cong%20nhan%20va%20cap%20GCN-KDTM-NTU.pdf\">KDTM</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/5.%20QD%20cong%20nhan%20va%20cap%20GCN-TCNH-NTU.pdf\">TCNH</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/6.%20QD%20cong%20nhan%20va%20cap%20GCN-NNA-NTU.pdf\">NNA</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/7.%20QD%20CN%20va%20cap%20GCN-KTD-NTU.pdf\">KTD</a>&nbsp;)</p><p>11. Thông báo về việc lựa chọn tổ chức đấu giá tài sản (<a href=\"https://ntu.edu.vn/uploads/6/van-ban/TB%201331.pdf\">Số 1331/TB-ĐHNT ngày 26/12/2024</a>)</p><p>12.&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/B%C3%81O%20C%C3%81O%20TH%C6%AF%E1%BB%9CNG%20NI%C3%8AN%20N%C4%82M%202024.pdf\">Báo cáo thường niên năm 2024</a></p><p><strong>Năm học 2023-2024</strong></p><p>1. Kiểm định tiêu chuẩn chất lượng giáo dục (<a href=\"https://ntu.edu.vn/Uploads/56/QD%20108_TTKD%20(31.7.23)%20Cong%20nhan%20Truong%20DHNT%20dat%20tieu%20chuan%20chat%20luong%20giao%20duc.pdf\">quyết định</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/Bao%20cao%20TDG%20Truong%20%C4%90HNT%20giai%20doan%202018-2022.pdf\">Báo cáo tự đánh giá</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/Danh%20muc%20MC_Kiem%20dinh%20Truong%20DHNT%20giai%20doan%202018-2022.pdf\">Minh chứng&nbsp;</a>|<a href=\"https://ntu.edu.vn/Uploads/56/GCN%20KDCL%20Truong%20DHNT%20(chu%20ky%202).pdf\">Chứng nhận</a>)</p><p>2. Công khai tài chính năm học 2023 - 2024 (<a href=\"https://ntu.edu.vn/Uploads/56/C%C3%94NG%20KHAI%20D%E1%BB%B0%20TO%C3%81N%202023.pdf\">dự toán 2023</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/C%C3%94NG%20KHAI%20QUY%E1%BA%BET%20TO%C3%81N%202022.pdf\">quyết toán 202</a>2 |&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/C%C3%94NG%20KHAI%20T%C3%80I%20CH%C3%8DNH%20GI%C3%81O%20D%E1%BB%A4C%202022.pdf\">tài chính giáo dục 2022</a>)</p><p>3. Công khai thông tin cơ sở vật chất năm học 2023-2024 (<a href=\"https://ntu.edu.vn/Uploads/56/t%E1%BB%95ng%20h%E1%BB%A3p%20bi%E1%BB%83u%20m%E1%BA%ABu%2019.pdf\">biểu mẫu 19</a>)</p><p>4. Công khai thông tin đội ngũ giảng viên cơ hữu năm học 2023-2024&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/T%E1%BB%95ng%20h%E1%BB%A3p%20Bi%E1%BB%83u%20m%E1%BA%ABu%2020.pdf\">(biểu mẫu 20&nbsp;</a>|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/bi%E1%BB%83u%20m%E1%BA%ABu%2020a%20n%C4%83m%2023-24.pdf\">biểu mẫu 20a</a>)</p><p>5.&nbsp;Công khai cam kết chất lượng đào tạo của Trường Đại học Nha Trang năm học 2022-2023 (<a href=\"https://ntu.edu.vn/Uploads/56/T%E1%BB%95ng%20h%E1%BB%A3p%20Bi%E1%BB%83u%20m%E1%BA%ABu%2017_NH%2023-24%20.pdf\">Biểu mẫu 17</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/t%E1%BB%95ng%20h%E1%BB%A3p%20bi%E1%BB%83u%20m%E1%BA%ABu%2018%20-%20Copy%201.pdf\">Biểu mẫu 18</a>)</p><p>6.<a href=\"https://ntu.edu.vn/Uploads/56/1.4%20li%C3%AAn%20k%E1%BA%BFt%20h%E1%BB%A3p%20t%C3%A1c.pdf\">&nbsp;Công khai các liên kết hợp tác</a>&nbsp;(<a href=\"https://ntu.edu.vn/Uploads/56/MINHCHUNG2023.rar\">minh chứng</a>)&nbsp;và&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/tao%20boi%20duong%202022-2023%20va%202%20nam%20tiep%20theo.pdf\">Đào tạo bồi dưỡng</a></p><p>7. Giấy chứng nhận&nbsp;KDCL CTDT (<a href=\"https://ntu.edu.vn/Uploads/56/GCN%20KDCL%20CTDT%20QTKS%20(28.4.2023).pdf\">QTKS</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/GCN%20KDCL%20CTDT%20QTKD%20(28.4.2023).pdf\">QTKD</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/GCN%20KDCL%20CTDT%20KE%20TOAN%20(28.4.2023).pdf\">KẾ TOÁN</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/GCN%20KDCL%20CTDT%20CNTT%20(28.4.2023).pdf\">CNTT</a>)</p><p>8. Quyết định&nbsp;KDCLGDTL&nbsp;(<a href=\"https://ntu.edu.vn/Uploads/56/203.QD.KDCLGDTL-Cong%20nhan%20va%20cap%20GCN%20CTDT%20NTU%20QTKS.pdf\">QTKS</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/200.QD.KDCLGDTL-Cong%20nhan%20va%20cap%20GCN%20CTDT%20NTU%20QTKD.pdf\">QTKD</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/201.QD.KDCLGDTL-Cong%20nhan%20va%20cap%20GCN%20CTDT%20NTU%20KT.pdf\">KẾ TOÁN</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/202.QD.KDCLGDTL-Cong%20nhan%20va%20cap%20GCN%20CTDT%20NTU%20CNTT.pdf\">CNTT</a>)</p><p>9. Nghị quyết&nbsp;HDKDCLGD&nbsp;(<a href=\"https://ntu.edu.vn/Uploads/56/8_NQ%20tham%20dinh%20ket%20qua%20DGCL%20CTDT%20QTKS.pdf\">QTKS&nbsp;</a>|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/01.NQ.HDKDCLGD-Tham%20dinh%20CTDT%20NTU%20QTKD.pdf\">QTKD</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/02.NQ.HDKDCLGD-Tham%20dinh%20CTDT%20NTU%20KT.pdf\">KẾ TOÁN</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/03.NQ.HDKDCLGD-Tham%20dinh%20CTDT%20NTU%20CNTT.pdf\">CNTT</a>)</p><p><strong>Năm học 2022-2023</strong></p><p>1. Công khai cam kết chất lượng đào tạo của Trường Đại học Nha Trang năm học 2022-2023&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/files/1_Bi%E1%BB%83u%20m%E1%BA%ABu%2017_NH%2022-23(1).pdf\">Biểu mẫu 17</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/files/2_Bi%E1%BB%83u%20m%E1%BA%ABu%2018_NH%2022-23(1).pdf\">Biểu mẫu 18</a></p><p>2. Công khai thông tin cơ sở vật chất của Trường&nbsp;Đại học Nha Trang năm học 2022-2023&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/files/3_bi%E1%BB%83u%20m%E1%BA%ABu%2019_NH%2022-23.pdf\">Biểu mẫu 19</a></p><p>3. Công khai thông tin đội ngũ giảng viên cơ hữu của Trường&nbsp;Đại học Nha Trang năm học 2022-2023&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/files/5_Bieu%20mau%2020a-NH22-23.pdf\">Biểu mẫu 20A</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/files/Bi%E1%BB%83u%20m%E1%BA%ABu%2020_new_NH%2022-23.pdf\">Biểu mẫu 20</a>&nbsp;|&nbsp;<a href=\"https://ntu.edu.vn/uploads/56/files/kh%C3%A1c.pdf\">Khác</a></p><p>4.&nbsp; Công khai tài chính của Trường&nbsp;Đại học Nha Trang năm học 2022-2023&nbsp;<a href=\"https://ntu.edu.vn/Uploads/56/C%C3%94NG%20KHAI%20T%C3%80I%20CH%C3%8DNH%20GI%C3%81O%20D%E1%BB%A4C%202022.pdf\">Biểu mẫu 21</a>&nbsp;|<a href=\"https://ntu.edu.vn/Uploads/56/C%C3%94NG%20KHAI%20QUY%E1%BA%BET%20TO%C3%81N%20NSNN%202021%20-%20Copy%201.pdf\">&nbsp;Công khai quyết toán</a>&nbsp;2021</p><p>5. Quyết định ban hành định mức sử dụng máy móc thiết bị năm 2023&nbsp;<a href=\"https://ntu.edu.vn/Uploads/6/files/Cong-khai/tai-chinh/DINH%20MUC%20THIET%20BI%20THEO%20QD%20268.pdf\"><i>Chi tiết</i></a></p><p>6. Quyết định ban hành định mức sử dụng máy móc thiết bị năm 2021&nbsp;<a href=\"https://ntu.edu.vn/Uploads/6/files/Cong-khai/tai-chinh/Q%C4%90%20374-Danh-muc-dinh-muc%20TB.pdf\"><i>Chi tiết</i></a></p><p>7.&nbsp;<a href=\"https://ntu.edu.vn/uploads/6/files/Tap-tin-pdf/1-QD-1268-ngay-26-11-2021-quy-che-quan-ly-va-su-dung-tai-khoan-cong-cua-dhnt.pdf\">Quy chế Quản lý và sử dụng tài khoản công của Trường đại Học Nha Trang</a></p>', NULL, NULL, 1, '2026-06-15 22:14:00', '2026-06-16 15:15:38', '2026-06-16 15:15:38', NULL),
(15, 'Chỉ đường đến NTU', 'chi-duong-den-ntu', 5, NULL, '<h3>Bằng cách nào tôi đến được Đại học Nha Trang</h3><p>Cơ sở chính của Trường Đại học Nha Trang (NTU) tọa lạc trên bãi biển dài của thành phố Nha Trang. Đây là thành phố thủ phủ của tỉnh Khánh Hòa, một vùng đất giàu lịch sử và văn hóa. Thành phố nằm ở phía nam của miền Trung Việt Nam, cách thành phố Hồ Chí Minh khoảng 440 km về phía bắc, cách thủ đô Hà Nội của Việt Nam 1280 km về phía nam.</p><h4>1. Đến Đại học Nha Trang bằng máy bay</h4><p><img src=\"https://en.ntu.edu.vn/portals/0/userfiles/196/vietnam%20airlines.jpg?ver=2020-04-13-232206-333\" alt=\"\" width=\"650\" height=\"433\"></p><p>Hầu hết các hãng hàng không quốc tế đều có đường bay đến Hà Nội, Hồ Chí Minh hoặc Đà Nẵng. Từ một trong những thành phố này, các hãng hàng không địa phương (Vietnam Airlines, Vietjet Air, Jetstar Pacific, Bamboo Airways) có thể kết nối bạn đến Nha Trang (sân bay Cam Ranh). Các hãng hàng không này cung cấp các chuyến bay hàng ngày. Gần đây, do nhu cầu của du khách quốc tế tăng cao, nhiều chuyến bay thẳng quốc tế đã được kết nối đến sân bay Cam Ranh như từ Trung Quốc, Nga, Hàn Quốc,… Bạn có thể tham khảo thời gian bay cũng như giá vé máy bay qua https://www.traveloka.com / en-vn /</p><p>Từ sân bay Cam Ranh, bạn có thể đến Trường Đại học Nha Trang bằng taxi hoặc xe buýt của sân bay. Bạn mất khoảng 45 phút di chuyển.</p><h4>2. Đến Đại học Nha Trang bằng tàu hỏa</h4><p><img src=\"https://en.ntu.edu.vn/portals/0/userfiles/196/Tau%20lua.jpg?ver=2020-04-13-232206-333\" alt=\"\" width=\"650\" height=\"364\"></p><p>Đường sắt Việt Nam cung cấp các chuyến tàu từ các thành phố như Hà Nội (24 giờ), Đà Nẵng (10 giờ) và Hồ Chí Minh (7 giờ) đến Thành phố Nha Trang. Ga Nha Trang nằm ở trung tâm Thành phố Nha Trang. Từ ga Nha Trang, bạn có thể đến trường Đại học Nha Trang bằng taxi hoặc xe buýt trong vòng 15 phút. Dịch vụ với nhiều dịch vụ và mức độ tiện nghi đi từ Bắc vào Nam của Việt Nam và ngược lại, dừng ở tất cả các thành phố trên tuyến. Bạn có thể truy cập webiste của Công ty Đường sắt Việt Nam: https://dsvn.vn/#/</p><h4>3. Đến Đại học Nha Trang bằng xe buýt nhanh</h4><p><img src=\"https://en.ntu.edu.vn/portals/0/userfiles/196/xe-nam-phuong.jpg?ver=2020-04-13-232206-397\" alt=\"\" width=\"650\" height=\"390\"></p><ul><li>Từ thành phố Hồ Chí Minh, bạn mất khoảng 9 giờ để đến trường Đại học Nha Trang.</li><li>Từ Hà Nội, mất khoảng 26 giờ để đến Đại học Nha Trang.</li><li>Từ Đà Nẵng, mất khoảng 12 giờ để đến Đại học Nha Trang.</li><li>Có nhiều lựa chọn cho sự lựa chọn của bạn. Sau đây là các công ty xe buýt đáng tin cậy cho việc đi lại của bạn:<ul><li>Du lịch Phương Nam</li><li>Phương Trang Express (FUTA Express)</li><li>Quang Hanh</li><li>Huỳnh Gia</li><li>Cúc Tùng Limousine</li><li>Thịnh Phát Limousine</li></ul></li></ul><h4>4. Di chuyển từ trung tâm thành phố đến NTU</h4><p><strong>4.1 Bằng xe buýt</strong></p><p>Nhìn chung, hệ thống xe buýt ở thành phố Nha Trang rẻ, máy lạnh, giá cả dễ chịu. Hiện tại, có 6 dòng. Các dòng 4, 5 và 6 có thể đưa bạn đến gần trường Đại học.</p><p><img src=\"https://en.ntu.edu.vn/portals/0/userfiles/196/xe-bus-Nha-Trang.jpg?ver=2020-04-13-233251-300\" alt=\"\" width=\"650\" height=\"505\"></p><p>Tuyến xe buýt số 4: Dương Hiến Quyền - Nguyễn Thiện Thuật - Vinpearl</p><p>Thời gian hoạt động: 5:10 đến 19:10</p><p>Thời lượng hành trình: 45 phút / lượt.</p><p>Lộ trình: Dương Hiến Quyền (gần Đại học Viễn Thông) → Phạm Văn Đồng (Đại học Khánh Hòa) → Hòn Chồng → Tháp Bà → đường 2/4 → Quang Trung (Bệnh viện Đa khoa) → Lý Thánh Tôn → Ngã tư (Nhà thờ Núi) → Lê Thành Tôn → Nguyễn Thiện Thuật → Trần Quang Khải → 86 Trần Phú → 96 Trần Phú (Đầu hẻm vào khách sạn Queen) → Cầu Đá (Viện Hải Dương Học) → Cảng Vinpearl và ngược lại.</p><p>Tuyến buýt số 5: Cầu Trần Phú - Tô Hiến Thành - Hòn Rớ</p><p>Thời gian hoạt động: 5:20 đến 18:35</p><p>Thời lượng hành trình: 35 phút / lượt.</p><p>Lộ trình: Phía Bắc cầu Trần Phú (Gần Đại học Nha Trang → Nguyễn Bỉnh Khiêm → Ngô Quyền → Phan Chu Trinh (Chiều về: Hoàng Văn Thụ - Lê Lợi) → Hoàng Hoa Thám → Nguyễn Chánh → Lê Thánh Tôn (Chiều về : Đinh Tiên Hoàng) → Tô Hiến Thành → Nguyễn Thị Minh Khai → 96 Trần Phú (Đầu hẻm vào khách sạn Queen) → Dã Tượng → Võ Thị Sáu → Phước Long → Lê Hồng Phong → Đại lộ Nguyễn Tất Thành → Cầu Bình Tân → Hòn Rớ 1 và ngược lại.</p><p>Tuyến xe buýt số 6: Siêu thị Big C - Bến xe phía Bắc - Chợ Lương Sơn</p><p>Thời gian hoạt động: 5:20 đến 19:00</p><p>Thời lượng hành trình: 45 phút / lượt.</p><p>Lộ trình: Siêu thị Big C → đường 23/10 → Yersin → Quang Trung → đường 2/4 → Bến xe phía Bắc → Nguyễn Xiển → Trường Cao đẳng Sư phạm Quốc gia Nha Trang → Nhà máy Sợi → Quốc lộ 1A → chợ Lương Sơn và ngược lại.</p><p><strong>4.2 Bằng Grab</strong></p><p>Có được một chuyến đi an toàn và đáng tin cậy trong vài phút với Grab (trước đây là GrabTaxi). Với đội ngũ tài xế lớn nhất tại Nha Trang, Grab cung cấp dịch vụ đặt taxi, ô tô cá nhân hoặc xe máy nhanh nhất.</p><p><img src=\"https://en.ntu.edu.vn/portals/0/userfiles/196/Grab.jpg?ver=2020-04-13-232206-287\" alt=\"\" width=\"650\" height=\"433\"></p><p>Có rất nhiều phương án cho bạn lựa chọn khi muốn đi bất cứ đâu tại Thành phố Nha Trang.</p><p>* GrabTaxi: Đặt taxi bình dân hoặc taxi cao cấp từ mạng lưới tài xế lớn nhất Đông Nam Á.</p><p>* GrabCar: Đi xe hơi thoải mái và thanh toán một khoản phí cố định đã được thỏa thuận trước.</p><p>* GrabBike: Di chuyển quanh thành phố một cách đơn giản và nhanh chóng nhất có thể.</p><p><strong>4.3 Bằng taxi</strong></p><p><img src=\"https://en.ntu.edu.vn/portals/0/userfiles/196/taxi%20asia.jpg?ver=2020-04-13-232206-320\" alt=\"\" width=\"650\" height=\"397\"></p><p>Taxi ở Nha Trang thường có đồng hồ tính tiền, giá cả nhìn chung khá hợp lý. Có một số công ty nổi bật:</p><p>Mai Linh (Green taxi): (0258) 38 38 38 38</p><p>Quốc Tế (Taxi xanh): (0258) 3 52 52 52</p><p>Châu Á (Taxi vàng): (0258) 35 35 35 35</p><p>Vinasun (Taxi xanh trắng): (0258) 38 27 27 27</p>', NULL, NULL, 1, '2026-06-15 22:17:00', '2026-06-16 15:17:22', '2026-06-16 15:17:22', NULL),
(16, 'Hội đồng Khoa học và Đào tạo Trường', 'hoi-dong-khoa-hoc-va-dao-tao-truong', 10, NULL, '<p><strong>Chức năng của Hội đồng</strong></p><p>Hội đồng Khoa học và Đào tạo Trường Đại học Nha Trang (viết tắt là Hội đồng) là tổ chức tư vấn về lĩnh vực: đào tạo, khoa học công nghệ và đổi mới sáng tạo, phát triển đội ngũ và bảo đảm chất lượng.</p><p><strong>Nhiệm vụ của Hội đồng</strong></p><p>Hội đồng có nhiệm vụ tư vấn về các lĩnh vực:</p><p><strong>1. Đào tạo</strong></p><p>a) Định hướng và kế hoạch phát triển đào tạo;</p><p>b) Triết lý giáo dục, mục tiêu giáo dục, chính sách, quy chế, quy định về đào tạo;</p><p>c) Mở ngành, chuyên ngành đào tạo, triển khai và hủy bỏ các chương trình đào tạo.</p><p><strong>2.&nbsp;Khoa học và công nghệ</strong></p><p>a) Định hướng và kế hoạch phát triển khoa học, công nghệ và đổi mới sáng tạo;</p><p>b) Chính sách, quy chế, quy định về khoa học, công nghệ và đổi mới sáng tạo;</p><p><strong>3. Phát triển đội ngũ</strong></p><p>a) Định hướng và kế hoạch phát triển đội ngũ giảng viên, nghiên cứu viên và người lao động của Nhà trường;</p><p>b) Chính sách, quy chế, quy định về tiêu chuẩn tuyển dụng giảng viên, nghiên cứu viên, nhân viên thư viện, phòng thí nghiệm.</p><p><strong>4. Bảo đảm chất lượng</strong></p><p>a) Định hướng và kế hoạch bảo đảm chất lượng, kiểm định chất lượng và xếp hạng;</p><p>b) Chính sách, quy chế, quy định về hệ thống đảm bảo chất lượng bên trong, phát triển văn hóa chất lượng;</p><p>c) Kiểm định Nhà trường và chương trình đào tạo.</p><p><strong>5. Một số nhiệm vụ khác theo quy định của Nhà nước và Bộ Giáo dục và Đào tạo.</strong></p>', NULL, NULL, 1, '2026-06-15 22:19:00', '2026-06-16 15:19:13', '2026-06-16 15:19:13', NULL),
(17, 'Đào tạo', 'dao-tao', NULL, NULL, NULL, NULL, NULL, 1, '2026-06-15 22:23:00', '2026-06-16 15:23:15', '2026-06-16 15:23:15', NULL),
(18, 'Sinh viên', 'sinh-vien', NULL, NULL, '<h4>Sinh viên</h4><h4>Các đơn vị hỗ trợ</h4><p><a href=\"https://ntu.edu.vn/sinh-vien/cac-%C4%91on-vi-ho-tro/%C4%91oan-thanh-nien\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Đoàn thanh niên\" width=\"16px\" height=\"16px\">Đoàn thanh niên</a></p><p><a href=\"https://ntu.edu.vn/sinh-vien/cac-%C4%91on-vi-ho-tro/phong-cong-tac-chinh-tri-va-sinh-vien\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Phòng Công tác Chính trị và Sinh viên\" width=\"16px\" height=\"16px\">Phòng Công tác Chính trị và Sinh viên</a></p><p><a href=\"https://ntu.edu.vn/sinh-vien/cac-%C4%91on-vi-ho-tro/trung-tam-ho-tro-viec-lam-va-khoi-nghiep\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Trung tâm Hỗ trợ Việc làm và Khởi nghiệp\" width=\"16px\" height=\"16px\">Trung tâm Hỗ trợ Việc làm và Khởi nghiệp</a></p><p><a href=\"https://ntu.edu.vn/sinh-vien/%C4%91oi-song-sinh-vien\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Đời sống Sinh viên\" width=\"16px\" height=\"16px\">Đời sống Sinh viên</a></p><p><a href=\"https://ntu.edu.vn/sinh-vien/hoc-tap-va-viec-lam\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Học tập và việc làm\" width=\"16px\" height=\"16px\">Học tập và việc làm</a></p><p><a href=\"https://elearning.ntu.edu.vn/\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Giáo dục trực tuyến Elearning\" width=\"16px\" height=\"16px\">Giáo dục trực tuyến Elearning</a></p><p><a href=\"http://vieclamnhatrang.ntu.edu.vn/\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Giới thiệu việc làm\" width=\"16px\" height=\"16px\">Giới thiệu việc làm</a></p><p><a href=\"https://sinhvien.ntu.edu.vn/\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Xem điểm - Đăng ký môn học\" width=\"16px\" height=\"16px\">Xem điểm - Đăng ký môn học</a></p><h4>Phòng - Đơn vị đào tạo</h4><p><a href=\"https://ntu.edu.vn/sinh-vien/phong-%C4%91on-vi-%C4%91ao-tao/phong-%C4%91ao-tao-%C4%91ai-hoc\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Phòng Đào tạo Đại học\" width=\"16px\" height=\"16px\">Phòng Đào tạo Đại học</a></p><p><a href=\"https://ntu.edu.vn/sinh-vien/phong-%C4%91on-vi-%C4%91ao-tao/phong-%C4%91ao-tao-sau-%C4%91ai-hoc\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Phòng Đào tạo Sau đại học\" width=\"16px\" height=\"16px\">Phòng Đào tạo Sau đại học</a></p><p><a href=\"https://ntu.edu.vn/sinh-vien/phong-%C4%91on-vi-%C4%91ao-tao/trung-tam-%C4%91ao-tao-va-boi-duong\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Trung tâm Đào tạo và Bồi dưỡng\" width=\"16px\" height=\"16px\">Trung tâm Đào tạo và Bồi dưỡng</a></p><p><a href=\"https://ntu.edu.vn/sinh-vien/sinh-vien-quoc-te\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Sinh viên quốc tế\" width=\"16px\" height=\"16px\">Sinh viên quốc tế</a></p><p><a href=\"https://qldt.ntu.edu.vn/tracuuvanbangchungchi.html\"><img src=\"https://ntu.edu.vn/images/icon_unknown_16px.gif\" alt=\"Tra cứu văn bằng\" width=\"16px\" height=\"16px\">Tra cứu văn bằng</a></p>', NULL, NULL, 1, '2026-06-15 22:29:00', '2026-06-16 15:29:45', '2026-06-16 16:20:34', NULL),
(19, 'Nghiên cứu khoa học', 'nghien-cuu-khoa-hoc', NULL, NULL, NULL, NULL, NULL, 1, '2026-06-15 22:50:00', '2026-06-16 15:50:07', '2026-06-16 15:50:07', NULL),
(20, 'Hợp tác đối ngoại', 'hop-tac-doi-ngoai', NULL, NULL, NULL, NULL, NULL, 1, '2026-06-15 22:50:00', '2026-06-16 15:50:32', '2026-06-16 15:50:32', NULL),
(21, 'Liên hệ', 'lien-he', NULL, NULL, '<h4>Các đơn vị chức năng</h4><p><strong>1. </strong><a href=\"https://phongctsv.ntu.edu.vn/\"><strong>Phòng Công tác Chính trị và sinh viên</strong></a><strong>: </strong>Sinh viên cần bổ sung hồ sơ, in thẻ sinh viên, tạm dừng học tập, xin vào học lại, chuyển ngành, chuyển bậc, nộp hồ sơ xét học bổng chế độ chính sách xã hội, thắc mắc về học bổng khuyến khích học tập, khen thưởng, kỷ luật, đăng ký học thi bằng lái xe, mượn áo cử nhân chụp ảnh.</p><p><strong>2. </strong><a href=\"https://pdtdaihoc.ntu.edu.vn/\"><strong>Phòng Đào tạo Đại học</strong></a><strong>:</strong> Sinh viên cần đăng ký và hủy học phần, cần in bảng điểm, làm giấy hoãn thi, làm giấy vào thi do hoãn thi, làm đơn chuyển đổi mã học phần, nhận bằng tốt nghiệp, đăng ký mua hồ sơ học Văn bằng 2, học liên thông lên đại học hệ chính quy.&nbsp;Các thông tin liên quan đến công tác tuyển sinh.</p><p><strong>3. </strong><a href=\"https://phongkhtc.ntu.edu.vn/\"><strong>Phòng Kế hoạch - Tài chính</strong></a><strong>:&nbsp;</strong>Đóng học phí, đóng bảo hiểm y tế, bảo hiểm thân thể, lĩnh tiền học bổng</p><p><strong>4. </strong><a href=\"https://phongkhcn.ntu.edu.vn/\"><strong>Phòng Khoa học công nghệ</strong></a><strong>: </strong>Sinh viên muốn tham gia nghiên cứu khoa học</p><p><strong>5. </strong><a href=\"https://phonghtdn.ntu.edu.vn/\"><strong>Phòng Hợp tác quốc tế</strong></a><strong>:</strong> Sinh viên muốn tìm thông tin du học, tham gia trao đổi sinh viên quốc tế</p><p><strong>6. </strong><a href=\"https://phongcntt.ntu.edu.vn/\"><strong>Phòng Hạ tầng và Công nghệ Thông tin</strong></a><strong>: </strong>Hỗ trợ các vấn đề liên quan đến tài khoản, thư điện thử của sinh viên</p><p><strong>7.&nbsp;Trung tâm Thí nghiệm thực hành:</strong>&nbsp;Triển khai thí nghiệm, thực hành trong Trường.</p><p><strong>8.&nbsp;Trung tâm Giáo dục quốc phòng và An ninh:</strong>&nbsp;Đăng ký hay hủy học phần Giáo dục thể chất, Giáo dục quốc phòng – An ninh</p><p><strong>9. Trung tâm&nbsp;Hỗ trợ&nbsp;việc làm và Khởi nghiệp:</strong>&nbsp;Sinh viên muốn học các lớp kỹ năng mềm, cần việc làm ngắn hạn, cần thông tin việc làm, thông tin tuyển dụng</p><p><strong>10. Khoa - Viện:</strong>&nbsp;Sinh viên cần làm đơn phúc khảo bài thi: nộp đơn tại Khoa/Viện quản lý ngành học. Xin cấp giấy chứng nhận là sinh viên đang học tại trường, liên hệ thư ký văn phòng khoa/viện quản lý ngành học.&nbsp;<a href=\"https://www.ntu.edu.vn/Gioi-thieu/Co-cau-to-chuc/khoa-vien-%C4%91ao-tao\">Danh sách Khoa/Viện</a></p>', NULL, NULL, 1, '2026-06-15 22:51:00', '2026-06-16 15:51:28', '2026-06-16 15:51:28', NULL);
INSERT INTO `pages` (`id`, `title`, `slug`, `parent_id`, `excerpt`, `content`, `image`, `file`, `status`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(22, 'Đời sống Sinh viên', 'doi-song-sinh-vien', 18, NULL, '<p>Tọa lạc tại thành phố biển đẹp nhất Việt Nam, được bao quanh bởi một trong những vịnh đẹp nhất thế giới - Vịnh Nha Trang, cơ sở chính của Trường Đại học Nha Trang (NTU) có vị trí đẹp nhất so với các trường đại học khác tại Việt Nam. Ngoài cơ sở chính 20 ha, NTU còn có một số cơ sở ở các nơi khác như Trại nuôi trồng thủy sản thực nghiệm nước mặn Cam Ranh, Trại thực nghiệm nước ngọt Ninh Phụng, bãi tàu Phước Đông và Chi nhánh Kiên Giang với diện tích 50 ha .</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/khuan-vien-dh-nha-trang.JPG\" alt=\"Khuân viên hơn 20 ha của trường Đại học Nha Trang\" width=\"600\" height=\"334\"></p><p>► <a href=\"https://photos.ntu.edu.vn/Trang-chu/id/4\">Xem Album khuân viên trường Đại học Nha Trang tại đây</a></p><h3>GIẢNG ĐƯỜNG</h3><p>Hiện nay, Trường ĐHNT có 8 khu nhà giảng đường với tổng số 120 phòng học, trong đó 100% đã được trang bị phương tiện dạy học hiện đại. Các cơ sở này đủ điều kiện để tổ chức hội thảo, hội nghị quốc tế và hội nghị truyền hình trực tuyến. NTU có 120 phòng trên diện tích 15.000 m2, có khả năng cung cấp đồng thời 6.000 chỗ cho sinh viên.</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/giang-duong-g1.JPG\" alt=\"Giảng đường G1 Đại học Nha Trang\" width=\"600\" height=\"448\"></p><h3>PHÒNG THÍ NGHIỆM</h3><p>NTU sở hữu 50 phòng thí nghiệm bao gồm nhiều lĩnh vực như hóa học, sinh học thực nghiệm, công nghệ sinh học, hóa sinh, vi sinh, ngư cụ hàng hải, động cơ tàu, hàng hải và hàng hải, công nghệ thực phẩm, kỹ thuật điện lạnh và sản xuất. Tất cả đều được trang bị các thiết bị hiện đại đủ khả năng phục vụ sinh viên và nghiên cứu viên tiến hành và thực hiện các đề tài nghiên cứu các cấp.</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/phong-thi-nghiem-cong-nghe-cao.JPG\" alt=\"Phòng thí nghiệm Công nghệ cao\" width=\"600\" height=\"398\"></p><h3>THƯ VIỆN</h3><p>Thư viện của NTU bao gồm 3 tòa nhà trong đó có 7 phòng đọc với tổng số 1.000 chỗ ngồi, 2 kho sách và phòng tạp chí để truy cập Internet và cơ sở dữ liệu đa phương tiện.</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/thu-vien-dh-nha-trang.jpeg\" alt=\"Thư viện trường Đại học Nha Trang\" width=\"600\" height=\"365\"></p><p>Thư viện có một lượng lớn tài liệu và tài nguyên bao gồm 18.000 đầu sách khác nhau (46.000 bản), trong đó 23.000 bản bằng tiếng nước ngoài. Gần 3.500 luận án và 300 loại báo, tạp chí trong nước và quốc tế. Thư viện cũng có một cơ sở dữ liệu điện tử gồm 4.000 cuốn sách và hàng trăm nghìn tài liệu tham khảo có bản quyền được cung cấp theo đường dẫn trực tuyến. Nguồn thông tin được cập nhật hàng năm với 2.000 đầu sách mới (5.000 bản).</p><h3>KHU TỰ HỌC</h3><p>Ngoài Thư viên, Trường Đại học Nha Trang còn bố trí nhiều khu Tự học với không gian xanh, thoáng đãng và yên tĩnh cho sinh viên học nhóm, sinh hoạt học thuật.</p><h3>KHUÔN VIÊN XANH</h3><p>Trường Đại học Nha Trang nằm trên đồi LaSan, hướng biển, cách trung tâm Thành phố khoảng 3 km về hướng Bắc. Trường Đại học Nha Trang có nhiều Khuôn viên xanh, nơi Sinh viên có thể thỏa thích ngồi ngắm biển, cảnh toàn thành phố, vui chơi sau những giờ học căng thẳng.</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/dai-phun-nuoc.jpg\" alt=\"Đài phun nước Cá Heo Trường Đại học Nha Trang\" width=\"600\" height=\"400\"></p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/tuyet-son-phi-hong.JPG\" alt=\"Tuyết Sơn Phi Hồng\" width=\"600\" height=\"399\"></p><p>&nbsp;</p><h3>NHÀ ĂN</h3><p>Nhà ăn NTU là một tòa nhà 4 tầng. Gồm 4 khu: nhà ăn, nước uống giải khát, chợ mini và giải trí, ngoài việc phục vụ sinh viên và nhân viên hàng ngày, căng tin NTU còn phục vụ bữa trưa, bữa tối như một nhà hàng tiêu chuẩn phục vụ nhiều sự kiện quan trọng như hội thảo quốc tế, hội nghị, sinh nhật và các ngày kỷ niệm.</p><h3>KÝ TÚC XÁ SINH VIÊN</h3><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/ky-tuc-xa-dh-nha-trang.JPG\" alt=\"Ký túc xá sinh viên trường Đại học Nha Trang\" width=\"600\" height=\"393\"></p><p>NTU có 10 tòa nhà ký túc xá với 1.000 phòng, chỗ ở cho hơn 5.000 sinh viên. Chúng bao gồm Ký túc xá Đại học, Ký túc xá Sau Đại học và Ký túc xá dành cho sinh viên xuất sắc. Tất cả các ký túc xá đều được trang bị tốt và nằm bên trong khuôn viên chính. Sinh viên có thể đến ký túc xá bằng cách đi bộ từ bất kỳ tòa nhà nào trong khuôn viên trường. Nó cũng có các cơ sở phụ như nhà ăn, phòng giặt, phòng học, sân vận động trong nhà và ngoài trời và phòng tập thể dục, phòng chơi bóng bàn, và các phòng sinh hoạt chung, Wifi và Internet được cung cấp miễn phí tại tất cả các ký túc xá và các tòa nhà trong khuôn viên trường.</p><h3>NGÂN HÀNG</h3><p>Người nước ngoài có thể dễ dàng mở tài khoản tiết kiệm bằng VND (đơn vị tiền tệ Việt Nam) với số tiền gửi nhỏ. Sinh viên cũng có thể mở tài khoản ngân hàng bằng ngoại tệ (tức là USD) nhưng phải ký quỹ, tối thiểu là 1.000 đô la Mỹ). Hộ chiếu hợp lệ, tiền đặt cọc và giấy chứng nhận nhập học là một trong những giấy tờ cần thiết để mở tài khoản. Các máy ATM được đặt trong khuôn viên trường, dễ dàng và thuận tiện để sử dụng bất cứ lúc nào. Các máy ATM cũng rất phong phú ở các thành phố và khắp cả nước. Tất cả các chi nhánh ngân hàng và máy ATM thường có ngôn ngữ tiếng Anh.</p><p>Máy ATM chấp nhận các thẻ tín dụng quốc tế chính như American Express, Visa và MasterCard. Có thể sử dụng thẻ ATM tại tất cả các trạm ATM của các ngân hàng khác nhau. Chi phí sinh hoạt dự kiến sẽ tiêu tốn khoảng 6.000.000 đến 10.000.000 VND ($ 300 - 500) mỗi tháng cho chi phí sinh hoạt, bao gồm cả ăn ở. Giá cả rất khác nhau và chi phí sinh hoạt phụ thuộc phần lớn vào việc một cửa hàng ở chợ giá rẻ hay trung tâm mua sắm sang trọng, ăn ở nhà, ở quầy hàng rong hay nhà hàng sang trọng, v.v.</p><h3>VẬN CHUYỂN</h3><p>Các phương tiện di chuyển ở Nha Trang rất thuận tiện bao gồm xe buýt, taxi, tàu hỏa, xe ôm… Đường bộ không quá nhộn nhịp (trừ ngày lễ), dễ tìm và không tốn kém.</p><p><i><strong>♦&nbsp;Xe buýt thành phố</strong></i></p><p>Một số loại xe buýt khác nhau ở Nha Trang bao gồm xe buýt màu trắng-xanh (6.000 đồng một lượt); xe buýt thành phố rẻ và thích hợp cho các chuyến tham quan thành phố. Xe buýt hoạt động thường xuyên từ 5 giờ sáng đến 7 giờ tối. Xe buýt từ sân bay Cam Ranh đến thành phố Nha Trang là 70.000 đồng.</p><p><i><strong>♦&nbsp;Xe lửa</strong></i></p><p>Ga Nha Trang là một trong những ga chính của Đường sắt Việt Nam. Tất cả các chuyến tàu từ miền Bắc (Hà Nội) vào miền Nam (thành phố Hồ Chí Minh) đều dừng tại ga Nha Trang, cách NTU 3,5 km.</p><p><i><strong>♦&nbsp;Taxi</strong></i></p><p>Taxi ở Nha Trang rất phong phú, giá rẻ theo tiêu chuẩn quốc tế và hầu hết đều có máy lạnh dễ chịu. Hầu hết các tài xế đều sử dụng đồng hồ tính cước theo quy định của pháp luật, nhưng một số có thể thương lượng giá cố định cho chặng đường dài (tức là giá taxi từ thành phố Nha Trang đến sân bay Cam Ranh dao động từ 300.000 đến 380.000 đồng). Giá vé bắt đầu từ 12.000 đồng khi mở cửa và tăng dần với mức 10.000 đồng một km. Vào ban đêm khi xe cộ thưa thớt, taxi chắc chắn là phương tiện di chuyển nhanh chóng nhất. Lưu ý rằng tiền boa không phải là hoạt động bình thường ở Nha Trang. Nói chung tài xế taxi ở Nha Trang nói tiếng Anh tốt.</p><p><i><strong>♦&nbsp;Xe ôm</strong></i></p><p>Xe ôm “tiết kiệm hơn” đối với sinh viên và có sẵn bất cứ lúc nào. Chúng thường được sử dụng cho các khoảng cách ngắn ở những khu vực không có giao thông đông đúc. Đảm bảo thỏa thuận giá vé thương lượng với tài xế trước khi khởi hành. Sinh viên có thể thuê xe ôm để đi dã ngoại thường có giá 100.000 đồng một ngày. Để thuê xe ôm, người thuê phải đặt cọc chứng minh thư hoặc thẻ sinh viên.</p><h3>CÂU LẠC BỘ SINH VIÊN</h3><p>Có hơn 50 câu lạc bộ và tổ chức sinh viên được liên kết với NTU. Chúng bao gồm thể thao, kung fu, tụ họp văn hóa, nghệ thuật và các hoạt động ngoài cửa. Sinh viên cũng có thể tham gia các hoạt động sinh viên khác nhau do Hội Sinh viên và Đoàn Thanh niên tổ chức. Tham gia vào các câu lạc bộ và hoạt động này là cách tốt nhất để kết bạn, phát triển trách nhiệm và rèn luyện phẩm chất lãnh đạo. Điều này sẽ cho phép bạn phát triển và học hỏi từ những kinh nghiệm mới xung quanh khuôn viên trường.</p><h3>CÔNG TRÌNH THỂ THAO</h3><p><i><strong>♦&nbsp;Phòng tập thể dục</strong></i></p><p>Nhà thi đấu NTU là khu thể thao phức hợp. Nó bao gồm một sân vận động trong nhà với 800 chỗ ngồi cho bóng đá, và hai sân cho bóng chuyền và cầu thủ bóng rổ. Sinh viên và các khoa có thể đến và thưởng thức các môn thể thao yêu thích của họ bất cứ lúc nào trong ngày. Nhiều sự kiện quan trọng như thi đấu thể thao toàn quốc, ngày kỷ niệm trường ĐHNT, ngày nhà giáo Việt Nam đã diễn ra tại nhà thi đấu.</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/nha-thi-dau.jpg\" alt=\"Nhà thi đấu đa năng Trường Đại học Nha Trang\" width=\"600\" height=\"400\"></p><p><i><strong>♦&nbsp;Sân vận động</strong></i></p><p>Một sân vận động ngoài cửa tiêu chuẩn mới đã được hoàn thành gần đây với cỏ nhân tạo. Với sức chứa 5000 chỗ ngồi, sân sẽ là địa điểm hấp dẫn tổ chức các sự kiện thể thao quan trọng, không chỉ cho sinh viên, cán bộ trường ĐHNT mà còn cho các tuyển thủ thể thao chuyên nghiệp tỉnh Khánh Hòa và các tỉnh Nam Trung bộ.</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/gioi-thieu/san-bong-da-dh-nha-trang.JPG\" alt=\"Sân bóng đá tại Đại học Nha Trang\" width=\"600\" height=\"396\"></p>', NULL, NULL, 1, '2026-06-15 22:53:00', '2026-06-16 15:53:53', '2026-06-16 15:53:53', NULL),
(23, 'Sinh viên quốc tế', 'sinh-vien-quoc-te', 18, NULL, '<h3>Sinh viên quốc tế</h3><h3>Trường Đại học Nha Trang: môi trường học tập lý tưởng cho sinh viên quốc tế.</h3><p><br>Hàng năm, Trường Đại học Nha Trang không chỉ chào đón hàng nghìn sinh viên trong nước mà còn tiếp nhận ngày càng nhiều sinh viên quốc tế theo học các chương trình đại học, sau đại học và các khóa học ngắn hạn. Ví dụ, năm 2018, Trường có 60 sinh viên quốc tế theo học chương trình toàn thời gian, nhiều sinh viên theo học chương trình trao đổi một học kỳ hoặc theo học các chương trình ngắn hạn. Vậy đâu là lý do khiến trường Đại học Nha Trang thu hút sinh viên quốc tế đến vậy? Hãy cùng chúng tôi tìm câu trả lời từ các sinh viên: Tomas (Namibia), Louis (Haiti) và Jean (Rwanda).</p><h3>Chương trình đào tạo hấp dẫn</h3><p>Bằng việc mở rộng quan hệ hợp tác với nhiều cơ quan, học viện và trường đại học trên thế giới, Trường Đại học Nha Trang hiện đã mở một số chương trình thạc sĩ quốc tế bằng tiếng Anh hoặc tiếng Pháp, bao gồm: Quản trị Kinh doanh và Du lịch (Chương trình song ngữ tiếng Anh và tiếng Pháp dưới sự hợp tác và hỗ trợ của Cơ quan Đại học Pháp ngữ - AUF), Công nghệ Thực phẩm (Đào tạo bằng tiếng Anh trong khuôn khổ dự án VLIR do Chính phủ Bỉ hỗ trợ), Quản lý dựa trên hệ sinh thái biển và Biến đổi khí hậu (Đào tạo bằng tiếng Anh trong khuôn khổ dự án NORHED do chính phủ Na Uy hỗ trợ).<br><br>Các tổ chức như AUF hay các dự án của chính phủ Bỉ, chính phủ Na Uy đều nổi tiếng trên thế giới. Do đó, việc thu hút sự quan tâm của sinh viên từ khắp nơi trên thế giới tham gia vào các chương trình này trở nên dễ dàng và thuận tiện hơn.</p><p>Tomas Ndatitangi Nalukaku đến từ Namibia cho biết cô đã đăng ký chương trình thạc sĩ Quản lý dựa trên hệ sinh thái biển và Biến đổi khí hậu tại Đại học Nha Trang và cảm thấy may mắn khi được nhận vào. Chương trình này cũng phù hợp với định hướng nghề nghiệp của cô trong tương lai. Hiện tại, Tomas đã hoàn thành chương trình 2 năm của Đoàn 3 và bảo vệ luận văn thạc sĩ với số điểm cao nhất trong 3 nhóm.</p><p>Trong khi đó, Louis Hernseau, một sinh viên khác đến từ đảo quốc - Haiti of the Caribbean, đã tìm thấy cơ duyên của mình với Đại học Nha Trang thông qua AUF. “Tôi luôn mong muốn được tham gia các chương trình sau đại học để tăng cơ hội kiếm được công việc tốt với mức lương cao tại quê nhà. Tôi đã đăng ký chương trình thạc sĩ song ngữ Quản trị Kinh doanh và Du lịch và được Trường chấp nhận. Tôi biết rằng tôi thực sự muốn theo học chương trình này ngay khi tôi tìm thấy nó ”. Anh ta nói.</p><p><img src=\"https://en.ntu.edu.vn/portals/0/userfiles/196/Louis.jpg?ver=2020-04-10-005433-613\" alt=\"Louis (đầu tiên bên phải) đang theo học các chương trình sau đại học để có một công việc tốt ở Haiti\" width=\"600\" height=\"338\"></p><p>Đối với Jean Baptiste Simurabiye đến từ Rwanda, hiện đang theo học chương trình thạc sĩ về Công nghệ thực phẩm, đã quyết định chọn trường Đại học Nha Trang sau khi biết NTU có chương trình thạc sĩ dành cho sinh viên quốc tế. Bên cạnh đó, anh cũng quan tâm đến vị trí địa lý của Trường.</p><h3>Môi trường học tập thuận tiện</h3><p>Năm 2019, Trường Đại học Nha Trang đánh dấu kỷ niệm 60 năm xây dựng và phát triển. Một số công trình lịch sử của Trường được tu bổ, sửa chữa song song với việc bảo tồn và nuôi dưỡng nhiều cây xanh. Một số công trình khác được đầu tư xây dựng mới với trang thiết bị hiện đại. Điều này góp phần tạo nên sự đan xen giữa hình ảnh mới và cũ, là điểm hấp dẫn đối với cả sinh viên Việt Nam và quốc tế.</p><p>Tomas chia sẻ: “Môi trường học tập ở đây rất gần gũi với thiên nhiên và giúp ích nhiều cho việc học. Các phòng học và tất cả các cơ sở như phòng thí nghiệm, vv được trang bị tốt. Chúng làm cho các hoạt động học tập và giảng dạy dễ dàng hơn. ”</p><p>Mặt khác, sinh viên quốc tế đến học tập tại NTU cũng không quá lo lắng về chỗ ở vì sẽ được ở trong ký túc xá, nằm ngay trong khuôn viên trường. “Trang thiết bị tập luyện thể dục thể thao của Trường cũng rất tốt. Gần ký túc xá có sân bóng rổ, sân tập thể dục, sân bóng chuyền, sân cầu lông,… giúp chúng tôi có thời gian giải tỏa áp lực sau những buổi học ”, Tomas cho biết thêm.</p><h3>Thành phố biển thân thiện và mến khách</h3><p>Trường Đại học Nha Trang tọa lạc trên ngọn đồi Lasan của thành phố Nha Trang, một thành phố biển luôn nhộn nhịp du khách nên du học sinh theo học tại đây luôn cảm thấy sôi động, không hề nhàm chán. Bên cạnh các khu vui chơi, nhà hàng, thắng cảnh nổi tiếng, khi rảnh rỗi sinh viên có thể tham quan bảo tàng sinh vật biển, các làng quê ngoại thành hoặc các tỉnh lân cận. Qua đó, các em có cơ hội hiểu thêm về người dân thành phố Nha Trang nói riêng và người Việt Nam nói chung, từ đó hòa nhập hơn với cuộc sống nơi đây.</p><p><img src=\"https://en.ntu.edu.vn/portals/0/userfiles/196/Tomas.jpg?ver=2020-04-10-005433-660\" alt=\"Tomas (thứ hai từ trái qua) trong chuyến dã ngoại cùng lớp Access - Đại học Nha Trang\" width=\"600\" height=\"450\"></p><p>Nhắc đến Nha Trang, Louis vui vẻ trả lời: “Đây là một nơi tuyệt vời. Vùng đất này nổi tiếng về du lịch, khách sạn sang trọng và đầu tư vào các sản phẩm dành cho du khách (an ninh, hiếu khách, văn hóa, bãi biển đẹp, di sản vật thể và phi vật thể, ánh sáng mặt trời, ẩm thực ...). Đây là yếu tố quyết định của thiên đường với diện tích vỏn vẹn 251 km2 này ”.</p><p>Với Tomas, điều ấn tượng nhất là con người Việt Nam: “Tôi đánh giá cao và sẽ mang về cho nước nhà tính kỷ luật và chăm chỉ, đặc biệt là những người phụ nữ Việt Nam rất siêng năng. Tôi nhận thấy rằng người Việt Nam cũng thích tận hưởng cuộc sống bất kể tuổi tác của họ, chẳng hạn như họ vẫn dành thời gian để đi bơi hoặc uống cà phê. Đó có lẽ là điều tôi sẽ dạy cho người dân của mình ở Namibia. Ăn uống lành mạnh cũng là điều tôi sẽ luôn ghi nhớ ”.</p><p>Con người cũng là một yếu tố khiến Jean cảm thấy Nha Trang là “nhà” của mình. Anh nhớ lại kỷ niệm lần đầu đến Nha Trang: “Khi đến sân bay Cam Ranh, tôi bị lạc vì trời đã về chiều. Khi tôi đang cố gắng xoay sở, một người đàn ông lớn tuổi đến gặp tôi và cố gắng nói chuyện bằng tiếng Việt, nhưng tôi không hiểu. Chắc anh ấy thấy tôi cần giúp đỡ gì đó nên đã nhờ một cô gái hỗ trợ phiên dịch, cuối cùng cũng giúp tôi vào được trường Đại học Nha Trang. Tôi luôn cảm thấy khó tin mỗi khi nhớ lại điều này ”.</p><p><img src=\"https://en.ntu.edu.vn/portals/0/userfiles/196/Jean.jpg?ver=2020-04-10-005433-660\" alt=\"Jean (thứ 5 từ trái sang) coi Nha Trang và Việt Nam là quê hương thứ hai của mình\" width=\"600\" height=\"450\"></p><p>Trong thời gian tới, Trường Đại học Nha Trang sẽ tiếp tục đẩy mạnh và mở rộng các chương trình đào tạo bằng tiếng Anh, tiếng Pháp,… thông qua hình thức hợp tác quốc tế. Qua đó, sinh viên đến từ nhiều quốc gia khác nhau sẽ có cơ hội đến Nha Trang, Việt Nam để học tập cũng như giao lưu văn hóa giữa các nước.</p><p>Các bạn có thể tham khảo thêm một số cách nghĩ khác của Trường Đại học Quốc tế Nha Trang tại các link sau:</p><p>1. http://60.ntu.edu.vn/NTU-v%C3%A0-T%C3%B4i/Blogs/n/1562/quick-thought-ntu-at-60</p><p>2. http://60.ntu.edu.vn/NTU-v%C3%A0-T%C3%B4i/Blogs/n/1555/quick-thought-ntu-at-60</p><p>3. http://60.ntu.edu.vn/NTU-v%C3%A0-T%C3%B4i/Blogs/n/1563/letter-from-marine-insrupt</p><p>Bên cạnh đó, hai trong số các sinh viên Rwanda theo học chương trình thạc sĩ Nuôi trồng thủy sản (Khóa 2012-2014) đã từng chia sẻ cảm nhận của mình về Trường Đại học Nha Trang như sau:</p><p><i><strong>Jean Claude NDORIMANA, Thạc sĩ ngành Nuôi trồng thủy sản từ Rwanda</strong></i></p><p>\"Tôi muốn nói rằng tất cả nhân viên trong NTU đều rất thân thiện, bất kỳ hình thức giúp đỡ nào bạn có thể yêu cầu mà trong khả năng họ có thể cung cấp; bởi vì chúng tôi giao dịch rất thường xuyên với Bộ Ngoại giao, tôi muốn nhân cơ hội này và trình bày Mức độ đánh giá cao đối với tất cả họ mà không có bất kỳ sự đồng cảm hay nhấn mạnh cụ thể nào. Bất kỳ vấn đề nào chúng tôi gặp phải, họ can thiệp như thể đó là vấn đề của riêng họ; họ coi học sinh như những người bạn và đồng nghiệp thực sự; chúng tôi tương tác như thể chúng tôi đang ở trong gia đình.</p><p>Sinh viên ở Nha Trang cũng rất thân thiện nhưng bạn cần phải dành thời gian vì khi họ nhìn thấy bạn là người nước ngoài họ rất ngạc nhiên nhưng khi bạn quen với họ, họ rất độc đáo, rất hữu ích, thân thiện để ngày hôm nay tất cả mọi người chúng ta đã gặp. một người bạn của tôi; rào cản duy nhất đối với nhiều sinh viên là giao tiếp bằng tiếng Anh.</p><p>Đời sống khuôn viên cũng tốt, họ cố gắng giữ khuôn viên sạch sẽ, đủ an ninh trật tự trong toàn khuôn viên; nhiều sự kiện giải trí nhưng tôi đề nghị Nhà trường xem xét sự hiện diện của Sinh viên nước ngoài để Chủ lễ trong các sự kiện khác nhau được tổ chức nên tóm tắt từng bước bằng tiếng Anh để chúng tôi có thể theo dõi những gì đang diễn ra; của anh ấy là trường hợp trên trang web của trường đại học</p><p>Bạn nên cố gắng dịch dễ dàng sang tiếng Anh bởi vì chúng tôi thường cố dịch chúng tôi không thành công và chúng tôi có thể biết bất kỳ thông báo nào ngoài các đồng nghiệp của chúng tôi.</p><p>Còn không thì NTU cũng nằm ở vị trí đẹp, người dân quanh thành phố Nha Trang cũng tốt bụng lắm \".</p><p><i><strong>KAMONDO Stephanie, Thạc sĩ nuôi trồng thủy sản từ Rwanda</strong></i></p><p>\"Thực lòng mà nói, trường Đại học Nha Trang đúng như những gì chúng tôi mong đợi trước khi đến Việt Nam học Sau Đại học. Trường có cơ sở vật chất tuyệt vời như giảng đường, phòng học, cơ sở thí nghiệm và thực hành, ký túc xá khang trang, rộng rãi, đặc biệt cho sinh viên nước ngoài K1 có điều kiện tiếp cận tầm nhìn ra biển, hệ thống thư viện hiện đại, khu phức hợp thể dục (vì tập thể dục là một trong những sở thích của tôi), và nhiều cơ sở giảng dạy, học tập và nghiên cứu khác. Tất cả những điều này và hơn thế nữa, giúp chúng tôi có sức khỏe tốt và trạng thái trí tuệ vững vàng. Điều này môi trường xã hội và thân thiện mang lại cho tôi rất nhiều hy vọng trong tương lai.</p><p>Người dân thành phố Nha Trang nói chung và tất cả mọi người (giảng viên, nhân viên, sinh viên) ở NTU nói riêng là những người rất dễ mến, rất thân thiện và quan tâm, mỗi khi chào tôi đều nở một nụ cười thật tươi.</p><p>Tôi đảm bảo rằng, Trường ĐHNT là cơ sở phù hợp cho đào tạo đại học, đặc biệt là chương trình nuôi trồng thủy sản vì đội ngũ cán bộ, giảng viên luôn tận tâm với nghề, luôn đảm bảo không chỉ kiến ​​thức lý thuyết mà còn cả thực nghiệm thực tế.</p><p>Một trong những minh chứng cho điều này là chúng tôi (4 sinh viên Rwandan) đã có một tháng tập huấn tại Viện Nghiên cứu Nuôi trồng Thủy sản I từ ngày 15 tháng 4 - ngày 15 tháng 5 năm 2013. Nhân cơ hội này, tôi xin bày tỏ lòng biết ơn đến Trường ĐHNT. đặc biệt là Vụ Nuôi trồng Thủy sản. Tôi cũng nhận ra rằng chúng tôi có những người bạn học rất tốt bụng và chúng tôi cảm ơn họ vì đã giúp đỡ và động viên \".</p>', NULL, NULL, 1, '2026-06-15 22:54:00', '2026-06-16 15:54:45', '2026-06-16 15:54:45', NULL),
(24, 'Học tập và việc làm', 'hoc-tap-va-viec-lam', NULL, NULL, NULL, NULL, NULL, 1, '2026-06-15 22:55:00', '2026-06-16 15:55:34', '2026-06-16 15:55:34', NULL),
(25, 'Phòng thí nghiệm', 'phong-thi-nghiem', 19, NULL, '<h3>Các phòng Thí nghiệm Thực hành</h3><ul><li><a href=\"https://ntu.edu.vn/nghien-cuu-khoa-hoc/phong-thi-nghiem#item-1896-tab\">Tổng hợp trang thiết bị PTN</a></li><li><a href=\"https://ntu.edu.vn/nghien-cuu-khoa-hoc/phong-thi-nghiem#item-414-tab\">Sơ đồ chỉ dẫn</a></li><li><a href=\"https://ntu.edu.vn/nghien-cuu-khoa-hoc/phong-thi-nghiem#item-444-tab\">Khu Công nghệ cao 1</a></li><li><a href=\"https://ntu.edu.vn/nghien-cuu-khoa-hoc/phong-thi-nghiem#item-445-tab\">Khu Công nghệ cao 2</a></li></ul><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td><td colspan=\"3\"><strong>DANH MỤC TRANG THIẾT BỊ PTN (Cập nhật 7/2024)</strong></td></tr><tr><td><strong>STT</strong></td><td><strong>TÊN THIẾT BỊ</strong></td><td><strong>THÔNG SỐ</strong></td><td><strong>TÊN PHÒNG THÍ NGHIỆM</strong></td></tr><tr><td>1</td><td>Bể điều nhiệt</td><td>Vision VS-1205SW1</td><td>Khu Công nghệ cao 1</td></tr><tr><td>2</td><td>Kính hiển vi soi nổi</td><td>Kèm theo camera kỹ thuật số</td><td>Khu Công nghệ cao 1</td></tr><tr><td>3</td><td>Kính hiển vi</td><td>Kèm theo camera, video chụp ảnh</td><td>Khu Công nghệ cao 1</td></tr><tr><td>4</td><td>Bộ phá mẫu siêu âm</td><td>&nbsp;</td><td>Khu Công nghệ cao 1</td></tr><tr><td>5</td><td>Bồn nước điều nhiệt</td><td>Memmert WNB22</td><td>Khu Công nghệ cao 1</td></tr><tr><td>6</td><td>Cân kỹ thuật 2 số lẻ</td><td>OHAUS</td><td>Khu Công nghệ cao 1</td></tr><tr><td>7</td><td>Cân phân tích 4 số lẻ</td><td>OHAUS</td><td>Khu Công nghệ cao 1</td></tr><tr><td>8</td><td>Cân phân tích</td><td>SATORIUS CP 224S</td><td>Khu Công nghệ cao 1</td></tr><tr><td>9</td><td>Kính hiển vi soi ngược</td><td>Olympus&nbsp; IX70</td><td>Khu Công nghệ cao 1</td></tr><tr><td>10</td><td>Kính hiển vi</td><td>Mắt ngắm&nbsp; Motic Ximen BA&nbsp; 300<br>kèm camera Moticam 2300,&nbsp; CPU P4/3.0/1/80/17\"LCD; Máy in HP 2605</td><td>Khu Công nghệ cao 1</td></tr><tr><td>11</td><td>Kính hiển vi soi ngược</td><td>Motic Xiamen&nbsp; AE31</td><td>Khu Công nghệ cao 1</td></tr><tr><td>12</td><td>Kính hiển vi soi nổi</td><td>Motic SMZ-168TL</td><td>Khu Công nghệ cao 1</td></tr><tr><td>13</td><td>Máy dập mẫu vi sinh</td><td>BagMixer 400</td><td>Khu Công nghệ cao 1</td></tr><tr><td>14</td><td>Máy đếm khuẩn lạc</td><td>&nbsp;</td><td>Khu Công nghệ cao 1</td></tr><tr><td>15</td><td>Máy đo pH</td><td>HANNA</td><td>Khu Công nghệ cao 1</td></tr><tr><td>16</td><td>Máy đồng nhất mẫu (Vortex)</td><td>M 37610-26</td><td>Khu Công nghệ cao 1</td></tr><tr><td>17</td><td>Máy khuấy từ gia nhiệt</td><td>PHOENIX</td><td>Khu Công nghệ cao 1</td></tr><tr><td>18</td><td>Máy lắc ổn nhiệt có làm lạnh</td><td>Shellab 1575R</td><td>Khu Công nghệ cao 1</td></tr><tr><td>19</td><td>Máy luân nhiệt</td><td>Bio-Rad Laboraories</td><td>Khu Công nghệ cao 1</td></tr><tr><td>20</td><td>Máy ly tâm lạnh</td><td>MIKRO + roto 24 vị trí</td><td>Khu Công nghệ cao 1</td></tr><tr><td>21</td><td>Máy ly tâm lạnh</td><td>Mikro 200R</td><td>Khu Công nghệ cao 1</td></tr><tr><td>22</td><td>Máy nhân gen (PCR)</td><td>C100 touch</td><td>Khu Công nghệ cao 1</td></tr><tr><td>23</td><td>Máy rọi DNA</td><td>Dynaquant 200</td><td>Khu Công nghệ cao 1</td></tr><tr><td>24</td><td>Máy sấy khô gel bằng chân không</td><td>GD 2000</td><td>Khu Công nghệ cao 1</td></tr><tr><td>25</td><td>Nồi hấp thanh trùng</td><td>HVE50, 50i</td><td>Khu Công nghệ cao 1</td></tr><tr><td>26</td><td>Quang phổ kế (UV-VIS)</td><td>Nanodrop 2000C&nbsp; kèm Bộ CPU và màn hình</td><td>Khu Công nghệ cao 1</td></tr><tr><td>27</td><td>Thiết bị cắt lát tế bào Leica RM2125RT/2006</td><td>&nbsp;</td><td>Khu Công nghệ cao 1</td></tr><tr><td>28</td><td>Thiết bị điện di&nbsp;</td><td>Bản thạch protean Power pac 1000</td><td>Khu Công nghệ cao 1</td></tr><tr><td>47</td><td>Thiết bị điện di</td><td>Mini-protean 3 cell Power Pac 300</td><td>Khu Công nghệ cao 1</td></tr><tr><td>48</td><td>Thiết bị điện di</td><td>Mini-SUb-cell Power Pac 300</td><td>Khu Công nghệ cao 1</td></tr><tr><td>49</td><td>Tủ ấm lắc</td><td>Cỡ nhỏ dùng tái tổ hợp AND</td><td>Khu Công nghệ cao 1</td></tr><tr><td>50</td><td>Tủ ấm lắc</td><td>Model 3031</td><td>Khu Công nghệ cao 1</td></tr><tr><td>51</td><td>Tủ ấm nóng lạnh</td><td>SANYO MIR 253</td><td>Khu Công nghệ cao 1</td></tr><tr><td>52</td><td>Tủ ấm</td><td>SANYO</td><td>Khu Công nghệ cao 1</td></tr><tr><td>53</td><td>Tủ an toàn vi sinh</td><td>NU-425-400E</td><td>Khu Công nghệ cao 1</td></tr><tr><td>54</td><td>Tủ đựng hóa chất</td><td>Có lọc hấp thu</td><td>Khu Công nghệ cao 1</td></tr><tr><td>55</td><td>Tủ hút khí độc</td><td>&nbsp;</td><td>Khu Công nghệ cao 1</td></tr><tr><td>56</td><td>Tủ hút khí vi sinh</td><td>AVC 2A1, ESCO</td><td>Khu Công nghệ cao 1</td></tr><tr><td>57</td><td>Tủ lạnh</td><td>Toshiba Model 2201</td><td>Khu Công nghệ cao 1</td></tr><tr><td>58</td><td>Tủ lạnh</td><td>Toshiba, 238 lit</td><td>Khu Công nghệ cao 1</td></tr><tr><td>59</td><td>Tủ nuôi cấy tế bào điều nhiệt</td><td>Sanyo Mir 153&nbsp; 26lit</td><td>Khu Công nghệ cao 1</td></tr><tr><td>60</td><td>Tủ nuôi cấy vi sinh</td><td>PV 100</td><td>Khu Công nghệ cao 1</td></tr><tr><td>61</td><td>Tủ nuôi cấy vi sinh</td><td>&nbsp;</td><td>Khu Công nghệ cao 1</td></tr><tr><td>62</td><td>Tủ sấy</td><td>Binder ED 115</td><td>Khu Công nghệ cao 1</td></tr><tr><td>63</td><td>Tủ sấy</td><td>Memmert UE 500</td><td>Khu Công nghệ cao 1</td></tr><tr><td>64</td><td>Tủ sấy</td><td>Sanyo MOV112,971</td><td>Khu Công nghệ cao 1</td></tr><tr><td>65</td><td>Tủ sấy</td><td>Windaus Memmert INE-600</td><td>Khu Công nghệ cao 1</td></tr><tr><td>66</td><td>Bể rửa siêu âm</td><td>2510E-DTH 2.8 lit</td><td>Khu Công nghệ cao 2</td></tr><tr><td>67</td><td>Bếp cách thủy có máy lắc</td><td>Vision VS-1205SW2</td><td>Khu Công nghệ cao 2</td></tr><tr><td>68</td><td>Bình bảo quản mẫu bằng Nitơ lỏng</td><td>10 lit</td><td>Khu Công nghệ cao 2</td></tr><tr><td>69</td><td>Bộ cân kỹ thuật</td><td>Kern gồm:<br>- Cân 510g/độ đọc 0,1mg (4 số) Model:AET 500 – 4,<br>- Cân 1200g/ độ đọc 0,001g (3 số) Model:PLS 1200-3A,<br>- Cân 2100 g × 0,01 g Model:PLJ 2000-3A<br>- Cân 6000 g × 0,01 g Model:PET 6000 – 2M</td><td>Khu Công nghệ cao 2</td></tr><tr><td>70</td><td>Cân phân tích 4 số</td><td>Quintix 224-IS</td><td>Khu Công nghệ cao 2</td></tr><tr><td>71</td><td>Cân phân tích điện tử</td><td>Model SETRA EL.200S _10-3</td><td>Khu Công nghệ cao 2</td></tr><tr><td>72</td><td>Đầu dò chỉ số khúc xạ (RID)</td><td>Model: 5450 ( CM 5450; SN: 1641-003)_Hitachi kèm theo Adaptor 150W</td><td>Khu Công nghệ cao 2</td></tr><tr><td>73</td><td>Hệ thống phân tích hàm lượng nitơ/protein theo phương pháp Dumas</td><td>Model: DT N Pro/Dumatherm N Pro_Gerhardt, gồm: máy chính, Bộ tiếp mẫu tự động 64 vị trí có gắn camara quan sát trên nắp, phần mềm,Bộ lưu điện (3 KVA),&nbsp; Van điều áp cho bình khí</td><td>Khu Công nghệ cao 2</td></tr><tr><td>74</td><td>Hệ thống sắc ký lỏng hiệu năng cao, đầu dò DAD</td><td>Model: Chromaster_Hitachi gồm Bơm cao áp 5110, Bộ UI-PAD dành cho bơm, Bộ gradient áp suất thấp, Bộ tự động nạp mẫu 5210, Buồng ổn nhiệt cho cột 5310,CPU Dell i3.LCD Dell E 1916H, máy in LPB 151DW</td><td>Khu Công nghệ cao 2</td></tr><tr><td>75</td><td>Kính hiển vi huỳnh quang</td><td>Olympus BX 60</td><td>Khu Công nghệ cao 2</td></tr><tr><td>76</td><td>Lò vi sóng</td><td>EMS3067X Electrolux/Trung Quốc</td><td>Khu Công nghệ cao 2</td></tr><tr><td>77</td><td>Lò vi sóng</td><td>EMS3067X</td><td>Khu Công nghệ cao 2</td></tr><tr><td>78</td><td>Máy cất nước 1 lần</td><td>GFL 2001/4</td><td>Khu Công nghệ cao 2</td></tr><tr><td>79</td><td>Máy cất nước 2 lần</td><td>GFL 2004</td><td>Khu Công nghệ cao 2</td></tr><tr><td>80</td><td>Máy cô quay chân không</td><td>Model 4001</td><td>Khu Công nghệ cao 2</td></tr><tr><td>81</td><td>Máy đo độ nhớt</td><td>AVS470 (gồm máy in &amp; giá)</td><td>Khu Công nghệ cao 2</td></tr><tr><td>82</td><td>Máy đo kích thước hạt nano, đo thế zeta, trọng lượng phân tử</td><td>Model SZ-100Z_Horiba gồm: máy chính, CPU Máy đo kích thước hạt nano, đo thế zeta, trọng lượng phân tử, màn hình LCD Dell, Máy in Canon LBP 2900,&nbsp; 01 Cell đo thủy tinh + 01 cell thạch anh,</td><td>Khu Công nghệ cao 2</td></tr><tr><td>83</td><td>Máy đo lưu biến</td><td>&nbsp;Model Kinexus Pro 50N_ Malver, S/N: MAL1169136 gồm các thiếts bị phụ trợ, Máy tính để bàn HP Core i7&nbsp; (Hệ điều hành Windows 10 Pro), Màn hình LCD 20 inch LED HP223, Máy in: Laser Jet Pro M201d</td><td>Khu Công nghệ cao 2</td></tr><tr><td>84</td><td>Máy đồng hóa mẫu</td><td>IKA T18 basic Ultra Turax</td><td>Khu Công nghệ cao 2</td></tr><tr><td>85</td><td>Máy đông khô</td><td>Ống Ampule loại nhỏ Freezone plus 4.5 benchtop</td><td>Khu Công nghệ cao 2</td></tr><tr><td>86</td><td>Máy khuấy từ gia nhiệt</td><td>IKA</td><td>Khu Công nghệ cao 2</td></tr><tr><td>87</td><td>Máy lắc</td><td>KS 260 basic</td><td>Khu Công nghệ cao 2</td></tr><tr><td>88</td><td>Máy lắc ngang</td><td>GFL 3016</td><td>Khu Công nghệ cao 2</td></tr><tr><td>89</td><td>Máy lắc tròn</td><td>GFL 3015</td><td>Khu Công nghệ cao 2</td></tr><tr><td>90</td><td>Máy ly tâm</td><td>Heittich Rotina_35</td><td>Khu Công nghệ cao 2</td></tr><tr><td>91</td><td>Máy ly tâm</td><td>Hettich Universal 320</td><td>Khu Công nghệ cao 2</td></tr><tr><td>92</td><td>Máy ly tâm</td><td>Lạnh cao tốc loại nhỏ Mikro 220R</td><td>Khu Công nghệ cao 2</td></tr><tr><td>93</td><td>Máy ly tâm</td><td>Loại nhỏ&nbsp; Model 5418</td><td>Khu Công nghệ cao 2</td></tr><tr><td>94</td><td>Máy nghiền mẫu khô</td><td>IKA M20</td><td>Khu Công nghệ cao 2</td></tr><tr><td>95</td><td>Máy nghiền mẫu khô</td><td>IKA MF 10</td><td>Khu Công nghệ cao 2</td></tr><tr><td>96</td><td>Máy phá tế bào bằng siêu âm</td><td>Q125</td><td>Khu Công nghệ cao 2</td></tr><tr><td>97</td><td>Máy quang phổ FT- IR&nbsp;</td><td>Model Alpha,S/N 201418 gồm:Máy chính,Máy vi tính HP 280G2 MT Business PC,Máy in Laser Jet Pro M102a&nbsp; (SN: VNC3J04949),Phần mềm: Opus 7.5, Gói phần mềm OPUS/LAB (Key:Y3212B40Y121),Bộ cell đo, bộ đường chuẩn,Bộ kit phụ kiện</td><td>Khu Công nghệ cao 2</td></tr><tr><td>98</td><td>Mô hình xử lý nước thải</td><td>Bằng&nbsp; phương pháp hập thụ</td><td>Khu Công nghệ cao 2</td></tr><tr><td>99</td><td>Mô hình xử lý nước thải</td><td>Bằng phương pháp tuyến nổi</td><td>Khu Công nghệ cao 2</td></tr><tr><td>100</td><td>Mô hình xử lý nước thải</td><td>Theo phương pháp hóa lý keo đông tụ</td><td>Khu Công nghệ cao 2</td></tr><tr><td>101</td><td>Mô hình xử lý nước thải</td><td>Theo phương pháp kỵ khí Deltalab MP45</td><td>Khu Công nghệ cao 2</td></tr><tr><td>102</td><td>Mô hình xử lý nước thải</td><td>Theo phương pháp sinh học hiếu khí</td><td>Khu Công nghệ cao 2</td></tr><tr><td>103</td><td>Thiết bị khuấy Jartest (6 ống)</td><td>Model: SW6_Cole-Parmer (Stuart)</td><td>Khu Công nghệ cao 2</td></tr><tr><td>104</td><td>Thiết bị làm viên bao Encapsulator</td><td>&nbsp;Model: B-395 Pro_Buchi</td><td>Khu Công nghệ cao 2</td></tr><tr><td>105</td><td>Tủ ấm</td><td>FIOOCHETTI dùng cho BOD, COD</td><td>Khu Công nghệ cao 2</td></tr><tr><td>106</td><td>Tủ ấm lạnh</td><td>DK-LI001 150lit</td><td>Khu Công nghệ cao 2</td></tr><tr><td>107</td><td>Tủ ấm thường</td><td>IF 110 plus</td><td>Khu Công nghệ cao 2</td></tr><tr><td>108</td><td>Tủ ấm</td><td>Windaus Memmert UFC 600</td><td>Khu Công nghệ cao 2</td></tr><tr><td>109</td><td>Tủ hút khí độc</td><td>ADC-4B1</td><td>Khu Công nghệ cao 2</td></tr><tr><td>110</td><td>Tủ hút khí độc</td><td>composite</td><td>Khu Công nghệ cao 2</td></tr><tr><td>111</td><td>Tủ hút khí độc</td><td>Labconco Basic 70</td><td>Khu Công nghệ cao 2</td></tr><tr><td>112</td><td>Tủ lạnh</td><td>&nbsp;-20oC LFG 625</td><td>Khu Công nghệ cao 2</td></tr><tr><td>113</td><td>Tủ sấy chân không</td><td>CV-01</td><td>Khu Công nghệ cao 2</td></tr><tr><td>114</td><td>Tủ sấy chân không</td><td>VO200</td><td>Khu Công nghệ cao 2</td></tr><tr><td>115</td><td>Máy ép thực phẩm</td><td>&nbsp;</td><td>Khu Pilot</td></tr><tr><td>116</td><td>Máy lọc ép</td><td>Model DZF-200</td><td>Khu Pilot</td></tr><tr><td>117</td><td>Máy rửa</td><td>Model MR01_Việt Tiến</td><td>Khu Pilot</td></tr><tr><td>118</td><td>Máy tách xương cá, tôm</td><td>Model CR-900_Shenghui</td><td>Khu Pilot</td></tr><tr><td>119</td><td>Nồi nấu 1 vỏ</td><td>Model: NN1V_Việt Tiến</td><td>Khu Pilot</td></tr><tr><td>120</td><td>Tháp chưng cất thu hồi dung môi</td><td>Model: TCC_Việt Tiến</td><td>Khu Pilot</td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>Ngày đăng: 23/08/2024</strong></p>', NULL, NULL, 1, '2026-06-15 22:57:00', '2026-06-16 15:57:11', '2026-06-16 15:57:11', NULL),
(26, 'Nhân lực Khoa học Công nghệ', 'nhan-luc-khoa-hoc-cong-nghe', 19, NULL, '<h2>Nhân lực Khoa học Công nghệ</h2><p><a href=\"https://ntu.edu.vn/Uploads/23/files/Nhan%20su/Cong%20khai%20ly%20lich%20giang%20vien%207.11.2023.pdf\">♦ Nhân lực khoa học công nghệ (cập nhật đến tháng 11/2023)</a></p><p>♦ <a href=\"https://chuyengia.ntu.edu.vn/\">Cơ sở dữ liệu chuyên gia</a></p>', NULL, NULL, 1, '2026-06-15 22:57:00', '2026-06-16 15:58:29', '2026-06-16 15:58:29', NULL);
INSERT INTO `pages` (`id`, `title`, `slug`, `parent_id`, `excerpt`, `content`, `image`, `file`, `status`, `published_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(27, 'Mạng lưới đối tác', 'mang-luoi-doi-tac', 20, NULL, '<h2>Mạng lưới đối tác</h2><p>Thực hiện chính sách đổi mới và mở cửa của Chính phủ Việt Nam, Trường đã nhanh chóng phát triển quan hệ quốc tế với trọng tâm là hợp tác đào tạo và nghiên cứu, trao đổi thông tin khoa học và văn hóa, nâng cao chất lượng đội ngũ giảng viên, nâng cao năng lực nghiên cứu của giảng viên. và các nhà nghiên cứu cũng như nâng cấp các cơ sở đào tạo và nghiên cứu.</p><p>Trải qua hơn 60 năm phát triển, Trường ĐHNT đã đạt được những thành tựu đáng kể không chỉ trong đào tạo, nghiên cứu khoa học mà còn trong hợp tác quốc tế. Cho đến nay, NTU đã thiết lập mối quan hệ với khoảng 100 tổ chức quốc tế, các trường đại học và học viện trong khu vực và trên thế giới. Trở thành đối tác được nhiều tổ chức quốc tế lựa chọn, chúng tôi đã hợp tác thành công để triển khai các chương trình cấp bằng quốc tế bao gồm chương trình NOMA-FAME - chương trình Thạc sĩ Kinh tế Thủy sản và Nuôi trồng (với các đối tác Na Uy), chương trình NORHED - chương trình Thạc sĩ về Hệ sinh thái biển Quản lý và Biến đổi khí hậu (với đối tác Na Uy), chương trình cử nhân song ngữ Pháp-Việt và chương trình thạc sĩ song ngữ Pháp-Anh về Quản trị kinh doanh và Du lịch (với đối tác Pháp), và chương trình Thạc sĩ Công nghệ thực phẩm (với đối tác Bỉ), v.v. Cùng với các chương trình cấp bằng, các khóa đào tạo ngắn hạn do NTU thiết kế dựa trên yêu cầu cụ thể của đối tác cũng trở nên phổ biến. Các chương trình này được triển khai thường xuyên từ năm 2009 và đã thu hút nhiều sinh viên đến từ các trường đại học Mỹ, Úc, Cộng hòa Séc, Hàn Quốc, ...</p><p>Bên cạnh đó, từ năm 2016, NTU đã tham gia ILP - International Linkage Program - một hợp tác liên kết. do Đại học Kagoshima khởi xướng. Trở thành một trong tám thành viên của ILP là cơ hội quý giá để chúng tôi đóng góp thế mạnh của mình cho mạng lưới đào tạo nguồn nhân lực trong lĩnh vực thủy sản nhiệt đới. Thông qua chương trình, nhiều cơ hội học tập và thực hiện nghiên cứu đã được cấp cho sinh viên của NTU. Chúng tôi tự hào đã đặt nền móng cho nhiều người thành công trên các con đường khác nhau của cuộc sống. Sinh viên quốc tế của chúng tôi đã công bố nghiên cứu của mình trên các tạp chí khoa học uy tín, nhận học bổng để nghiên cứu thêm ở các nước phát triển hoặc trở thành lãnh đạo của các hiệp hội. Bằng việc tiếp tục đẩy mạnh và đa dạng hóa nội dung cũng như hình thức chương trình đào tạo, NTU quyết tâm tiếp tục là điểm đến giáo dục độc đáo, thú vị và bổ ích cho sinh viên quốc tế.</p><figure class=\"table\"><table><tbody><tr><td><strong>Châu lục</strong></td><td><strong>Quốc gia</strong></td><td><strong>Tổ chức</strong></td></tr><tr><td rowspan=\"13\"><p>Châu Á</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></td><td>Trung Quốc</td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Su%20pham%20Quang%20Tay.pdf?ver=2020-04-16-170657-580\">Đại học Sư phạm Quảng Tây</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/DH%20Thuy%20san%20Thuong%20Hai%209_2003.pdf?ver=2020-04-20-143602-893\">Đại học Hải dương Thượng Hải</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/LinkClick.aspx?fileticket=LmW5Sqx1cPU%3d&amp;portalid=0\">Đại học Qiongzhou</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Quang%20Tay.pdf?ver=2020-04-20-144134-267\">Viện Vật lý Ứng dụng, Học viện Khoa học Quảng Tây</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(4)/CAU.pdf?ver=2020-04-17-103949-887\">Đại học Nông nghiệp Trung Quốc</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Tongwei.pdf?ver=2020-04-20-105429-283\">Công ty TNHH Tongwei Việt Nam</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Đại học Vũ Hán</p></td></tr><tr><td><p>Đài Loan</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Đại học Yuan Ze</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Đại học Chang Gung</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Chi%20Nan%20Taiwan.pdf?ver=2020-08-04-100035-640\">Đại học Quốc gia Chi Nan</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Wufeng%20University.pdf?ver=2020-06-17-080543-983\">Đại học Wufeng</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Pingtung%20Uni.pdf?ver=2020-05-22-090506-897\">Đại học Quốc gia Pingtung</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Feng%20Chia.pdf?ver=2020-05-08-090017-097\">Đại học Feng Chia</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Chiayi.pdf?ver=2020-05-04-104754-773\">Đại học Quốc gia Chiayi</a></p><p>·&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/Hop%20tac%203%20ben%20NTU-%20NTOU%20-%20Chen-Yung.pdf?ver=2020-04-17-095227-120\">Hợp tác ba bên:</a></p><p>· Chen-Yung Memorial Foundation, Inc.</p><p>· Đại học Nha Trang</p><p>· Đại học hải dương quốc gia Đài Loan</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/Hop%20tac%203%20ben%20NTU-%20NPUST%20-%20Chen-Yung.pdf?ver=2020-04-17-095205-037\">Hợp tác ba bên:</a></p><p>· Chen-Yung Memorial Foundation, Inc.</p><p>.&nbsp;Đại học Nha Trang</p><p>. Đại học Khoa học và Công nghệ Quốc gia Penghu</p><p>. Chen-Yung Memorial Foundation, Inc.</p><p>. Đại học Nha Trang</p><p>. Đại học Khoa học và Công nghệ Quốc gia Cao Hùng</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Hop%20tac%203%20ben%20NTU%20-%20Cao%20Hung%20-%20Chen%20Yung.pdf?ver=2020-04-17-092420-883\">Hợp tác ba bên:</a></p><p>·&nbsp;<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/Meiho%20-%20Taiwan.pdf?ver=2020-04-17-095100-787\">Đại học Meiho</a></p><p>·&nbsp;<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Kaohgiung%202019.pdf?ver=2020-04-20-111655-310\">Đại học Khoa học và Công nghệ Quốc gia Cao Hùng</a></p><p>·&nbsp;<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Yunlin%20Uni.pdf?ver=2020-04-20-083118-890\">Đại học Khoa học và Công nghệ Quốc gia Yunlin&nbsp;</a></p><p>·&nbsp;<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Penghu.pdf?ver=2020-04-17-092419-710\">Đại học Khoa học và Công nghệ Quốc gia Penghu</a></p><p>·&nbsp;<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/NTOU%202016.pdf?ver=2020-04-20-090129-777\">Đại học Đại dương Quốc gia Đài Loan (NTOU)</a></p><p>·&nbsp;<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Shu%20-%20Te%20Uni.pdf?ver=2020-04-20-111407-497\">Đại học Shu-Te</a></p><p>·&nbsp;<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/I%20-%20Shou.pdf?ver=2020-04-20-083529-597\">Đại học I-Shou</a></p><p>·&nbsp;<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(4)/Lunghwa%20Uni.pdf?ver=2020-04-17-103736-433\">Đại học Khoa học và Công nghệ Lunghwa</a></p><p>·&nbsp;<a href=\"https://en.ntu.edu.vn/LinkClick.aspx?fileticket=LIzps6VPI3s%3d&amp;portalid=0\">Đại học Sư phạm Quốc gia Đài Trung</a></p></td></tr><tr><td><p>Hàn Quốc</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Incheon National University</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; INU Research and Business Foundation</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Incheon Technology Campus of Korea Polytechnic</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/PKNU%202019.pdf?ver=2020-04-17-095004-507\">Pukyong National University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Hop%20tac%204%20ben%20voi%20Vien%20bien%20HQ.pdf?ver=2020-04-17-092419-163\">4 parties cooperation:</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Korea Maritime Institute</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; International Seafood Trade&nbsp;Forum</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VASEP</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Ngoai%20ngu%20Busan.pdf?ver=2020-04-17-092417-850\">Busan University&nbsp;of&nbsp;Foreign Studies&nbsp;</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Ulsan%20University.pdf?ver=2020-04-16-171745-283\">University of Ulsan</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Sejong%20Uni.pdf?ver=2020-04-20-082947-473\">Sejong University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<a href=\"http://eng.uc.ac.kr/CmsHome/MainDefault.jsp\">Ulsan College</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Dudu%20IT.pdf?ver=2020-04-17-092418-600\">DUDU IT, Co. Ltd.,</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chonnam National University</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(4)/Hanseo%20Uni%204_2013.pdf?ver=2020-04-17-103646-163\">Hanseo University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Yeungnam%20.pdf?ver=2020-04-20-083821-980\">Yeongnam University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"http://www.hyundai-vinashin.com/index.php\">Hyundai-Vinashin</a></p></td></tr><tr><td><p>Nhật bản</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/TUMSAT%202016.pdf?ver=2020-04-16-171746-190\">Tokyo University of Marine Science and Technology</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Kagoshima%20Uni.pdf?ver=2020-04-17-092424-133\">Kagoshima University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(4)/Kanagawa.pdf?ver=2020-04-17-103208-360\">Kanagawa Institute of Technology</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/JLAN.pdf?ver=2020-04-17-092420-493\">Japanese Language Association For Non Kanji Using Learners (JLAN)</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Kanazawa%20Uni.pdf?ver=2020-04-20-083957-387\">Kanazawa University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Nagaoka%20Uni.pdf?ver=2020-04-20-112256-840\">Nagaoka University of Technology</a></p></td></tr><tr><td>Thái Lan</td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Khon Kaen University</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Maejo%20Uni%20Thailand.pdf?ver=2020-10-13-105003-197\">Maejo University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/Srinakharinwirot%20-%20Thai%20Lan.pdf?ver=2020-04-17-095357-107\">Srinakharinwirot University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/LinkClick.aspx?fileticket=RhUu3laXKTQ%3d&amp;portalid=0\">Udon Thani Rajabhat University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/AIT.pdf?ver=2020-04-20-112438-660\">Asian Institute of Technology (AIT)</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Songkla.pdf?ver=2020-04-16-171749-377\">Prince of&nbsp; Songkla University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(4)/Burapha%205_2013.pdf?ver=2020-04-17-103431-770\">Burapha University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/SEAFDEC.pdf?ver=2020-04-20-112605-163\">Southeast Asian Fisheries Development Center (SEAFDEC)</a></p></td></tr><tr><td><p>Lào</p><p>&nbsp;</p></td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(4)/Champasack%20Uni%206_2012.pdf?ver=2020-04-17-103408-910\">Champasak University</a></td></tr><tr><td>Singapore</td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/AVNET.pdf?ver=-GqI8KHwwrUEFRhhH_QB6A%3d%3d\">AVNET</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ea<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/EASB%20(Hoc%20vien%20quan%20ly%20Singapore).pdf?ver=2020-04-20-112657-907\">st Asia Institute of Management</a></p></td></tr><tr><td><p>Indonesia</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Universitas%20Padjadjaran%20-%20Indonesia.pdf?ver=616LIDEYpxhtg-QfTlu3BQ%3d%3d\">Padjadjran University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Mercu%20Buana%20-%20Indo.pdf?ver=2020-04-20-112741-620\">Universitas Mercu Buana</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/Bogor%20Uni%20-%20Indonesia.pdf?ver=2020-04-17-095026-567\">Bogor Agricultural University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Jenderal%20Soedirman%20University%20-%20Indonesia.pdf?ver=2020-04-20-083151-373\">Jenderal Soedirman University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</p></td></tr><tr><td>Philippines</td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Davao%20-%20Phillipines.pdf?ver=2020-04-17-092424-963\">Davao Del Norte State College</a></p><p>&nbsp;</p></td></tr><tr><td>Bangladesh</td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Noakhali-%20Bangladesh.pdf?ver=2020-04-17-092425-103\">Noakhali Science and Technology</a></td></tr><tr><td>HongKong</td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Alfred%20Nobel%20OBS%20Hongkong.pdf?ver=2020-04-16-170658-377\">Alfred Nobel Open Business School</a></td></tr><tr><td>Malaysia</td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; INTI International University</td></tr><tr><td>Ấn Độ</td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/LinkClick.aspx?fileticket=znm2nRLRh9o%3d&amp;portalid=0\">Karpagam Academy of Higher Education (KAHE)</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/LinkClick.aspx?fileticket=lSjJ2OBQkvk%3d&amp;portalid=0\">Gitarattan International Business School</a></p></td></tr><tr><td rowspan=\"2\"><p>Bắc Mỹ</p><p>&nbsp;</p></td><td><p>Hoa Kỳ</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/LinkClick.aspx?fileticket=GCMThXOFXow%3d&amp;portalid=0\">World&nbsp;Learning, Inc.</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/MOU%20-%20Keuka%20College%20(USA).pdf?ver=sKaEHoerD-bqEucyVd_Suw%3d%3d\">Keuka College</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/MOU%20-%20Evergreen%20(USA).pdf?ver=hgkOcrGECe11z438dksDdA%3d%3d\">Evergreen</a> State College</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/Smithsonian%20Institution%2027_12_19.pdf?ver=2020-04-17-094940-113\">The National Museum of Natural History, Smithsonian Institution</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Ohio.pdf?ver=2020-04-16-170700-643\">Ohio University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Western%20Michigan.pdf?ver=2020-04-16-170659-550\">Western Michigan University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Rhode%20Island.pdf?ver=2020-04-16-170658-970\">The University of Rhode Island</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/LinkClick.aspx?fileticket=WtHYXoLNcOw%3d&amp;portalid=0\">Texas A&amp;M University-Corpus Christi</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Misisisppi%20state.pdf?ver=2020-04-20-112826-450\">Mississippi State University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/UNLV.pdf?ver=2020-04-16-170659-190\">University of Nevada, Las Vegas</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/LinkClick.aspx?fileticket=PHK9g6y3Wm8%3d&amp;portalid=0\">Old Dominion University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"http://www.ivce.org/\">The Institute for Vietnamese Culture &amp; Education</a></p></td></tr><tr><td><p>Canada</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/MI%20Canada.pdf?ver=2020-04-16-170658-347\">Fisheries and Marine Institute, Memorial University of Newfoundland</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/WUSC%203_2009.pdf?ver=2020-04-20-100036-513\">World University Service of Canada</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Brock%20University.pdf?ver=2020-04-20-100115-030\">Brock University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/LinkClick.aspx?fileticket=2QgBhKHlBYU%3d&amp;portalid=0\">College of Dorset</a></p><p>&nbsp;</p></td></tr><tr><td>Nam Mỹ</td><td>Brazil</td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Minas%20Brazil.pdf?ver=2020-04-16-170656-737\">Fundacao De Ensino E Pesquisa Do Sul De Minas, Brazil</a></td></tr><tr><td rowspan=\"14\"><p>Châu Âu</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></td><td>Na Uy</td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Norwegian University of Science &amp; Technology</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; University of Bergen</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/NCFS%2031122008.pdf?ver=2020-04-20-114417-983\">University of Tromso</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Norwegian Agency for Development cooperation (NORAD)</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SINTEF Institute</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; National Institute of Nutrition and Seafood Research (NIFES)</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The Norwegian Program for Development, Research &amp; Education</p></td></tr><tr><td><p>Cộng Hòa Séc</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/Jan%20Evangalista%20Usti%20nad%20Labem%20-%20CH%20Sec.pdf?ver=2020-04-17-095254-967\">Jan Evangelista Purkyně University in&nbsp;</a>Ustí nad Labem<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/Jan%20Evangalista%20Usti%20nad%20Labem%20-%20CH%20Sec.pdf?ver=2020-04-17-095254-967\">(UJEP)</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Liberec%20(new).pdf?ver=2020-04-16-171746-300\">Technical University of Liberec (TUL)</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(4)/South%20Bohemia.pdf?ver=2020-04-17-103713-057\">University of South Bohemia</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Ostrava.pdf?ver=2020-04-20-113231-237\">University of Ostrava</a></p></td></tr><tr><td><p>Pháp</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Le%20Mans.pdf?ver=2020-04-20-101029-297\">Le Mans University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/New%20Caledonia.pdf?ver=2020-04-17-095132-803\">University of New Caledonila&nbsp;</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Rochelle.pdf?ver=2020-04-17-092418-743\">La Rochelle Business School</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Perpignan.pdf?ver=2020-04-17-092419-273\">L’Universite De Perpignan Via Domita</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Liseron.pdf?ver=2020-04-17-092421-023\">L’Association le Liseron de France</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/AUF%202016.PDF?ver=2020-04-20-101116-360\">L\'Agence universitaire de&nbsp;la&nbsp;Francophonie&nbsp;</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Toulouse%20-%20Phap.pdf?ver=2020-04-20-100938-280\">Toulouse National University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/IFI%20(Vien%20tin%20hoc%20Phap%20ngu).pdf?ver=2020-04-20-101216-703\">Institute of France for Informatics</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/LinkClick.aspx?fileticket=ZACU_frzMaI%3d&amp;portalid=0\">Université d\'Auvergne</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Toulon.pdf?ver=2020-04-16-171746-957\">University of Toulon</a></p></td></tr><tr><td><p>Nga</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/Kaliningrad%20-%20Russia.pdf?ver=2020-04-17-095455-997\">Kaliningrad State Technical University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/PIBOC%20Russia.pdf?ver=2020-04-16-171747-830\">G.B. Elyakov Pacific Institute of Bioorganic Chemistry, Far East Branch of the Russian Acemedy of Sciences</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/PSUE.pdf?ver=2020-04-20-083701-387\">Pacific State University of Economics</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Maritime%20State%20Uni_%20after%20Admiral%20Nevelskoy.pdf?ver=2020-04-20-101334-767\">Maritime State University named after Admiral G.I. Nevelskoy</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Astrakhan%20Uni.pdf?ver=2020-04-20-083847-573\">Astrakhan State Technical University</a></p></td></tr><tr><td><p>Anh</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Wolverhampton.pdf?ver=2020-09-29-161246-913\">University of Wolverhampton</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Abertay.pdf?ver=2020-04-17-092420-257\">Abertay University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Plymouth%20Uni.pdf?ver=2020-04-20-101449-767\">Plymouth University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Stirling.pdf?ver=2020-04-20-101525-203\">The University of&nbsp;Stirling</a></p></td></tr><tr><td>Bỉ</td><td><a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Vlir%20network.pdf?ver=2020-04-20-104000-280\">VLIR Network</a></td></tr><tr><td><p>ICELAND</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Iceland.pdf?ver=2020-04-16-170657-017\">Iceland University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(4)/UNU-FTP.pdf?ver=2020-04-17-103238-687\">United Nations University - Fisheries Training Programme</a></p></td></tr><tr><td><p>KAZAKHSTAN</p><p>&nbsp;</p></td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; West-Kazakhstan Agrarian-Technical University named after Zhangir khan</td></tr><tr><td>Đan Mạch</td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/DTU%20Denmark.pdf?ver=2020-04-16-170658-533\">National Institute of Aquatic Resources, Technical University of Denmark&nbsp;</a></td></tr><tr><td>SWITZERLAND</td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Geneva%20business.pdf?ver=2020-04-17-092420-960\">Geneva&nbsp;Business School</a></td></tr><tr><td>ITALY</td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Uni%20of%20Cassino%20(Italia).pdf?ver=2020-04-20-104117-513\">University of Cassino and Southern Lazio</a></td></tr><tr><td>BULGARIA</td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/ESFAM%20Bulgary.pdf?ver=2020-08-06-100125-357\">The Specialized Administration and Management Institute of La Francophonie&nbsp;(ESFAM)</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Varnar%20University%20of%20Management.pdf?ver=2020-04-17-092424-667\">Varna University of Management</a></p></td></tr><tr><td>BELARUS</td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/Polotsk%20State%20Uni%20-%20Belarus.pdf?ver=2021-07-14-091032-780\">Polotsk State University</a></td></tr><tr><td>Thụy Điển</td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/Halmstad%20University.pdf?ver=PLdmfSaHh0qymAVoPZKL5w%3d%3d\">Halmstad University</a></td></tr><tr><td rowspan=\"2\"><p>Châu Úc</p><p>&nbsp;</p></td><td><p>Úc</p><p>&nbsp;</p></td><td><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU/SCU%202016.pdf?ver=2020-04-16-171745-657\">Southern Cross University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(4)/James%20Cook%20Uni%207_2012.pdf?ver=2020-04-17-103315-503\">James Cook University</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Australian Volunteers International (AVI)</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Sunshine%20Coast.pdf?ver=2020-04-20-114135-320\">University of Sunshine Coast</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Agency%20for%20Food%20and%20Fibre%20Sicences.pdf?ver=2020-04-20-113427-230\">Agency for Food and Fibre Sciences</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ACIAR</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CSIRO</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(4)/New%20Castle%20Uni.pdf?ver=2020-04-17-103924-290\">The University of Newcastle</a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; International College of Advanced Education (ICAE)&nbsp;</p></td></tr><tr><td><p>NEW ZELAND</p><p>&nbsp;</p></td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(5)/Massey%20Uni%20-%20New%20Zealand.pdf?ver=2020-04-20-113619-360\">Massey University</a></td></tr><tr><td rowspan=\"3\"><p>Châu Phi</p><p>&nbsp;</p></td><td>NIGERIA</td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/ACCARD.pdf?ver=2020-04-17-092424-837\">African Center for Climate Actions and Rural Development</a></td></tr><tr><td>Đa quốc gia</td><td>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(2)/UNCTAD.pdf?ver=2020-04-17-092423-087\">UNCTAD, UNITED NATIONS</a></td></tr><tr><td>Đa quốc gia</td><td><p><a href=\"https://en.ntu.edu.vn/Portals/0/userfiles/196/MoU%20(3)/ILP%202019.pdf?ver=2020-04-17-095255-200\"><strong>Master Program on Tropical Fisheries with International Linkage (ILP)</strong></a></p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kagoshima University, Japan</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; University Malaysia Terengganu, Malaysia</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sam Ratulangi University, Indonesia</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; University of the Philippines Visayas, the Philippines</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kasetsart University, Thailand</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nha Trang University, Vietnam</p><p>·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; IPB University, Indonesia</p></td></tr></tbody></table></figure>', NULL, NULL, 1, '2026-06-15 22:58:00', '2026-06-16 15:59:16', '2026-06-16 15:59:16', NULL),
(28, 'Hoạt động hợp tác', 'hoat-dong-hop-tac', 20, NULL, '<h4>Hoạt động hợp tác</h4><figure class=\"table\"><table><tbody><tr><td><strong>STT</strong></td><td><strong>Hoạt động hợp tác</strong></td><td><strong>Các nhà tài trợ</strong></td><td><strong>Thời gian</strong></td></tr><tr><td>1</td><td>Ngăn ngừa, giảm thiểu và tái chế rác thải ngư cụ gây ô nhiễm tại các vùng biển Việt Nam (NET-works)</td><td><p>Bộ Môi trường, Bảo tồn tài nguyên, An ninh nguyên tử và Bảo vệ người tiêu dùng của Cộng hòa Liên bang Đức</p><p>&nbsp;</p></td><td>2023 - 2025</td></tr><tr><td>2</td><td>Kết nối khoảng cách số giữa Mông Cổ và Việt Nam thông qua chuyển đổi số tại các cơ sở giáo dục đại học (DIGITAL - MOVE)</td><td>Viện Đại học CITI, Mông Cổ</td><td>2023 - 2026</td></tr><tr><td>3</td><td>Thúc đẩy đổi mới sáng tạo và khởi nghiệp trong lĩnh vực du lịch&nbsp;&nbsp; sinh thái để hỗ trợ phát triển bền vững tại Việt Nam và Philippines.&nbsp;( ECOViP)</td><td>Cơ quan Điều hành Giáo dục, Nghe nhìn và Văn hóa (EACEA) thuộc Ủy ban Châu Âu</td><td>2023 - 2026</td></tr><tr><td>4</td><td>Dự án REAS-SEA \"Hệ thống năng lượng xanh trí tuệ nhân tạo có khả năng phục hồi với giải pháp thời gian thực để nuôi trồng thủy sản hiệu quả\" (Resilient Artificial Intelligence of Things (AIoT) Green Energy System with Real-time Solution for Effective Aquaculture)</td><td>The National Institute of Information and Communications Technology, Japan; (chủ trì)</td><td>2022 - 2025</td></tr><tr><td>5</td><td><p>Dự án mở khóa đào tạo và chương trình trao đổi cán bộ về kiểm soát và giám sát liên quan đến đánh bắt cá bất hợp pháp, không được kiểm soát và không được báo cáo và thúc đẩy nghề cá bền vững ở Đông Nam Á (IUU)</p><p>The provision of an illegal, unregulated and unreported (IUU) fishing related monitoring, control and surveillance (MCS) training course and officer exchange program</p></td><td>Chính phủ Úc</td><td>2022 - 2027</td></tr><tr><td>6</td><td>Dự án Quản lý và Phục hồi rừng ngập mặn ở phía bắc tỉnh Khánh Hòa - Hướng tới cảnh quan bền vững (Management and restoration mangrove forests in the north of Khanh Hoa Province - Toward sustainable landscape)</td><td>Lãnh sự quán Hoa Kỳ</td><td>10/2022 - 10/2024</td></tr><tr><td>7</td><td>Hợp tác nghiên cứu và phát triển – BioSO4</td><td>BioSO4 Oy, Finland</td><td>2022 - 2025</td></tr><tr><td>8</td><td>Dự án Xây dựng Nền tảng Đào tạo An ninh Mạng Trực tuyến / Ngoại tuyến tại Trường Đại học Nha Trang</td><td>DUDU IT CO., LTD</td><td>2022 - 2024</td></tr><tr><td>9</td><td>Dự án Quản lý tài nguyên biển ven bờ dựa vào hệ sinh thái</td><td>Cơ quan Hợp tác Phát triển Na Uy</td><td>2021 - 2026</td></tr><tr><td>10</td><td>Dự án Đổi mới hệ thống TVET của Việt Nam để phát triển bền vững (dự án VIETSKILL)</td><td>Trường Kinh doanh Copenhagen (Đan Mạch)</td><td>2020 - 2022</td></tr><tr><td>11</td><td>Chương trình Học bổng Tiếng Anh Access English Access Microscholarship</td><td>Bộ ngoại giao Hoa Kỳ</td><td><p>2020 - 2021</p><p>2017 - 2019</p></td></tr><tr><td>12</td><td>Dự án Nâng cao năng lực về môi trường trong giáo dục nghề cá châu Á để phát triển bền vững (dự án TUNASIA)</td><td>Ủy ban Châu Âu</td><td>2018 - 2021</td></tr><tr><td>13</td><td>Dự án TEAM-SIE «Hợp tác Giáo dục và Nghiên cứu thông qua Trao đổi học thuật, Hợp tác giữa các trường đại học và doanh nghiệp và Chương trình liên kết sau đại học về Phát triển Bền vững, Đổi mới sáng tạo và Tinh thần doanh nhân».&nbsp;</td><td>Hội đồng Anh</td><td>2018 - 2020</td></tr><tr><td>14</td><td>Dự án xây dựng sân chơi cho trẻ em Trường Tiểu học Cam Thịnh Tây, xã Cam Thịnh Tây, TP Cam Ranh, Khánh Hòa</td><td>Tổng lãnh sự quán Úc tại Tp. HCM</td><td>2018 - 2019</td></tr><tr><td>15</td><td>Dự án ClimeFish “Thiết lập khung quyết định nhằm đảm bảo sản xuất thủy sản bền vững ở Việt Nam dưới tác động của biến đổi của khí hậu”.</td><td>Đại học Tromso, Na Uy</td><td>2017 - 2020</td></tr><tr><td>16</td><td>Dự án “Tăng cường năng lực hệ thống giáo dục đại học Việt Nam nhằm hỗ trợ khả năng tìm kiếm việc làm của sinh viên sau tốt nghiệp và phát triển kỹ năng khởi nghiệp.” (dự án V2WORK)</td><td>EU</td><td>2017 - 2021</td></tr><tr><td>17</td><td>Di truyền bảo tồn để cải thiện đa dạng sinh học và quản lý tài nguyên ở Đồng bằng sông Cửu Long đang thay đổi</td><td>USAID</td><td>2014 - 2016&nbsp;</td></tr><tr><td>18</td><td>Đánh giá rủi ro ký sinh trùng với các công cụ tích hợp trong chuỗi giá trị sản xuất cá của EU&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</td><td>&nbsp;Liên minh Châu Âu</td><td>&nbsp;2013 - 2015</td></tr><tr><td>19</td><td>Nâng cao năng lực cạnh tranh của đội ngũ cán bộ trẻ và nữ tại Trường Đại học Nha Trang</td><td>Đại sứ quán Na Uy tại Hà Nội</td><td>&nbsp;2012 - 2013</td></tr><tr><td>20</td><td>Sự phát triển nuôi tôm hùm gai ở Indonesia, Việt Nam và Úc</td><td>ACIAR, Úc</td><td>&nbsp;2008 - 2013</td></tr><tr><td>21</td><td>Nâng cao năng lực đào tạo và nghiên cứu của Trường Đại học Nha Trang, Việt Nam (giai đoạn 2)</td><td>NORAD, Na Uy</td><td>&nbsp;2008 - 2012</td></tr><tr><td>22</td><td>Dự án liên kết đào tạo giữa NTU và Đại học Kỹ thuật Liberec để đào tạo kỹ sư cơ khí</td><td>&nbsp;Chính phủ Cộng hòa Séc (thông qua TUL)</td><td>&nbsp;2007 - 2011</td></tr><tr><td>23</td><td>&nbsp;Tăng cường năng lực về thể chế và con người để hỗ trợ một khuôn khổ phù hợp cho phát triển nông thôn ở tỉnh Khánh Hòa (giai đoạn 2)</td><td>&nbsp;AECI, Tây Ban Nha</td><td>&nbsp;2006 - 2007</td></tr><tr><td>24</td><td>&nbsp;Tăng cường năng lực về thể chế và con người để hỗ trợ một khuôn khổ phù hợp cho phát triển nông thôn ở tỉnh Khánh Hòa (giai đoạn 1)</td><td>&nbsp;AECI, Tây Ban Nha</td><td>&nbsp;2005 - 2006</td></tr><tr><td>25</td><td>&nbsp;Nuôi tôm hùm gai nhiệt đới bền vững ở Việt Nam và Úc &nbsp;</td><td>&nbsp;ACIAR, Úc</td><td>&nbsp;2005 - 2008</td></tr><tr><td>26</td><td>&nbsp;Nâng cao năng lực đào tạo và nghiên cứu của Trường Đại học Nha Trang, Việt Nam (giai đoạn 1)</td><td>&nbsp;NORAD, Na Uy</td><td>&nbsp;2003 - 2007</td></tr><tr><td>27</td><td>&nbsp;Nuôi trồng thủy sản và môi trường ven biển: Cùng tồn tại và Bền vững</td><td>&nbsp;Hội đồng Anh</td><td>&nbsp;2003 - 2006</td></tr><tr><td>28</td><td>&nbsp;Nuôi thâm canh cá vây tay biển trong ao nuôi</td><td>&nbsp;CARD, Australia</td><td>&nbsp;2004 - 2007</td></tr><tr><td>29</td><td>&nbsp;Hướng dẫn ước lượng và tính toán sức tải môi trường cho nuôi trồng thủy sản biển ở các nước nhiệt đới (Dự án TROPECA)</td><td>&nbsp;DFID, Vương quốc Anh</td><td>&nbsp;2002 - 2004</td></tr><tr><td>30</td><td>&nbsp;Đánh giá nguyên nhân ảnh hưởng đến môi trường và tài nguyên biển đầm Nại, tỉnh Ninh Thuận</td><td>&nbsp;IDRC, Canada</td><td>&nbsp;2000 - 2001</td></tr><tr><td>31</td><td>&nbsp;Điều tra lồng bè nuôi cá mú trên biển ở Việt Nam và Châu Á</td><td>&nbsp;DFID (thông qua đại học&nbsp; &nbsp;Stirling, Vương quốc Anh)</td><td>&nbsp;1999 - 2000</td></tr><tr><td>32</td><td>&nbsp;Nâng cao năng lực và mở rộng Thư viện Đại học Nha Trang</td><td>&nbsp;Ngân hàng Thế giới</td><td>&nbsp;2001 - 2002</td></tr><tr><td>33</td><td>&nbsp;Nuôi trồng thủy sản biển Việt Nam</td><td>&nbsp;NUFU, Na Uy</td><td>&nbsp;2002 - 2006</td></tr><tr><td>34</td><td>&nbsp;Nâng cao năng lực nghiên cứu và phát triển thức ăn thủy sản cho nuôi trồng thủy sản thâm canh ở Việt Nam</td><td>&nbsp;CARD, Úc</td><td>&nbsp;2000 - 2002</td></tr><tr><td>35</td><td>&nbsp;Nâng cao năng lực của Khoa Nuôi trồng Thủy sản</td><td>&nbsp;DANIDA, Đan Mạch&nbsp; (thông qua AIT)</td><td>&nbsp;1998 - 2001</td></tr><tr><td>36</td><td>&nbsp;NUFU Pro.69/96 (giai đoạn 1)</td><td>&nbsp;NUFU, Na Uy</td><td>&nbsp;1997 - 2000</td></tr><tr><td>37</td><td><a href=\"https://ntu.edu.vn/Uploads/6/hop-tac-doi-ngoai/EMSIV.pdf\">Nâng cao năng lực cho sinh viên dân tộc thiểu số tại Việt Nam” (EMSIV), tài trợ bởi Cơ quan Điều hành Văn hóa và Giáo dục Châu Âu (EACEA) thuộc Ủy ban Châu Âu (EC)</a></td><td>EACEA, EC</td><td>2024-2027</td></tr><tr><td>38</td><td>Tăng cường hòa nhập kỹ thuật số trong các cơ sở giáo dục Việt Nam” (DIVE), tài trợ bởi Cơ quan Điều hành Văn hóa và Giáo dục Châu Âu (EACEA) thuộc Ủy ban Châu Âu (EC)</td><td>EACEA, EC</td><td>2024-2027</td></tr></tbody></table></figure><p><br>&nbsp;</p>', NULL, NULL, 1, '2026-06-15 22:59:00', '2026-06-16 15:59:58', '2026-06-16 15:59:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_installed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `name`, `slug`, `provider`, `description`, `status`, `created_at`, `updated_at`, `is_active`, `is_installed`) VALUES
(1, 'Announcement', 'announcement', 'Platform\\Plugins\\Announcement\\Providers\\AnnouncementServiceProvider', NULL, 1, '2026-06-12 07:24:39', '2026-06-15 03:42:30', 1, 1),
(3, 'Banner', 'banner', 'Platform\\Plugins\\Banner\\Providers\\BannerServiceProvider', NULL, 1, '2026-06-12 07:24:39', '2026-06-12 07:49:41', 1, 1),
(4, 'Blog', 'blog', 'Platform\\Plugins\\Blog\\Providers\\BlogServiceProvider', NULL, 1, '2026-06-12 07:24:39', '2026-06-12 07:35:52', 1, 1),
(5, 'Event', 'event', 'Platform\\Plugins\\Event\\Providers\\EventServiceProvider', NULL, 1, '2026-06-12 07:53:51', '2026-06-16 02:06:00', 1, 1),
(7, 'Quick Link', 'quick-link', 'Platform\\Plugins\\QuickLink\\Providers\\QuickLinkServiceProvider', NULL, 1, '2026-06-12 16:18:39', '2026-06-12 16:26:13', 1, 1),
(8, 'Admission', 'admission', 'Platform\\Plugins\\Admission\\Providers\\AdmissionServiceProvider', NULL, 1, '2026-06-12 17:20:07', '2026-06-12 17:39:27', 1, 1),
(10, 'Project', 'project', 'Platform\\Plugins\\Project\\Providers\\ProjectServiceProvider', NULL, 1, '2026-06-12 21:03:01', '2026-06-12 21:09:39', 1, 1),
(12, 'Video', 'video', 'Platform\\Plugins\\Video\\Providers\\VideoServiceProvider', NULL, 1, '2026-06-12 23:16:57', '2026-06-12 23:36:37', 1, 1),
(13, 'About Link', 'about-link', 'Platform\\Plugins\\AboutLink\\Providers\\AboutLinkServiceProvider', NULL, 1, '2026-06-13 02:07:37', '2026-06-13 02:10:38', 1, 1),
(14, 'Footer', 'footer', 'Platform\\Plugins\\Footer\\Providers\\FooterServiceProvider', NULL, 1, '2026-06-13 03:03:37', '2026-06-13 03:23:34', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `author_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `content`, `image`, `views`, `status`, `is_featured`, `author_id`, `created_at`, `updated_at`) VALUES
(1, 'Sinh viên NTU tự tin tranh tài tại Chung kết Olympic tiếng Anh không chuyên 2026', 'sinh-vien-ntu-tu-tin-tranh-tai-tai-chung-ket-olympic-tieng-anh-khong-chuyen-2026-1', NULL, '<p><strong>Ngày 24/5/2026, Trường Đại học Nha Trang tổ chức Vòng chung kết Cuộc thi Olympic Tiếng Anh không chuyên năm 2026 với sự tham gia tranh tài của 5 đội thi xuất sắc đến từ các khoa, trường chuyên ngành trong toàn Trường. Tham dự chương trình có TS. Trần Doãn Hùng – Phó Hiệu trưởng Nhà trường cùng đại diện lãnh đạo các khoa, trường chuyên ngành, đơn vị và hơn 700 sinh viên Nhà trường.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/10905/img/olym-ta_nhat2-260525153749.jpg\" alt=\"Sinh viên NTU tự tin tranh tài tại Chung kết Olympic tiếng Anh không chuyên 2026\" width=\"4608\" height=\"3072\"></p><p><i>Ban Tổ chức trao giải Nhất cho đội ROBOSAPIEN đến từ Trường Kinh tế và Kinh doanh tại cuộc thi Olympic Tiếng Anh không chuyên 2026.</i></p><p>Vòng chung kết quy tụ các đội thi gồm: ROBOSAPIEN đến từ Trường Kinh tế và Kinh doanh, PROS TO MELLON của Khoa Công nghệ Thông tin, BLUE-LIFE-TEAM thuộc Trường Thủy sản và Khoa học sự sống, NEXUS của Trường Kỹ thuật và Công nghệ và PEAK đến từ Khoa Du lịch.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/olympic%20TA/316-olym-ta_tdh.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>TS. Trần Doãn Hùng phát biểu chúc mừng và động viên các đội thi tại Vòng chung kết Olympic Tiếng Anh không chuyên NTU 2026.</i></p><p>Đêm thi diễn ra sôi nổi, hấp dẫn với 3 phần thi gồm: giới thiệu đội thi thông qua các hình thức nghệ thuật như hát, múa, kịch; phần thi trắc nghiệm kiến thức và phần thi hùng biện tiếng Anh. Các đội đã mang đến không khí trẻ trung, sáng tạo với nhiều màn trình diễn được đầu tư công phu, thể hiện sự tự tin, khả năng sử dụng tiếng Anh linh hoạt cùng vốn kiến thức đa dạng trên nhiều lĩnh vực.</p><p>Đặc biệt, phần thi hùng biện đã để lại nhiều ấn tượng khi các đội thi đưa ra những góc nhìn mới mẻ về học tập, hội nhập quốc tế và kỹ năng cần thiết của sinh viên trong thời đại số. Nhiều ý tưởng sáng tạo, khả năng phản biện và tư duy hội nhập của sinh viên đã được thể hiện rõ nét qua từng phần tranh tài.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/olympic%20TA/316-olym-ta_dx1.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/olympic%20TA/316-olym-ta_dx2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>Năm đội thi xuất sắc mang đến nhiều phần tranh tài sôi nổi tại Vòng chung kết Olympic Tiếng Anh không chuyên NTU 2026.</i></p><p>Kết thúc cuộc thi, Ban Tổ chức đã trao giải Nhất cho đội ROBOSAPIEN của Trường Kinh tế và Kinh doanh; giải Nhì thuộc về đội PEAK của Khoa Du lịch; giải Ba được trao cho đội BLUE-LIFE-TEAM của Trường Thủy sản và Khoa học sự sống. Hai giải Khuyến khích thuộc về đội PROS TO MELLON của Khoa Công nghệ Thông tin và đội NEXUS của Trường Kỹ thuật và Công nghệ.</p><p>Cuộc thi là sân chơi học thuật bổ ích, góp phần tạo môi trường rèn luyện kỹ năng ngoại ngữ, tư duy phản biện và khả năng hội nhập cho sinh viên Trường Đại học Nha Trang trong bối cảnh hội nhập quốc tế hiện nay.</p><p><i><strong>Một số hình ảnh</strong></i></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/olympic%20TA/316-olym-ta_1.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/olympic%20TA/316-olym-ta_2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/olympic%20TA/316-olym-ta_3.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/olympic%20TA/316-olym-ta_nhi.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/olympic%20TA/316-olym-ta_ba.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/olympic%20TA/316-olym-ta_tapthe.jpg\" alt=\"\" width=\"970\" height=\"647\"></p>', 'media/tin-tuc-chung-1781277523/316-olym-ta-tdh-1781276809-PfVO6i.jpg', 1, 1, 1, 1, '2026-06-12 08:07:02', '2026-06-16 03:00:41'),
(2, 'Triển lãm sản phẩm khởi nghiệp NTU 2026 lan tỏa tinh thần đổi mới sáng tạo', 'trien-lam-san-pham-khoi-nghiep-ntu-2026-lan-toa-tinh-than-doi-moi-sang-tao-2', NULL, '<p><strong>Ngày 26/5/2026, Trường Đại học Nha Trang tổ chức “Triển lãm giới thiệu dự án/sản phẩm khởi nghiệp của giảng viên, sinh viên NTU 2026”, nhằm lan tỏa tinh thần đổi mới sáng tạo, thúc đẩy hoạt động khởi nghiệp trong Nhà trường và tăng cường kết nối giữa ý tưởng nghiên cứu với nhu cầu thực tiễn của doanh nghiệp, xã hội.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/10919/img/trien-lam-san-pham-khoi-nghiep-ntu-2026-lan-toa-tinh-than-doi-moi-sang-tao.jpg\" alt=\"Triển lãm sản phẩm khởi nghiệp NTU 2026 lan tỏa tinh thần đổi mới sáng tạo\" width=\"4608\" height=\"3072\"></p><p><i>GS.TS. Phạm Quốc Hùng - Phó Hiệu trưởng Trường Đại học Nha Trang phát biểu tại chương trình.</i></p><p>Tham dự chương trình có TS. Quách Hoài Nam - Hiệu trưởng Nhà trường; GS.TS. Phạm Quốc Hùng - Phó Hiệu trưởng Nhà trường; đại diện các doanh nghiệp, chuyên gia, giảng viên cùng đông đảo sinh viên quan tâm đến hoạt động đổi mới sáng tạo và khởi nghiệp.</p><p>Triển lãm giới thiệu nhiều sản phẩm, mô hình và giải pháp sáng tạo do giảng viên, sinh viên các khoa, viện, trung tâm của Nhà trường nghiên cứu và phát triển. Các sản phẩm tập trung vào nhiều lĩnh vực như công nghệ, chế biến thực phẩm, môi trường, thủy sản, tự động hóa, chuyển đổi số và các giải pháp phục vụ cộng đồng. Nhiều ý tưởng được đánh giá có tính ứng dụng cao, hướng đến khả năng thương mại hóa và phát triển thành các dự án khởi nghiệp trong tương lai.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/KN%202026/316-sp-khoi-nghiep_4.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>TS. Quách Hoài Nam tham quan các sản phẩm, mô hình sáng tạo do giảng viên, sinh viên Trường Đại học Nha Trang nghiên cứu và phát triển.</i></p><p>Phát biểu tại chương trình, GS.TS. Phạm Quốc Hùng nhấn mạnh, trong bối cảnh chuyển đổi số, kinh tế xanh và đổi mới sáng tạo đang trở thành động lực phát triển của xã hội, Nhà trường xác định khởi nghiệp không chỉ dừng lại ở lý thuyết mà còn là môi trường để người học rèn luyện tư duy sáng tạo, năng lực giải quyết vấn đề và tinh thần dấn thân vì cộng đồng. Vì vậy, thời gian qua, Nhà trường luôn quan tâm xây dựng hệ sinh thái khởi nghiệp, tạo điều kiện để giảng viên, sinh viên nghiên cứu, hình thành ý tưởng, phát triển dự án và kết nối với doanh nghiệp, nhà đầu tư.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/KN%202026/316-sp-khoi-nghiep_2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/KN%202026/316-sp-khoi-nghiep_8.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>Nhiều ý tưởng khởi nghiệp của sinh viên NTU được giới thiệu tại triển lãm, hướng đến khả năng ứng dụng và thương mại hóa trong tương lai.</i></p><p>Theo Ban Tổ chức, triển lãm không chỉ là dịp để các nhóm dự án giới thiệu sản phẩm mà còn tạo cơ hội giao lưu, học hỏi, tiếp nhận góp ý từ chuyên gia và doanh nghiệp nhằm tiếp tục hoàn thiện ý tưởng, nâng cao khả năng ứng dụng vào thực tiễn. Hoạt động góp phần thúc đẩy phong trào nghiên cứu khoa học, đổi mới sáng tạo và khởi nghiệp trong sinh viên, từng bước xây dựng môi trường học tập năng động, sáng tạo tại Nhà trường.</p><p>Kết thúc chương trình, Ban Tổ chức đã trao 1 giải Nhất, 2 giải Nhì, 4 giải Ba và 10 giải Khuyến khích cho các dự án, sản phẩm khởi nghiệp tiêu biểu có tính sáng tạo, khả năng ứng dụng và tiềm năng phát triển thực tiễn cao.</p><p><i><strong>Một số hình ảnh&nbsp;</strong></i></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/KN%202026/316-sp-khoi-nghiep_1.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/KN%202026/316-sp-khoi-nghiep_3.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/KN%202026/316-sp-khoi-nghiep_6.jpg\" alt=\"\" width=\"970\" height=\"560\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/KN%202026/316-sp-khoi-nghiep_thamquan.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/KN%202026/316-sp-khoi-nghiep_7.jpg\" alt=\"\" width=\"970\" height=\"647\"></p>', 'media/tin-tuc-chung-1781277523/trien-lam-san-pham-khoi-nghiep-ntu-2026-lan-toa-tinh-than-doi-moi-sang-tao-1781276966-sMnxEx.jpg', 0, 1, 1, 1, '2026-06-12 08:09:29', '2026-06-16 02:00:42'),
(3, 'Bế mạc huấn luyện Đại đội tự vệ Pháo phòng không 37mm-1 năm 2026', 'be-mac-huan-luyen-dai-doi-tu-ve-phao-phong-khong-37mm-1-nam-2026-3', NULL, '<p><strong>Ngày 29/5/2026, Trường Đại học Nha Trang phối hợp với Bộ Chỉ huy Quân sự tỉnh Khánh Hòa tổ chức Bế mạc huấn luyện Đại đội tự vệ Pháo phòng không 37mm-1 năm 2026. Tham dự chương trình có đại diện Bộ CHQS tỉnh Khánh Hòa, Trường Đại học Nha Trang cùng cán bộ, chiến sĩ Đại đội Tự vệ PPK 37mm-1.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/11934/img/ppk_khenthuong2-260601092236.jpg\" alt=\"Bế mạc huấn luyện Đại đội tự vệ Pháo phòng không 37mm-1 năm 2026\" width=\"4502\" height=\"2075\"></p><p><i>Các cá nhân tiêu biểu được khen thưởng tại lễ bế mạc huấn luyện Đại đội tự vệ Pháo phòng không 37mm-1 năm 2026.</i></p><p>Đợt huấn luyện được triển khai theo Kế hoạch số 2122/KH-BCH ngày 16/4/2026 của Bộ CHQS tỉnh Khánh Hòa, với mục tiêu nâng cao trình độ chính trị, quân sự và khả năng sẵn sàng chiến đấu cho lực lượng tự vệ Nhà trường. Trong quá trình huấn luyện, các cơ quan chuyên môn của Bộ CHQS tỉnh và Trường Đại học Nha Trang đã phối hợp chặt chẽ trong công tác chuẩn bị giáo án, mô hình học cụ, thao trường, cơ sở vật chất và điều động quân số tham gia huấn luyện đúng kế hoạch.</p><p>Mặc dù điều kiện thời tiết nắng nóng, thao trường còn nhiều khó khăn và đây là năm đầu tiên lực lượng tự vệ được huấn luyện chuyên ngành pháo phòng không, song cán bộ, chiến sĩ Đại đội đã phát huy tinh thần trách nhiệm, đoàn kết, nỗ lực hoàn thành tốt các nội dung huấn luyện đề ra.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/B%E1%BA%BF%20m%E1%BA%A1c%20PPK/316-ppk_3.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/B%E1%BA%BF%20m%E1%BA%A1c%20PPK/316-ppk_4.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>Buổi kiểm tra đánh giá kết quả huấn luyện của cán bộ, chiến sĩ Đại đội Tự vệ PPK 37mm-1.</i></p><p>Theo báo cáo tổng kết, quân số tham gia huấn luyện đạt 96,4%. Kết quả kiểm tra chính trị đạt 100% yêu cầu, trong đó 69,5% khá, giỏi. Đối với nội dung kiểm tra quân sự chung và chuyên ngành, 100% đạt yêu cầu, 65,4% đạt khá, giỏi. Kết quả chung toàn đơn vị có 67,45% khá, giỏi; đơn vị hoàn thành tốt nhiệm vụ huấn luyện năm 2026.</p><p>Tại chương trình, Ban Tổ chức đã biểu dương các cá nhân có thành tích tiêu biểu trong quá trình huấn luyện gồm đồng chí Cao Mạnh Đức, đồng chí Lê Thị Ngân Hà và đồng chí Trần Minh Sỹ.</p><p>Phát biểu tại buổi bế mạc, đại diện Bộ CHQS tỉnh Khánh Hòa đánh giá cao tinh thần phối hợp, trách nhiệm của Trường Đại học Nha Trang trong công tác xây dựng lực lượng tự vệ; đồng thời đề nghị đơn vị tiếp tục rút kinh nghiệm, kiện toàn tổ chức biên chế và nâng cao chất lượng huấn luyện trong những năm tiếp theo, đáp ứng yêu cầu nhiệm vụ quốc phòng, an ninh trong tình hình mới.</p><p><i><strong>Một số hình ảnh</strong></i></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/B%E1%BA%BF%20m%E1%BA%A1c%20PPK/316-ppk_1.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/B%E1%BA%BF%20m%E1%BA%A1c%20PPK/316-ppk_2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/B%E1%BA%BF%20m%E1%BA%A1c%20PPK/316-ppk_5.jpg\" alt=\"\" width=\"970\" height=\"500\"></p>', 'media/tin-tuc-chung-1781277523/316-ppk-5-1781277289-HElKWX.jpg', 1, 1, 1, 1, '2026-06-12 08:19:13', '2026-06-16 02:00:32'),
(4, 'Tổng kết và trao giải Cuộc thi xây dựng video tuyên truyền nâng cao nhận thức về an toàn thực phẩm năm 2026', 'tong-ket-va-trao-giai-cuoc-thi-xay-dung-video-tuyen-truyen-nang-cao-nhan-thuc-ve-an-toan-thuc-pham-nam-2026-4', NULL, '<p><strong>Ngày 29/5/2026, Câu lạc bộ An toàn thực phẩm thuộc Khoa Công nghệ Thực phẩm, Trường Thủy sản và Khoa học Sự sống, Trường Đại học Nha Trang đã tổ chức Lễ tổng kết và trao giải Cuộc thi xây dựng video tuyên truyền nâng cao nhận thức về an toàn thực phẩm năm 2026 với chủ đề “Đảm bảo an toàn thực phẩm và phòng ngừa ngộ độc thực phẩm”.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/11949/img/tong-ket-va-trao-giai-cuoc-thi-xay-dung-video-tuyen-truyen-nang-cao-nhan-thuc-ve.jpg\" alt=\"Tổng kết và trao giải Cuộc thi xây dựng video tuyên truyền nâng cao nhận thức về an toàn thực phẩm năm 2026\" width=\"1768\" height=\"1307\"></p><p><i>Đại diện Ban Tổ chức trao giải cho nhóm sinh viên có sản phẩm video xuất sắc tại cuộc thi.</i></p><p>Cuộc thi được tổ chức nhằm hưởng ứng “Tháng hành động vì an toàn thực phẩm” năm 2026, đồng thời tạo sân chơi học thuật bổ ích để sinh viên phát huy khả năng sáng tạo, vận dụng kiến thức chuyên môn vào thực tiễn, góp phần nâng cao nhận thức cộng đồng về an toàn vệ sinh thực phẩm.</p><p>Tham gia cuộc thi, các nhóm sinh viên đã xây dựng nhiều sản phẩm video có nội dung phong phú, phản ánh những vấn đề thiết thực liên quan đến an toàn thực phẩm trong đời sống hằng ngày. Các tác phẩm không chỉ thể hiện sự đầu tư nghiêm túc về nội dung và hình thức mà còn truyền tải những thông điệp ý nghĩa về trách nhiệm của mỗi cá nhân trong việc lựa chọn, sử dụng và bảo quản thực phẩm an toàn.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/ATTP/316-attp_4.jpg\" alt=\"\" width=\"970\" height=\"518\"></p><p><i>Các nhóm sinh viên đạt giải chụp ảnh lưu niệm cùng Ban Tổ chức và Ban Giám khảo.</i></p><p>Ban Giám khảo cuộc thi gồm các giảng viên ngành Đảm bảo chất lượng và An toàn thực phẩm, đại diện Trung tâm Đổi mới sáng tạo Trường Đại học Nha Trang và Chi cục An toàn vệ sinh thực phẩm. Trên cơ sở đánh giá khách quan, công tâm, Ban Tổ chức đã lựa chọn và trao giải cho 10 video xuất sắc nhất. Trong đó có nhiều tác phẩm nổi bật như “Lựa chọn thực phẩm an toàn” của lớp 67ATTP, “Góc nhìn chợ hải sản” của lớp 64ATTP, “Thực trạng mất an toàn thực phẩm”, “Sinh viên NTU với an toàn thực phẩm”, “Tụ cầu vàng trong thực phẩm” cùng nhiều chủ đề thiết thực khác.</p><p>Thông qua mỗi sản phẩm dự thi, sinh viên đã gửi gắm những góc nhìn và thông điệp riêng về bảo đảm an toàn thực phẩm, góp phần lan tỏa nhận thức đúng đắn đến người tiêu dùng và cộng đồng. Cuộc thi khép lại với nhiều dấu ấn tích cực, khẳng định vai trò của tuổi trẻ trong công tác tuyên truyền, giáo dục và nâng cao ý thức xã hội về an toàn thực phẩm. Thông điệp chung được các giảng viên và sinh viên hướng tới là: “An toàn thực phẩm là trách nhiệm của mọi người, mọi gia đình và hạnh phúc của toàn xã hội.”</p><p><i><strong>Một số hình ảnh</strong></i></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/ATTP/316-attp_2.jpg\" alt=\"\" width=\"960\" height=\"608\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/ATTP/316-attp_3.jpg\" alt=\"\" width=\"970\" height=\"728\"></p>', 'media/tin-tuc-chung-1781277523/tong-ket-va-trao-giai-cuoc-thi-xay-dung-video-tuyen-truyen-nang-cao-nhan-thuc-ve-1781277860-rMJ1WS.jpg', 2, 1, 1, 1, '2026-06-12 08:24:25', '2026-06-16 02:00:21'),
(5, 'Đồng chí Hồ Tùng Mậu - Người chiến sĩ cộng sản kiên trung, nhà lãnh đạo tiền bối tiêu biểu của Đảng và cách mạng Việt Nam', 'dong-chi-ho-tung-mau-nguoi-chien-si-cong-san-kien-trung-nha-lanh-dao-tien-boi-tieu-bieu-cua-dang-va-cach-mang-viet-nam-5', NULL, '<p><strong>Kỷ niệm 130 năm ngày sinh đồng chí Hồ Tùng Mậu (15/6/1896 - 15/6/2026)</strong></p><p><img src=\"https://ntu.edu.vn/uploads/46/images/news/11987/img/dong-chi-ho-tung-mau-nguoi-chien-s-cong-san-kien-trung-nha-lanh-dao-tien-boi.jpg\" alt=\"Đồng chí Hồ Tùng Mậu - Người chiến sĩ cộng sản kiên trung, nhà lãnh đạo tiền bối tiêu biểu của Đảng và cách mạng Việt Nam\" width=\"220\" height=\"300\"></p><p>Đồng chí Hồ Tùng Mậu, sinh ngày 15/6/1896 tại làng Quỳnh Đôi, huyện Quỳnh Lưu, tỉnh Nghệ An (nay là xã Quỳnh Anh, tỉnh Nghệ An), quê hương giàu truyền thống văn hóa, yêu nước và cách mạng.</p><p>Lớn lên trong cảnh nước mất, nhà tan, phát huy truyền thống yêu nước, cách mạng của quê hương, gia đình, đồng chí Hồ Tùng Mậu đã nuôi chí lớn và sớm tìm thấy con đường cách mạng. Tháng 4/1920, đồng chí ra nước ngoài hoạt động cách mạng. Năm 1923, đồng chí Hồ Tùng Mậu cùng với những thanh niên yêu nước thành lập Tâm Tâm xã (còn gọi là Tân Việt Thanh niên Đoàn) - một tổ chức có xu hướng cách mạng, nhằm mục đích đấu tranh giải phóng dân tộc.</p><p>Tháng 11/1924, Lãnh tụ Nguyễn Ái Quốc từ Liên Xô tới Quảng Châu (Trung Quốc) tiếp xúc và kết nạp một số thành viên của Tâm Tâm xã vào tổ chức Cộng sản Đoàn (1925) để làm hạt nhân tổ chức Hội Việt Nam Cách mạng Thanh niên - một trong những tổ chức cách mạng tiền thân của Đảng Cộng sản Việt Nam sau này. Đồng chí Hồ Tùng Mậu là một trong những thành viên tích cực trong việc phát triển tổ chức, trở thành một trong những hạt nhân xúc tiến mở rộng tổ chức cách mạng; là người học trò đắc lực, người cộng sự tin cậy của Nguyễn Ái Quốc trong thời gian Người ở Quảng Châu (Trung Quốc). Đồng chí Hồ Tùng Mậu tham gia tổ chức các lớp huấn luyện “chính trị đặc biệt” do Nguyễn Ái Quốc mở tại nhiều địa điểm khác nhau nhằm truyền bá chủ nghĩa Mác-Lênin cho các cán bộ học tập. Đồng thời tham gia xuất bản tờ tuần báo “Thanh niên”.</p><p>Tháng 5/1929, tại Đại hội Hội Việt Nam Cách mạng Thanh niên lần thứ nhất, đồng chí Hồ Tùng Mậu được Đại hội bầu làm ủy viên chính thức của Tổng bộ Hội Việt Nam Cách mạng Thanh niên. Cuối năm 1929, sau khi sang Hồng Kông, Đồng chí gia nhập An Nam Cộng sản Đảng, đồng thời tích cực vận động cho sự hợp nhất các tổ chức cộng sản thành một đảng duy nhất.</p><p>Mùa Xuân năm 1930, Lãnh tụ Nguyễn Ái Quốc đã triệu tập và chủ trì Hội nghị thành lập Đảng Cộng sản Việt Nam. Đồng chí Hồ Tùng Mậu là “người giúp việc và thư ký” Hội nghị. Sự thành công của quá trình vận động cách mạng, đi đến thống nhất để hợp nhất ba tổ chức Đảng trong nước thành một chính đảng, chấm dứt sự khủng hoảng tổ chức lãnh đạo cách mạng Việt Nam, có công đóng góp to lớn của đồng chí Hồ Tùng Mậu.</p><p>Tháng 6/1931, khi Lãnh tụ Nguyễn Ái Quốc bị cảnh sát Hương Cảng (Hồng Kông) bắt, đồng chí Hồ Tùng Mậu đã liên hệ với Hội Quốc tế Cứu tế Đỏ và được luật sư Loseby bào chữa cho Người. Vì thế, Đồng chí bị nhà cầm quyền Hồng Kông bắt giam, nhưng vì không đủ chứng cứ buộc tội nên họ trục xuất khỏi Hồng Kông. Ngày 30/6/1931, khi thuyền vừa cập bến Thượng Hải, đồng chí Hồ Tùng Mậu bị mật thám thực dân Pháp bắt và giải về Việt Nam xét xử, kết án tù chung thân.</p><p>Đồng chí Hồ Tùng Mậu bị giam cầm ở nhà tù Hỏa Lò, nhà lao Kon Tum, rồi nhà đày Buôn Ma Thuật, trong thời gian từ năm 1933 đến năm 1941. Ở đây, những kinh nghiệm của một chiến sĩ cộng sản chín chắn và sâu sắc đã được Đồng chí phát huy để tập hợp đoàn kết anh em, chú trọng công tác học tập nâng cao trình độ hiểu biết văn hóa, chính trị cho các bạn tù. Đồng chí chủ trương đấu tranh trong tù cần giữ nghiêm kỷ luật nội bộ, khôn khéo tránh những âm mưu khiêu khích của địch. Đồng thời, Đồng chí lãnh đạo anh em cương quyết đấu tranh với địch để cải thiện điều kiện sống trong tù, không để địch tùy tiện vô cớ khủng bố, đàn áp tù nhân.</p><p>Trải qua nhiều nhà tù, chịu đựng nhiều gian lao cực khổ nhưng đồng chí Hồ Tùng Mậu luôn giữ vững khí tiết của người chiến sĩ cách mạng; tinh thần lạc quan và lòng thương yêu đồng chí, đồng bào của Đồng chí luôn tỏa sáng giữa chốn lao tù đế quốc. Đồng chí là trung tâm đoàn kết, khích lệ tinh thần đấu tranh cách mạng kiên cường đối với các anh em tù chính trị trong nhà lao.</p><p>Năm 1941, sau khi được trả tự do, tuy bị quản thúc, Đồng chí vẫn tìm cách bắt liên lạc với Đảng, tiếp tục hoạt động cách mạng và tích cực tham gia chuẩn bị lực lượng cho Tổng khởi nghĩa giành chính quyền.</p><p>Bước vào cuộc kháng chiến chống thực dân Pháp xâm lược, năm 1946, đồng chí Hồ Tùng Mậu được giao phụ trách Trường Quân chính ở Nhượng Bạn (Cẩm Xuyên, Hà Tĩnh) để đào tạo cán bộ quân sự phục vụ kháng chiến, kiến quốc.</p><p>Tháng 12/1946, Đồng chí được Trung ương Đảng và Chủ tịch Hồ Chí Minh ủy nhiệm làm Chủ tịch Ủy ban kháng chiến (sau là Ủy ban Kháng chiến Hành chính) Liên khu IV, đồng thời được bầu làm Ủy viên Thường vụ Liên khu ủy.</p><p>Ngày 18/12/1949, Chủ tịch Hồ Chí Minh ký Sắc lệnh 138/B-SL thành lập Ban Thanh tra Chính phủ trực thuộc Phủ Thủ tướng và Sắc lệnh số 138/C-SL cử đồng chí Hồ Tùng Mậu giữ chức Tổng Thanh tra.</p><p>Đầu năm 1950, Trung ương Đảng và Chính phủ quyết định thành lập \"Hội Việt - Hoa hữu nghị\", đồng chí Hồ Tùng Mậu được phân công là Hội trưởng đầu tiên của Hội này.</p><p>Tháng 2/1951, tại Đại hội đại biểu toàn quốc lần thứ II của Đảng, đồng chí Hồ Tùng Mậu được bầu làm Ủy viên dự khuyết Ban Chấp hành Trung ương Đảng.</p><p>Ngày 23/7/1951 trên đường vào Liên khu IV công tác, tại thị trấn Còng (Thanh Hóa) đồng chí Hồ Tùng Mậu đã bị máy bay địch phát hiện, đuổi bắn và hy sinh.</p><p>Với 55 tuổi đời, hơn 30 năm hoạt động cách mạng, đồng chí Hồ Tùng Mậu đã hoàn thành xuất sắc nhiều trọng trách mà Đảng, Nhà nước và Nhân dân giao phó. Đồng chí là tấm gương sáng về phẩm chất đạo đức của người chiến sĩ cộng sản, hiến dâng trọn đời cho sự nghiệp cách mạng của Đảng và dân tộc ta; được Đảng, Nhà nước tặng Huân chương Sao vàng, Huân chương Hồ Chí Minh và nhiều huân, huy chương cao quý khác.</p><p>Kỷ niệm 130 năm Ngày sinh đồng chí Hồ Tùng Mậu (15/6/1896 – 15/6/2026) là dịp để toàn Đảng, toàn dân và toàn quân ta thành kính tri ân công lao, đóng góp to lớn của Đồng chí và các nhà lãnh đạo tiền bối tiêu biểu đối với sự nghiệp cách mạng của Đảng và dân tộc. Đồng thời, đẩy mạnh công tác tuyên truyền, giáo dục chính trị, tư tưởng, đạo đức, lối sống cho cán bộ, đảng viên, Nhân dân; củng cố và bồi đắp niềm tin của Nhân dân đối với Đảng, Nhà nước, chế độ xã hội chủ nghĩa; góp phần thực hiện thắng lợi các mục tiêu, nhiệm vụ theo Nghị quyết Đại hội XIV của Đảng, biến quyết tâm chính trị thành chương trình hành động thiết thực, hiệu quả ở từng cấp, từng ngành, từng cơ quan, đơn vị, địa phương, đưa đất nước phát triển nhanh và bền vững trong kỷ nguyên mới./.</p><p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngô Văn An – Phòng CTSV</strong></p>', 'media/tin-tuc-chung-1781277523/dong-chi-ho-tung-mau-nguoi-chien-s-cong-san-kien-trung-nha-lanh-dao-tien-boi-1781277964-bUFvJd.jpg', 5, 1, 1, 1, '2026-06-12 08:26:13', '2026-06-16 04:07:15'),
(6, 'Thực tập tại Đức: Bước ngoặt cho những nhà làm truyền thông tương lai NTU', 'thuc-tap-tai-duc-buoc-ngoat-cho-nhung-nha-lam-truyen-thong-tuong-lai-ntu-6', NULL, '<p><strong>Trong khuôn khổ chương trình trao đổi sinh viên và thực tập ngắn hạn tại Đức do Trường Đại học Nha Trang tổ chức, với sự tài trợ của dự án NET-Works, nhóm sinh viên phụ trách mảng Truyền thông đã có một hành trình học hỏi và trải nghiệm đáng nhớ. Đây không chỉ là cơ hội rèn luyện kỹ năng nghề nghiệp mà còn là dịp để mỗi thành viên nhìn nhận lại bản thân, mở ra những hướng đi mới trong tương lai.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/10004/img/thuc-tap-tai-duc-buoc-ngoat-cho-nhung-nha-lam-truyen-thong-tuong-lai-ntu.jpg\" alt=\"Thực tập tại Đức: Bước ngoặt cho những nhà làm truyền thông tương lai NTU\" width=\"690\" height=\"501\"></p><p>Ngay từ những ngày đầu, cả nhóm được tiếp cận với các buổi học và thực hành chuyên sâu về kỹ thuật chụp ảnh, vận hành máy ảnh cũng như làm chủ các thông số quan trọng như ISO, Shutter Speed… Nếu trước đó việc cầm máy chỉ đơn thuần mang tính trải nghiệm thì sau chuyến đi, mỗi thành viên đã thật sự nắm vững kỹ năng tác nghiệp. Việc thực hành liên tục giúp khả năng sáng tạo trong từng khung hình ngày càng được cải thiện, thể hiện sự tiến bộ rõ rệt.</p><p><img src=\"https://ntu.edu.vn/uploads/56/316-duc-thuc-hanh-may-anh-1.jpg\" alt=\"\" width=\"755\" height=\"503\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/316-duc-thuc-hanh-may-anh-2.jpg\" alt=\"\" width=\"553\" height=\"553\"></p><p><i>Sinh viên NTU thực hành kỹ thuật vận hành máy ảnh với sự hỗ trợ của thiết bị hiện đại.</i></p><p>Một điểm nhấn trong quá trình thực tập là cơ hội làm việc với hệ thống trang thiết bị hiện đại tại Trường Đại học Khoa học Ứng dụng Ostfalia. Không chỉ học lý thuyết, các bạn sinh viên còn được tham gia trực tiếp vào quy trình xây dựng một ekip ghi hình, từ việc chuẩn bị bối cảnh, phân chia vai trò, đến khâu ghi hình và phỏng vấn. Tự mình đứng ra tổ chức, vận hành một ekip đã giúp các bạn hiểu rõ hơn về cách thức làm việc chuyên nghiệp, cũng như tầm quan trọng của tinh thần trách nhiệm và sự phối hợp trong nhóm.</p><p><img src=\"https://ntu.edu.vn/uploads/56/316-duc-phong-van-1.jpg\" alt=\"\" width=\"939\" height=\"660\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/316-duc-phong-van-2.jpg\" alt=\"\" width=\"761\" height=\"571\"></p><p><i>Các thành viên phối hợp trong một êkíp phỏng vấn và ghi hình theo quy trình chuyên nghiệp.</i></p><p>Không chỉ gói gọn trong phòng thực hành, chương trình còn đưa các bạn đến nhiều thành phố tại Đức, tạo điều kiện quan sát và học hỏi đời sống, văn hóa bản địa. Mỗi chuyến đi là một bài học mới – từ kiến trúc, lối sống đến cách người dân ứng xử trong đời thường. Chính những trải nghiệm này đã góp phần định hình một góc nhìn đa chiều hơn về thế giới, giúp các bạn nhận ra vai trò của truyền thông không chỉ là ghi lại hình ảnh mà còn là cầu nối văn hóa.</p><p><img src=\"https://ntu.edu.vn/uploads/56/316-duc-trai-nghiem-1.jpg\" alt=\"\" width=\"673\" height=\"897\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/316-duc-trai-nghiem-2.jpg\" alt=\"\" width=\"491\" height=\"739\"></p><p><i>Team Truyền thông tham quan, trải nghiệm tại một số thành phố của Đức.</i></p><p>Đặc biệt, team Truyền thông còn được tham gia cùng nhóm Tái chế, tìm hiểu về quy trình xử lý và tái chế nhựa thông qua các máy móc hiện đại. Hoạt động này không chỉ mang tính bổ sung kiến thức ngoài chuyên môn, mà còn khơi gợi ý thức về trách nhiệm xã hội, về mối liên hệ giữa truyền thông – công nghệ – môi trường. Qua đó, các bạn có thêm vốn hiểu biết để xây dựng những sản phẩm truyền thông mang thông điệp nhân văn, gần gũi với cộng đồng.</p><p><img src=\"https://ntu.edu.vn/uploads/56/316-duc-quy-trinh-1.jpg\" alt=\"\" width=\"692\" height=\"521\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/316-duc-quy-trinh-2.jpg\" alt=\"\" width=\"807\" height=\"605\"></p><p><i>Sinh viên NTU tìm hiểu quy trình xử lý và tái chế nhựa cùng team Tái chế.</i></p><p>Kết thúc chuyến đi, các thành viên đều bày tỏ lòng biết ơn sâu sắc đến Trường Đại học Nha Trang – đơn vị đã tạo điều kiện cho sinh viên được tiếp cận môi trường học tập và làm việc quốc tế. Chính sự tin tưởng và định hướng của Nhà trường đã mở ra một hành trình quý giá, để mỗi sinh viên không chỉ học được kỹ năng nghề nghiệp mà còn rèn luyện bản lĩnh, sự tự tin khi bước vào môi trường toàn cầu.</p><p>Đồng thời, sự đồng hành của Trường Đại học Khoa học Ứng dụng Ostfalia cũng để lại nhiều ấn tượng khó quên. Tại đây, các bạn được học hỏi cách vận hành ekip chuyên nghiệp, làm việc với phong cách khoa học và kỷ luật. Điều này giúp mỗi thành viên hiểu rằng, thành công của một sản phẩm truyền thông không chỉ đến từ kỹ năng cá nhân mà còn từ sự phối hợp ăn ý của cả tập thể.</p><p><img src=\"https://ntu.edu.vn/uploads/56/316-duc-khoanh-khac.jpg\" alt=\"\" width=\"917\" height=\"688\"></p><p><i>Khoảnh khắc ghi dấu trải nghiệm đáng nhớ của team Truyền thông trong hành trình tại Đức.</i></p><p>Dù chuyến thực tập tại Đức đã khép lại, nhưng những giá trị mà nó mang đến vẫn còn nguyên vẹn. Đó là kỹ năng chụp ảnh, vận hành máy móc; là trải nghiệm xây dựng êkíp chuyên nghiệp; là hành trang văn hóa, tri thức và ý thức trách nhiệm. Quan trọng hơn, đây còn là hành trình giúp các bạn sinh viên NTU tự tin khẳng định bản thân, mang trong mình khát vọng vươn xa, bay cao hơn ra biển lớn.</p><p>Chuyến đi không chỉ thay đổi cách các bạn nhìn về nghề nghiệp, mà còn thay đổi cách nhìn về thế giới và chính bản thân mình. Hành trình ấy đã để lại dấu ấn sâu đậm, trở thành động lực để mỗi thành viên tiếp tục học tập, rèn luyện và đóng góp nhiều hơn cho cộng đồng, cho xã hội.</p>', 'media/chia-se-1781335505/thuc-tap-tai-duc-buoc-ngoat-cho-nhung-nha-lam-truyen-thong-tuong-lai-ntu-1781335517-dwGDjL.jpg', 0, 1, 0, 1, '2026-06-13 00:25:20', '2026-06-16 01:59:54'),
(7, 'Trường Đại học Nha Trang - Đơn vị tiên phong hợp tác đào tạo với doanh nghiệp trong lĩnh vực thủy sản', 'truong-dai-hoc-nha-trang-don-vi-tien-phong-hop-tac-dao-tao-voi-doanh-nghiep-trong-linh-vuc-thuy-san-7', NULL, '<p><strong>Trong&nbsp;những năm gần đây, mô hình hợp tác giữa trường&nbsp;đại học và doanh nghiệp được&nbsp;Đảng và Nhà nước đặc biệt quan tâm; trong chiến lược phát triển nguồn nhân lực phục vụ cho sự nghiệp công nghiệp hóa, hiện đại hóa đất nước, nâng cao chất lượng đào tạo của các cơ sở giáo dục đại học, mối quan hệ liên kết đào tạo giữa các trường đại học và doanh nghiệp đóng vai trò hết sức quan trọng. Để cụ thể hóa vai trò này, hệ thống pháp luật, các quy định, chính sách được các cấp có thẩm quyền quan tâm xây dựng và ngày càng hoàn thiện nhằm tạo cơ sở pháp lý, khuyến khích sự hợp tác giữa trường đại học và doanh nghiệp: Nghị quyết 29-NQ/TW ngày 04/11/2013 (Hội nghị TW 8 Khóa XI) về đổi mới căn bản, toàn diện giáo dục và đào tạo đã đề ra quan điểm: “Coi sự chấp nhận của thị trường lao động đối với người học là tiêu chí quan trọng để đánh giá uy tín, chất lượng của cơ sở giáo dục đại học, nghề nghiệp và là căn cứ để định hướng phát triển các cơ sở giáo dục, đào tạo và ngành nghề đào tạo”; Luật Giáo dục Đại học sửa đổi, bổ sung (năm 2018) quy định: “Gắn đào tạo với nhu cầu sử dụng lao động của thị trường, nghiên cứu triển khai ứng dụng khoa học và công nghệ; đẩy mạnh hợp tác giữa cơ sở giáo dục đại học với doanh nghiệp, tổ chức khoa học và công nghệ; có chính sách ưu đãi về thuế cho các sản phẩm khoa học và công nghệ của cơ sở giáo dục đại học; khuyến khích cơ quan, tổ chức, doanh nghiệp tiếp nhận, tạo điều kiện để người học và giảng viên thực hành, thực tập, nghiên cứu khoa học và chuyển giao công nghệ, góp phần nâng cao chất lượng đào tạo”; Thông tư số 17/2021/TT-BGDĐT&nbsp;ngày 22/6/2021 của Bộ Giáo dục và Đào tạo&nbsp;quy định chuẩn chương trình đào tạo bậc đại học, trong đó yêu cầu các trường thiết kế chương trình đáp ứng nhu cầu thực tế của thị trường lao động thông qua liên kết với doanh nghiệp; Nghị định&nbsp;số&nbsp;35/2021/NĐ-CP&nbsp;ngày 29/3/2021 của Chính phủ&nbsp;về hợp tác công&nbsp;-&nbsp;tư cũng mở ra cơ hội để các doanh nghiệp và trường đại học cùng triển khai các dự án nghiên cứu và đào tạo có tính ứng dụng cao….</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/9854/img/truong-dai-hoc-nha-trang-don-vi-tien-phong-hop-tac-dao-tao-voi-doanh-nghiep-tro.jpg\" alt=\"Trường Đại học Nha Trang - Đơn vị tiên phong hợp tác đào tạo với doanh nghiệp trong lĩnh vực thủy sản \" width=\"1000\" height=\"548\"></p><p>Trong liên kết với doanh nghiệp về hoạt động đào tạo, trường đại học đóng vai trò là đơn vị chủ trì, chịu trách nhiệm chính trong đào&nbsp;tạo&nbsp;như:&nbsp;thực hiện nội dung, chương trình đào tạo, chất lượng đào tạo, tổ chức cải tiến chương trình đào tạo…,&nbsp;doanh nghiệp đóng vai trò là đơn vị phối hợp, hỗ trợ và chịu trách nhiệm về tổ chức, quản lý, phục vụ cho quá trình đào tạo và đặc biệt là sử dụng sản phẩm đào tạo. Mối liên kết trường đại học - doanh nghiệp&nbsp;là mối quan hệ đối tác chiến lược, trong đó hai bên phối hợp nhằm đạt được những lợi ích chung và cùng nhau tạo ra giá trị bền vững.&nbsp;</p><p>Thủy sản là ngành đào tạo truyền thống, thế mạnh của Trường Đại học (ĐH) Nha Trang; Chiến lược phát triển Trường đến năm 2030, tầm nhìn đến năm 2045 (Nghị quyết số 31/NQ-ĐHNT ngày 29/11/2024 của Hội đồng trường) xác định: đến năm 2030 trở thành đại học đa lĩnh vực, thuộc nhóm đầu đại học ở khu vực Đông Nam Á về một số ngành khoa học - công nghệ biển và thủy sản; đến năm 2045 là đại học có thứ hạng cao của Việt Nam, thuộc nhóm đầu các đại học ở Châu Á về một số ngành khoa học - công nghệ biển và thủy sản. Nghị quyết Đại hội đại biểu Đảng bộ Trường lần thứ XXII nhiệm kỳ 2025-2030 đề ra mục tiêu: hợp tác trong nước và quốc tế sâu rộng, có mạng lưới liên kết đa dạng và bền vững với các tổ chức đào tạo và doanh nghiệp; triển khai đa dang các hình thức hợp tác với các đối tác quốc tế chiến lược trong lĩnh vực khoa học - công nghệ biển và thủy sản.</p><p>Để phát huy thế mạnh trong lĩnh vực đào tạo, đảm bảo thực hiện các mục tiêu, chiến lược đã đề ra; trong thời gian qua, Trường ĐH Nha Trang đã thiết lập và phát triển mạng lưới hợp tác rộng khắp với các đối tác trong và ngoài nước; việc mở rộng hợp tác với các doanh nghiệp, đặc biệt là các doanh nghiệp thủy sản lớn ở trong nước ngày càng được mở rộng và đi vào chiều sâu.</p><p>Ngày 26/5/2022, Trường ký kết thỏa thuận hợp tác với Tập đoàn Thuỷ sản Minh Phú để thực hiện dự án đào tạo nhân lực ngành thủy sản; theo thỏa thuận hợp tác, Tập đoàn Thuỷ sản Minh Phú hỗ trợ 10.000.000.000 đồng (mười tỷ đồng) kinh phí đào tạo cho 100 sinh viên mỗi khóa ở 2 ngành gồm Nuôi trồng thủy sản và Công nghệ Chế biến thủy sản, với 05 khóa tuyển sinh đào tạo liên tục theo Chương trình đào tạo Minh Phú - NTU (từ năm 2022-2027); tổng giá trị cả chương trình 5 khóa là 50 tỷ đồng.</p><p>Ngày 10/01/2025 Trường ký kết thoả thuận hợp tác với Tập đoàn Hải Vương; theo thỏa thuận hợp tác, Tập đoàn Hải Vương đặt hàng Trường ĐH Nha Trang đào tạo ngành Công nghệ chế biến thủy sản HVG-NTU cho 3 khóa, mỗi khóa khoảng 30 sinh viên; theo đó, Tập đoàn sẽ hỗ trợ 100% kinh phí đào tạo của 3 khóa với tổng số tiền 9 tỷ đồng (trị giá 100 triệu đồng/sinh viên trong 4,5 năm học).</p><p><img src=\"https://ntu.edu.vn/uploads/56/2025/325-hop-tac-dn-1.jpg\" alt=\"\" width=\"1000\" height=\"658\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2025/325-hop-tac-dn-2.JPG\" alt=\"\" width=\"1087\" height=\"769\"></p><p><i>Trường Đại học Nha Trang ký kết hợp tác đào tạo với 02 Tập đoàn thủy sản hàng đầu của Việt Nam: Tập đoàn Thủy sản Minh Phú (năm 2022) và Tập đoàn Hải Vương (năm 2025).</i></p><p>Bên cạnh hỗ trợ kinh phí, sinh viên theo học các chương trình đào tạo theo thỏa thuận được tham quan, thực tập, thực hành tại các cơ sở sản xuất, kinh doanh, được bố trí phương tiện đi lại; được tiếp cận các hoạt động liên quan đến đổi mới sáng tạo, công nghệ, kỹ thuật tiên tiến mới hoặc tham gia các sự kiện của Tập đoàn Thủy sản Minh Phú, Tập đoàn Hải Vương. Cam kết của chương trình hợp tác đào tạo: sau khi tốt nghiệp, 100% sinh viên được bố trí việc làm phù hợp với chuyên môn và năng lực, mức thu nhập khởi điểm tương đương hoặc cao hơn các tập đoàn, công ty lớn trong lĩnh vực thủy sản ở Việt Nam. Ngoài các quyền lợi, sinh viên theo học chương trình đào tạo phải đáp ứng các yêu cầu về đầu ra về kiến thức, kỹ năng chuyên môn, năng lực, chứng chỉ ngoại ngữ theo yêu cẩu của tập đoàn; đồng thời sinh viên phải cam kết làm việc cho tập đoàn theo thời hạn ngay sau khi tốt nghiệp.</p><p>Về phía Trường ĐH Nha Trang, để triển khai đào tạo ngành thủy sản theo thỏa thuận hợp tác đã ký kết với các tập đoàn, Nhà trường tăng thời gian đào tạo lên 4,5 năm để đảm bảo điều kiện sinh viên tốt nghiệp là kỹ sư, tăng thời lượng đào tạo tiếng Anh, tin học, các kỹ năng mềm, đào tạo kiến thức, kỹ năng về quản lý, quản trị; áp dụng chính sách hỗ trợ miễn phí ký túc xá. Trường thường xuyên phối hợp với tập đoàn tổ chức các chương trình giao lưu, chia sẻ, tư vấn hướng nghiệp cho học sinh, sinh viên; kịp thời trao đổi thông tin giữa các bên liên quan để đảm bảo chất lượng, tiến độ thực hiện các chương trình, thỏa thuận. Sinh viên theo học chương trình này phải trải qua bước sơ tuyển trước khi xét tuyển chính thức, bước sơ tuyển sẽ do hội đồng sơ tuyển thực hiện có sự tham gia của các tập đoàn để lựa chọn những thí sinh thể hiện rõ năng lực, đam mê và phù hợp với chương trình.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2025/325-hop-tac-dn-3.jpg\" alt=\"\" width=\"1000\" height=\"548\"></p><p><i>Trường Đại học&nbsp;Nha Trang và Tập đoàn Thủy sản Minh Phú tổ chức tư vấn hướng nghiệp ngành thủy sản cho học sinh lớp 12 trên địa bàn TP Cà &nbsp;Mau.</i></p><p>Việc ký kết và triển khai đào tạo theo chương trình hợp tác với doanh nghiệp là mô hình quan trọng, cần thiết được thực hiện trong xu hướng tự chủ đại học, đây chính là phương thức đào tạo theo đơn đặt hàng của doanh nghiệp, đào tạo theo định hướng nhu cầu của xã hội và nhà tuyển dụng. Sự hợp tác giữa Trường ĐH Nha Trang với các tập đoàn lớn, hàng đầu trong lĩnh vực thủy sản là minh chứng khẳng định vai trò, thế mạnh của Trường trong việc đáp ứng nhu cầu đào tạo thực tiễn của doanh nghiệp; đồng thời cũng là minh chứng cho cam kết mạnh mẽ của doanh nghiệp trong việc đồng hành cùng Nhà trường góp phần thúc đẩy phát triển ngành thủy sản - một ngành kinh tế mũi nhọn của Việt Nam, góp phần thực hiện Nghị quyết số 36-NQ/TW ngày 22/10/2018 của Ban Chấp hành Trung ương Đảng (khóa XII) về Chiến lược phát triển bền vững kinh tế biển Việt Nam đến năm 2030, tầm nhìn đến năm 2045.</p><p><i><strong>Tác giả: ThS. Ngô Thị Quỳnh Châu</strong></i></p><p><i><strong>Phòng Thanh tra - Pháp chế</strong></i></p>', 'media/chia-se-1781335505/325-hop-tac-dn-3-1781335912-ZjwGca.jpg', 1, 1, 0, 1, '2026-06-13 00:31:57', '2026-06-16 01:59:42'),
(8, 'Chào cờ đầu Quý - Nét đẹp văn hóa Trường Đại học Nha Trang', 'chao-co-dau-quy-net-dep-van-hoa-truong-dai-hoc-nha-trang-8', NULL, '<p><strong>Chào cờ&nbsp;- một nghi thức trang trọng mang nhiều ý nghĩa sâu sắc,&nbsp;thể hiện lòng yêu nước, lý tưởng cách mạng, niềm tự hào dân tộc và sự biết ơn đối với thế hệ đi trước; đây còn là nội dung sinh hoạt chính trị có ý nghĩa quan trọng nhằm giáo dục ý thức đạo đức, kỷ luật và tinh thần đoàn kết trong cộng đồng, đặc biệt là trong môi trường học đường.&nbsp;Tham gia lễ chào cờ không chỉ là trách nhiệm mà còn là cơ hội để mỗi người Việt Nam thể hiện bản sắc văn hóa, tình cảm, lòng kính yêu đối với Đảng, Tổ quốc, Bác Hồ; thể hiện khát vọng, ý chí tự lực, tự cường của dân tộc trong sự nghiệp xây dựng và bảo vệ Tổ quốc.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/9851/img/chao-co-dau-quy-net-dp-van-hoa-truong-dai-hoc-nha-trang.jpg\" alt=\"Chào cờ đầu Quý - Nét đẹp văn hóa Trường Đại học Nha Trang\" width=\"1920\" height=\"1080\"></p><p>Xuất phát từ truyền thống, hiểu rõ ý nghĩa và tầm quan trọng của hoạt động này; trong thời gian qua, Trường Đại học Nha Trang đã duy trì thường xuyên, nghiêm túc việc tổ chức Chào cờ và hát Quốc ca đầu Quý, trở thành nét đẹp văn hóa tại Trường, nét sinh hoạt quen thuộc của nhiều người. Tham dự lễ Chào cờ có Bí thư Đảng ủy, Chủ tịch Hội đồng trường, Hiệu trưởng, các Phó Hiệu trưởng; lãnh đạo các đơn vị thuộc, trực thuộc Trường và toàn thể giảng viên, viên chức, người lao động Nhà trường.</p><p>Đều đặn mỗi Quý, vào lúc 07h00 một ngày thuộc tuần đầu tiên của tháng đầu Quý; tập thể viên chức, người lao động thuộc Trường Đại học Nha Trang tề tựu tại Hội trường 3 để dự lễ Chào cờ. Khi tất cả các thành viên trong hội trường đã ổn định, tiếng hô dõng dạc của người điều hành buổi lễ Chào cờ vang lên: “Nghiêm! Chào cờ! Chào”…. “Quốc ca”; tất cả lãnh đạo, viên chức, người lao động cùng hướng ánh mắt về lá Quốc kì đỏ thắm trên màn hình và cất cao tiếng hát hào hùng “Đoàn quân Việt Nam đi….”; một bầu không khí trang trọng, thiêng liêng bao phủ toàn bộ khu vực hội trường.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2025/325-chao-co-1.JPG\" alt=\"\" width=\"1087\" height=\"725\"></p><p><i>Viên chức, người lao động hướng về lá Quốc kỳ đỏ thắm trên màn hình và cất cao lời bài hát Quốc ca.</i></p><p>Sau nghi thức Chào cờ và hát Quốc ca; chúng tôi lại được nghe Nhà trường triển khai một số nội dung công việc quan trọng, nổi bật: đại diện Ban Giám hiệu đánh giá tình hình hình, kết quả thực hiện nhiệm vụ trong quý và những nhiệm vụ trọng tâm trong thời gian tới; nhắc nhở viên chức, người lao động thực hiện tốt các quy chế, quy định của Trường; lưu ý những tồn tại, hạn chế cần phải khắc phục. Đồng thời, trong không khí trang nghiêm của buổi lễ, Trường còn tổ chức các hoạt động tuyên dương, khen thưởng các tập thể, cá nhân có thành tích xuất sắc trong công tác chuyên môn cũng như các hoạt động phong trào, đoàn thể; công bố quyết định và trao giấy chứng nhận kiểm định chất lượng các chương trình đào tào, các quyết định mở ngành đào tạo; công bố và trao các quyết định bổ nhiệm, bổ nhiệm lại đối với viên chức quản lý; các quyết định bổ nhiệm và bổ nhiệm lại giáo sư, phó giáo sư, giảng viên cao cấp. Lồng ghép trong sinh hoạt này còn là các hoạt động tuyên truyền, phổ biến các quy định mới của cấp có thẩm quyền có liên quan trực tiếp tới quyền lợi, nghĩa vụ của viên chức, người lao động; liên quan đến việc thực hiện chức năng, nhiệm vụ của Trường như: báo cáo chuyên đề các điểm cơ bản của Luật Đất đai (sửa đổi); chia sẻ cách đề phòng, việc xử lý các&nbsp;tình huống khi xảy ra hỏa hoạn, cháy nổ tại gia đình, nơi làm việc….</p><p><img src=\"https://ntu.edu.vn/uploads/56/2025/325-chao-co-2.jpg\" alt=\"\" width=\"1087\" height=\"592\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2025/325-chao-co-3.jpg\" alt=\"\" width=\"1087\" height=\"700\"></p><p><i>Tại buổi Chào cờ, Nhà trường tiến hành một số nội dung như khen thưởng các tập thể, cá nhân có thành tích xuất sắc; công bố và trao quyết định bổ nhiệm viên chức quản lý.</i></p><p>Buổi lễ Chào cờ không chỉ là dịp để viên chức, người lao động cùng nhìn lại những thành tựu, kết quả đã đạt được mà còn là cơ hội để khẳng định quyết tâm thực hiện thắng lợi các mục tiêu, kế hoạch đã đề ra. Hình ảnh lá cờ đỏ sao vàng, tiếng hát Quốc ca hào hùng cùng những lời chỉ đạo, nhắc nhở của lãnh đạo Trường tại buổi lễ góp phần giúp mỗi cán bộ, đảng viên, viên chức, người lao động ý thức hơn trong việc rèn luyện phẩm chất đạo đức, tác phong, lề lối làm việc, không ngừng học tập nâng cao trình độ chuyên môn; phát huy tinh thần trách nhiệm, thúc đẩy phong trào thi đua yêu nước; quyết tâm, nhiệt huyết, nâng cao chất lượng hiệu quả công tác, thực hiện tốt các chức trách, nhiệm vụ được giao trong tinh thần phụng sự, phục vụ. &nbsp;</p><p>Khoảng thời gian Chào cờ tại Trường cũng là thời điểm kết nối các đồng nghiệp trở nên gần gũi hơn; trong không gian của buổi lễ, mọi khoảng cách như được xóa nhòa, để lại một tập thể đoàn kết, tràn đầy nhiệt huyết và khát vọng. Đây là dịp để chúng tôi được gặp gỡ, trò chuyện, giao lưu, động viên nhau cùng cố gắng, vượt qua khó khăn để hoàn thành các nhiệm vụ. Khi nghi lễ kết thúc, những hàng ghế trở nên sôi động hơn, lời chào nhau vang lên như lời chúc cho một tuần làm việc mới hiệu quả, tích cực với tâm thế tự tin, hứng khởi, tràn đầy năng lượng.&nbsp;</p><p>Có lẽ, lễ Chào cờ ai cũng đã trải qua trong đời, khi còn là học sinh, sinh viên; tuy nhiên khi đó bản thân tôi và nhiều đồng nghiệp của mình có thể chưa cảm nhận hết ý nghĩa, sự thiêng liêng mà nó mang tới. &nbsp;</p><p>Trong lần Chào cờ Quý II/2025 có sự tham dự của Tiến sĩ Nguyễn Văn Đường, Giám đốc Trung tâm Kiểm định chất lượng giáo dục Thăng Long, ông là khách mời tại buổi lễ khi Nhà trường tiến hành công bố quyết định và trao giấy chứng nhận kiểm định chất lượng cho 07 chương trình đào tạo. Sau thực hiện nghi thức trao giấy chứng nhận cho các chương trình đào tạo, khi đại diện cho Trung tâm phát biểu, Tiến sĩ Nguyễn Văn Đường đã xúc động bày tỏ: <i>“Bản thân tôi thật vinh dự, tự hào khi hôm nay được tham gia một buổi lễ Chào cờ hết sức long trọng, đầy ý nghĩa của Trường - một truyền thống, nét văn hóa mà hiện nay hiếm có trường đại học, cơ quan, doanh nghiệp nào còn lưu giữ, duy trì thực hiện”</i>.</p><p>Không đơn thuần là một hoạt động định kỳ mà còn mang nhiều giá trị - nghi lễ Chào cờ mỗi Quý là nét đẹp văn hóa của Nhà trường, nghi lễ diễn ra trong thời gian ngắn nhưng đọng lại với tất cả viên chức, người lao động tham dự là niềm tự hào về mái trường Đại học Nha Trang, là biểu tượng của lòng yêu nước, tinh thần trách nhiệm và niềm tin vào một tương lai tốt đẹp mà các thế hệ trước đây, hôm nay và mai sau đang chung tay xây dựng.&nbsp;</p><p><i><strong>Tác giả: ThS. Ngô Thị Quỳnh Châu</strong></i></p><p><i><strong>Phòng Thanh tra - Pháp chế</strong></i></p>', 'media/chia-se-1781335505/chao-co-dau-quy-net-dp-van-hoa-truong-dai-hoc-nha-trang-1781336406-znKyYA.jpg', 1, 1, 0, 1, '2026-06-13 00:40:16', '2026-06-16 01:59:28');
INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `content`, `image`, `views`, `status`, `is_featured`, `author_id`, `created_at`, `updated_at`) VALUES
(9, 'Độc đáo Bảo tàng Ngư cụ lưu giữ lịch sử nghề khai thác thủy sản tại phố biển Nha Trang', 'doc-dao-bao-tang-ngu-cu-luu-giu-lich-su-nghe-khai-thac-thuy-san-tai-pho-bien-nha-trang-9', NULL, '<p><strong>Bảo tàng Ngư cụ - Trường ĐH Nha Trang với nhiều mẫu vật từ truyền thống đến hiện đại được xây dựng và giữ gìn, phản ánh chân thực cuộc sống thường ngày của ngư dân vùng biển, là địa điểm tham quan, nghiên cứu quen thuộc của nhiều sinh viên, giảng viên và nhà nghiên cứu.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/6/images/news/4757/img/dsc05927-240403140634.jpg\" alt=\"Độc đáo Bảo tàng Ngư cụ lưu giữ lịch sử nghề khai thác thủy sản tại phố biển Nha Trang\" width=\"480\" height=\"320\"></p><p><strong>Lưu trữ nhiều mẫu vật có giá trị</strong></p><p>Khai thác thủy sản là một ngành nghề quan trọng đối với những quốc gia có biển, trong đó có Việt Nam. Từ xa xưa, con người đã sử dụng nhiều loại ngư cụ có cấu trúc và mức độ tinh xảo khác nhau để khai thác thủy sản phục vụ nhu cầu cuộc sống hàng ngày. Tại Bảo tàng Ngư cụ - Trường ĐH Nha Trang hiện đang lưu giữ và trưng bày&nbsp; hơn 100 mẫu vật, đại diện cho các ngành nghề khai thác thủy sản đã xuất hiện tại nước ta. Các mẫu vật được chia thành 5 nhóm, gồm nhóm ngư cụ đóng (các loại lưới rê đơn, rê kép, rê hỗn hợp), nhóm ngư cụ lọc (lưới rùng, lưới vây, lưới chụp, lưới mành…), nhóm ngư cụ kéo (các loại lưới kéo đơn, lưới kéo đôi…), nhóm ngư cụ cố định và ngư cụ bẫy (đăng, nò, lồng bẫy…), nhóm ngư cụ câu (câu vàng, câu tây…). Bên cạnh những mẫu vật do đội ngũ cán bộ, giảng viên Viện KH&amp;CNKT Thủy sản tìm kiếm để lưu giữ hoặc thực hiện mô hình, không ít những mẫu vật tại Bảo tàng được chính các thế hệ sinh viên sưu tầm và đóng góp trưng bày.</p><p>Một trong những nhóm mẫu vật được xem là kỳ công và mất nhiều thời gian bố trí nhất là mô hình địa hình sông biển, bố trí các loại ngư cụ đại diện những ngành nghề khai thác thủy sản thô sơ mà các thế hệ ông cha đã sử dụng. Dựa trên thông tin, kiến thức về các vùng nước, các cán bộ, giảng viên của Viện KH&amp;CNKT Thủy sản đã nghiên cứu và thể hiện ngành nghề khai thác bằng cách gắn các loại ngư cụ đặc trưng với từng vùng nước mặn - ngọt, nông – sâu, từ những vật dụng quen thuộc như chiếc nơm úp cá, chiếc dậm cá cho đến những mô hình thu nhỏ hệ thống lưới bẫy cá ở nhiều vùng miền. Cũng từ mô hình này, khách tham quan Bảo tàng có thể có cái nhìn toàn diện về nghề khai thác thủy sản của dân tộc từ xưa đến nay, với sự sáng tạo và khéo léo của con người trong quá trình tìm hiểu và thích ứng với thiên nhiên.<br><br>&nbsp;</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05927.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><i>Mô hình địa hình sông biển được bố trí các loại ngư cụ phù hợp với từng vùng miền.</i><br><br>&nbsp;</p><p>Dễ dàng nhìn thấy tại Bảo tàng ngư cụ những mô hình tàu thuyền, từ thô sơ đến hiện đại. Tất cả đều được thực hiện tỉ mỉ, đảm bảo tái hiện hình ảnh những chiếc tàu khai thác với đầy đủ dụng cụ, chi tiết đặc trưng và tỉ lệ chính xác nhất. Được thực hiện gần đây nhất là mô hình tàu cá 820cv, tỉ lệ 1/35 theo tiêu chuẩn tàu cá vỏ thép thực hiện theo Nghị định 67 của Chính phủ. Nhóm thực hiện đã cố gắng tái hiện hình ảnh con tàu vỏ thép chân thực nhất từ những hầm bảo quản thủy sản, dàn lưới, dàn đèn cho đến hệ thống ống nước trên tàu. Với nhiều người, mô hình tàu thuyền là một trong những điểm thu hút nhất của Bảo tàng ngư cụ, khi có thể nhìn thấy ở đó, quá trình nghiên cứu kỹ lưỡng và tỉ mỉ thực hiện của các cán bộ, giảng viên để đem đến mô hình gần giống nhất với tàu thực tế.<br><br>&nbsp;</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05909.jpg\" alt=\"\" width=\"480\" height=\"320\"><br><br><i>Mô hình tàu cá 820cv, tỉ lệ 1/35 theo tiêu chuẩn tàu cá vỏ thép.</i><br><br>&nbsp;</p><p>Chính nhờ quá trình không ngừng sưu tầm mẫu vật, Bảo tàng Ngư cụ của Trường ĐH Nha Trang hiện đang lưu giữ một tập hợp ngư cụ Việt Nam được dựng lại, phục chế, mô hình hóa theo chuẩn mực khoa học nghề cá, theo tiến trình phát triển lịch sử, theo nguyên lý đánh bắt và cấu trúc ngư cụ tương đồng với môi trường vùng nước và đối tượng khai thác phục vụ cho đào tạo và nghiên cứu khoa học của ngành khai thác và lĩnh vực nghề cá nói chung.</p><p><strong>Địa điểm tham quan và thực hành lý thú</strong></p><p>Bảo tàng Ngư cụ được nâng cấp từ Trung tâm thực hành của Viện Khoa học và Công nghệ Khai thác Thủy sản, chính vì thế, bên cạnh chức năng lưu giữ và trưng bày các hiện vật, Bảo tàng còn được xem là địa điểm tham quan, học tập lý thú dành cho sinh viên và các nhà nghiên cứu ngành Thủy sản.</p><p>Sa bàn vùng biển Việt Nam - một trong những mẫu vật đang được trưng bày tại Bảo tàng ngư cụ hỗ trợ đắc lực cho quá trình đào tạo gắn với thực hành cho sinh viên của Viện Khoa học và Công nghệ Khai thác Thủy sản. Từ sa bàn này, giảng viên dễ dàng truyền đạt kiến thức và hướng dẫn sinh viên quan sát thấy rõ những đặc điểm của vùng biển Việt Nam cùng với hệ thống hỗ trợ nghề cá, cảng cá các điểm có ngọn hải đăng... theo cách sống động và trực quan nhất.<br><br>&nbsp;</p><p><br><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05918.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><i>Sa bàn vùng biển Việt Nam.</i></p><p>Với những môn học cần quan sát trực tiếp các ngư cụ, thay vì phải ra các cảng biển hoặc các vùng biển có ngư cụ cần tìm hiểu, sinh viên chỉ cần đến bảo tàng ngay trong khuôn viên Nhà trường để trực tiếp quan sát, tìm hiểu thông tin về tàu thuyền và các ngư cụ. Việc này càng thêm ý nghĩa đối với nhu cầu quan sát, tìm hiểu những ngư cụ cổ xưa, đã không còn thông dụng trong nghề biển hiện nay, qua đó, giúp nâng cao tính thực tế trong các hoạt động đào tạo.</p><p>Việt Nam là một quốc gia biển, có nền kinh tế gắn bó với biển và nền văn hóa biển lâu đời. Trong đó, vùng duyên hải miền Trung được xem là nơi tạo dựng và bảo lưu những giá trị văn hóa biển phong phú và đa dạng. Chính vì thế, hơn bao giờ hết, lịch sử phát triển nghề cá cần được bảo tồn cùng với những ngư cụ khai thác cổ truyền tinh xảo, đang có nguy cơ mai một, thất truyền. “Bảo tàng Ngư cụ của Nhà trường là một sự sưu tầm, tìm kiếm công phu, của bao thế hệ thầy trò của Nhà trường. Từ bảo tàng ngư cụ, chúng ta thấy được một quá trình phát triển nghề khai thác thủy sản của đất nước ta, từ những nghề truyền thống cho đến những nghề hiện đại”. – GS.TS Nguyễn Trọng Cẩn – Nguyên Hiệu trưởng Trường ĐH Nha Trang chia sẻ suy nghĩ khi đến thăm bảo tàng Ngư cụ.</p><p>Hiện nay, Bảo tàng ngư cụ vẫn thường xuyên được cập nhật thông tin về ngư cụ, lưu giữ tài liệu và hiện vật về nghề khai thác được sưu tầm trong và ngoài nước với mong muốn bên cạnh hỗ trợ đào tạo và nghiên cứu khoa học, còn giúp làm tốt nhiệm vụ truyền bá thông tin nghề cá, là địa điểm “tham quan nghề nghiệp” lý thú cho những ai muốn hiểu thêm về nghề khai thác thủy sản Việt Nam.</p><p><i>Hợp tác Đối ngoại</i><br><br>&nbsp;</p><p>Một số hình ảnh về Bảo tàng Ngư cụ:<br><br>&nbsp;</p><p><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05914.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05919.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05922.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05925.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05926.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05929.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05930.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05935.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05937.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05942.JPG\" alt=\"\" width=\"480\" height=\"320\"><br><br><img src=\"https://ntu.edu.vn/uploads/6/images/bao-tang-ngu-cu/DSC05947.JPG\" alt=\"\" width=\"480\" height=\"320\"></p>', 'media/ntu-1781338641/dsc05927-240403140634-1781338651-wIZmdr.jpg', 2, 1, 0, 1, '2026-06-13 01:17:35', '2026-06-16 02:23:26'),
(10, 'Khoa Ngoại ngữ tổ chức nhiều hoạt động mừng Ngày Nhà giáo Việt Nam 20/11', 'khoa-ngoai-ngu-to-chuc-nhieu-hoat-dong-mung-ngay-nha-giao-viet-nam-2011-10', NULL, '<p><strong>Nhân kỷ niệm 40 năm Ngày Nhà giáo Việt Nam 20/11/1982 – 20/11/2022, Khoa Ngoại ngữ - Trường Đại học Nha Trang đã tổ chức nhiều hoạt động ý nghĩa và phong phú.</strong></p><p>&nbsp;</p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/6505/img/khoa-ngoai-ngu-to-chuc-nhieu-hoat-dong-mung-ngay-nha-giao-viet-nam-20-11.jpg\" alt=\"Khoa Ngoại ngữ tổ chức nhiều hoạt động mừng Ngày Nhà giáo Việt Nam 20/11\" width=\"934\" height=\"526\"></p><p><strong>&nbsp; &nbsp; &nbsp;Câu lạc bộ tiếng Anh chủ đề Teacher &amp; Education</strong></p><p>&nbsp; &nbsp; &nbsp;Là hoạt động quan trọng được Lãnh Sự quán Mỹ tại trợ trong khuôn khổ Dự án Phát triển Cộng đồng Anh ngữ tại tỉnh Khánh Hòa giai đoạn 2, CLB tiếng Anh do Khoa Ngoại ngữ chủ trì đã tổ chức buổi sinh hoạt với chủ đề Teacher &amp; Educations với nội dung bổ ích và nhiều trò chơi thú vị, thu hút nhiều sinh viên học tiếng Anh không chuyên toàn Trường đến tham dự.</p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/1.jpg\" alt=\"\" width=\"480\" height=\"324\"></p><p><strong>&nbsp; &nbsp; &nbsp;Cuộc thi văn nghệ chào mừng Ngày Nhà giáo 20/11</strong></p><p>&nbsp; &nbsp; &nbsp;Đoàn Thanh nhiên Khoa Ngoại ngữ tổ chức cuộc thi văn nghệ dành cho toàn bộ sinh viên ngành Ngôn ngữ Anh với rất nhiều tiết mục đặc sắc. Gala Ngàn lời tri ân diễn ra vào tối 16/11/2022 với sự góp mặt của hàng ngàn sinh viên, để cùng nhau tri ân toàn thể cán bộ, giảng viên của Khoa. Tại đêm Gala, BTC đã công bố giải nhất Cuộc thi thuộc về Chi đoàn 63 Ngôn ngữ Anh 5 với tiết mục công phu và nhiều cảm xúc: Hát múa Lá thư gửi thầy kết hợp trình diễn thời trang.</p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/2.jpg\" alt=\"\" width=\"480\" height=\"199\"></p><p><strong>&nbsp; &nbsp; &nbsp;Câu lạc bộ tiếng Trung chủ đề Viết thư pháp – Tri ân thầy cô</strong></p><p>&nbsp; &nbsp; &nbsp;Tối ngày 17/11/2022, CLB tiếng Trung do Khoa Ngoại ngữ chủ trì đã tổ chức buổi sinh hoạt với chủ đề Viết thư pháp – Tri ân thầy cô. Điểm nhấn đặc sắc là hoạt động giao lưu trực tuyến ngay tại hội trường giữa Ban Chủ nhiệm Khoa Ngoại ngữ, Trung tâm Ngoại ngữ, gần 100 sinh viên với các lãnh đạo, giảng viên đến từ Đại học Hải Dương Thượng Hải – Trung Quốc. Thông qua kết nối trực tuyến, sinh viên đã được hiểu thêm về nghệ thuật thư pháp của Trung Quốc và cách viết ra được bức thư pháp đẹp mắt làm quà tặng tri ân thầy cô.</p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/3.jpg\" alt=\"\" width=\"480\" height=\"480\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/4.jpg\" alt=\"\" width=\"480\" height=\"270\"><br>&nbsp;</p><p><i><strong>Khoa Ngoại ngữ</strong></i></p>', 'media/ntu-1781338641/khoa-ngoai-ngu-to-chuc-nhieu-hoat-dong-mung-ngay-nha-giao-viet-nam-20-11-1781338750-GZV1Pw.jpg', 3, 1, 0, 1, '2026-06-13 01:19:13', '2026-06-16 04:07:08'),
(11, 'Giảng viên Khoa Ngoại ngữ cập nhật phương pháp giảng dạy hiện đại cùng chuyên gia National Geographic Learning', 'giang-vien-khoa-ngoai-ngu-cap-nhat-phuong-phap-giang-day-hien-dai-cung-chuyen-gia-national-geographic-learning-11', NULL, '<p><strong>Sáng ngày 04/6/2026, tại Phòng LAB 2, Khoa Ngoại ngữ, Trường Đại học Nha Trang đã phối hợp với National Geographic Learning (Cengage) tổ chức&nbsp;tập huấn&nbsp;chuyên môn với chủ đề “Making the Most of Life 3rd Edition – Khai thác tối ưu nguồn tài nguyên giảng dạy tiếng Anh không chuyên”. Chương trình thu hút sự tham gia của đông đảo giảng viên Khoa Ngoại ngữ.</strong></p>', 'media/dao-tao-1781428402/giang-vien-khoa-ngoai-ngu-cap-nhat-phuong-phap-giang-day-hien-dai-cung-chuyen-gia-1781430022-4PMhV6.jpg', 1, 1, 0, 1, '2026-06-14 02:49:44', '2026-06-16 01:58:25'),
(12, 'Sinh viên Canada trải nghiệm học tiếng Việt và văn hóa Việt Nam tại Trường Đại học Nha Trang', 'sinh-vien-canada-trai-nghiem-hoc-tieng-viet-va-van-hoa-viet-nam-tai-truong-dai-hoc-nha-trang-12', NULL, '<p><strong>Từ ngày 04/5 đến ngày 03/6/2026, Trường Đại học Nha Trang đã tổ chức Chương trình giao lưu văn hóa và giảng dạy tiếng Việt dành cho 15 sinh viên đến từ Canada. Chương trình có sự tham gia giảng dạy và hướng dẫn của 3 giảng viên Khoa Ngoại ngữ, với mục tiêu giúp sinh viên quốc tế nâng cao năng lực giao tiếp tiếng Việt, đồng thời tìm hiểu sâu hơn về văn hóa, lịch sử và đời sống Việt Nam.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/11959/img/sinh-vien-canada-trai-nghiem-hoc-tieng-viet-va-van-hoa-viet-nam-tai-truong-dai-ho.jpg\" alt=\"Sinh viên Canada trải nghiệm học tiếng Việt và văn hóa Việt Nam tại Trường Đại học Nha Trang\" width=\"1920\" height=\"1080\"></p><p><i>Sinh viên Canada tham gia lớp học tiếng Việt tại Trường Đại học Nha Trang.</i></p><p>Trong suốt một tháng diễn ra, chương trình được thiết kế theo hướng tích hợp giữa học tập và trải nghiệm thực tế. Bên cạnh các lớp tiếng Việt cơ bản nhằm phát triển kỹ năng nghe, nói và giao tiếp hằng ngày, sinh viên còn được tham gia các buổi định hướng, tham quan khuôn viên Trường và tìm hiểu về môi trường học tập tại Trường Đại học Nha Trang.</p><p>Đặc biệt, các chuyên đề về lịch sử, văn hóa Việt Nam đã mang đến cho sinh viên quốc tế những kiến thức nền tảng về truyền thống, phong tục tập quán và những giá trị đặc sắc của đất nước, con người Việt Nam. Song song với hoạt động học tập, sinh viên Canada còn có cơ hội giao lưu với sinh viên Nhà trường thông qua các hoạt động tập thể, trao đổi văn hóa và thực hành tiếng Việt trong môi trường thực tế.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/SV%20Canada/316-sv-canada_1.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/SV%20Canada/316-sv-canada_4.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>Sinh viên Canada trình bày tại lễ bế mạc chương trình.</i></p><p>Ngoài ra, chương trình cũng tạo điều kiện để các sinh viên trải nghiệm đời sống địa phương tại Nha Trang, khám phá nét đẹp văn hóa vùng duyên hải Nam Trung Bộ, qua đó tăng cường sự hiểu biết và gắn kết giữa sinh viên hai quốc gia.&nbsp;Các hoạt động được bố trí hài hòa giữa học tập và trải nghiệm, giúp người học không chỉ nâng cao khả năng sử dụng tiếng Việt mà còn có thêm những trải nghiệm thực tế phong phú về văn hóa và con người Việt Nam.</p><p>Chương trình khép lại bằng phần thuyết trình tổng kết và lễ bế mạc. Tại đây, các sinh viên đã chia sẻ những cảm nhận, kỷ niệm đáng nhớ cũng như những kiến thức và kỹ năng thu nhận được sau thời gian học tập tại Trường Đại học Nha Trang. Thành công của chương trình tiếp tục khẳng định nỗ lực của Nhà trường trong việc thúc đẩy quốc tế hóa giáo dục, tăng cường giao lưu văn hóa và hợp tác quốc tế.</p><p><i><strong>Một số hình ảnh</strong></i></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/SV%20Canada/316-sv-canada_2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/SV%20Canada/316-sv-canada_3.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/SV%20Canada/316-sv-canada_5.jpg\" alt=\"\" width=\"970\" height=\"579\"></p>', 'media/dao-tao-1781428402/sinh-vien-canada-trai-nghiem-hoc-tieng-viet-va-van-hoa-viet-nam-tai-truong-dai-ho-1781434218-guqMEO.jpg', 0, 1, 0, 1, '2026-06-14 03:50:28', '2026-06-16 01:57:46'),
(13, 'Trường Đại học Nha Trang ký kết hợp tác với Hiệp hội Nuôi trồng Thủy sản Thế giới, chính thức khởi động Hội nghị APA 2027', 'truong-dai-hoc-nha-trang-ky-ket-hop-tac-voi-hiep-hoi-nuoi-trong-thuy-san-the-gioi-chinh-thuc-khoi-dong-hoi-nghi-apa-2027-13', NULL, '<p><strong>Ngày 08/6/2026, Trường Đại học Nha Trang tổ chức lễ ký kết thỏa thuận hợp tác với Hiệp hội Nuôi trồng Thủy sản Thế giới (World Aquaculture Society - WAS), đồng thời công bố logo và chính thức khởi động Hội nghị Nuôi trồng Thủy sản châu Á – Thái Bình Dương năm 2027 (Asian-Pacific Aquaculture 2027 – APA 2027) tại Nha Trang.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/11978/img/truong-dai-hoc-nha-trang-ky-ket-hop-tac-voi-hiep-hoi-nuoi-trong-thuy-san-the-gioi.jpg\" alt=\"Trường Đại học Nha Trang ký kết hợp tác với Hiệp hội Nuôi trồng Thủy sản Thế giới, chính thức khởi động Hội nghị APA 2027\" width=\"4351\" height=\"2934\"></p><p><i>Đại diện Trường Đại học Nha Trang và Hiệp hội Nuôi trồng Thủy sản Thế giới thực hiện nghi thức ký kết thỏa thuận hợp tác tổ chức Hội nghị&nbsp;Nuôi trồng Thủy sản châu Á – Thái Bình Dương năm 2027.</i></p><p>Tham dự chương trình, về phía Trường Đại học Nha Trang có TS. Quách Hoài Nam – Hiệu trưởng Nhà trường; GS.TS. Phạm Quốc Hùng – Phó Hiệu trưởng Nhà trường cùng lãnh đạo các đơn vị, các nhà khoa học, giảng viên và sinh viên. Về phía đối tác có Giáo sư Mario Stael – Giám đốc điều hành WAS; bà Natchavee Angsuwattananon – Thư ký WAS. Tham dự sự kiện còn có đại diện Sở Nông nghiệp và Môi trường tỉnh Khánh Hòa cùng các doanh nghiệp, tổ chức hoạt động trong lĩnh vực thủy sản.</p><p>Phát biểu tại buổi lễ, TS. Quách Hoài Nam nhấn mạnh việc Trường Đại học Nha Trang được lựa chọn đăng cai APA 2027 là niềm vinh dự lớn lao, đồng thời là trách nhiệm quan trọng đối với Nhà trường. Sự kiện không chỉ khẳng định vị thế, uy tín của Trường trong lĩnh vực đào tạo, nghiên cứu và chuyển giao công nghệ thủy sản mà còn góp phần quảng bá hình ảnh Việt Nam và tỉnh Khánh Hòa đến cộng đồng khoa học quốc tế.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/APA/316-apa_qhn2.jpg\" alt=\"\" width=\"970\" height=\"696\"></p><p><i>TS. Quách Hoài Nam - Hiệu trưởng Trường Đại học Nha Trang phát biểu tại lễ ký kết hợp tác với Hiệp hội Nuôi trồng Thủy sản Thế giới (WAS) và khởi động Hội nghị APA 2027.</i></p><p>Theo kế hoạch, APA 2027 sẽ diễn ra từ ngày 07 đến 10/9/2027 tại Nha Trang với chủ đề “Nuôi trồng thủy sản xanh vì tương lai bền vững: Đổi mới sáng tạo từ vùng nhiệt đới, giải pháp cho toàn cầu”. Hội nghị dự kiến thu hút hơn 800 nhà khoa học, chuyên gia, nhà quản lý, doanh nghiệp và tổ chức quốc tế tham gia, cùng khoảng 130 gian hàng triển lãm giới thiệu các công nghệ, sản phẩm và giải pháp mới trong lĩnh vực nuôi trồng thủy sản.</p><p>Trong khuôn khổ chương trình, Trường Đại học Nha Trang và WAS đã trao đổi kế hoạch phối hợp tổ chức APA 2027, tập trung vào các nội dung về chương trình học thuật, triển lãm quốc tế, kết nối doanh nghiệp, truyền thông, hậu cần và các hoạt động quảng bá hình ảnh Nha Trang – Khánh Hòa đến bạn bè quốc tế. Hai bên cũng thực hiện nghi thức ký kết thỏa thuận hợp tác, công bố logo chính thức và khởi động APA 2027.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/APA/316-apa_logo.jpg\" alt=\"\" width=\"970\" height=\"496\"></p><p><i>Các đại biểu thực hiện nghi thức công bố logo và chính thức khởi động Hội nghị Nuôi trồng Thủy sản châu Á – Thái Bình Dương năm 2027 (APA 2027).</i></p><p>Lễ ký kết và khởi động APA 2027 đánh dấu bước khởi đầu quan trọng trong quá trình chuẩn bị cho một trong những sự kiện quốc tế lớn nhất của ngành nuôi trồng thủy sản khu vực châu Á – Thái Bình Dương. Đây cũng là minh chứng cho chiến lược hội nhập quốc tế sâu rộng của Trường Đại học Nha Trang, góp phần thúc đẩy phát triển kinh tế biển xanh, nuôi trồng thủy sản bền vững và nâng cao vị thế của Việt Nam trên bản đồ khoa học thủy sản thế giới.</p><p><i><strong>Một số hình ảnh</strong></i></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/APA/316-apa_1.jpg\" alt=\"\" width=\"970\" height=\"556\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/APA/316-apa_2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/APA/316-apa_3.jpg\" alt=\"\" width=\"970\" height=\"529\"></p>', 'media/dao-tao-1781428402/316-apa-logo-1781434447-IQbAJL.jpg', 0, 1, 0, 1, '2026-06-14 03:54:12', '2026-06-16 01:57:25'),
(14, 'Trường Đại học Nha Trang ký kết thỏa thuận hợp tác toàn diện với BIDV Khánh Hòa', 'truong-dai-hoc-nha-trang-ky-ket-thoa-thuan-hop-tac-toan-dien-voi-bidv-khanh-hoa-14', NULL, '<p><strong>Ngày 09/6/2026, Trường Đại học Nha Trang tổ chức Lễ ký kết Thỏa thuận hợp tác toàn diện với Ngân hàng TMCP Đầu tư và Phát triển Việt Nam (BIDV) – Chi nhánh Khánh Hòa, mở ra nhiều cơ hội hợp tác thiết thực trong lĩnh vực đào tạo, nghiên cứu khoa học, chuyển đổi số và phát triển nguồn nhân lực.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/12003/img/truong-dai-hoc-nha-trang-ky-ket-thoa-thuan-hop-tac-toan-dien-voi-bidv-khanh-hoa.jpg\" alt=\"Trường Đại học Nha Trang ký kết thỏa thuận hợp tác toàn diện với BIDV Khánh Hòa\" width=\"4492\" height=\"2969\"></p><p><i>Đại diện Trường Đại học Nha Trang và BIDV Khánh Hòa thực hiện nghi thức ký kết Thỏa thuận hợp tác toàn diện.</i></p><p>Tham dự buổi lễ, về phía Trường Đại học Nha Trang có TS. Quách Hoài Nam – Hiệu trưởng Nhà trường; GS.TS. Phạm Quốc Hùng – Phó Hiệu trưởng Nhà trường cùng đại diện lãnh đạo các đơn vị trực thuộc. Về phía BIDV Khánh Hòa có ông Cao Thế Trọng – Giám đốc Chi nhánh; ông Phạm Trung Dũng – Phó Giám đốc Ban Khách hàng bán lẻ cùng lãnh đạo các phòng chuyên môn.</p><p>Phát biểu tại buổi lễ, TS. Quách Hoài Nam nhấn mạnh việc tăng cường hợp tác với các doanh nghiệp, tổ chức tài chính uy tín là một trong những định hướng quan trọng nhằm nâng cao chất lượng đào tạo, gắn kết hoạt động đào tạo và nghiên cứu khoa học với thực tiễn, đồng thời tạo thêm nhiều cơ hội học tập, thực tập và việc làm cho sinh viên.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/T6/BIDV/316-bidv_qhn.JPG\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>TS. Quách Hoài Nam – Hiệu trưởng Trường Đại học Nha Trang phát biểu tại lễ ký kết, khẳng định định hướng tăng cường hợp tác với doanh nghiệp nhằm nâng cao chất lượng đào tạo và nghiên cứu khoa học.</i></p><p>Theo nội dung thỏa thuận, hai bên cam kết xây dựng mối quan hệ hợp tác toàn diện, lâu dài trên cơ sở phát huy thế mạnh và nguồn lực của mỗi đơn vị. Các nội dung hợp tác trọng tâm bao gồm phối hợp tổ chức các chương trình đào tạo, bồi dưỡng chuyên môn; triển khai các hoạt động nghiên cứu khoa học và trao đổi thực tiễn; tạo điều kiện cho sinh viên tham gia kiến tập, thực tập tại BIDV Khánh Hòa.</p><p>Bên cạnh đó, BIDV Khánh Hòa sẽ xem xét hỗ trợ học bổng cho sinh viên, tài trợ các hoạt động nghiên cứu khoa học, đổi mới sáng tạo, chuyển đổi số và các hoạt động học thuật của Nhà trường. Hai bên cũng tăng cường hợp tác trong việc triển khai các sản phẩm, dịch vụ tài chính phù hợp, thúc đẩy thanh toán không dùng tiền mặt, số hóa các quy trình quản lý và nâng cao trải nghiệm người dùng.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/T6/BIDV/316-bidv_chuphinh.JPG\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>Lãnh đạo và đại biểu Trường Đại học Nha Trang, BIDV Khánh Hòa cùng chụp ảnh lưu niệm sau lễ ký kết.</i></p><p>Đặc biệt, nội dung hợp tác về chuyển đổi số được xác định là một trong những trọng tâm trong giai đoạn tới. Hai bên sẽ phối hợp chia sẻ kinh nghiệm, tư vấn chuyên môn, nghiên cứu và triển khai các giải pháp công nghệ nhằm nâng cao hiệu quả quản trị, vận hành và cung ứng dịch vụ.</p><p>Dịp này, BIDV Khánh Hòa đã trao bảng biểu trưng tài trợ trị giá 500 triệu đồng cho Trường Đại học Nha Trang nhằm hỗ trợ đầu tư cơ sở vật chất, triển khai các hoạt động nghiên cứu khoa học thường xuyên và cấp học bổng cho sinh viên. Nguồn tài trợ không chỉ góp phần nâng cao điều kiện dạy và học, thúc đẩy hoạt động nghiên cứu, đổi mới sáng tạo mà còn thể hiện trách nhiệm xã hội của doanh nghiệp trong việc đồng hành cùng nhà trường phát triển nguồn nhân lực chất lượng cao và tạo động lực cho sinh viên nỗ lực học tập, nghiên cứu.</p><p><i><strong>Một số hình ảnh</strong></i></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/T6/BIDV/316-bidv_1.JPG\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/T6/BIDV/316-bidv_2.JPG\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/T6/BIDV/316-bidv_3.JPG\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/T6/BIDV/316-bidv_4.JPG\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/T6/BIDV/316-bidv_5.JPG\" alt=\"\" width=\"970\" height=\"647\"></p>', 'media/dao-tao-1781428402/truong-dai-hoc-nha-trang-ky-ket-thoa-thuan-hop-tac-toan-dien-voi-bidv-khanh-hoa-1781434532-ZbX2H8.jpg', 1, 1, 0, 1, '2026-06-14 03:55:38', '2026-06-16 01:56:58'),
(15, 'Đánh giá luận án tiến sĩ nghiên cứu quy trình sản xuất vắc xin bạch hầu – uốn ván – ho gà vô bào hấp phụ', 'danh-gia-luan-an-tien-si-nghien-cuu-quy-trinh-san-xuat-vac-xin-bach-hau-uon-van-ho-ga-vo-bao-hap-phu-15', NULL, '<p><strong>Ngày 30/5/2026, Trường Đại học Nha Trang tổ chức phiên họp Hội đồng đánh giá luận án tiến sĩ cấp trường đối với nghiên cứu sinh Nguyễn Thị Thu Hoa, ngành Công nghệ sinh học, với đề tài “Nghiên cứu quy trình sản xuất vắc xin bạch hầu – uốn ván – ho gà vô bào hấp phụ, dạng hỗn dịch tiêm”.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/11956/img/danh-gia-luan-an-tien-s-nghien-cuu-quy-trinh-san-xuat-vac-xin-bach-hau-uon-van.jpg\" alt=\"Đánh giá luận án tiến sĩ nghiên cứu quy trình sản xuất vắc xin bạch hầu – uốn ván – ho gà vô bào hấp phụ\" width=\"4608\" height=\"3072\"></p><p><i>Nghiên cứu sinh Nguyễn Thị Thu Hoa trình bày kết quả nghiên cứu về quy trình sản xuất vắc xin bạch hầu – uốn ván – ho gà vô bào hấp phụ trước Hội đồng.</i></p><p>Hội đồng đánh giá luận án gồm 7 thành viên là các nhà khoa học, chuyên gia uy tín trong lĩnh vực công nghệ sinh học, y dược và vắc xin. Hội đồng do GS.TS. Trang Sĩ Trung, Trường Đại học Nha Trang, làm Chủ tịch; cùng các phản biện và ủy viên đến từ Viện Pasteur TP. Hồ Chí Minh, Trường Đại học Khoa học Tự nhiên – Đại học Quốc gia TP. Hồ Chí Minh, Viện Vắc xin và Sinh phẩm Y tế, Phân viện Thú y miền Trung và Trung tâm Y khoa Pasteur Đà Lạt.</p><p>Theo đánh giá của Hội đồng, luận án có ý nghĩa khoa học và thực tiễn cao, là một trong những công trình đầu tiên tại Việt Nam xây dựng mô hình hấp phụ và phối trộn vắc xin bạch hầu – ho gà – uốn ván vô bào (DTaP) dựa trên phân tích tính tương thích giữa các kháng nguyên và tá chất. Kết quả nghiên cứu đã cung cấp cơ sở khoa học quan trọng cho việc thiết kế, tối ưu hóa và hoàn thiện quy trình sản xuất vắc xin DTaP trong điều kiện Việt Nam.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/NCS/316-bao-ve-lats_hd1.jpg\" alt=\"\" width=\"970\" height=\"646\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/NCS/316-bao-ve-lats_hd2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>Các thành viên Hội đồng đánh giá luận án tiến sĩ cấp trường trao đổi, nhận xét và đánh giá những đóng góp khoa học của đề tài nghiên cứu.</i></p><p>Đặc biệt, nghiên cứu đã phát triển và thẩm định phương pháp đánh giá tính sinh miễn dịch trên mô hình chuột nhằm xác định công hiệu của thành phần ho gà vô bào, góp phần hoàn thiện công cụ kiểm định chất lượng vắc xin trong nước. Kết quả sản xuất thử nghiệm thành công ở các quy mô khác nhau cho thấy tính khả thi trong triển khai sản xuất trong nước, góp phần giảm phụ thuộc vào nguồn vắc xin nhập khẩu và nâng cao năng lực bảo đảm an ninh y tế quốc gia.</p><p>Bên cạnh những đóng góp nổi bật, Hội đồng cũng đề nghị nghiên cứu sinh tiếp tục hoàn thiện một số nội dung về tổng quan tài liệu, phương pháp nghiên cứu, phần thảo luận và cập nhật thêm các tài liệu tham khảo mới nhằm nâng cao chất lượng luận án. Trên cơ sở xem xét toàn diện, Hội đồng thống nhất đánh giá luận án đáp ứng các yêu cầu đối với luận án tiến sĩ và đủ điều kiện bảo vệ trước Hội đồng đánh giá luận án cấp trường theo quy định của Trường Đại học Nha Trang.</p><p><i><strong>Một số hình ảnh</strong></i></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/NCS/316-bao-ve-lats_1.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/NCS/316-bao-ve-lats_2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/NCS/316-bao-ve-lats_5.jpg\" alt=\"\" width=\"970\" height=\"647\"></p>', 'media/danh-gia-luan-an-tien-s-nghien-cuu-quy-trinh-san-xuat-vac-xin-bach-hau-uon-van-1781435076-V5CasA.jpg', 1, 1, 0, 1, '2026-06-14 04:05:02', '2026-06-16 02:22:44'),
(16, 'Hội thảo Kỹ thuật và Công nghệ Thủy sản thông minh thúc đẩy chuyển đổi số và công nghệ thông minh trong ngành thủy sản', 'hoi-thao-ky-thuat-va-cong-nghe-thuy-san-thong-minh-thuc-day-chuyen-doi-so-va-cong-nghe-thong-minh-trong-nganh-thuy-san-16', NULL, '<p><strong>Ngày 09/5/2026, Trường Đại học Nha Trang tổ chức Hội thảo lần thứ 3 “Kỹ thuật và Công nghệ Thủy sản thông minh – TESF 2026”, thu hút sự tham gia của đông đảo nhà khoa học, chuyên gia, doanh nghiệp, giảng viên, nghiên cứu sinh và sinh viên trong và ngoài trường.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/10849/img/hoi-thao-tesf-2026-thuc-day-chuyen-doi-so-va-cong-nghe-thong-minh-trong-nganh-thu.jpg\" alt=\"Hội thảo Kỹ thuật và Công nghệ Thủy sản thông minh thúc đẩy chuyển đổi số và công nghệ thông minh trong ngành thủy sản\" width=\"4608\" height=\"3072\"></p><p><i>TS. Trần Doãn Hùng – Phó Hiệu trưởng Trường Đại học Nha Trang phát biểu khai mạc Hội thảo TESF 2026.</i></p><p>Hội thảo do Khoa Cơ khí, Trường Kỹ thuật và Công nghệ chủ trì tổ chức nhằm tạo diễn đàn học thuật và thực tiễn để trao đổi các kết quả nghiên cứu, xu hướng công nghệ mới và giải pháp ứng dụng trong lĩnh vực kỹ thuật, công nghệ thủy sản thông minh. Đồng thời, đây cũng là dịp tăng cường kết nối giữa cơ sở đào tạo, viện nghiên cứu và doanh nghiệp, góp phần thúc đẩy chuyển đổi số, đổi mới sáng tạo và phát triển bền vững ngành thủy sản.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/316-TESF-2026_quangcanh2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>Quang cảnh Hội thảo “Kỹ thuật và Công nghệ Thủy sản thông minh – TESF 2026”.</i></p><p>Phát biểu khai mạc hội thảo, TS. Trần Doãn Hùng – Phó Hiệu trưởng Trường Đại học Nha Trang nhấn mạnh vai trò của khoa học công nghệ, trí tuệ nhân tạo (AI), Internet vạn vật (IoT) và tự động hóa trong quá trình hiện đại hóa ngành thủy sản, từ nuôi trồng, khai thác đến chế biến và quản lý chuỗi cung ứng. TESF 2026 được kỳ vọng sẽ mở ra nhiều cơ hội hợp tác nghiên cứu, chuyển giao công nghệ và phát triển nguồn nhân lực chất lượng cao cho ngành trong bối cảnh hội nhập và chuyển đổi số mạnh mẽ hiện nay.</p><p>Trong khuôn khổ hội thảo, nhiều báo cáo chuyên đề có giá trị khoa học và tính ứng dụng thực tiễn cao đã được trình bày. Nổi bật có các tham luận về ứng dụng AI trong thu thập và phân tích dữ liệu nuôi tôm; giải pháp cung ứng thủy sản đáp ứng yêu cầu thị trường Mỹ và EU; tối ưu hóa đa mục tiêu trong công nghệ thông minh; mô hình nhà máy chế biến thủy sản thông minh. Bên cạnh đó, các phân ban kỹ thuật tập trung thảo luận nhiều nội dung như AIoT giám sát chất lượng nước, công nghệ Digital Twin trong nuôi trồng thủy sản, hệ thống cân thông minh trong nhà máy chế biến, ứng dụng robot và trí tuệ nhân tạo trong giám sát nuôi biển.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/316-TESF-2026_cg1.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/316-TESF-2026_cg2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>Các chuyên gia, nhà khoa học trình bày tham luận về ứng dụng trí tuệ nhân tạo, IoT và công nghệ thông minh trong lĩnh vực thủy sản.</i></p><p>Thông qua TESF 2026, Trường Đại học Nha Trang tiếp tục khẳng định vai trò là trung tâm đào tạo, nghiên cứu và chuyển giao công nghệ trong lĩnh vực thủy sản, đồng thời góp phần thúc đẩy hệ sinh thái đổi mới sáng tạo phục vụ phát triển kinh tế biển bền vững.</p><p><i><strong>Một số hình ảnh tại Hội thảo</strong></i></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/316-TESF-2026_2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/316-TESF-2026_3.png\" alt=\"\" width=\"970\" height=\"545\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/316-TESF-2026_4.png\" alt=\"\" width=\"970\" height=\"545\"></p>', 'media/hoi-thao-tesf-2026-thuc-day-chuyen-doi-so-va-cong-nghe-thong-minh-trong-nganh-thu-1781435182-wFLEGV.jpg', 1, 1, 0, 1, '2026-06-14 04:06:25', '2026-06-16 01:56:27'),
(17, 'Hội nghị Sinh viên nghiên cứu khoa học năm học 2025 – 2026: Lan tỏa tinh thần đổi mới sáng tạo trong sinh viên NTU', 'hoi-nghi-sinh-vien-nghien-cuu-khoa-hoc-nam-hoc-2025-2026-lan-toa-tinh-than-doi-moi-sang-tao-trong-sinh-vien-ntu-17', NULL, '<p><strong>Ngày 26/5/2026, Trường Đại học Nha Trang tổ chức Hội nghị Sinh viên nghiên cứu khoa học năm học 2025 – 2026 với nhiều hoạt động học thuật sôi nổi, góp phần thúc đẩy phong trào nghiên cứu khoa học và đổi mới sáng tạo trong sinh viên toàn Trường.</strong></p><p><img src=\"https://ntu.edu.vn/uploads/56/images/news/10921/img/hoi-nghi-sinh-vien-nghien-cuu-khoa-hoc-nam-hoc-2025-2026-lan-toa-tinh-than-doi.jpg\" alt=\"Hội nghị Sinh viên nghiên cứu khoa học năm học 2025 – 2026: Lan tỏa tinh thần đổi mới sáng tạo trong sinh viên NTU\" width=\"4608\" height=\"3072\"></p><p><i>GS.TS. Phạm Quốc Hùng – Phó Hiệu trưởng Trường Đại học Nha Trang phát biểu khai mạc Hội nghị Sinh viên nghiên cứu khoa học năm học 2025 – 2026.</i></p><p>Tham dự chương trình có TS. Khổng Trung Thắng – Bí thư Đảng ủy, Phó Hiệu trưởng Nhà trường; TS. Quách Hoài Nam – Phó Bí thư Đảng ủy, Hiệu trưởng Nhà trường; GS.TS. Phạm Quốc Hùng, TS. Trần Doãn Hùng – Phó Hiệu trưởng Nhà trường cùng lãnh đạo các đơn vị, giảng viên, nhà khoa học, doanh nghiệp tài trợ và đông đảo sinh viên.</p><p>Phát biểu khai mạc Hội nghị, GS.TS. Phạm Quốc Hùng nhấn mạnh nghiên cứu khoa học không chỉ giúp sinh viên củng cố kiến thức chuyên môn mà còn hình thành tư duy sáng tạo, kỹ năng giải quyết vấn đề và năng lực hội nhập trong môi trường học thuật hiện đại. Nhà trường luôn chú trọng xây dựng môi trường học tập gắn với nghiên cứu, đổi mới sáng tạo và chuyển giao công nghệ, tạo điều kiện để sinh viên phát huy năng lực, tiếp cận thực tiễn nghề nghiệp ngay từ khi còn trên giảng đường.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/HN%20SVNCKH/316-hoi-ngh%E1%BB%8B-svnckh_sv1.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/HN%20SVNCKH/316-hoi-ngh%E1%BB%8B-svnckh_sv2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>Sinh viên trình bày các đề tài nghiên cứu tại các hội đồng chuyên môn trong khuôn khổ Hội nghị.</i></p><p>Theo thông tin từ Ban tổ chức, trong năm học 2025 – 2026, phong trào nghiên cứu khoa học sinh viên của Trường Đại học Nha Trang ghi nhận sự tăng trưởng mạnh về số lượng và chất lượng đề tài. Toàn trường có 145 đề tài nghiên cứu khoa học được triển khai, trong đó có 71 đề tài mở mới và 74 đề tài chuyển tiếp từ năm học trước; 113 đề tài đã được đánh giá nghiệm thu.</p><p>Hội nghị năm nay có 42 đề tài tiêu biểu tham gia báo cáo, đến từ 03 trường chuyên ngành và 04 khoa thuộc Nhà trường. Trong đó, Trường Kỹ thuật và Công nghệ có số lượng đề tài nhiều nhất với 28 đề tài; tiếp theo là Trường Thủy sản và Khoa học sự sống với 09 đề tài. Các đề tài trải rộng trên nhiều lĩnh vực như khoa học kỹ thuật và công nghệ, khoa học nông nghiệp, khoa học xã hội và nhân văn, phản ánh tinh thần sáng tạo, khả năng nghiên cứu độc lập và sự quan tâm của sinh viên đối với các vấn đề thực tiễn.</p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/HN%20SVNCKH/316-hoi-ngh%E1%BB%8B-svnckh_trungbay1.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/HN%20SVNCKH/316-hoi-ngh%E1%BB%8B-svnckh_trungbay2.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><i>Khu vực triển lãm sản phẩm nghiên cứu khoa học thu hút sự quan tâm của đại biểu, giảng viên và sinh viên.</i></p><p>Bên cạnh các phiên báo cáo chuyên môn tại 05 hội đồng đánh giá, khu vực triển lãm sản phẩm nghiên cứu cũng thu hút sự quan tâm của đại biểu, giảng viên và sinh viên với nhiều mô hình, sản phẩm ứng dụng có tính thực tiễn cao. Hội nghị là dịp để sinh viên giao lưu học thuật, chia sẻ ý tưởng nghiên cứu, đồng thời khẳng định vai trò của hoạt động nghiên cứu khoa học trong nâng cao chất lượng đào tạo tại Nhà trường.</p><p><i><strong>Một số hình ảnh</strong></i></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/HN%20SVNCKH/316-hoi-ngh%E1%BB%8B-svnckh_1.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/HN%20SVNCKH/316-hoi-ngh%E1%BB%8B-svnckh_2.jpg\" alt=\"\" width=\"970\" height=\"615\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/HN%20SVNCKH/316-hoi-ngh%E1%BB%8B-svnckh_3.jpg\" alt=\"\" width=\"970\" height=\"647\"></p><p><img src=\"https://ntu.edu.vn/uploads/56/2026/HN%20SVNCKH/316-hoi-ngh%E1%BB%8B-svnckh_4.jpg\" alt=\"\" width=\"970\" height=\"647\"></p>', 'media/hoi-nghi-sinh-vien-nghien-cuu-khoa-hoc-nam-hoc-2025-2026-lan-toa-tinh-than-doi-1781435262-JLOxGZ.jpg', 2, 1, 0, 1, '2026-06-14 04:08:03', '2026-06-16 02:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`post_id`, `category_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 6),
(7, 6),
(8, 6),
(9, 5),
(10, 5),
(11, 2),
(12, 3),
(13, 3),
(14, 3),
(15, 2),
(16, 4),
(17, 4);

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `logo`, `url`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ECOGIV', 'media/folder2-1781276684/ecogiv-1781323849-3aEgmV.png', 'https://en.uit.no/project/ecogiv-en', 0, 1, '2026-06-12 21:11:13', '2026-06-16 01:51:28'),
(2, 'EMVIS', 'media/folder2-1781276684/emsiv-1781324311-gjEzQw.png', 'https://emsiv.eu/vi/trang-chu/', 1, 1, '2026-06-12 21:18:36', '2026-06-16 01:53:01'),
(3, 'ECOVIP', 'media/folder2-1781276684/ecovip-1781325326-T1RD8x.png', 'https://www.ecoviperasmus.eu/vi', 2, 1, '2026-06-12 21:35:30', '2026-06-16 01:53:19'),
(4, 'DIVE', 'media/folder2-1781276684/dive-1781325388-OeCp3O.jpg', 'https://www.dive-project.org/', 3, 1, '2026-06-12 21:36:33', '2026-06-16 01:53:30'),
(5, 'DIGITAL MOVE', 'media/folder2-1781276684/degital-move-1781325450-zsBSWu.jpg', 'https://digitalmove.eu.udn.vn/', 4, 1, '2026-06-12 21:37:56', '2026-06-16 01:53:48'),
(6, 'DEVICES', 'media/folder2-1781276684/devices-1781325560-ld9XAB.jpg', 'https://www.devices-erasmus.eu/', 5, 1, '2026-06-12 21:39:44', '2026-06-16 01:54:11'),
(7, 'REVFIN', 'media/folder2-1781276684/revfin-250623093404-1781329477-L9HKyv.jpg', 'https://revfin.asia/vi/du-an/', 6, 1, '2026-06-12 22:44:52', '2026-06-16 01:54:22'),
(8, 'IUU', 'media/folder2-1781276684/iuu-250806092455-1781329699-nQjCtn.jpg', 'https://iuu.ntu.edu.vn/', 7, 1, '2026-06-12 22:48:37', '2026-06-16 01:54:30');

-- --------------------------------------------------------

--
-- Table structure for table `quick_links`
--

CREATE TABLE `quick_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `background_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quick_links`
--

INSERT INTO `quick_links` (`id`, `title`, `subtitle`, `url`, `background_color`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hội thảo SPISE 2026', '27/7-1/8/2026', 'https://conferences.hcmut.edu.vn/spise2026/', '#ffffff', 3, 1, '2026-06-12 16:40:24', '2026-06-15 20:29:52'),
(2, 'Hội thảo BME11', '29-31/2026', 'https://bme.hcmiu.edu.vn/bme11/', '#fcfcfc', 2, 1, '2026-06-12 16:42:21', '2026-06-15 20:29:46'),
(3, 'Hội thảo CAA8', '16-18/7/2026', 'https://caa8.ntu.edu.vn/', '#eff0f0', 1, 1, '2026-06-15 20:27:57', '2026-06-15 20:29:30'),
(4, 'JFST', 'Tạp chí Khoa học -Công nghệ Thủy sản', 'https://jfst.vn/index.php/ntu', '#fcfcfd', 0, 1, '2026-06-15 20:29:20', '2026-06-15 20:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(120) NOT NULL,
  `name` varchar(120) NOT NULL,
  `permissions` text DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `is_default` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `description`, `is_default`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '{\"users.view\":true,\"users.create\":true,\"users.edit\":true,\"users.delete\":true,\"roles.view\":true,\"roles.create\":true,\"roles.edit\":true,\"roles.delete\":true,\"core.system\":true,\"core.cms\":true,\"pages.view\":true,\"pages.create\":true,\"pages.edit\":true,\"pages.delete\":true,\"media.index\":true,\"media.upload\":true,\"media.folder.create\":true,\"media.folder.rename\":true,\"media.file.rename\":true,\"media.file.move\":true,\"media.file.alt\":true,\"media.delete\":true,\"announcements.view\":true,\"announcements.create\":true,\"announcements.edit\":true,\"announcements.delete\":true,\"banner.view\":true,\"banner.create\":true,\"banner.edit\":true,\"banner.delete\":true,\"blog.posts.view\":true,\"blog.posts.create\":true,\"blog.posts.edit\":true,\"blog.posts.delete\":true,\"blog.categories.view\":true,\"blog.categories.create\":true,\"blog.categories.edit\":true,\"blog.categories.delete\":true,\"blog.tags.view\":true,\"blog.tags.create\":true,\"blog.tags.edit\":true,\"blog.tags.delete\":true,\"event.view\":true,\"event.create\":true,\"event.edit\":true,\"event.delete\":true}', NULL, 0, NULL, NULL, '2026-06-12 07:30:38', '2026-06-12 07:56:07'),
(2, 'customer', 'Member', '[]', NULL, 0, NULL, NULL, '2026-06-12 15:36:44', '2026-06-15 03:37:35'),
(4, 'editor', 'editor', '{\"users.view\":true,\"users.create\":true,\"core.system\":true}', NULL, 0, NULL, NULL, '2026-06-15 04:10:41', '2026-06-15 04:12:47'),
(7, 'manager', 'manager', '{\"users.view\":true,\"users.create\":true,\"users.delete\":true,\"roles.view\":true,\"roles.create\":true,\"roles.delete\":true,\"core.system\":true}', NULL, 0, NULL, NULL, '2026-06-15 04:24:45', '2026-06-15 04:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 3, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('E78AKfRAONdEX1Bm1F7aMREGmhfAl2taoZxNZxQ0', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJMZjRZQmhub3gxdGRGRVQ3Mnd5UEFrNFVWTXlvQUNINXZyQUJ2bHB3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvbWVudXNcLzJcL2VkaXQiLCJyb3V0ZSI6Im1lbnVzLmVkaXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYWRtaW4ifSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjF9', 1781653239),
('WmQwGJuBCV1XaIBlKUCtXei2UpGHAglcNXaZfRD1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.124.2 Chrome/148.0.7778.97 Electron/42.2.0 Safari/537.36', 'eyJfdG9rZW4iOiJPdFRwcHZ2elhsT2JTUm1WZUxsRG9reVYwTEVYaTlnRXQ5cFc1OEtDIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1781646589);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_title', 'TRƯỜNG ĐẠI HỌC NHA TRANG', '2026-06-15 04:33:04', '2026-06-15 04:52:28'),
(2, 'site_description', 'Admin System CMS', '2026-06-15 04:33:04', '2026-06-15 04:39:12'),
(3, 'admin_email', 'admin@gmail.com', '2026-06-15 04:33:04', '2026-06-15 04:39:12'),
(4, 'site_logo', 'media/logo-1781523545-JlAg1k.png', '2026-06-15 04:33:04', '2026-06-16 01:38:53'),
(5, 'site_favicon', 'media/logo-1781523545-JlAg1k.png', '2026-06-15 04:33:04', '2026-06-16 01:44:23'),
(6, 'site_slogan', 'UPM UNIVERSITY PERFORMANCE METRICS ★★★★★', '2026-06-15 04:54:10', '2026-06-15 04:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(120) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, '#khoa-hoc', 'khoa-hoc', '2026-06-15 03:56:49', '2026-06-15 03:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(120) DEFAULT NULL,
  `last_name` varchar(120) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `avatar_id` bigint(20) UNSIGNED DEFAULT NULL,
  `super_user` tinyint(1) NOT NULL DEFAULT 0,
  `manage_supers` tinyint(1) NOT NULL DEFAULT 0,
  `permissions` text DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `username`, `avatar_id`, `super_user`, `manage_supers`, `permissions`, `last_login`) VALUES
(1, 'admin@gmail.com', NULL, '$2y$12$SNVwDNG6cohWohgAIV.P2e3SQgwM8BZbVJxHs81LRgSFZEKT/aZXa', NULL, '2026-06-12 07:29:03', '2026-06-15 03:36:41', 'Ad', 'Admin', 'Admin', NULL, 1, 0, NULL, NULL),
(2, 'quanhuy@gmail.com', NULL, '$2y$12$eC3UlEIyg06UYPb.e6AOUOBLr4P/bZoemR9ocjE8II3vUvHx.EVzu', NULL, '2026-06-12 07:55:07', '2026-06-12 07:55:07', 'Nguyễn', 'Quan Huy', 'nguyenquan', NULL, 0, 0, NULL, NULL),
(3, 'minhquan123@gmail.com', NULL, '$2y$12$3W2xT08LUDvreWOJPAyiAOpdkwgE3tpxvSUhHYmfqSIvgP2R6dI/m', NULL, '2026-06-12 07:57:10', '2026-06-15 03:40:09', 'Nguyễn', 'Minh Quan', 'minhquan123', NULL, 0, 0, NULL, NULL),
(5, 'bichlietlua@gmail.com', NULL, '$2y$12$PELUiR3NvlmA7GqfFrZfSeeNuSIM81Ry.Gw/RhUkkjLDEcGDe9wZ.', NULL, '2026-06-15 06:08:39', '2026-06-15 06:33:41', 'Nguyễn', 'Tài', NULL, NULL, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(120) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `embed_url` text NOT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `embed_url`, `description`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bản tin NTU tháng 01-2026', 'https://www.youtube.com/embed/8qquqa-BiIc', 'Tin', 0, 1, '2026-06-12 23:41:28', '2026-06-12 23:49:39'),
(2, 'Bản tin NTU tháng 12-2025', 'https://www.youtube.com/embed/ijRbT4w7NFo', NULL, 1, 1, '2026-06-13 00:10:48', '2026-06-13 00:10:48'),
(3, 'Bản tin NTU tháng 11 2025', 'https://www.youtube.com/embed/pxWYJWmraWs', NULL, 2, 1, '2026-06-13 00:11:44', '2026-06-13 00:11:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_links`
--
ALTER TABLE `about_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activations_user_id_index` (`user_id`);

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission_settings`
--
ALTER TABLE `admission_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `announcements_slug_unique` (`slug`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `footer_links`
--
ALTER TABLE `footer_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_settings`
--
ALTER TABLE `footer_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_files`
--
ALTER TABLE `media_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_files_user_id_index` (`user_id`);

--
-- Indexes for table `media_folders`
--
ALTER TABLE `media_folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_folders_user_id_index` (`user_id`);

--
-- Indexes for table `media_settings`
--
ALTER TABLE `media_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD KEY `pages_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plugins_slug_unique` (`slug`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD KEY `post_categories_post_id_index` (`post_id`),
  ADD KEY `post_categories_category_id_index` (`category_id`);

--
-- Indexes for table `post_tags`
--
ALTER TABLE `post_tags`
  ADD KEY `post_tags_post_id_index` (`post_id`),
  ADD KEY `post_tags_tag_id_index` (`tag_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quick_links`
--
ALTER TABLE `quick_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_users_user_id_index` (`user_id`),
  ADD KEY `role_users_role_id_index` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `themes_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_meta_user_id_index` (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_links`
--
ALTER TABLE `about_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admission_settings`
--
ALTER TABLE `admission_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_links`
--
ALTER TABLE `footer_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `footer_settings`
--
ALTER TABLE `footer_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_files`
--
ALTER TABLE `media_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `media_folders`
--
ALTER TABLE `media_folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media_settings`
--
ALTER TABLE `media_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quick_links`
--
ALTER TABLE `quick_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `pages` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
