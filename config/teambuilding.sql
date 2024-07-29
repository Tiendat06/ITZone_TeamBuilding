-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2024 at 11:06 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teambuilding`
--
CREATE DATABASE IF NOT EXISTS `teambuilding` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `teambuilding`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` varchar(50) NOT NULL,
  `account_password` varchar(50) NOT NULL,
  `person_id` varchar(50) NOT NULL,
  `role_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_password`, `person_id`, `role_id`) VALUES
('ACC0000001', 'mentor01_ITZone', 'MEN0000001', 'ROL0000001'),
('ACC0000002', 'mentor02_ITZone', 'MEN0000002', 'ROL0000001'),
('ACC0000003', 'mentor03_ITZone', 'MEN0000003', 'ROL0000001'),
('ACC0000004', 'mentor04_ITZone', 'MEN0000004', 'ROL0000001'),
('ACC0000005', 'mentor05_ITZone', 'MEN0000005', 'ROL0000001'),
('ACC0000006', 'mentor06_ITZone', 'MEN0000006', 'ROL0000001'),
('ACC0000007', 'guard01_ITZone', 'GUA0000001', 'ROL0000002'),
('ACC0000008', 'guard02_ITZone', 'GUA0000002', 'ROL0000002'),
('ACC0000009', 'guard03_ITZone', 'GUA0000003', 'ROL0000002'),
('ACC0000010', 'guard04_ITZone', 'GUA0000004', 'ROL0000002'),
('ACC0000011', 'guard05_ITZone', 'GUA0000005', 'ROL0000002'),
('ACC0000012', 'guard06_ITZone', 'GUA0000006', 'ROL0000002'),
('ACC0000013', 'support01_ITZone', 'SUP0000001', 'ROL0000003'),
('ACC0000014', 'team01_ITZone', 'TEA0000001', 'ROL0000004'),
('ACC0000015', 'team02_ITZone', 'TEA0000002', 'ROL0000004'),
('ACC0000016', 'team03_ITZone', 'TEA0000003', 'ROL0000004'),
('ACC0000017', 'team04_ITZone', 'TEA0000004', 'ROL0000004'),
('ACC0000018', 'team05_ITZone', 'TEA0000005', 'ROL0000004'),
('ACC0000019', 'team06_ITZone', 'TEA0000006', 'ROL0000004');

-- --------------------------------------------------------

--
-- Table structure for table `hint`
--

CREATE TABLE `hint` (
  `hint_id` varchar(50) NOT NULL,
  `hint_description` varchar(500) NOT NULL,
  `is_show` int(1) NOT NULL,
  `topic_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hint`
--

INSERT INTO `hint` (`hint_id`, `hint_description`, `is_show`, `topic_id`) VALUES
('HIN0000001', '', 0, 'TOP0000001'),
('HIN0000002', '', 0, 'TOP0000001'),
('HIN0000003', '', 0, 'TOP0000001'),
('HIN0000004', '', 0, 'TOP0000002'),
('HIN0000005', '', 0, 'TOP0000002'),
('HIN0000006', '', 0, 'TOP0000002'),
('HIN0000007', '', 0, 'TOP0000003'),
('HIN0000008', '', 0, 'TOP0000003'),
('HIN0000009', '', 0, 'TOP0000003'),
('HIN0000010', '', 0, 'TOP0000004'),
('HIN0000011', '', 0, 'TOP0000004'),
('HIN0000012', '', 0, 'TOP0000004'),
('HIN0000013', '', 0, 'TOP0000005'),
('HIN0000014', '', 0, 'TOP0000005'),
('HIN0000015', '', 0, 'TOP0000005'),
('HIN0000016', '', 0, 'TOP0000006'),
('HIN0000017', '', 0, 'TOP0000006'),
('HIN0000018', '', 0, 'TOP0000006');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` varchar(50) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `location_img` varchar(50) NOT NULL,
  `location_address` varchar(500) NOT NULL,
  `bus_go` varchar(500) NOT NULL,
  `bus_back` varchar(500) NOT NULL,
  `member_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `location_img`, `location_address`, `bus_go`, `bus_back`, `member_id`) VALUES
