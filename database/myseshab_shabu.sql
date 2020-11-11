-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 11 พ.ย. 2020 เมื่อ 10:04 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 5.6.49
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myseshab_shabu`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `bill`
--

CREATE TABLE `bill` (
  `b_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `b_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `b_amount_people` int(11) DEFAULT NULL,
  `b_price` int(11) NOT NULL,
  `b_table` int(11) NOT NULL,
  `b_status` enum('ดำเนินการ','เรียกชำระเงิน','เก็บเงินแล้ว') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ดำเนินการ',
  `b_qa` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `bill`
--

INSERT INTO `bill` (`b_id`, `b_date`, `b_amount_people`, `b_price`, `b_table`, `b_status`, `b_qa`) VALUES
('1603571480027305900', '2020-10-24 20:31:20', 5, 199, 10, 'เก็บเงินแล้ว', 'no'),
('1603572245099422700', '2020-10-24 20:44:05', 1, 199, 11, 'เก็บเงินแล้ว', 'no'),
('1603644826038870200', '2020-10-25 16:53:46', 2, 199, 11, 'ดำเนินการ', 'no'),
('1603676775072807100', '2020-10-26 01:46:15', 3, 199, 7, 'ดำเนินการ', 'no'),
('1603680807047020300', '2020-10-26 02:53:27', 3, 199, 1, 'ดำเนินการ', 'no'),
('1604828917053673000', '2020-11-08 09:48:37', 3, 199, 12, 'เรียกชำระเงิน', 'no'),
('1604829127045206300', '2020-11-08 09:52:07', 3, 199, 9, 'ดำเนินการ', 'no');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `c_icons` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_status` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `category`
--

