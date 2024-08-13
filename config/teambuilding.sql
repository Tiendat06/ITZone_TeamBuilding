-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 08:29 PM
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
  `account_username` varchar(50) NOT NULL,
  `account_password` varchar(50) NOT NULL,
  `person_id` varchar(50) NOT NULL,
  `role_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_username`, `account_password`, `person_id`, `role_id`) VALUES
('ACC0000001', 'mentor01', 'mentor01_ITZone', 'MEN0000001', 'ROL0000001'),
('ACC0000002', 'mentor02', 'mentor02_ITZone', 'MEN0000002', 'ROL0000001'),
('ACC0000003', 'mentor03', 'mentor03_ITZone', 'MEN0000003', 'ROL0000001'),
('ACC0000004', 'mentor04', 'mentor04_ITZone', 'MEN0000004', 'ROL0000001'),
('ACC0000005', 'mentor05', 'mentor05_ITZone', 'MEN0000005', 'ROL0000001'),
('ACC0000006', 'mentor06', 'mentor06_ITZone', 'MEN0000006', 'ROL0000001'),
('ACC0000007', 'guard07', 'guard01_ITZone', 'GUA0000001', 'ROL0000002'),
('ACC0000008', 'guard08', 'guard02_ITZone', 'GUA0000002', 'ROL0000002'),
('ACC0000009', 'guard09', 'guard03_ITZone', 'GUA0000003', 'ROL0000002'),
('ACC0000010', 'guard10', 'guard04_ITZone', 'GUA0000004', 'ROL0000002'),
('ACC0000011', 'guard11', 'guard05_ITZone', 'GUA0000005', 'ROL0000002'),
('ACC0000012', 'guard12', 'guard06_ITZone', 'GUA0000006', 'ROL0000002'),
('ACC0000013', 'support13', 'support01_ITZone', 'SUP0000001', 'ROL0000003'),
('ACC0000014', 'team01', 'team01_ITZone', 'TEA0000001', 'ROL0000004'),
('ACC0000015', 'team02', 'team02_ITZone', 'TEA0000002', 'ROL0000004'),
('ACC0000016', 'team03', 'team03_ITZone', 'TEA0000003', 'ROL0000004'),
('ACC0000017', 'team04', 'team04_ITZone', 'TEA0000004', 'ROL0000004'),
('ACC0000018', 'team05', 'team05_ITZone', 'TEA0000005', 'ROL0000004'),
('ACC0000019', 'team06', 'team06_ITZone', 'TEA0000006', 'ROL0000004');

-- --------------------------------------------------------

--
-- Table structure for table `hint`
--

