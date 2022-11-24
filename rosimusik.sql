-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 02:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rosimusik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Putu Ary Kusuma Yudha', 'putuary', '$2y$10$F3YwRkVzJ7pqv9Zk8Yvvl.yOobv1efaSemKGqN3M2METE/Ih9AIuW', 'default.png', NULL, '2022-11-13 16:02:02', '2022-11-13 16:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `gambar`, `nama_barang`, `id_jenis_barang`, `kondisi`, `created_at`, `updated_at`) VALUES
('BR-001', '00.jpg', 'Orgen 1', 'JB-001', 'Baik', '2022-11-22 02:03:25', '2022-11-22 12:37:32'),
('BR-002', 'cc6759ae8ce7b3356d17a4dec1f41221_2022399379894801329.jpg', 'Sound System 1', 'JB-002', 'Baik', '2022-11-22 02:04:18', '2022-11-22 12:38:39'),
('BR-003', 'pc_7.7079296c.png', 'Piano', 'JB-001', 'Baik', '2022-11-22 08:28:47', '2022-11-22 08:28:47'),
('BR-004', '3.1.jpg', 'Piano', 'JB-002', 'Rusak', '2022-11-22 12:33:57', '2022-11-22 12:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `catatan_penolakan`
--

CREATE TABLE `catatan_penolakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan_penolakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hutang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `id_transaksi`, `hutang`, `created_at`, `updated_at`) VALUES
('HT-001', 'TR-000000004', 15200000, '2022-11-22 02:29:33', '2022-11-22 02:29:33'),
('HT-002', 'TR-000000005', 35800000, '2022-11-22 02:33:17', '2022-11-22 02:33:17'),
('HT-003', 'TR-000000006', 6200000, '2022-11-22 08:14:26', '2022-11-22 08:14:26'),
('HT-004', 'TR-000000007', 124800000, '2022-11-22 08:27:18', '2022-11-22 08:27:18'),
('HT-005', 'TR-000000008', 3200000, '2022-11-22 09:30:16', '2022-11-22 09:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis_barang`, `jenis_barang`, `jumlah`, `created_at`, `updated_at`) VALUES
('JB-001', 'Orgen', 2, '2022-11-13 17:38:13', '2022-11-22 08:28:47'),
('JB-002', 'Sound System', 2, '2022-11-16 06:10:08', '2022-11-22 12:33:57'),
('JB-003', 'Alat Musik', 0, '2022-11-22 12:41:40', '2022-11-22 12:41:40'),
('JB-004', 'Diessel', 0, '2022-11-22 12:46:00', '2022-11-22 12:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_paket`
--

CREATE TABLE `jenis_paket` (
  `id_jenis_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_paket`
--

INSERT INTO `jenis_paket` (`id_jenis_paket`, `jenis_paket`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
('JP-001', 'Paket Non MC', 'image-3.png', 'Berbagai pilihan paket jasa layanan musik Non-MC', '2022-11-07 10:13:02', '2022-11-07 10:13:02'),
('JP-002', 'Paket Non-Diessel', 'image-9.png', 'Berbagai pilihan paket jasa layanan musik Non-Diessel', '2022-11-07 10:13:04', '2022-11-07 10:13:04'),
('JP-003', 'Paket Non-MC & Non-Diessel', 'image-10.png', 'Berbagai pilihan paket jasa layanan musik Non-MC & Non-Diessel', '2022-11-07 10:13:06', '2022-11-07 10:13:06'),
('JP-004', 'Paket Lengkap', 'image-11.png', 'Berbagai pilihan paket jasa layanan musik paket lengkap', '2022-11-07 10:13:08', '2022-11-07 10:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_barang`
--

CREATE TABLE `kondisi_barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baik` int(11) NOT NULL,
  `rusak` int(11) NOT NULL,
  `diperbaiki` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kondisi_barang`
--

INSERT INTO `kondisi_barang` (`id`, `id_jenis_barang`, `baik`, `rusak`, `diperbaiki`, `created_at`, `updated_at`) VALUES
(1, 'JB-001', 2, 0, 0, '2022-11-15 11:24:54', '2022-11-22 08:28:47'),
(2, 'JB-002', 1, 1, 0, '2022-11-16 06:10:08', '2022-11-22 12:33:57'),
(4, 'JB-003', 0, 0, 0, '2022-11-22 12:41:40', '2022-11-22 12:41:40'),
(5, 'JB-004', 0, 0, 0, '2022-11-22 12:46:00', '2022-11-22 12:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_pelanggan_table ', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_000001_create_admin_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_08_03_020214_create_social_accounts_table', 1),
(8, '2022_10_22_130832_create_jenis__pakets_table', 1),
(9, '2022_10_22_222240_create_jenis__barangs_table', 1),
(10, '2022_10_23_083758_create_barangs_table', 1),
(11, '2022_10_23_085726_create_pakets_table', 1),
(12, '2022_10_31_155207_create_pesanans_table', 1),
(13, '2022_10_31_155208_create_pesanan_sistem_table', 1),
(14, '2022_10_31_155208_create_pesanans_wa_table', 1),
(15, '2022_11_01_082352_create_kondisi__barangs_table', 1),
(16, '2022_11_19_170939_create_transaksis_table', 1),
(17, '2022_11_19_171159_create_hutangs_table', 1),
(18, '2022_11_19_171746_create_pembayarans_table', 1),
(19, '2022_11_19_181529_create_keuangans_table', 1),
(20, '2022_11_21_212326_create_catatan_penolakans_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jenis_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `deskripsi_singkat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_panjang` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `id_jenis_paket`, `nama_paket`, `gambar`, `harga_sewa`, `deskripsi_singkat`, `deskripsi_panjang`, `created_at`, `updated_at`) VALUES
('PK-001', 'JP-001', 'Paket 1 Non MC', 'The Band Band.png', 1700000, 'Orgen & Kru, Mobil, Diessel', '<li>1 Sound Sistem</li> <li>1 Teknisi</li> <li>3 Kru AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-07 10:14:50', '2022-11-22 09:50:32'),
('PK-002', 'JP-001', 'Paket 2', 'The Band Band.png', 2000000, 'Orgen & Kru, Mobil, Diessel, Ranjer', '<li>1 Sound Sistem</li> <li>1 Teknisi</li> <li>3 Kru AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-07 10:14:21', '2022-11-22 10:13:28'),
('PK-003', 'JP-002', 'Paket 1 Non-Diessel', 'pc_7.7079296c.png', 18000000, 'singkat', '<li>satu</li> <li>dua</li>', '2022-11-14 20:47:58', '2022-11-22 10:13:50'),
('PK-004', 'JP-002', 'Paket 2 Non-Diessel', 'kernel7.png', 18000000, 'sas', '<li>tes</li> <li>aja</li> <li>sih</li>', '2022-11-14 21:42:11', '2022-11-22 10:14:00'),
('PK-005', 'JP-002', 'Paket 3 Non-Diessel', 'kernel3.png', 2000000, 'tes aja', '<li>! kru ajs</li> <li>2 piano</li>', '2022-11-15 00:56:31', '2022-11-22 10:14:24'),
('PK-006', 'JP-004', 'Paket 1 Lengkap', 'grayscalegaus.png', 1800000, 'Orgen, sound system, asap', '<li>1 set orgen</li> <li>3 Sound System</li> <li>2 Asap</li>', '2022-11-22 02:19:37', '2022-11-22 10:14:35'),
('PK-007', 'JP-003', 'Paket 1', 'koefisien1.png', 2000000, 'Orgen, Kru, ranger', '<li>1 Paket Sound System</li> <li>1 Teknisi</li> <li>3 Krus AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 10:19:40', '2022-11-22 10:19:40'),
('PK-008', 'JP-002', 'Paket 1', 'gaussian7.png', 2000000, 'Orgen, Kru, Sopir', '<li>1 Paket Sound System</li> <li>1 Teknisi</li> <li>3 Krus AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 10:24:05', '2022-11-22 10:24:05'),
('PK-009', 'JP-002', 'Paket 1', 'gaussian7.png', 2000000, 'Orgen, Kru, Sopir', '<li>1 Paket Sound System</li> <li>1 Teknisi</li> <li>3 Krus AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 10:25:08', '2022-11-22 10:25:08'),
('PK-010', 'JP-004', 'Paket 1 Lengkap', 'gambar-gray.png', 2000000, 'Orgen, Kru, 5 Ranger', '<li>1 Paket Sound System</li> <li>1 Teknisi</li> <li>3 Krus AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 10:29:17', '2022-11-22 10:29:17'),
('PK-011', 'JP-004', 'Paket 10 Lengkap', 'koefisien1.png', 300000, 'Orgen, Kru, Diesel', '<li>1 Paket Sound System</li> <li>1 Teknisi</li> <li>3 Krus AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 11:40:47', '2022-11-22 11:40:47'),
('PK-012', 'JP-002', 'Paket 10 Non Diessel', 'grayscalegaus.png', 500000, 'Orgen, Kru, AJS', '<li>1 Sound Sistem</li> <li>1 Teknisi</li> <li>3 Kru AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 11:45:38', '2022-11-22 11:45:38'),
('PK-013', 'JP-001', 'Paket 3 Non MC', '94084743_p0.jpg', 2000000, 'Orgen, Kru, Rifan', '<li>1 Sound Sistem</li> <li>1 Teknisi</li> <li>3 Kru AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 11:47:57', '2022-11-22 11:47:57'),
('PK-014', 'JP-002', 'Paket 3 Non MC', '94084743_p0.jpg', 300000, 'Orgen, Kru, AJS', '<li>1 Sound Sistem</li> <li>1 Teknisi</li> <li>3 Kru AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 11:52:53', '2022-11-22 11:52:53'),
('PK-015', 'JP-002', 'Paket 3 Non MC', '94084743_p0.jpg', 300000, 'Orgen, Kru, AJS', '<li>1 Sound Sistem</li> <li>1 Teknisi</li> <li>3 Kru AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 12:12:19', '2022-11-22 12:12:19'),
('PK-016', 'JP-002', 'Paket 10 Non Diessel', '94084743_p0.jpg', 300000, 'Orgen', '<li>1 Sound Sistem</li> <li>1 Teknisi</li> <li>3 Kru AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 12:20:22', '2022-11-22 12:20:22'),
('PK-017', 'JP-002', 'Paket 3 Non-Diessel', 'Screenshot 2022-07-20 095805.jpg', 500000, 'Orgen, Kru, AJS', '<li>1 Sound Sistem</li> <li>1 Teknisi</li> <li>3 Kru AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 12:22:14', '2022-11-22 12:22:14'),
('PK-018', 'JP-003', 'Paket 1 Non MC & Non Diessel', '1.3 (1).png', 300000, 'Orgen', '<li>1 Paket Sound System</li> <li>1 Teknisi</li> <li>3 Krus AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 12:27:14', '2022-11-22 12:27:14'),
('PK-019', 'JP-002', 'Paket 17 Non Diessel', '1.3.png', 2000000, 'Orgen', '<li>1 Paket Sound System</li> <li>1 Teknisi</li> <li>3 Krus AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 12:28:13', '2022-11-22 12:28:13'),
('PK-020', 'JP-002', 'Paket 5 Non-Diessel', '1.6.png', 500000, 'Orgen', '<li>1 Paket Sound System</li> <li>1 Teknisi</li> <li>3 Krus AJS</li> <li>1 Ranjer</li> <li>1 Unit Kendaraan Transportasi</li>', '2022-11-22 12:29:02', '2022-11-22 12:29:02');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uang_bayar` int(11) NOT NULL,
  `waktu_bayar` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_booking` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_paket`, `tanggal_booking`, `tanggal_selesai`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
('PS-000000001', 'PK-001', '2022-11-22', '2022-11-22', '0895640495359', 'Karang sari', '2022-11-21 21:43:57', '2022-11-21 21:43:57'),
('PS-000000002', 'PK-001', '2022-11-22', '2022-11-22', '0895640495359', 'Karang sari', '2022-11-21 21:55:04', '2022-11-21 21:55:04'),
('PS-000000003', 'PK-001', '2022-11-22', '2022-11-22', '0895640495359', '1', '2022-11-21 22:03:25', '2022-11-21 22:03:25'),
('PS-000000004', 'PK-001', '2022-11-30', '2022-11-21', '089791000000', 'Banjar manis', '2022-11-22 02:28:51', '2022-11-22 02:28:51'),
('PS-000000005', 'PK-003', '2022-11-22', '2022-11-23', '0895640495359', 'yguuds', '2022-11-22 02:33:17', '2022-11-22 02:33:17'),
('PS-000000006', 'PK-001', '2022-11-19', '2022-11-22', '0895347363386', 'pasuruan', '2022-11-22 07:59:32', '2022-11-22 07:59:32'),
('PS-000000007', 'PK-003', '2022-11-18', '2022-11-24', '0895347262286', 'aaaaaaaaaaaaaaaaaaaaaaaaaaa', '2022-11-22 08:27:18', '2022-11-22 08:27:18'),
('PS-000000008', 'PK-001', '2022-11-23', '2022-11-24', '123456789', 'wwwwwwwwwwwwww', '2022-11-22 09:28:18', '2022-11-22 09:28:18');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_sistem`
--

CREATE TABLE `pesanan_sistem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_sistem`
--

INSERT INTO `pesanan_sistem` (`id`, `id_pesanan`, `id_pelanggan`, `catatan`, `status`, `created_at`, `updated_at`) VALUES
(5, 'PS-000000001', 2, 'Ss', 'Tervalidasi', '2022-11-21 21:43:57', '2022-11-21 21:52:47'),
(6, 'PS-000000002', 2, 'asas', 'Tervalidasi', '2022-11-21 21:55:04', '2022-11-21 22:00:14'),
(7, 'PS-000000004', 2, 'tolong segera', 'Tervalidasi', '2022-11-22 02:28:51', '2022-11-22 02:29:33'),
(8, 'PS-000000006', 4, 'aaaaaaaaaaaaaaaaaaaaa', 'Tervalidasi', '2022-11-22 07:59:32', '2022-11-22 08:14:26'),
(9, 'PS-000000008', 5, 'aaaaaaaaaaaaaaaaaaaaa', 'Tervalidasi', '2022-11-22 09:28:18', '2022-11-22 09:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_wa`
--

CREATE TABLE `pesanan_wa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_wa`
--

INSERT INTO `pesanan_wa` (`id`, `id_pesanan`, `nama`, `created_at`, `updated_at`) VALUES
(3, 'PS-000000003', 'Putu Ary Kusuma Yudha', '2022-11-21 22:03:25', '2022-11-21 22:03:25'),
(4, 'PS-000000005', 'Putu Ary Kusuma Yudha', '2022-11-22 02:33:17', '2022-11-22 02:33:17'),
(5, 'PS-000000007', 'rian andri waskito', '2022-11-22 08:27:18', '2022-11-22 08:27:18');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_accounts`
--

INSERT INTO `social_accounts` (`id`, `user_id`, `provider_id`, `provider_name`, `created_at`, `updated_at`) VALUES
(1, 1, '110858233229434709990', 'google', '2022-11-07 10:05:34', '2022-11-07 10:05:34'),
(2, 2, '102987723667287332139', 'google', '2022-11-07 10:07:42', '2022-11-07 10:07:42'),
(3, 3, '115227404253751012963', 'google', '2022-11-21 08:00:31', '2022-11-21 08:00:31'),
(4, 4, '102484807334058245050', 'google', '2022-11-22 07:37:57', '2022-11-22 07:37:57'),
(5, 5, '116739081433161140305', 'google', '2022-11-22 09:27:49', '2022-11-22 09:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `status_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesanan`, `total_bayar`, `waktu_transaksi`, `status_transaksi`, `created_at`, `updated_at`) VALUES
('TR-000000001', 'PS-000000001', 200000, '2022-11-22 04:52:47', 'Belum Dibayar', '2022-11-21 21:52:47', '2022-11-21 21:52:47'),
('TR-000000002', 'PS-000000002', 1700000, '2022-11-22 05:00:14', 'Belum Dibayar', '2022-11-21 22:00:14', '2022-11-21 22:00:14'),
('TR-000000003', 'PS-000000003', 1700000, '2022-11-22 05:03:25', 'Belum Dibayar', '2022-11-21 22:03:25', '2022-11-21 22:03:25'),
('TR-000000004', 'PS-000000004', 15200000, '2022-11-22 09:29:33', 'Belum Dibayar', '2022-11-22 02:29:33', '2022-11-22 02:29:33'),
('TR-000000005', 'PS-000000005', 35800000, '2022-11-22 09:33:17', 'Belum Dibayar', '2022-11-22 02:33:17', '2022-11-22 02:33:17'),
('TR-000000006', 'PS-000000006', 6200000, '2022-11-22 15:14:26', 'Belum Dibayar', '2022-11-22 08:14:26', '2022-11-22 08:14:26'),
('TR-000000007', 'PS-000000007', 124800000, '2022-11-22 15:27:18', 'Belum Dibayar', '2022-11-22 08:27:18', '2022-11-22 08:27:18'),
('TR-000000008', 'PS-000000008', 3200000, '2022-11-22 16:30:16', 'Belum Dibayar', '2022-11-22 09:30:16', '2022-11-22 09:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ari', 'uzumakiuciha190@gmail.com', 'https://lh3.googleusercontent.com/a/ALm5wu0XQEMcBL2PLGiSGrw-q9qWCRQvSQ32IeOG2AjE=s96-c', 'Wqw84OISBqFq55FtXcOg6IPk5o6bVgdsJHri2ktvsy7QdbatIo65nldqtlDG', '2022-11-07 10:05:34', '2022-11-07 10:05:34'),
(2, 'Putu Ary Kusuma Yudha', 'putuary4223@gmail.com', 'https://lh3.googleusercontent.com/a/ALm5wu291CfR2qcV0dAhJreuCmBPv5WYrdSSKWa373H1=s96-c', 'l55FoDSnadfyGhEdCl6UlSQWrcLxpG2uy2PH4KNVMfqWJ09NXKFrMIIfpFJa', '2022-11-07 10:07:42', '2022-11-07 10:07:42'),
(3, 'II9I4OO98 - Putu Ary Kusuma Yudha', 'putu.119140098@student.itera.ac.id', 'https://lh3.googleusercontent.com/a/ALm5wu3j4jof354l7tpds_1_02TWgcWMT9Q1K4F0KhIv=s96-c', 'BUTTIdigTJ2RFBlRuQj9s7bFGuAeKmVcU2VbhSPcXodvxuubv2aAOwb0Z09s', '2022-11-21 08:00:31', '2022-11-21 08:00:31'),
(4, 'Uchiha Itachi', 'uchihaitachi1304@gmail.com', 'https://lh3.googleusercontent.com/a/ALm5wu3s7yQxmBK57VbSe_bna4YNBtAKF1-6DhvmJ0uOyA=s96-c', 'Owx0TXwa4zocImxHOjepQwr2RajIziYzyfVZdy6bfdvxTpRsGbG7u1bVrbFJ', '2022-11-22 07:37:57', '2022-11-22 07:37:57'),
(5, 'Rian Andri', 'awanandri343@gmail.com', 'https://lh3.googleusercontent.com/a/ALm5wu0YAPoKa3-rrRQ5mFrcVfEe1McZ4kQ1dLmb-bzm=s96-c', '4PqvUHUFNsM6LrHD0EWgMzMbNhMysLAdVXvHTOsoTXnSn5EAFFUfx9ZJJtxW', '2022-11-22 09:27:49', '2022-11-22 09:27:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_username_unique` (`username`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_id_jenis_barang_foreign` (`id_jenis_barang`);

--
-- Indexes for table `catatan_penolakan`
--
ALTER TABLE `catatan_penolakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catatan_penolakan_id_pesanan_foreign` (`id_pesanan`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`),
  ADD KEY `hutang_id_transaksi_foreign` (`id_transaksi`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis_barang`);

--
-- Indexes for table `jenis_paket`
--
ALTER TABLE `jenis_paket`
  ADD PRIMARY KEY (`id_jenis_paket`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kondisi_barang_id_jenis_barang_foreign` (`id_jenis_barang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `paket_id_jenis_paket_foreign` (`id_jenis_paket`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `pelanggan_email_unique` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_id_transaksi_foreign` (`id_transaksi`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `pesanan_id_paket_foreign` (`id_paket`);

--
-- Indexes for table `pesanan_sistem`
--
ALTER TABLE `pesanan_sistem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_sistem_id_pesanan_foreign` (`id_pesanan`),
  ADD KEY `pesanan_sistem_id_pelanggan_foreign` (`id_pelanggan`);

--
-- Indexes for table `pesanan_wa`
--
ALTER TABLE `pesanan_wa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_wa_id_pesanan_foreign` (`id_pesanan`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_accounts_provider_id_unique` (`provider_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksi_id_pesanan_foreign` (`id_pesanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catatan_penolakan`
--
ALTER TABLE `catatan_penolakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan_sistem`
--
ALTER TABLE `pesanan_sistem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pesanan_wa`
--
ALTER TABLE `pesanan_wa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_id_jenis_barang_foreign` FOREIGN KEY (`id_jenis_barang`) REFERENCES `jenis_barang` (`id_jenis_barang`);

--
-- Constraints for table `catatan_penolakan`
--
ALTER TABLE `catatan_penolakan`
  ADD CONSTRAINT `catatan_penolakan_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Constraints for table `hutang`
--
ALTER TABLE `hutang`
  ADD CONSTRAINT `hutang_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `kondisi_barang`
--
ALTER TABLE `kondisi_barang`
  ADD CONSTRAINT `kondisi_barang_id_jenis_barang_foreign` FOREIGN KEY (`id_jenis_barang`) REFERENCES `jenis_barang` (`id_jenis_barang`);

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_id_jenis_paket_foreign` FOREIGN KEY (`id_jenis_paket`) REFERENCES `jenis_paket` (`id_jenis_paket`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_id_transaksi_foreign` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_id_paket_foreign` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`);

--
-- Constraints for table `pesanan_sistem`
--
ALTER TABLE `pesanan_sistem`
  ADD CONSTRAINT `pesanan_sistem_id_pelanggan_foreign` FOREIGN KEY (`id_pelanggan`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pesanan_sistem_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Constraints for table `pesanan_wa`
--
ALTER TABLE `pesanan_wa`
  ADD CONSTRAINT `pesanan_wa_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
