-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Agu 2024 pada 11.52
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office_v2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id` int(11) NOT NULL,
  `akses` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id`, `akses`) VALUES
(1, 'Administrator'),
(2, 'Author'),
(3, 'Developer'),
(4, 'Viewer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `divisi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `divisi`) VALUES
(1, 'IT'),
(2, 'HRD'),
(4, 'FINANCE'),
(5, 'SO'),
(6, 'RITEIL'),
(7, 'SALES'),
(8, 'DRIVER'),
(9, 'WEB DEVELOPER'),
(10, 'GRAPICHS DESIGN'),
(11, 'ACCOUNTING'),
(12, 'MOTION GRAPHICS'),
(13, 'WAREHOUSE'),
(14, 'SECRETARY'),
(15, 'TRAINING'),
(16, 'ADMIN'),
(17, 'AUDIT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtcuti`
--

CREATE TABLE `dtcuti` (
  `id` int(11) NOT NULL,
  `nocuti` varchar(50) DEFAULT NULL,
  `iduser` varchar(50) DEFAULT NULL,
  `jeniscuti` varchar(50) DEFAULT NULL,
  `tglawal` varchar(50) DEFAULT NULL,
  `tglakhir` varchar(50) DEFAULT NULL,
  `jmlhari` varchar(50) DEFAULT NULL,
  `file` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tglkirim` varchar(100) NOT NULL,
  `idhrd` int(11) NOT NULL,
  `notereject` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dtcuti`
--

INSERT INTO `dtcuti` (`id`, `nocuti`, `iduser`, `jeniscuti`, `tglawal`, `tglakhir`, `jmlhari`, `file`, `status`, `tglkirim`, `idhrd`, `notereject`, `note`) VALUES
(1, NULL, '16', '2', '2023-03-24', '2023-06-22', '90', '-', 'Terkirim', '', 0, '', ''),
(2, NULL, '16', '2', '2023-03-24', '2023-06-22', '90', '-', 'Terkirim', '', 0, '', ''),
(3, 'CT/0423111541', '39', '1', '2023-04-11', '2023-04-14', '4', '-', '4', '2023-04-11', 39, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `d_`
--

CREATE TABLE `d_` (
  `kode_unit` varchar(15) NOT NULL,
  `nama_unit` varchar(50) DEFAULT NULL,
  `jenis_unit` varchar(50) DEFAULT NULL,
  `mainboard` varchar(50) DEFAULT NULL,
  `prosesor` varchar(50) DEFAULT NULL,
  `id_ram` varchar(50) DEFAULT NULL,
  `id_kpsts` varchar(50) DEFAULT NULL,
  `casing` varchar(50) DEFAULT '-',
  `psu` varchar(50) DEFAULT '-',
  `keyboard` varchar(50) DEFAULT '-',
  `mouse` varchar(50) DEFAULT '-',
  `monitor` varchar(50) DEFAULT '-',
  `tgl_beli` varchar(50) DEFAULT NULL,
  `vga` varchar(50) DEFAULT '-',
  `Other Spek` text DEFAULT NULL,
  `id_brand` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `headts`
--

CREATE TABLE `headts` (
  `id` int(11) NOT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `jam` varchar(50) DEFAULT NULL,
  `tarik` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `headts`
--

INSERT INTO `headts` (`id`, `tgl`, `jam`, `tarik`, `type`) VALUES
(1, '2024-07-30', '16:58', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jnscuti`
--

CREATE TABLE `jnscuti` (
  `id` int(11) NOT NULL,
  `Jenis` varchar(50) DEFAULT NULL,
  `setting` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jnscuti`
--

INSERT INTO `jnscuti` (`id`, `Jenis`, `setting`) VALUES
(1, 'Cuti Lainnya', '0'),
(2, 'Cuti Melahirkan', '90'),
(3, 'Cuti Menikah', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prcuti`
--

CREATE TABLE `prcuti` (
  `id` int(11) NOT NULL,
  `idcuti` int(11) DEFAULT NULL,
  `tanggal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jam` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `info` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `prcuti`
--

INSERT INTO `prcuti` (`id`, `idcuti`, `tanggal`, `jam`, `info`, `status`) VALUES
(1, 1, '2023-03-24', '13:27', '-', 'Terkirim To HRD'),
(2, 2, '2023-03-24', '16:36', '-', 'Terkirim To HRD'),
(3, 3, '2023-04-11', '11:15', '-', 'Terkirim To HRD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `store`
--

CREATE TABLE `store` (
  `id_store` varchar(10) NOT NULL,
  `id` int(11) NOT NULL,
  `store_name` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `ip_vpn` varchar(20) NOT NULL,
  `account_vpn` varchar(30) NOT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `jam_buka` varchar(30) DEFAULT NULL,
  `jam_tutup` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `noremote` varchar(100) NOT NULL,
  `noany` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `store`
--

INSERT INTO `store` (`id_store`, `id`, `store_name`, `jenis`, `ip_vpn`, `account_vpn`, `telepon`, `jam_buka`, `jam_tutup`, `email`, `alamat`, `noremote`, `noany`) VALUES
('S003', 2, 'RG ROYALE', '1', '10.10.10.28', 'Royale', '021-80884838/121112232920', '09:00', '20:00', 'admin.royale@rajagolf.co.id', 'Royale Practice Range\nJl. Raya Halim Tiga, Halim Perdanakusuma,\nJakarta Timur 13650.', '56731026', '304468886'),
('S0001', 3, 'RG BLOKM', '1', '10.10.10.3', 'Blok M', '021-7397252/121202216095', '09:30', '20:00', 'admin.blokm@rajagolf.co.id', 'Jl. Panglima Polim Raya No. 11 H – I,\nJakarta Selatan 12160.', '56766166', '238907373'),
('S008', 5, 'RG PAKUWON', '1', '10.10.10.12', 'Pakuwon', '031-7391757/152409109572', '09:30', '20:00', 'admin.pakuwon@rajagolf.co.id', 'Vila Bukit Regensi, Pakuwon Indah,\nSurabaya  60123.', '78788771', '1349994176'),
('S009', 6, 'RG PALMSPRING', '1', '10.10.10.14', 'palmspring', '0778-761211', '10:00', '20:00', 'admin.palmsprings@rajagolf.co.id', 'Jl. Tol Jakarta – Cikampek,\nPintu Tol Km 47 Karawang Barat\nKarawang, 41361, Indonesia.', '58981901', '918114034'),
('S010', 7, 'RG SENTUL', '1', '10.10.10.5', 'Sentul', '021-87962685', '09:00', '20:00', 'admin.sentul@rajagolf.co.id', 'Jl. Sumur Batu,\nSentul – Bogor 16810.', '56740367', '232950418'),
('S020', 9, 'RG GADING', '1', '10.10.10.21', 'Gading', '021-29578503 / 122107202946', '09:00', '20:00', 'admin.gading@rajagolf.co.id', 'Jl. Boulevard Barat Raya No. 1,\nKelapa Gading-Jakarta Utara 14240.', '56798579', '339306636'),
('S014', 10, 'RG JAGORAWI', '1', '10.10.10.19', 'Jagorawi', '021-8753794', '09:00', '20:00', 'jagorawi@rajagolf.co.id', 'Jl. Karanggan Raya, Desa Cipaeun,\nCibinong – Bogor 48 CBI – Jawa Barat 16960.', '56736724', 'rg-jagorawi@ad'),
('S034', 12, 'RG PALMHILL', '1', '10.10.10.37', 'Palm Hill', '-', '09:00', '20:00', 'admin.palmhill@rajagolf.co.id', 'Jl. Sentul Raya No.45, Kadumangu, \nKec.Babakan Madang – Bogor – Jawa Barat 16810.', '56763561 ', '198992546'),
('S030', 13, 'RG SILIWANGI', '1', '10.10.10.31', 'Siliwangi', '-', '09:00', '20:00', 'admin.siliwangi@rajagolf.co.id', '', '56731611', '498310717'),
('S032', 14, 'RG BNGC', '1', '10.10.10.35', 'BNGC', '0361-4772419 /', '09:00', '20:00', 'admin.bngc@rajagolf.co.id', '', '57 195 082', '876578155'),
('S012', 15, 'RG SEMARANG', '1', '10.10.10.18', 'Gombel', '024-76406077 / 143423110917', '09:00', '20:00', 'admin.gombel@rajagolf.co.id', 'Jl. Gombel Lama No. 90,\nSemarang 50141.', '57191613', '198910122'),
('S025', 16, 'RG MODERNLAND', '1', '10.10.10.4', 'Modernland', '021-5529668', '09:00', '20:00', 'admin.modern@rajagolf.co.id', '', '69 663 730 / 56731157', '738452145'),
('S033', 18, 'RG RAWAMANGUN', '1', '10.10.10.34', 'Rawamangun', '-', '09:00', '20:00', 'admin.rawamangun@rajagolf.co.id', '', '56948488', '256557999'),
('S007', 19, 'RG PRINGGONDANI', '1', '10.10.10.14', 'Pringgondani', '021-8014158', '09:00', '20:00', 'admin.pringgondani@rajagolf.co.id', 'Jl. Raya Protokol Halim Perdanakusuma,\nJakarta Timur 13610.', '56 738 484', 'pringgondani-pc-1@ad'),
('S018', 20, 'RG GRAHA', '1', '10.10.10.20', 'Graha', '031-7329579', '09:00', '20:00', 'admin.graha@rajagolf.co.id', 'Jl. Raya Golf Graha Famili,\nSurabaya 60226.', '56732803', 'rg-graha@ad'),
('S021', 21, 'RG CIPUTRA', '1', '10.10.10.22', 'Ciputra', '031-7418247', '09:00', '20:00', 'admin.ciputra@rajagolf.co.id', 'Jl. Citraland Utama, Citraland,\nSurabaya 60219.', '56 738 268', 'rg-ciputra-pc@ad'),
('S026', 22, 'RG KBP', '1', '10.10.10.25', 'KBP', '022-21102876', '09:00', '20:00', 'admin.parahyangan@rajagolf.co.id', '', '72840280', '893103703'),
('S028', 23, 'RG CILANDAK', '1', '10.10.10.27', 'Cilandak', '021-27870434/122220224672', '09:00', '20:00', 'admin.cilandak@rajagolf.co.id', '', '56737779', '597069197'),
('S027', 24, 'RG LOTTE', '1', '10.10.10.26', 'Lotte', '021-29889616/122712223305', '09:30', '20:00', 'admin.lotte@rajagolf.co.id', '', '56771099 , 62384298', '346212426 , 716117153'),
('S024', 25, 'RG KUTA SQUARE', '1', '10.10.10.23', 'Bali', '0361-752227 / 172416506810', '09:00', '20:00', 'admin.kuta@rajagolf.co.id', '', '17978074', '1615620877'),
('S036', 27, 'RG MODERNLAND2', '1', '10.10.10.47', 'Modernland2', '-', '09:00', '19:00', 'admin.modern2@rajagolf.co.id', '', '66727577', '948800496'),
('S038', 31, 'RG PSGK', '1', '10.10.10.40', 'PSGK', '-', '06:00', '02:10', '-', '', '56731180', '172549270'),
('W002', 32, 'RG-WHOLESALE , ITBM', '1', '10.10.10.32', 'yani', '02138902275', '10:52', '10:52', 'it.rajagolf@gmail.com', '', '', '511609099'),
('S039', 33, 'RG GRAHA DRIVING', '1', '10.10.10.43', 'GDR', '03199149557 / 152409253761', '06:00', '20:00', '@', 'Graha Famili', '56730970', ''),
('-', 34, 'Office Hotel Melawai', '2', '-', '-', '021-27099765/121202254273', '21:30', '18:30', '-', '-', '', ''),
('-', 35, 'Office Pintu Air', '2', '-', '-', '021-38902275/ 122604206972', '12:34', '12:34', 'it@rajagolf.co.id', '-', '', ''),
('S041', 37, 'THE RANGE PIK', '1', '10.10.10.41', 'PIK2', '-', '', '12:28', '12:28', '', '58344790', '211696748'),
('S040', 38, 'RG SENTUL DRIVING', '1', '-', '-', '02122571562 / 122734209850', '09:00', '20:00', '-', '-', '67536226', '1324120456'),
('S042', 39, 'RG Ciputra #2', '1', '10.10.10.45', 'ciputra2', '152412287430/0317438666', '', '15:16', 'admin.ciputra2@rajagolf.co.id', 'admin.ciputra2@rajagolf.co.id', '', '1286617087'),
('S043', 0, 'IMPERIAL KARAWACI', '1', '-', '-', '-', '', '10:49', '-', '-', '84039925', '1849937451');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tasksales`
--

CREATE TABLE `tasksales` (
  `id` int(11) NOT NULL,
  `id_report` varchar(50) NOT NULL,
  `id_store` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `alasan` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `idhead` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `tasksales`
--

INSERT INTO `tasksales` (`id`, `id_report`, `id_store`, `type`, `tanggal`, `jam`, `status`, `alasan`, `id_user`, `idhead`) VALUES
(2, 'rpt/2024/07', 'S0001', '1', '2024-07-30', '16:51', 1, '-', 6, NULL),
(3, 'rpt/2024/07', 'S003', '1', '2024-07-30', '16:53', 1, '-', 6, NULL),
(4, 'rpt/2024/07', 'S007', '1', '2024-07-30', '16:54', 1, '-', 6, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `typ_unit`
--

CREATE TABLE `typ_unit` (
  `id` int(11) NOT NULL,
  `typ_name` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `typ_unit`
--

INSERT INTO `typ_unit` (`id`, `typ_name`) VALUES
(1, 'Laptop'),
(2, 'PC/Komputer'),
(3, 'Macbook'),
(4, 'Crombook'),
(5, 'Handphone'),
(6, 'Tablet'),
(7, 'Modem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `hak_akses` int(11) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL,
  `no_telpon` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `id_divisi` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tmtlahir` varchar(50) NOT NULL,
  `tgllahir` varchar(50) NOT NULL,
  `cuti` varchar(10) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `tgl_bikin` varchar(50) DEFAULT NULL,
  `lokasi` varchar(50) NOT NULL,
  `minuscuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `hak_akses`, `gambar`, `no_telpon`, `name`, `id_divisi`, `email`, `alamat`, `tmtlahir`, `tgllahir`, `cuti`, `status`, `tgl_bikin`, `lokasi`, `minuscuti`) VALUES
(6, 'nurdenim', 'b5155aa9f2486c203e09fd435bc4ecff', 3, '6.jpg', '087885688407', 'Deniman NurMuhamad', 9, 'xdeniman21@gmail.com', 'Jl.Rawa Gading VII, Rt.02/02 No.35', 'Jakarta', '1998-11-04', '14', 1, '2021-05-07', 'Pintu Air', 0),
(11, 'Bowo', 'aff12feb0b6e876167c961a9ce01cd24', 2, 'default.png', '-', 'Bowo', 1, '', '', '13/07/1986', '', '12', 1, '2021-05-07', 'Pintu Air', 0),
(14, 'Dede', '6a8a9c3c0074547e02ce89c510f35767', 1, '141.jpg', '085793549366', 'Dede Sutisna', 1, '', '', '', '', '14', 1, '2021-05-07', 'Pintu Air', 0),
(15, 'Olin', '202cb962ac59075b964b07152d234b70', 4, 'default.png', '', 'Olin', 4, '', '', '-', '2021-05-07', '14', 1, '2021-05-07', 'Pintu Air', 0),
(16, 'indri', '3c3e401af1db33084f066adc161b117f', 4, 'default.png', '081299212319', 'Indri', 5, '-', '-', '-', '2021-05-07', '14', 1, '2021-05-07', 'Pintu Air', 0),
(17, 'taufik', 'eaf5ae8e42b3f1f847bd25971d013356', 4, 'default.png', '-', 'taufik', 10, 'circlestuff@gmail.com', '-', '-', '', '14', 1, '2021-05-07', 'Pintu Air', 0),
(20, 'Dwi', '81dc9bdb52d04dc20036dbd8313ed055', 4, 'default.png', '', 'Dwi', 5, '', '', '-', '2021-05-07', '14', 1, '2021-05-07', 'Pintu Air', 0),
(21, 'yani@itbm', 'edc52ca1b4c787a8f9fb938e70766a75', 1, '21.jpg', '08994882708', 'yani', 1, 'fryaniz12@gmail.com', '-', '-', '1965-09-30', '12', 1, NULL, 'Pintu Air', 0),
(23, 'Lucy', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'default.png', '0816987252', 'Lucy', 6, '', '', '-', '2021-05-12', '14', 1, NULL, 'Pintu Air', 0),
(29, 'mei06', 'c3ea9d2d303c63161f3e656f766c9529', 4, 'default.png', '08984684443', 'Mei', 5, 'nanaa.quin@gmail.com', '', '-', '2021-06-02', '14', 1, NULL, 'Pintu Air', 0),
(31, 'ENNY', '25d55ad283aa400af464c76d713c07ad', 4, 'default.png', '08128239098', 'ENNY', 4, '', '', '-', '2021-08-03', '14', 1, NULL, 'Pintu Air', 0),
(32, 'andri', 'a64248ad9b4e76058fe8a059ae43e171', 4, 'default.png', '082213706364', 'Andri', 11, '', '', '-', '2022-05-24', '12', 1, NULL, 'Pintu Air', 0),
(33, 'tasyarg', '49ad9555f453fd6a451ca7355a249e1f', 4, 'default.png', '0895369257328', 'Tasya', 6, '', '', '-', '2022-05-25', '12', 1, NULL, 'Pintu Air', 0),
(34, 'training', '50e2badc8b708515fc2a96bf08e1686e', 4, 'default.png', '0', 'Training', 15, 'it@rajagolf.co.id', '', '-', '2022-06-27', '12', 1, NULL, 'Pintu Air', 0),
(37, 'fajar', '1d89fc58b795dc2be5894a5c82620631', 1, 'default.png', '085363084323', 'Fajar', 1, 'fajar30martha@gmail.com', '', '-', '2023-03-01', '12', 1, NULL, 'Pintu Air', 0),
(38, 'terteradmin', '2aeb93dc2d529f0ee59022095d6748bc', 1, 'default.png', '513655454', 'AKUN TEST', 2, 'Tester@gmail.com', '', '-', '2023-04-10', '12', 1, NULL, '', 0),
(39, 'tyohrd', '10f0e19802b3d3766a423e3d1c449115', 1, 'default.png', '083804779934', 'AGUS PRASETYO', 2, 'hrd@rajagolf.co.id', '', '-', '2023-04-10', '', 1, NULL, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dtcuti`
--
ALTER TABLE `dtcuti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `d_`
--
ALTER TABLE `d_`
  ADD PRIMARY KEY (`kode_unit`) USING BTREE;

--
-- Indeks untuk tabel `headts`
--
ALTER TABLE `headts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jnscuti`
--
ALTER TABLE `jnscuti`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `prcuti`
--
ALTER TABLE `prcuti`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tasksales`
--
ALTER TABLE `tasksales`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `typ_unit`
--
ALTER TABLE `typ_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `dtcuti`
--
ALTER TABLE `dtcuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `headts`
--
ALTER TABLE `headts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jnscuti`
--
ALTER TABLE `jnscuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `prcuti`
--
ALTER TABLE `prcuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tasksales`
--
ALTER TABLE `tasksales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `typ_unit`
--
ALTER TABLE `typ_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