CREATE TABLE `hint` (
  `hint_id` varchar(50) NOT NULL,
  `hint_description` varchar(500) NOT NULL,
  `hint_end` datetime DEFAULT NULL,
  `is_show` int(1) NOT NULL,
  `hint_priority` int(1) NOT NULL,
  `topic_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hint`
--

INSERT INTO `hint` (`hint_id`, `hint_description`, `hint_end`, `is_show`, `hint_priority`, `topic_id`) VALUES
('HIN0000001', '', NULL, 0, 1, 'TOP0000001'),
('HIN0000002', '', NULL, 0, 2, 'TOP0000001'),
('HIN0000003', '', NULL, 0, 3, 'TOP0000001'),
('HIN0000004', '', NULL, 0, 1, 'TOP0000002'),
('HIN0000005', '', NULL, 0, 2, 'TOP0000002'),
('HIN0000006', '', NULL, 0, 3, 'TOP0000002'),
('HIN0000007', '', NULL, 0, 1, 'TOP0000003'),
('HIN0000008', '', NULL, 0, 2, 'TOP0000003'),
('HIN0000009', '', NULL, 0, 3, 'TOP0000003'),
('HIN0000010', '', NULL, 0, 1, 'TOP0000004'),
('HIN0000011', '', NULL, 0, 2, 'TOP0000004'),
('HIN0000012', '', NULL, 0, 3, 'TOP0000004'),
('HIN0000013', '', NULL, 0, 1, 'TOP0000005'),
('HIN0000014', '', NULL, 0, 2, 'TOP0000005'),
('HIN0000015', '', NULL, 0, 3, 'TOP0000005'),
('HIN0000016', '', NULL, 0, 1, 'TOP0000006'),
('HIN0000017', '', NULL, 0, 2, 'TOP0000006'),
('HIN0000018', '', NULL, 0, 3, 'TOP0000006');

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
  `location_map` varchar(1000) NOT NULL,
  `member_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `location_img`, `location_address`, `bus_go`, `bus_back`, `location_map`, `member_id`) VALUES
('LOC0000001', 'LOTTE MART', 'lotte_mart.png', '469 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh', '*) Bắt chuyến 72 ở trạm xe BUS trước cổng 3 TDTU và tới Lotte Mart', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.9161607287847!2d106.69923367472397!3d10.740944889405657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f9f2353ffb9%3A0x6ab49da47594ce7b!2sLOTTE%20Mart%20Qu%E1%BA%ADn%207!5e0!3m2!1svi!2s!4v1723445379234!5m2!1svi!2s\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'GUA0000001'),
('LOC0000002', 'PHỐ ĐI BỘ', 'pho_di_bo.png', 'Đường Nguyễn Huệ, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh', '*) Đi từ Lotte trên chuyến 72 tới cuối trạm (Bến xe bus Sài Gòn)</br>*) Sau đó lên chuyến 88 chạy tới trạm \"Hồ Tùng Mậu\" hoặc \"Trạm Trung chuyển Hàm Nghi\"</br>*) Cuối cùng, đi bộ qua Phố đi bộ', '*) Tới trạm Trung chuyển Hàm Nghi bắt xe số 31 và về thẳng TDTU', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4866692149244!2d106.7010858247246!3d10.773988789374666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f46fd67ea19%3A0x57881ba4c546af7a!2zUGjDtMyBIMSRaSBiw7TMoyBOZ3V5w6rMg24gSHXDqsyjLCDEkC4gTmd1ecOqzINuIEh1w6rMoywgQuG6v24gTmdow6ksIFF14bqtbiAxLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1723445477253!5m2!1svi!2s\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'GUA0000002'),
('LOC0000003', 'ĐƯỜNG SÁCH', 'duong_sach.png', 'Đ. Nguyễn Văn Bình, Bến Nghé, Quận 1, Hồ Chí Minh', '*) Đi từ Lotte trên chuyến 72 tới trạm \"cầu Ông Lãnh\"</br>*) Sau đó lên chuyến 31 chạy tới trạm \"Lê Duẩn\"</br>*) Cuối cùng, đi bộ qua điểm đến mong muốn', '*) Tới trạm xe trường tiểu học Hòa Bình</br>Địa chỉ: 1 Công xã Paris, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Vietnam</br>*) Đi chuyến 36 -> bến xe bus sài gòn -> xe 72 -> cổng 1 TDTU', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4015780701766!2d106.69710987472472!3d10.78052358936851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fad2860457b%3A0xcf5f1507c8bd0e33!2zxJDGsOG7nW5nIHPDoWNoIFRQLiBI4buTIENow60gTWluaA!5e0!3m2!1svi!2s!4v1723445557661!5m2!1svi!2s\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'GUA0000003'),
('LOC0000004', 'BƯU ĐIỆN', 'buu_dien.png', '125 Hai Bà Trưng, Bến Nghé, Quận 1, Hồ Chí Minh, Việt Nam', '*) Đi từ Lotte trên chuyến 72 tới trạm \"cầu Ông Lãnh\"</br>*) Sau đó lên chuyến 31 chạy tới trạm \"Lê Duẩn\"</br>*) Cuối cùng, đi bộ qua điểm đến mong muốn', '*) Tới trạm xe trường tiểu học Hòa Bình</br>Địa chỉ: 1 Công xã Paris, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Vietnam</br>*) Đi chuyến 36 -> bến xe bus sài gòn -> xe 72 -> cổng 1 TDTU', '', 'GUA0000004'),
('LOC0000005', 'CÔNG VIÊN 30/4', 'cong_vien.png', '6 Đ. Lê Duẩn, Bến Nghé, Quận 1, Hồ Chí Minh, Việt Nam', '*) Đi từ Lotte trên chuyến 72 tới trạm \"cầu Ông Lãnh\"</br>*) Sau đó lên chuyến 31 chạy tới trạm \"Lê Duẩn\"</br>*) Cuối cùng, đi bộ qua điểm đến mong muốn', '*) Tới trạm xe trường tiểu học Hòa Bình</br>Địa chỉ: 1 Công xã Paris, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh, Vietnam</br>*) Đi chuyến 36 -> bến xe bus sài gòn -> xe 72 -> cổng 1 TDTU', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.419964460345!2d106.69478977472471!3d10.779111889369815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f6570c90b25%3A0x788f1a06c37e1848!2zQ8O0bmcgdmnDqm4gMzAvNA!5e0!3m2!1svi!2s!4v1723445589756!5m2!1svi!2s\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'GUA0000005'),
('LOC0000006', 'TDTU', 'tdtu.png', '19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh, Việt Nam', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.0330883073716!2d106.69676687472392!3d10.731931389414159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b2747a81a3%3A0x33c1813055acb613!2zxJDhuqFpIGjhu41jIFTDtG4gxJDhu6ljIFRo4bqvbmc!5e0!3m2!1svi!2s!4v1723445614903!5m2!1svi!2s\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'GUA0000006'),
('LOC0000007', '711', '711.png', '19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh', '', '', '', 'MEN0000001'),
('LOC0000008', 'Căn tin quân sự (Tòa I)', 'toa_i.png', '19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh', '', '', '', 'MEN0000002'),
('LOC0000009', 'Sân bóng đá', 'san_bong_da.png', '19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh', '', '', '', 'MEN0000003'),
('LOC0000010', 'Căn tin tòa D', 'can_tin_D.png', '19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh', '', '', '', 'MEN0000004'),
('LOC0000011', 'Thư viện', 'thu_vien.png', '19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh', '', '', '', 'MEN0000005'),
('LOC0000012', 'Tòa F', 'toa_f.png', '19 Đ. Nguyễn Hữu Thọ, Tân Hưng, Quận 7, Hồ Chí Minh', '', '', '', 'MEN0000006');

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
('GUA0000001', 'AAron', ''),
('GUA0000002', 'Mixin Cajon', ''),
('GUA0000003', 'Carol Well', ''),
('GUA0000004', 'Danny Drinkwater', ''),
('GUA0000005', 'Kyle Walker', ''),
('GUA0000006', 'Macus Rojo', ''),
('SUP0000001', 'Gordon Ramsay', '');

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
('MEN0000001', 'Masino Wax', '0356779197', '77BC2E284C8DFF77'),
('MEN0000002', 'Fabrian Romano', '0356779198', 'A200C8868DB8AA2C'),
('MEN0000003', 'Victor Kowa', '0356779199', 'C59276DBD4EB8701'),
('MEN0000004', 'Nancy Willie', '0356779100', '3DE6FCB65242FA96'),
('MEN0000005', 'Harry John', '0356779101', '9428DB9B9AEECEAB'),
('MEN0000006', 'Jacky Style', '0356779102', '18AE81C81F983260');

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
('ROL0000004', 'team');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` varchar(50) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `team_phone` varchar(50) NOT NULL,
  `team_route` varchar(50) NOT NULL,
  `team_member` varchar(500) NOT NULL,
  `mentor_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`, `team_phone`, `team_route`, `team_member`, `mentor_id`) VALUES
