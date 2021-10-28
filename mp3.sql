-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 04:50 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(11) NOT NULL,
  `noidung_bl` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_nhac` int(11) NOT NULL,
  `thoigian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id_binhluan`, `noidung_bl`, `id_user`, `id_nhac`, `thoigian`) VALUES
(13, 'hello', 1, 13, '21-10, 2021  07:17 AM'),
(14, 'hay quá :v', 1, 13, '21-10, 2021  07:17 AM'),
(15, 'quá dữ', 1, 13, '21-10, 2021  07:17 AM'),
(16, 'quá hay ', 1, 13, '21-10, 2021  11:16 AM'),
(17, 'hello world\n', 1, 13, '24-10, 2021  05:04 PM'),
(18, 'tuyệt vời', 1, 5, '26-10, 2021  09:14 AM'),
(19, 'test', 1, 13, '26-10, 2021  09:23 AM');

-- --------------------------------------------------------

--
-- Table structure for table `nhac`
--

CREATE TABLE `nhac` (
  `id_nhac` int(11) NOT NULL,
  `tieude` varchar(50) NOT NULL,
  `casi` varchar(50) NOT NULL,
  `loi` text NOT NULL,
  `tenfile` varchar(100) NOT NULL,
  `ngay_upload` varchar(30) NOT NULL,
  `luotnghe` int(11) NOT NULL DEFAULT 0,
  `anh_nhac` text NOT NULL DEFAULT 'default_song.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhac`
--

INSERT INTO `nhac` (`id_nhac`, `tieude`, `casi`, `loi`, `tenfile`, `ngay_upload`, `luotnghe`, `anh_nhac`) VALUES
(5, 'Có chắc yêu là đây', 'Sơn Tùng M-TP', 'Thấp thoáng ánh mắt, thấp thoáng ánh mắt\r\nThấp thoáng ánh mắt, thấp thoáng ánh mắt\r\nGood boy\r\nThấp thoáng ánh mắt đôi môi mang theo hương mê say\r\nEm cho anh tan trong miên man quên luôn đi đêm ngày\r\nChạm nhẹ vội vàng hai ba giây nhưng con tim đâu hay\r\nBối rối khẽ lên ngôi yêu thương đong đầy thật đầy\r\nAnh ngẩn ngơ cứ ngỡ\r\n(Đó chỉ là giấc mơ)\r\nAnh ngẩn ngơ cứ ngỡ\r\n(Như đang ngất ngây trong giấc mơ)\r\nThật ngọt ngào êm dịu đắm chìm\r\nPhút chốc viết tương tư gieo nên thơ\r\nCó câu ca trong gió hát ngân nga, ru trời mây\r\nNhẹ nhàng đón ban mai ngang qua trao nụ cười\r\nNắng đua chen, khoe sắc, vui đùa giữa muôn ngàn hoa\r\nDịu dàng đến nhân gian âu yếm tâm hồn người\r\nHình như chính em\r\n(Cho anh mong chờ)\r\nHình như chính là em\r\n(Cho anh vấn vương)\r\nĐừng thờ ơ, xin hãy lắng nghe\r\nVà giúp anh trả lời đôi điều còn băn khoăn\r\nCó chắc yêu là đây, đây, đây\r\nCó chắc yêu là đây, đây\r\nCó chắc yêu là đây, đây, đây\r\nCó chắc yêu là đây, đây\r\nEm lang thang cả ngày trong tâm trí\r\nĐi không ngừng cả ngày trong tâm trí\r\nSi mê thêm cuồng quay\r\nOo-ooh (Có chắc yêu là đây)\r\nChắc gì nữa mà chắc\r\nSáng thì nhớ đêm trắng tương tư còn không phải yêu là gì\r\n(Có chắc yêu là đây)\r\nRồi thắc gì nữa mà mắc\r\nĐến bên nắm tay nói ra ngay ngồi mơ mộng thêm làm gì\r\nNhanh chân chạy mua một bó hoa (Hey)\r\nThêm luôn một món quà (Ooh)\r\nKhuôn mặt tươi cười lên vô tư gạt đi lo âu mạnh mẽ nha\r\nVà rồi bước ra, bước ra, bước ra\r\nCó câu ca trong gió hát ngân nga, ru trời mây\r\nNhẹ nhàng đón ban mai ngang qua trao nụ cười\r\nNắng đua chen, khoe sắc, vui đùa giữa muôn ngàn hoa\r\nDịu dàng đến nhân gian âu yếm tâm hồn người\r\nHình như chính em\r\n(Cho anh mong chờ)\r\nHình như chính là em\r\n(Cho anh vấn vương)\r\nĐừng thờ ơ, xin hãy lắng nghe\r\nVà giúp anh trả lời đôi điều còn băn khoăn\r\nCó chắc yêu là đây, đây, đây\r\nCó chắc yêu là đây, đây\r\nCó chắc yêu là đây, đây, đây\r\nCó chắc yêu là đây, đây\r\nEm lang thang cả ngày trong tâm trí\r\nĐi không ngừng cả ngày trong tâm trí\r\nSi mê thêm cuồng quay\r\nOo-ooh, oo-oo-oo-ooh\r\nCó chắc yêu là đây (A-ah, a-ah)\r\nCó chắc yêu là đây (Ooh-ooh, oo-ooh)\r\nCó chắc yêu là đây\r\nPlease come to me!\r\nPlease come to me!\r\nCó chắc yêu là đây, đây, đây\r\nCó chắc yêu là đây, đây\r\nCó chắc yêu là đây, đây, đây\r\nCó chắc yêu là đây, đây\r\nEm lang thang cả ngày trong tâm trí\r\nĐi không ngừng cả ngày trong tâm trí\r\nSi mê thêm cuồng quay\r\nOo-ooh, oo-oo-oo-ooh\r\nM-TP\r\n(Có chắc yêu là đây, đây) Một bài hát\r\nDành đến cho tất cả những ai đang yêu (Có chắc yêu là đây, đây, đây)\r\nChưa yêu và sẽ được yêu (Có chắc yêu là đây, đây)\r\nHạnh phúc nhá!', 'Sơn Tùng M-TP-Có chắc yêu là đây.mp3', '04/10/2021', 22, 'default_song.png'),
(7, 'Forget Me Now', 'Trí Dũng', 'Lời bài hát', 'Trí Dũng-Forget Me Now.mp3', '04/10/2021', 5, 'default_song.png'),
(8, 'MONEY', 'LISA', 'Lời bài hát', 'LISA-MONEY.mp3', '04/10/2021', 25, 'default_song.png'),
(10, 'Cưới Thôi', 'Masew x B-Ray x Tap', 'lời bài hát', 'Masew x B-Ray x Tap-Cưới Thôi.mp3', '04/10/2021', 5, 'default_song.png'),
(13, 'Tát nước đầu đình', 'LINK LEE', 'Chưa có lời bài hát', 'LINK LEE-Tát nước đầu đình.mp3', '18/10/2021', 20, 'LINK LEE-Tát nước đầu đình.jpg'),
(17, 'Chúng Ta Của Hiện Tại', 'Sơn Tùng - MTP', 'Chưa có lời bài hát', 'Sơn Tùng - MTP-Chúng Ta Của Hiện Tại.mp3', '26/10/2021', 1, 'default_song.png');

