-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Sep 2018 pada 13.20
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siabsen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id_absen` int(6) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time NOT NULL,
  `id_rfid` int(6) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_absen`, `tanggal`, `waktu`, `id_rfid`, `status`) VALUES
(5, '2018-09-18', '00:00:00', 78, 'Hadir'),
(6, '2018-09-18', '12:31:58', 78, 'Hadir'),
(7, '2018-09-24', '14:12:53', 78, 'Izin'),
(8, '2018-09-24', '14:16:30', 78, 'Sakit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `level` enum('admin','guru','siswa') DEFAULT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nik`, `nama`, `username`, `password`, `alamat`, `email`, `lat`, `lng`, `level`, `foto`) VALUES
(1, '', 'SMKN 10 BANDUNG', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Jl. Budhi, Jalan Raya Cilember, Sukaraja, Cicendo, Jawa Barat 40153', '', -6.890710, 107.558304, 'admin', 'download.jpg'),
(3, '1102365247', 'Mukhtar Saputra, S.Kom', 'mukhtark', '6eea9b7ef19179a06954edd0f6c05ceb', 'Bandung', '', NULL, NULL, 'guru', ''),
(6, '10116388', 'Agun Wiguna', 'agunwgn', '6eea9b7ef19179a06954edd0f6c05ceb', 'Bandung', '', NULL, NULL, 'siswa', ''),
(7, '23234', 'Rima', 'rimaxix', '5b14fb286c4270cb3516446b4b03fce7', 'Bandung', 'ergunikom.official@gmail.com', NULL, NULL, 'siswa', 'student.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat`
--

CREATE TABLE `alat` (
  `id` int(6) NOT NULL,
  `key` varchar(8) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alat`
--

INSERT INTO `alat` (`id`, `key`, `nip`) VALUES
(2, 'WR7S4JCY', '20304056');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(60) DEFAULT NULL,
  `jk` varchar(12) DEFAULT NULL,
  `alamat` text,
  `kontak` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `jk`, `alamat`, `kontak`, `email`) VALUES
('1102365247', 'Mukhtar Saputra, S.Kom', 'Laki-Laki', 'Bandung', '087654567890', 'mukhtar@gmail.com'),
('20304050', 'Dadi Rusyadi, S.Pd', 'Laki-Laki', 'Sadananya', '087654789765', 'dadi@gmail.com'),
('20304056', 'Ratna Indriani, S.Pd.', 'Perempuan', 'Ciamis', '087656543234', 'ratna@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info`
--

CREATE TABLE `info` (
  `id` int(6) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info`
--

INSERT INTO `info` (`id`, `title`, `description`, `created_at`) VALUES
(2, 'Pengumuman', 'Besok Libur', '2018-09-10 03:56:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(6) NOT NULL,
  `matpel` varchar(40) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `hari` varchar(20) DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `waktu2` time DEFAULT NULL,
  `id_kelas` int(6) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `matpel`, `nip`, `hari`, `waktu`, `waktu2`, `id_kelas`, `tahun`, `semester`) VALUES
(1, 'Bahasa Inggris', '20304050', 'Selasa', '07:00:00', '09:15:00', 6, ' 2018/2019', 'Ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(6) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(6, 'X-TKJ-4'),
(7, 'X-TKJ-2'),
(8, 'X-TKJ-1'),
(9, 'X-TKJ-3'),
(10, 'X-TKJ-5'),
(11, 'X-TKJ-6'),
(12, 'X-TKJ-7'),
(13, 'X-TKJ-8'),
(14, 'X-TKJ-9'),
(15, 'X-TKJ-10'),
(16, 'X-TKJ-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` int(6) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `kontak` varchar(12) DEFAULT NULL,
  `pesan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(8) NOT NULL,
  `nama` varchar(60) DEFAULT NULL,
  `jk` varchar(12) DEFAULT NULL,
  `alamat` text,
  `kontak` varchar(12) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  `parent` varchar(50) DEFAULT NULL,
  `kontakp` varchar(12) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `id_kelas` int(6) DEFAULT NULL,
  `id_rfid` int(6) NOT NULL,
  `lat` float(10,4) NOT NULL,
  `lng` float(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jk`, `alamat`, `kontak`, `email`, `agama`, `parent`, `kontakp`, `nip`, `id_kelas`, `id_rfid`, `lat`, `lng`) VALUES
('10116388', 'Agun Wiguna', 'L', 'Bandung', '082326369078', 'ergunikom.official@gmail.com', 'Islam', 'Asep', '087656434234', '20304056', 15, 98, -6.8907, 107.5583),
('10116522', 'Rama Muhammad S', 'L', 'Bandung', '087654567890', 'rama@gmail.com', 'Islam', 'Sugiyanto', '085434789098', '20304050', 7, 78, -6.8907, 107.5583),
('232324', 'Aditiya', 'L', 'bandung', '345678909', 'adit@gmail.com', 'Islam', 'Asep Sunandar', '089765434677', '1102365247', 7, 23, 0.0000, 0.0000),
('23234', 'Rima', 'P', 'Bandung', '089786545678', 'ergunikom.official@gmail.com', 'Islam', 'Asep', '087656789765', '20304056', 7, 79, -6.8907, 107.5583);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `absensi_ibfk_1` (`id_rfid`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`nip`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_rfid` (`id_rfid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absen` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `alat`
--
ALTER TABLE `alat`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `info`
--
ALTER TABLE `info`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_rfid`) REFERENCES `siswa` (`id_rfid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `alat`
--
ALTER TABLE `alat`
  ADD CONSTRAINT `alat_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