('TEA0000001', 'TEAM 1', '0123456789', '', '', 'MEN0000001'),
('TEA0000002', 'TEAM 2', '0741852963', '', '', 'MEN0000002'),
('TEA0000003', 'TEAM 3', '0741852969', '', '', 'MEN0000003'),
('TEA0000004', 'TEAM 4', '0246798135', '', '', 'MEN0000004'),
('TEA0000005', 'TEAM 5', '0321789654', '', '', 'MEN0000005'),
('TEA0000006', 'TEAM 6', '0213546897', '', '', 'MEN0000006');

-- --------------------------------------------------------

--
-- Table structure for table `team_arrival`
--

CREATE TABLE `team_arrival` (
  `team_arrival_id` varchar(50) NOT NULL,
  `team_id` varchar(50) NOT NULL,
  `location_id` varchar(50) NOT NULL,
  `is_show_next_location` int(1) NOT NULL,
  `team_arrival_priority` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_arrival`
--

INSERT INTO `team_arrival` (`team_arrival_id`, `team_id`, `location_id`, `is_show_next_location`, `team_arrival_priority`) VALUES
('TAV0000001', 'TEA0000001', 'LOC0000007', 1, 1),
('TAV0000002', 'TEA0000001', 'LOC0000001', 0, 2),
('TAV0000003', 'TEA0000001', 'LOC0000002', 0, 3),
('TAV0000004', 'TEA0000001', 'LOC0000003', 0, 4),
('TAV0000005', 'TEA0000001', 'LOC0000005', 0, 5),
('TAV0000006', 'TEA0000001', 'LOC0000006', 0, 6),
('TAV0000007', 'TEA0000002', 'LOC0000008', 1, 1),
('TAV0000008', 'TEA0000002', 'LOC0000001', 0, 2),
('TAV0000009', 'TEA0000002', 'LOC0000005', 0, 3),
('TAV0000010', 'TEA0000002', 'LOC0000003', 0, 4),
('TAV0000011', 'TEA0000002', 'LOC0000002', 0, 5),
('TAV0000012', 'TEA0000002', 'LOC0000006', 0, 6),
('TAV0000013', 'TEA0000003', 'LOC0000009', 1, 1),
('TAV0000014', 'TEA0000003', 'LOC0000001', 0, 2),
('TAV0000015', 'TEA0000003', 'LOC0000003', 0, 3),
('TAV0000016', 'TEA0000003', 'LOC0000005', 0, 4),
('TAV0000017', 'TEA0000003', 'LOC0000002', 0, 5),
('TAV0000018', 'TEA0000003', 'LOC0000006', 0, 6),
('TAV0000019', 'TEA0000004', 'LOC0000010', 1, 1),
('TAV0000020', 'TEA0000004', 'LOC0000001', 0, 2),
('TAV0000021', 'TEA0000004', 'LOC0000002', 0, 3),
('TAV0000022', 'TEA0000004', 'LOC0000005', 0, 4),
('TAV0000023', 'TEA0000004', 'LOC0000003', 0, 5),
('TAV0000024', 'TEA0000004', 'LOC0000006', 0, 6),
('TAV0000025', 'TEA0000005', 'LOC0000011', 1, 1),
('TAV0000026', 'TEA0000005', 'LOC0000001', 0, 2),
('TAV0000027', 'TEA0000005', 'LOC0000003', 0, 3),
('TAV0000028', 'TEA0000005', 'LOC0000002', 0, 4),
('TAV0000029', 'TEA0000005', 'LOC0000005', 0, 5),
('TAV0000030', 'TEA0000005', 'LOC0000006', 0, 6),
('TAV0000031', 'TEA0000006', 'LOC0000012', 1, 1),
('TAV0000032', 'TEA0000006', 'LOC0000001', 0, 2),
('TAV0000033', 'TEA0000006', 'LOC0000005', 0, 3),
('TAV0000034', 'TEA0000006', 'LOC0000002', 0, 4),
('TAV0000035', 'TEA0000006', 'LOC0000003', 0, 5),
('TAV0000036', 'TEA0000006', 'LOC0000006', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `team_member_id` varchar(50) NOT NULL,
  `team_member_name` varchar(500) NOT NULL,
  `team_member_gender` varchar(10) NOT NULL,
  `team_member_phone` varchar(50) NOT NULL,
  `is_team_leader` int(1) DEFAULT NULL,
  `team_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`team_member_id`, `team_member_name`, `team_member_gender`, `team_member_phone`, `is_team_leader`, `team_id`) VALUES
