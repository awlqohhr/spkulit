-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2023 pada 06.36
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejalas`
--

CREATE TABLE `gejalas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Kode_Gejala` varchar(255) NOT NULL,
  `Nama_Gejala` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakits`
--

CREATE TABLE `penyakits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Kode_Penyakit` varchar(255) NOT NULL,
  `Gambar_Penyakit` varchar(255) DEFAULT NULL,
  `Nama_Penyakit` varchar(255) NOT NULL,
  `Deskripsi_Penyakit` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penyakits`
--

INSERT INTO `penyakits` (`id`, `Kode_Penyakit`, `Gambar_Penyakit`, `Nama_Penyakit`, `Deskripsi_Penyakit`, `created_at`, `updated_at`) VALUES
(1, 'P01', 'gambar_penyakit/JgRPTdXX5IiYoGDIpCSHzta7mzGnUMHnI1eRZcZj.jpg', 'Dermatitis Kontak Irritan', 'Dermatitis Kontak Irritan', '2023-12-25 04:41:13', '2023-12-25 04:41:13'),
(2, 'P02', 'gambar_penyakit/bGkdvB9JKMiTfxE6ibJA0U9ZxLsW6sQWhcddoV6c.jpg', 'Dermatitis Kontak Alergi (Eksim Basah)', 'Dermatitis Kontak Alergi (Eksim Basah)', '2023-12-25 04:41:34', '2023-12-25 04:41:34'),
(3, 'P03', 'gambar_penyakit/2wozSzlE5XoSJlx3R8Nn9Wu7VWqwW3KuIVKcU4gI.jpg', 'Dermatitis Atopik (Eksim Kering)', 'Dermatitis Atopik (Eksim Kering)', '2023-12-25 05:25:40', '2023-12-25 05:25:40'),
(4, 'P04', 'gambar_penyakit/GNkdZGpDPYsNDt0T9WmPMf1HRH44NFb8xdk1dbOs.jpg', 'Dermatitis Seboroik', 'Dermatitis Seboroik', '2023-12-25 05:25:59', '2023-12-25 05:25:59'),
(5, 'P05', 'gambar_penyakit/3h4709HBDZ4CHZg20DOahnuxu83WwTK6oXosG6d2.jpg', 'Psoriasis', 'Psoriasis', '2023-12-25 05:26:20', '2023-12-25 05:26:20'),
(6, 'P06', 'gambar_penyakit/7PHbQFPLXRQvLWF3XjACbigr3sfAvtfqCgE5D9EW.jpg', 'Vitiligo', 'Vitiligo', '2023-12-25 05:26:39', '2023-12-25 05:26:39'),
(7, 'P07', 'gambar_penyakit/UdBGoSbHD2E7mhU8h5JINabdju3sxLQwcKM8Eedm.jpg', 'Skleroderma', 'Skleroderma', '2023-12-25 06:24:54', '2023-12-25 06:24:54'),
(8, 'P08', 'gambar_penyakit/z6a3YHVBLfn92RudVnpl1Cwcrxjv8wxtBCny1nEk.jpg', 'Pemfigus vulgaris', 'Pemfigus vulgaris', '2023-12-25 06:25:26', '2023-12-25 06:25:26'),
(9, 'P09', 'gambar_penyakit/h42BPoaJntYXxk7m9icL2CC17lZq3gLBUGFAf7BD.jpg', 'Pemfigus Foliaceus', 'Pemfigus Foliaceus', '2023-12-25 06:27:52', '2023-12-25 06:27:52'),
(10, 'P10', 'gambar_penyakit/mUFJeE3s34CORgxV4ZnIEaVFaaowPK3ZhM9W9YoI.jpg', 'Lupus Eritematosus Diskoid (DLE)', 'Lupus Eritematosus Diskoid (DLE)', '2023-12-25 06:29:14', '2023-12-25 06:29:14'),
(11, 'P11', 'gambar_penyakit/ZUK6qevaLlOa5Ipk6FF2jjOiLsTmn358KdsFF9uh.jpg', 'Bisul', 'Bisul', '2023-12-25 06:29:31', '2023-12-25 06:29:31'),
(12, 'P12', 'gambar_penyakit/IHRC3TW8FH8PCKsb29BScDqsyDfctWTySydrrkdR.jpg', 'Impetigo', 'Impetigo', '2023-12-25 06:29:42', '2023-12-25 06:29:42'),
(13, 'P13', 'gambar_penyakit/YQltxVVxNz62WM05qn48LUHJw4ddZHvPQdWNzj1d.jpg', 'Kusta', 'Kusta', '2023-12-25 06:30:20', '2023-12-25 06:30:20'),
(14, 'P14', 'gambar_penyakit/yyshba8kPs747TqXD8EeFVrG1PACeiOvNF8sjDRR.jpg', 'Cacar', 'Cacar', '2023-12-25 06:30:35', '2023-12-25 06:30:35'),
(15, 'P15', 'gambar_penyakit/f6hW9LjsZskxVnkPfnvMeuJxU2N0duxVpFU0YClR.jpg', 'Herpes Zoster (Cacar Ular)', 'Herpes Zoster (Cacar Ular)', '2023-12-25 06:30:52', '2023-12-25 06:31:36'),
(16, 'P16', 'gambar_penyakit/4fwgtx70vIy3OiLzlYk2bg9Dc5VhhYlg0qzSFtIC.jpg', 'Kurap', 'Kurap', '2023-12-25 06:31:54', '2023-12-25 06:31:54'),
(17, 'P17', 'gambar_penyakit/bjvfxz8ozFACmFUwxQQrqUfA8UaPamy6jNmiF8cU.jpg', 'Tinea Cruris', 'Tinea Cruris', '2023-12-25 06:32:13', '2023-12-25 06:32:13'),
(18, 'P18', 'gambar_penyakit/mnFj7Lx11kZWR3H8xSiCOMXk94oOvyiNlddASjqi.jpg', 'Panu', 'Panu', '2023-12-25 06:32:28', '2023-12-25 06:32:28'),
(19, 'P19', 'gambar_penyakit/CDJdJ2ZVhH1fHIxpjU12x7nJ78cCFmadVUQxmqPx.jpg', 'Infeksi Parasit (Kudis)', 'Infeksi Parasit (Kudis)', '2023-12-25 06:32:47', '2023-12-25 06:32:47'),
(20, 'P20', 'gambar_penyakit/QTQmQkZwlvLeKwBqq9d88V6oVolA8LrnPVGIYV4E.jpg', 'Kanker Kulit (Melanoma)', 'Kanker Kulit (Melanoma)', '2023-12-25 06:34:12', '2023-12-25 06:34:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gejalas`
--
ALTER TABLE `gejalas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakits`
--
ALTER TABLE `penyakits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gejalas`
--
ALTER TABLE `gejalas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `penyakits`
--
ALTER TABLE `penyakits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
