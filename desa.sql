-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 04:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pinjaman_pokok` varchar(100) NOT NULL,
  `jasa` varchar(100) NOT NULL,
  `totaljasa` varchar(100) NOT NULL,
  `totalbayar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `pinjaman_pokok`, `jasa`, `totaljasa`, `totalbayar`) VALUES
(12, 'Hartati', '1500000', '1', '150000', '1650000'),
(13, 'Saharia', '1500000', '1', '150000', '1650000'),
(14, 'LAODE MUH ZULFARDINSYAH', '1500000', '1.5', '225000', '1725000'),
(15, 'nuridil fitriidris', '1500000', '1.5', '225000', '1725000'),
(16, 'nuridil fitriidris', '1500000', '1', '150000', '1650000');

-- --------------------------------------------------------

--
-- Table structure for table `badan_usaha`
--

CREATE TABLE `badan_usaha` (
  `id_badanusaha` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `file` varchar(800) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `badan_usaha`
--

INSERT INTO `badan_usaha` (`id_badanusaha`, `nama`, `file`, `tanggal`) VALUES
(2, 'LAODE MUH ZULFARDINSYAH', '10072021143237Perbaikan Hasil_Laode Muh ZulFardin Syah.pdf', '2021-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(500) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `judul`, `isi`, `gambar`, `tanggal`) VALUES
(27, ' OlympicAD Kontingen SMK Muhammadiyah 3 Metro Bawa Pulang 2 Emas dan 1 Perunggu', '<p>Dalam perhelatan akbar&nbsp;<strong>Olympic Ahmad Dahlan (OlympicAD) Nasional VI</strong>&nbsp;perguruan Muhammadiyah tahun 2021&nbsp;yang diselenggarakan oleh Majelis Pendidikan Dasar dan Menengah Pimpinan Pusat Muhammadiyah Pada tanggal 26 - 28 Oktober 2019 di Universitas Muhammadiyah Semarang, Jawa Tengah.</p>\r\n\r\n<p>Ajang dua tahunan yang di Kali ini di ikuti oleh 7500 Peserta dari tingkat SD/MI, SMP/MTs, SMA/MA/SMK Muhammadiyah se - Indonesia.&nbsp;Kontingen yang di kirimkan oleh SMK Muhammadiyah 3 Metro berhasil membawa pulang 2 Medali emas dan 1 Medali Perunggu.</p>\r\n\r\n<p>Emas pertama disumbangkan dari bidang lomba Majalah Sekolah, team Mulyojaten (Majalah SMK Muhammadiyah 3 Metro) kali ini berhasil menjadi yang terbaik dengan meraih point tertinggi dalam Penilaian tahap akhir.</p>\r\n\r\n<p>Pundi-pundi medali kembali bertambah untuk kontingen SMK Muhammadiyah 3 Metro. Cabang lomba Biologi berhasil mendaratkan medali perunggu dengan penuh perjuangan walau harus tetap harus berpuas diri di urutan ketiga.</p>\r\n\r\n<p>Tak mau kalah menjelang penutupan Olimpic Ahmad Dahlan ini, emas ketiga kembali di dulang dari bidang lomba Desain Website. Deni Wijaya Siswa Kelas XI TKJ SMK Muhammadiyah 3 Metro yang mengusung sub tema pembuatan website Amal Usaha Muhammadiyah juga berhasil menjadi yang terbaik dengan mengalahkan 66 Peserta lainnya dari jenjang SMA/MA/SMK.</p>\r\n\r\n<p>Selamat atas prestasi yang berhasil diraih oleh Kontingen SMK Muhammadiyah 3 Metro. Semoga dapat terus memotivasi siswa lainnya untuk dapat terus menorehkan prestasi di Tingkat Nasional.</p>\r\n\r\n<p>Unimus, 28 Oktober 2019 @ Unimus| Universitas Muhammadiyah Semarang</p>\r\n', '0820210844th1420210402th291019053851olympicad_kontingen_smk_muhammadiyah_3_metro_bawa_pulang_2_emas_dan_1_perunggu.jpeg', '2021-03-10'),
(28, 'Cegah Corona, Farmasi SMK Muhammadiyah 3 Metro Produksi Hand Sanitizer Herbal', '<p><strong>Hand Sanitizer</strong>&nbsp;Herbal Adalah Salah Satu Terobosan Inovasi Terbaru Dari Siswa - Siswi Program Keahlian Farmasi Yang Hadir Untuk Ikut Mewarnai Dunia Kesehatan Dalam Memerangi Virus Covid-19 Yang Sedang Mewabah.</p>\r\n\r\n<p>Terbuat Dari&nbsp;<em>Citri hystricis Pericarpium</em>&nbsp;Atau Biasa Kita Sebut Dengan Jeruk Purut Yang Diproses Sedemikian Rupa Hingga Aman Digunakan Oleh Manusia. Produk ini bukan Hanya sekedar prototype saja namun produk ini telah benar-benar diproduksi secara masal dan diolah secara langsung di Laboratorium Produksi Farmasi SMK Muhammadiyah 3 Metro guna memenuhi banyaknya permintaan akan Hand Sanitizer yang mulai menjadi barang langka dipasaran.</p>\r\n\r\n<p>Kalau Masih Penasaran Ingin Mencoba dan Silahkan Datang Ke Apotik Simulasi SMK Muhammadiyah 3 Metro.</p>\r\n', '0820210853th1420210422th160320085955cegah_corona_farmasi_smk_muhammadiyah_3_metro_produksi_hand_sanitizer_herbal.jpeg', '2021-07-08'),
(29, 'SISWA JURUSAN ANALIS KESEHATAN MELAKSANAKAN PRAKTIK KERJA LAPANGAN', '<p><strong>SMK Muhammadiyah 3 Metro&nbsp;-</strong>&nbsp;Tepatnya tanggal&nbsp;06 Januari 2020 atau&nbsp;hari pertama masuk sekolah di Semester Genap tahun pelajaran 2019/2020 menjadi langkah awal bagi seluruh guru dan staff serta siswa SMK Muhammadiyah 3 Metro. Mengawali aktifitas KBM dengan melaksanakan aktifitas rutin yakni upacara bendera paska libur semesteran.</p>\r\n\r\n<p>Dalam semester genap ini SMK Muhammadiyah 3 Metro menjalankan program Praktik Kerja Lapangan (PKL) Khusus Jurusan Analis Kesehatan. Kegiatan diikuti oleh siswa Kelas XI yang akan berlangsung selama 3 bulan sebagai salah satu syarat dalam kelulusan.</p>\r\n\r\n<p>Kegiatan PKL dilaksanakan di Rumah Sakit Umum Muhammadiyah Kota Metro. Dalam penyerahan siswa PKL diterima oleh Wakil Direktur Binarohani dan Pencitraan Abdurrahim Hamdi, MA.&nbsp;<strong>(TRI)</strong></p>\r\n', '0820210853th1420210440th090120105054siswa_jurusan_analis_kesehatan_melaksanakan_praktik_kerja_lapangan.jpeg', '2021-07-08'),
(30, 'Festival Pendidikan Indonesia', '<p>Udah pada nggak sabar nungguin kan kapan Festival Pendidikan Indonesia 2021 dilaksanakan?</p>\r\n\r\n<p>Dalam rangka memeriahkan seperempat abad SMK Muhammadiyah 3 Metro dengan menjunjung &quot;Semangat Melayani Indonesia&quot; kami mempersembahkan Festival Pendidikan Indonesia.</p>\r\n\r\n<p>Mengundang seluruh pelaku Pendidikan pada Jenjang SMP/MTs, SMA/MA dan SMK di Seluruh Indonesia untuk dapat bersama-sama menyebarkan semangat kebangkitan dunia pendidikan pada era pandemi.</p>\r\n\r\n<p>Yuk, Kita simak bersama waktu pelaksanaan perlombaanya:</p>\r\n\r\n<p>1. Pendaftaran dan Pengumpulan Hasil&nbsp;<br />\r\n01 -15 Februari 2021</p>\r\n\r\n<p>2. Penilaian dan Penjurian<br />\r\n16-25 Februari 2021</p>\r\n\r\n<p>3. Resepsi Milad dan Pengumuman<br />\r\n27 Februari 2021</p>\r\n\r\n<p>Untuk informasi Pendaftaran Festival Pendidikan Indonesial langsung aja klik link dibawah ini:</p>\r\n\r\n<p>festival.smkmuh3metro.sch.id</p>\r\n\r\n<p>Yuk terus maksimalkan potensi kita dalam masa pandemi ini,<br />\r\nSalam Semangat Melayani Indonesia.</p>\r\n\r\n<p>Informasi Pendaftaran : &nbsp;<br />\r\n- 08127874272<br />\r\n- 082279716959</p>\r\n', '0820210856th1420210755th130221090237festival_pendidikan_indonesia.jpeg', '2021-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `kerjasama`
--

CREATE TABLE `kerjasama` (
  `id_kerjasama` int(11) NOT NULL,
  `namausaha` varchar(100) NOT NULL,
  `proposalusaha` varchar(200) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `kegiatanusaha` varchar(500) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kerjasama`
--

INSERT INTO `kerjasama` (`id_kerjasama`, `namausaha`, `proposalusaha`, `foto`, `kegiatanusaha`, `email`, `tanggal`) VALUES
(5, 'fardin', '2020210933thBerkas Permohonan.pdf', 'fardin2020210933thilovepdf_merged.pdf', 'as', 'nuridilfitriidris@gmail.com', '20-Mar-2021');

-- --------------------------------------------------------

--
-- Table structure for table `ksp1`
--

CREATE TABLE `ksp1` (
  `id_ksp1` int(11) NOT NULL,
  `id_anggota` int(100) NOT NULL,
  `sdh_pokok` int(100) NOT NULL,
  `sdh_jasa` int(100) NOT NULL,
  `totpokok` varchar(100) NOT NULL,
  `totjasa` varchar(100) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ksp1`
--

INSERT INTO `ksp1` (`id_ksp1`, `id_anggota`, `sdh_pokok`, `sdh_jasa`, `totpokok`, `totjasa`, `bulan`, `tahun`, `waktu`) VALUES
(14, 12, 150000, 15000, '300000', '30000', 'November', '2019', '11-05-2021 09:26:29'),
(15, 12, 150000, 15000, '450000', '45000', 'Desember', '2019', '11-05-2021 09:30:52'),
(16, 13, 150000, 15000, '150000', '15000', 'November', '2021', '11-05-2021 10:06:24'),
(17, 12, 150000, 15000, '150000', '15000', 'Oktober', '2019', '11-05-2021 09:24:09'),
(18, 12, 150000, 15000, '300000', '30000', 'November', '2019', '11-05-2021 09:26:29'),
(19, 12, 150000, 15000, '450000', '45000', 'Desember', '2019', '11-05-2021 09:30:52'),
(20, 13, 150000, 15000, '150000', '15000', 'November', '2021', '11-05-2021 10:06:24'),
(21, 12, 150000, 15000, '150000', '15000', 'Oktober', '2019', '11-05-2021 09:24:09'),
(22, 12, 150000, 15000, '300000', '30000', 'November', '2019', '11-05-2021 09:26:29'),
(23, 12, 150000, 15000, '450000', '45000', 'Desember', '2019', '11-05-2021 09:30:52'),
(24, 13, 150000, 15000, '150000', '15000', 'November', '2021', '11-05-2021 10:06:24'),
(25, 12, 150000, 15000, '150000', '15000', 'Oktober', '2019', '11-05-2021 09:24:09'),
(26, 12, 150000, 15000, '300000', '30000', 'November', '2019', '11-05-2021 09:26:29'),
(27, 12, 150000, 15000, '450000', '45000', 'Desember', '2019', '11-05-2021 09:30:52'),
(28, 13, 150000, 15000, '150000', '15000', 'November', '2021', '11-05-2021 10:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `ksp15`
--

CREATE TABLE `ksp15` (
  `id_ksp15` int(11) NOT NULL,
  `id_anggota` int(100) NOT NULL,
  `sdh_pokok` int(100) NOT NULL,
  `sdh_jasa` int(100) NOT NULL,
  `totpokok` varchar(100) NOT NULL,
  `totjasa` varchar(100) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ksp15`
--

INSERT INTO `ksp15` (`id_ksp15`, `id_anggota`, `sdh_pokok`, `sdh_jasa`, `totpokok`, `totjasa`, `bulan`, `tahun`, `waktu`) VALUES
(2, 14, 150000, 15000, '168888', '30000', 'Mei', '2018', '12-05-2021 16:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `kuliner`
--

CREATE TABLE `kuliner` (
  `id_kuliner` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `file` varchar(500) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuliner`
--

INSERT INTO `kuliner` (`id_kuliner`, `nama`, `file`, `tanggal`) VALUES
(1, 'LAODE MUH ZULFARDINSYAH', '11072021041535Petunjuk-bagi-Penulis-Jurnal-UJTV _R01.pdf', '2021-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `pelunasan_pinjaman`
--

CREATE TABLE `pelunasan_pinjaman` (
  `id_pelunasan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bayarke` varchar(100) NOT NULL,
  `lanjutpinjam` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `sisapinjam` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelunasan_pinjaman`
--

INSERT INTO `pelunasan_pinjaman` (`id_pelunasan`, `nama`, `bayarke`, `lanjutpinjam`, `nik`, `sisapinjam`, `tanggal`) VALUES
(3, 'LAODE MUH ZULFARDINSYAH', '10', 'Tidak', '7602012104650001', '2', '20-Mar-2021'),
(4, 'Nama Sendiri', '10', 'Ya', '7602012104650001', '2', '20-Mar-2021');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_pinjaman`
--

CREATE TABLE `permohonan_pinjaman` (
  `id_perpinjaman` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `nokk` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `nik` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `nohp` varchar(500) NOT NULL,
  `jmlpengajuan` varchar(500) NOT NULL,
  `fotousaha` varchar(500) NOT NULL,
  `fotoketusaha` varchar(500) NOT NULL,
  `tanggal` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan_pinjaman`
--

INSERT INTO `permohonan_pinjaman` (`id_perpinjaman`, `nama`, `nokk`, `alamat`, `nik`, `email`, `nohp`, `jmlpengajuan`, `fotousaha`, `fotoketusaha`, `tanggal`) VALUES
(10, 'LAODE MUH ZULFARDINSYAH', '7602012104650001', 'galesong utara', '7602012104650001', 'laode@gmail.com', '085240330927', '1', '2020210928thBerkas Permohonan.pdf', '2020210928thakun simpkb_LAODE.pdf', '20-Mar-2021');

-- --------------------------------------------------------

--
-- Table structure for table `pertamini`
--

CREATE TABLE `pertamini` (
  `id_pertamini` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `file` varchar(500) NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertamini`
--

INSERT INTO `pertamini` (`id_pertamini`, `nama`, `file`, `tanggal`) VALUES
(2, 'LAODE MUH ZULFARDINSYAH', '11072021040738Petunjuk-bagi-Penulis-Jurnal-UJTV _R01.pdf', '2021-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(10) NOT NULL,
  `isiprofil` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `isiprofil`) VALUES
(1, '<p>Visi misi di isi disni</p>\r\n'),
(2, '2003202108213519032021060338Struktur_2019-03-27-11-49-29_SOTK-LIPI---2019-.jpg'),
(3, '<p style=\"text-align:center\"><strong>SUSUNAN PENGURUS BADAN USAHA MILIK DESA</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong>(BUMDes) &ldquo;BAJI PA&rsquo;MAI&rdquo;</strong></p>\r\n\r\n<p style=\"text-align:center\"><strong>DESA TAMALATE KEC. GALESONG UTARA KAB. TAKALAR</strong></p>\r\n\r\n<p><br />\r\nKOMISARIS&nbsp; &nbsp; &nbsp; &nbsp; : KEPALA DESA<br />\r\nPENGAWAS&nbsp; &nbsp; &nbsp; &nbsp;: BPD DESA TAMALATE<br />\r\nKETUA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : SUMAWATI, S.Ag<br />\r\nWAKIL KETUA&nbsp;&nbsp; &nbsp;: MUH NUR KHAER AHMAD<br />\r\nSEKRETARIS&nbsp; &nbsp; &nbsp;: HIJAR<br />\r\nBENDAHARA&nbsp; &nbsp; &nbsp;: BUDAYA<br />\r\nANGGOTA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 1. KEPALA UNIT USAHA SPP : SAHARIA<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 2. KEPALA UNIT USAHA UMUM : NURAENI&nbsp;&nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Link <a href=\"https://drive.google.com/file/d/1VWAjWfjdoDm4hdPlGmz5KfPu_knL6KIV/view?usp=sharing\" target=\"_blank\">Download SK Disini</a></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `gambar`, `active`) VALUES
(3, '0206202115513823082018111110slide5-compressed.jpg', 1),
(4, '0206202115515823082018111053slide4-compressed.jpg', 0),
(5, '0206202115521323082018111040slide3-compressed.jpg', 0),
(6, '010720210305463020210301thWhatsApp Image 2021-05-21 at 17.37.03.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` char(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `level` enum('Administrator','Sapras','TKJ','TAV','TPHP','TBSM','TKR','TLAS','DPIB') NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `nama_lengkap`, `level`, `gambar`) VALUES
('1', 'admin', '66b65567cedbc743bda3417fb813b9ba', 'admin', 'Administrator', '2003202115222896686852_2978769578877591_8410887008976633856_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `badan_usaha`
--
ALTER TABLE `badan_usaha`
  ADD PRIMARY KEY (`id_badanusaha`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD PRIMARY KEY (`id_kerjasama`);

--
-- Indexes for table `ksp1`
--
ALTER TABLE `ksp1`
  ADD PRIMARY KEY (`id_ksp1`);

--
-- Indexes for table `ksp15`
--
ALTER TABLE `ksp15`
  ADD PRIMARY KEY (`id_ksp15`);

--
-- Indexes for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`id_kuliner`);

--
-- Indexes for table `pelunasan_pinjaman`
--
ALTER TABLE `pelunasan_pinjaman`
  ADD PRIMARY KEY (`id_pelunasan`);

--
-- Indexes for table `permohonan_pinjaman`
--
ALTER TABLE `permohonan_pinjaman`
  ADD PRIMARY KEY (`id_perpinjaman`);

--
-- Indexes for table `pertamini`
--
ALTER TABLE `pertamini`
  ADD PRIMARY KEY (`id_pertamini`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `badan_usaha`
--
ALTER TABLE `badan_usaha`
  MODIFY `id_badanusaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kerjasama`
--
ALTER TABLE `kerjasama`
  MODIFY `id_kerjasama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ksp1`
--
ALTER TABLE `ksp1`
  MODIFY `id_ksp1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `ksp15`
--
ALTER TABLE `ksp15`
  MODIFY `id_ksp15` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kuliner`
--
ALTER TABLE `kuliner`
  MODIFY `id_kuliner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelunasan_pinjaman`
--
ALTER TABLE `pelunasan_pinjaman`
  MODIFY `id_pelunasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permohonan_pinjaman`
--
ALTER TABLE `permohonan_pinjaman`
  MODIFY `id_perpinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pertamini`
--
ALTER TABLE `pertamini`
  MODIFY `id_pertamini` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
