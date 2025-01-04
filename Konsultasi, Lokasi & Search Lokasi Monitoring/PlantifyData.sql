-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.40 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for plantify
CREATE DATABASE IF NOT EXISTS `plantify` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `plantify`;

-- Dumping structure for table plantify.alat_pertanian
CREATE TABLE IF NOT EXISTS `alat_pertanian` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_alat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` decimal(10,2) NOT NULL,
  `stok` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.alat_pertanian: ~4 rows (approximately)
INSERT INTO `alat_pertanian` (`id`, `nama_alat`, `deskripsi`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Alat Pencabut Rumput', 'Menghilangkan rumput yang tidak diinginkan, tanaman utama mendapatkan ruang dan sumber daya yang lebih baik untuk tumbuh. Mengurangi persaingan antara rumput liar dan tanaman utama, yang dapat meningkatkan kualitas tanah.', 66000.00, 10, '01JF8TS6SFP8T74BWEJEXP6S50.png', '2024-12-16 15:52:50', '2025-01-03 16:59:45', NULL),
	(2, 'Cangkul', 'Mempermudah pekerjaan seperti meratakan tanah, membersihkan gulma, atau mempersiapkan bedengan tanam. Memudahkan pembuatan lubang untuk penanaman bibit dan pemasangan pupuk. Menggemburkan tanah di sekitar tanaman agar akar lebih mudah menyerap air dan nutrisi.', 66000.00, 10, '01JF8TTNC5E18ZY7N8BM7VN9HK.png', '2024-12-16 15:53:38', '2025-01-03 16:43:57', NULL),
	(4, 'Alat pelubang Tanah', 'Membantu menggali lubang untuk penanaman bibit atau tanaman dalam jumlah banyak. Menggunakan alat pelubang yang tepat dapat membantu menjaga struktur tanah tetap utuh dan tidak rusak.', 25000.00, 10, '01JGQ8V5MJ5JRJN15HAN4004TY.png', '2025-01-03 16:43:38', '2025-01-03 16:43:38', NULL),
	(5, 'Penyemprot Tanaman', 'Mempermudah pekerjaan seperti meratakan tanah, membersihkan gulma, atau mempersiapkan bedengan tanam. Memudahkan pembuatan lubang untuk penanaman bibit dan pemasangan pupuk. Menggemburkan tanah di sekitar tanaman agar akar lebih mudah menyerap air dan nutrisi.', 50000.00, 10, '01JGQ8XW4249TCAMN5W9V58DQ5.png', '2025-01-03 16:45:07', '2025-01-03 16:45:07', NULL);

-- Dumping structure for table plantify.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.cache: ~4 rows (approximately)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('356a192b7913b04c54574d18c28d46e6395428ab', 'i:2;', 1735948312),
	('356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1735948312;', 1735948312),
	('a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1735944936),
	('a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1735944936;', 1735944936);

-- Dumping structure for table plantify.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.cache_locks: ~0 rows (approximately)

-- Dumping structure for table plantify.checkouts
CREATE TABLE IF NOT EXISTS `checkouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.checkouts: ~6 rows (approximately)
INSERT INTO `checkouts` (`id`, `address`, `message`, `payment_method`, `shipping_method`, `products`, `created_at`, `updated_at`) VALUES
	(1, 'sumedang', 'hati hati', 'transfer', 'jne', '{"1": {"name": "Alat Pencabut Rumput", "image": "01JF8TS6SFP8T74BWEJEXP6S50.png", "price": "66000.00", "stock": 3, "quantity": 1}, "2": {"name": "Cangkul", "image": "01JF8TTNC5E18ZY7N8BM7VN9HK.png", "price": "66000.00", "stock": 10, "quantity": 2}}', '2025-01-03 04:41:00', '2025-01-03 04:41:00'),
	(2, 'bandung', 'hati2', 'transfer', 'jne', '{"1": {"name": "Alat Pencabut Rumput", "type": "alatPertanian", "image": "01JF8TS6SFP8T74BWEJEXP6S50.png", "price": "66000.00", "stock": 3, "quantity": 1}}', '2025-01-03 04:45:18', '2025-01-03 04:45:18'),
	(3, 'sumedang', 'cepet yaaa', 'transfer', 'jne', '{"alat_1": {"name": "Alat Pencabut Rumput", "type": "alatPertanian", "image": "01JF8TS6SFP8T74BWEJEXP6S50.png", "price": "66000.00", "stock": 2, "quantity": 1}, "sewa_2": {"name": "Sistem Rekomendasi pemupukan", "type": "sewa", "image": "01JF8XDC3W5V9VRFED7HE9TFGJ.png", "price": "200000.00", "stock": 4, "quantity": 1}, "sewa_3": {"name": "Water Pump", "type": "sewa", "image": "01JGJMW8QC7TCQEP9ZBCT2B9C6.png", "price": "550.00", "stock": 3, "quantity": 1}, "pupuk_1": {"name": "Pupuk", "type": "pupuk", "image": "01JF8VP5CTJ7TP7HDVZAPHFAED.png", "price": "66000.00", "stock": 10, "quantity": 1}, "pupuk_2": {"name": "Pupuk ZA", "type": "pupuk", "image": "01JGJG4K0S99RWNDDE63S9CT15.png", "price": "250000.00", "stock": 10, "quantity": 1}}', '2025-01-03 05:00:20', '2025-01-03 05:00:20'),
	(4, 'wadaw', 'gas', 'credit_card', 'gojek', '{"sewa_2": {"name": "Sistem Rekomendasi pemupukan", "type": "sewa", "image": "01JF8XDC3W5V9VRFED7HE9TFGJ.png", "price": "200000.00", "stock": 4, "quantity": "1"}}', '2025-01-03 05:02:06', '2025-01-03 05:02:06'),
	(5, 'wadaaaa', '2222', 'transfer', 'jne', '{"sewa_2": {"name": "Sistem Rekomendasi pemupukan", "type": "sewa", "image": "01JF8XDC3W5V9VRFED7HE9TFGJ.png", "price": "200000.00", "stock": 4, "quantity": 1}}', '2025-01-03 05:04:19', '2025-01-03 05:04:19'),
	(6, 'awaaaaa', '2222', 'transfer', 'jne', '{"alat_1": {"name": "Alat Pencabut Rumput", "type": "alatPertanian", "image": "01JF8TS6SFP8T74BWEJEXP6S50.png", "price": "66000.00", "stock": 2, "quantity": 1}, "sewa_2": {"name": "Sistem Rekomendasi pemupukan", "type": "sewa", "image": "01JF8XDC3W5V9VRFED7HE9TFGJ.png", "price": "200000.00", "stock": 3, "quantity": 1}, "pupuk_2": {"name": "Pupuk ZA", "type": "pupuk", "image": "01JGJG4K0S99RWNDDE63S9CT15.png", "price": "250000.00", "stock": 10, "quantity": 1}}', '2025-01-03 05:05:04', '2025-01-03 05:05:04'),
	(7, 'sumedang', 'gas', 'transfer', 'pos', '{"alat_1": {"name": "Alat Pencabut Rumput", "type": "alatPertanian", "image": "01JF8TS6SFP8T74BWEJEXP6S50.png", "price": "66000.00", "stock": 1, "quantity": 1}}', '2025-01-03 16:58:57', '2025-01-03 16:58:57');

