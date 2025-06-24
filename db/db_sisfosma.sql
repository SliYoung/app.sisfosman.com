-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jun 2025 pada 15.19
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisfosma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_absen_session` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `statuss` enum('Hadir','Izin','Sakit','Alpha') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_absensi`
--

INSERT INTO `tb_absensi` (`id_absensi`, `id_siswa`, `id_absen_session`, `tanggal`, `jam`, `statuss`, `keterangan`) VALUES
(50, 13, 4, '2025-06-19', '21:30:14', 'Hadir', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absen_session`
--

CREATE TABLE `tb_absen_session` (
  `id_absen_session` int(11) NOT NULL,
  `id_jadwal_pelajaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `status_absen_session` enum('dibuka','ditutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_absen_session`
--

INSERT INTO `tb_absen_session` (`id_absen_session`, `id_jadwal_pelajaran`, `tanggal`, `jam_buka`, `jam_tutup`, `status_absen_session`) VALUES
(4, 17, '2025-06-19', '20:00:00', '23:23:00', 'dibuka'),
(5, 18, '2025-06-19', '15:00:00', '16:00:00', 'dibuka'),
(6, 19, '2025-06-19', '15:00:00', '16:00:00', 'dibuka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto_guru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama`, `jenis_kelamin`, `id_mapel`, `alamat`, `no_hp`, `email`, `foto_guru`) VALUES
(4, '198001011', 'Budi Santoso', 'L', 6, 'Jl. Merdeka No.1', '081234567891', 'budi.santoso@example.com', '6853c49234eadui-avatars.png'),
(5, '198002022', 'Siti Aminah', 'P', 7, 'Jl. Sudirman No.5', '081234567892', 'siti.aminah@example.com', '6853c49f751e4ui-avatars1.png'),
(6, '198003033', 'Agus Prasetyo', 'L', 8, 'Jl. Diponegoro No.8', '081234567893', 'agus.prasetyo@example.com', '6853c4ac5b196ui-avatars2.png'),
(7, '198004044', 'Rina Marlina', 'P', 9, 'Jl. Gajah Mada No.10', '081234567894', 'rina.marlina@example.com', '6853c4b97c2d6ui-avatars4.png'),
(8, '198005055', 'Dedi Hermawan', 'L', 10, 'Jl. Cendana No.2', '081234567895', 'dedi.hermawan@example.com', 'dedi.jpg'),
(9, '198006066', 'Yuni Astuti', 'P', 11, 'Jl. Mawar No.12', '081234567896', 'yuni.astuti@example.com', 'yuni.jpg'),
(10, '198007077', 'Anton Suhendra', 'L', 12, 'Jl. Melati No.14', '081234567897', 'anton.suhendra@example.com', 'anton.jpg'),
(11, '198008088', 'Lina Kusuma', 'P', 13, 'Jl. Kenanga No.16', '081234567898', 'lina.kusuma@example.com', 'lina.jpg'),
(12, '198009099', 'Teguh Wicaksono', 'L', 14, 'Jl. Anggrek No.18', '081234567899', 'teguh.wicaksono@example.com', 'teguh.jpg'),
(13, '198010101', 'Dewi Sartika', 'P', 15, 'Jl. Flamboyan No.20', '081234567800', 'dewi.sartika@example.com', 'dewi.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jadwal_pelajaran`
--

CREATE TABLE `tb_jadwal_pelajaran` (
  `id_jadwal_pelajaran` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu') NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jadwal_pelajaran`
--

INSERT INTO `tb_jadwal_pelajaran` (`id_jadwal_pelajaran`, `id_kelas`, `id_mapel`, `id_guru`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(17, 13, 6, 4, 'Senin', '07:00:00', '08:00:00'),
(18, 13, 7, 5, 'Senin', '08:00:00', '09:00:00'),
(19, 13, 8, 6, 'Selasa', '07:00:00', '08:00:00'),
(20, 14, 9, 7, 'Selasa', '08:00:00', '09:00:00'),
(21, 14, 10, 8, 'Rabu', '07:00:00', '08:00:00'),
(22, 14, 11, 9, 'Rabu', '08:00:00', '09:00:00'),
(23, 15, 12, 10, 'Kamis', '07:00:00', '08:00:00'),
(24, 15, 13, 11, 'Kamis', '08:00:00', '09:00:00'),
(25, 15, 14, 12, 'Jumat', '07:00:00', '08:00:00'),
(26, 16, 15, 13, 'Jumat', '08:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `tingkat` enum('X','XI','XII') NOT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `tingkat`, `id_guru`) VALUES
(13, 'IPA 1', 'X', 4),
(14, 'IPA 2', 'X', 5),
(15, 'IPA 1', 'XI', 12),
(16, 'IPA 2', 'XI', 13),
(17, 'IPA 1', 'XII', 5),
(18, 'IPA 2', 'XII', 9),
(19, 'IPS 1', 'X', 11),
(20, 'IPS 1', 'XI', 7),
(21, 'IPS 1', 'XII', 4),
(22, 'IPS 2', 'XII', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `kode_mapel`, `nama_mapel`) VALUES
(6, 'MAT01', 'Matematika'),
(7, 'BIO01', 'Biologi'),
(8, 'FIS01', 'Fisika'),
(9, 'KIM01', 'Kimia'),
(10, 'IND01', 'Bahasa Indonesia'),
(11, 'ING01', 'Bahasa Inggris'),
(12, 'EKO01', 'Ekonomi'),
(13, 'SEJ01', 'Sejarah'),
(14, 'GEO01', 'Geografi'),
(15, 'PEN01', 'Pendidikan Jasmani');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `nilai_angka` decimal(5,2) NOT NULL,
  `nilai_huruf` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengumpulan_tugas`
--

CREATE TABLE `tb_pengumpulan_tugas` (
  `id_pengumpulan_tugas` int(11) NOT NULL,
  `id_tugas` int(11) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `tanggal_kumpul` datetime DEFAULT CURRENT_TIMESTAMP,
  `file_jawaban` varchar(255) DEFAULT NULL,
  `catatan` text,
  `nilai` decimal(5,2) DEFAULT NULL,
  `status` enum('dikirim','dinilai') DEFAULT 'dikirim'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengumpulan_tugas`
--

INSERT INTO `tb_pengumpulan_tugas` (`id_pengumpulan_tugas`, `id_tugas`, `id_siswa`, `tanggal_kumpul`, `file_jawaban`, `catatan`, `nilai`, `status`) VALUES
(1, 1, 13, '2025-06-24 20:10:24', '685aa3c0d2545Surat Lamaran J&T.pdf', 'NNN', '80.00', 'dinilai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` enum('Aktif','Lulus','Keluar') NOT NULL DEFAULT 'Aktif',
  `foto_siswa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `id_kelas`, `tgl_masuk`, `status`, `foto_siswa`) VALUES
(13, '20231001', 'Ahmad Fauzi', 'L', 'Bandung', '2007-01-15', 'Jl. Mawar No.1', 13, '2023-07-10', 'Aktif', '6853c4d3e9cd0ui-avatars.png'),
(14, '20231002', 'Siti Nurhaliza', 'P', 'Jakarta', '2007-03-22', 'Jl. Melati No.2', 13, '2023-07-10', 'Aktif', 'siti.jpg'),
(15, '20231003', 'Dimas Pratama', 'L', 'Surabaya', '2006-11-05', 'Jl. Anggrek No.3', 13, '2022-07-12', 'Aktif', '6853c4f2d772aui-avatars1.png'),
(16, '20231004', 'Indah Permata', 'P', 'Semarang', '2006-12-10', 'Jl. Flamboyan No.4', 16, '2022-07-12', 'Lulus', 'indah.jpg'),
(17, '20231005', 'Rizky Maulana', 'L', 'Bekasi', '2007-02-08', 'Jl. Kenanga No.5', 16, '2023-07-10', 'Aktif', 'rizky.jpg'),
(18, '20231006', 'Putri Ayu', 'P', 'Depok', '2006-09-19', 'Jl. Cempaka No.6', 17, '2022-07-12', 'Keluar', 'putri.jpg'),
(19, '20231007', 'Fajar Nugroho', 'L', 'Bogor', '2007-06-25', 'Jl. Dahlia No.7', 17, '2023-07-10', 'Aktif', 'fajar.jpg'),
(20, '20231008', 'Aulia Rahma', 'P', 'Yogyakarta', '2006-10-30', 'Jl. Teratai No.8', 18, '2022-07-12', 'Lulus', 'aulia.jpg'),
(21, '20231009', 'Bayu Saputra', 'L', 'Cirebon', '2007-04-17', 'Jl. Sakura No.9', 18, '2023-07-10', 'Aktif', 'bayu.jpg'),
(22, '20231010', 'Nina Lestari', 'P', 'Padang', '2006-08-13', 'Jl. Mawar No.10', 18, '2022-07-12', 'Keluar', 'nina.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_jadwal_pelajaran` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `tanggal` date DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `file_tugas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tugas`
--

INSERT INTO `tb_tugas` (`id_tugas`, `id_jadwal_pelajaran`, `judul`, `deskripsi`, `tanggal`, `deadline`, `file_tugas`) VALUES
(1, 17, 'Aljabar', 'Halaman 10', '2025-06-24', '2025-06-25 11:11:00', '685aa38029677798-2534-1-PB.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','siswa') NOT NULL,
  `user_ref_id` int(11) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`, `user_ref_id`, `status`) VALUES
(4, 'admin', 'admin', 'admin', 0, 'aktif'),
(10, 'fasli', 'fasli', 'siswa', 13, 'aktif'),
(11, 'kasir', 'kasir', 'siswa', 15, 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tb_absen_session`
--
ALTER TABLE `tb_absen_session`
  ADD PRIMARY KEY (`id_absen_session`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_jadwal_pelajaran`
--
ALTER TABLE `tb_jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal_pelajaran`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_pengumpulan_tugas`
--
ALTER TABLE `tb_pengumpulan_tugas`
  ADD PRIMARY KEY (`id_pengumpulan_tugas`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tb_absen_session`
--
ALTER TABLE `tb_absen_session`
  MODIFY `id_absen_session` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_jadwal_pelajaran`
--
ALTER TABLE `tb_jadwal_pelajaran`
  MODIFY `id_jadwal_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengumpulan_tugas`
--
ALTER TABLE `tb_pengumpulan_tugas`
  MODIFY `id_pengumpulan_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
