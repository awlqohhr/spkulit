-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Des 2023 pada 07.34
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
