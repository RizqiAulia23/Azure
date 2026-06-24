-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2026 at 05:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azure`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_address` text NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `level`) VALUES
(1, 'Rizu', 'admin', 'admin', '085934826191', 'aulnpc@gmail.com', 'Bumi', 'admin'),
(6, 'Rizqi aulia Rahman', 'Rizuyaki', '123455', '123445', 'aulnpc34@gmail.com', 'bumi', 'pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(3, 'WOODY'),
(4, 'FLORAL'),
(11, 'FRESH'),
(12, 'LEATHER');

-- --------------------------------------------------------

--
-- Table structure for table `tb_masseges`
--

CREATE TABLE `tb_masseges` (
  `massege_id` int(11) NOT NULL,
  `massege_name` varchar(30) NOT NULL,
  `massege_email` varchar(30) NOT NULL,
  `massege_teks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_masseges`
--

INSERT INTO `tb_masseges` (`massege_id`, `massege_name`, `massege_email`, `massege_teks`) VALUES
(1, 'rizu', 'aulnpc34@gmail.com', '6767676'),
(2, 'rizu', 'aulnpc34@gmail.com', '6767676'),
(3, 'rizky', 'rizky@gmail.com', 'wangi banget tahan lama'),
(4, 'rizky', 'rizky@gmail.com', 'jkjkjkjk'),
(5, 'rizky', 'rizky@gmail.com', 'jkjkjkjk'),
(6, 'rizky', 'rizky@gmail.com', 'adasdad');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(60) NOT NULL,
  `product_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`) VALUES
(9, 12, 'NOIR Intense', 250000, 'Bold and mysterious fragrance with deep woody and smoky notes.', 'Rectangle 9 (3).png', 1),
(10, 11, 'BLANCHE', 150000, 'A soft and elegant scent with delicate floral notes and a touch of powdery freshness.', 'Rectangle 9 (4).png', 1),
(11, 3, 'LUNE', 150000, 'Warm and timeless aroma with rich woody accords and subtle musky undertones.', 'Rectangle 9 (5).png', 1),
(12, 11, 'NAUTICA', 150000, 'Fresh and invigorating fragrance inspired by the ocean breeze.', 'Rectangle 9 (6).png', 1),
(13, 3, 'CEDAR ESSENCE', 1000000, 'Pure cedarwood fragrance blended with subtle earthy and fresh notes.', 'Rectangle 9 (7).png', 1),
(14, 4, ' Green Harmony', 1000000, 'Fresh green fragrance with hints of leaves, herbs, and soft citrus tones.', 'Rectangle 9 (8).png', 1),
(15, 12, 'Oud Leather ', 200000, 'Rich leather meets oud and resins for a deep, opulent, and long-lasting scent.', 'Rectangle 9 (10).png', 1),
(16, 4, 'Rose', 150000, 'Elegant floral fragrance with blooming rose notes blended with soft white musk.', 'Rectangle 9 (9).png', 1),
(17, 4, 'Petal', 150000, 'A captivating blend of rose, blackcurrant, and soft musk for a mysterious floral allure.', 'Rectangle 9 (11).png', 1),
(18, 4, 'Cherry Blossom', 150000, 'Sweet cherry blossom with jasmine and pink freesia for a soft, graceful scent.', 'Rectangle 9 (12).png', 1),
(19, 4, 'Lily Radiance', 150000, 'Pure lily of the valley with citrus zest and white musk for a clean floral glow.', 'Rectangle 9 (13).png', 1),
(20, 4, 'Jamine Serenade', 1000000, 'Romantic jasmine sambac with vanilla for a warm floral embrace.', 'Rectangle 9 (14).png', 1),
(21, 4, 'Gardenia', 100000, 'Lush gardenia with orange blossom and soft sandalwood for timeless sophistication.', 'Rectangle 9 (16).png', 1),
(22, 4, 'Peony', 150000, 'Lively peony with raspberry and soft vanilla for a joyful and feminine scent.', 'Rectangle 9 (15).png', 1),
(23, 3, 'Oakwood', 150, 'Deep and mysterious blend of oak, leather, and smoky woods for a bold statement.', 'Rectangle 9.png', 1),
(24, 3, 'Woody Ember', 150, 'Smoky woods and warm amber notes that leave a lingering scent of confidence.', 'Rectangle 9-3.png', 1),
(25, 3, 'Amber Woods', 100, 'Rich amber blended with deep woods for a warm, smooth, and lasting impression.', 'Rectangle 9-4.png', 1),
(26, 3, 'Vetiver Root', 100, 'Earthy vetiver with hints of citrus and woods for a clean and gorunded aroma.', 'Rectangle 9-5.png', 1),
(27, 3, 'Spiced Wood', 100, 'A perfect blend of warm spices woods for an inviting and masculine scent.', 'Rectangle 9-6.png', 1),
(28, 3, 'Pinewood', 150000, 'Fresh pine and earthy woods create a crisp and invigorating woody aroma.', 'Rectangle 9-7.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_masseges`
--
ALTER TABLE `tb_masseges`
  ADD PRIMARY KEY (`massege_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_masseges`
--
ALTER TABLE `tb_masseges`
  MODIFY `massege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
