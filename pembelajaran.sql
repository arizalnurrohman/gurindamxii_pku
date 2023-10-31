-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 09:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembelajaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `cuId` int(10) UNSIGNED NOT NULL,
  `cuTitle` varchar(255) NOT NULL,
  `cuPermalink` varchar(255) NOT NULL,
  `cuParent` int(11) NOT NULL,
  `cuName` varchar(255) NOT NULL,
  `cuHP` varchar(255) NOT NULL,
  `cuEmail` varchar(255) NOT NULL,
  `cuType` enum('Kritik','Saran') NOT NULL,
  `cuMessage` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `cuRead` enum('unread','read') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`cuId`, `cuTitle`, `cuPermalink`, `cuParent`, `cuName`, `cuHP`, `cuEmail`, `cuType`, `cuMessage`, `id_user`, `cuRead`, `created_at`, `updated_at`) VALUES
(3, 'ini test kiri email dari Gurindam ya', '3-ini-test-kiri-email-dari-gurindam-ya', 0, 'Arizal Nur Rohman', '085265266005', 'arizalnurrohman13@gmail.com', 'Kritik', 'isi pesan teks nya ya beroah ini test kiri email dari Gurindam ya ini test kiri email dari Gurindam ya', 0, 'read', '2023-09-13 20:50:01', NULL),
(4, 'judul dari Rani Visdayati', '4-judul-dari-rani-visdayati', 0, '085262526262', '085262526262', 'rani@gmail.com', 'Kritik', 'isi dari Rani Visdayati', 0, 'read', '2023-09-14 20:51:25', NULL),
(5, 'ini test kiri email dari Gurindam ya', '5-ini-test-kiri-email-dari-gurindam-ya', 0, '07662772727', '07662772727', 'alesha@gmail.com', 'Kritik', 'asda sdsa a', 0, 'read', '2023-09-14 20:51:58', NULL),
(6, 'saran dari siaha', '6-saran-dari-siaha', 0, 'aisha az zahra', '727272727272', 'aisha@gmail.com', 'Saran', 'asdasd', 0, 'unread', '2023-09-14 20:54:22', NULL),
(7, 'ini test kiri email dari Gurindam ya', '7-ini-test-kiri-email-dari-gurindam-ya', 0, 'arizal nur rohman', '085265266005', 'arizalnurrohman13@gmail.com', 'Kritik', 'sdf', 0, 'read', '2023-09-19 02:01:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hubungi_admin`
--

CREATE TABLE `hubungi_admin` (
  `haId` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `haLockId` int(11) NOT NULL,
  `haTicket` varchar(255) DEFAULT NULL,
  `haTicketId` varchar(255) DEFAULT NULL,
  `haTitle` varchar(255) DEFAULT NULL,
  `haPermalink` varchar(255) DEFAULT NULL,
  `haContent` text NOT NULL,
  `haDisplay` enum('y','n') NOT NULL,
  `haParent` int(11) NOT NULL,
  `haRead` enum('y','n') NOT NULL,
  `haSession` enum('open','close') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hubungi_admin`
--

INSERT INTO `hubungi_admin` (`haId`, `id_user`, `haLockId`, `haTicket`, `haTicketId`, `haTitle`, `haPermalink`, `haContent`, `haDisplay`, `haParent`, `haRead`, `haSession`, `created_at`, `updated_at`) VALUES
(1, 5, 0, 'PGN-20230921-000001', '1', 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', '1-lorem-ipsum-lorem-ipsum-lorem-ipsum-lorem-ipsum-lorem-ipsum-lorem-ipsum-lorem-ipsum-lorem-ipsum-lorem-ipsum-lorem-ipsum-lorem-ipsum-lorem-ipsum', ' Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum\r\n\r\nLorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum ', 'y', 0, 'y', 'open', '2023-09-25 02:33:28', NULL),
(2, 5, 0, 'PGN-20230921-000002', '2', 'Analisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker di Lingkup Kanwil DJPb Provinsi DKI Jakarta Tahun 2022', '2-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', 'IKPA ialah indikator yang digunakan sebagai alat ukur untuk menentukan kinerja suatu satker. Terdapat delapan indikator dalam penilaian IKPA, yaitu Revisi DIPA, Deviasi Halaman III DIPA, Penyerapan Anggaran, Data Kontrak, Penyelesaian Tagihan, Pengelolaan UP dan TUP, Dispensasi SPM dan Capaian Output. Pada tahun 2022 diketahui bahwa Kanwil DJPb Provinsi DKI Jakarta mendapatkan IKPA sebesar 93,17. Nilai tersebut tergolong tinggi, namun apabila dijabarkan lagi per komponen indikator, terdapat satu indikator yang jika dibandingkan dengan indikator lainnya memiliki selisih yang cukup jauh antara bobot nilai maksimal dengan nilai perolehannya, yaitu indikator Deviasi Halaman III DIPA dengan nilai akhir yang diperoleh sebesar 7,02 dari nilai maksimalnya 10. Adanya nilai deviasi yang tinggi menunjukkan kualitas perencanaan anggaran yang kurang optimal. Artinya, terdapat ketidaksesuaian antara realisasi anggaran dan Rencana Penarikan Dana (RPD) yang dilakukan satker.', 'y', 0, 'y', 'open', '2023-09-24 02:33:28', NULL),
(3, 5, 0, 'PGN-20230921-000003', '3', 'PAWAN (Publikasi Perbendaharaan dan Analisis Ekonomi Wilayah KPPN Ketapang) Edisi II Ini Tambahan nama Judul Boar panjang', '3-pawan-publikasi-perbendaharaan-dan-analisis-ekonomi-wilayah-kppn-ketapang-edisi-ii-ini-tambahan-nama-judul-boar-panjang', 'Triwulan ke-2 tahun 2023 ini terus menjadi penanda penting bagi kinerja dan pelayanan KPPN Ketapang dalam memastikan visi dan misi Direktorat Jenderal Perbendaharaan terus bergerak adaptif dan terakselerasi di wilayah kerja KPPN Ketapang. Standardisasi pelayanan perbendaharaan tanpa korupsi dan gratifikasi merupakan wujud komitmen pelayanan  terbaik kami bagi seluruh pengguna layanan.\r\n\r\nSeperti perjalanan organisasi mencapai tujuannya, buletin PAWAN edisi kedua 2023 ini akan dilengkapi dengan berbagai cerita goresan tangan para pegawai KPPN Ketapang yang diharapkan mampu mengcapture pengelolaan keuangan negara yang efektif dan efisien serta menceritakan manfaat dari pengelolaan tersebut untuk daerah khususnya di lingkup Kabupaten Ketapang dan Kayong Utara.', 'y', 0, 'y', 'close', '2023-09-23 02:37:11', NULL),
(40, 5, 0, 'PGN-20230926-000001', '1', 'Contoh Judul Topik Baru gys', '40-contoh-judul-topik-baru-gys', 'Contoh Judul Topik Baru gys Contoh Judul Topik Baru gys Contoh Judul Topik Baru gys Contoh Judul Topik Baru gys Contoh Judul Topik Baru gys Contoh Judul Topik Baru gys Contoh Judul Topik Baru gys Contoh Judul Topik Baru gys <br>', 'y', 0, 'y', 'open', '2023-09-26 08:18:33', NULL),
(43, 5, 0, 'PGN-20230927-000001', '1', 'tambah topik baru ya guys,,', '43-tambah-topik-baru-ya-guys', '<p>ini contoh topik nya,,<br></p>', 'y', 0, 'y', 'open', '2023-09-27 04:22:18', NULL),
(44, 1, 0, NULL, NULL, NULL, NULL, 'ini jawaban baru dari admin ya guys,, nnti kalau misalnya mau di balas lagi silahkan,, ini contoh aja sebagai balasan dari admin nya <br>', 'y', 43, 'n', NULL, '2023-10-05 07:30:17', NULL),
(45, 1, 0, NULL, NULL, NULL, NULL, '<p><span>Triwulan ke-2 tahun 2023 ini terus menjadi penanda penting bagi \r\nkinerja dan pelayanan KPPN Ketapang dalam memastikan visi dan misi \r\nDirektorat Jenderal Perbendaharaan terus bergerak adaptif dan \r\nterakselerasi di wilayah kerja KPPN Ketapang. Standardisasi pelayanan \r\nperbendaharaan tanpa korupsi dan gratifikasi merupa</span></p>', 'y', 3, 'y', NULL, '2023-10-05 07:30:39', NULL),
(46, 1, 0, NULL, NULL, NULL, NULL, '<p><span>Triwulan ke-2 tahun 2023 ini terus menjadi penanda penting bagi kinerja dan pelayanan KPPN Ketapang dalam </span></p>', 'y', 3, 'y', NULL, '2023-10-05 07:30:44', NULL),
(47, 1, 0, NULL, NULL, NULL, NULL, '<p><span>, buletin PAWAN edisi kedua 2023 ini akan dilengkapi dengan \r\nberbagai cerita goresan tangan para pegawai KPPN Ketapang yang \r\ndiharapkan mampu mengcapture pengelolaan keuangan negara yang efektif \r\ndan efisien serta menceritakan manfaat dari pengelolaan tersebut untuk \r\ndaerah khususnya di lingkup Kabupaten Ketapang dan Kayong Utara</span></p>', 'y', 3, 'y', NULL, '2023-10-05 07:30:48', NULL),
(48, 5, 0, NULL, NULL, NULL, NULL, '<p><span class=\"lbl\">n ke-2 tahun 2023 ini terus menjadi penanda pent</span></p>', 'y', 3, 'y', NULL, '2023-10-05 07:31:01', NULL),
(49, 5, 0, NULL, NULL, NULL, NULL, '<p><span class=\"lbl\">n ke-2 tahun 2023 ini terus menjadi penanda pent</span><span class=\"lbl\">n ke-2 tahun 2023 ini terus menjadi penanda pent</span><span class=\"lbl\">n ke-2 tahun 2023 ini terus menjadi penanda pent</span></p>', 'y', 3, 'y', NULL, '2023-10-05 07:31:04', NULL),
(50, 5, 0, NULL, NULL, NULL, NULL, '<p><span class=\"lbl\">n ke-2 tahun 2023 ini terus menjadi penanda pent</span><span class=\"lbl\">n ke-2 tahun 2023 ini terus menjadi penanda pent</span></p>', 'y', 3, 'y', NULL, '2023-10-05 07:31:07', NULL),
(51, 5, 0, NULL, NULL, NULL, NULL, '<p>terimakasih..<br></p>', 'y', 3, 'y', NULL, '2023-10-05 07:31:17', NULL),
(52, 5, 0, NULL, NULL, NULL, NULL, '<p>Balasan dari ini ya.. Analisis Nilai Deviasi pada Halaman<br></p>', 'y', 2, 'n', NULL, '2023-10-05 07:57:28', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_23_091751_create_ms_pembelajaran_table', 1),
(7, '2023_08_24_021337_create_permission_tables', 1),
(8, '2023_08_24_023723_create_ms_categori_pembelajaran_table', 1),
(9, '2023_08_30_033504_create_ms_pembelajaran_detail_table', 1),
(10, '2023_08_31_025714_create_pengetahuan_category_table', 1),
(11, '2023_08_31_025825_create_pengetahuan_table', 1),
(12, '2023_08_31_030127_create_pengetahuan_comment_table', 1),
(13, '2023_08_31_030217_create_pengetahuan_content_table', 1),
(14, '2023_08_31_030347_create_pengetahuan_highlight_table', 1),
(15, '2023_08_31_030403_create_pengetahuan_rating_table', 1),
(16, '2023_09_05_012935_create_pengetahuan_read_table', 2),
(17, '2023_09_11_085750_create_pengetahuan_activity_table', 3),
(18, '2023_09_12_073856_create_pengetahuan_like_table', 3),
(19, '2023_09_12_073906_create_pengetahuan_readlist_table', 3),
(20, '2023_09_12_073910_create_pengetahuan_readlist_content_table', 3),
(21, '2023_09_12_075650_create_pengetahuan_pinned_table', 3),
(24, '2023_09_13_080141_create_contact_us_table', 4),
(26, '2023_09_20_074831_create_hubungi_admin_table', 5),
(27, '2023_09_27_143734_create_pengetahuan_read_content_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ms_pembelajaran`
--

CREATE TABLE `ms_pembelajaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `pmTitle` varchar(255) NOT NULL,
  `pmPermalink` varchar(255) NOT NULL,
  `pmImage` varchar(255) NOT NULL,
  `pmDescription` tinytext NOT NULL,
  `pmEstimation` int(11) NOT NULL,
  `pmStatus` enum('y','n') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_pembelajaran`
--

INSERT INTO `ms_pembelajaran` (`id`, `user_id`, `catId`, `pmTitle`, `pmPermalink`, `pmImage`, `pmDescription`, `pmEstimation`, `pmStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'asd', 'asd', '202309050455_whatsapp-image-2023-07-25-at-11.16.07.jpg', '<p>as<br></p>', 123123, 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_pembelajaran_categori`
--

CREATE TABLE `ms_pembelajaran_categori` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `catPermalink` varchar(255) NOT NULL,
  `catImage` varchar(255) NOT NULL,
  `catDescription` tinytext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_pembelajaran_categori`
--

INSERT INTO `ms_pembelajaran_categori` (`catId`, `catName`, `catPermalink`, `catImage`, `catDescription`, `created_at`, `updated_at`) VALUES
(1, 'asdas', 'asdas', '202309050455_bg.png', '<p>asdad<br></p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ms_pembelajaran_detail`
--

CREATE TABLE `ms_pembelajaran_detail` (
  `pdId` int(11) NOT NULL,
  `pbId` int(11) NOT NULL,
  `pdTitle` varchar(255) NOT NULL,
  `pdPermalink` varchar(255) NOT NULL,
  `pdImage` varchar(255) NOT NULL,
  `pdFile` varchar(255) NOT NULL,
  `pdVideo` varchar(255) NOT NULL,
  `pdDescription` longtext NOT NULL,
  `pdDuration` int(11) NOT NULL,
  `pdStatus` enum('y','n') NOT NULL,
  `pdSort` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_pembelajaran_detail`
--

INSERT INTO `ms_pembelajaran_detail` (`pdId`, `pbId`, `pdTitle`, `pdPermalink`, `pdImage`, `pdFile`, `pdVideo`, `pdDescription`, `pdDuration`, `pdStatus`, `pdSort`, `created_at`, `updated_at`) VALUES
(1, 1, 'sub materi 1', 'sub-materi-1', 'none', '202309080423_radiogram-penyampaian-sk-iid-2022-dan-sk-iga-2022.pdf', 'https://www.youtube.com/watch?v=IZhOb7yQTXQ', '<p>a sad ad asdasdasda<br></p>', 12, 'y', 0, NULL, NULL),
(2, 1, 'hhhh', 'hhhh', 'none', '202309080452_radiogram-penyampaian-sk-iid-2022-dan-sk-iga-2022.pdf', 'https://www.youtube.com/watch?v=IZhOb7yQTXQ', '<p>kkk<br></p>', 123, 'y', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('arizalnurrohman13@gmail.com', '$2y$10$IykTfbfGJaSs.qhMWeSB.OrGwT20cFHHT9MKapI/DyAxNua/z4SS2', '2023-09-11 21:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `pgId` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `pgType` enum('Public','Private') NOT NULL,
  `pgTitle` varchar(255) NOT NULL,
  `pgPermalink` varchar(255) NOT NULL,
  `pgTimePost` datetime NOT NULL,
  `pgImage` varchar(255) DEFAULT NULL,
  `pgDescription` text NOT NULL,
  `pgEstimation` int(11) NOT NULL,
  `pgViewed` int(11) NOT NULL,
  `pgDisplay` enum('y','n') NOT NULL,
  `pgReported` enum('y','n') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengetahuan`
--

INSERT INTO `pengetahuan` (`pgId`, `id_user`, `catId`, `pgType`, `pgTitle`, `pgPermalink`, `pgTimePost`, `pgImage`, `pgDescription`, `pgEstimation`, `pgViewed`, `pgDisplay`, `pgReported`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Public', 'Internal Auditing: Assurance & Advisory Services (resume dan slide)', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-06-09 00:00:00', '2023/10/20231003/651b84bc9045d.JPG', '<p>Banyak pihak beranggapan bahwa pekerjaan sebagai audit internal \r\nmerupakan cabang pekerjaan yang membosankan dari akuntansi. Bahkan \r\npekerjaan ini sering dinilai dengan konotasi negatif sebagai suatu \r\npekerjaan untuk mengecek dan mencari kesalahan pekerjaan orang lain. \r\nPada kenyataannya, audit internal adalah pekerjaan yang bergengsi dengan\r\n profil profesi yang tinggi. Banyak perusahaan membutuhkan fungsi audit \r\ninternal dikarenakan audit internal mempunyai peran yang sangat penting \r\ndalam mewujudkan tujuan suatu perusahaan.</p>', 99, 59, 'y', 'y', NULL, NULL),
(2, 1, 3, 'Public', 'PAWAN (Publikasi Perbendaharaan dan Analisis Ekonomi Wilayah KPPN Ketapang) Edisi II Ini Tambahan nama Judul Boar panjang', '2-pawan-publikasi-perbendaharaan-dan-analisis-ekonomi-wilayah-kppn-ketapang-edisi-ii-ini-tambahan-nama-judul-boar-panjang', '2023-06-09 00:00:00', '2023/10/20231003/651b854b3c7f3.JPG', '<p>Triwulan ke-2 tahun 2023 ini terus menjadi penanda penting bagi kinerja dan pelayanan KPPN Ketapang dalam memastikan visi dan misi Direktorat Jenderal Perbendaharaan terus bergerak adaptif dan terakselerasi di wilayah kerja KPPN Ketapang. Standardisasi pelayanan perbendaharaan tanpa korupsi dan gratifikasi merupakan wujud komitmen pelayanan&nbsp; terbaik kami bagi seluruh pengguna layanan.<br><br>Seperti perjalanan organisasi mencapai tujuannya, buletin PAWAN edisi kedua 2023 ini akan dilengkapi dengan berbagai cerita goresan tangan para pegawai KPPN Ketapang yang diharapkan mampu mengcapture pengelolaan keuangan negara yang efektif dan efisien serta menceritakan manfaat dari pengelolaan tersebut untuk daerah khususnya di lingkup Kabupaten Ketapang dan Kayong Utara.<br></p>', 30, 210, 'y', 'y', NULL, NULL),
(3, 1, 2, 'Public', 'Analisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker di Lingkup Kanwil DJPb Provinsi DKI Jakarta Tahun 2022', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-05-09 00:00:00', '2023/10/20231003/651b855060447.JPG', '<p><span class=\"selectable-text1\">IKPA ialah indikator yang digunakan \r\nsebagai alat ukur untuk menentukan kinerja suatu satker. Terdapat \r\ndelapan indikator dalam penilaian IKPA, yaitu Revisi DIPA, Deviasi \r\nHalaman III DIPA, Penyerapan Anggaran, Data Kontrak, Penyelesaian \r\nTagihan, Pengelolaan UP dan TUP, Dispensasi SPM dan Capaian Output.&nbsp;</span><span class=\"selectable-text1\">Pada\r\n tahun 2022 diketahui bahwa Kanwil DJPb Provinsi DKI Jakarta mendapatkan\r\n IKPA sebesar 93,17. Nilai tersebut tergolong tinggi, namun apabila \r\ndijabarkan lagi per komponen indikator, terdapat satu indikator yang \r\njika dibandingkan dengan indikator lainnya memiliki selisih yang cukup \r\njauh antara bobot nilai maksimal dengan nilai perolehannya, yaitu \r\nindikator Deviasi Halaman III DIPA dengan nilai akhir yang diperoleh \r\nsebesar 7,02 dari nilai maksimalnya 10. Adanya nilai deviasi yang tinggi\r\n menunjukkan kualitas perencanaan anggaran yang kurang optimal. Artinya,\r\n terdapat ketidaksesuaian antara realisasi anggaran dan Rencana \r\nPenarikan Dana (RPD) yang dilakukan satker.</span></p>', 40, 232, 'y', 'y', NULL, NULL),
(4, 1, 1, 'Private', 'Laporan Ekonomi dan Keuangan Mingguan - 21s.d. 27 Agustus 2023', '4-laporan-ekonomi-dan-keuangan-mingguan-21sd-27-agustus-2023', '2023-05-09 13:30:00', '2023/10/20231003/651b855560d18.png', '<p><em>Highlight </em>Laporan Ekonomi dan Keuangan Mingguan periode 21 s.d. 27 Agustus 2023</p><ul><li>Indeks\r\n saham di AS ditutup bervariasi. Sementara itu, indeks di kawasan Eropa \r\ndan Asia ditutup menguat. Berbagai sentimen, seperti prospek pengetatan \r\nmoneter the Fed dan pelemahan ekonomi Tiongkok memengaruhi pergerakan \r\nindeks saham global.</li><li>Yield US Treasury turun tipis, sementara \r\nindeks Dolar AS ditutup menguat dalam sepekan karena kekhawatiran \r\ninvestor terhadap berlanjutnya kenaikan suku bunga the Fed.</li><li>Harga\r\n minyak mentah dan batu bara melemah karena prospek permintaan yang \r\nturun. Sementara itu, harga CPO menguat akibat naiknya permintaan.</li><li>Di\r\n pasar keuangan domestik, IHSG menguat 0,52% (wow) dengan yield SUN seri\r\n benchmark bergerak variatif antara -2 hingga 13 bps dibandingkan dengan\r\n pekan sebelumnya. Sementara itu, nilai tukar Rupiah melemah sebesar \r\n0,07%.</li><li>Tren inflasi yang menurun pada bulan Juli 2023 terjadi di\r\n kawasan ASEAN dan Afrika. Dari dalam negeri, Bank Indonesia (BI) \r\nkembali mengambil langkah kebijakan mempertahankan suku bunga acuan \r\nBI7DRR pada level 5,75%.</li></ul><p></p>', 50, 9, 'y', 'y', NULL, NULL),
(5, 1, 3, 'Private', 'Belajar Laravel - Pemula', '5-belajar-laravel-pemula', '2023-05-09 00:30:00', '2023/10/20231003/651b855bd0887.JPG', '<p>lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsumlore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsumlore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsumlore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsumlore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsumlore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsumlore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsumlore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum<br></p>', 90, 56, 'y', 'y', NULL, NULL),
(6, 1, 2, 'Public', 'Judul lain yang telah di posting untuk latihan', '6-judul-lain-yang-telah-di-posting-untuk-latihan', '2023-04-11 00:30:00', '2023/10/20231003/651b856108f3c.JPG', 'Namun demikian, dinamika perekonomian global dengan berbagai potensi \r\nrisikonya menciptakan tantangan bagi perekonomian dan sektor keuangan \r\ndomestik. Beberapa sumber risiko dari global yang terus dicermati yaitu \r\ntingkat inflasi yang masih persisten tinggi, suku bunga yang cederung \r\ntinggi, intenfisikasi perang di Ukraina, <em>geoeconomics fragmentation, debt distress, </em>termasuk\r\n volatilitas di sektor keuangan. Sebagai langkah antisipatif atas \r\nberbagai dinamika global tersebut. APBN terus bekerja keras untuk \r\nmenjaga pemulihan ekonomi dan melindungi masyarakat. Di saat yang \r\nbersamaan, Pemerintah akan terus melakukan asesmen terhadap dampak \r\ndinamika global terhadap perekonomian domestik serta meningkatkan \r\nkewaspadaan.', 90, 15, 'y', 'y', NULL, NULL),
(7, 1, 1, 'Public', 'Ini Judul Dari materi yang telah di Posting', '7-ini-judul-dari-materi-yang-telah-di-posting', '2023-05-01 00:30:00', '2023/10/20231003/651b8568c2448.JPG', '<p>Namun demikian, dinamika perekonomian global dengan berbagai potensi \r\nrisikonya menciptakan tantangan bagi perekonomian dan sektor keuangan \r\ndomestik. Beberapa sumber risiko dari global yang terus dicermati yaitu \r\ntingkat inflasi yang masih persisten tinggi, suku bunga yang cederung \r\ntinggi, intenfisikasi perang di Ukraina, <em>geoeconomics fragmentation, debt distress, </em>termasuk\r\n volatilitas di sektor keuangan. Sebagai langkah antisipatif atas \r\nberbagai dinamika global tersebut. APBN terus bekerja keras untuk \r\nmenjaga pemulihan ekonomi dan melindungi masyarakat. Di saat yang \r\nbersamaan, Pemerintah akan terus melakukan asesmen terhadap dampak \r\ndinamika global terhadap perekonomian domestik serta meningkatkan \r\nkewaspadaan.</p>', 40, 109, 'y', 'y', NULL, NULL),
(8, 1, 4, 'Private', 'Belajar Laravel 8 - Pemula Bagian 2', '8-belajar-laravel-8-pemula-bagian-2', '2023-05-31 00:30:00', '2023/10/20231003/651b856e9531d.JPG', 'Namun demikian, dinamika perekonomian global dengan berbagai potensi \r\nrisikonya menciptakan tantangan bagi perekonomian dan sektor keuangan \r\ndomestik. Beberapa sumber risiko dari global yang terus dicermati yaitu \r\ntingkat inflasi yang masih persisten tinggi, suku bunga yang cederung \r\ntinggi, intenfisikasi perang di Ukraina, <em>geoeconomics fragmentation, debt distress, </em>termasuk\r\n volatilitas di sektor keuangan. Sebagai langkah antisipatif atas \r\nberbagai dinamika global tersebut. APBN terus bekerja keras untuk \r\nmenjaga pemulihan ekonomi dan melindungi masyarakat. Di saat yang \r\nbersamaan, Pemerintah akan terus melakukan asesmen terhadap dampak \r\ndinamika global terhadap perekonomian domestik serta meningkatkan \r\nkewaspadaan.', 23, 35, 'y', 'y', NULL, NULL),
(9, 1, 1, 'Public', 'Modul Pemberitahuan Pabean Kawasan Ekonomi Khusus (PPKEK)', '9-modul-pemberitahuan-pabean-kawasan-ekonomi-khusus-ppkek', '2023-02-10 00:00:00', '2023/10/20231003/651b85743756f.JPG', '<p><strong>Kawasan ekonomi khusus</strong>&nbsp;(KEK) adalah suatu kawasan dengan batas tertentu yang tercangkup dalam&nbsp;<a title=\"Daerah\" href=\"https://id.wikipedia.org/wiki/Daerah\" data-mce-href=\"https://id.wikipedia.org/wiki/Daerah\">daerah</a>&nbsp;atau&nbsp;<a title=\"Wilayah\" href=\"https://id.wikipedia.org/wiki/Wilayah\" data-mce-href=\"https://id.wikipedia.org/wiki/Wilayah\">wilayah</a>&nbsp;untuk menyelenggarakan fungsi perekonomian dan memperoleh fasilitas tertentu.<sup id=\"cite_ref-1\" class=\"reference\"></sup></p><p>KEK\r\n dikembangkan melalui penyiapan kawasan yang memiliki keunggulan \r\ngeoekonomi dan geostrategi dan berfungsi untuk menampung kegiatan \r\nindustri, ekspor, impor, dan kegiatan&nbsp;<a title=\"Ekonomi\" href=\"https://id.wikipedia.org/wiki/Ekonomi\" data-mce-href=\"https://id.wikipedia.org/wiki/Ekonomi\">ekonomi</a>&nbsp;lain yang memiliki nilai ekonomi tinggi dan daya saing internasional.</p><p>Sistem\r\n Indonesia National Single Window (SINSW) adalah Sistem &nbsp;elektronik yang\r\n &nbsp;terintegrasi &nbsp;secara &nbsp;nasional, &nbsp;yang &nbsp;dapat &nbsp;diakses melalui \r\n&nbsp;jaringan internet &nbsp;(public network), &nbsp;yang &nbsp;akan melakukan &nbsp;integrasi \r\n&nbsp;informasi &nbsp;berkaitan dengan &nbsp;proses &nbsp;penanganan dokumen kepabeanan &nbsp;dan\r\n &nbsp;dokumen &nbsp;lain &nbsp;yang terkait dengan ekspor-impor, &nbsp;yang &nbsp;menjamin \r\n&nbsp;keamanan &nbsp;data &nbsp;dan informasi serta memadukan alur dan proses informasi\r\n antar sistem internal secara otomatis, yang meliputi sistem kepabeanan,\r\n perizinan, kepelabuhanan/kebandarudaraan, dan sistem lain yang terkait \r\ndengan proses pelayanan dan pengawasan kegiatan ekspor impor.</p><p>Modul\r\n SINSW pada Sistem Aplikasi KEK terdiri atas Profil KEK, Pemberitahuan \r\nJasa KEK (PJKEK), Masterlist, Pemberitahuan Pabean KEK (PPKEK), Free \r\nMovement, dan IT Inventory. <br></p><p></p>', 40, 28, 'y', 'y', NULL, NULL),
(10, 1, 1, 'Public', 'Laporan Ekonomi dan Keuangan Mingguan - 25 September s.d. 1 Oktober 2023', '10-laporan-ekonomi-dan-keuangan-mingguan-25-september-sd-1-oktober-2023', '2023-03-10 00:00:00', '2023/10/20231004/651cd8c61a8f2.JPG', '<p style=\"text-align: justify;\" data-mce-style=\"text-align: justify;\"><em>Highlight </em>Laporan Ekonomi dan Keuangan Mingguan periode 25 September s.d. 1 Oktober 2023</p><ul><li style=\"text-align: justify;\" data-mce-style=\"text-align: justify;\">Indeks saham global mayoritas ditutup melemah di tengah kekhawatiran terhadap krisis utang di AS dan kebijakan suku bunga yang <em>higher for longer</em>.</li><li style=\"text-align: justify;\" data-mce-style=\"text-align: justify;\">Yield\r\n US Treasury naik di tengah risiko krisis utang Pemerintah AS. Sementara\r\n itu, indeks Dolar AS ditutup menguat dalam sepekan, merespon arah \r\nkebijakan the Fed ke depan.</li><li style=\"text-align: justify;\" data-mce-style=\"text-align: justify;\">Mayoritas harga komoditas utama dunia menguat di tengah prospek pasokan yang ketat.</li><li style=\"text-align: justify;\" data-mce-style=\"text-align: justify;\">Di\r\n pasar keuangan domestik, IHSG melemah 1,10% (wow), yield SUN seri \r\nbenchmark bergerak naik antara 7 hingga 20 bps apabila dibandingkan \r\ndengan pekan sebelumnya, dan nilai tukar Rupiah melemah sebesar 0,52%.</li><li style=\"text-align: justify;\" data-mce-style=\"text-align: justify;\">Rilis\r\n pertumbuhan ekonomi negara maju menunjukkan hasil beragam. Dari dalam \r\nnegeri, likuiditas perekonomian terpantau masih tumbuh positif, tecermin\r\n dari tren uang beredar (M2) yang terus tumbuh pada bulan Agustus 2023.</li></ul><p></p>', 22, 17, 'y', 'y', NULL, NULL),
(11, 1, 1, 'Public', 'Analisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker d', '11-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-d', '2023-03-10 00:00:00', '2023/10/20231006/651f655249ecd.JPG', '<p>Analisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker dAnalisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker dAnalisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker dAnalisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker dAnalisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker dAnalisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker dAnalisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker dAnalisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker dAnalisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker dAnalisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker dAnalisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker dAnalisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker d<br></p>', 22, 19, 'y', 'y', NULL, NULL),
(14, 1, 3, 'Public', 'Investasi dalam Sekuritas', '14-investasi-dalam-sekuritas', '2023-03-10 00:00:00', '2023/10/20231006/651f684b68cb3.png', '<p>Video Investasi dalam Sekuritas ini merupakan Seri 1 dari 8 Video \r\nyang membahas tentang Investasi dalam sekuritas (hutang dan saham).</p><p>dalam Video ini dijelaskan mengenai:</p><ol><li>Alasan Berinvestasi:&nbsp; 3 alasan umum suatu perusahaan melakukan investasi adalah<ul><li>kelebihan kas</li><li>memperoleh pendapatan</li><li>strategi bisnis</li></ul></li><li>Jenis-Jenis Investasi dalam sekuritas<ol style=\"list-style-type: lower-alpha;\" data-mce-style=\"list-style-type: lower-alpha;\"><li>Investasi dalam surat hutang (debt Investment)<ul><li>Debt Investment -Trading</li><li>Debt Investment - Held For Collection (HFC)<ul style=\"list-style-type: circle;\" data-mce-style=\"list-style-type: circle;\"><li>Debt Investment - Held For Collection at par</li><li>Debt Investment -&nbsp;Held For Collection at Discount</li><li>Debt Investment -&nbsp;Held For Collection at Premium</li></ul></li><li>Debt Investment - Held For Collection and Selling</li></ul></li><li>Investasi dalam surat saham (share Investment)<ul><li>Share Investment - Trading</li><li>Share Investment - Non Trading</li><li>Share Investment - Equity Method</li><li>Share Investment - Consolidated</li></ul></li></ol></li></ol><p></p>', 7, 39, 'y', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_activity`
--

CREATE TABLE `pengetahuan_activity` (
  `paId` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `paType` enum('','read','comment','like','pin') NOT NULL,
  `paIP` varchar(255) NOT NULL,
  `paModule` varchar(255) DEFAULT NULL,
  `refId` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengetahuan_activity`
--

INSERT INTO `pengetahuan_activity` (`paId`, `id_user`, `paType`, `paIP`, `paModule`, `refId`, `created_at`, `updated_at`) VALUES
(1, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 02:11:48', NULL),
(2, 5, 'read', '', 'materi', '2-pawan-publikasi-perbendaharaan-dan-analisis-ekonomi-wilayah-kppn-ketapang-edisi-ii', '2023-09-12 02:12:35', NULL),
(4, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 02:17:03', NULL),
(5, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 02:17:42', NULL),
(6, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 02:37:32', NULL),
(7, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 21:33:43', NULL),
(8, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 21:38:26', NULL),
(9, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 21:40:35', NULL),
(10, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 21:49:17', NULL),
(11, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 21:49:52', NULL),
(12, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 21:50:42', NULL),
(13, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 21:51:52', NULL),
(14, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 21:53:11', NULL),
(15, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-12 21:54:11', NULL),
(16, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-13 00:10:06', NULL),
(17, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-13 00:21:43', NULL),
(18, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-13 00:22:16', NULL),
(19, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-13 00:23:21', NULL),
(20, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-14 19:14:27', NULL),
(21, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-17 19:28:20', NULL),
(22, 5, 'read', '', 'materi', '8-judulnya', '2023-09-17 20:26:08', NULL),
(23, 5, 'read', '', 'materi', '7-judulnya', '2023-09-17 20:26:09', NULL),
(24, 5, 'read', '', 'materi', '6-judul', '2023-09-17 20:26:10', NULL),
(25, 5, 'read', '', 'materi', '5-belajar-laravel-pemula', '2023-09-17 20:26:13', NULL),
(26, 5, 'read', '', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-09-17 20:26:14', NULL),
(27, 5, 'read', '', 'materi', '2-pawan-publikasi-perbendaharaan-dan-analisis-ekonomi-wilayah-kppn-ketapang-edisi-ii', '2023-09-17 20:26:15', NULL),
(28, 5, 'read', '', 'materi', '4-laporan-ekonomi-dan-keuangan-mingguan-21sd-27-agustus-2023', '2023-09-17 20:26:18', NULL),
(29, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-17 20:44:28', NULL),
(30, 5, 'read', '', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-09-18 00:50:59', NULL),
(31, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-18 18:51:03', NULL),
(32, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-18 21:15:23', NULL),
(33, 5, 'read', '', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-19 02:36:08', NULL),
(34, 5, 'read', '', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-09-19 02:41:50', NULL),
(35, 5, 'read', '', 'materi', '5-belajar-laravel-pemula', '2023-09-19 02:54:46', NULL),
(36, 5, 'read', '', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-09-19 02:57:20', NULL),
(37, 5, 'read', '', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-09-19 19:04:58', NULL),
(39, 5, 'read', '127.0.0.1', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-09-20 02:26:54', NULL),
(40, 5, 'read', '127.0.0.1', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-20 02:32:11', NULL),
(41, 5, 'read', '127.0.0.1', 'materi', '5-belajar-laravel-pemula', '2023-09-20 03:15:39', NULL),
(42, 5, 'read', '127.0.0.1', 'materi', '8-judulnya', '2023-09-20 04:22:05', NULL),
(43, 5, 'read', '127.0.0.1', 'materi', '7-judulnya', '2023-09-20 04:22:06', NULL),
(44, 5, 'read', '127.0.0.1', 'materi', '6-judul', '2023-09-20 04:22:07', NULL),
(45, 5, 'read', '127.0.0.1', 'materi', '4-laporan-ekonomi-dan-keuangan-mingguan-21sd-27-agustus-2023', '2023-09-20 04:22:08', NULL),
(46, 5, 'read', '127.0.0.1', 'materi', '2-pawan-publikasi-perbendaharaan-dan-analisis-ekonomi-wilayah-kppn-ketapang-edisi-ii', '2023-09-20 04:22:09', NULL),
(47, 5, 'read', '127.0.0.1', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-21 00:11:16', NULL),
(48, 5, 'read', '127.0.0.1', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-24 19:35:46', NULL),
(49, 5, 'read', '127.0.0.1', 'materi', '6-judul', '2023-09-24 19:37:24', NULL),
(50, 5, 'read', '127.0.0.1', 'materi', '2-pawan-publikasi-perbendaharaan-dan-analisis-ekonomi-wilayah-kppn-ketapang-edisi-ii', '2023-09-24 19:37:33', NULL),
(51, 5, 'read', '127.0.0.1', 'materi', '7-judulnya', '2023-09-25 00:45:30', NULL),
(52, 5, 'read', '127.0.0.1', 'materi', '7-judulnya', '2023-09-26 07:37:12', NULL),
(53, 5, 'read', '127.0.0.1', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-26 08:45:42', NULL),
(54, 5, 'read', '127.0.0.1', 'materi', '8-judulnya', '2023-09-26 09:04:05', NULL),
(55, 5, 'read', '127.0.0.1', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-09-26 09:11:50', NULL),
(56, 5, 'read', '127.0.0.1', 'materi', '5-belajar-laravel-pemula', '2023-09-26 09:11:51', NULL),
(57, 5, 'read', '127.0.0.1', 'materi', '2-pawan-publikasi-perbendaharaan-dan-analisis-ekonomi-wilayah-kppn-ketapang-edisi-ii', '2023-09-26 09:11:53', NULL),
(58, 5, 'read', '127.0.0.1', 'materi', '2-pawan-publikasi-perbendaharaan-dan-analisis-ekonomi-wilayah-kppn-ketapang-edisi-ii', '2023-09-27 02:02:46', NULL),
(59, 5, 'read', '127.0.0.1', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-27 02:03:46', NULL),
(60, 5, 'read', '127.0.0.1', 'materi', '7-judulnya', '2023-09-27 02:26:40', NULL),
(61, 5, 'read', '127.0.0.1', 'materi', '8-judulnya', '2023-09-27 07:44:07', NULL),
(62, 5, 'read', '127.0.0.1', 'materi', '5-belajar-laravel-pemula', '2023-09-27 08:16:16', NULL),
(63, 5, 'read', '127.0.0.1', 'materi', '8-judulnya', '2023-09-29 02:09:37', NULL),
(64, 5, 'read', '127.0.0.1', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-09-29 02:34:13', NULL),
(65, 5, 'read', '127.0.0.1', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-09-29 02:35:57', NULL),
(66, 5, 'read', '127.0.0.1', 'materi', '2-pawan-publikasi-perbendaharaan-dan-analisis-ekonomi-wilayah-kppn-ketapang-edisi-ii', '2023-09-29 03:34:46', NULL),
(67, 5, 'read', '127.0.0.1', 'materi', '5-belajar-laravel-pemula', '2023-09-29 06:54:03', NULL),
(68, 5, 'read', '127.0.0.1', 'materi', '6-judul', '2023-09-29 06:54:05', NULL),
(69, 5, 'read', '127.0.0.1', 'materi', '7-judulnya', '2023-09-29 06:54:07', NULL),
(70, 5, 'read', '127.0.0.1', 'materi', '4-laporan-ekonomi-dan-keuangan-mingguan-21sd-27-agustus-2023', '2023-09-29 06:59:38', NULL),
(71, 5, 'read', '127.0.0.1', 'materi', '4-laporan-ekonomi-dan-keuangan-mingguan-21sd-27-agustus-2023', '2023-10-01 09:26:38', NULL),
(72, 5, 'read', '127.0.0.1', 'materi', '6-judul', '2023-10-02 01:28:40', NULL),
(73, 5, 'read', '127.0.0.1', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-10-02 02:36:38', NULL),
(74, 5, 'read', '127.0.0.1', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-10-02 07:16:22', NULL),
(75, 5, 'read', '127.0.0.1', 'materi', '10-tambah-modul-pemberitahuan-pabean-kawasan-ekonomi-khusus-ppkek', '2023-10-03 03:16:06', NULL),
(76, 5, 'read', '127.0.0.1', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-10-03 04:20:45', NULL),
(77, 5, 'read', '127.0.0.1', 'materi', '6-judul-lain-yang-telah-di-posting-untuk-latihan', '2023-10-04 03:13:58', NULL),
(78, 5, 'read', '127.0.0.1', 'materi', '10-laporan-ekonomi-dan-keuangan-mingguan-25-september-sd-1-oktober-2023', '2023-10-04 03:15:29', NULL),
(79, 5, 'read', '127.0.0.1', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-10-04 04:10:28', NULL),
(80, 5, 'read', '127.0.0.1', 'materi', '5-belajar-laravel-pemula', '2023-10-04 04:10:48', NULL),
(81, 5, 'read', '127.0.0.1', 'materi', '2-pawan-publikasi-perbendaharaan-dan-analisis-ekonomi-wilayah-kppn-ketapang-edisi-ii-ini-tambahan-nama-judul-boar-panjang', '2023-10-05 01:43:16', NULL),
(82, 5, 'read', '127.0.0.1', 'materi', '9-modul-pemberitahuan-pabean-kawasan-ekonomi-khusus-ppkek', '2023-10-05 02:08:02', NULL),
(83, 5, 'read', '127.0.0.1', 'materi', '10-laporan-ekonomi-dan-keuangan-mingguan-25-september-sd-1-oktober-2023', '2023-10-05 02:32:40', NULL),
(84, 5, 'read', '127.0.0.1', 'materi', '6-judul-lain-yang-telah-di-posting-untuk-latihan', '2023-10-05 02:42:05', NULL),
(85, 5, 'read', '127.0.0.1', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-10-05 03:02:21', NULL),
(86, 5, 'read', '127.0.0.1', 'materi', '7-ini-judul-dari-materi-yang-telah-di-posting', '2023-10-05 03:02:28', NULL),
(87, 5, 'read', '127.0.0.1', 'materi', '5-belajar-laravel-pemula', '2023-10-05 07:07:08', NULL),
(88, 5, 'read', '127.0.0.1', 'materi', '4-laporan-ekonomi-dan-keuangan-mingguan-21sd-27-agustus-2023', '2023-10-05 07:11:00', NULL),
(89, 5, 'read', '127.0.0.1', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-10-05 09:21:45', NULL),
(90, 5, 'read', '127.0.0.1', 'materi', '14-investasi-dalam-sekuritas', '2023-10-06 01:53:09', NULL),
(91, 5, 'read', '127.0.0.1', 'materi', '1-internal-auditing-assurance-advisory-services-resume-dan-slide', '2023-10-06 02:01:44', NULL),
(92, 5, 'read', '127.0.0.1', 'materi', '11-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-d', '2023-10-06 02:48:47', NULL),
(93, 5, 'read', '127.0.0.1', 'materi', '9-modul-pemberitahuan-pabean-kawasan-ekonomi-khusus-ppkek', '2023-10-06 03:46:45', NULL),
(94, 5, 'read', '127.0.0.1', 'materi', '3-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', '2023-10-06 03:51:31', NULL),
(95, 5, 'read', '127.0.0.1', 'materi', '10-laporan-ekonomi-dan-keuangan-mingguan-25-september-sd-1-oktober-2023', '2023-10-06 04:21:56', NULL),
(96, 5, 'read', '127.0.0.1', 'materi', '6-judul-lain-yang-telah-di-posting-untuk-latihan', '2023-10-06 04:21:59', NULL),
(97, 5, 'read', '127.0.0.1', 'materi', '7-ini-judul-dari-materi-yang-telah-di-posting', '2023-10-06 04:21:59', NULL),
(98, 5, 'read', '127.0.0.1', 'materi', '8-belajar-laravel-8-pemula-bagian-2', '2023-10-06 04:22:01', NULL),
(99, 5, 'read', '127.0.0.1', 'materi', '2-pawan-publikasi-perbendaharaan-dan-analisis-ekonomi-wilayah-kppn-ketapang-edisi-ii-ini-tambahan-nama-judul-boar-panjang', '2023-10-06 04:22:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_category`
--

CREATE TABLE `pengetahuan_category` (
  `catId` int(10) UNSIGNED NOT NULL,
  `catName` varchar(255) NOT NULL,
  `catShort` varchar(4) NOT NULL,
  `catPermalink` varchar(255) NOT NULL,
  `catDescription` tinytext NOT NULL,
  `catImage` varchar(255) NOT NULL,
  `catStatus` enum('y','n') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengetahuan_category`
--

INSERT INTO `pengetahuan_category` (`catId`, `catName`, `catShort`, `catPermalink`, `catDescription`, `catImage`, `catStatus`, `created_at`, `updated_at`) VALUES
(1, 'Kepegawaian', '', 'kepegawaian', 'lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum', '2023/10/20231003/651bcb8a3bb0e.JPG', 'y', NULL, NULL),
(2, 'Pendidikan', '', 'pendidikan', '<p>lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore \r\nipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum \r\nlore ipsum</p>', '2023/10/20231003/651bcba293700.JPG', 'y', NULL, NULL),
(3, 'Pelatihan', '', 'pelatihan', '<p>lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore \r\nipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum lore ipsum \r\nlore ipsu</p>', '2023/10/20231003/651bcb852e343.png', 'y', NULL, NULL),
(4, 'Mutasi dan Informasi', '', 'mutasi-dan-informasi', 'Mutasi dan Informasi Mutasi dan Informasi Mutasi dan Informasi Mutasi dan Informasi Mutasi dan Informasi Mutasi dan Informasi Mutasi dan Informasi Mutasi dan Informasi Mutasi dan Informasi Mutasi dan Informasi<br>', '2023/10/20231003/651bcb98d75c8.JPG', 'y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_comment`
--

CREATE TABLE `pengetahuan_comment` (
  `cmId` int(10) UNSIGNED NOT NULL,
  `cmPermalink` varchar(255) NOT NULL,
  `pgId` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cmParent` int(11) NOT NULL,
  `cmComment` tinytext NOT NULL,
  `cmAddedDate` datetime NOT NULL,
  `cmDisplay` enum('y','n') NOT NULL,
  `cmSort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengetahuan_comment`
--

INSERT INTO `pengetahuan_comment` (`cmId`, `cmPermalink`, `pgId`, `id_user`, `cmParent`, `cmComment`, `cmAddedDate`, `cmDisplay`, `cmSort`, `created_at`, `updated_at`) VALUES
(1, '1-356a192b7913b04c54574d18c28d46e6395428ab', 1, 5, 0, '<p><em>Highlight </em>Laporan Ekonomi dan Keuangan Mingguan periode 25 September s.d. 1 Oktober 2023</p>', '2023-10-06 09:03:29', 'y', 0, '2023-10-06 02:03:29', NULL),
(2, '2-da4b9237bacccdf19c0760cab7aec4a8359010b0', 1, 5, 1, 'Highlight Laporan Ekonomi dan Keuangan Mingguan periode 25 September s.d. 1 Oktober 2023', '2023-10-06 09:03:40', 'y', 1, '2023-10-06 02:03:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_content`
--

CREATE TABLE `pengetahuan_content` (
  `pcId` int(10) UNSIGNED NOT NULL,
  `pgId` int(11) NOT NULL,
  `pcTitle` varchar(255) DEFAULT NULL,
  `pcPermalink` varchar(255) DEFAULT NULL,
  `pcContentType` enum('text','document','video') NOT NULL,
  `pcText` longtext DEFAULT NULL,
  `pcVideo` varchar(255) DEFAULT NULL,
  `pcDocuments` varchar(255) DEFAULT NULL,
  `pcDuration` int(11) NOT NULL,
  `pcSort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengetahuan_content`
--

INSERT INTO `pengetahuan_content` (`pcId`, `pgId`, `pcTitle`, `pcPermalink`, `pcContentType`, `pcText`, `pcVideo`, `pcDocuments`, `pcDuration`, `pcSort`, `created_at`, `updated_at`) VALUES
(2, 2, 'dua', '2-dua', 'document', NULL, NULL, '2023/09/20230906/64f7e0fad6433.pdf', 30, 1, NULL, NULL),
(3, 3, 'Analisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker di Lingkup Kanwil DJPb Provinsi DKI Jakarta Tahun 2022', '33-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-di-lingkup-kanwil-djpb-provinsi-dki-jakarta-tahun-2022', 'document', NULL, NULL, '2023/10/20231006/651f66605e171.pdf', 40, 1, NULL, NULL),
(4, 4, 'empat', '33-empat', 'document', NULL, NULL, '2023/10/20231006/651f668ece788.pdf', 40, 1, NULL, NULL),
(5, 5, 'lima', '33-lima', 'video', NULL, '2023/10/20231006/651f66cfbcc95.mp4', NULL, 90, 1, NULL, NULL),
(6, 6, 'enam', '33-enam', 'document', NULL, NULL, '2023/10/20231006/651f66e43708d.pdf', 90, 1, NULL, NULL),
(7, 7, 'tujuh', '7-tujuh', 'text', '<p>Menurut PMK No. 226 Tahun 2019, terdapat 6 proses dalam penyusunan manajemen pengetahuan yaitu:\n\n    Identifikasi, menentukan Pengetahuan yang akan didokumentasikan sebagai Aset Intelektual​\n    Dokumentasi, kegiatan pendokumentasian pengetahuan (knowledge capture) untuk menghasilkan Aset Intelektual\n    Pengorganisasian, kategorisasi dan penjaminan mutu Aset Intelektual agar sesuai dengan standar dan mudah diakses​\n    Penyebarluasan, penyediaan Aset Intelektual pada laman antar muka Software KMS untuk dapat diakses oleh Pengguna Software KMS​\n    Penerapan, kegiatan pengaplikasian atau pemanfaatan Aset Intelektual oleh Pengguna Software KMS untuk mendukung pelaksanaan tugas dan fungsi​\n    Pemantauan, memastikan kesesuaian Aset Intelektual yang terdapat dalam Software KMS dengan kebutuhan Pengguna Software KMS\n\nPada materi ini akan dibahas tentang bagaimana standar teknis pengendalian mutu dokumen pengetahuan untuk memastikan bahwa dokumen pengetahuan yang disusun sesuai dengan tujuan yang diharapkan.<br></p>', NULL, NULL, 30, 1, NULL, NULL),
(8, 8, 'delapan', '8-delapan', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL),
(9, 3, 'materi 2', '9-sembilan', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL),
(10, 3, 'materi 3', '33-materi-3', 'document', NULL, NULL, '2023/10/20231006/651f666a4a495.pdf', 123, 1, NULL, NULL),
(11, 3, 'materi 4', '11-aa', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL),
(12, 3, 'materi 5', '33-materi-5', 'video', NULL, '2023/10/20231006/651f667621c65.mp4', NULL, 123, 1, NULL, NULL),
(13, 3, 'materi 6', '13-dasd', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL),
(14, 3, 'materi 7', '14-asd', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL),
(15, 3, 'materi 8', '15-ad', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL);
INSERT INTO `pengetahuan_content` (`pcId`, `pgId`, `pcTitle`, `pcPermalink`, `pcContentType`, `pcText`, `pcVideo`, `pcDocuments`, `pcDuration`, `pcSort`, `created_at`, `updated_at`) VALUES
(16, 3, 'materi 9', '16-asd', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL),
(17, 3, 'materi 10', '17-asda', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL),
(18, 3, 'materi 11', '18-asd', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL),
(19, 3, 'materi 12', '19-adasd', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL),
(20, 3, 'materi 13', '20-asdasd', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL),
(21, 3, 'materi 14', '21-asdad', 'text', '<p>123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><hr><p><br></p><p>123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123123123 123123123 123123123 123123123 123123123 \r\n123123123 123123123 123</p><p></p><p></p><p></p><p></p><p></p>', NULL, NULL, 123, 1, NULL, NULL),
(22, 9, 'Mod', '33-mod', 'document', NULL, NULL, '2023/10/20231006/651f66f9961cc.pdf', 45, 1, NULL, NULL),
(27, 1, 'ini tambahan materi ya', '31-ini-tambahan-materi-ya', 'text', '<p>Memberikan pemahaman kepada sobat pembelajar tentang mekanisme perubahan Maksimum Pencairan<br>PNBP,Mekanisme\r\n Percepatan Batasan Waktu Pengajuan Maksimum Pencairan. Terakhir ditutup\r\n dengan Simulasi Perhitungan Percepatan Penetapan Maksimum Pencairan \r\nPNBP dengan contoh Percepatan Maksimum Pencairan PNBP untuk Tahap II dan\r\n Tahap III.</p><p>Video knowledge capture ini didasarkan pada&nbsp;PMK-110 \r\nTahun 2021 Tata Cara Penetapan Maksimum Pencairan Penerimaan Negara \r\nBukan Pajak yang mana tujuan peraturan ini adalah untuk percepatan \r\nrealisasi belanja kementerian negara/lembaga yang sumber dananya berasal\r\n dari penerimaan negara bukan paj ak dan modernisasi<br>pelaksanaan \r\nanggaran, perlu melakukan optimalisasi penggunaan sistem teknologi dan \r\ninformasi dan simplifikasi proses dalam penetapan maksimum pencairan \r\npenerimaan negara bukan pajak.</p><p><br></p><p>Memberikan pemahaman kepada sobat pembelajar tentang mekanisme perubahan Maksimum Pencairan<br>PNBP,Mekanisme\r\n Percepatan Batasan Waktu Pengajuan Maksimum Pencairan. Terakhir ditutup\r\n dengan Simulasi Perhitungan Percepatan Penetapan Maksimum Pencairan \r\nPNBP dengan contoh Percepatan Maksimum Pencairan PNBP untuk Tahap II dan\r\n Tahap III.</p><p>Video knowledge capture ini didasarkan pada&nbsp;PMK-110 \r\nTahun 2021 Tata Cara Penetapan Maksimum Pencairan Penerimaan Negara \r\nBukan Pajak yang mana tujuan peraturan ini adalah untuk percepatan \r\nrealisasi belanja kementerian negara/lembaga yang sumber dananya berasal\r\n dari penerimaan negara bukan paj ak dan modernisasi<br>pelaksanaan \r\nanggaran, perlu melakukan optimalisasi penggunaan sistem teknologi dan \r\ninformasi dan simplifikasi proses dalam penetapan maksimum pencairan \r\npenerimaan negara bukan pajak.</p><p><br></p><p>Memberikan pemahaman kepada sobat pembelajar tentang mekanisme perubahan Maksimum Pencairan<br>PNBP,Mekanisme\r\n Percepatan Batasan Waktu Pengajuan Maksimum Pencairan. Terakhir ditutup\r\n dengan Simulasi Perhitungan Percepatan Penetapan Maksimum Pencairan \r\nPNBP dengan contoh Percepatan Maksimum Pencairan PNBP untuk Tahap II dan\r\n Tahap III.</p><p>Video knowledge capture ini didasarkan pada&nbsp;PMK-110 \r\nTahun 2021 Tata Cara Penetapan Maksimum Pencairan Penerimaan Negara \r\nBukan Pajak yang mana tujuan peraturan ini adalah untuk percepatan \r\nrealisasi belanja kementerian negara/lembaga yang sumber dananya berasal\r\n dari penerimaan negara bukan paj ak dan modernisasi<br>pelaksanaan \r\nanggaran, perlu melakukan optimalisasi penggunaan sistem teknologi dan \r\ninformasi dan simplifikasi proses dalam penetapan maksimum pencairan \r\npenerimaan negara bukan pajak.</p><p></p><p></p>', NULL, NULL, 22, 3, NULL, NULL),
(29, 1, 'aan untuk mengecek dan mencari kesalahan pekerjaan orang lain. Pada kenyataannya, audit internal adalah pekerjaan yang', '31-aan-untuk-mengecek-dan-mencari-kesalahan-pekerjaan-orang-lain-pada-kenyataannya-audit-internal-adalah-pekerjaan-yang', 'text', '<p>Memberikan pemahaman kepada sobat pembelajar tentang mekanisme perubahan Maksimum Pencairan<br>PNBP,Mekanisme\r\n Percepatan Batasan Waktu Pengajuan Maksimum Pencairan. Terakhir ditutup\r\n dengan Simulasi Perhitungan Percepatan Penetapan Maksimum Pencairan \r\nPNBP dengan contoh Percepatan Maksimum Pencairan PNBP untuk Tahap II dan\r\n Tahap III.</p><p>Video knowledge capture ini didasarkan pada&nbsp;PMK-110 \r\nTahun 2021 Tata Cara Penetapan Maksimum Pencairan Penerimaan Negara \r\nBukan Pajak yang mana tujuan peraturan ini adalah untuk percepatan \r\nrealisasi belanja kementerian negara/lembaga yang sumber dananya berasal\r\n dari penerimaan negara bukan paj ak dan modernisasi<br>pelaksanaan \r\nanggaran, perlu melakukan optimalisasi penggunaan sistem teknologi dan \r\ninformasi dan simplifikasi proses dalam penetapan maksimum pencairan \r\npenerimaan negara bukan pajak.</p><p>Memberikan pemahaman kepada sobat pembelajar tentang mekanisme perubahan Maksimum Pencairan<br>PNBP,Mekanisme\r\n Percepatan Batasan Waktu Pengajuan Maksimum Pencairan. Terakhir ditutup\r\n dengan Simulasi Perhitungan Percepatan Penetapan Maksimum Pencairan \r\nPNBP dengan contoh Percepatan Maksimum Pencairan PNBP untuk Tahap II dan\r\n Tahap III.</p><p>Video knowledge capture ini didasarkan pada&nbsp;PMK-110 \r\nTahun 2021 Tata Cara Penetapan Maksimum Pencairan Penerimaan Negara \r\nBukan Pajak yang mana tujuan peraturan ini adalah untuk percepatan \r\nrealisasi belanja kementerian negara/lembaga yang sumber dananya berasal\r\n dari penerimaan negara bukan paj ak dan modernisasi<br>pelaksanaan \r\nanggaran, perlu melakukan optimalisasi penggunaan sistem teknologi dan \r\ninformasi dan simplifikasi proses dalam penetapan maksimum pencairan \r\npenerimaan negara bukan pajak.</p><p></p>', NULL, NULL, 123, 5, NULL, NULL),
(30, 10, 'aan untuk mengecek dan mencari kesalahan pekerjaan orang lain. Pada kenyataannya, audit internal adalah pekerjaan yang', '30-aan-untuk-mengecek-dan-mencari-kesalahan-pekerjaan-orang-lain-pada-kenyataannya-audit-internal-adalah-pekerjaan-yang', 'document', NULL, NULL, '2023/10/20231004/651cd8c623af7.pdf', 22, 1, NULL, NULL);
INSERT INTO `pengetahuan_content` (`pcId`, `pgId`, `pcTitle`, `pcPermalink`, `pcContentType`, `pcText`, `pcVideo`, `pcDocuments`, `pcDuration`, `pcSort`, `created_at`, `updated_at`) VALUES
(31, 3, 'Analisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker d', '33-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-d', 'document', NULL, NULL, '2023/10/20231006/651f668043ae4.pdf', 22, 2, NULL, NULL),
(32, 11, 'aan untuk mengecek dan mencari kesalahan pekerjaan orang lain. Pada kenyataannya, audit internal adalah pekerjaan yang', '32-aan-untuk-mengecek-dan-mencari-kesalahan-pekerjaan-orang-lain-pada-kenyataannya-audit-internal-adalah-pekerjaan-yang', 'document', NULL, NULL, '2023/10/20231006/651f65524d242.pdf', 22, 1, NULL, NULL),
(33, 14, 'Naruto vs Tomdara', '33-naruto-vs-tomdara', 'video', NULL, '2023/10/20231006/651f684b6b3b1.mp4', NULL, 33, 1, NULL, NULL),
(34, 14, 'Analisis Nilai Deviasi pada Halaman III DIPA Terhadap Capaian IKPA Satker d', '34-analisis-nilai-deviasi-pada-halaman-iii-dipa-terhadap-capaian-ikpa-satker-d', 'document', NULL, NULL, '2023/10/20231006/651f89f549493.pdf', 33, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_highlight`
--

CREATE TABLE `pengetahuan_highlight` (
  `hlId` int(10) UNSIGNED NOT NULL,
  `pgId` int(11) NOT NULL,
  `hlMonth` tinyint(4) NOT NULL,
  `hlYear` int(11) NOT NULL,
  `hlStart` datetime NOT NULL,
  `hlEnd` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_like`
--

CREATE TABLE `pengetahuan_like` (
  `lkId` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `pgId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengetahuan_like`
--

INSERT INTO `pengetahuan_like` (`lkId`, `id_user`, `pgId`, `created_at`, `updated_at`) VALUES
(1, 5, 10, '2023-10-05 07:27:17', NULL),
(2, 5, 6, '2023-10-05 07:27:25', NULL),
(3, 5, 3, '2023-10-05 07:27:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_pinned`
--

CREATE TABLE `pengetahuan_pinned` (
  `pnId` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `pgId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengetahuan_pinned`
--

INSERT INTO `pengetahuan_pinned` (`pnId`, `id_user`, `pgId`, `created_at`, `updated_at`) VALUES
(1, 5, 9, '2023-10-05 07:27:18', NULL),
(2, 5, 5, '2023-10-05 07:27:26', NULL),
(3, 5, 2, '2023-10-05 07:27:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_rating`
--

CREATE TABLE `pengetahuan_rating` (
  `rtId` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `rtRate` enum('1','2','3','4','5') NOT NULL,
  `rtAddedDate` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_read`
--

CREATE TABLE `pengetahuan_read` (
  `prId` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `pgId` int(11) NOT NULL,
  `readContent` tinyint(3) NOT NULL,
  `readActual` tinyint(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengetahuan_read`
--

INSERT INTO `pengetahuan_read` (`prId`, `id_user`, `pgId`, `readContent`, `readActual`, `created_at`, `updated_at`) VALUES
(17, 5, 3, 15, 0, '2023-10-06 04:21:23', NULL),
(18, 5, 9, 1, 0, '2023-10-06 04:21:23', NULL),
(19, 5, 14, 2, 0, '2023-10-06 04:21:55', NULL),
(20, 5, 11, 1, 0, '2023-10-06 04:21:55', NULL),
(21, 5, 10, 1, 0, '2023-10-06 04:21:56', NULL),
(22, 5, 6, 1, 0, '2023-10-06 04:21:59', NULL),
(23, 5, 7, 1, 0, '2023-10-06 04:21:59', NULL),
(24, 5, 8, 1, 0, '2023-10-06 04:22:01', NULL),
(25, 5, 2, 1, 0, '2023-10-06 04:22:16', NULL),
(26, 5, 1, 2, 0, '2023-10-06 07:08:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_readlist`
--

CREATE TABLE `pengetahuan_readlist` (
  `rlId` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `rlTitle` varchar(255) NOT NULL,
  `rlPermalink` varchar(255) NOT NULL,
  `rlDescription` tinytext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengetahuan_readlist`
--

INSERT INTO `pengetahuan_readlist` (`rlId`, `id_user`, `rlTitle`, `rlPermalink`, `rlDescription`, `created_at`, `updated_at`) VALUES
(1, 5, 'BACA_NANTI', '1-baca-nanti', 'Baca Nanti Description', '2023-09-19 02:08:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_readlist_content`
--

CREATE TABLE `pengetahuan_readlist_content` (
  `rlcId` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `rlId` int(11) NOT NULL,
  `pgId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengetahuan_readlist_content`
--

INSERT INTO `pengetahuan_readlist_content` (`rlcId`, `id_user`, `rlId`, `pgId`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 7, '2023-10-05 07:27:20', NULL),
(2, 5, 1, 4, '2023-10-05 07:27:28', NULL),
(3, 5, 1, 1, '2023-10-05 07:27:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_read_content`
--

CREATE TABLE `pengetahuan_read_content` (
  `rcId` int(10) UNSIGNED NOT NULL,
  `prId` int(11) NOT NULL,
  `pcId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'web', '2023-08-31 22:05:23', '2023-08-31 22:05:23'),
(2, 'user', 'web', '2023-08-31 22:05:23', '2023-08-31 22:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Role', 'admin@email.com', NULL, '$2y$10$Lg7//BfJOsKs3s6SQuHsjO/hHPQQs8AW2pj3ytqUjFkrrujYRIbPi', NULL, '2023-08-31 22:05:23', '2023-08-31 22:05:23'),
(2, 'User Role', 'user@email.com', NULL, '$2y$10$kZFaAguKOf6GqlyZEeZKcukixdXdO28coNjuNDHnLJTTHE3XMCnZq', NULL, '2023-08-31 22:05:23', '2023-08-31 22:05:23'),
(3, 'Anya Geraldine', 'info@anyageraldine.com', '2023-09-03 04:16:22', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', NULL, '2023-09-13 04:16:22', '2023-09-06 04:16:22'),
(4, 'Laudya Cynthia Bella', 'laudya@cynthiabella.com', '2023-09-07 04:18:14', 'a3574c1685d2229fe75fde1b14e2ba1a03035db9', NULL, NULL, NULL),
(5, 'Alesha Farzana Rohman', 'arizalnurrohman13@gmail.com', '2023-09-07 04:18:14', 'a3574c1685d2229fe75fde1b14e2ba1a03035db9', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`cuId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hubungi_admin`
--
ALTER TABLE `hubungi_admin`
  ADD PRIMARY KEY (`haId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `ms_pembelajaran`
--
ALTER TABLE `ms_pembelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_pembelajaran_categori`
--
ALTER TABLE `ms_pembelajaran_categori`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `ms_pembelajaran_detail`
--
ALTER TABLE `ms_pembelajaran_detail`
  ADD PRIMARY KEY (`pdId`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`pgId`);

--
-- Indexes for table `pengetahuan_activity`
--
ALTER TABLE `pengetahuan_activity`
  ADD PRIMARY KEY (`paId`);

--
-- Indexes for table `pengetahuan_category`
--
ALTER TABLE `pengetahuan_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `pengetahuan_comment`
--
ALTER TABLE `pengetahuan_comment`
  ADD PRIMARY KEY (`cmId`);

--
-- Indexes for table `pengetahuan_content`
--
ALTER TABLE `pengetahuan_content`
  ADD PRIMARY KEY (`pcId`);

--
-- Indexes for table `pengetahuan_highlight`
--
ALTER TABLE `pengetahuan_highlight`
  ADD PRIMARY KEY (`hlId`);

--
-- Indexes for table `pengetahuan_like`
--
ALTER TABLE `pengetahuan_like`
  ADD PRIMARY KEY (`lkId`);

--
-- Indexes for table `pengetahuan_pinned`
--
ALTER TABLE `pengetahuan_pinned`
  ADD PRIMARY KEY (`pnId`);

--
-- Indexes for table `pengetahuan_rating`
--
ALTER TABLE `pengetahuan_rating`
  ADD PRIMARY KEY (`rtId`);

--
-- Indexes for table `pengetahuan_read`
--
ALTER TABLE `pengetahuan_read`
  ADD PRIMARY KEY (`prId`);

--
-- Indexes for table `pengetahuan_readlist`
--
ALTER TABLE `pengetahuan_readlist`
  ADD PRIMARY KEY (`rlId`);

--
-- Indexes for table `pengetahuan_readlist_content`
--
ALTER TABLE `pengetahuan_readlist_content`
  ADD PRIMARY KEY (`rlcId`);

--
-- Indexes for table `pengetahuan_read_content`
--
ALTER TABLE `pengetahuan_read_content`
  ADD PRIMARY KEY (`rcId`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `cuId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hubungi_admin`
--
ALTER TABLE `hubungi_admin`
  MODIFY `haId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ms_pembelajaran`
--
ALTER TABLE `ms_pembelajaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ms_pembelajaran_categori`
--
ALTER TABLE `ms_pembelajaran_categori`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ms_pembelajaran_detail`
--
ALTER TABLE `ms_pembelajaran_detail`
  MODIFY `pdId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `pgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengetahuan_activity`
--
ALTER TABLE `pengetahuan_activity`
  MODIFY `paId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `pengetahuan_category`
--
ALTER TABLE `pengetahuan_category`
  MODIFY `catId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengetahuan_comment`
--
ALTER TABLE `pengetahuan_comment`
  MODIFY `cmId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengetahuan_content`
--
ALTER TABLE `pengetahuan_content`
  MODIFY `pcId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pengetahuan_highlight`
--
ALTER TABLE `pengetahuan_highlight`
  MODIFY `hlId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengetahuan_like`
--
ALTER TABLE `pengetahuan_like`
  MODIFY `lkId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengetahuan_pinned`
--
ALTER TABLE `pengetahuan_pinned`
  MODIFY `pnId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengetahuan_rating`
--
ALTER TABLE `pengetahuan_rating`
  MODIFY `rtId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengetahuan_read`
--
ALTER TABLE `pengetahuan_read`
  MODIFY `prId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengetahuan_readlist`
--
ALTER TABLE `pengetahuan_readlist`
  MODIFY `rlId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengetahuan_readlist_content`
--
ALTER TABLE `pengetahuan_readlist_content`
  MODIFY `rlcId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengetahuan_read_content`
--
ALTER TABLE `pengetahuan_read_content`
  MODIFY `rcId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
