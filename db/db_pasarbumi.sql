-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Jul 2017 pada 08.54
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pasarbumi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `address_buyer_tbl`
--

CREATE TABLE IF NOT EXISTS `address_buyer_tbl` (
  `seq_no` int(11) DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `address_id` varchar(10) DEFAULT NULL,
  `desc` varchar(2000) NOT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `address_buyer_tbl`
--

INSERT INTO `address_buyer_tbl` (`seq_no`, `user_id`, `address_id`, `desc`, `qversion`, `qid`) VALUES
(NULL, '000002', '000001', 'JL. A. YANI LR. PEMUDA', 0, 1),
(NULL, '000003', '000002', 'JL. DURIAN', 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `address_store_tbl`
--

CREATE TABLE IF NOT EXISTS `address_store_tbl` (
  `seq_no` int(11) DEFAULT NULL,
  `store_id` varchar(10) DEFAULT NULL,
  `address_id` varchar(10) DEFAULT NULL,
  `desc` varchar(2000) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `address_store_tbl`
--

INSERT INTO `address_store_tbl` (`seq_no`, `store_id`, `address_id`, `desc`, `desa`, `qversion`, `qid`) VALUES
(NULL, '000001', '000001', 'JL. Mutiara, Kabupaten Konawe, Kecamatan Abuki, Desa Abuki', 'Abuki', 0, 19),
(NULL, '000002', '000001', 'Jl. Pemuda, Kabupaten Konawe, Kecamatan Abuki', 'Aleuti', 0, 20),
(NULL, '000003', '000001', 'Jl. Pemuda, Kabupaten Konawe, Kecamatan Abuki', 'Alosika', 0, 21),
(NULL, '000004', '000001', 'jl.. santoso nomor 17', '', 0, 24);

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_tbl`
--

CREATE TABLE IF NOT EXISTS `admin_tbl` (
  `user_id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `type` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `login_attend` int(11) NOT NULL,
  `cookie` varchar(100) NOT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `admin_tbl`
--

INSERT INTO `admin_tbl` (`user_id`, `username`, `password`, `email`, `type`, `last_login`, `create_date`, `login_attend`, `cookie`, `qversion`, `qid`) VALUES
('000001', 'adri', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'adri.saputra.ibrahim@gmail.com', 3, '0000-00-00 00:00:00', '2017-03-31 03:31:50', 0, '', 0, 26),
('000002', 'adri', 'a9f8bbb8cb84375f241ce3b9da6219a1', 'adri.saputra.ibrahim@gmail.com', 3, '0000-00-00 00:00:00', '2017-04-02 07:49:35', 0, '', 0, 27),
('000003', 'ryan', 'a9f8bbb8cb84375f241ce3b9da6219a1', 'ryan@gmail.com', 3, '0000-00-00 00:00:00', '2017-04-04 16:16:11', 0, '', 0, 28),
('000004', 'user1', '1404de24bdea7eb6763cf95d295ea585', 'user1@gmail.com', 3, '0000-00-00 00:00:00', '2017-04-06 10:40:04', 0, 'LQaYdILCZ3zRi2BKdV7bn0RcAw12xln4HQPpojFKtWhoNvTSDUu6yqE4JVUie3vm', 0, 29),
('000005', 'user2', 'ede39e83e12f28fd5f70481ab79f47e1', 'user2@gmail.com', 3, '0000-00-00 00:00:00', '2017-04-06 12:10:49', 0, '', 0, 30),
('000006', 'user3', 'b96e75a8ae3bc3026573344b6ad94c2b', 'user3@gmail.com', 3, '0000-00-00 00:00:00', '2017-04-06 12:11:13', 0, '', 0, 31),
('000007', 'user4', '81f2e5b65f81b4f27d686e2329a05b04', 'user4@gmail.com', 3, '0000-00-00 00:00:00', '2017-05-03 17:09:31', 0, '', 0, 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan_tbl`
--

CREATE TABLE IF NOT EXISTS `aturan_tbl` (
  `image` varchar(100) NOT NULL,
  `tittle` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aturan_tbl`
--

INSERT INTO `aturan_tbl` (`image`, `tittle`, `content`, `qid`) VALUES
('', 'Informasi Umum', '1.	Pasarbumi sebagai sarana penunjang bisnis berusaha menyediakan berbagai fitur dan layanan untuk menjamin keamanan dan kenyamanan para penggunanya.\r\n<br>\r\n2.	Pasarbumi tidak berperan sebagai Penjual barang, melainkan sebagai perantara antara Penjual dan Pembeli, untuk mengamankan setiap transaksi yang berlangsung di dalam platform Pasarbumi melalui mekanisme Pasarbumi Payment System. Adanya biaya ekstra (termasuk pajak dan biaya lainnya) atas segala transaksi yang terjadi di Pasarbumi berada di luar kewenangan Pasarbumi sebagai perantara, dan akan diurus oleh pihak-pihak yang bersangkutan (baik Penjual atau pun Pembeli) sesuai ketentuan yang berlaku di Indonesia.\r\n<br>\r\n3.	Pasarbumi hanya mengizinkan jual beli barang yang bisa dikirim melalui jasa pengiriman (jasa ekspedisi), sehingga jasa dan kerjasama dagang (franchise) tidak dapat diperdagangkan melalui Pasarbumi terkecuali ada kerja sama resmi dengan pihak Pasarbumi.\r\n<br>\r\n4.	Barang-barang yang dapat diperdagangkan di Pasarbumi merupakan barang yang tidak tercantum di daftar “Barang Terlarang”.\r\n<br>\r\n5.	Pasarbumi tidak bertanggung jawab atas kualitas barang, proses pengiriman, rusaknya reputasi pihak lain, dan/atau segala bentuk perselisihan yang dapat terjadi antar Pengguna.\r\n<br>\r\n6.	Pasarbumi memiliki kewenangan untuk mengambil tindakan yang dianggap perlu terhadap akun yang diduga dan/atau terindikasi melakukan penyalahgunaan, memanipulasi, dan/atau melanggar Aturan Penggunaan di Pasarbumi, mulai dari melakukan moderasi, menghentikan layanan “Jual Barang”, membatasi jumlah pembuatan akun, membatasi atau mengakhiri hak setiap Pengguna untuk menggunakan layanan, maupun menutup akun tersebut tanpa memberikan pemberitahuan atau informasi terlebih dahulu kepada pemilik akun yang bersangkutan.\r\n<br>\r\n7.	Pasarbumi memiliki kewenangan untuk mengambil tindakan yang dianggap perlu terhadap akun Pengguna, mulai dari melakukan moderasi, menghentikan layanan “Jual Barang”, membatasi jumlah pembuatan akun, membatasi atau mengakhiri hak setiap Pengguna untuk menggunakan layanan, maupun menutup akun tersebut tanpa memberikan pemberitahuan atau informasi terlebih dahulu kepada pemilik akun yang bersangkutan.\r\n<br>\r\n8.	Pasarbumi memiliki kewenangan untuk mengambil keputusan atas permasalahan yang terjadi pada setiap transaksi\r\n<br>\r\n9.	Jika Pengguna gagal untuk mematuhi setiap ketentuan dalam Aturan Penggunaan di Pasarbumi ini, maka Pasarbumi berhak untuk mengambil tindakan yang dianggap perlu termasuk namun tidak terbatas pada melakukan moderasi, menghentikan layanan “Jual Barang”, menutup akun dan/atau mengambil langkah hukum selanjutnya.\r\n<br>\r\n10.	Pasarbumi Payment System bersifat mengikat Pengguna Pasarbumi dan hanya menjamin dana Pembeli tetap aman jika proses transaksi dilakukan dengan Penjual yang terdaftar di dalam sistem Pasarbumi. Kerugian yang diakibatkan keterlibatan pihak lain di luar Pembeli, Penjual, dan Pasarbumi, tidak menjadi tanggung jawab Pasarbumi.\r\n<br>\r\n11.	Pasarbumi berhak meminta data-data pribadi Pengguna jika diperlukan.\r\n<br>\r\n12.	Aturan Penggunaan Pasarbumi dapat berubah sewaktu-waktu dan/atau diperbaharui dari waktu ke waktu tanpa pemberitahuan terlebih dahulu. Dengan mengakses Pasarbumi, Pengguna dianggap menyetujui perubahan-perubahan dalam Aturan Penggunaan Pasarbumi.\r\n<br>\r\n13.	Aturan Penggunaan Pasarbumi pada Situs Pasarbumi berlaku mutatis mutandis untuk penggunaan Aplikasi Pasarbumi.\r\n<br>\r\n14.	Hati-hati terhadap penipuan yang mengatasnamakan Pasarbumi. Untuk informasi Panduan Keamanan silakan klik di sini.', 1),
('', 'Pengguna', '1.	Pengguna wajib mengisi data pribadi secara lengkap dan jujur di halaman akun (profil).\r\n<br>\r\n2.	Pengguna dilarang mencantumkan alamat, nomor kontak, alamat e-mail, situs, forum, dan username media sosial di foto profil, header lapak, nama akun (username), nama lapak, dan deskripsi lapak.\r\n<br>\r\n3.	Pengguna bertanggung jawab atas keamanan dari akun termasuk penggunaan e-mail dan password.\r\n<br>\r\n4.	Pengguna wajib mengisi data rekening bank untuk kepentingan bertransaksi di Pasarbumi.\r\n<br>\r\n5.	Penggunaan fasilitas apapun yang disediakan oleh Pasarbumi mengindikasikan bahwa Pengguna telah memahami dan menyetujui segala aturan yang diberlakukan oleh Pasarbumi.\r\n<br>\r\n6.	Selama berada dalam platform Pasarbumi, Pengguna dilarang keras menyampaikan setiap jenis konten apapun yang menyesatkan, memfitnah, atau mencemarkan nama baik, mengandung atau bersinggungan dengan unsur SARA, diskriminasi, dan/atau menyudutkan pihak lain.\r\n<br>\r\n7.	Pengguna tidak diperbolehkan menggunakan Pasarbumi untuk melanggar peraturan yang ditetapkan oleh hukum di Indonesia maupun di negara lainnya.\r\n8.	Pengguna bertanggung jawab atas segala risiko yang timbul di kemudian hari atas informasi yang diberikannya ke dalam Pasarbumi, termasuk namun tidak terbatas pada hal-hal yang berkaitan dengan hak cipta, merek, desain industri, desain tata letak industri dan hak paten atas suatu produk.\r\n<br>\r\n9.	Pengguna diwajibkan menghargai hak-hak Pengguna lainnya dengan tidak memberikan informasi pribadi ke pihak lain tanpa izin pihak yang bersangkutan.\r\n10.	Pengguna tidak diperkenankan mengirimkan e-mail spam dengan merujuk ke bagian apapun dari Pasarbumi.\r\n<br>\r\n11.	Administrator Pasarbumi berhak menyesuaikan dan/atau menghapus informasi barang, dan menonaktifkan akun Pengguna.\r\n<br>\r\n12.	Pasarbumi memiliki hak untuk memblokir penggunaan sistem terhadap Pengguna yang melanggar peraturan perundang-undangan yang berlaku di wilayah Indonesia.\r\n<br>\r\n13.	Pengguna akan mendapatkan beragam informasi promo terbaru dan penawaran eksklusif. Namun Pengguna dapat berhenti berlangganan (unsubscribe) jika tidak ingin menerima informasi tersebut.\r\n<br>\r\n14.	Pengguna dilarang menggunakan logo Pasarbumi di foto profil (avatar).\r\n<br>\r\n15.	Pengguna dilarang menggunakan kata-kata kasar yang tidak sesuai norma, baik saat berdiskusi di fitur kirim pesan atau chat maupun kolom diskusi retur. Jika ditemukan pelanggaran, Pasarbumi berhak memberikan sanksi seperti menonaktifkan sementara fitur pesan, dan membekukan atau menonaktifkan akun Pengguna.\r\n<br>\r\n16.	Pengguna dilarang menggunakan fitur kirim pesan atau chat sebagai iklan promosi barang dagangan di Pasarbumi maupun di platform atau situs lain yang dapat mengganggu Pengguna lainnya. Jika ditemukan pelanggaran, Pasarbumi berhak memberikan sanksi seperti menonaktifkan fitur pesan dan/atau akun Pengguna.\r\n<br>\r\n17.	Pengguna dilarang menggunakan fitur kirim pesan atau chat sebagai sarana penelitian, kuesioner, atau survey. Jika ditemukan pelanggaran, Pasarbumi berhak memberikan sanksi seperti menonaktifkan fitur pesan dan/atau akun Pengguna.\r\n<br>\r\n18.	Pengguna dilarang melakukan transfer atau menjual akun Pengguna ke Pengguna lain atau ke pihak lain tanpa persetujuan dari Pasarbumi.\r\n<br>\r\n19.	Pengguna dengan ini menyatakan bahwa Pengguna telah mengetahui seluruh peraturan perundang- undangan yang berlaku di wilayah Republik Indonesia dalam setiap transaksi di Pasarbumi, dan tidak akan melakukan tindakan apapun yang mungkin melanggar peraturan perundang-undangan yang berlaku di wilayah Republik Indonesia.\r\n<br>\r\n20.	Pengguna dilarang membuat salinan, modifikasi, turunan atau distribusi konten atau mempublikasikan tampilan yang berasal dari Pasarbumi yang dapat melanggar Hak Kekayaan Intelektual Pasarbumi.\r\n<br>\r\n21.	Pengguna dilarang membuat akun Pasarbumi dengan tujuan menghindari batasan pembelian, penyalahgunaan voucher atau konsekuensi kebijakan Aturan Penggunaan Pasarbumi lainnya.', 2),
('', 'Jual Barang', '1.	Penjual bertanggung jawab secara penuh atas segala risiko yang timbul di kemudian hari terkait dengan informasi yang dibuatnya, termasuk, namun tidak terbatas pada hal-hal yang berkaitan dengan hak cipta, merek, desain industri, desain tata letak sirkuit, hak paten dan/atau izin lain yang telah ditetapkan atas suatu produk menurut hukum yang berlaku di Indonesia.\r\n<br>\r\n2.	Penjual hanya diperbolehkan menjual barang-barang yang tidak tercantum di daftar “Barang Terlarang”.\r\n<br>\r\n3.	Penjual wajib menempatkan barang dagangan sesuai dengan kategori dan subkategorinya.\r\n<br>\r\n4.	Penjual wajib mengisi nama atau judul barang dengan jelas, singkat dan padat.\r\n<br>\r\n5.	Penjual wajib menampilkan gambar barang yang sesuai dengan deskripsi barang yang dijual dan tidak mencantumkan logo ataupun alamat situs jual-beli lain pada gambar. Dianjurkan foto atau gambar memperlihatkan 3 bagian (depan, samping dan belakang) dengan resolusi minimal 300px.\r\n<br>\r\n6.	Penjual wajib mengisi harga yang sesuai dengan harga sebenarnya.\r\n<br>\r\n7.	Penjual tidak diperkenankan mencantumkan alamat, nomor kontak, alamat e-mail, situs, forum, username media sosial, dan nomor rekening bank selain pada kolom yang disediakan.\r\n<br>\r\n8.	Penjual dilarang menjual barang yang identik sama (multiple posting) dengan yang sudah ada di lapaknya.\r\n<br>\r\n9.	Penjual dilarang melakukan duplikasi penjualan barang dengan menyalin atau menggunakan gambar dari lapak Penjual lain.\r\n<br>\r\n10.	Penjual tidak perkenankan memberikan informasi alamat, nomor kontak, alamat e-mail, situs, forum, username media sosial melalui fitur pesan.\r\n<br>\r\n11.	Penjual wajib memperbarui (update) ketersediaan dan status barang yang dijual.\r\n<br>\r\n12.	Catatan Penjual diperuntukkan bagi Penjual yang ingin memberikan catatan tambahan yang tidak terkait dengan deskripsi barang kepada calon Pembeli. Catatan Penjual tetap tunduk terhadap Aturan Penggunaan Pasarbumi.\r\n<br>\r\n13.	Penjual wajib mengisi kolom Deskripsi Barang sesuai dengan Aturan Penggunaan di Pasarbumi.\r\n<br>\r\n14.	Penjual dilarang membuat transaksi fiktif atau palsu demi kepentingan menaikkan feedback. Pasarbumi berhak mengambil tindakan seperti pemblokiran akun atau tindakan lainnya apabila ditemukan tindakan kecurangan.\r\n<br>\r\n15.	Penjual wajib mengirimkan barang menggunakan jasa ekspedisi sesuai dengan yang dipilih oleh Pembeli pada saat melakukan transaksi di dalam sistem Pasarbumi.\r\n<br>\r\n16.	Apabila Penjual menggunakan jasa ekspedisi yang berbeda dengan jasa dan/atau jenis jasa ekspedisi yang dipilih oleh Pembeli pada saat melakukan transaksi di dalam sistem Pasarbumi maka Penjual bertanggung jawab atas segala hal selama proses pengiriman yang disebabkan oleh penggunaan jasa dan/atau jenis jasa ekspedisi yang berbeda tersebut.\r\n<br>\r\n17.	Penjual memahami dan menyetujui bahwa kekurangan dana biaya kirim yang disebabkan oleh penggunaan jasa dan/atau jenis jasa yang berbeda dari pilihan Pembeli pada saat melakukan transaksi di dalam sistem Pasarbumi merupakan tanggung jawab Penjual terkecuali perbedaan tersebut atas permintaan Pembeli.\r\n<br>\r\n18.	Pembeli berhak atas kelebihan dana dari biaya kirim yang diakibatkan perbedaan penggunaan jasa dan/atau jenis jasa ekspedisi oleh Penjual dari pilihan Pembeli pada saat melakukan transaksi di dalam sistem Pasarbumi.\r\n<br>\r\n19.	Penjual wajib memenuhi ketentuan yang sudah ditetapkan oleh pihak jasa ekspedisi berkaitan dengan packing barang yang aman serta menggunakan asuransi dan/atau packing kayu pada barang-barang tertentu sehingga apabila barang rusak atau hilang Penjual dapat mengajukan klaim ke pihak jasa ekspedisi.', 3),
('', 'Transaksi', '1.	Demi keamanan dan kenyamanan para Pengguna, setiap transaksi jual-beli di Pasarbumi diwajibkan untuk menggunakan Pasarbumi Payment System. \r\n<br>\r\n2.	Pembeli wajib transfer sesuai dengan nominal total belanja dari transaksi dalam waktu 1x10 jam (dengan asumsi Pembeli telah mempelajari informasi barang yang telah dipesannya). Jika dalam waktu 1x10 jam barang dipesan tetapi Pembeli tidak mentransfer dana maka transaksi akan dibatalkan secara otomatis.\r\n<br>\r\n3.	Setiap transaksi di Pasarbumi yang menggunakan metode transfer akan dikenakan biaya operasional dalam bentuk kode unik pembayaran yang ditanggung oleh Pembeli.\r\n<br>\r\n4.	Pembeli tidak dapat membatalkan transaksi setelah melunasi pembayaran.\r\n<br>\r\n5.	Penjual wajib mengirimkan barang dan mendaftarkan nomor resi pengiriman yang benar dan asli setelah status transaksi “Dibayar”. Satu nomor resi hanya berlaku untuk satu nomor transaksi di Pasarbumi.\r\n<br>\r\n6.	Jika Penjual tidak mengirimkan barang dalam batas waktu pengiriman sejak pembayaran (2x24 jam kerja untuk biaya pengiriman reguler atau 2x24 jam untuk biaya pengiriman kilat), maka Penjual dianggap telah menolak pesanan. Sehingga sistem secara otomatis memberikan feedback negatif dan reputasi tolak pesanan, serta mengembalikan seluruh dana (refund) ke Pembeli.\r\n<br>\r\n7.	Pengembalian dana transaksi dilakukan dengan menambahkan saldo   ke Pembeli. \r\n<br>\r\n8.	Sistem Pasarbumi secara otomatis mengecek status pengiriman barang melalui nomor resi yang diberikan Penjual. Apabila nomor resi terdeteksi tidak valid dan Penjual tidak melakukan ubah resi valid dalam 1x24 jam maka seluruh dana akan dikembalikan ke Pembeli. Jika Penjual memasukkan nomor resi tidak valid lebih dari satu kali maka Pasarbumi akan mengembalikan seluruh dana transaksi kepada Pembeli dan Penjual mendapatkan feedback negatif.\r\n<br>\r\n9.	Jika Pembeli tidak memberikan konfirmasi penerimaan barang dalam waktu 2x24 jam sejak status resi pengiriman dinyatakan telah diterima/delivered oleh sistem tracking jasa pengiriman, Pasarbumi akan mentransfer dana langsung ke   Penjual tanpa memberikan konfirmasi ke Pembeli.\r\n<br>\r\n10.	Sistem secara otomatis memberikan feedback (rekomendasi) positif dan mentransfer dana pembayaran ke   Penjual jika status resi menunjukkan ‘Barang diterima’ dan Pembeli telah melewati batas waktu untuk konfirmasi.\r\n<br>\r\n11.	Pembeli dapat memperbarui feedback maksimal 3x24 jam setelah transaksi dinyatakan selesai oleh sistem Pasarbumi.\r\n<br>\r\n12.	Pasarbumi atas kebijakannya sendiri dapat melakukan penahanan atau pembekuan   untuk melakukan perlindungan terhadap segala risiko dan kerugian yang timbul, jika Pasarbumi menyimpulkan bahwa tindakan Pengguna, baik Penjual maupun Pembeli terindikasi melakukan kecurangan-kecurangan atau penyalahgunaan dalam bertransaksi dan/atau pelanggaran terhadap Aturan Penggunaan Pasarbumi dan jika akun Pengguna diduga atau terindikasi telah diakses oleh pihak lain.', 4),
('', 'Sanksi', 'Segala tindakan yang melanggar peraturan di Pasarbumi akan dikenakan sanksi berupa termasuk namun tidak terbatas pada:<p>\r\n<p>\r\n1.	Penjual mendapatkan 1 feedback negatif apabila tidak mengirimkan barang dalam batas waktu pengiriman sejak pembayaran (2x24 jam kerja untuk biaya pengiriman reguler atau 2x24 jam untuk biaya pengiriman kilat).\r\n<br>\r\n2.	Penjual mendapatkan 1 feedback negatif jika sudah 5 kali menolak pesanan.\r\n<br>\r\n3.	Penjual mendapatkan 3 feedback negatif jika sudah memroses pesanan namun tidak kirim barang dalam batas waktu pengiriman sejak pembayaran (2x24 jam kerja untuk pengiriman reguler atau 2x24 jam untuk pengiriman kilat).\r\n<br>\r\n4.	Akun dibekukan. Dan jika ada Paket Push dalam akun maka Paket Push akan hangus.\r\n<br>\r\n5.	Akun dinonaktifkan. Dan jika ada Paket Push di akun maka Paket Push hangus.\r\n<br>\r\n6.	Pelaporan ke pihak terkait (Kepolisian, dll).', 5),
('', 'Pembatasan Tanggung Jawab', '1.	Pasarbumi tidak bertanggung jawab atas segala risiko dan kerugian yang timbul dari dan dalam kaitannya dengan informasi yang dituliskan oleh Pengguna Pasarbumi.\r\n<br>\r\n2.	Pasarbumi tidak bertanggung jawab atas segala pelanggaran hak cipta, merek, desain industri, desain tata letak sirkuit, hak paten atau hak-hak pribadi lain yang melekat atas suatu barang, berkenaan dengan segala informasi yang dibuat oleh Pelapak. Untuk melaporkan pelanggaran hak cipta, merek, desain industri, desain tata letak sirkuit, hak paten atau hak-hak pribadi lain, klik di sini\r\n<br>\r\n3.	Pasarbumi tidak bertanggung jawab atas segala risiko dan kerugian yang timbul berkenaan dengan penggunaan barang yang dibeli melalui Pasarbumi, dalam hal terjadi pelanggaran peraturan perundang-undangan.\r\n<b>\r\n4.	Pasarbumi tidak bertanggung jawab atas segala risiko dan kerugian yang timbul berkenaan dengan diaksesnya akun Pengguna oleh pihak lain.\r\n<b>\r\n5.	Pasarbumi tidak bertanggung jawab atas segala risiko dan kerugian yang timbul akibat transaksi di luar Pasarbumi Payment System.\r\n<b>\r\n6.	Pasarbumi tidak bertanggung jawab atas segala risiko dan kerugian yang timbul akibat kesalahan atau perbedaan nominal yang seharusnya ditransfer ke rekening atas nama Pasarbumi\r\n<b>\r\n7.	Pasarbumi tidak bertanggung jawab atas segala risiko dan kerugian yang timbul apabila transaksi telah selesai secara sistem (dana telah masuk ke BukaDompet Pelapak ataupun Pembeli).\r\n<b>\r\n8.	Pasarbumi tidak bertanggung jawab atas segala risiko dan kerugian yang timbul akibat kehilangan barang ketika proses transaksi berjalan dan/atau selesai.\r\n<br>\r\n9.	Pasarbumi tidak bertanggung jawab atas segala risiko dan kerugian yang timbul akibat kesalahan Pengguna ataupun pihak lain dalam transfer dana ke rekening Pasarbumi.\r\n<br>\r\n10.	Pasarbumi tidak bertanggung jawab atas segala risiko dan kerugian yang timbul apabila akun dalam keadaan dibekukan dan/atau dinonaktifkan.\r\n<br>\r\n11.	Pasarbumi tidak bertanggung jawab atas segala risiko dan kerugian yang timbul akibat penyalahgunaan nomor kontak dan/atau alamat e-mail milik Pengguna maupun pihak lainnya.\r\n<br>\r\n12.	Dalam keadaan apapun, Pengguna akan membayar kerugian Pasarbumi dan/atau menghindarkan Pasarbumi (termasuk petugas, direktur, karyawan, agen, dan lainnya) dari setiap biaya kerugian apapun, kehilangan, pengeluaran atau kerusakan yang berasal dari tuntutan atau klaim Pihak ke-tiga yang timbul dari pelanggaran Pengguna terhadap Aturan Penggunaan Pasarbumi, dan/atau pelanggaran terhadap hak dari pihak ke-tiga.', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank_account_tbl`
--

CREATE TABLE IF NOT EXISTS `bank_account_tbl` (
  `seq_no` int(11) DEFAULT NULL,
  `store_id` varchar(10) DEFAULT NULL,
  `bank` varchar(20) NOT NULL,
  `user_account` varchar(50) DEFAULT NULL,
  `no_account` varchar(50) DEFAULT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `bank_account_tbl`
--

INSERT INTO `bank_account_tbl` (`seq_no`, `store_id`, `bank`, `user_account`, `no_account`, `qversion`, `qid`) VALUES
(NULL, '000001', 'bri', 'TEGUH', '256729993888', 0, 15),
(NULL, '000002', 'bri', 'DIAN', '675822451155', 0, 16),
(NULL, '000003', 'bni', 'ANDI', '783674788282', 0, 17),
(NULL, '000001', 'bni', 'TEGUH', '677778888888', 0, 18),
(NULL, '000004', 'bri', 'DINAR', '08882899', 0, 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_tbl`
--

CREATE TABLE IF NOT EXISTS `berita_tbl` (
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita_tbl`
--

INSERT INTO `berita_tbl` (`title`, `content`, `image`, `qid`) VALUES
('Pinjaman Saldo – Dapatkan Pinjamannya, Gunakan Fiturnya dan Raih Manfaatnya', 'Menjual barang di Bukalapak didukung oleh fitur-fitur yang bisa kamu gunakan sebagai pelapak untuk meningkatkan omzet penjualanmu. Begitupun dengan bagaimana cara menggunakan fitur tersebut, Bukalapak menyediakan fasilitas buat pelapak agar bisa selalu menggunakannya, salah satunya dengan fasilitas Pinjaman Saldo.\r\n<p>\r\nPinjaman Saldo adalah fasilitas yang dapat digunakan oleh para pelapak untuk meminjam dana saat saldo BukaDompet tidak mencukupi untuk membeli fitur yang ada di Bukalapak. Adapun fitur yang bisa dibeli dengan Pinjaman Saldo ini adalah:', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cara_belanja_tbl`
--

CREATE TABLE IF NOT EXISTS `cara_belanja_tbl` (
  `tittle` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cara_belanja_tbl`
--

INSERT INTO `cara_belanja_tbl` (`tittle`, `image`, `content`, `qid`) VALUES
('Cari Barang', '', 'Kamu dapat mencari barang yang kamu inginkan dengan fitur search atau berdasarkan Kategori', 1),
('Klik Beli', '', 'Pilih barang yang kamu inginkan dan klik Beli\r\n<p>\r\nPembeli dapat memesan lebih dari satu barang dari toko yang sama dengan Keranjang Belanja. Perhitungan harga barang dan ongkos kirim akan disatukan untuk setiap Keranjang Belanja. Untuk menambah barang ke dalam Keranjang Belanja, pembeli cukup menekan tombol Beli yang ada di setiap halaman barang pelapak.\r\n', 2),
('Shopping Review ', '', 'Kamu wajib melengkapi alamat pengiriman barang pada halaman shopping review.\r\n<p>\r\nSetiap melakukan pembelian barang, kamu akan diarahkan ke halaman shopping review. Pada halaman ini kamu wajib melengkapi alamat tujuan pengiriman barang.\r\n<p>\r\n1.	Pastikan deskripsi produk sudah sesuai\r\n<br>\r\n2.	Lengkapi form pada kolom Shipping Details.\r\n<br>\r\n3.	Total harga barang dan ongkos kirim akan muncul setelah kamu melengkapi shipping details\r\n<br>\r\n4.	Tekan Lanjut untuk menuju ke proses pembayaran', 3),
('Pembayaran', '', 'Kamu dapat melakukan pembayaran ke rekening PasarBumi melalui Transfer.\r\n<p>\r\nSetelah berhasil melakukan transfer, kami akan melakukan verifikasi pembayaran Anda secara otomatis. Untuk itu, pastikan Anda membayar sesuai dengan jumlah tagihan pembayaran tepat hingga 3 digit terakhir. Perbedaan nilai transfer akan menghambat proses verifikasi.\r\n<p>\r\n1.	Lengkapi data pada pop-up konfirmasi pembayaran.\r\n<br>\r\n2.	Tekan Submit\r\n<br>\r\n<p>\r\nPasarbumi akan mengembalikan 100% uang pembeli ke saldo pembeli jika tidak tidak mengirim barang (2 hari kerja untuk biaya pengiriman reguler atau 2x24 jam (tidak termasuk hari besar) untuk biaya pengiriman kilat) setelah pembayaran.\r\n', 4),
('Konfirmasi Terima Barang', '', 'Setelah barang sampai, lakukan konfirmasi dengan menekan Konfirmasi Terima Barang pada halaman Detail Transaksi.\r\n<p>\r\nTransaksi akan dianggap selesai setelah kamu memberikan konfirmasi terima barang kepada pelapak yang bersangkutan.\r\n<p>\r\nTerima Barang dan Beri Feedback\r\n<p>\r\n1.	Setelah barang diterima, lakukan konfirmasi dengan menekan Konfirmasi Terima Barang di halaman Transaksi.\r\n<br>\r\n2.	Transaksi akan dianggap selesai setelah kamu memberikan feedback kepada pelapak. Apabila kamu menyukai layanan pelapak tersebut, berikan feedback positif dan isi kolom testimoni dengan tanggapanmu mengenai pelapak.', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cara_berjualan_tbl`
--

CREATE TABLE IF NOT EXISTS `cara_berjualan_tbl` (
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cara_berjualan_tbl`
--

INSERT INTO `cara_berjualan_tbl` (`title`, `image`, `content`, `qid`) VALUES
('Jual Barang', '', 'Kamu bisa menjual barang dengan harga yang kamu inginkan. Kamu wajib mencantumkan perkiraan berat barang untuk perhitungan perkiraan ongkos kirim.\r\n<p><p>\r\n<b>a.	Klik Tombol Jual, Pilih Kategori Barang</b>\r\n<br>\r\nBuka website PasarBumi.com, Klik tombol Jual lalu pilih Kategori Barang.\r\n<br>\r\n<b>b.	Masukkan Detail Barang</b>\r\n<br>\r\nBuatlah nama barang yang menarik dan detail.\r\n<br>\r\n<b>c.	Upload Foto Barang</b>\r\n<br>\r\nUpload foto asli barang yang ingin dijual. Pastikan kualitas foto yang terbaik dan barang terlihat jelas dari berbagai sisi.\r\n<br>\r\n<b>d.	Pantau Toko Kamu</b>\r\n<br>\r\nPantau terus halaman Transaksi untuk mengetahui jika ada yang membeli barang yang Kamu jual. ', 1),
('Kelola Transaksi', '', 'Kamu dapat mengelola dan memantau transaksi secara langsung pada halaman Transaksi. Setiap transaksi memiliki 5 status: Menunggu, Dibayar, Dikirim, Diterima, dan Selesai.\r\n<p><p>\r\nIcon status menunjukan status yang sedang aktif atau telah berlalu.\r\n<br>\r\n•	Menunggu, Barang telah dipesan oleh pembeli<br>\r\n•	Dibayar, Pembeli sudah melakukan pembayaran. Silakan kirim barang ke alamat yang dituju kemudian lakukan konfirmasi pengiriman<br>\r\n•	Dikirim, Barang telah dikirim<br>\r\n•	Diterima, Barang telah diterima oleh pembeli<br>\r\n•	Selesai, Uang hasil penjualan sudah ditransfer ke rekening Anda.<br>\r\n<p>\r\nAnda akan menerima e-mail dan notifikasi setiap terjadi perubahan status transaksi.', 2),
('Pengemasan dan Pengiriman Barang', '', 'Kamu akan menerima e-mail, notifikasi, dan sms setiap pembeli berhasil melakukan pembayaran. Pada tahap ini status transaksi adalah Dibayar. Kamu dapat mengemas barang daganganmu lalu mengirimkannya (melalui kurir, dll). Ingat, pengemasan yang bagus dan pengiriman yang cepat akan meningkatkan reputasi kamu.\r\n<p><p>\r\nLengkapi nomor resi dan nama jasa pengiriman pada pop up Konfirmasi Pengiriman barang ', 3),
('Terima Uang dan Feedback', '', 'Kamu akan menerima uang pembayaran dan feedback setelah pembeli menerima barang. Jangan sampai kamu menerima Feedback Negatif karena pembeli tidak puas dengan pelayanan kamu. Semakin banyak feedback positif yang kamu miliki maka semakin baik Reputasimu dan kamu akan memperoleh lebih banyak kepercayaan dari pembeli.\r\n<p><p>\r\nPasarbumi otomatis mentransfer uang hasil penjualan ke saldo toko setelah pembeli memberi konfirmasi terima barang.\r\n<p>\r\nJika setelah 2 hari barang diterima (menurut resi pengiriman) belum ada konfirmasi dari pembeli melalui konfirmasi terima barang, maka transaksi dianggap selesai dan pelapak menerima uang dan feedback secara otomatis.', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_tbl`
--

CREATE TABLE IF NOT EXISTS `cart_tbl` (
  `user_id` varchar(10) DEFAULT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category_tbl`
--

CREATE TABLE IF NOT EXISTS `category_tbl` (
  `user_id` varchar(8) NOT NULL,
  `category_id` varchar(20) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `qversion` int(11) DEFAULT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `category_tbl`
--

INSERT INTO `category_tbl` (`user_id`, `category_id`, `category_name`, `qversion`, `qid`) VALUES
('00001', '00001', 'Pertanian', NULL, 1),
('00001', '00002', 'Perkebunan', NULL, 2),
('00001', '00003', 'Peternakan', NULL, 3),
('00001', '00004', 'Hutan', NULL, 4),
('00001', '00005', 'Kriya', NULL, 9),
('00001', '00006', 'Hasil Laut', NULL, 10),
('00001', '00007', 'Hasil Industri', NULL, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment_sub_tbl`
--

CREATE TABLE IF NOT EXISTS `comment_sub_tbl` (
  `user_id` varchar(50) NOT NULL,
  `store_id` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `comment_id` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `comment_sub_tbl`
--

INSERT INTO `comment_sub_tbl` (`user_id`, `store_id`, `message`, `comment_id`, `qid`) VALUES
('', '000003', 'iya ready', 11, 34),
('', '000003', 'silahkan d order', 11, 35),
('000003', '', 'ok gan', 11, 36),
('', '000003', 'siap', 11, 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment_tbl`
--

CREATE TABLE IF NOT EXISTS `comment_tbl` (
  `user_id` varchar(10) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `like` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `comment_tbl`
--

INSERT INTO `comment_tbl` (`user_id`, `product_id`, `message`, `like`, `qid`) VALUES
('000003', 'PRD-00000320170406123622123622', 'ready gan ?', 0, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `counter_tbl`
--

CREATE TABLE IF NOT EXISTS `counter_tbl` (
  `ip` varchar(50) DEFAULT NULL,
  `user_agent` varchar(200) DEFAULT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `counter_tbl`
--

INSERT INTO `counter_tbl` (`ip`, `user_agent`, `product_id`, `date`) VALUES
('::1', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'PRD-00000320170406125625125625', '4/July/2017'),
('::1', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'PRD-00000320170406123622123622', '4/July/2017'),
('::1', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'PRD-00000320170406123426123426', '4/July/2017'),
('::1', 'Mozilla/5.0 (Windows NT 10.0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', 'PRD-00000320170406125354125354', '5/July/2017');

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery_tbl`
--

CREATE TABLE IF NOT EXISTS `delivery_tbl` (
  `user_id` varchar(10) DEFAULT NULL,
  `store_id` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `image1` varchar(50) DEFAULT NULL,
  `image2` varchar(50) DEFAULT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi_tbl`
--

CREATE TABLE IF NOT EXISTS `hubungi_tbl` (
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jaminan_tbl`
--

CREATE TABLE IF NOT EXISTS `jaminan_tbl` (
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jaminan_tbl`
--

INSERT INTO `jaminan_tbl` (`title`, `image`, `content`, `qid`) VALUES
('Jaminan Keamanan', '', 'Setiap transaksi dijamin aman dari penipuan karena pembeli tidak mentransfer uang langsung ke Penjual melainkan lewat Pasarbumi. Uang pembeli bisa dikembalikan 100% jika barang tidak dikirim.\r\n<p><p>\r\n1.	Pembeli pesan barang lalu transfer ke Pasarbumi<br>\r\n•	Silahkan login lalu klik “beli” untuk memesan barang<br>\r\n•	Transfer dana ke rekening Pasarbumi sesuai tagihan pembayaran\r\n<p>\r\n2.	Barang dikirim penjual<br>\r\n•	Pasarbumi mengirim pesan ke penjual untuk mengirim barang<br>\r\n•	Jika barang tidak dikirim penjual, maka uang dikembalikan 100% ke pembeli\r\n<p>\r\n3.	Pembeli menerima barang lalu memberi konfirmasi terima barang<br>\r\n•	Uang ditransfer ke pelapak setelah pembeli memberi konfirmasi terima barang. <br>\r\n•	Transaksi selesai, pelapak menerima uang dan ulasan dari pembeli.\r\n\r\n', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karir_tbl`
--

CREATE TABLE IF NOT EXISTS `karir_tbl` (
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karir_tbl`
--

INSERT INTO `karir_tbl` (`image`, `content`, `qid`) VALUES
('', 'For you who resist the ordinary thing, thirst for adventure, crave a continuous change, want to be a growth witness, fast learner, flexible and adaptive. We are waiting for you to join, learning and growing together with us!', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebijakan_tbl`
--

CREATE TABLE IF NOT EXISTS `kebijakan_tbl` (
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kebijakan_tbl`
--

INSERT INTO `kebijakan_tbl` (`title`, `image`, `content`, `qid`) VALUES
('Kebijakan privasi', '', 'Kebijakan privasi yang dimaksud di Pasarbumi adalah acuan yang mengatur dan melindungi penggunaan data dan informasi penting para Pengguna Pasarbumi. Data dan informasi yang telah dikumpulkan pada saat mendaftar, mengakses, dan menggunakan layanan di Pasarbumi, seperti alamat, nomor kontak, alamat e-mail, foto, gambar, dan lain-lain.\r\n<p><p>\r\nKebijakan-kebijakan tersebut di antaranya:\r\n<p>\r\na.	Pasarbumi tunduk terhadap kebijakan perlindungan data pribadi Pengguna sebagaimana yang diatur dalam Peraturan Menteri Komunikasi dan Informatika Nomor 20 Tahun 2016 Tentang Perlindungan Data Pribadi Dalam Sistem Elektronik yang mengatur dan melindungi penggunaan data dan informasi penting para Pengguna.\r\n<br>\r\nb.	Pasarbumi melindungi segala informasi yang diberikan Pengguna pada saat pendaftaran, mengakses, dan menggunakan seluruh layanan Pasarbumi.\r\n<br>\r\nc.	Pasarbumi melindungi segala hak pribadi yang muncul atas informasi mengenai suatu produk yang ditampilkan oleh pengguna layanan Pasarbumi, baik berupa foto, username, logo, dan lain-lain.\r\n<br>\r\nd.	Pasarbumi berhak menggunakan data dan informasi para Pengguna demi meningkatkan mutu dan pelayanan di Pasarbumi.\r\n<br>\r\ne.	Pasarbumi tidak bertanggung jawab atas pertukaran data yang dilakukan sendiri di antara Pengguna.\r\n<br>\r\nf.	Pasarbumi hanya dapat memberitahukan data dan informasi yang dimiliki oleh para Pengguna bila diwajibkan dan/atau diminta oleh institusi yang berwenang berdasarkan ketentuan hukum yang berlaku, perintah resmi dari Pengadilan, dan/atau perintah resmi dari instansi atau aparat yang bersangkutan.\r\n<br>\r\ng.	Pengguna situs Pasarbumi dapat berhenti berlangganan (unsubscribe) beragam informasi promo terbaru dan penawaran eksklusif jika tidak ingin menerima informasi tersebut.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kisah_tbl`
--

CREATE TABLE IF NOT EXISTS `kisah_tbl` (
  `title_toko` int(11) NOT NULL,
  `image_toko` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_tbl`
--

CREATE TABLE IF NOT EXISTS `order_tbl` (
  `user_id` varchar(10) DEFAULT NULL,
  `store_id` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `status` int(50) DEFAULT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `order_tbl`
--

INSERT INTO `order_tbl` (`user_id`, `store_id`, `order_id`, `product_id`, `date`, `qty`, `total`, `status`, `qversion`, `qid`) VALUES
('000002', '000003', 'KD-00000200000320170608084320', 'PRD-00000320170406123809123809', '2017-06-08 08:43:20', 1, 20000, 3, 0, 1),
('000002', '000003', 'KD-00000200000320170608093403', 'PRD-00000320170406124016124016', '2017-06-08 09:34:03', 1, 25000, 5, 0, 2),
('000002', '000003', 'KD-00000200000320170608093403', 'PRD-00000320170406125354125354', '2017-06-08 09:34:03', 1, 3000, 5, 0, 3),
('000002', '000003', 'KD-00000200000320170608093403', 'PRD-00000320170406125625125625', '2017-06-08 09:34:03', 2, 80000, 5, 0, 4),
('000002', '000001', 'KD-00000200000120170610114749', 'PRD-00000120170406105812105812', '2017-06-10 11:47:49', 1, 180000, 3, 0, 5),
('000002', '000001', 'KD-00000200000120170610114749', 'PRD-00000120170406110315110315', '2017-06-10 11:47:49', 1, 210000, 3, 0, 6),
('000002', '000001', 'KD-00000200000120170706065558', 'PRD-00000120170406105627105627', '2017-06-06 06:55:58', 1, 6000, 3, 0, 9),
('000002', '000003', 'KD-00000200000320170706065558', 'PRD-00000320170406123622123622', '2017-07-06 06:55:58', 8, 40000, 1, 0, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pages_shopping_tbl`
--

CREATE TABLE IF NOT EXISTS `pages_shopping_tbl` (
  `title` varchar(200) DEFAULT NULL,
  `content` text,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `pages_shopping_tbl`
--

INSERT INTO `pages_shopping_tbl` (`title`, `content`, `qid`) VALUES
('5 Alasan Orang Membeli Barang dengan Cara Mencicil ', '<p>Saat ini, sistem pembayaran secara kredit/cicilan sudah lazim digunakan. Hanya dengan modal kartu kredit kamu bisa dengan mudahnya mencicil barang idamanmu. Mungkin buat beberapa orang cara mencicil ini cukup beresiko karena sama saja berhutang.</p>\r\n\r\n<p>Tapi tidak sedikit juga yang lebih memilih pembayaran dengan cara mencicil walaupun sebenernya bisa membayar tunai. Nah, berikut ini adalah alasan kenapa orang lebih memilih membeli barang dengan cara mencicil</p>\r\n', 1),
('Masukkan ke keranjang belanja', 'Pilih barang yang kamu inginkan kemudian masukkan ke keranjang belanja.', 2),
('term n condition', '<p><strong>Syarat dan Ketentuan</strong></p>\r\n\r\n<p> </p>\r\n\r\n<p>Dengan mengunduh, memasang dan menggunakan aplikasi Foodme .Anda setuju bahwa anda telah membaca, memahami, menerima dan menyetujui Ketentuan penggunaan ini. Ketentuan pengguna ini merupakan suatu perjanjian sah antar anda dan CV. Techno’s Studio dan Layanan dan aplikasi (sebagaimana didefinisikan di bawah ini) berlaku pada situs web kami di www.foodme.id (“Situs Web”).</p>\r\n\r\n<p>Silahkan membatalkan akun Anda (jika Anda telah mendaftar untuk Aplikasi) dan secara permanen menghapus aplikasi dari perangkat Anda jika Anda tidak setuju atau tidak ingin masuk ke dalam Ketentuan Penggunaan.</p>\r\n\r\n<p>Mohon anda memeriksa ketentuan penggunaan dan kebijakan privasi kami dengan seksama setelah mengunduh aplikasi atau menggunakan layanan kami untuk pertama kali.</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Hal-hal Umum</strong></p>\r\n\r\n<p> </p>\r\n\r\n<ol>\r\n <li><strong>CV. TECHNO’S STUDIO</strong> adalah suatu persekutuan comanditer yang didirikan berdasarkan hukum Negara Republik Indonesia ("<strong>kami</strong>" atau "<strong>milik kami</strong>").</li>\r\n <li><strong>Anda </strong>adalah seorang pribadi yang menggunakan aplikasi FoodMe untuk mendapatkan layanan.</li>\r\n <li><strong>Penyedia Layanan</strong> adalah seseorang pribadi atau kelompok yang menjadi member FoodMe yang mempromosikan makanan dan minuman melalui aplikasi FoodMe.</li>\r\n <li><strong>Layanan</strong> dalam Aplikasi ini merupakan saran promosi makanan dan minuman lokal yang disediakan oleh pemilik gerai/rumah makan/restoran (Penyedia Layanan) yang berdomisili di kota kendari.</li>\r\n <li>Kami akan melakukan semua upaya wajar untuk menghubungkan Anda dengan Penyedia Layanan untuk mendapatkan Layanan, tergantung kepada keberadaan Penyedia Layanan di sekitar lokasi Anda.</li>\r\n <li>UNTUK MENGHINDARI KERAGU-RAGUAN, KAMI ADALAH PERUSAHAAN TEKNOLOGI, BUKAN PERUSAHAAN TRANSPORTASI ATAU KURIR DAN KAMI TIDAK MEMBERIKAN LAYANAN TRANSPORTASI ATAU KURIR. Kami tidak mempekerjakan Penyedia Layanan dan kami tidak bertanggung jawab atas setiap tindakan dan/atau kelalaian Penyedia Layanan. Aplikasi ini hanya merupakan sarana untuk memudahkan pencarian atas Layanan. Tergantung pada Penyedia Layanan untuk menawarkan Layanan kepada Anda dan tergantung pada Anda apakah Anda akan menerima tawaran Layanan dari Penyedia Layanan.</li>\r\n</ol>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Ketentuan aplikasi</strong></p>\r\n\r\n<p> </p>\r\n\r\n<ol>\r\n <li>Anda adalah individu yang secara hukum berhak untuk mengadakan perjanjian yang mengikat berdasarkan hukum Negara Republik Indonesia dan bahwa Anda telah berusia minimal 17  tahun atau sudah menikah dan tidak berada di bawah perwalian. Jika tidak, kami atau Penyedia Layanan terkait, berhak berdasarkan hukum untuk membatalkan perjanjian yang dibuat dengan Anda. Anda selanjutnya menyatakan dan menjamin bahwa Anda memiliki hak, wewenang dan kapasitas untuk menggunakan Layanan dan mematuhi Ketentuan Penggunaan. Jika Anda mendaftarkan atas nama suatu badan hukum, Anda juga menyatakan dan menjamin bahwa Anda berwenang untuk mengadakan, dan mengikatkan diri entitas tersebut pada Ketentuan Penggunaan ini dan mendaftarkan untuk Layanan dan Aplikasi.</li>\r\n <li>Kami mengumpulkan dan memproses informasi pribadi Anda, seperti nama, alamat surat elektronik (surel / e-mail), dan nomor telepon seluler Anda ketika Anda mendaftar.</li>\r\n <li>Anda hanya dapat menggunakan Aplikasi ketika Anda telah mendaftar pada Aplikasi tersebut. Setelah Anda berhasil mendaftarkan diri, Aplikasi akan memberikan Anda suatu akun pribadi yang dapat diakses dengan kata sandi yang Anda pilih.</li>\r\n <li>Hanya Anda yang dapat menggunakan akun Anda sendiri dan Anda berjanji untuk tidak memberikan wewenang kepada orang lain untuk menggunakan identitas Anda atau menggunakan akun Anda. Anda tidak dapat menyerahkan atau mengalihkan akun Anda kepada pihak lain. Anda harus menjaga keamanan dan kerahasiaan kata sandi akun Anda dan setiap identifikasi yang kami berikan kepada Anda.</li>\r\n <li>Setiap satu email hanya dapat memiliki satu akun Food Me.</li>\r\n <li>Informasi hotlist/promo yang diberikan oleh Aplikasi tidak dapat diartikan sebagai suatu saran atau penawaran, keputusan untuk memesan makanan/minuman sepenuhnya berada di tangan Anda. Anda bebas untuk memilih untuk menggunakan penyedia layanan lainnya.</li>\r\n <li>Anda berjanji bahwa Anda akan menggunakan Aplikasi hanya untuk tujuan yang dimaksud untuk mendapatkan Layanan. Anda tidak diperbolehkan untuk menyalahgunakan atau menggunakan Aplikasi untuk tujuan penipuan atau menyebabkan ketidaknyamanan kepada orang lain atau melakukan pemesanan palsu.</li>\r\n</ol>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Lain – lain </strong></p>\r\n\r\n<p> </p>\r\n\r\n<ol>\r\n <li>Anda tidak diperkenankan untuk membahayakan, mengubah atau memodifikasi Aplikasi dan/atau Situs web atau mencoba untuk membahayakan, mengubah atau memodifikasi Aplikasi dan/atau Situs web dengan cara apapun. Kami tidak bertanggung jawab jika Anda tidak memiliki perangkat yang sesuai atau jika Anda telah mengunduh versi Aplikasi yang salah untuk perangkat Anda. Kami berhak untuk melarang Anda untuk menggunakan Aplikasi lebih lanjut jika Anda menggunakan Aplikasi dengan perangkat yang tidak kompatibel/cocok atau tidak sah atau untuk tujuan lain selain daripada tujuan yang dimaksud untuk penggunaan Aplikasi ini. Anda berjanji bahwa Anda hanya akan menggunakan suatu jalur akses yang diperbolehkan untuk Anda gunakan.</li>\r\n <li>Anda akan menjaga kerahasiaan dan tidak akan menyalahgunakan informasi yang Anda terima dari penggunaan Aplikasi tersebut. Anda akan memperlakukan Penyedia Layanan dengan hormat dan tidak akan terlibat dalam perilaku atau tindakan yang tidak sah, mengancam atau melecehkan ketika menggunakan layanan mereka.</li>\r\n <li>Anda memahami dan setuju bahwa penggunaan Aplikasi oleh Anda akan tunduk pula pada Kebijakan Privasi kami sebagaimana dapat diubah dari waktu ke waktu. Dengan menggunakan Aplikasi, Anda juga memberikan persetujuan sebagaimana dipersyaratkan berdasarkan Kebijakan Privasi kami.</li>\r\n <li>Dengan memberikan informasi kepada kami, Anda menyatakan bahwa Anda berhak untuk memberikan kepada kami informasi yang akan kami gunakan dan berikan kepada Penyedia Layanan.</li>\r\n <li>Kami tidak menjamin ketersediaan barang pesanan di toko/restoran</li>\r\n <li>Kami tidak bertanggung jawab atas kualitas makanan dan minuman yang disediakan oleh restoran-restoran atau rumah makan.</li>\r\n <li>Anda mengakui dan memahami bahwa harga makanan atau barang yang ditampilkan di layanan merupakan perkiraan dan dapat berubah dari waktu ke waktu.</li>\r\n</ol>\r\n', 3),
('privacy policy', '<p><strong>Kebijakan privasi</strong></p>\r\n\r\n<p>Kebijakan privasi yang dimaksud di Foodme adalah acuan yang mengatur dan melindungi penggunaan data dan informasi penting para Pengguna Foodme. Data dan informasi yang telah dikumpulkan pada saat mendaftar, mengakses, dan menggunakan layanan di Foodme, seperti alamat, nomor kontak, alamat e-mail, foto, gambar, dan lain-lain</p>\r\n\r\n<p>Kebijakan-kebijakan tersebut di antaranya:</p>\r\n\r\n<ul xss=removed>\r\n <li>Foodme tunduk terhadap kebijakan perlindungan data pribadi Pengguna sebagaimana yang diatur dalam Peraturan Menteri Komunikasi dan Informatika Nomor 20 Tahun 2016 Tentang Perlindungan Data Pribadi Dalam Sistem Elektronik yang mengatur dan melindungi penggunaan data dan informasi penting para Pengguna.</li>\r\n <li>Foodme melindungi segala informasi yang diberikan Pengguna pada saat pendaftaran, mengakses, dan menggunakan seluruh layanan Foodme.</li>\r\n <li>Foodme melindungi segala hak pribadi yang muncul atas informasi mengenai suatu produk yang ditampilkan oleh pengguna layanan Foodme, baik berupa foto, username, logo, dan lain-lain.</li>\r\n <li>Foodme berhak menggunakan data dan informasi para Pengguna demi meningkatkan mutu dan pelayanan di Foodme.</li>\r\n <li>Foodme tidak bertanggung jawab atas pertukaran data yang dilakukan sendiri di antara Pengguna.</li>\r\n <li>Foodme hanya dapat memberitahukan data dan informasi yang dimiliki oleh para Pengguna bila diwajibkan dan/atau diminta oleh institusi yang berwenang berdasarkan ketentuan hukum yang berlaku, perintah resmi dari Pengadilan, dan/atau perintah resmi dari instansi atau aparat yang bersangkutan.</li>\r\n <li>Pengguna situs Foodme dapat berhenti berlangganan (unsubscribe) beragam informasi promo terbaru dan penawaran eksklusif jika tidak ingin menerima informasi tersebut.</li>\r\n</ul>\r\n\r\n<p> </p>\r\n', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panduan_tbl`
--

CREATE TABLE IF NOT EXISTS `panduan_tbl` (
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `panduan_tbl`
--

INSERT INTO `panduan_tbl` (`title`, `image`, `content`, `qid`) VALUES
('Panduan keamanan pasar bumi', '', '1.	Ketika ingin mengakses www.pasarbumi.com, periksa boks alamat (address bar). Pastikan alamat yang Anda akses menggunakan domain Pasarbumi.com dan diawali https://.\r\n<br>\r\nJika situs yang Anda akses menyerupai halaman Pasarbumi namun memiliki alamat berbeda, segera tutup halaman tersebut\r\n<p><p>\r\n2.	Anda diminta untuk bersikap waspada terhadap tautan eksternal yang diberikan via pesan pribadi atau private message (PM).\r\n<p>\r\n3.	Sistem Pasarbumi hanya meminta para pengguna untuk memasukkan nama akun dan kata sandi (username and password) ketika login, pencairan dana, perubahan data rekening, dan transaksi via Saldo Pasarbumi. Selain keempat aktivitas tersebut, Anda bisa menggunakan segala fitur Pasarbumi tanpa memerlukan username dan password.\r\n<p>\r\n4.	Administrator Pasarbumi tidak pernah meminta data pribadi, nama akun (username) beserta kata sandi (password) melalui surel (e-mail) ataupun pesan pribadi (PM/private message).\r\n<p>\r\n5.	Seluruh surel (e-mail) resmi dari Pasarbumi menggunakan domain “@pasarbumi.com”, misalnya admin@pasarbumi.com. Jika ada akun lain yang mengatasnamakan pihak Pasarbumi, namun menggunakan domain selain “@pasarbumi.com”, misal admin@pasarbumi1.com, mohon abaikan.\r\n<p>\r\n6.	Seluruh info tentang acara atau promosi resmi dari Pasarbumi akan dipublikasikan melalui media resmi Pasarbumi, seperti blog, media sosial (akun resmi Facebook, Twitter, dan Google+), dan rilis pers. Jangan mudah tergiur dengan tawaran atau hadiah apa pun dari pihak lain yang mengatasnamakan Pasarbumi. Apabila Anda tidak dapat menemukan informasi mengenai tawaran tersebut di media resmi Pasarbumi, mohon abaikan.\r\n<p>\r\n7.	Lakukan transaksi di Pasarbumi.com hanya melalui Pasarbumi payment system. Jika transaksi dilakukan di luar Pasarbumi.com seperti mentransfer uang langsung ke pelapak, maka Pasarbumi.com tidak bertanggung jawab atas permasalahan transaksi yang terjadi.\r\n<p>\r\n8.	Abaikan jika menerima telepon ancaman yang mengaku dari bea cukai, petugas bandara, perpajakan, kepolisian, bahkan yang mengatasnamakan Pasarbumi dan meminta untuk mentransfer sejumlah uang. Pasarbumi tidak pernah meminta biaya tambahan di luar tagihan yang tertera dalam transaksi.\r\n<p>\r\n9.	Panduan keamanan ini bersifat imbauan resmi dan bukan jaminan bahwa Anda akan terbebas dari segala tindak kejahatan daring (online). Namun, dengan memahami imbauan ini, Anda bisa berbelanja dengan aman dan nyaman di Pasarbumi.com.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_tbl`
--

CREATE TABLE IF NOT EXISTS `pembayaran_tbl` (
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_tbl`
--

INSERT INTO `pembayaran_tbl` (`title`, `image`, `content`, `qid`) VALUES
('Pembayaran', '', 'Anda dapat melakukan pembayaran ke Pasarbumi melalui Transfer lewat bank maupun lewat ATM.\r\n<p>\r\n<p>\r\nSetelah berhasil melakukan transfer, kami akan melakukan verifikasi pembayaran Anda secara otomatis. Untuk itu, pastikan Anda membayar sesuai dengan jumlah tagihan pembayaran tepat hingga 3 digit terakhir. Perbedaan nilai transfer akan menghambat proses verifikasi. Lengkapi data pada pop-up konfirmasi pembayaran.\r\n<p>\r\nPasarbumi akan mengembalikan 100% uang pembeli ke saldo pembeli jika penjual tidak mengirim barang (2 hari kerja untuk biaya pengiriman reguler atau 2x24 jam (tidak termasuk hari besar) untuk biaya pengiriman kilat) setelah pembayaran.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penarikan_tbl`
--

CREATE TABLE IF NOT EXISTS `penarikan_tbl` (
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penarikan_tbl`
--

INSERT INTO `penarikan_tbl` (`title`, `image`, `content`, `qid`) VALUES
('Penarikan dana', '', 'Saldo Pasarbumi\r\n<p><p>\r\nSaldo Pasarbumi merupakan saldo yang dapat Anda gunakan untuk membeli semua produk yang tersedia di Pasarbumi\r\n<p>\r\nSelain dapat digunakan untuk berbelanja, Saldo Pasarbumi juga dapat ditarik ke rekening pribadi Anda. Berikut panduan melakukan tarik dana:\r\n<p>\r\n1.	Klik nominal saldo di bagian kiri homepage Pasarbumi.\r\n<br>\r\n2.	Klik Tarik Dana.\r\n3.	Isi semua data, di antaranya: nominal saldo yang akan Anda tarik, nama pemilik dan nomor rekening, nama bank dan cabang.\r\n<br>\r\n4.	Klik Kirim OTP ke HP. Pasarbumi akan mengirimkan kode OTP via SMS.\r\n<br>\r\n5.	Masukkan kode OTP dan kata sandi akun Pasarbumi Anda.\r\n<br>\r\n6.	Klik Konfirmasi.\r\n<p>\r\nPenarikan dana ke rekening BCA, Mandiri, BRI, dan BNI maksimal 1 x 24 jam di hari kerja. Sedangkan penarikan dana selain rekening tujuan yang disebutkan maksimal 2 x 24 jam di hari kerja.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian_tbl`
--

CREATE TABLE IF NOT EXISTS `pengembalian_tbl` (
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian_tbl`
--

INSERT INTO `pengembalian_tbl` (`title`, `image`, `content`, `qid`) VALUES
('Pengembalian Dana', '', 'Jika pesanan Anda tidak kunjung sampai dalam waktu 5 hari, Anda bisa mengajukan klaim pengembalian dana. Berikut caranya:\r\n<p><p>\r\n1.	pilih Status Pemesanan.\r\n<br>\r\n2.	Klik Belum Terima pada produk yang belum sampai.\r\n<br>\r\n3.	Akan muncul pop up. Klik Pengembalian Dana.\r\n<br>\r\n4.	Anda akan masuk ke halaman Pusat Resolusi. Jelaskan masalah Anda secara detail di kolom yang sudah disediakan. Klik Berikutnya.\r\n<br>\r\n5.	Pilih solusi Kembalikan Dana dan tulis jumlah dana yang Anda inginkan. Lalu klik Komplain.\r\n<br>\r\n6.	Jika penjual menyetujui solusi yang Anda ajukan, maka komplain akan dianggap selesai dan dana otomatis akan masuk ke Saldo Rekening Anda.', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `person_tbl`
--

CREATE TABLE IF NOT EXISTS `person_tbl` (
  `user_id` varchar(8) NOT NULL,
  `person_id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `no_ktp` varchar(30) DEFAULT NULL,
  `nohp` varchar(30) DEFAULT NULL,
  `blood_type` varchar(1) DEFAULT NULL,
  `maritial_status` varchar(1) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `job` varchar(30) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `seq_no` int(11) DEFAULT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `person_tbl`
--

INSERT INTO `person_tbl` (`user_id`, `person_id`, `name`, `birth_date`, `no_ktp`, `nohp`, `blood_type`, `maritial_status`, `gender`, `email`, `job`, `image`, `seq_no`, `qversion`, `qid`) VALUES
('000002', '000001', 'ADRI SAPUTRA IBRAHIM', '2017-04-03', '122234443344343', '086666', '1', NULL, '1', NULL, 'WIRASWASTA', NULL, NULL, 0, 1),
('000004', '000002', 'DIAN PRASETYO', '2017-04-24', '3444444444444444', NULL, '1', NULL, '1', NULL, 'SSSSSS', 'DIAN_PRASETYO-1_thumb.png', NULL, 0, 2),
('000003', '000003', 'RYAN AGUS DARMAWAN', '2017-04-03', '33333333333333444', NULL, '2', NULL, '1', NULL, 'WIRASWASTA', NULL, NULL, 0, 3),
('000007', '000004', 'DINAR', '2017-06-13', '3444343444444444', NULL, '1', NULL, '1', NULL, NULL, NULL, NULL, 0, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pilih_bank_tbl`
--

CREATE TABLE IF NOT EXISTS `pilih_bank_tbl` (
  `no_rek` varchar(50) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `image_bank` varchar(50) NOT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pilih_bank_tbl`
--

INSERT INTO `pilih_bank_tbl` (`no_rek`, `atas_nama`, `image_bank`, `qversion`, `qid`) VALUES
('278890022', 'CV. Technos Studio', '', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `premium_tbl`
--

CREATE TABLE IF NOT EXISTS `premium_tbl` (
  `image` varchar(50) NOT NULL,
  `content` varchar(200) NOT NULL,
  `youtube_url` varchar(25) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `premium_tbl`
--

INSERT INTO `premium_tbl` (`image`, `content`, `youtube_url`, `qid`) VALUES
('', 'Maksimalkan tokomu dengan fitur istimewa dari super toko,<br><br> dan tokomu akan lebih terpercaya dari pembeli', 'U7mPqycQ0tQ', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `premium_user_tbl`
--

CREATE TABLE IF NOT EXISTS `premium_user_tbl` (
  `store_id` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_account` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tipe_premium` int(11) NOT NULL,
  `bukti_transfer` varchar(50) NOT NULL,
  `aktif` varchar(10) NOT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `premium_user_tbl`
--

INSERT INTO `premium_user_tbl` (`store_id`, `email`, `no_account`, `tanggal_mulai`, `tipe_premium`, `bukti_transfer`, `aktif`, `qversion`, `qid`) VALUES
('000001', 'tes@gmail.com', '256729993888', '0000-00-00', 3, '', '', 0, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category_tbl`
--

CREATE TABLE IF NOT EXISTS `product_category_tbl` (
  `product_id` varchar(50) DEFAULT NULL,
  `category_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `product_category_tbl`
--

INSERT INTO `product_category_tbl` (`product_id`, `category_id`) VALUES
('PRD-00000120170406105627105627', '00001'),
('PRD-00000320170406123426123426', '00002'),
('PRD-00000320170406123622123622', '00002'),
('PRD-00000320170406123809123809', '00002'),
('PRD-00000320170406124016124016', '00002'),
('PRD-00000320170406125625125625', '00002'),
('PRD-00000320170406125354125354', '00002'),
('PRD-00000220170406122211122211', '00007'),
('PRD-00000220170406123006123006', '00007'),
('PRD-00000120170406105812105812', '00001'),
('PRD-00000120170406110315110315', '00001'),
('PRD-00000120170406121315121315', '00001'),
('PRD-00000120170417062508062508', '00002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_tbl`
--

CREATE TABLE IF NOT EXISTS `product_tbl` (
  `user_id` varchar(8) NOT NULL,
  `store_id` varchar(10) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `desc` text,
  `category` varchar(2000) DEFAULT NULL,
  `price` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `volume` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `min_order` varchar(50) NOT NULL,
  `image1` varchar(200) NOT NULL,
  `image2` varchar(200) NOT NULL,
  `image3` varchar(200) NOT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `premium` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `product_tbl`
--

INSERT INTO `product_tbl` (`user_id`, `store_id`, `product_id`, `name`, `desc`, `category`, `price`, `qty`, `volume`, `satuan`, `min_order`, `image1`, `image2`, `image3`, `qversion`, `qid`, `premium`) VALUES
('000004', '000001', 'PRD-00000120170406105627105627', 'Beras Konawe', 'Beras Konawe', NULL, '6000', 50, 1, 'Liter', '1', 'Beras_Konawe-TOKO_MUTIARA.jpg', 'Beras_Konawe-TOKO_MUTIARA_thumb.jpg', '', 0, 31, ''),
('000004', '000001', 'PRD-00000120170406105812105812', 'Beras Merah ', 'Beras Merah  25 Kg', NULL, '180000', 50, 25, 'Kg', '2', 'Beras_Merah_Premium-TOKO_MUTIARA.jpg', 'Beras_Merah_Premium-TOKO_MUTIARA_thumb.jpg', '', 0, 22, ''),
('000004', '000001', 'PRD-00000120170406110315110315', 'Beras Maknyus ', 'Beras Maknyus 25 Kg', NULL, '210000', 6, 25, 'Kg', '1', 'Beras_Maknyus_25_Kg-TOKO_MUTIARA1.jpg', 'Beras_Maknyus_25_Kg-TOKO_MUTIARA1_thumb.jpg', '', 0, 23, ''),
('000004', '000001', 'PRD-00000120170406121315121315', 'Beras Ikan Lele Super', 'Beras Ikan Lele Super 25 Kg', NULL, '225000', 20, 25, 'Kg', '1', 'Beras_Ikan_Lele_Super_25_Kg-TOKO_MUTIARA.jpg', 'Beras_Ikan_Lele_Super_25_Kg-TOKO_MUTIARA_thumb.jpg', '', 0, 24, ''),
('000005', '000002', 'PRD-00000220170406122211122211', 'Gula Pasir 1 Kg', 'Gula Pasir 1 Kg', NULL, '5000', 20, 1, 'Kg', '1', 'Gula_Pasir_1_Kg-TOKO_HARAPAN.jpg', 'Gula_Pasir_1_Kg-TOKO_HARAPAN_thumb.jpg', '', 0, 25, ''),
('000005', '000002', 'PRD-00000220170406123006123006', 'Minyak Kelapa Lovenia', 'Minyak Kelapa Lovenia', NULL, '25000', 50, 2, 'Liter', '1', 'Minyak_Kelapa_Lovenia-TOKO_HARAPAN.jpg', 'Minyak_Kelapa_Lovenia-TOKO_HARAPAN_thumb.jpg', '', 0, 26, ''),
('000006', '000003', 'PRD-00000320170406123426123426', 'Sayur Sawi', 'Sayur Sawi', NULL, '1000', 50, 1, 'Buah', '2', 'Sayur_Sawi-MEKAR_JAYA.jpg', 'Sayur_Sawi-MEKAR_JAYA_thumb.jpg', '', 0, 27, ''),
('000006', '000003', 'PRD-00000320170406123622123622', 'Wortel', '<p>Saat ini, sistem pembayaran secara kredit/cicilan sudah lazim digunakan. Hanya dengan modal kartu kredit kamu bisa dengan mudahnya mencicil barang idamanmu. Mungkin buat beberapa orang cara mencicil ini cukup beresiko karena sama saja berhutang.</p>', NULL, '5000', 35, 15, 'Buah', '15', 'Wortel-MEKAR_JAYA.jpg', 'Wortel-MEKAR_JAYA_thumb.jpg', '', 0, 28, ''),
('000006', '000003', 'PRD-00000320170406123809123809', 'Bawang Merah', 'Bawang Merah', NULL, '20000', 35, 1, 'Kg', '1', 'Bawang_Merah-MEKAR_JAYA.jpg', 'Bawang_Merah-MEKAR_JAYA_thumb.jpg', '', 0, 29, ''),
('000006', '000003', 'PRD-00000320170406124016124016', 'Bawang Putih', 'Bawang Putih', NULL, '25000', 35, 1, 'Kg', '1', 'Bawang_Putih-MEKAR_JAYA.jpg', 'Bawang_Putih-MEKAR_JAYA_thumb.jpg', '', 0, 30, ''),
('000006', '000003', 'PRD-00000320170406125354125354', 'Sayur Kol', '<p>Saat ini, sistem pembayaran secara kredit/cicilan sudah lazim digunakan. Hanya dengan modal kartu kredit kamu bisa dengan mudahnya mencicil barang idamanmu. Mungkin buat beberapa orang cara mencicil ini cukup beresiko karena sama saja berhutang.</p>', NULL, '3000', 45, 1, 'Buah', '5', 'Kol-MEKAR_JAYA.jpg', 'Kol-MEKAR_JAYA_thumb.jpg', '', 0, 32, ''),
('000006', '000003', 'PRD-00000320170406125625125625', 'Cabe Merah Kecil', 'Cabe Merah Kecil', NULL, '40000', 40, 1, 'Kg', '1', 'Cabe_Merah_Kecil-MEKAR_JAYA.jpg', 'Cabe_Merah_Kecil-MEKAR_JAYA_thumb.jpg', '', 0, 33, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `store_tbl`
--

CREATE TABLE IF NOT EXISTS `store_tbl` (
  `user_id` varchar(8) NOT NULL,
  `store_id` varchar(8) NOT NULL,
  `name` varchar(30) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `image` varchar(30) NOT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `store_tbl`
--

INSERT INTO `store_tbl` (`user_id`, `store_id`, `name`, `nohp`, `desc`, `image`, `qversion`, `qid`) VALUES
('000004', '000001', 'TOKO MUTIARA', '087999777888', 'Menjual beras', '', 0, 33),
('000005', '000002', 'TOKO HARAPAN', '0898873626662', 'Jual Kebutuhan Pokok', '', 0, 34),
('000006', '000003', 'MEKAR JAYA', '087745367778', 'Jual Sayuran', '', 0, 35),
('000007', '000004', 'BURASA', '33333', 'Jual Beras', '', 0, 48);

-- --------------------------------------------------------

--
-- Struktur dari tabel `syarat_tbl`
--

CREATE TABLE IF NOT EXISTS `syarat_tbl` (
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kami_tbl`
--

CREATE TABLE IF NOT EXISTS `tentang_kami_tbl` (
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `youtube_url` varchar(50) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tentang_kami_tbl`
--

INSERT INTO `tentang_kami_tbl` (`image`, `content`, `youtube_url`, `qid`) VALUES
('', 'Pasarbumi merupakan salah satu online marketplace hasil bumi terkemuka di Indonesia. Seperti halnya situs layanan jual-beli menyediakan sarana jual-beli dari konsumen ke konsumen. Siapa pun dapat membuka toko online di Pasarbumi dan melayani pembeli dari seluruh Indonesia untuk transaksi satuan maupun banyak.', '0D6cZDfq48M', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tips_berbelanja_tbl`
--

CREATE TABLE IF NOT EXISTS `tips_berbelanja_tbl` (
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tips_berbelanja_tbl`
--

INSERT INTO `tips_berbelanja_tbl` (`title`, `image`, `content`, `qid`) VALUES
('Tips berbelanja', '', '<b>Tentukan Barang yang Ingin Dibeli</b><br>\r\nPertama, kamu tentukan dulu produk yang ingin dibeli. Setelah itu kamu bisa langsung mengetik keyword barang yang ingin kamu beli di kolom pencarian (searchbox). Atau kamu bisa langsung cari barang yang ingin kamu beli di kolom “populer” yang terletak di halaman depan Pasarbumi.\r\n<p><p>\r\n<b>Bandingkan Harga</b>\r\n<br>\r\nIni nih asyiknya belanja di marketplace kayak Pasarbumi. Kamu bisa mendapatkan barang yang kamu inginkan dengan harga yang murah. Caranya? Cukup bandingkan harga barang yang ingin kamu beli dengan barang sejenis di lapak yang lain, karena banyak Penjual yang memberikan harga kompetitif untuk produk yang sama.\r\n<p>\r\n<b>Lihat Testimonial Penjual</b>\r\n<br>\r\nJangan lupa untuk lihat testimonial Penjual, ya. Sebelum kamu klik “Beli” di lapak mereka. Testimonial bisa dijadikan ukuran untuk menilai Penjual. Pastikan kamu berbelanja di Penjual yang memiliki banyak testimonial positif ya.\r\n<p>\r\n<b>Perhatikan Detail Barang yang Ingin Dibeli</b>\r\n<br>\r\nPerhatikan baik-baik barang yang dijual oleh Penjual. Apakah detail dan spesifikasinya sesuai dengan barang yang ingin kamu beli. Agar kamu tidak perlu melakukan retur karena salah membeli barang.\r\n<p>\r\n<b>Tanyakan Stok Barang ke Penjual</b>\r\n<br>\r\nKarena tidak semua Penjual selalu melakukan update terhadap stok barang mereka, tidak ada salahnya kamu menghubungi Penjual untuk menanyakan stok barang yang ingin kamu beli. Supaya transaksi pembelianmu tidak ditolak oleh Penjual', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tips_berjualan_tbl`
--

CREATE TABLE IF NOT EXISTS `tips_berjualan_tbl` (
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tips_berjualan_tbl`
--

INSERT INTO `tips_berjualan_tbl` (`title`, `image`, `content`, `qid`) VALUES
('Tips Berjualan', '', 'Berikut langkah agar lapak mudah ditemukan sehingga meningkatkan penjualan:\r\n<p><p>\r\n<b>Pilih Judul Barang yang Menarik, Padat, dan Informatif</b>\r\n<br>\r\nSangat penting bagi penjual menulis judul barang yang menarik, padat, dan informatif. Harus menarik, karena pembeli akan melihat-lihat semua barang dari judulnya terlebih dahulu sebelum memutuskan untuk melihat detail barang tersebut. Harus padat dan informatif, karena Google hanya mempertimbangkan 70 huruf paling awal, semakin padat dan penting kata itu, barang Anda semakin mudah ditemukan di Google. \r\n<p>\r\n<b>Tulis Deskripsi dan Spesifikasi Barang dengan Lengkap</b>\r\n<br>\r\nSemakin lengkap deskripsi barang maka semakin mudah pembeli menemukan lapak penjual saat mencari di kolom pencarian Pasarbumi dan Google. Semakin menarik deskripsi barang maka pembeli akan semakin yakin berbelanja dengan si penjual.\r\n<p>\r\nSebagai informasi, ketika calon pembeli mencari barang di Pasarbumi, Pasarbumi melakukan pembobotan terhadap berbagai informasi yang dimasukkan oleh penjual. Mulai dari judul, brand, type, sampai deskripsi. Itulah kenapa, semakin lengkap info barang; semakin besar pula nilai di pencarian.\r\n<p>\r\nPasarbumi terus mengembangkan informasi suatu barang selengkap-lengkapnya untuk memudahkan pencarian bagi pembeli, untuk itu isilah dengan lengkap informasi tersebut.\r\n<p>\r\n<b>Aktif di Media Sosial (Facebook/Twitter/dll), Forum, dan Blog</b>\r\n<p>\r\nTak sedikit penjual yang berhasil meningkatkan penjual dengan melakukan cara ini. Mereka mempromosikan atau me-share link lapak mereka di Twitter, Facebook, forum atau blog. ', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_success_tbl`
--

CREATE TABLE IF NOT EXISTS `transaction_success_tbl` (
  `user_id` varchar(10) DEFAULT NULL,
  `store_id` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `image1` varchar(50) DEFAULT NULL,
  `image2` varchar(50) DEFAULT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `transaction_success_tbl`
--

INSERT INTO `transaction_success_tbl` (`user_id`, `store_id`, `order_id`, `total`, `image1`, `image2`, `qversion`, `qid`) VALUES
('000006', '000003', 'KD-00000200000320170608084320', 20000, '000002-1.jpg', '000002-1_thumb.jpg', 0, 1),
('000002', '000001', 'KD-00000200000120170610114749', 390000, '000002-6.jpg', '000002-6_thumb.jpg', 0, 5),
('000002', '000001', 'KD-00000200000120170706065558', 6000, '000002-9.jpg', '000002-9_thumb.jpg', 0, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer_accept_tbl`
--

CREATE TABLE IF NOT EXISTS `transfer_accept_tbl` (
  `user_id` varchar(10) DEFAULT NULL,
  `store_id` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `image1` varchar(50) DEFAULT NULL,
  `image2` varchar(50) DEFAULT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer_tbl`
--

CREATE TABLE IF NOT EXISTS `transfer_tbl` (
  `user_id` varchar(10) DEFAULT NULL,
  `store_id` varchar(50) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `image1` varchar(50) DEFAULT NULL,
  `image2` varchar(50) DEFAULT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tbl`
--

CREATE TABLE IF NOT EXISTS `user_tbl` (
  `user_id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `type` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  `login_attend` int(11) NOT NULL,
  `cookie` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `password`, `email`, `type`, `last_login`, `create_date`, `login_attend`, `cookie`, `status`, `qversion`, `qid`) VALUES
('000001', 'adri', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'adri.saputra.ibrahim@gmail.com', 1, '0000-00-00 00:00:00', '2017-03-31 03:31:50', 0, '', 1, 0, 26),
('000002', 'adri', 'a9f8bbb8cb84375f241ce3b9da6219a1', 'adri.saputra.ibrahim@gmail.com', 2, '0000-00-00 00:00:00', '2017-04-02 07:49:35', 0, '', 1, 0, 27),
('000003', 'ryan', 'a9f8bbb8cb84375f241ce3b9da6219a1', 'ryan@gmail.com', 2, '0000-00-00 00:00:00', '2017-04-04 16:16:11', 0, '', 1, 0, 28),
('000004', 'user1', '1404de24bdea7eb6763cf95d295ea585', 'user1@gmail.com', 1, '0000-00-00 00:00:00', '2017-04-06 10:40:04', 0, 'LQaYdILCZ3zRi2BKdV7bn0RcAw12xln4HQPpojFKtWhoNvTSDUu6yqE4JVUie3vm', 1, 0, 29),
('000005', 'user2', 'ede39e83e12f28fd5f70481ab79f47e1', 'user2@gmail.com', 1, '0000-00-00 00:00:00', '2017-04-06 12:10:49', 0, '', 1, 0, 30),
('000006', 'user3', 'b96e75a8ae3bc3026573344b6ad94c2b', 'user3@gmail.com', 1, '0000-00-00 00:00:00', '2017-04-06 12:11:13', 0, '', 1, 0, 31),
('000007', 'user4', '81f2e5b65f81b4f27d686e2329a05b04', 'user4@gmail.com', 1, '0000-00-00 00:00:00', '2017-06-12 06:39:46', 0, '', 1, 0, 33),
('000008', 'adri saputra', '202cb962ac59075b964b07152d234b70', 'adrykenhvp@gmail.com', 2, '0000-00-00 00:00:00', '2017-06-15 06:23:48', 0, '', 1, 0, 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `village_tbl`
--

CREATE TABLE IF NOT EXISTS `village_tbl` (
  `name` varchar(100) DEFAULT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `village_tbl`
--

INSERT INTO `village_tbl` (`name`, `qid`) VALUES
('Abuki', 1),
('Aleuti', 2),
('Alosika', 3),
('Asolu', 4),
('Atodopi', 5),
('Epeea', 6),
('Kumapo', 7),
('Langgea', 8),
('Matahori', 9),
('Matanggorai', 10),
('Padang Mekar', 11),
('Padangguni', 12),
('Punggaluku', 13),
('Sambaosu', 14),
('Sambeani', 15),
('Unaasi Jaya', 16),
('Walay', 17);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist_tbl`
--

CREATE TABLE IF NOT EXISTS `wishlist_tbl` (
  `user_id` varchar(10) DEFAULT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `qversion` int(11) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `wishlist_tbl`
--

INSERT INTO `wishlist_tbl` (`user_id`, `product_id`, `qversion`, `qid`) VALUES
('000002', 'PRD-00000220170406123006123006', 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_buyer_tbl`
--
ALTER TABLE `address_buyer_tbl`
  ADD UNIQUE KEY `addres_ix1` (`qid`);

--
-- Indexes for table `address_store_tbl`
--
ALTER TABLE `address_store_tbl`
  ADD UNIQUE KEY `addres_ix1` (`qid`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_ix1` (`qid`);

--
-- Indexes for table `aturan_tbl`
--
ALTER TABLE `aturan_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `bank_account_tbl`
--
ALTER TABLE `bank_account_tbl`
  ADD UNIQUE KEY `addres_ix1` (`qid`);

--
-- Indexes for table `berita_tbl`
--
ALTER TABLE `berita_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `cara_belanja_tbl`
--
ALTER TABLE `cara_belanja_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `cara_berjualan_tbl`
--
ALTER TABLE `cara_berjualan_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD UNIQUE KEY `addres_ix1` (`qid`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`user_id`,`category_id`),
  ADD UNIQUE KEY `qid` (`qid`);

--
-- Indexes for table `comment_sub_tbl`
--
ALTER TABLE `comment_sub_tbl`
  ADD UNIQUE KEY `qid` (`qid`);

--
-- Indexes for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  ADD UNIQUE KEY `qid` (`qid`);

--
-- Indexes for table `delivery_tbl`
--
ALTER TABLE `delivery_tbl`
  ADD UNIQUE KEY `addres_ix1` (`qid`);

--
-- Indexes for table `hubungi_tbl`
--
ALTER TABLE `hubungi_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `jaminan_tbl`
--
ALTER TABLE `jaminan_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `karir_tbl`
--
ALTER TABLE `karir_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `kebijakan_tbl`
--
ALTER TABLE `kebijakan_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD UNIQUE KEY `addres_ix1` (`qid`);

--
-- Indexes for table `pages_shopping_tbl`
--
ALTER TABLE `pages_shopping_tbl`
  ADD UNIQUE KEY `qid` (`qid`);

--
-- Indexes for table `panduan_tbl`
--
ALTER TABLE `panduan_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `pembayaran_tbl`
--
ALTER TABLE `pembayaran_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `penarikan_tbl`
--
ALTER TABLE `penarikan_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `pengembalian_tbl`
--
ALTER TABLE `pengembalian_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `person_tbl`
--
ALTER TABLE `person_tbl`
  ADD PRIMARY KEY (`person_id`,`user_id`),
  ADD UNIQUE KEY `person_ix1` (`qid`);

--
-- Indexes for table `premium_user_tbl`
--
ALTER TABLE `premium_user_tbl`
  ADD PRIMARY KEY (`store_id`),
  ADD UNIQUE KEY `qid` (`qid`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`user_id`,`store_id`,`product_id`),
  ADD UNIQUE KEY `product_ix1` (`qid`);

--
-- Indexes for table `store_tbl`
--
ALTER TABLE `store_tbl`
  ADD PRIMARY KEY (`user_id`,`store_id`),
  ADD UNIQUE KEY `store_ix1` (`qid`);

--
-- Indexes for table `syarat_tbl`
--
ALTER TABLE `syarat_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `tentang_kami_tbl`
--
ALTER TABLE `tentang_kami_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `tips_berbelanja_tbl`
--
ALTER TABLE `tips_berbelanja_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `tips_berjualan_tbl`
--
ALTER TABLE `tips_berjualan_tbl`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `transaction_success_tbl`
--
ALTER TABLE `transaction_success_tbl`
  ADD UNIQUE KEY `addres_ix1` (`qid`);

--
-- Indexes for table `transfer_accept_tbl`
--
ALTER TABLE `transfer_accept_tbl`
  ADD UNIQUE KEY `addres_ix1` (`qid`);

--
-- Indexes for table `transfer_tbl`
--
ALTER TABLE `transfer_tbl`
  ADD UNIQUE KEY `addres_ix1` (`qid`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_ix1` (`qid`);

--
-- Indexes for table `village_tbl`
--
ALTER TABLE `village_tbl`
  ADD UNIQUE KEY `qid` (`qid`);

--
-- Indexes for table `wishlist_tbl`
--
ALTER TABLE `wishlist_tbl`
  ADD UNIQUE KEY `addres_ix1` (`qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_buyer_tbl`
--
ALTER TABLE `address_buyer_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `address_store_tbl`
--
ALTER TABLE `address_store_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `aturan_tbl`
--
ALTER TABLE `aturan_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `bank_account_tbl`
--
ALTER TABLE `bank_account_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `berita_tbl`
--
ALTER TABLE `berita_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cara_belanja_tbl`
--
ALTER TABLE `cara_belanja_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cara_berjualan_tbl`
--
ALTER TABLE `cara_berjualan_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `comment_sub_tbl`
--
ALTER TABLE `comment_sub_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hubungi_tbl`
--
ALTER TABLE `hubungi_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jaminan_tbl`
--
ALTER TABLE `jaminan_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `karir_tbl`
--
ALTER TABLE `karir_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kebijakan_tbl`
--
ALTER TABLE `kebijakan_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pages_shopping_tbl`
--
ALTER TABLE `pages_shopping_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `panduan_tbl`
--
ALTER TABLE `panduan_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembayaran_tbl`
--
ALTER TABLE `pembayaran_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penarikan_tbl`
--
ALTER TABLE `penarikan_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengembalian_tbl`
--
ALTER TABLE `pengembalian_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `person_tbl`
--
ALTER TABLE `person_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `premium_user_tbl`
--
ALTER TABLE `premium_user_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `store_tbl`
--
ALTER TABLE `store_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `syarat_tbl`
--
ALTER TABLE `syarat_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tentang_kami_tbl`
--
ALTER TABLE `tentang_kami_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tips_berbelanja_tbl`
--
ALTER TABLE `tips_berbelanja_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tips_berjualan_tbl`
--
ALTER TABLE `tips_berjualan_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `village_tbl`
--
ALTER TABLE `village_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `wishlist_tbl`
--
ALTER TABLE `wishlist_tbl`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `store_tbl`
--
ALTER TABLE `store_tbl`
  ADD CONSTRAINT `store_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`user_id`);

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `cancel_transaction` ON SCHEDULE EVERY 1 SECOND STARTS '2017-06-06 06:51:40' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE order_tbl SET status='5'
WHERE status = '1'
AND CAST(date AS DATE) < DATE_SUB(NOW(), INTERVAL 1 DAY)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
