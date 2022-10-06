-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2022 at 03:44 PM
-- Server version: 10.3.32-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `growtech_portal_sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` char(36) NOT NULL,
  `id_artikel_kategori` char(36) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `slug_artikel` varchar(255) NOT NULL,
  `gambar_artikel` varchar(255) NOT NULL,
  `konten_artikel` longtext NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` char(36) NOT NULL,
  `status_approved` enum('Menunggu','Tayang','Ditolak') NOT NULL,
  `approved_by` char(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id_artikel_kategori`, `judul_artikel`, `slug_artikel`, `gambar_artikel`, `konten_artikel`, `created_date`, `created_by`, `status_approved`, `approved_by`) VALUES
('8aeeee49-0be9-4864-b808-05ac80856d19', 'ee13326a-8658-44ae-9451-b54bec06ff45', 'Datang Naik Perahu, Inter Bikin Tuan Rumah Malu', 'datang-naik-perahu-inter-bikin-tuan-rumah-malu', '0aa82b17-b810-4415-ad7d-295381d91b53.jpg', '<p>Inter Milano meraih hasil positif saat bertandang ke Venezia. Datang \r\nke markas Venezia dengan menggunakan perahu, Inter pun berhasil bikin \r\nmalu sang tuan rumah. </p>\r\n\r\n\r\n\r\n<p>Bukan malu karena mesti naik perahu. Markas Venezia bukan sedang \r\nkebanjiran sehingga para pemain Inter mesti datang pakai perahu. Bukan, \r\nbukan itu.</p>\r\n\r\n\r\n\r\n<p>Tahu sendiri kan kalau Venezia ini berasal dari Venice yang \r\nwilayahnya dikelilingi air. Transportasi utamanya pun perahu ketimbang \r\nmobil. Sudah menjadi hal yang umum bagi tim-tim Seri A saat bertandang \r\nke Venezia menggunakan perahu. </p>\r\n\r\n\r\n\r\n<p>Meski naik perahu, Inter ke sana bukan sekadar jadi turis yang cuma \r\ndatang foto-foto. Tapi beneran main bola dan sukses mempermalukan tuan \r\nrumah dengan skor 2-0.</p>\r\n\r\n\r\n\r\n<p>Hakan Calhanoglu membuka keunggulan lewat tendangan dari luar kotak penalti yang tak bisa digapai kiper Venezia, Sergio Romero. </p>\r\n\r\n\r\n\r\n<p>Di babak kedua, Inter punya banyak peluang tapi tak ada yang jadi gol. Masih banyak ditepis kiper maupun bek-beknya Venezia. </p>\r\n\r\n\r\n\r\n<p>Inter baru bisa menggandakan keunggulan lewat voucher P di \r\nakhir-akhir laga setelah salah satu pemain tuan rumah yang belum \r\ndiketahui namanya melakukan <em>handball. </em>Lautaro dengan enak menaruh bola ke arah berlawanan dari kiper Romero. </p>\r\n\r\n\r\n\r\n<p>Selain menang, Inter sukses meraih <em>cleansheet</em>. Sesuatu yang jarang didapat Inter musim ini. Dari 13 laga, mereka sebelumnya cuma bisa <em>cleansheet </em>tiga kali saja.  </p>', '2021-12-22 20:10:02', '8caef8d4-4b31-4182-9c34-349e2c80b74b', 'Tayang', 'eb6c41b5-310a-49da-bc29-8556197f043c'),
('9dab8190-c2b7-4e54-886b-9d6f068626f9', 'ee13326a-8658-44ae-9451-b54bec06ff45', 'Apa Itu Grup Neraka? Liverpool Gampang-gampang Saja', 'apa-itu-grup-neraka-liverpool-gampang-gampang-saja', '5e77ba2c-bedb-42fd-8121-297566aa2739.jpg', '<p>Porto gagal memastikan diri lolos ke babak 16 besar di laga ini. \r\nMeski memberikan perlawanan mantap, mereka tetap kalah dari Liverpool \r\n0-2. Akibatnya, tiket mereka masih tertunda. </p>\r\n\r\n\r\n\r\n<p>Liverpool memang <em>ajib </em>banget di UCL musim ini. Semua laga \r\ndisapu bersih dan mengumpulkan 15 poin. Belum pernah seri apalagi kalah.\r\n Padahal, mereka tergabung di grup neraka di mana keempat tim langganan \r\nmain di UCL. Kecuali tim bernama Milan yang absen beberapa tahun.</p>\r\n\r\n\r\n\r\n<p>Ternyata, Liverpool melewati grup ini dengan gampang-gampang saja. Tak ada susahnya sama sekali. </p>\r\n\r\n\r\n\r\n<p>Porto nyaris saja unggul 2-0 lewat sebuah peluang emas yang sudah \r\nenak banget. Tapi dua peluangnya masih melebar. Benar-benar tak ada \r\nbersyukurnya, sudah kosong di depan gawang, Otavio malah menendangnya ke\r\n papan sponsor. </p>\r\n\r\n\r\n\r\n<p>Di babak kedua, Liverpool akhirnya unggul lewat tendangan <em>drive </em>dari\r\n Thiago Alcantara. Sebuah tendangan jarak jauh berteknik tinggi membuat \r\nbola mengambang di atas tanah tanpa bisa dicegah para warga Porto. \r\nSangat berkelas. </p>\r\n\r\n\r\n\r\n<p>Tak lama kemudian, Mohamed Salah menggandakan keunggulan setelah melakukan pergerakan <em>cutting inside </em>dan mengecoh sedikit bek Porto sampai nyusruk. Bola ditembak ke tiang dekat kiper Porto. </p>\r\n\r\n\r\n\r\n<p>Dengan kemenangan ini, Liverpool unggul sangat jauh dari Porto yang \r\nada di posisi kedua dengan selisih 10 poin. Luar binasa. Katanya grup \r\nneraka? Ternyata tidak ngaruh bagi Liverpool.  </p>', '2021-12-22 20:09:14', '8caef8d4-4b31-4182-9c34-349e2c80b74b', 'Tayang', 'eb6c41b5-310a-49da-bc29-8556197f043c'),
('ae1d389c-2149-4723-8cd4-96c351bc92b7', 'ee13326a-8658-44ae-9451-b54bec06ff45', 'Kepak Sayap Kebhinekaan Ala PSG, Meski Diharamkan di Rental PS', 'kepak-sayap-kebhinekaan-ala-psg-meski-diharamkan-di-rental-ps', '1faf9b0b-1281-4791-8b9d-13f49e0230d0.png', '<p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Jargon “Kepak Sayap Kebhinnekaan” yang dipopulerkan mbak Puan Maharani semakin semarak di dunia maya. Meski banyak meme berupa sindiran terhadap spanduk kampanye dari mbak Puan, namun kata-kata itu tanpa disadari melekat di benak kita.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Tanpa disadari, dunia sepak bola juga terkena virus “Kepak Sayap Kebhinnekaan” ala mbak Puan. Yang teranyar, muncul meme Kepa Arrizabalaga yang menjadi pahlawan Chelsea di Piala Super dengan jargon “Kepa Sayap Kemenangan”.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Tentu saja, ini cuma lucu-lucuan saja. Saya yakin timnya mbak Puan serta pesaingnya, Airlangga Hartarto, yang juga sedang berlomba bikin baliho, tidak akan mempermasalahkan hal ini. Justru ini semakin menarik dan menambah sisi kreativitas masyarakat.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Jika jargon tersebut dibawa ke PSG, maka cocoklah “<em>Les Parisiens</em>” mengusung “Kepak Sayap Kebhinnekaan” itu tadi. Kepak sayap diartikan sebagai burung. Burung yang dimaksud tentu saja burung Garuda lambang negara kita. Di burung Garuda, terdapat “Bhinneka Tunggal Ika” yang bermakna persatuan meski berbeda-beda suku bangsa.</p><figure class=\"wp-block-embed-twitter wp-block-embed is-type-rich is-provider-twitter\" style=\"margin-bottom: 1em; color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;; font-size: 15px;\"><div class=\"wp-block-embed__wrapper\">https://twitter.com/mejajangmyeon/status/1425717143161561089</div></figure><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Musim ini, PSG semakin melengkapi “kebhinnekaan” tersebut. Meski berasal dari Prancis, tetapi mereka memiliki banyak pemain dari berbagai macam suku bangsa.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Mereka memiliki pemain yang berasal dari enam negara top Eropa di sepak bola yakni Jerman, Prancis, Italia, Spanyol, Belanda, dan Portugal. Tinggal Inggrisnya saja yang belum, mungkin mereka lagi sibuk “Is Coming Home”.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Dari Amerika Latin, terdapat Argentina dan Brasil. Tak usah disebut siapa pemain-pemainnya. Pasti sudah pada tahu.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Dari Afrika, ada duo Senegal, Abdou Diallo dan Idrissa Gueye. Kemudian bertambah satu pemain dari Afrika Utara, yakni Achraf Hakimi, yang berasal dari Maroko.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Dari Amerika Tengah, ada Keylor Navas yang kalian juga sudah pada tahu negaranya dari Kosta Rika, bukan dari Brunei Darussalam. Tinggal pemain dari ras Asia saja nih yang belum. Mungkin Rizky Ridho bisa mengisi lini belakang PSG, ya siapa tahu saja.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Memang masih banyak suku bangsa yang belum ada di PSG, contohnya saja dari Kosovo, Kep. Fiji, Mongolia, atau Tibet. Namun, dari segi skill tentu saja “kebhinnekaan” itu sudah terasa lengkap. Mau segala jenis pemain ber-skill apa juga ada.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Mau yang tipe lari ada, mau yang gampang jatuh juga ada, mau yang bola lengket di kaki ada, mau yang bervisi ada, mau yang jago tekel ada, mau ngajak ribut ada, bahkan sampai yang tukang ngembat istri orang juga ada.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Kedatangan Gigi Donnarumma, Hakimi, Sergio Ramos, Giorginio Wijnaldum, dan terakhir adalah dewa dari segala dewa sepak bola, Lionel Messi, semakin melengkapi kualitas permainan PSG dan sudah pasti bintang lima&nbsp;<em>full&nbsp;</em>kalau di PES atau FIFA.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Kok bisa-bisanya, dalam satu bursa transfer kedatangan pemain-pemain bagus dan juara, mulai dari kiper sampai striker. Semuanya top class. Kelas dunia.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Wajar, jika muncul&nbsp;<em>meme</em>&nbsp;atau lelucon adanya “pelarangan” memakai PSG di gim PES atau FIFA. Sebenarnya boleh-boleh saja, tapi siap-siap di-<em>bully</em>&nbsp;karena kalau pakai PSG jadi serba salah.</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Jika menang, maka akan dibilang “<em>Ya wajar lah namanya PSG kebangetan banget kalau enggak menang</em>.” Giliran kalah makin parah, “<em>Idihh pake PSG aja enggak menang</em>.”</p><p style=\"font-family: &quot;Open Sans&quot;; font-size: 15px; line-height: 26px; margin-bottom: 26px; color: rgb(34, 34, 34);\">Jadi, memang sebaiknya tidak usah dipakai lah seonggok tim bernama PSG itu. Biarkanlah mereka mengepakkan sayap kebhinnekaan versi mereka sendiri.</p>', '2021-12-18 23:15:03', '8caef8d4-4b31-4182-9c34-349e2c80b74b', 'Tayang', 'eb6c41b5-310a-49da-bc29-8556197f043c');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_kategori`
--

CREATE TABLE `artikel_kategori` (
  `id_artikel_kategori` char(36) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel_kategori`
