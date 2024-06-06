-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2024 pada 10.00
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penyakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `basis_aturan`
--

CREATE TABLE `basis_aturan` (
  `id_aturan` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `basis_aturan`
--

INSERT INTO `basis_aturan` (`id_aturan`, `id_penyakit`) VALUES
(7, 9),
(8, 10),
(9, 11),
(10, 12),
(11, 13),
(12, 14),
(13, 15),
(15, 16),
(14, 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_basis_aturan`
--

CREATE TABLE `detail_basis_aturan` (
  `id_aturan` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_basis_aturan`
--

INSERT INTO `detail_basis_aturan` (`id_aturan`, `id_gejala`) VALUES
(7, 14),
(7, 17),
(7, 15),
(7, 18),
(7, 13),
(7, 12),
(7, 16),
(8, 20),
(8, 21),
(8, 19),
(8, 17),
(8, 23),
(8, 12),
(8, 22),
(9, 26),
(9, 28),
(9, 27),
(10, 33),
(10, 32),
(10, 35),
(10, 34),
(10, 12),
(11, 33),
(11, 17),
(11, 32),
(11, 35),
(11, 34),
(12, 29),
(12, 37),
(12, 36),
(12, 39),
(12, 38),
(13, 46),
(13, 45),
(13, 42),
(13, 44),
(13, 41),
(13, 43),
(13, 40),
(14, 50),
(14, 51),
(14, 52),
(15, 49),
(15, 48),
(15, 47);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_konsultasi`
--

CREATE TABLE `detail_konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penyakit`
--

CREATE TABLE `detail_penyakit` (
  `id_konsultasi` int(11) NOT NULL,
  `id_penyakit` int(11) NOT NULL,
  `persentase` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`) VALUES
(12, 'Sakit kepala'),
(13, 'Pusing'),
(14, 'Migrain'),
(15, 'Pendarahan dari hidung'),
(16, 'wajah kemerahan'),
(17, 'Mudah lelah'),
(18, 'penglihatan kabur'),
(19, 'mual berlebihan'),
(20, 'berkeringat'),
(21, 'cemas'),
(22, 'tegang'),
(23, 'Nyeri pada bagian tubuh'),
(24, 'Denyut jantung tidak  teratur'),
(25, 'Pembengkakan pada kaki  dan perut'),
(26, 'Cepat haus'),
(27, 'Sering kencing'),
(28, 'Penurunan berat badan'),
(29, 'Berat badan berlebihan'),
(30, 'Mengalami aterosklerosis  secara spontan'),
(31, 'Kurang aktivitas'),
(32, 'Mudah mengantuk'),
(33, 'Kaki bengkak'),
(34, 'Rasa sakit atau pegal pada tengkuk kepala'),
(35, 'Pegal sampai ke pundak'),
(36, 'Selulit'),
(37, 'Sakit pada lutut'),
(38, 'Varices'),
(39, 'Sulit bernafas'),
(40, 'Sendi terasa nyeri'),
(41, 'Sendi meradang'),
(42, 'Sendi bengkak'),
(43, 'Sendi panas'),
(44, 'Sendi kaku'),
(45, 'Kaki keseleo'),
(46, 'Benjolan disekitar sendi  yang meradang'),
(47, 'Tidak keluar urin'),
(48, 'Nafsu makan menurun Mual, pucat, kencing  sedikit, kram'),
(49, 'Merasa anemia'),
(50, 'Proporsi lemak bertambah'),
(51, 'Sakit pada lambung'),
(52, 'Sakit pada usus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `solusi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `keterangan`, `solusi`) VALUES
(9, 'Hipertensi', 'tekanan darah tinggi merupakan kondisi ketika tekanan darah di atas batas normal (130/80 mmHg atau lebih).', 'Diet Sehat,Kurangi Garam,Menjaga berat badan ideal,Melakukan aktivitas fisik secara teratur,Hindari Alkohol Berlebihan'),
(10, 'Jantung', 'kondisi ketika bagian jantung yang meliputi pembuluh darah jantung, selaput jantung, katup jantung, dan otot jantung mengalami gangguan.', 'perbaikan gaya hidup, pemberian obat-obatan untuk jantung, atau tindakan operasi, seperti operasi katup jantung atau transplantasi jantung.'),
(11, 'Diabetes mellitus', 'gangguan metabolisme kronis dengan penyebab yang beragam yang ditandai dengan tingginya kadar gula darah disertai dengan gangguan metabolisme karbohidrat, lemak, dan protein sebagai akibat gangguan fu', 'Mempertahankan berat badan ideal dengan mengonsumsi makanan rendah lemak,Mengonsumsi makanan tinggi serat seperti buah dan sayur,Mengurangi konsumsi makanan dan minuman manis,Berolahraga secara rutin'),
(12, 'Hiperkolesterolemia/dislipidemia', 'tingkat yang tidak sehat dari satu atau lebih jenis lipid (lemak) dalam darah.', 'Obat-obatan non-statin ini meliputi:  Ezetimibe (Zetia), Fibrat, seperti fenofibrate (Fenoglide), Penghambat PCSK9.'),
(13, 'Kolesterol darah', 'kadar kolesterol di dalam darah melebihi batas normal.', 'Berolahraga rutin,Mengonsumsi makanan sehat'),
(14, 'Obesitas', 'kondisi di mana terjadi penumpukan atau kelebihan lemak yang dapat mengganggu kesehatan.', 'mengatur pola makan sehat sesuai dengan kebutuhan asupan kalori harian dan aktif berolahraga setiap hari.'),
(15, 'Asam Urat', 'kondisi yang dapat menyebabkan gejala nyeri yang tak tertahankan, pembengkakan, serta adanya rasa panas di area persendian.', 'Obat antiinflamasi nonsteroid (NSAID), seperti aspirin (Bufferin), ibuprofen (Advil, Motrin), dan naproxen (Aleve).'),
(16, 'Ginjal', 'Penyakit ginjal dapat menyebabkan fungsi ginjal dalam membersihkan dan menyaring limbah atau racun dari darah menjadi terganggu.', 'Langkah-langkah seperti perubahan gaya hidup sehat, penggunaan obat-obatan sesuai resep dokter, pemantauan rutin, dan dukungan sosial sangat penting dalam mengelola kondisi ini'),
(17, 'Umur', 'penyakit dikarenakan bertambah usia', '-');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  ADD PRIMARY KEY (`id_aturan`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indeks untuk tabel `detail_basis_aturan`
--
ALTER TABLE `detail_basis_aturan`
  ADD KEY `id_aturan` (`id_aturan`),
  ADD KEY `id_gejala` (`id_gejala`);

--
-- Indeks untuk tabel `detail_konsultasi`
--
ALTER TABLE `detail_konsultasi`
  ADD KEY `id_gejala` (`id_gejala`),
  ADD KEY `id_konsultasi` (`id_konsultasi`);

--
-- Indeks untuk tabel `detail_penyakit`
--
ALTER TABLE `detail_penyakit`
  ADD KEY `id_konsultasi` (`id_konsultasi`),
  ADD KEY `id_penyakit` (`id_penyakit`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `basis_aturan`
--
ALTER TABLE `basis_aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