-- --------------------------------------------------------

--
-- Table structure for table `thuviennhac`
--

CREATE TABLE `thuviennhac` (
  `id_user` int(11) NOT NULL,
  `id_nhac` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thuviennhac`
--

INSERT INTO `thuviennhac` (`id_user`, `id_nhac`) VALUES
(1, 13),
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(30) NOT NULL,
  `pass_user` varchar(100) NOT NULL,
  `hoten_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `sdt_user` varchar(11) NOT NULL,
  `ngaysinh_user` varchar(10) NOT NULL,
  `gioitinh_user` int(11) NOT NULL,
  `anh_user` text NOT NULL DEFAULT 'default_avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `pass_user`, `hoten_user`, `email_user`, `sdt_user`, `ngaysinh_user`, `gioitinh_user`, `anh_user`) VALUES
(1, 'truong901', 'nhattruong901', 'Nhật Trường', 'nhattruongvn321@gmail.com', '0344449794', '2000-10-10', 0, '1.jpg'),
(4, 'truong111', '123123', 'truong', 'truong.nhn.60cntt@ntu.edu.vn', '0344449795', '2000-10-10', 0, 'default_avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `username`, `password`, `level`) VALUES
(1, 'truong901', '123', 1),
(2, 'truong123', '123', 2),
(6, 'truong111', '123', 1),
(7, 'thien', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_nhac` (`id_nhac`);

--
-- Indexes for table `nhac`
--
ALTER TABLE `nhac`
  ADD PRIMARY KEY (`id_nhac`);

--
-- Indexes for table `thuviennhac`
--
ALTER TABLE `thuviennhac`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_nhac` (`id_nhac`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nhac`
--
ALTER TABLE `nhac`
  MODIFY `id_nhac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`id_nhac`) REFERENCES `nhac` (`id_nhac`);

--
-- Constraints for table `thuviennhac`
--
ALTER TABLE `thuviennhac`
  ADD CONSTRAINT `thuviennhac_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `thuviennhac_ibfk_2` FOREIGN KEY (`id_nhac`) REFERENCES `nhac` (`id_nhac`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
