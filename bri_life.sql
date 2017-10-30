-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01 Okt 2017 pada 04.58
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bri_life`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gender`
--

CREATE TABLE `gender` (
  `id_gender` int(3) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `gender`
--

INSERT INTO `gender` (`id_gender`, `gender`) VALUES
(1, 'Laki-Laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(3) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Pimpinan Cabang'),
(2, 'Sales Manajer'),
(3, 'Unit Manajer'),
(4, 'Staff Pelaksana'),
(5, 'Agen'),
(6, 'Driver'),
(7, 'Office Boy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nip` int(40) NOT NULL,
  `password` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `ttl` date NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_jabatan` int(3) NOT NULL,
  `id_level` int(3) NOT NULL,
  `id_gender` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nip`, `password`, `nama`, `tempat_lahir`, `ttl`, `tanggal_masuk`, `id_jabatan`, `id_level`, `id_gender`) VALUES
(1, 1324101001, 'karyawan', 'Mamdani', 'Jember', '2017-07-01', '2017-07-03', 4, 3, 1),
(2, 1324101002, 'karyawan', 'Sugeno', 'Makassar', '2017-07-05', '2017-07-02', 5, 3, 1),
(3, 1324101003, 'admin', 'Supeno', 'Banyuwangi', '2017-07-14', '2017-07-04', 2, 1, 1),
(4, 1324101004, 'pimpinan', 'Sugeng', 'Surabaya', '2017-07-01', '2017-07-02', 4, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `id_jabatan`) VALUES
(1, 'mutu kerja sales manajer', 2),
(2, 'inisiatif sales manajer', 2),
(3, 'pengetahuan pekerjaan sales manajer', 2),
(4, 'kehadiran sales manajer', 2),
(5, 'sikap sales manajer', 2),
(6, 'mutu kerja unit manajer', 3),
(7, 'inisiatif unit manajer', 3),
(8, 'pengetahuan pekerjaan unit manajer', 3),
(9, 'kehadiran unit manajer', 3),
(10, 'sikap unit manajer', 3),
(11, 'mutu kerja staf pelaksana', 4),
(12, 'inisiatif staf pelaksana', 4),
(13, 'pengetahuan pekerjaan staf pelaksana', 4),
(14, 'kehadiran staf pelaksana', 4),
(15, 'sikap staf pelaksana', 4),
(16, 'mutu kerja agen', 5),
(17, 'inisiatif agen', 5),
(18, 'pengetahuan pekerjaan agen', 5),
(19, 'kehadiran agen', 5),
(20, 'sikap agen', 5),
(21, 'mutu kerja driver', 6),
(22, 'inisiatif driver', 6),
(23, 'pengetahuan pekerjaan driver', 6),
(24, 'kehadiran driver', 6),
(25, 'sikap driver', 6),
(26, 'mutu kerja office boy', 7),
(27, 'inisiatif office boy', 7),
(28, 'pengetahuan pekerjaan office boy', 7),
(29, 'kehadiran office boy', 7),
(30, 'sikap office boy', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id_kuesioner` int(11) NOT NULL,
  `kuesioner` text NOT NULL,
  `keterangan` text NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuesioner`
--

INSERT INTO `kuesioner` (`id_kuesioner`, `kuesioner`, `keterangan`, `id_kriteria`) VALUES
(1, 'Membuka pasar dan memelihara hubungan baik dengan pihak-pihak terkait (termasuk dengan pimpinan unit kerja BRI) dalam rangka pengembangan bisnis\r\n', 'Keberhasilan membuka pasar dan meningkatkan keuntungan dengan presentase penilaian \nskor 1 : 0-14% \nskor 2 : 15-29%\nskor 3 : 30-44%\nskor 4 : 45-59%\nskor 5 : 60-74%\nskor 6 : 75-89%\nskor 7 : 90-100%', 1),
(2, 'Memantau aktivitas tenaga penjualan dibawahnya dalam melakukan kegiatan prospek hingga terjadinya penutupan\r\n', '', 1),
(3, 'Memastikan tenaga penjualan dibawah binaannya seperti Unit Manajer melakukan penjualan dan rekrut\r\n', '', 1),
(4, 'Melakukan tugas dengan teliti\r\n', '', 1),
(5, 'Lebih tanggap dalam menyelesaikan pekerjaan\r\n', '', 1),
(6, 'Pekerjaan dapat terselesaikan dengan waktu yang tepat\r\n', '', 1),
(7, 'Melakukan pekerjaan dengan penuh ketepatan, sesuai dengan kewajiban, tidak kurang dan tidak lebih\r\n', '', 1),
(8, 'Bekerja dengan penuh ketelitian\r\n', '', 1),
(9, 'Dapat memanfaatkan ketrampilan yang dimiliki dengan optimal\r\n', '', 1),
(10, 'Selalu menjaga kebersihan area kerja\r\n', '', 1),
(11, 'Melakukan program pembinaan dan pengendalian performa bisnis kantor penjualan\r\n', '', 2),
(12, 'Pemantauan daftar prospek bagi tenaga penjualan\r\n', '', 2),
(13, 'Bekerja sesuai dengan prosedur kerja\r\n', '', 2),
(14, 'Dapat meminimalisir kesalahan dalam melaksanakan pekerjaan\r\n', '', 2),
(15, 'Selalu disiplin dalam bekerja\r\n', '', 2),
(16, 'Selalu mengikuti intruksi yang diberikan oleh atasan\r\n', '', 2),
(17, 'Selalu memperhatikan keamanan diri dan sekitar\r\n', '', 2),
(18, 'Selalu memperhatikan keselamatan diri dan sekitar\r\n', '', 2),
(19, 'Selalu menyelesaikan pekerjaan sesuai target yang telah ditetapkan\r\n', '', 2),
(20, 'Melakukan rekrut tenaga penjualan yang berkualitas\r\n', '', 3),
(21, 'Pemantauan aktivitas call by phone\r\n', '', 3),
(22, 'Dapat memahami tugas sesuai dengan bidangnya\r\n', '', 3),
(23, 'Mengetahui rincian pekerjaan yang akan dipasarkan\r\n', '', 3),
(24, 'Pekerjaan sudah sesuai dengan skill yang dimiliki\r\n', '', 3),
(25, 'Memahami segala aspek yang berkaitan dengan pekerjaan\r\n', '', 3),
(26, 'Mengetahui apa saja tugas - tugas yang menjadi tanggung jawabnya\r\n', '', 3),
(27, 'Memiliki cara dalam menyelesaikan tugas - tugas dengan efektif dan efisien\r\n', '', 3),
(28, 'Selalu datang tepat waktu sesuai dengan jam masuk kerja yang ada diperusahaan\r\n', '', 4),
(29, 'Tidak merasa keberatan dengan jam masuk kerja yang berlaku di tempat kerja\n', '', 4),
(30, 'Tidak merasa keberatan dengan jam pulang kerja yang berlaku di tempat kerja\n', '', 4),
(31, 'Mengakhiri pekerjaan sesuai dengan peraturan yang berlaku\r\n', '', 4),
(32, 'Melakukan pekerjaan dengan sikap percaya diri\r\n', '', 5),
(33, 'Melakukan pekerjaan dengan sikap yang tanggap\r\n', '', 5),
(34, 'Intruksi atas pekerjaan yang diberikan mudah dipahami\r\n', '', 5),
(35, 'Melakukan pekerjaan sesuai intruksi yang diberikan\r\n', '', 5),
(36, 'Senang hati membantu pekerjaan teman yang membutuhkan\r\n', '', 5),
(37, 'Memiliki hubungan yang baik dengan rekan kerja\r\n', '', 5),
(38, 'Membangun tim penjualan (merekrut-melatih-memimpin)\r\n', '', 6),
(39, 'Mengikuti program menjadi Trainer/Mentor\r\n', '', 6),
(40, 'Melakukan tugas dengan teliti\r\n', '', 6),
(41, 'Lebih tanggap dalam menyelesaikan pekerjaan\r\n', '', 6),
(42, 'Pekerjaan dapat terselesaikan dengan waktu yang tepat\r\n', '', 6),
(43, 'Melakukan pekerjaan dengan penuh ketepatan, sesuai dengan kewajiban, tidak kurang dan tidak lebih\r\n', '', 6),
(44, 'Bekerja dengan penuh ketelitian\r\n', '', 6),
(45, 'Dapat memanfaatkan ketrampilan yang dimiliki dengan optimal\r\n', '', 6),
(46, 'Selalu menjaga kebersihan area kerja\r\n', '', 6),
(47, 'Melakukan presentasi penjualan\r\n', '', 7),
(48, 'Melatih keterampilan penjualan untuk bawahan\r\n', '', 7),
(49, 'Bekerja sesuai dengan prosedur kerja\r\n', '', 7),
(50, 'Dapat meminimalisir kesalahan dalam melaksanakan pekerjaan\r\n', '', 7),
(51, 'Selalu disiplin dalam bekerja\r\n', '', 7),
(52, 'Selalu mengikuti intruksi yang diberikan oleh atasan\r\n', '', 7),
(53, 'Selalu memperhatikan keamanan diri dan sekitar\r\n', '', 7),
(54, 'Selalu memperhatikan keselamatan diri dan sekitar\r\n', '', 7),
(55, 'Selalu menyelesaikan pekerjaan sesuai target yang telah ditetapkan\r\n', '', 7),
(56, 'Mencapai target yang ditetapkan\r\n', '', 8),
(57, 'Dapat memahami tugas sesuai dengan bidangnya\r\n', '', 8),
(58, 'Mengetahui rincian pekerjaan yang akan dipasarkan\r\n', '', 8),
(59, 'Pekerjaan sudah sesuai dengan skill yang dimiliki\r\n', '', 8),
(60, 'Memahami segala aspek yang berkaitan dengan pekerjaan\r\n', '', 8),
(61, 'Mengetahui apa saja tugas - tugas yang menjadi tanggung jawabnya\r\n', '', 8),
(62, 'Memiliki cara dalam menyelesaikan tugas - tugas dengan efektif dan efisien\r\n', '', 8),
(63, 'Selalu datang tepat waktu sesuai dengan jam masuk kerja yang ada diperusahaan\r\n', '', 9),
(64, 'Tidak merasa keberatan dengan jam masuk kerja yang berlaku di tempat kerja\r\n', '', 9),
(65, 'Tidak merasa keberatan dengan jam pulang kerja yang berlaku di tempat kerja\r\n', '', 9),
(66, 'Mengakhiri pekerjaan sesuia dengan peraturan yang berlaku\r\n', '', 9),
(67, 'Melakukan pekerjaan dengan sikap percaya diri\r\n', '', 10),
(68, 'Melakukan pekerjaan dengan sikap yang tanggap\r\n', '', 10),
(69, 'Intruksi atas pekerjaan yang diberikan mudah dipahami\r\n', '', 10),
(70, 'Melakukan pekerjaan sesuai intruksi yang diberikan\r\n', '', 10),
(71, 'Senang hati membantu pekerjaan teman yang membutuhkan\r\n', '', 10),
(72, 'Memiliki hubungan yang baik dengan rekan kerja\r\n', '', 10),
(73, 'Membantu petugas pemasaran dalam mempersiapkan kebutuhan perangkat penjualan (Brosur, Proposal, Banner, dll)\r\n', '', 11),
(74, 'Mencatat seluruh kegiatan produktifitas petugas penjualan termasuk mengatur penggunaan kendaraan bagi petugas penjualan\r\n', '', 11),
(75, 'Meneliti administrasi bahwa pencocokan data dan tanda tangan telah sesuai dengan ketentuan yang berlaku\r\n', '', 11),
(76, 'Melakukan koordinasi dan komunikasi dengan kepala seksi pelayanan bisnis individu untuk melakukan validasi premi pertama atas inputan data yang telah dilakukan\r\n', '', 11),
(77, 'Melakukan tugas dengan teliti\r\n', '', 11),
(78, 'Lebih tanggap dalam menyelesaikan pekerjaan\r\n', '', 11),
(79, 'Pekerjaan dapat terselesaikan dengan waktu yang tepat\r\n', '', 11),
(80, 'Melakukan pekerjaan dengan penuh ketepatan, sesuai dengan kewajiban, tidak kurang dan tidak lebih\r\n', '', 11),
(81, 'Bekerja dengan penuh ketelitian\r\n', '', 11),
(82, 'Dapat memanfaatkan ketrampilan yang dimiliki dengan optimal\r\n', '', 11),
(83, 'Selalu menjaga kebersihan area kerja\r\n', '', 11),
(84, 'Membuat surat penawaran program Asuransi\r\n', '', 12),
(85, 'Melakukan penginputan surat permintaan Asuransi Jiwa (SPAJ) dan surat permintaan Asuransi Kumpulan (SPAK)\r\n', '', 12),
(86, 'Melakukan konfirmasi penyesuaian data dengan calon pemegang polis\r\n', '', 12),
(87, 'Bekerja sesuai dengan prosedur kerja\r\n', '', 12),
(88, 'Dapat meminimalisir kesalahan dalam melaksanakan pekerjaan\r\n', '', 12),
(89, 'Selalu disiplin dalam bekerja\r\n', '', 12),
(90, 'Selalu mengikuti intruksi yang diberikan oleh atasan\r\n', '', 12),
(91, 'Selalu memperhatikan keamanan diri dan sekitar\r\n', '', 12),
(92, 'Selalu memperhatikan keselamatan diri dan sekitar\r\n', '', 12),
(93, 'Selalu menyelesaikan pekerjaan sesuai target yang telah ditetapkan\r\n', '', 12),
(94, 'Membuat ilustrasi produk Asuransi\r\n', '', 13),
(95, 'Meneliti seluruh isian SPAJ sudah lengkap dan sesuai ketentuan yang berlaku, bukti bayar premi telah disampaikan\r\n', '', 13),
(96, 'Melakukan penginputan data peserta kedalam satelit\r\n', '', 13),
(97, 'Dapat memahami tugas sesuai dengan bidangnya\r\n', '', 13),
(98, 'Mengetahui rincian pekerjaan yang akan dipasarkan\r\n', '', 13),
(99, 'Pekerjaan sudah sesuai dengan skill yang dimiliki\r\n', '', 13),
(100, 'Memahami segala aspek yang berkaitan dengan pekerjaan\r\n', '', 13),
(101, 'Mengetahui apa saja tugas - tugas yang menjadi tanggung jawabnya\r\n', '', 13),
(102, 'Memiliki cara dalam menyelesaikan tugas - tugas dengan efektif dan efisien\r\n', '', 13),
(103, 'Selalu datang tepat waktu sesuai dengan jam masuk kerja yang ada diperusahaan\r\n', '', 14),
(104, 'Tidak merasa keberatan dengan jam masuk kerja yang berlaku di tempat kerja\r\n', '', 14),
(105, 'Tidak merasa keberatan dengan jam pulang kerja yang berlaku di tempat kerja\r\n', '', 14),
(106, 'Mengakhiri pekerjaan sesuia dengan peraturan yang berlaku\r\n', '', 14),
(107, 'Melakukan pekerjaan dengan sikap percaya diri\r\n', '', 15),
(108, 'Melakukan pekerjaan dengan sikap yang tanggap\r\n', '', 15),
(109, 'Intruksi atas pekerjaan yang diberikan mudah dipahami\r\n', '', 15),
(110, 'Melakukan pekerjaan sesuai intruksi yang diberikan\r\n', '', 15),
(111, 'Senang hati membantu pekerjaan teman yang membutuhkan\r\n', '', 15),
(112, 'Memiliki hubungan yang baik dengan rekan kerja\r\n', '', 15),
(113, 'Memberikan profit bagi perusahaan asuransi dengan cara menjual produk asuransi kepada nasabah\r\n', '', 16),
(114, 'Mengisi SPAJ secara lengkap dan jelas\r\n', '', 16),
(115, 'Melakukan tugas dengan teliti\r\n', '', 16),
(116, 'Lebih tanggap dalam menyelesaikan pekerjaan\r\n', '', 16),
(117, 'Pekerjaan dapat terselesaikan dengan waktu yang tepat\r\n', '', 16),
(118, 'Melakukan pekerjaan dengan penuh ketepatan, sesuai dengan kewajiban, tidak kurang dan tidak lebih\r\n', '', 16),
(119, 'Bekerja dengan penuh ketelitian\r\n', '', 16),
(120, 'Dapat memanfaatkan ketrampilan yang dimiliki dengan optimal\r\n', '', 16),
(121, 'Selalu menjaga kebersihan area kerja\r\n', '', 16),
(122, 'Mempelajari kebutuhan calon nasabahnya\r\n', '', 17),
(123, 'Meyerahkan polis apabila telah selesai pada nasabah\r\n', '', 17),
(124, 'Bekerja sesuai dengan prosedur kerja\r\n', '', 17),
(125, 'Dapat meminimalisir kesalahan dalam melaksanakan pekerjaan\r\n', '', 17),
(126, 'Selalu disiplin dalam bekerja\r\n', '', 17),
(127, 'Selalu mengikuti intruksi yang diberikan oleh atasan\r\n', '', 17),
(128, 'Selalu memperhatikan keamanan diri dan sekitar\r\n', '', 17),
(129, 'Selalu memperhatikan keselamatan diri dan sekitar\r\n', '', 17),
(130, 'Selalu menyelesaikan pekerjaan sesuai target yang telah ditetapkan\r\n', '', 17),
(131, 'Menawarkan secara jelas dan lengkap bagaimana produk asuransi bisa berfungsi baik fitur, manfaat dan syarat-syarat yang berlaku didalamnya\r\n', '', 18),
(132, 'Meyakinkan calon pelanggan/ konsumen\r\n', '', 18),
(133, 'Dapat memahami tugas sesuai dengan bidangnya\r\n', '', 18),
(134, 'Mengetahui rincian pekerjaan yang akan dipasarkan\r\n', '', 18),
(135, 'Pekerjaan sudah sesuai dengan skill yang dimiliki\r\n', '', 18),
(136, 'Memahami segala aspek yang berkaitan dengan pekerjaan\r\n', '', 18),
(137, 'Mengetahui apa saja tugas - tugas yang menjadi tanggung jawabnya\r\n', '', 18),
(138, 'Memiliki cara dalam menyelesaikan tugas - tugas dengan efektif dan efisien\r\n', '', 18),
(139, 'Selalu datang tepat waktu sesuai dengan jam masuk kerja yang ada diperusahaan\r\n', '', 19),
(140, 'Tidak merasa keberatan dengan jam masuk kerja yang berlaku di tempat kerja\r\n', '', 19),
(141, 'Tidak merasa keberatan dengan jam pulang kerja yang berlaku di tempat kerja\r\n', '', 19),
(142, 'Mengakhiri pekerjaan sesuia dengan peraturan yang berlaku\r\n', '', 19),
(143, 'Melakukan pekerjaan dengan sikap percaya diri\r\n', '', 20),
(144, 'Melakukan pekerjaan dengan sikap yang tanggap\r\n', '', 20),
(145, 'Intruksi atas pekerjaan yang diberikan mudah dipahami\r\n', '', 20),
(146, 'Melakukan pekerjaan sesuai intruksi yang diberikan\r\n', '', 20),
(147, 'Senang hati membantu pekerjaan teman yang membutuhkan\r\n', '', 20),
(148, 'Memiliki hubungan yang baik dengan rekan kerja\r\n', '', 20),
(149, 'Mengemudikan mobil dan melayani pimpinan dalam melakukan perjalanan untuk melaksanakan tugas\r\n', '', 21),
(150, 'Melakukan service mobil di bengkel\r\n', '', 21),
(151, 'Melakukan tugas dengan teliti\r\n', '', 21),
(152, 'Lebih tanggap dalam menyelesaikan pekerjaan\r\n', '', 21),
(153, 'Pekerjaan dapat terselesaikan dengan waktu yang tepat\r\n', '', 21),
(154, 'Melakukan pekerjaan dengan penuh ketepatan, sesuai dengan kewajiban, tidak kurang dan tidak lebih\r\n', '', 21),
(155, 'Bekerja dengan penuh ketelitian\r\n', '', 21),
(156, 'Dapat memanfaatkan ketrampilan yang dimiliki dengan optimal\r\n', '', 21),
(157, 'Selalu menjaga kebersihan area kerja\r\n', '', 21),
(158, 'Memperbaiki kerusakan kecil kendaraan agar dapat berfungsi dengan baik\r\n', '', 22),
(159, 'Bekerja sesuai dengan prosedur kerja\r\n', '', 22),
(160, 'Dapat meminimalisir kesalahan dalam melaksanakan pekerjaan\r\n', '', 22),
(161, 'Selalu disiplin dalam bekerja\r\n', '', 22),
(162, 'Selalu mengikuti intruksi yang diberikan oleh atasan\r\n', '', 22),
(163, 'Selalu memperhatikan keamanan diri dan sekitar\r\n', '', 22),
(164, 'Selalu memperhatikan keselamatan diri dan sekitar\r\n', '', 22),
(165, 'Selalu menyelesaikan pekerjaan sesuai target yang telah ditetapkan\r\n', '', 22),
(166, 'Membersihkan mobil\r\n', '', 23),
(167, 'Dapat memahami tugas sesuai dengan bidangnya\r\n', '', 23),
(168, 'Mengetahui rincian pekerjaan yang akan dipasarkan\r\n', '', 23),
(169, 'Pekerjaan sudah sesuai dengan skill yang dimiliki\r\n', '', 23),
(170, 'Memahami segala aspek yang berkaitan dengan pekerjaan\r\n', '', 23),
(171, 'Mengetahui apa saja tugas - tugas yang menjadi tanggung jawabnya\r\n', '', 23),
(172, 'Memiliki cara dalam menyelesaikan tugas - tugas dengan efektif dan efisien\r\n', '', 23),
(173, 'Selalu datang tepat waktu sesuai dengan jam masuk kerja yang ada diperusahaan\r\n', '', 24),
(174, 'Tidak merasa keberatan dengan jam masuk kerja yang berlaku di tempat kerja\r\n', '', 24),
(175, 'Tidak merasa keberatan dengan jam pulang kerja yang berlaku di tempat kerja\r\n', '', 24),
(176, 'Mengakhiri pekerjaan sesuia dengan peraturan yang berlaku\r\n', '', 24),
(177, 'Melakukan pekerjaan dengan sikap percaya diri\r\n', '', 25),
(178, 'Melakukan pekerjaan dengan sikap yang tanggap\r\n', '', 25),
(179, 'Intruksi atas pekerjaan yang diberikan mudah dipahami\r\n', '', 25),
(180, 'Melakukan pekerjaan sesuai intruksi yang diberikan\r\n', '', 25),
(181, 'Senang hati membantu pekerjaan teman yang membutuhkan\r\n', '', 25),
(182, 'Memiliki hubungan yang baik dengan rekan kerja\r\n', '', 25),
(183, 'Melakukan pekerjaan serta bertanggung jawab atas kebersihan dan kerapian kantor\r\n', '', 26),
(184, 'Mengelola dan mentata kerjakan pengelolaan kebutuhan dapur kantor seperti air minum, kebersihan alat-alat dapur\r\n', '', 26),
(185, 'Melakukan tugas dengan teliti\r\n', '', 26),
(186, 'Lebih tanggap dalam menyelesaikan pekerjaan\r\n', '', 26),
(187, 'Pekerjaan dapat terselesaikan dengan waktu yang tepat\r\n', '', 26),
(188, 'Melakukan pekerjaan dengan penuh ketepatan, sesuai dengan kewajiban, tidak kurang dan tidak lebih\r\n', '', 26),
(189, 'Bekerja dengan penuh ketelitian\r\n', '', 26),
(190, 'Dapat memanfaatkan ketrampilan yang dimiliki dengan optimal\r\n', '', 26),
(191, 'Selalu menjaga kebersihan area kerja\r\n', '', 26),
(192, 'Datang lebih awal 1 jam sebelum jam kerja dan pulang 1 jam lebih lambat dari jam pulang kantor\r\n', '', 27),
(193, 'Bekerja sesuai dengan prosedur kerja\r\n', '', 27),
(194, 'Dapat meminimalisir kesalahan dalam melaksanakan pekerjaan\r\n', '', 27),
(195, 'Selalu disiplin dalam bekerja\r\n', '', 27),
(196, 'Selalu mengikuti intruksi yang diberikan oleh atasan\r\n', '', 27),
(197, 'Selalu memperhatikan keamanan diri dan sekitar\r\n', '', 27),
(198, 'Selalu memperhatikan keselamatan diri dan sekitar\r\n', '', 27),
(199, 'Selalu menyelesaikan pekerjaan sesuai target yang telah ditetapkan\r\n', '', 27),
(200, 'Membantu pegawai administrasi sesuai kebutuhan kantor cabang\r\n', '', 28),
(201, 'Dapat memahami tugas sesuai dengan bidangnya\r\n', '', 28),
(202, 'Mengetahui rincian pekerjaan yang akan dipasarkan\r\n', '', 28),
(203, 'Pekerjaan sudah sesuai dengan skill yang dimiliki\r\n', '', 28),
(204, 'Memahami segala aspek yang berkaitan dengan pekerjaan\r\n', '', 28),
(205, 'Mengetahui apa saja tugas - tugas yang menjadi tanggung jawabnya\r\n', '', 28),
(206, 'Memiliki cara dalam menyelesaikan tugas - tugas dengan efektif dan efisien\r\n', '', 28),
(207, 'Selalu datang tepat waktu sesuai dengan jam masuk kerja yang ada diperusahaan\r\n', '', 29),
(208, 'Tidak merasa keberatan dengan jam masuk kerja yang berlaku di tempat kerja\r\n', '', 29),
(209, 'Tidak merasa keberatan dengan jam pulang kerja yang berlaku di tempat kerja\r\n', '', 29),
(210, 'Mengakhiri pekerjaan sesuia dengan peraturan yang berlaku\r\n', '', 29),
(211, 'Melakukan pekerjaan dengan sikap percaya diri\r\n', '', 30),
(212, 'Melakukan pekerjaan dengan sikap yang tanggap\r\n', '', 30),
(213, 'Intruksi atas pekerjaan yang diberikan mudah dipahami\r\n', '', 30),
(214, 'Melakukan pekerjaan sesuai intruksi yang diberikan\r\n', '', 30),
(215, 'Senang hati membantu pekerjaan teman yang membutuhkan\r\n', '', 30),
(216, 'Memiliki hubungan yang baik dengan rekan kerja\r\n', '', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(3) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'pimpinan'),
(3, 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengisian`
--

CREATE TABLE `pengisian` (
  `id_pengisian` int(11) NOT NULL,
  `id_kuesioner` int(11) NOT NULL,
  `id_skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(10) NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `mutu_kerja` int(10) NOT NULL,
  `inisiatif` int(10) NOT NULL,
  `kehadiran` int(10) NOT NULL,
  `sikap` int(10) NOT NULL,
  `pengetahuan_kerja` int(10) NOT NULL,
  `id_prestasi` int(10) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_karyawan`, `periode`, `mutu_kerja`, `inisiatif`, `kehadiran`, `sikap`, `pengetahuan_kerja`, `id_prestasi`, `komentar`) VALUES
(2, 2, '8/2017', 55, 76, 78, 68, 80, 2, 'Semangat Kerjanya!!!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(3) NOT NULL,
  `prestasi` varchar(30) NOT NULL,
  `range_awal` float NOT NULL,
  `range_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `prestasi`, `range_awal`, `range_akhir`) VALUES
(1, 'Baik', 8, 10),
(2, 'Cukup Baik', 7, 7.9),
(3, 'Cukup', 0, 6.9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `skor`
--

CREATE TABLE `skor` (
  `id_skor` int(11) NOT NULL,
  `skor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skor`
--

INSERT INTO `skor` (`id_skor`, `skor`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id_gender`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_level` (`id_level`),
  ADD KEY `id_gender` (`id_gender`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_jabatan_2` (`id_jabatan`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id_kuesioner`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pengisian`
--
ALTER TABLE `pengisian`
  ADD PRIMARY KEY (`id_pengisian`),
  ADD KEY `id_kuesioner` (`id_kuesioner`),
  ADD KEY `id_skor` (`id_skor`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_prestasi` (`id_prestasi`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `skor`
--
ALTER TABLE `skor`
  ADD PRIMARY KEY (`id_skor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id_gender` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id_kuesioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengisian`
--
ALTER TABLE `pengisian`
  MODIFY `id_pengisian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `skor`
--
ALTER TABLE `skor`
  MODIFY `id_skor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_3` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`),
  ADD CONSTRAINT `karyawan_ibfk_4` FOREIGN KEY (`id_gender`) REFERENCES `gender` (`id_gender`),
  ADD CONSTRAINT `karyawan_ibfk_5` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Ketidakleluasaan untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `kriteria_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD CONSTRAINT `kuesioner_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_prestasi`) REFERENCES `prestasi` (`id_prestasi`),
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