--

INSERT INTO `artikel_kategori` (`id_artikel_kategori`, `nama_kategori`) VALUES
('ee13326a-8658-44ae-9451-b54bec06ff45', 'Kalasemen Sepak Bola');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_komentar`
--

CREATE TABLE `artikel_komentar` (
  `id_artikel_komentar` char(36) NOT NULL,
  `id_artikel` char(36) NOT NULL,
  `id_user` char(36) NOT NULL,
  `tanggal_komentar` datetime NOT NULL DEFAULT current_timestamp(),
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel_komentar`
--

INSERT INTO `artikel_komentar` (`id_artikel_komentar`, `id_artikel`, `id_user`, `tanggal_komentar`, `isi_komentar`) VALUES
('edc698ce-8f34-4e60-8e73-e44c8d75c94c', '8aeeee49-0be9-4864-b808-05ac80856d19', '967b35eb-7e3b-49f2-a082-6867f3b2b3e9', '2021-12-26 10:20:43', 'Arikelnya sangat membantu sobat, website yang menarik dengan konten yang tidak biasa\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(36) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level_user` int(11) NOT NULL DEFAULT 1 COMMENT '1: Superadmin, 2:Admin, 3:Penulis, 4:User',
  `status_hapus_user` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `password`, `level_user`, `status_hapus_user`) VALUES