INSERT INTO `category` (`c_id`, `c_name`, `c_icons`, `c_status`) VALUES
(1, 'เนื้อหมู', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1604622408695.png?alt=media&token=cde3429f-1235-4882-b0e6-b09bd357e0a5', 'yes'),
(2, 'เนื้อวัว', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603717888958.png?alt=media&token=7b254290-976e-4f02-b882-67556bbcced9', 'yes'),
(3, 'เครื่องดื่ม', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603749063873.png?alt=media&token=80767fe2-cbae-4e2f-80ce-678b55a51251', 'yes'),
(4, 'ของทานเล่น', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603736925853.png?alt=media&token=06168b37-7ff7-44e7-9361-90868ac132c5', 'yes'),
(5, 'เนื้อไก่', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603727361815.png?alt=media&token=33485a4b-75ce-4446-9126-0670fd5a4202', 'yes'),
(6, 'อาหารทะเล', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603768367356.png?alt=media&token=b73c3c8d-d5d0-4423-96b6-bcf538a25d88', 'yes'),
(7, 'เส้น', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603826705365.png?alt=media&token=8cce382f-8494-4cfc-9596-a06cd14d284d', 'yes'),
(8, 'ผัก', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603859902209.png?alt=media&token=266b6d45-9eee-416a-ab87-4b8a5576b917', 'yes');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `check_order`
--

CREATE TABLE `check_order` (
  `co_table_id` int(11) NOT NULL,
  `co_f_id` int(11) NOT NULL,
  `co_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `check_order`
--

INSERT INTO `check_order` (`co_table_id`, `co_f_id`, `co_amount`) VALUES
(1, 19, 6),
(1, 8, 2),
(7, 26, 1),
(7, 8, 3);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `food`
--

CREATE TABLE `food` (
  `f_id` int(11) NOT NULL,
  `f_cat` int(11) NOT NULL,
  `f_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `f_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_status` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `food`
--

INSERT INTO `food` (`f_id`, `f_cat`, `f_name`, `f_img`, `f_status`) VALUES
(1, 1, 'สามชั้น', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1604045449131.png?alt=media&token=ebf90055-3a8c-46d5-8bc2-bf9243c206c2', 'yes'),
(2, 1, 'สันนอก', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603768604676.jpg?alt=media&token=9fe22185-d807-47d4-8575-44990aefd35d', 'yes'),
(3, 3, 'น้ำเปล่า', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603720958612.jpg?alt=media&token=30a15216-4452-4b28-b299-5914ead30658', 'yes'),
(4, 3, 'น้ำแดง', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603703018442.jpg?alt=media&token=cb8d809d-8e81-403e-8d3c-b04484b51df0', 'yes'),
(5, 3, 'ลิ้นจี่โซดา', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603752564508.jpg?alt=media&token=9d310500-3121-4749-a445-2a3482c0d611', 'yes'),
(8, 4, 'เฟรนฟราย', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603745623068.jpg?alt=media&token=728dff55-e757-4963-99ab-c906da746c53', 'yes'),
(9, 4, 'ปอเปี๊ยะทอด', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603713762098.jpg?alt=media&token=914ba234-4e31-4bbe-9a48-72b9648439f3', 'yes'),
(10, 4, 'นักเก็ต', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603724194358.jpg?alt=media&token=0a926f2f-f5e0-44ea-b732-16b4a86f4302', 'yes'),
(11, 5, 'ปีกไก่', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603742473789.jpg?alt=media&token=d22eb07f-0e71-444b-89be-0b8050a1e7f3', 'yes'),
(12, 5, 'น่องไก่', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603754780394.jpg?alt=media&token=0a50583e-065f-4849-adec-38af34932d91', 'yes'),
(13, 5, 'อกไก่', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603726979260.jfif?alt=media&token=8baa4622-7430-4896-abe4-eb92fcf2cb06', 'yes'),
(14, 6, 'กุ้ง', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603719652448.jpg?alt=media&token=9381613a-9fc5-4d81-8f67-a9204d4bc5dc', 'yes'),
(15, 6, 'ปลาหมึก', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603740551578.webp?alt=media&token=fab0f499-0fa4-4c41-9d6e-21cb920a7aae', 'yes'),
(16, 6, 'หอย', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603711971509.jpg?alt=media&token=76313973-b9e0-426f-8cf6-6befafcec068', 'yes'),
(17, 7, 'หมี่หยก', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603721565577.jpg?alt=media&token=ddb561f3-a405-4f1b-9025-52d9011b4660', 'yes'),
(18, 7, 'วุ้นเส้น', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603716696135.jpg?alt=media&token=3dabc2a5-5261-42d8-93e0-7219dc257171', 'yes'),
(19, 8, 'ผักกาดขาว', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603698988872.jpg?alt=media&token=f789b9f6-feb6-4fd6-b7aa-7eef34d684ba', 'yes'),
(20, 2, 'ริปอาย', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603690230955.jfif?alt=media&token=05e011e6-f7e7-4c92-be69-4c5c2149ec4b', 'yes'),
(21, 8, 'กะหล่ำซอย', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603936933536.jpg?alt=media&token=f8eac1ff-808c-45d7-a2e4-f29f599195ba', 'yes'),
(26, 1, 'สันคอ', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603894163432.jfif?alt=media&token=a11d07de-19ea-455e-bd00-808096dab80f', 'yes'),
(27, 1, 'หมูหมัก', 'https://firebasestorage.googleapis.com/v0/b/se-shabu60.appspot.com/o/filepond%2Fimg-1603752079957.jpg?alt=media&token=720f7fbc-c424-4b36-a5e8-a67466bdd71d', 'yes');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `order_detail`
--

CREATE TABLE `order_detail` (
  `od_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `od_f_id` int(11) NOT NULL DEFAULT '0',
  `od_amount` int(11) DEFAULT NULL,
  `od_status` enum('กำลังเตรียม','เสร็จสิ้น') COLLATE utf8_unicode_ci DEFAULT 'กำลังเตรียม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `order_detail`
--

INSERT INTO `order_detail` (`od_id`, `od_f_id`, `od_amount`, `od_status`) VALUES
('1603680997095873600', 1, 17, 'เสร็จสิ้น'),
('1603680997095873600', 2, 8, 'เสร็จสิ้น'),
('1603680997095873600', 3, 1, 'เสร็จสิ้น'),
('1603680997095873600', 8, 2, 'เสร็จสิ้น'),
('1603680997095873600', 16, 5, 'เสร็จสิ้น'),
('1603680997095873600', 17, 2, 'เสร็จสิ้น'),
('1603680997095873600', 19, 1, 'เสร็จสิ้น'),
('1603680997095873600', 20, 2, 'เสร็จสิ้น'),
('1603680997095873600', 21, 1, 'เสร็จสิ้น'),
('1603680997095873600', 26, 10, 'เสร็จสิ้น');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `order_list`
--

CREATE TABLE `order_list` (
  `o_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `o_table` int(11) NOT NULL,
  `o_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `o_status` enum('preparing','finished') COLLATE utf8_unicode_ci DEFAULT 'preparing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `order_list`
--

INSERT INTO `order_list` (`o_id`, `o_table`, `o_time`, `o_status`) VALUES
('1603680997095873600', 1, '2020-10-26 02:56:37', 'finished');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `personnel`
--

CREATE TABLE `personnel` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_position` enum('EMPLOYEE','MANAGER') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'EMPLOYEE',
  `p_username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `p_pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_picture` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `personnel`
--

INSERT INTO `personnel` (`p_id`, `p_name`, `p_position`, `p_username`, `p_pass`, `p_picture`) VALUES
(1, 'Mike Namchaisuk', 'MANAGER', 'mike', '952a7c238933b79813ee1e70179d52635c0b6c7c', 'avatar-1.png'),
(2, 'Suchaya Kunjeathong', 'EMPLOYEE', 'pum', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'avatar-1.png'),
(3, 'Atitaya Sripom', 'EMPLOYEE', 'koi', 'a9522e54c81a2b6058365dac919d1fa18dd54d9d', 'avatar-1.png'),
(4, 'Supicha Netsuwan', 'MANAGER', 'stamp', '64cf7628c090276505e7fa60f11233f50dba6675', 'avatar-1.png'),
(5, 'Password Reset', 'EMPLOYEE', 'reset', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1', 'avatar-1.png');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `questionnaire`
--

CREATE TABLE `questionnaire` (
  `q_number` int(11) NOT NULL,
  `q_gender` varchar(10) NOT NULL,
  `q_age` varchar(10) NOT NULL,
  `q_never` varchar(10) NOT NULL,
  `q_f1` int(11) NOT NULL,
  `q_f2` int(11) NOT NULL,
  `q_f3` int(11) NOT NULL,
  `q_f4` int(11) NOT NULL,
  `q_f5` int(11) NOT NULL,
  `q_ser1` int(11) NOT NULL,
  `q_ser2` int(11) NOT NULL,
  `q_ser3` int(11) NOT NULL,
  `q_se1` int(11) NOT NULL,
  `q_se2` int(11) NOT NULL,
  `q_se3` int(11) NOT NULL,
  `q_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `tableland`
--

CREATE TABLE `tableland` (
  `t_id` int(11) NOT NULL,
  `t_number` int(11) NOT NULL,
  `t_status` enum('ready','unready') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ready'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- dump ตาราง `tableland`
--

INSERT INTO `tableland` (`t_id`, `t_number`, `t_status`) VALUES
(1, 1, 'unready'),
(2, 2, 'ready'),
(3, 3, 'ready'),
(4, 4, 'ready'),
(5, 5, 'ready'),
(6, 6, 'ready'),
(7, 7, 'ready'),
(8, 8, 'ready'),
(9, 9, 'unready'),
(10, 10, 'ready'),
(11, 11, 'ready'),
(12, 12, 'unready');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `b_table` (`b_table`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `check_order`
--
ALTER TABLE `check_order`
  ADD KEY `co1` (`co_table_id`),
  ADD KEY `co2` (`co_f_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `f_cat` (`f_cat`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`od_id`,`od_f_id`),
  ADD KEY `od_f_id` (`od_f_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `o_table` (`o_table`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`q_number`);

--
-- Indexes for table `tableland`
--
ALTER TABLE `tableland`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `q_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tableland`
--
ALTER TABLE `tableland`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`b_table`) REFERENCES `tableland` (`t_id`);

--
-- Constraints for table `check_order`
--
ALTER TABLE `check_order`
  ADD CONSTRAINT `co1` FOREIGN KEY (`co_table_id`) REFERENCES `tableland` (`t_id`),
  ADD CONSTRAINT `co2` FOREIGN KEY (`co_f_id`) REFERENCES `food` (`f_id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`f_cat`) REFERENCES `category` (`c_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `detail` FOREIGN KEY (`od_id`) REFERENCES `order_list` (`o_id`);

--
-- Constraints for table `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_2` FOREIGN KEY (`o_table`) REFERENCES `tableland` (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