('TMB0000001', 'Jake Johnson', 'Male', '0123456789', 1, 'TEA0000001'),
('TMB0000002', 'Marry Samson', 'Female', '0963852741', 0, 'TEA0000001'),
('TMB0000003', 'Bob Lexi', 'Male', '0741852963', 1, 'TEA0000002'),
('TMB0000004', 'Courtney Kane', 'Female', '0852963741', 0, 'TEA0000002'),
('TMB0000005', 'Max Curl', 'Male', '0741852969', 1, 'TEA0000003'),
('TMB0000006', 'Willie Manny', 'Male', '0147369258', 0, 'TEA0000003'),
('TMB0000007', 'Whitney Colwill', 'Female', '0246798135', 1, 'TEA0000004'),
('TMB0000008', 'Harley Cole', 'Male', '0258794613', 0, 'TEA0000004'),
('TMB0000009', 'Shaun Hawking', 'Male', '0321789654', 1, 'TEA0000005'),
('TMB0000010', 'Christina Tosi', 'Female', '0963147582', 0, 'TEA0000005'),
('TMB0000011', 'Bobby Johnson', 'Male', '0213546897', 1, 'TEA0000006'),
('TMB0000012', 'Joe Bastisha', 'Male', '0913746825', 0, 'TEA0000006');

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
('TPZ0000004', 'TEA0000001', 'TOP0000005', NULL, NULL, 0),
('TPZ0000005', 'TEA0000001', 'TOP0000007', NULL, NULL, 0),
('TPZ0000006', 'TEA0000002', 'TOP0000001', NULL, NULL, 0),
('TPZ0000007', 'TEA0000002', 'TOP0000002', NULL, NULL, 0),
('TPZ0000008', 'TEA0000002', 'TOP0000003', NULL, NULL, 0),
('TPZ0000009', 'TEA0000002', 'TOP0000005', NULL, NULL, 0),
('TPZ0000010', 'TEA0000002', 'TOP0000008', NULL, NULL, 0),
('TPZ0000011', 'TEA0000003', 'TOP0000001', NULL, NULL, 0),
('TPZ0000012', 'TEA0000003', 'TOP0000002', NULL, NULL, 0),
('TPZ0000013', 'TEA0000003', 'TOP0000003', NULL, NULL, 0),
('TPZ0000014', 'TEA0000003', 'TOP0000005', NULL, NULL, 0),
('TPZ0000015', 'TEA0000003', 'TOP0000009', NULL, NULL, 0),
('TPZ0000016', 'TEA0000004', 'TOP0000001', NULL, NULL, 0),
('TPZ0000017', 'TEA0000004', 'TOP0000002', NULL, NULL, 0),
('TPZ0000018', 'TEA0000004', 'TOP0000003', NULL, NULL, 0),
('TPZ0000019', 'TEA0000004', 'TOP0000005', NULL, NULL, 0),
('TPZ0000020', 'TEA0000004', 'TOP0000010', NULL, NULL, 0),
('TPZ0000021', 'TEA0000005', 'TOP0000001', NULL, NULL, 0),
('TPZ0000022', 'TEA0000005', 'TOP0000002', NULL, NULL, 0),
('TPZ0000023', 'TEA0000005', 'TOP0000003', NULL, NULL, 0),
('TPZ0000024', 'TEA0000005', 'TOP0000005', NULL, NULL, 0),
('TPZ0000025', 'TEA0000005', 'TOP0000011', NULL, NULL, 0),
('TPZ0000026', 'TEA0000006', 'TOP0000001', NULL, NULL, 0),
('TPZ0000027', 'TEA0000006', 'TOP0000002', NULL, NULL, 0),
('TPZ0000028', 'TEA0000006', 'TOP0000003', NULL, NULL, 0),
('TPZ0000029', 'TEA0000006', 'TOP0000005', NULL, NULL, 0),
('TPZ0000030', 'TEA0000006', 'TOP0000012', NULL, NULL, 0);

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
('TOP0000006', '', '', 'topic_6.png', 'LOC0000006'),
('TOP0000007', '', '', 'topic_7.png', 'LOC0000007'),
('TOP0000008', '', '', 'topic_8.png', 'LOC0000008'),
('TOP0000009', '', '', 'topic_9.png', 'LOC0000009'),
('TOP0000010', '', '', 'topic_10.png', 'LOC0000010'),
('TOP0000011', '', '', 'topic_11.png', 'LOC0000011'),
('TOP0000012', '', '', 'topic_12.png', 'LOC0000012');

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
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`team_member_id`);

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