('8caef8d4-4b31-4182-9c34-349e2c80b74b', 'penulis', 'penulis@gmail.com', '$2y$10$3t9wGaPMnrQqettSDTpzK.2NMWpbTI1p5DKtinUj4rMAHxrlTkovG', 3, 0),
('967b35eb-7e3b-49f2-a082-6867f3b2b3e9', 'user', 'user@gmail.com', '$2y$10$KHo04GZ.kmt4hTv05DKeWOjrc9lhBD3MHOMlXSPhj8YQMs.Q3cjOq', 4, 0),
('e401b3c7-5dba-11ec-9355-d0509999a4d7', 'superadmin', 'superadmin@gmail.com', '$2y$10$hDXF1GnkUGFZlzLPRznM/eMZ.gN0kUQfrV7SMurj2ldzgSgto4gR2', 1, 0),
('eb6c41b5-310a-49da-bc29-8556197f043c', 'admin', 'admin@gmail.com', '$2y$10$rjbqkQUADxwtUh.wFzU11OAsDqNsNMxZhWnH0I5uKSdcGYetNQNEC', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `artikel_kategori`
--
ALTER TABLE `artikel_kategori`
  ADD PRIMARY KEY (`id_artikel_kategori`);

--
-- Indexes for table `artikel_komentar`
--
ALTER TABLE `artikel_komentar`
  ADD PRIMARY KEY (`id_artikel_komentar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
