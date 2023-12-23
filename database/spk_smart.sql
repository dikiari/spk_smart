-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2023 at 03:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `score` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_periode`, `id_karyawan`, `id_kriteria`, `score`) VALUES
(1107, 15, 2, 2, 0.35714285714286),
(1108, 15, 2, 3, 0.14285714285714),
(1109, 15, 2, 9, 0.022222222222222),
(1110, 15, 2, 10, 0),
(1111, 15, 2, 11, 0.1),
(1112, 15, 3, 2, 0.5),
(1113, 15, 3, 3, 0.2),
(1114, 15, 3, 9, 0.1),
(1115, 15, 3, 10, 0.071428571428571),
(1116, 15, 3, 11, 0.04),
(1117, 15, 4, 2, 0),
(1118, 15, 4, 3, 0.14285714285714),
(1119, 15, 4, 9, 0),
(1120, 15, 4, 10, 0.028571428571429),
(1121, 15, 4, 11, 0.1),
(1122, 15, 5, 2, 0.14285714285714),
(1123, 15, 5, 3, 0),
(1124, 15, 5, 9, 0.077777777777778),
(1125, 15, 5, 10, 0),
(1126, 15, 5, 11, 0.04),
(1127, 15, 6, 2, 0),
(1128, 15, 6, 3, 0.14285714285714),
(1129, 15, 6, 9, 0.055555555555556),
(1130, 15, 6, 10, 0.1),
(1131, 15, 6, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` mediumint(8) UNSIGNED NOT NULL,
  `nm_karyawan` varchar(255) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nm_karyawan`, `nik`) VALUES
(2, 'Joel Randolph', '8388607'),
(3, 'Eric Olson', '8388607'),
(4, 'Upton Cervantes', '8388607'),
(5, 'Russell Rasmussen', '8388607'),
(6, 'Aspen Walsh', '8388607'),
(7, 'Henry Fletcher', '8388607'),
(8, 'Faith Pitts', '8388607'),
(9, 'Echo Irwin', '8388607'),
(10, 'Jason Russell', '8388607'),
(11, 'Holmes Mcmillan', '8388607'),
(12, 'Quon Joyner', '8388607'),
(13, 'Tiger Pruitt', '8388607'),
(14, 'Kylan Hale', '8388607'),
(15, 'Clementine Henry', '8388607'),
(16, 'Stephanie Weber', '8388607'),
(17, 'Meghan Serrano', '8388607'),
(18, 'Maggie Knapp', '8388607'),
(19, 'Quinn Randall', '8388607'),
(20, 'Chaney Riggs', '8388607'),
(21, 'Gay Dale', '8388607'),
(22, 'Abra Gilliam', '8388607'),
(23, 'Anthony Carlson', '8388607'),
(24, 'Martha Bowen', '8388607'),
(25, 'Beck Serrano', '8388607'),
(26, 'Uriah Marshall', '8388607'),
(27, 'Samantha Barnett', '8388607'),
(28, 'Kyla Morse', '8388607'),
(29, 'Cyrus Macdonald', '8388607'),
(30, 'Dora Sanford', '8388607'),
(31, 'Gloria Winters', '8388607'),
(32, 'Irene Savage', '8388607'),
(33, 'Basil Gallagher', '8388607'),
(34, 'Kalia Velazquez', '8388607'),
(35, 'Dexter Rivers', '8388607'),
(36, 'Moana Carver', '8388607'),
(37, 'Isadora Davenport', '8388607'),
(38, 'Genevieve Parsons', '8388607'),
(39, 'Kamal Bradshaw', '8388607'),
(40, 'Zeus Blanchard', '8388607'),
(41, 'Chancellor Norton', '8388607'),
(42, 'Cally Castillo', '8388607'),
(43, 'Karen Mcpherson', '8388607'),
(44, 'Constance Cash', '8388607'),
(45, 'Jakeem Ramos', '8388607'),
(46, 'Zane Cohen', '8388607'),
(47, 'Sarah Yang', '8388607'),
(48, 'Avye Ross', '8388607'),
(49, 'Walker Calhoun', '8388607'),
(50, 'Unity Montoya', '8388607'),
(51, 'Camilla Rosario', '8388607'),
(52, 'Freya Rasmussen', '8388607'),
(53, 'Kevyn Fitzgerald', '8388607'),
(54, 'Luke Walton', '8388607'),
(55, 'Galvin Grant', '8388607'),
(56, 'Linus Hardin', '8388607'),
(57, 'Madaline Vaughan', '8388607'),
(58, 'Priscilla Schwartz', '8388607'),
(59, 'Jameson Avery', '8388607'),
(60, 'Adrian Armstrong', '8388607'),
(61, 'Finn Pierce', '8388607'),
(62, 'Clarke Rocha', '8388607'),
(63, 'Myra Soto', '8388607'),
(64, 'Eleanor Cruz', '8388607'),
(65, 'Nelle Hardy', '8388607'),
(66, 'Linus Buck', '8388607'),
(67, 'Noelani Bernard', '8388607'),
(68, 'Madaline Payne', '8388607'),
(69, 'Alan Schneider', '8388607'),
(70, 'Benedict Wynn', '8388607'),
(71, 'Karleigh Frost', '8388607'),
(72, 'Aquila Lyons', '8388607'),
(73, 'Medge Sloan', '8388607'),
(74, 'MacKensie Moon', '8388607'),
(75, 'Roanna Gonzales', '8388607'),
(76, 'Phelan David', '8388607'),
(77, 'Harrison Hood', '8388607'),
(78, 'Adrienne William', '8388607'),
(79, 'Amery Chambers', '8388607'),
(80, 'Jin Harrell', '8388607'),
(81, 'Galvin Rollins', '8388607'),
(82, 'Adam Ramsey', '8388607'),
(83, 'Lionel Schwartz', '8388607'),
(84, 'Desiree Guthrie', '8388607'),
(85, 'Pandora Merritt', '8388607'),
(86, 'Camilla Lester', '8388607'),
(87, 'Cherokee Calderon', '8388607'),
(88, 'Brooke Finch', '8388607'),
(89, 'Hedy English', '8388607'),
(90, 'Alexander Maldonado', '8388607'),
(91, 'Basil Knight', '8388607'),
(92, 'Palmer Hamilton', '8388607'),
(93, 'Brody Fleming', '8388607'),
(94, 'Yuli Noble', '8388607'),
(95, 'Leonard Huffman', '8388607'),
(96, 'David Mcdonald', '8388607'),
(97, 'Hillary Harrell', '8388607'),
(98, 'Fritz Allison', '8388607'),
(99, 'Sebastian Hughes', '8388607'),
(100, 'Iola Mullen', '8388607');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nm_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` float NOT NULL,
  `tipe_kriteria` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nm_kriteria`, `bobot_kriteria`, `tipe_kriteria`) VALUES
(2, 'C1 (KINERJA)', 50, 'benefit'),
(3, 'C2 (ABSENSI)', 20, 'benefit'),
(9, 'C3 (SKILL)', 10, 'benefit'),
(10, 'C4 (TEAMWORK)', 10, 'benefit'),
(11, 'C5 (INOVASI)', 10, 'benefit');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `value_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_periode`, `id_karyawan`, `id_kriteria`, `id_subkriteria`, `value_sub`) VALUES
(76, 15, 3, 2, 18, 80),
(77, 15, 3, 3, 20, 80),
(78, 15, 3, 9, 21, 100),
(79, 15, 3, 10, 22, 60),
(80, 15, 3, 11, 23, 30),
(81, 15, 5, 2, 17, 30),
(82, 15, 5, 3, 19, 10),
(83, 15, 5, 9, 21, 80),
(84, 15, 5, 10, 22, 10),
(85, 15, 5, 11, 23, 30),
(86, 15, 2, 2, 17, 60),
(87, 15, 2, 3, 19, 60),
(88, 15, 2, 9, 21, 30),
(89, 15, 2, 10, 22, 10),
(90, 15, 2, 11, 23, 60),
(91, 15, 4, 2, 17, 10),
(92, 15, 4, 3, 19, 60),
(93, 15, 4, 9, 21, 10),
(94, 15, 4, 10, 22, 30),
(95, 15, 4, 11, 23, 60),
(96, 15, 6, 2, 17, 10),
(97, 15, 6, 3, 19, 60),
(98, 15, 6, 9, 21, 60),
(99, 15, 6, 10, 22, 80),
(100, 15, 6, 11, 23, 10);

-- --------------------------------------------------------

--
-- Table structure for table `perangkingan`
--

CREATE TABLE `perangkingan` (
  `id_perangkingan` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `total_score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perangkingan`
--

INSERT INTO `perangkingan` (`id_perangkingan`, `id_periode`, `id_karyawan`, `total_score`) VALUES
(206, 15, 2, 0.622222),
(207, 15, 3, 0.911429),
(208, 15, 4, 0.271429),
(209, 15, 5, 0.260635),
(210, 15, 6, 0.298413);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `nm_periode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id_periode`, `nm_periode`) VALUES
(15, 'Periode Penilaian 2023');

-- --------------------------------------------------------

--
-- Table structure for table `periode_d`
--

CREATE TABLE `periode_d` (
  `id_periode_d` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periode_d`