('LOC0000001', 'LOTTE MART', 'lotte_mart.png', '469 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh', '*) Bắt chuyến 72 ở trạm xe BUS trước cổng 3 TDTU và tới Lotte Mart', '', 'GUA0000001'),
('LOC0000002', 'PHỐ ĐI BỘ', 'pho_di_bo.png', 'Đường Nguyễn Huệ, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh', '*) Đi từ Lotte trên chuyến 72 tới cuối trạm (Bến xe bus Sài Gòn)</br>*) Sau đó lên chuyến 88 chạy tới trạm \"Hồ Tùng Mậu\" hoặc \"Trạm Trung chuyển Hàm Nghi\"</br>*) Cuối cùng, đi bộ qua Phố đi bộ', '*) Tới trạm Trung chuyển Hàm Nghi bắt xe số 31 và về thẳng TDTU', 'GUA0000002'),
('LOC0000003', 'ĐƯỜNG SÁCH', 'duong_sach.png', 'Đ. Nguyễn Văn Bình, Bến Nghé, Quận 1, Hồ Chí Minh', '*) Đi từ Lotte trên chuyến 72 tới trạm \"cầu Ông Lãnh\"</br>*) Sau đó lên chuyến 31 chạy tới trạm \"Lê Duẩn\"</br>*) Cuối cùng, đi bộ qua điểm đến mong muốn', '*) Tới trạm xe trường tiểu học Hòa Bình</br>Địa chỉ: 1 Công xã Paris, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Vietnam</br>*) Đi chuyến 36 -> bến xe bus sài gòn -> xe 72 -> cổng 1 TDTU', 'GUA0000003'),
('LOC0000004', 'BƯU ĐIỆN', 'buu_dien.png', '125 Hai Bà Trưng, Bến Nghé, Quận 1, Hồ Chí Minh, Việt Nam', '*) Đi từ Lotte trên chuyến 72 tới trạm \"cầu Ông Lãnh\"</br>*) Sau đó lên chuyến 31 chạy tới trạm \"Lê Duẩn\"</br>*) Cuối cùng, đi bộ qua điểm đến mong muốn', '*) Tới trạm xe trường tiểu học Hòa Bình</br>Địa chỉ: 1 Công xã Paris, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Vietnam</br>*) Đi chuyến 36 -> bến xe bus sài gòn -> xe 72 -> cổng 1 TDTU', 'GUA0000004'),
('LOC0000005', 'CÔNG VIÊN 30/4', 'cong_vien.png', '6 Đ. Lê Duẩn, Bến Nghé, Quận 1, Hồ Chí Minh, Việt Nam', '*) Đi từ Lotte trên chuyến 72 tới trạm \"cầu Ông Lãnh\"</br>*) Sau đó lên chuyến 31 chạy tới trạm \"Lê Duẩn\"</br>*) Cuối cùng, đi bộ qua điểm đến mong muốn', '*) Tới trạm xe trường tiểu học Hòa Bình</br>Địa chỉ: 1 Công xã Paris, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Vietnam</br>*) Đi chuyến 36 -> bến xe bus sài gòn -> xe 72 -> cổng 1 TDTU', 'GUA0000005'),
('LOC0000006', 'TDTU', 'tdtu.png', '19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh, Việt Nam', '', '', 'GUA0000006');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` varchar(50) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `member_name`, `member_phone`) VALUES
('GUA0000001', '', ''),
('GUA0000002', '', ''),
('GUA0000003', '', ''),
('GUA0000004', '', ''),
('GUA0000005', '', ''),
('GUA0000006', '', ''),
('SUP0000001', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `mentor_id` varchar(50) NOT NULL,
  `mentor_name` varchar(50) NOT NULL,
  `mentor_phone` varchar(50) NOT NULL,
  `mentor_key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`mentor_id`, `mentor_name`, `mentor_phone`, `mentor_key`) VALUES
('MEN0000001', '', '', '77BC2E284C8DFF77'),
('MEN0000002', '', '', 'A200C8868DB8AA2C'),
('MEN0000003', '', '', 'C59276DBD4EB8701'),
('MEN0000004', '', '', '3DE6FCB65242FA96'),
('MEN0000005', '', '', '9428DB9B9AEECEAB'),
('MEN0000006', '', '', '18AE81C81F983260');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` varchar(50) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
('ROL0000001', 'mentor'),
('ROL0000002', 'guard'),
('ROL0000003', 'support'),
('ROL0000004', 'gen8');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` varchar(50) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `team_phone` varchar(50) NOT NULL,
  `team_route` varchar(50) NOT NULL,
  `mentor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `team_phone`, `team_route`, `mentor_id`) VALUES
('TEA0000001', 'TEAM 1', '', '6, 1, 2, 4, 3, 5, 6', 'MEN0000001'),
('TEA0000002', 'TEAM 2', '', '6, 1, 5, 3, 4, 2, 6', 'MEN0000002'),
('TEA0000003', 'TEAM 3', '', '6, 1, 4, 5, 3, 2, 6', 'MEN0000003'),
('TEA0000004', 'TEAM 4', '', '6, 1, 2, 5, 4, 3, 6', 'MEN0000004'),
('TEA0000005', 'TEAM 5', '', '6, 1, 3, 4, 5, 2, 6', 'MEN0000005'),
('TEA0000006', 'TEAM 6', '', '6, 1, 2, 3, 5, 4, 6', 'MEN0000006');

-- --------------------------------------------------------

--
-- Table structure for table `team_arrival`
--

CREATE TABLE `team_arrival` (
  `team_arrival_id` varchar(50) NOT NULL,
  `team_id` varchar(50) NOT NULL,
  `location_id` varchar(50) NOT NULL,
  `is_show_next_location` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_arrival`
