-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2023 pada 08.13
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spkulit-pg`
--

--
-- Dumping data untuk tabel `gejalas`
--

INSERT INTO `gejalas` (`id`, `Kode_Gejala`, `Nama_Gejala`, `created_at`, `updated_at`) VALUES
(1, 'G01', 'Ruam pada area kulit yang bersentuhan dengan zat iritan', '2023-12-25 03:47:58', '2023-12-25 04:40:00'),
(2, 'G02', 'Kulit kering dan iritasi.', '2023-12-25 03:48:05', '2023-12-25 04:40:07'),
(3, 'G03', 'Kemungkinan munculnya luka lepuh.', '2023-12-25 03:48:10', '2023-12-25 04:40:15'),
(4, 'G04', 'Kemerahan dan bengkak pada kulit.', '2023-12-25 04:40:26', '2023-12-25 04:40:26'),
(5, 'G05', 'Reaksi alergi ketika kulit bersentuhan dengan alergen.', '2023-12-25 04:40:47', '2023-12-25 04:40:47'),
(6, 'G06', 'Kulit merah, gatal, kering, atau bersisik.', '2023-12-25 05:15:51', '2023-12-25 05:15:51'),
(7, 'G07', 'Muncul di lipatan siku, belakang lutut, dan leher.', '2023-12-25 05:16:02', '2023-12-25 05:16:02'),
(8, 'G08', 'Bersisik yang bisa mengelupas jika digaruk.', '2023-12-25 05:16:38', '2023-12-25 05:16:38'),
(9, 'G09', 'Kulit kemerahan dan bersisik.', '2023-12-25 05:16:51', '2023-12-25 05:16:51'),
(10, 'G10', 'Menyerang area berminyak seperti wajah, punggung, dan dada.', '2023-12-25 05:17:59', '2023-12-25 05:17:59'),
(11, 'G11', 'Pada bayi, bisa menyebabkan cradle cap (ketombe pada bayi).', '2023-12-25 05:18:30', '2023-12-25 05:18:30'),
(12, 'G12', 'Bercak kemerahan dengan sisik perak.', '2023-12-25 05:18:46', '2023-12-25 05:18:46'),
(13, 'G13', 'Pertumbuhan sel kulit yang terlalu cepat.', '2023-12-25 05:18:56', '2023-12-25 05:18:56'),
(14, 'G14', 'Kulit kering dan terasa gatal.', '2023-12-25 05:19:18', '2023-12-25 05:19:18'),
(15, 'G15', 'Kulit kehilangan warna.', '2023-12-25 05:19:40', '2023-12-25 05:19:40'),
(16, 'G16', 'Bercak-bercak putih pada kulit.', '2023-12-25 05:19:54', '2023-12-25 05:19:54'),
(17, 'G17', 'Kulit menjadi keras dan menebal.', '2023-12-25 05:20:16', '2023-12-25 05:20:16'),
(18, 'G18', 'Dapat menyerang pembuluh darah dan organ dalam.', '2023-12-25 05:20:25', '2023-12-25 05:20:25'),
(19, 'G19', 'Lepuhan yang mudah pecah tanpa rasa gatal.', '2023-12-25 05:20:35', '2023-12-25 05:20:35'),
(20, 'G20', 'Kulit bersisik atau berkerak, lepuhan kecil yang gatal jika pecah.', '2023-12-25 05:21:20', '2023-12-25 05:21:20'),
(21, 'G21', 'Ruam parah yang memburuk saat terkena sinar matahari.', '2023-12-25 05:21:30', '2023-12-25 05:21:30'),
(22, 'G22', 'Muncul di kulit kepala, wajah, leher, tangan, dan kaki.', '2023-12-25 05:21:44', '2023-12-25 05:21:44'),
(23, 'G23', 'Benjolan merah, panas, dan nyeri.', '2023-12-25 05:21:57', '2023-12-25 05:21:57'),
(24, 'G24', 'Luka berisi cairan yang membentuk kerak.', '2023-12-25 05:22:05', '2023-12-25 05:22:05'),
(25, 'G25', 'Bercak kulit dan pembengkakan.', '2023-12-25 05:22:14', '2023-12-25 05:22:14'),
(26, 'G26', 'Bercak merah yang berkembang menjadi lepuhan.', '2023-12-25 05:22:28', '2023-12-25 05:22:28'),
(27, 'G27', 'Ruam dan lepuhan yang sangat nyeri.', '2023-12-25 05:22:39', '2023-12-25 05:22:39'),
(28, 'G28', 'Bercak merah dengan tepi yang menonjol.', '2023-12-25 05:22:50', '2023-12-25 05:22:50'),
(29, 'G29', 'Infeksi jamur di selangkangan.', '2023-12-25 05:22:58', '2023-12-25 05:22:58'),
(30, 'G30', 'Bercak putih bersisik.', '2023-12-25 05:23:07', '2023-12-25 05:23:07'),
(31, 'G31', 'Gatal intens, terutama pada malam hari.', '2023-12-25 05:23:30', '2023-12-25 05:23:30'),
(32, 'G32', 'Ruam kecil berwarna merah atau putih.', '2023-12-25 05:23:41', '2023-12-25 05:23:41'),
(33, 'G33', 'Garis atau benjolan kecil pada kulit.', '2023-12-25 05:23:54', '2023-12-25 05:23:54'),
(34, 'G34', 'Perubahan warna, ukuran, atau bentuk tahi lalat.', '2023-12-25 05:24:04', '2023-12-25 05:24:04'),
(35, 'G35', 'Perubahan pada kulit sekitar tahi lalat.', '2023-12-25 05:24:13', '2023-12-25 05:24:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