--

INSERT INTO `periode_d` (`id_periode_d`, `id_karyawan`, `id_periode`) VALUES
(32, 2, 15),
(33, 3, 15),
(34, 4, 15),
(35, 5, 15),
(36, 6, 15);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `nm_subkriteria` varchar(50) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `bobot_subkriteria` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subkriteria`, `nm_subkriteria`, `id_kriteria`, `bobot_subkriteria`) VALUES
(17, 'Sangat Baik', 2, 100),
(18, 'Baik', 2, 80),
(19, 'Masuk Full', 3, 100),
(20, '1 Absen', 3, 80),
(21, 'Memuaskan', 9, 100),
(22, 'Mudah Bergaul', 10, 80),
(23, 'Pemikiran Baru', 11, 80);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nik`, `jabatan`, `divisi`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Direktur', '11111', 'Direktur', 'Divisi Dir', 'direktur', '$2y$10$s4QMuLYY9WydSd9X0gYdq.NBIFTHV8GwkeRFCRHFoa7ZOiqgMB3Dq', NULL, '2020-11-14 20:45:47', '2023-12-16 18:54:46'),
(2, 'admin', '234234', 'Admin', 'Admin', 'admin', '$2y$10$pM3cHSYbN63XDtpJI9x4qu6InspuPFECgJkjTJkMkFxPf6z04yuE6', NULL, '2020-11-14 20:54:25', '2023-12-16 18:42:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `perangkingan`
--
ALTER TABLE `perangkingan`
  ADD PRIMARY KEY (`id_perangkingan`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `periode_d`
--
ALTER TABLE `periode_d`
  ADD PRIMARY KEY (`id_periode_d`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1132;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `perangkingan`
--
ALTER TABLE `perangkingan`
  MODIFY `id_perangkingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `periode_d`
--
ALTER TABLE `periode_d`
  MODIFY `id_periode_d` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