-- Dumping structure for table plantify.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table plantify.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_user_id_foreign` (`user_id`),
  CONSTRAINT `feedback_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.feedback: ~1 rows (approximately)
INSERT INTO `feedback` (`id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
	(8, 10, 'Sistem berjalan responsif dan lancar', '2025-01-03 06:22:33', '2025-01-03 11:21:01');

-- Dumping structure for table plantify.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.jobs: ~0 rows (approximately)

-- Dumping structure for table plantify.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.job_batches: ~0 rows (approximately)

-- Dumping structure for table plantify.lands
CREATE TABLE IF NOT EXISTS `lands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `location_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lands_location_id_foreign` (`location_id`),
  CONSTRAINT `lands_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.lands: ~3 rows (approximately)
INSERT INTO `lands` (`id`, `location_id`, `name`, `area`, `created_at`, `updated_at`) VALUES
	(7, 6, 'Lahan B', 400.00, '2025-01-01 22:37:29', '2025-01-01 22:37:29'),
	(12, 12, 'Lahan Utara', 1000.00, '2025-01-03 08:11:58', '2025-01-03 08:11:58'),
	(14, 13, 'Selatan', 2000.00, '2025-01-03 11:42:15', '2025-01-03 11:42:15'),
	(17, 16, 'Telkom', 500.00, '2025-01-03 17:03:04', '2025-01-03 17:03:04');

-- Dumping structure for table plantify.land_histories
CREATE TABLE IF NOT EXISTS `land_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `land_id` bigint unsigned NOT NULL,
  `plant_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soil_condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `humidity` int NOT NULL,
  `recommendation` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `land_histories_land_id_foreign` (`land_id`),
  CONSTRAINT `land_histories_land_id_foreign` FOREIGN KEY (`land_id`) REFERENCES `lands` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.land_histories: ~3 rows (approximately)
INSERT INTO `land_histories` (`id`, `land_id`, `plant_type`, `soil_condition`, `humidity`, `recommendation`, `created_at`, `updated_at`) VALUES
	(9, 7, 'sawi', '5', 50, 'Perbaiki kondisi tanah dan kelembapan untuk hasil optimal.', '2025-01-01 22:37:41', '2025-01-01 22:37:41'),
	(18, 14, 'sawi', '3', 20, 'Perbaiki kondisi tanah dan kelembapan untuk hasil optimal. Pertimbangkan penggunaan pupuk organik seperti kompos atau pupuk hijau untuk meningkatkan kesuburan tanah.', '2025-01-03 11:42:27', '2025-01-03 11:42:27'),
	(19, 14, 'sawit', '2', 100, 'Perbaiki pH tanah dan kelembapan untuk hasil optimal. Disarankan menggunakan pupuk NPK dengan pemupukan rutin setiap 3 bulan untuk meningkatkan hasil panen.', '2025-01-03 11:43:04', '2025-01-03 11:43:04'),
	(25, 17, 'sawit', '6', 70, 'Kondisi ideal untuk sawit. Pastikan kelembapan tanah terjaga. Gunakan pupuk kandang dengan dosis 5 ton/ha dan pupuk NPK untuk hasil terbaik.', '2025-01-03 17:03:48', '2025-01-03 17:03:48');

-- Dumping structure for table plantify.locations
CREATE TABLE IF NOT EXISTS `locations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_user_id_foreign` (`user_id`),
  CONSTRAINT `locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.locations: ~5 rows (approximately)
INSERT INTO `locations` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
	(5, 1, 'Buahbatu', '2025-01-01 21:50:49', '2025-01-01 21:50:49'),
	(6, 1, 'Sumedang', '2025-01-01 22:30:30', '2025-01-01 22:30:30'),
	(10, 10, 'Bojongsoang', '2025-01-03 07:26:13', '2025-01-03 07:27:44'),
	(12, 10, 'Surabaya', '2025-01-03 07:42:02', '2025-01-03 07:42:02'),
	(13, 11, 'Bandung', '2025-01-03 11:42:00', '2025-01-03 11:42:00'),
	(16, 14, 'Bojongsoang', '2025-01-03 17:02:46', '2025-01-03 17:02:46');

-- Dumping structure for table plantify.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.migrations: ~16 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_12_16_220646_alat_pertanian', 1),
	(5, '2024_12_16_222951_pupuk', 1),
	(6, '2024_12_16_223924_sewa', 1),
	(8, '2024_12_29_061824_create_lands_table', 3),
	(9, '2024_12_29_065952_create_land_histories_table', 4),
	(11, '2024_12_29_050839_create_locations_table', 5),
	(12, '2024_12_31_014107_add_user_id_to_locations_table', 5),
	(13, '2024_12_29_100000_add_plant_type_and_recommendation_to_land_histories_table', 6),
	(15, '2025_01_02_064322_create_feedback_table', 7),
	(16, '2025_01_02_134114_add_profile_picture_to_users_table', 8),
	(17, '2025_01_02_165017_create_carts_table', 9),
	(18, '2025_01_02_165052_create_payments_table', 9),
	(19, '2025_01_03_113206_create_checkouts_table', 10);

-- Dumping structure for table plantify.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table plantify.pupuk
CREATE TABLE IF NOT EXISTS `pupuk` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_pupuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` decimal(10,2) NOT NULL,
  `stok` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.pupuk: ~2 rows (approximately)
INSERT INTO `pupuk` (`id`, `nama_pupuk`, `deskripsi`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Pupuk Serasah', 'Meningkatkan kesuburan tanah dan Menyuburkan tanaman ', 35000.00, 10, '01JF8VP5CTJ7TP7HDVZAPHFAED.png', '2024-12-16 16:08:39', '2025-01-03 16:46:31', NULL),
	(2, 'Pupuk ZA', 'Membantu memperbaiki aroma tanaman, Membantu memperbaiki klorofil daun, dan Membantu memperbaiki kualitas tanah yang bersifat alkalis ', 250000.00, 10, '01JGJG4K0S99RWNDDE63S9CT15.png', '2025-01-01 20:13:25', '2025-01-03 16:46:00', NULL),
	(3, 'Pupuk NPK Phonska', 'Menguatkan batang tanaman Membantu pertumbuhan akar tanaman Meningkatkan kandungan protein Membuat tanaman lebih sehat dan hijau  ', 385000.00, 10, '01JGQ928QVYCV9P2VNE7X6PY1D.png', '2025-01-03 16:47:31', '2025-01-03 16:47:31', NULL),
	(4, 'Pupuk Urea', 'Membuat daun tanaman lebih hijau dan segar. Mempercepat pertumbuhan tanaman Menambahkan nutrisi protein untuk tanaman.', 502000.00, 10, '01JGQ93YEEG234XKGVKSC09XQW.png', '2025-01-03 16:48:26', '2025-01-03 16:48:26', NULL);

-- Dumping structure for table plantify.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('ecYonvGWVy0YXyLUzavUBCRpw8zJRYD8qICY5jlr', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidzUyTVlkUDk3MVJYZ3ZGanl2SWxLNHNweGN6VFJoMVAzaGNINEtlaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTE7fQ==', 1735941945),
	('h750LflGyR4KeDw9LIrEXMZb6Gld7OdyhHAt2acO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQUhNNkdObXFFcHg0akR6SXVIcHR3UUxPN0F2WGZobGs1cFFCbVFhcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fX0=', 1735948329),
	('nZkMVPrH3Wmj2sL5ffJNgP7le45VNd1X9Had81hM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidDlWV2hPN3BHQmM1OW9KMG55YmdqTUljYzN0RFBkNWlmMGdmWDdscyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735949083),
	('vdJ1rFM3V0x9c2lNBCzLyr0P6YMSVQeNcKxtpn7v', 14, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoieUF2bGRUY1dkRFZWRmZQbWc3UVhOZFlxZ044Rnh4V2VITjlsMWswdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hbGF0LXBlcnRhbmlhbnMvMS9lZGl0Ijt9czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE0O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkeVJTcmo1bnRXRUpLY0lmVEI1QmRaLlJlRFF6c1lZSS5ERGlmaFYycjdYVnRlSnh1bTZ3VEsiO3M6ODoiZmlsYW1lbnQiO2E6MDp7fX0=', 1735948786);

-- Dumping structure for table plantify.sewa
CREATE TABLE IF NOT EXISTS `sewa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_sewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` decimal(10,2) NOT NULL,
  `stok` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai_sewa` date NOT NULL,
  `tanggal_akhir_sewa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.sewa: ~3 rows (approximately)
INSERT INTO `sewa` (`id`, `nama_sewa`, `deskripsi`, `harga`, `stok`, `gambar`, `tanggal_mulai_sewa`, `tanggal_akhir_sewa`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Sensor', 'awfawgbgbawgbawgbwagb', 1000000.00, 10, NULL, '2024-12-17', '2024-12-31', NULL, '2024-12-16 16:39:07', '2024-12-16 16:39:07'),
	(2, 'Sistem Rekomendasi pemupukan', 'Mengoptimalkan penggunaan pupuk untuk meningkatkan hasil panen. Mengurangi dampak negatif terhadap lingkungan akibat penggunaan pupuk berlebih. Mendukung keberlanjutan pertanian melalui pengelolaan nutrisi tanah yang lebih baik.', 200000.00, 10, '01JF8XDC3W5V9VRFED7HE9TFGJ.png', '2024-12-17', '2024-12-31', '2024-12-16 16:38:48', '2025-01-03 16:49:51', NULL),
	(3, 'Water Pump', 'Mendukung irigasi tetes, sprinkler, atau irigasi tradisional. Mengeringkan lahan yang tergenang air jika diperlukan. Memenuhi kebutuhan air di area yang sulit dijangkau secara manual.', 550000.00, 10, '01JGJMW8QC7TCQEP9ZBCT2B9C6.png', '2025-01-02', '2025-01-02', '2025-01-01 21:37:45', '2025-01-03 16:48:55', NULL),
	(4, 'Alat Otomatis Pengontrol PH', 'Memantau pH tanah atau air secara real-time. Mengaplikasikan bahan penyeimbang pH, seperti kapur untuk meningkatkan pH atau asam untuk menurunkan pH. Mengoptimalkan kondisi media tanam untuk mendukung penyerapan nutrisi oleh tanaman.', 100000.00, 10, '01JGQ98FT9P1GW4CQN2N56XTPG.png', '2025-01-01', '2025-01-31', '2025-01-03 16:50:55', '2025-01-03 16:50:55', NULL),
	(5, 'Drone Sprayer', 'Mengaplikasikan pupuk cair untuk memberikan nutrisi kepada tanaman. Menyemprotkan air atau nutrisi lain secara merata ke tanaman. Membantu mengendalikan pertumbuhan gulma di lahan pertanian. Menyemprotkan pestisida untuk mengendalikan hama dan penyakit tanaman.', 200000.00, 10, '01JGQ9A3M5VX5N6C4BN6MJ46EP.png', '2025-01-01', '2025-01-31', '2025-01-03 16:51:48', '2025-01-03 16:51:48', NULL);

-- Dumping structure for table plantify.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table plantify.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', NULL, '$2y$12$/pd3bHv5oTPVYi.OGgAO4u26o4A2faZeYOIrY6oIxNfMk3XNBUmku', NULL, '2024-12-16 15:48:16', '2024-12-16 15:48:16'),
	(9, 'Jagung', 'faridghani04@gmail.com', NULL, '$2y$12$4/hENsdAYGUwQc25wTKq/usWzCT0SRjPOR.eQxFTQztYRtfbtZCEG', NULL, '2024-12-30 18:02:56', '2024-12-30 18:02:56'),
	(10, 'GANOY', 'faridghani.12@gmail.com', NULL, '$2y$12$wlnePdqCLRpAfmVfBeDH1OWg6jtnjT/84kqHKZ1v5spH6XG/Z/exe', NULL, '2025-01-03 05:30:24', '2025-01-03 05:30:24'),
	(11, 'Laroiba', 'laroiba@gmail.com', NULL, '$2y$12$AFy9ctGgLklQVSSRl.db3etzGb2Q2qrZR9x10EMW8jqIH6nl5cNee', NULL, '2025-01-03 11:21:46', '2025-01-03 11:21:46'),
	(14, 'Farid Ghani', 'ghani@gmail.com', NULL, '$2y$12$yRSrj5ntWEJKcIfTB5BdZ.ReDQzsYYI.DDifhV2r7XVteJxum6wTK', NULL, '2025-01-03 15:34:06', '2025-01-03 17:01:38');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
