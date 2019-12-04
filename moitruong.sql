-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 12:01 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `moitruong`
--

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

CREATE TABLE IF NOT EXISTS `cauhoi` (
`idcauhoi` int(11) NOT NULL,
  `thongtin` varchar(50) CHARACTER SET utf8 NOT NULL,
  `idloai` int(11) NOT NULL,
  `idchude` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cauhoi`
--

INSERT INTO `cauhoi` (`idcauhoi`, `thongtin`, `idloai`, `idchude`) VALUES
(1, 'Mức độ rác thải ?', 1, 1),
(2, 'Tình trạng môi trường?', 2, 1),
(3, 'Tình trạng nước sạch ?', 1, 1),
(4, 'Giao thông ?', 2, 1),
(6, 'Tình trạng dân số ?', 1, 1),
(7, 'Tình trạng vật nuôi ?', 2, 1),
(18, 'Số lượng vật nuôi', 1, 2),
(21, 'hugn ?', 2, 2),
(23, 'Mùa xuân', 3, 2),
(24, 'Tên trường', 3, 4),
(25, 'Số lớp học', 1, 4),
(26, 'Cấp trường', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `chude`
--

CREATE TABLE IF NOT EXISTS `chude` (
`idchude` int(11) NOT NULL,
  `thongtin` varchar(50) CHARACTER SET utf8 NOT NULL,
  `more` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pub` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chude`
--

INSERT INTO `chude` (`idchude`, `thongtin`, `more`, `pub`) VALUES
(1, 'Môi trường', 'Xin chào mọi người', 1),
(2, 'Động vật', 'Một ngày đẹp trời', 1),
(3, 'Con người', 'Rất vui được gặp lại', 0),
(4, 'Trường học?', 'Một ngày đẹp trời', 0);

-- --------------------------------------------------------

--
-- Table structure for table `diadiem`
--

CREATE TABLE IF NOT EXISTS `diadiem` (
  `id` int(50) NOT NULL,
  `thongtin` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diadiem`
--

INSERT INTO `diadiem` (`id`, `thongtin`) VALUES
(1, 'Hà Nội'),
(2, 'Hải Phòng'),
(3, 'Đà Nẵng'),
(4, 'Hồ Chí Minh'),
(5, 'Cần Thơ');

-- --------------------------------------------------------

--
-- Table structure for table `ketqua`
--

CREATE TABLE IF NOT EXISTS `ketqua` (
  `id` int(11) NOT NULL,
  `idtraloi` int(11) NOT NULL,
  `thongtin` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ketqua`
--

INSERT INTO `ketqua` (`id`, `idtraloi`, `thongtin`) VALUES
(1, 2, NULL),
(1, 2, NULL),
(1, 1, NULL),
(1, 5, NULL),
(1, 8, NULL),
(1, 10, NULL),
(1, 3, NULL),
(1, 6, NULL),
(1, 8, NULL),
(1, 10, NULL),
(1, 2, NULL),
(1, 5, NULL),
(1, 9, NULL),
(1, 10, NULL),
(1, 2, NULL),
(1, 4, NULL),
(1, 9, NULL),
(1, 11, NULL),
(1, 2, NULL),
(1, 4, NULL),
(1, 9, NULL),
(1, 11, NULL),
(1, 2, NULL),
(1, 5, NULL),
(1, 9, NULL),
(1, 10, NULL),
(1, 2, NULL),
(1, 5, NULL),
(1, 9, NULL),
(1, 11, NULL),
(1, 2, NULL),
(1, 5, NULL),
(1, 9, NULL),
(1, 11, NULL),
(2, 3, NULL),
(2, 4, NULL),
(2, 8, NULL),
(2, 10, NULL),
(2, 2, NULL),
(2, 5, NULL),
(2, 8, NULL),
(2, 10, NULL),
(2, 1, NULL),
(2, 5, NULL),
(2, 9, NULL),
(2, 10, NULL),
(2, 14, NULL),
(2, 2, NULL),
(2, 5, NULL),
(2, 8, NULL),
(2, 10, NULL),
(2, 12, NULL),
(1, 54, NULL),
(1, 54, NULL),
(1, 66, NULL),
(1, 67, NULL),
(1, 68, NULL),
(1, 54, NULL),
(1, 66, NULL),
(1, 68, NULL),
(2, 54, NULL),
(2, 66, NULL),
(2, 68, NULL),
(1, 58, NULL),
(1, 66, NULL),
(1, 67, NULL),
(1, 68, NULL),
(1, 58, NULL),
(1, 58, NULL),
(1, 58, NULL),
(1, 58, NULL),
(1, 58, NULL),
(1, 58, NULL),
(1, 70, 'hello'),
(1, 70, 'Mùa hạ'),
(1, 70, 'Mùa hạ'),
(1, 70, 'Mùa hạ'),
(1, 70, 'Hi'),
(1, 54, NULL),
(1, 66, NULL),
(1, 68, NULL),
(1, 70, 'Ho'),
(1, 72, NULL),
(1, 76, NULL),
(1, 77, NULL),
(1, 78, NULL),
(1, 71, 'Hà nội'),
(2, 54, NULL),
(2, 66, NULL),
(2, 67, NULL),
(2, 70, 'Mùa đông'),
(1, 74, NULL),
(1, 76, NULL),
(1, 77, NULL),
(1, 78, NULL),
(1, 71, 'hcnjzxc'),
(1, 1, NULL),
(1, 4, NULL),
(1, 6, NULL),
(1, 11, NULL),
(1, 24, NULL),
(2, 54, NULL),
(2, 66, NULL),
(2, 67, NULL),
(2, 68, NULL),
(2, 70, 'hngsdiofsa'),
(1, 58, NULL),
(1, 66, NULL),
(1, 67, NULL),
(1, 68, NULL),
(1, 70, 'fjskdsns'),
(2, 54, NULL),
(2, 66, NULL),
(2, 67, NULL),
(2, 68, NULL),
(2, 70, 'nghng');

-- --------------------------------------------------------

--
-- Table structure for table `lichsu`
--

CREATE TABLE IF NOT EXISTS `lichsu` (
  `id` int(11) NOT NULL,
  `congviec` varchar(50) CHARACTER SET utf8 NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lichsu`
--

INSERT INTO `lichsu` (`id`, `congviec`, `thoigian`) VALUES
(1, 'Đăng nhập', '2019-09-18 09:07:37'),
(1, 'Đăng xuất', '2019-07-18 19:07:32'),
(1, 'Khảo sát', '2019-07-14 18:06:59'),
(2, 'Đăng nhập', '2019-09-18 09:07:37'),
(2, 'Đăng xuất', '2019-11-20 15:32:00'),
(2, 'Đăng xuất', '2019-11-19 10:48:00'),
(2, 'Đăng xuất', '2019-11-19 10:50:02'),
(3, 'Đăng xuất', '2019-11-19 10:51:08'),
(3, 'Đăng xuất', '2019-11-19 10:51:19'),
(3, 'Đăng xuất', '2019-11-19 10:53:14'),
(3, 'Đăng xuất', '2019-11-19 10:53:34'),
(4, 'Đăng nhập', '2019-11-19 10:53:41'),
(4, 'Đăng xuất', '2019-11-19 10:53:47'),
(1, 'Đăng nhập', '2019-11-19 10:57:37'),
(1, 'Đăng xuất', '2019-11-19 10:57:49'),
(2, 'Đăng nhập', '2019-11-19 10:57:54'),
(2, 'Đăng nhập', '2019-11-19 10:58:40'),
(2, 'Đăng xuất', '2019-11-19 10:58:49'),
(1, 'Đăng nhập', '2019-11-19 10:58:54'),
(1, 'Đăng nhập', '2019-11-19 11:00:54'),
(1, 'Khảo sát', '2019-11-19 11:00:57'),
(1, 'Đăng xuất', '2019-11-19 11:01:14'),
(2, 'Đăng nhập', '2019-11-19 11:01:19'),
(2, 'Khảo sát', '2019-11-19 11:01:26'),
(2, 'Đăng xuất', '2019-11-19 11:05:00'),
(1, 'Đăng nhập', '2019-11-19 15:24:41'),
(1, 'Khảo sát', '2019-11-19 15:26:01'),
(2, 'Đăng nhập', '2019-11-19 15:32:30'),
(2, 'Khảo sát', '2019-11-19 15:32:55'),
(2, 'Đăng xuất', '2019-11-19 15:33:44'),
(2, 'Đăng nhập', '2019-11-19 15:33:51'),
(2, 'Khảo sát', '2019-11-19 15:34:16'),
(2, 'Đăng xuất', '2019-11-19 15:34:17'),
(1, 'Đăng nhập', '2019-11-19 15:34:23'),
(1, 'Đăng xuất', '2019-11-19 15:38:55'),
(2, 'Đăng nhập', '2019-11-19 15:39:01'),
(2, 'Khảo sát', '2019-11-19 15:39:20'),
(2, 'Khảo sát', '2019-11-19 15:40:31'),
(1, 'Khảo sát', '2019-11-19 15:41:55'),
(2, 'Khảo sát', '2019-11-19 15:43:34'),
(1, 'Đăng nhập', '2019-11-22 10:22:08'),
(1, 'Đăng nhập', '2019-11-22 19:44:27'),
(1, 'Đăng nhập', '2019-11-25 09:24:21'),
(1, 'Khảo sát', '2019-11-25 11:13:14'),
(1, 'Khảo sát', '2019-11-25 11:16:13'),
(1, 'Khảo sát', '2019-11-25 11:16:21'),
(1, 'Đăng xuất', '2019-11-25 11:44:00'),
(2, 'Đăng nhập', '2019-11-25 11:44:05'),
(2, 'Khảo sát', '2019-11-25 11:46:59'),
(1, 'Đăng nhập', '2019-11-26 08:39:16'),
(1, 'Khảo sát', '2019-11-26 09:33:59'),
(1, 'Khảo sát', '2019-11-26 09:35:30'),
(1, 'Khảo sát', '2019-11-26 09:45:08'),
(1, 'Khảo sát', '2019-11-26 09:48:34'),
(1, 'Khảo sát', '2019-11-26 09:50:44'),
(1, 'Khảo sát', '2019-11-26 09:54:41'),
(1, 'Khảo sát', '2019-11-26 09:56:21'),
(1, 'Khảo sát', '2019-11-26 09:56:59'),
(1, 'Khảo sát', '2019-11-26 09:59:43'),
(1, 'Khảo sát', '2019-11-26 10:03:09'),
(1, 'Khảo sát', '2019-11-26 10:19:31'),
(1, 'Khảo sát', '2019-11-26 10:20:28'),
(1, 'Khảo sát', '2019-11-26 10:21:37'),
(1, 'Khảo sát', '2019-11-26 10:21:50'),
(1, 'Khảo sát', '2019-11-26 10:22:10'),
(1, 'Khảo sát', '2019-11-26 10:22:45'),
(2, 'Đăng nhập', '2019-11-26 10:36:20'),
(2, 'Khảo sát', '2019-11-26 10:38:07'),
(2, 'Đăng xuất', '2019-11-26 10:38:24'),
(1, 'Đăng nhập', '2019-11-26 10:38:28'),
(1, 'Đăng xuất', '2019-11-26 10:38:40'),
(3, 'Đăng nhập', '2019-11-26 10:38:49'),
(1, 'Đăng nhập', '2019-11-26 17:23:01'),
(2, 'Đăng nhập', '2019-11-26 17:23:17'),
(1, 'Khảo sát', '2019-11-26 17:31:18'),
(1, 'Khảo sát', '2019-11-26 17:36:05'),
(2, 'Khảo sát', '2019-11-26 17:36:24'),
(1, 'Khảo sát', '2019-11-26 17:36:45'),
(1, 'Đăng xuất', '2019-11-26 17:37:31'),
(2, 'Đăng xuất', '2019-11-26 17:37:32'),
(1, 'Đăng nhập', '2019-11-26 17:37:47'),
(2, 'Đăng nhập', '2019-11-26 17:37:52'),
(2, 'Khảo sát', '2019-11-26 17:53:18'),
(1, 'Đăng xuất', '2019-11-26 17:57:31'),
(2, 'Đăng xuất', '2019-11-26 17:57:33'),
(1, 'Đăng nhập', '2019-11-26 17:57:43'),
(1, 'Đăng xuất', '2019-11-26 17:57:50');

-- --------------------------------------------------------

--
-- Table structure for table `traloi`
--

CREATE TABLE IF NOT EXISTS `traloi` (
`idtraloi` int(11) NOT NULL,
  `thongtin` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `idcauhoi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traloi`
--

INSERT INTO `traloi` (`idtraloi`, `thongtin`, `idcauhoi`) VALUES
(1, 'Nhiều', 1),
(2, 'Trung bình', 1),
(3, 'Ít', 1),
(4, 'Trong sạch', 2),
(5, 'Ô nhiễm ít', 2),
(6, 'Ô nhiễm', 2),
(7, 'Rất ô nhiễm', 2),
(8, 'Có nước sạch', 3),
(9, 'Không có nước sạch', 3),
(10, 'Thông thoáng', 4),
(11, 'Tắc nghẽn', 4),
(12, 'Đông đúc', 6),
(13, 'Bình thường', 6),
(14, 'Thưa thớt', 6),
(23, 'Rất nhiều', 1),
(24, 'Nhiều', 7),
(25, 'Ít', 7),
(54, 'Nhiều', 18),
(58, 'Ít', 18),
(66, 'Nhiều', 21),
(67, 'Trung bình', 21),
(68, 'Ít', 21),
(70, 'Số người đã trả lời :', 23),
(71, 'Số người đã trả lời :', 24),
(72, 'Nhiều', 25),
(73, 'Trung bình', 25),
(74, 'Ít', 25),
(75, 'Rất nhiều', 25),
(76, 'Cấp 1', 26),
(77, 'Cấp 2', 26),
(78, 'Cấp 3', 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `user` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 NOT NULL,
  `tuoi` int(11) NOT NULL,
  `sinh` date NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `diachi` varchar(50) CHARACTER SET utf32 NOT NULL,
  `gioitinh` varchar(50) CHARACTER SET utf8 NOT NULL,
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `ten`, `tuoi`, `sinh`, `email`, `diachi`, `gioitinh`, `rank`) VALUES
(1, 'clone1', '12345', 'Nguyễn Văn A', 22, '1999-08-30', 'clone1@gmail.com', 'Hà Nội - Việt Nam', 'Nam', 1),
(2, 'clone2', '12345', 'Nguyễn Thị B', 25, '2001-08-06', 'clone2@gmail.com', 'Hải Phòng - Việt Nam', 'Nữ', 0),
(3, 'clone3', '12345', 'Nguyễn Văn C', 23, '2002-10-19', 'clone3@gmail.com', 'Đà Nẵng- Việt Nam', 'Nam', 0),
(4, 'clone4', '12345', 'Nguyễn Thị B', 19, '1998-02-03', 'clone4@gmail.com', 'Cần Thơ- Việt Nam', 'Nữ', 0),
(7, 'nguyentrunghung', '12345', 'ten', 0, '0000-00-00', 'email', 'diachi', 'gioitinh', 0),
(8, 'dinhhai', '12345', 'ten', 0, '0000-00-00', 'email', 'diachi', 'gioitinh', 0),
(11, 'hainguyen', '123456', 'ten', 0, '0000-00-00', 'email', 'diachi', 'gioitinh', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cauhoi`
--
ALTER TABLE `cauhoi`
 ADD PRIMARY KEY (`idcauhoi`), ADD KEY `idloai` (`idloai`), ADD KEY `idchude` (`idchude`);

--
-- Indexes for table `chude`
--
ALTER TABLE `chude`
 ADD PRIMARY KEY (`idchude`);

--
-- Indexes for table `diadiem`
--
ALTER TABLE `diadiem`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ketqua`
--
ALTER TABLE `ketqua`
 ADD KEY `id` (`id`), ADD KEY `idtraloi` (`idtraloi`);

--
-- Indexes for table `lichsu`
--
ALTER TABLE `lichsu`
 ADD KEY `id` (`id`);

--
-- Indexes for table `traloi`
--
ALTER TABLE `traloi`
 ADD PRIMARY KEY (`idtraloi`), ADD KEY `idloai` (`idcauhoi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cauhoi`
--
ALTER TABLE `cauhoi`
MODIFY `idcauhoi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `chude`
--
ALTER TABLE `chude`
MODIFY `idchude` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `traloi`
--
ALTER TABLE `traloi`
MODIFY `idtraloi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cauhoi`
--
ALTER TABLE `cauhoi`
ADD CONSTRAINT `cauhoi_ibfk_1` FOREIGN KEY (`idchude`) REFERENCES `chude` (`idchude`);

--
-- Constraints for table `ketqua`
--
ALTER TABLE `ketqua`
ADD CONSTRAINT `ketqua_ibfk_3` FOREIGN KEY (`idtraloi`) REFERENCES `traloi` (`idtraloi`),
ADD CONSTRAINT `ketqua_ibfk_4` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lichsu`
--
ALTER TABLE `lichsu`
ADD CONSTRAINT `lichsu_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `traloi`
--
ALTER TABLE `traloi`
ADD CONSTRAINT `traloi_ibfk_1` FOREIGN KEY (`idcauhoi`) REFERENCES `cauhoi` (`idcauhoi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