--

INSERT INTO `team_arrival` (`team_arrival_id`, `team_id`, `location_id`, `is_show_next_location`) VALUES
('TAV0000001', 'TEA0000001', 'LOC0000006', 1),
('TAV0000002', 'TEA0000001', 'LOC0000001', 0),
('TAV0000003', 'TEA0000001', 'LOC0000002', 0),
('TAV0000004', 'TEA0000001', 'LOC0000004', 0),
('TAV0000005', 'TEA0000001', 'LOC0000003', 0),
('TAV0000006', 'TEA0000001', 'LOC0000005', 0),
('TAV0000007', 'TEA0000002', 'LOC0000006', 1),
('TAV0000008', 'TEA0000002', 'LOC0000001', 0),
('TAV0000009', 'TEA0000002', 'LOC0000005', 0),
('TAV0000010', 'TEA0000002', 'LOC0000003', 0),
('TAV0000011', 'TEA0000002', 'LOC0000004', 0),
('TAV0000012', 'TEA0000002', 'LOC0000002', 0),
('TAV0000013', 'TEA0000003', 'LOC0000006', 1),
('TAV0000014', 'TEA0000003', 'LOC0000001', 0),
('TAV0000015', 'TEA0000003', 'LOC0000004', 0),
('TAV0000016', 'TEA0000003', 'LOC0000005', 0),
('TAV0000017', 'TEA0000003', 'LOC0000003', 0),
('TAV0000018', 'TEA0000003', 'LOC0000002', 0),
('TAV0000019', 'TEA0000004', 'LOC0000006', 1),
('TAV0000020', 'TEA0000004', 'LOC0000001', 0),
('TAV0000021', 'TEA0000004', 'LOC0000002', 0),
('TAV0000022', 'TEA0000004', 'LOC0000005', 0),
('TAV0000023', 'TEA0000004', 'LOC0000004', 0),
('TAV0000024', 'TEA0000004', 'LOC0000003', 0),
('TAV0000025', 'TEA0000005', 'LOC0000006', 1),
('TAV0000026', 'TEA0000005', 'LOC0000001', 0),
('TAV0000027', 'TEA0000005', 'LOC0000003', 0),
('TAV0000028', 'TEA0000005', 'LOC0000004', 0),
('TAV0000029', 'TEA0000005', 'LOC0000005', 0),
('TAV0000030', 'TEA0000005', 'LOC0000002', 0),
('TAV0000031', 'TEA0000006', 'LOC0000006', 1),
('TAV0000032', 'TEA0000006', 'LOC0000001', 0),
('TAV0000033', 'TEA0000006', 'LOC0000002', 0),
('TAV0000034', 'TEA0000006', 'LOC0000003', 0),
('TAV0000035', 'TEA0000006', 'LOC0000005', 0),
('TAV0000036', 'TEA0000006', 'LOC0000004', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_puzzle`
--

CREATE TABLE `team_puzzle` (
  `team_puzzle_id` varchar(50) NOT NULL,
  `team_id` varchar(50) NOT NULL,
  `topic_id` varchar(50) NOT NULL,
  `time_end` datetime DEFAULT NULL,
  `time_fine` datetime DEFAULT NULL,
  `is_clicked` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_puzzle`
--

INSERT INTO `team_puzzle` (`team_puzzle_id`, `team_id`, `topic_id`, `time_end`, `time_fine`, `is_clicked`) VALUES
('TPZ0000001', 'TEA0000001', 'TOP0000001', NULL, NULL, 0),
('TPZ0000002', 'TEA0000001', 'TOP0000002', NULL, NULL, 0),
('TPZ0000003', 'TEA0000001', 'TOP0000003', NULL, NULL, 0),
('TPZ0000004', 'TEA0000001', 'TOP0000004', NULL, NULL, 0),
('TPZ0000005', 'TEA0000001', 'TOP0000005', NULL, NULL, 0),
('TPZ0000006', 'TEA0000001', 'TOP0000006', NULL, NULL, 0),
('TPZ0000007', 'TEA0000002', 'TOP0000001', NULL, NULL, 0),
('TPZ0000008', 'TEA0000002', 'TOP0000002', NULL, NULL, 0),
('TPZ0000009', 'TEA0000002', 'TOP0000003', NULL, NULL, 0),
('TPZ0000010', 'TEA0000002', 'TOP0000004', NULL, NULL, 0),
('TPZ0000011', 'TEA0000002', 'TOP0000005', NULL, NULL, 0),
('TPZ0000012', 'TEA0000002', 'TOP0000006', NULL, NULL, 0),
('TPZ0000013', 'TEA0000003', 'TOP0000001', NULL, NULL, 0),
('TPZ0000014', 'TEA0000003', 'TOP0000002', NULL, NULL, 0),
('TPZ0000015', 'TEA0000003', 'TOP0000003', NULL, NULL, 0),
('TPZ0000016', 'TEA0000003', 'TOP0000004', NULL, NULL, 0),
('TPZ0000017', 'TEA0000003', 'TOP0000005', NULL, NULL, 0),
('TPZ0000018', 'TEA0000003', 'TOP0000006', NULL, NULL, 0),
('TPZ0000019', 'TEA0000004', 'TOP0000001', NULL, NULL, 0),
('TPZ0000020', 'TEA0000004', 'TOP0000002', NULL, NULL, 0),
('TPZ0000021', 'TEA0000004', 'TOP0000003', NULL, NULL, 0),
('TPZ0000022', 'TEA0000004', 'TOP0000004', NULL, NULL, 0),
('TPZ0000023', 'TEA0000004', 'TOP0000005', NULL, NULL, 0),
('TPZ0000024', 'TEA0000004', 'TOP0000006', NULL, NULL, 0),
('TPZ0000025', 'TEA0000005', 'TOP0000001', NULL, NULL, 0),
('TPZ0000026', 'TEA0000005', 'TOP0000002', NULL, NULL, 0),
('TPZ0000027', 'TEA0000005', 'TOP0000003', NULL, NULL, 0),
('TPZ0000028', 'TEA0000005', 'TOP0000004', NULL, NULL, 0),
('TPZ0000029', 'TEA0000005', 'TOP0000005', NULL, NULL, 0),
('TPZ0000030', 'TEA0000005', 'TOP0000006', NULL, NULL, 0),
('TPZ0000031', 'TEA0000006', 'TOP0000001', NULL, NULL, 0),
('TPZ0000032', 'TEA0000006', 'TOP0000002', NULL, NULL, 0),
('TPZ0000033', 'TEA0000006', 'TOP0000003', NULL, NULL, 0),
('TPZ0000034', 'TEA0000006', 'TOP0000004', NULL, NULL, 0),
('TPZ0000035', 'TEA0000006', 'TOP0000005', NULL, NULL, 0),
('TPZ0000036', 'TEA0000006', 'TOP0000006', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` varchar(50) NOT NULL,
  `topic_link` varchar(500) NOT NULL,
  `topic_answer` varchar(50) NOT NULL,
  `topic_img` varchar(50) NOT NULL,
  `location_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_link`, `topic_answer`, `topic_img`, `location_id`) VALUES
('TOP0000001', '', '', 'topic_1.png', 'LOC0000001'),
('TOP0000002', '', 'PHODIBO', 'topic_2.png', 'LOC0000002'),
('TOP0000003', '', 'DUONGSACH', 'topic_3.png', 'LOC0000003'),
('TOP0000004', '', 'BUUDIEN', 'topic_4.png', 'LOC0000004'),
('TOP0000005', '', 'CONGVIEN30/4', 'topic_5.png', 'LOC0000005'),
('TOP0000006', '', '', 'topic_6.png', 'LOC0000006');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `hint`
--
ALTER TABLE `hint`
  ADD PRIMARY KEY (`hint_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`mentor_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `team_arrival`
--
ALTER TABLE `team_arrival`
  ADD PRIMARY KEY (`team_arrival_id`,`team_id`,`location_id`);

--
-- Indexes for table `team_puzzle`
--
ALTER TABLE `team_puzzle`
  ADD PRIMARY KEY (`team_puzzle_id`,`team_id`,`topic_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
