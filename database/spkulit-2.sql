-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2024 pada 07.20
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
-- Database: `spkulit-2`
--

--
-- Dumping data untuk tabel `aturans`
--

INSERT INTO `aturans` (`id`, `Kode_Gejala`, `Kode_Penyakit`, `created_at`, `updated_at`) VALUES
(1, 'G01', 'P01', NULL, NULL),
(2, 'G02', 'P01', NULL, NULL),
(3, 'G03', 'P01', NULL, NULL),
(4, 'G04', 'P02', NULL, NULL),
(5, 'G05', 'P02', NULL, NULL),
(6, 'G06', 'P03', NULL, NULL),
(7, 'G07', 'P03', NULL, NULL),
(8, 'G08', 'P03', NULL, NULL);

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

--
-- Dumping data untuk tabel `penyakits`
--

INSERT INTO `penyakits` (`id`, `Kode_Penyakit`, `Gambar_Penyakit`, `Nama_Penyakit`, `Deskripsi_Penyakit`, `created_at`, `updated_at`) VALUES
(1, 'P01', 'ghMySVFGNktDAgYOUgYTjgHb6U4nrVXbqkAcHfKH.jpg', 'Dermatitis Kontak Irritan', 'Deskripsi : \r\nDermatitis kontak iritan adalah kondisi peradangan pada kulit yang disebabkan oleh kontak dengan zat-zat iritan, seperti bahan kimia atau benda-benda tertentu. Gejalanya dapat mencakup kemerahan, gatal, pembengkakan, dan rasa panas di area yang terkena.\r\nGejalanya : \r\n•	Ruam pada area kulit yang bersentuhan dengan zat iritan\r\n•	Kulit kering dan iritasi.\r\n•	Kemungkinan munculnya luka lepuh.\r\nPenanganan : \r\nUntuk mengatasi dermatitis kontak iritan, pertimbangkan langkah-langkah berikut:\r\n•	Hindari Paparan: Identifikasi dan hindari bahan iritan.\r\n•	Produk Hipoalergenik: Gunakan produk yang hipoalergenik.\r\n•	Pakaian Lembut: Pilih pakaian lembut dan longgar.\r\n•	Air Hangat: Mandi dengan air hangat, hindari air panas.\r\n•	Pelembap: Gunakan pelembap bebas pewangi.\r\n•	Hindari Pencucian Berlebihan: Jangan mencuci area terlalu sering.\r\n•	Salep Steroid: Gunakan salep steroid topikal sesuai petunjuk dokter.\r\n•	Konsultasi dengan Ahli Kulit: Bila perlu, konsultasikan dengan dokter atau ahli kulit.', '2023-12-25 04:41:13', '2024-01-06 23:11:47'),
(2, 'P02', 'DBolLTEFfErLgeLpXQ8mKu4B7fKOo7SIy0gMwAry.jpg', 'Dermatitis Kontak Alergi (Eksim Basah)', 'Deskripsi :\r\nDermatitis Kontak Alergi, atau yang sering disebut eksim basah, adalah kondisi kulit yang disebabkan oleh reaksi alergi terhadap suatu zat tertentu yang bersentuhan dengan kulit. Reaksi alergi ini dapat terjadi setelah paparan berulang terhadap bahan penyebab alergi, dan gejalanya melibatkan kemerahan, gatal, pembengkakan, dan terkadang pembentukan lepuhan atau lecet.\r\nGejalanya : \r\n•	Kemerahan dan bengkak pada kulit.\r\n•	Reaksi alergi ketika kulit bersentuhan dengan alergen.\r\nPenanganan : \r\nUntuk mengatasi dermatitis kontak iritan, pertimbangkan langkah-langkah berikut:\r\n•	Hindari Paparan: Identifikasi dan hindari bahan iritan.\r\n•	Produk Hipoalergenik: Gunakan produk yang hipoalergenik.\r\n•	Pakaian Lembut: Pilih pakaian lembut dan longgar.\r\n•	Air Hangat: Mandi dengan air hangat, hindari air panas.\r\n•	Pelembap: Gunakan pelembap bebas pewangi.\r\n•	Hindari Pencucian Berlebihan: Jangan mencuci area terlalu sering.\r\n•	Salep Steroid: Gunakan salep steroid topikal sesuai petunjuk dokter.\r\n•	Konsultasi dengan Ahli Kulit: Bila perlu, konsultasikan dengan dokter atau ahli kulit.', '2023-12-25 04:41:34', '2024-01-06 23:16:47'),
(3, 'P03', '3KkSPOtS1MFib8UpLzBcrqcvHriahy2HB0kqqLzV.jpg', 'Dermatitis Atopik (Eksim Kering)', 'Deskripsi :\r\nDermatitis Atopik, atau yang sering disebut sebagai eksim kering, merupakan suatu kondisi kulit yang bersifat kronis dan menyebabkan kulit menjadi kering, gatal, merah, dan dapat bersisik. Ini adalah jenis dermatitis yang umum terjadi pada anak-anak, tetapi dapat juga memengaruhi orang dewasa. Dermatitis Atopik dikaitkan dengan reaksi alergi dan sensitivitas terhadap faktor-faktor tertentu, seperti alergen, debu, polusi udara, makanan, atau kontak dengan bahan kimia.\r\nGejalanya : \r\n•	Kulit merah, gatal, kering, atau bersisik.\r\n•	Muncul di lipatan siku, belakang lutut, dan leher.\r\n•	Bersisik yang bisa mengelupas jika digaruk.\r\nPenanganan : \r\nAlternatif penanganan dermatitis atopik (eksim kering) termasuk perubahan pola makan, suplemen nutrisi, terapi herbal, akupunktur, terapi cahaya UV, pilihan pakaian yang ramah kulit, manajemen stres, dan probiotik. Konsultasikan dengan dokter sebelum mencoba metode baru.', '2023-12-25 05:25:40', '2024-01-06 23:17:14'),
(4, 'P04', 'Ed4O4j3zBLUM4xI7Vm9AJgGNhzkV2mbkV8Jn8aAb.jpg', 'Dermatitis Seboroik', 'Dermatitis Seboroik', '2023-12-25 05:25:59', '2024-01-06 22:55:10'),
(5, 'P05', 'dxV83UrsYu75OS8NMOqYRbCqMupLsieP8Hu6m102.jpg', 'Psoriasis', 'Psoriasis', '2023-12-25 05:26:20', '2024-01-06 22:55:23'),
(6, 'P06', '2FN1m471sNYsERE2qwf3N2Yspa78i9jnDd7Rw5IC.jpg', 'Vitiligo', 'Vitiligo', '2023-12-25 05:26:39', '2024-01-06 22:55:33'),
(7, 'P07', '8wsGjPxpKU2ELiUclj4b6HzJJy2IH31ZXp4bJkjI.jpg', 'Skleroderma', 'Skleroderma', '2023-12-25 06:24:54', '2024-01-06 22:55:48'),
(8, 'P08', 'AFz95OsjScVx3UeHusXfsMm2D4MjxtFj2zvKHzt7.jpg', 'Pemfigus vulgaris', 'Pemfigus vulgaris', '2023-12-25 06:25:26', '2024-01-06 22:56:04'),
(9, 'P09', 'VvSJ19KaruLMhwxwz5Y2fALL8VBzjDAXchn7D9I0.jpg', 'Pemfigus Foliaceus', 'Pemfigus Foliaceus', '2023-12-25 06:27:52', '2024-01-06 22:56:16'),
(10, 'P10', 'HFl5Cvgd3VJ47ZDL3Mrx39cMjGeHq3Ad4pfApKwn.jpg', 'Lupus Eritematosus Diskoid (DLE)', 'Lupus Eritematosus Diskoid (DLE)', '2023-12-25 06:29:14', '2024-01-06 22:56:33'),
(11, 'P11', 'YGt0tAXcDkB3OZVkTotxRHYlfniDUIKFIx8uzmrg.jpg', 'Bisul', 'Bisul', '2023-12-25 06:29:31', '2024-01-06 22:56:49'),
(12, 'P12', 'PxwrfQvtKFVLdN0LLfiPjP9C2UiXnhoxk2FF0FJJ.jpg', 'Impetigo', 'Impetigo', '2023-12-25 06:29:42', '2024-01-06 22:57:03'),
(13, 'P13', 'OXzKbiVqnxv9lfGTmoZSf71Hc4L2HuEk0dIy9F2g.jpg', 'Kusta', 'Kusta', '2023-12-25 06:30:20', '2024-01-06 22:57:19'),
(14, 'P14', 'N0Mgphz8HSusKhOEZTxQsuRYS8WLEjg7hUn4gf8t.jpg', 'Cacar', 'Cacar', '2023-12-25 06:30:35', '2024-01-06 22:58:04'),
(15, 'P15', 'WnbtvLcoJLYOf6uetkWoxbu5sJIR752fZmiq097Y.jpg', 'Herpes Zoster (Cacar Ular)', 'Herpes Zoster (Cacar Ular)', '2023-12-25 06:30:52', '2024-01-06 22:58:16'),
(16, 'P16', 'D9vYysSQt9R2UrtehEpXgqe0HEtq9zsFiR46DFfS.jpg', 'Kurap', 'Kurap', '2023-12-25 06:31:54', '2024-01-06 22:58:29'),
(17, 'P17', 'bdp5Ken8O7N2B2oNa7wsMDcOhnH4VWlsjYjcgRjb.jpg', 'Tinea Cruris', 'Tinea Cruris', '2023-12-25 06:32:13', '2024-01-06 22:58:43'),
(18, 'P18', 'rD5dZu0TmUYzkhr4POwFCKBp40zqUOiC1kEVzoqL.jpg', 'Panu', 'Panu', '2023-12-25 06:32:28', '2024-01-06 22:58:55'),
(19, 'P19', 'ofFFVHZudYiUJopABHBfhibLMfkK2dKWuJcYGlY8.jpg', 'Infeksi Parasit (Kudis)', 'Infeksi Parasit (Kudis)', '2023-12-25 06:32:47', '2024-01-06 22:59:25'),
(20, 'P20', 'tQ4JGNTL9rBHm869H3f6SxxhIUkBlXBUYWRNQiVS.jpg', 'Kanker Kulit (Melanoma)', 'Kanker Kulit (Melanoma)', '2023-12-25 06:34:12', '2024-01-06 22:59:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
