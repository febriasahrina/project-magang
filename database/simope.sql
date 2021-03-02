-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 04:07 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simope`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_task`
--

CREATE TABLE `tb_detail_task` (
  `id_detail_task` int(11) NOT NULL,
  `id_tasklist` int(11) NOT NULL,
  `nama_detail_task` varchar(255) NOT NULL,
  `file_detail_task` varchar(255) NOT NULL,
  `keterangan_detail_task` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_task`
--

INSERT INTO `tb_detail_task` (`id_detail_task`, `id_tasklist`, `nama_detail_task`, `file_detail_task`, `keterangan_detail_task`, `created_by`, `created_time`) VALUES
(1, 25, 'SPPT 1', 'assets/backend/berkas/SPPT_INTERNAL_CONTROL_THREE_LINE_OF_DEFENCE3.pdf', 'SPPT 1 sudah selesai', 2, '2020-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hak_akses`
--

CREATE TABLE `tb_hak_akses` (
  `id_hak_akses` int(11) NOT NULL,
  `nama_hak_akses` varchar(225) NOT NULL,
  `modul_akses` text NOT NULL,
  `parent_modul_akses` text,
  `created_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hak_akses`
--

INSERT INTO `tb_hak_akses` (`id_hak_akses`, `nama_hak_akses`, `modul_akses`, `parent_modul_akses`, `created_time`) VALUES
(1, 'Superuser', '{\n    \"modul\": [\n        \"10\",\n        \"11\",\n        \"12\",\n        \"13\",\n        \"14\",\n        \"15\",\n        \"16\",\n        \"17\",\n        \"18\",\n        \"19\",\n        \"20\",\n        \"21\",\n        \"1\",\n        \"2\",\n        \"3\",\n        \"4\",\n        \"5\",\n        \"6\",\n        \"7\",\n        \"8\",\n        \"9\"\n    ]\n}', '{\n    \"parent_modul\": [\n        \"1\",\n        \"2\",\n        \"3\",\n        \"4\",\n        \"5\"\n    ]\n}', '2020-09-17'),
(2, 'SVP Corporate University', '{\n    \"modul\": [\n        \"10\",\n        \"11\",\n        \"12\",\n        \"13\",\n        \"14\",\n        \"15\",\n        \"16\",\n        \"17\",\n        \"18\",\n        \"19\",\n        \"20\",\n        \"6\",\n        \"7\",\n        \"8\"\n    ]\n}', '{\n    \"parent_modul\": [\n        \"1\",\n        \"2\"\n    ]\n}', '2020-10-08'),
(3, 'VP Teknikal', '{\n    \"modul\": [\n        \"10\",\n        \"11\",\n        \"12\",\n        \"13\",\n        \"14\",\n        \"15\",\n        \"16\",\n        \"17\",\n        \"18\",\n        \"19\",\n        \"20\",\n        \"5\",\n        \"6\",\n        \"7\",\n        \"8\"\n    ]\n}', '{\n    \"parent_modul\": [\n        \"1\",\n        \"2\",\n        \"5\"\n    ]\n}', '2020-10-08'),
(4, 'Staff Teknikal', '{\n    \"modul\": [\n        \"10\",\n        \"11\",\n        \"12\",\n        \"15\",\n        \"16\",\n        \"17\",\n        \"18\"\n    ]\n}', '{\n    \"parent_modul\": [\n        \"1\",\n        \"2\",\n        \"5\"\n    ]\n}', '2020-10-08'),
(5, 'VP Manajerial', '{\n    \"modul\": [\n        \"10\",\n        \"11\",\n        \"12\",\n        \"13\",\n        \"14\",\n        \"15\",\n        \"16\",\n        \"17\",\n        \"18\",\n        \"19\",\n        \"20\",\n        \"5\",\n        \"6\",\n        \"7\",\n        \"8\"\n    ]\n}', '{\n    \"parent_modul\": [\n        \"1\",\n        \"2\",\n        \"5\"\n    ]\n}', '0000-00-00'),
(6, 'VP Administrasi', '{\n    \"modul\": [\n        \"10\",\n        \"11\",\n        \"12\",\n        \"13\",\n        \"14\",\n        \"15\",\n        \"16\",\n        \"17\",\n        \"18\",\n        \"19\",\n        \"20\",\n        \"5\",\n        \"6\",\n        \"7\",\n        \"8\"\n    ]\n}', '{\n    \"parent_modul\": [\n        \"1\",\n        \"2\",\n        \"5\"\n    ]\n}', '0000-00-00'),
(7, 'Staff Manajerial', '{\n    \"modul\": [\n        \"10\",\n        \"11\",\n        \"12\",\n        \"15\",\n        \"16\",\n        \"17\",\n        \"18\"\n    ]\n}', '{\n    \"parent_modul\": [\n        \"1\",\n        \"2\",\n        \"5\"\n    ]\n}', '0000-00-00'),
(8, 'Staff Administrasi', '{\n    \"modul\": [\n        \"10\",\n        \"11\",\n        \"12\",\n        \"15\",\n        \"16\",\n        \"17\",\n        \"18\"\n    ]\n}', '{\n    \"parent_modul\": [\n        \"1\",\n        \"2\",\n        \"5\"\n    ]\n}', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_identitas`
--

CREATE TABLE `tb_identitas` (
  `id_profile` int(11) NOT NULL,
  `apps_name` varchar(225) NOT NULL,
  `apps_version` varchar(225) NOT NULL,
  `apps_code` varchar(5) NOT NULL,
  `agency` varchar(225) NOT NULL,
  `address` varchar(225) DEFAULT NULL,
  `city` varchar(225) DEFAULT NULL,
  `telephon` varchar(225) DEFAULT NULL,
  `fax` varchar(225) DEFAULT NULL,
  `website` varchar(225) NOT NULL,
  `header` varchar(225) NOT NULL,
  `footer` varchar(225) NOT NULL,
  `keyword` text NOT NULL,
  `logo` varchar(225) DEFAULT 'NULL',
  `apps_icon` varchar(225) DEFAULT NULL,
  `about_us` text NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `email_password` varchar(225) DEFAULT NULL,
  `email_port` varchar(4) DEFAULT NULL,
  `email_host` varchar(225) DEFAULT NULL,
  `email_type` varchar(3) DEFAULT NULL,
  `bg_login` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_identitas`
--

INSERT INTO `tb_identitas` (`id_profile`, `apps_name`, `apps_version`, `apps_code`, `agency`, `address`, `city`, `telephon`, `fax`, `website`, `header`, `footer`, `keyword`, `logo`, `apps_icon`, `about_us`, `email`, `email_password`, `email_port`, `email_host`, `email_type`, `bg_login`) VALUES
(1, 'SIMOP-C', 'V 0.0.1', 'MDI', 'Sistem Monitoring dan Penilaian Pekerjaan ', NULL, NULL, NULL, '', '', '', '<a class=\"text-bold-800 grey darken-2\" \r\nhref=\"https://medandigitalinnovation.com\" target=\"_blank\">Powered By SIMOPE</a>', '', 'assets/logo/logo.png', 'assets/logo/logo_small.png', '', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `isi_komentar` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_modul`
--

CREATE TABLE `tb_modul` (
  `id_modul` int(11) NOT NULL,
  `nama_modul` varchar(225) NOT NULL,
  `link_modul` varchar(225) NOT NULL,
  `type_modul` varchar(20) NOT NULL,
  `id_parent_modul` int(11) NOT NULL,
  `created_time` date NOT NULL,
  `tampil_sidebar` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_modul`
--

INSERT INTO `tb_modul` (`id_modul`, `nama_modul`, `link_modul`, `type_modul`, `id_parent_modul`, `created_time`, `tampil_sidebar`) VALUES
(1, 'Hak Akses', 'panel/users/rbac_list', 'R', 3, '2020-09-17', 'Y'),
(2, 'Create Hak Akses', 'panel/users/create_rbac', 'C', 3, '2020-09-17', 'N'),
(3, 'Update Hak Akses', 'panel/users/update_rbac/', 'U', 3, '2020-09-17', 'N'),
(4, 'Delete Hak Akses', 'panel/users/delete_rbac/', 'D', 3, '2020-09-17', 'N'),
(5, 'List Pengguna', 'panel/users/list', 'R', 3, '2020-09-17', 'Y'),
(6, 'Tambah Pengguna', 'panel/users/create', 'C', 3, '2020-09-17', 'N'),
(7, 'Update Pengguna', 'panel/users/update/', 'U', 3, '2020-09-17', 'N'),
(8, 'Delete Pengguna', 'panel/users/delete/', 'D', 3, '2020-09-17', 'N'),
(9, 'Identitas Aplikasi', 'panel/settings/apps_info', 'U', 4, '2020-09-17', 'Y'),
(10, 'Rencana Kerja', 'panel/task/requestTask', 'R', 2, '2020-09-17', 'Y'),
(11, 'Tambah Rencana Kerja', 'panel/task/createRequestTask', 'C', 2, '2020-09-17', 'N'),
(12, 'Update Rencana Kerja', 'panel/task/updateRequestTask/', 'U', 2, '2020-09-17', 'N'),
(13, 'Terima Rencana Kerja', 'panel/task/confirmRequestTask/', 'U', 2, '2020-09-17', 'N'),
(14, 'Tolak Rencana Kerja', 'panel/task/declineRequestTask/', 'U', 2, '2020-09-17', 'N'),
(15, 'Riwayat Pekerjaan', 'panel/task/historyTask', 'R', 2, '2020-09-17', 'Y'),
(16, 'Detail Pekerjaan', 'panel/task/detailTask', 'R', 2, '2020-09-17', 'N'),
(17, 'Tambah Berkas Pekerja', 'panel/task/createTask', 'C', 2, '2020-09-17', 'N'),
(18, 'Selesai Rencana Kerja', 'panel/task/finishTask/', 'U', 2, '2020-09-17', 'N'),
(19, 'Selesai Detail Pekerjaan', 'panel/task/finishhistoryTask/', 'U', 2, '2020-09-17', 'N'),
(20, 'Gagal Detail Pekerjaan', 'panel/task/failedhistoryTask/', 'U', 2, '2020-09-17', 'N'),
(21, 'Nilai Pekerjaan', 'panel/task/scoreTask/', 'U', 2, '2020-09-17', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tb_parent_modul`
--

CREATE TABLE `tb_parent_modul` (
  `id_parent_modul` int(11) NOT NULL,
  `nama_parent_modul` varchar(225) NOT NULL,
  `urutan` int(11) NOT NULL,
  `icon` varchar(225) NOT NULL,
  `created_time` date NOT NULL,
  `child_module` enum('Y','N') NOT NULL,
  `link` varchar(225) NOT NULL,
  `tampil_sidebar_parent` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_parent_modul`
--

INSERT INTO `tb_parent_modul` (`id_parent_modul`, `nama_parent_modul`, `urutan`, `icon`, `created_time`, `child_module`, `link`, `tampil_sidebar_parent`) VALUES
(1, 'Dashboard', 1, 'ft-home', '2020-09-17', 'N', 'panel/dashboard', 'Y'),
(2, 'List Task', 2, 'fa fa-edit', '2020-09-17', 'Y', '#', 'Y'),
(3, 'Manajemen Pengguna', 3, 'fa fa-users', '2020-09-17', 'Y', '#', 'Y'),
(4, 'Pengaturan', 4, 'ft-settings', '2020-09-17', 'Y', '#', 'Y'),
(5, 'Download Laporan', 5, 'fa fa-download', '2020-11-02', 'N', 'panel/laporan', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `password` varchar(225) NOT NULL,
  `nama_lengkap` varchar(225) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenkel` enum('L','P') DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `fotopengguna` varchar(225) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `hak_akses` varchar(225) NOT NULL,
  `created_time` date NOT NULL,
  `activity_status` enum('online','offline') NOT NULL DEFAULT 'offline',
  `last_login` datetime DEFAULT NULL,
  `status` enum('actived','deleted','pending') NOT NULL DEFAULT 'actived'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `email`, `no_telp`, `password`, `nama_lengkap`, `tgl_lahir`, `jenkel`, `alamat`, `fotopengguna`, `nip`, `hak_akses`, `created_time`, `activity_status`, `last_login`, `status`) VALUES
(2, 'yantinasution@pelindo1.co.id', '082166539072', '8cb2237d0679ca88db6464eac60da96345513964', 'Yanti Nasution', '1972-08-15', 'P', 'Medan', NULL, '172082139', 'Staff Teknikal', '2020-09-17', 'online', '2020-11-04 13:12:37', 'actived'),
(3, 'zulhendri1520472@gmail.com', '081375439432', '8cb2237d0679ca88db6464eac60da96345513964', 'Zulhendri', '1969-01-01', 'L', 'Marelan', NULL, '172022267', 'VP Teknikal', '0000-00-00', 'online', '2020-11-02 15:10:58', 'actived'),
(4, 'aufaribna@pelindo1.co.id', '081375801425', '8cb2237d0679ca88db6464eac60da96345513964', 'Aufar Ibna', '1969-01-01', 'L', 'Marelan', NULL, '186012955', 'VP Manajerial', '0000-00-00', 'online', '2020-10-22 16:50:37', 'actived'),
(5, 'renizakaria@pelindo1.co.id', '082362878999', '8cb2237d0679ca88db6464eac60da96345513964', 'Reni Zakaria', '1969-01-01', 'P', 'Medan', NULL, '175051970', 'VP Administrasi', '0000-00-00', 'online', '2020-10-21 14:02:06', 'actived'),
(6, 'admin@gmail.com', '081375294829', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '1999-01-01', 'L', 'Belawan', NULL, '12345', 'superuser', '0000-00-00', 'online', '2020-11-02 16:50:48', 'actived'),
(7, 'kasihdwiyanti@pelindo1.co.id', '081361781304', '8cb2237d0679ca88db6464eac60da96345513964', 'Kasih Dwi Yanti', '1971-09-05', 'P', 'Medan', NULL, '171092132', 'SVP Corporate University', '0000-00-00', 'online', '2020-10-22 14:26:47', 'actived'),
(8, 'zulfa@pelindo1.co.id', '081239390593', '8cb2237d0679ca88db6464eac60da96345513964', 'Zakia Ulfa', '1996-05-13', 'P', 'Medan', NULL, '196053333', 'Staff Administrasi', '0000-00-00', 'online', '2020-10-21 11:32:59', 'actived'),
(12, 'yunny@pelindo1.co.id', '082165765477', '8cb2237d0679ca88db6464eac60da96345513964', 'Yunny', '1996-01-01', 'P', 'Medan', NULL, '98765', 'Staff Manajerial', '0000-00-00', 'online', '2020-11-03 08:14:55', 'actived');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tasklist`
--

CREATE TABLE `tb_tasklist` (
  `id_tasklist` int(11) NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `kategori_kerja` enum('KPI','PKM','Unschedule') NOT NULL,
  `bidang_kerja` enum('Teknikal','Manajerial dan Kepemimpinan','Administrasi') NOT NULL,
  `detail_pekerjaan` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `keterangan_pekerjaan` text,
  `jenis_pekerjaan` enum('Penting & Mendesak','Penting','Biasa') DEFAULT NULL,
  `status_persetujuan` enum('Waiting','Approve','Decline') NOT NULL,
  `waktu_persetujuan` date DEFAULT NULL,
  `status_rencana_kerja` enum('Waiting','On Progress','Failed','Complete') NOT NULL,
  `waktu_rencana_kerja` date DEFAULT NULL,
  `status_detail_pekerjaan` enum('Waiting','On Progress','Failed','Complete') NOT NULL,
  `waktu_detail_pekerjaan` date DEFAULT NULL,
  `komentar_pekerjaan` int(11) DEFAULT NULL,
  `keterangan_perpanjang` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tasklist`
--

INSERT INTO `tb_tasklist` (`id_tasklist`, `nama_pekerjaan`, `kategori_kerja`, `bidang_kerja`, `detail_pekerjaan`, `start_date`, `end_date`, `keterangan_pekerjaan`, `jenis_pekerjaan`, `status_persetujuan`, `waktu_persetujuan`, `status_rencana_kerja`, `waktu_rencana_kerja`, `status_detail_pekerjaan`, `waktu_detail_pekerjaan`, `komentar_pekerjaan`, `keterangan_perpanjang`, `created_by`, `created_time`) VALUES
(25, 'Membuat SPPT', 'KPI', 'Teknikal', 'SPPT 1, SPPT 2', '2020-11-02', '2020-11-03', '', 'Penting', 'Approve', '2020-11-02', 'Complete', '2020-11-02', 'Complete', '2020-11-02', NULL, '', 2, '2020-11-02'),
(26, 'Menjadwalkan EL bulan November', 'KPI', 'Teknikal', 'El 1, El 2', '2020-11-02', '2020-11-04', '', 'Biasa', 'Approve', '2020-11-02', 'On Progress', '2020-11-02', 'On Progress', '2020-11-02', NULL, '', 2, '2020-11-02'),
(27, 'Menjadi Admin bulan November', 'KPI', 'Teknikal', 'apa aja yang dilakukan', '2020-11-02', '2020-11-30', '', NULL, 'Decline', '2020-11-02', 'Failed', '2020-11-02', 'Failed', '2020-11-02', NULL, '', 2, '2020-11-02'),
(28, 'Enroll E Learning', 'KPI', 'Manajerial dan Kepemimpinan', 'EL 1, El 2', '2020-11-02', '2020-11-04', '', NULL, 'Waiting', NULL, 'Waiting', NULL, 'Waiting', NULL, NULL, '', 12, '2020-11-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_task`
--
ALTER TABLE `tb_detail_task`
  ADD PRIMARY KEY (`id_detail_task`);

--
-- Indexes for table `tb_hak_akses`
--
ALTER TABLE `tb_hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`),
  ADD UNIQUE KEY `nama_hak_akses` (`nama_hak_akses`);

--
-- Indexes for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_modul`
--
ALTER TABLE `tb_modul`
  ADD PRIMARY KEY (`id_modul`),
  ADD KEY `parent_module` (`id_parent_modul`);

--
-- Indexes for table `tb_parent_modul`
--
ALTER TABLE `tb_parent_modul`
  ADD PRIMARY KEY (`id_parent_modul`),
  ADD UNIQUE KEY `urutan` (`urutan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `hak_akses` (`hak_akses`);

--
-- Indexes for table `tb_tasklist`
--
ALTER TABLE `tb_tasklist`
  ADD PRIMARY KEY (`id_tasklist`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_task`
--
ALTER TABLE `tb_detail_task`
  MODIFY `id_detail_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_hak_akses`
--
ALTER TABLE `tb_hak_akses`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_identitas`
--
ALTER TABLE `tb_identitas`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_modul`
--
ALTER TABLE `tb_modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_parent_modul`
--
ALTER TABLE `tb_parent_modul`
  MODIFY `id_parent_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_tasklist`
--
ALTER TABLE `tb_tasklist`
  MODIFY `id_tasklist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
