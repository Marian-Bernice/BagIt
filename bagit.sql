-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2020 at 08:22 PM
-- Server version: 10.3.17-MariaDB
-- PHP Version: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bagit`
--

-- --------------------------------------------------------

--
-- Table structure for table `archived`
--

CREATE TABLE `archived` (
  `product_id` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `gender_type` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Coach'),
(2, 'Gucci'),
(3, 'Academy'),
(4, 'Rivington'),
(8, 'Asos');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `c_id`, `qty`) VALUES
(25, '192.168.64.1', NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Backpack'),
(2, 'Hand Bags'),
(3, 'Luggages'),
(4, 'Clutch'),
(5, 'Wallet'),
(6, 'Belt Bag'),
(11, 'Shoulder Bags'),
(12, 'Purse');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `product_id`, `qty`) VALUES
(66, 31, 1),
(67, 31, 1),
(68, 7, 1),
(69, 31, 1),
(70, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `invoice_no`, `order_date`, `order_status`) VALUES
(1, 1, 3342, '2020-11-16', 'unfulfilled'),
(2, 1, 299, '2020-11-16', 'unfulfilled'),
(3, 1, 1938, '2020-11-17', 'unfulfilled'),
(4, 1, 3007, '2020-11-19', 'unfulfilled'),
(5, 1, 3596, '2020-11-19', 'unfulfilled'),
(6, 1, 4235, '2020-11-19', 'unfulfilled'),
(7, 1, 186, '2020-11-19', 'unfulfilled'),
(8, 1, 3461, '2020-11-19', 'unfulfilled'),
(9, 1, 2538, '2020-11-19', 'unfulfilled'),
(10, 1, 2829, '2020-11-19', 'unfulfilled'),
(11, 1, 4009, '2020-11-19', 'unfulfilled'),
(12, 1, 2995, '2020-11-19', 'unfulfilled'),
(13, 1, 4916, '2020-11-19', 'unfulfilled'),
(14, 1, 2173, '2020-11-19', 'unfulfilled'),
(15, 1, 3975, '2020-11-19', 'unfulfilled'),
(16, 1, 1905, '2020-11-19', 'unfulfilled'),
(17, 1, 3104, '2020-11-19', 'unfulfilled'),
(18, 1, 98, '2020-11-19', 'unfulfilled'),
(19, 2, 2403, '2020-11-19', 'unfulfilled'),
(20, 1, 650, '2020-11-19', 'unfulfilled'),
(21, 1, 1195, '2020-11-19', 'unfulfilled'),
(22, 1, 4871, '2020-11-19', 'unfulfilled'),
(23, 1, 2279, '2020-11-19', 'unfulfilled'),
(24, 1, 1679, '2020-11-19', 'unfulfilled'),
(34, 1, 98, '2020-11-23', 'unfulfilled'),
(35, 1, 1987, '2020-11-23', 'unfulfilled'),
(37, 1, 3053, '2020-11-23', 'unfulfilled'),
(41, 1, 3280, '2020-11-23', 'unfulfilled'),
(42, 1, 4356, '2020-11-23', 'unfulfilled'),
(44, 1, 1690, '2020-11-23', 'unfulfilled'),
(45, 1, 562, '2020-11-23', 'unfulfilled'),
(46, 1, 2790, '2020-11-23', 'unfulfilled'),
(47, 1, 622, '2020-11-23', 'unfulfilled'),
(48, 1, 4003, '2020-11-23', 'unfulfilled'),
(49, 1, 1799, '2020-11-24', 'unfulfilled'),
(50, 1, 2910, '2020-11-24', 'unfulfilled'),
(51, 1, 3634, '2020-11-28', 'unfulfilled'),
(52, 1, 2288, '2020-11-28', 'unfulfilled'),
(53, 1, 3066, '2020-12-01', 'unfulfilled'),
(54, 2, 4237, '2020-12-04', 'unfulfilled'),
(55, 1, 3139, '2020-12-05', 'unfulfilled'),
(56, 2, 372, '2020-12-13', 'unfulfilled'),
(57, 2, 726, '2020-12-13', 'unfulfilled'),
(58, 1, 648, '2020-12-13', 'unfulfilled'),
(59, 2, 2759, '2020-12-13', 'unfulfilled'),
(60, 2, 4731, '2020-12-14', 'unfulfilled'),
(61, 13, 416, '2020-12-14', 'unfulfilled'),
(62, 12, 1946, '2020-12-14', 'unfulfilled'),
(63, 14, 2129, '2020-12-14', 'unfulfilled'),
(64, 12, 410, '2020-12-14', 'unfulfilled'),
(65, 15, 3466, '2020-12-14', 'unfulfilled'),
(66, 16, 2085, '2020-12-14', 'unfulfilled'),
(67, 17, 1884, '2020-12-14', 'unfulfilled'),
(68, 12, 609, '2020-12-14', 'unfulfilled'),
(69, 18, 1729, '2020-12-14', 'unfulfilled'),
(70, 12, 2611, '2020-12-14', 'unfulfilled');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `amt` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `currency` text NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `amt`, `user_id`, `order_id`, `currency`, `payment_date`) VALUES
(1, 10, 1, 1, 'USD', '2020-11-16'),
(2, 15, 1, 2, 'USD', '2020-11-16'),
(3, 10, 1, 3, 'USD', '2020-11-17'),
(4, 15, 1, 4, 'USD', '2020-11-19'),
(5, 15, 1, 5, 'USD', '2020-11-19'),
(6, 15, 1, 6, 'USD', '2020-11-19'),
(7, 15, 1, 7, 'USD', '2020-11-19'),
(8, 15, 1, 8, 'USD', '2020-11-19'),
(9, 15, 1, 9, 'USD', '2020-11-19'),
(10, 15, 1, 10, 'USD', '2020-11-19'),
(11, 15, 1, 11, 'USD', '2020-11-19'),
(12, 10, 1, 12, 'USD', '2020-11-19'),
(13, 10, 1, 13, 'USD', '2020-11-19'),
(14, 10, 1, 14, 'USD', '2020-11-19'),
(15, 10, 1, 15, 'USD', '2020-11-19'),
(16, 10, 1, 16, 'USD', '2020-11-19'),
(17, 10, 1, 17, 'USD', '2020-11-19'),
(18, 10, 1, 18, 'USD', '2020-11-19'),
(19, 20, 2, 19, 'USD', '2020-11-19'),
(20, 10, 1, 20, 'USD', '2020-11-19'),
(21, 10, 1, 21, 'USD', '2020-11-19'),
(22, 10, 1, 22, 'USD', '2020-11-19'),
(23, 10, 1, 23, 'USD', '2020-11-19'),
(24, 15, 1, 24, 'USD', '2020-11-19'),
(25, 15, 1, 34, 'USD', '2020-11-23'),
(26, 15, 1, 35, 'USD', '2020-11-23'),
(27, 15, 1, 37, 'USD', '2020-11-23'),
(28, 15, 1, 41, 'USD', '2020-11-23'),
(29, 30, 1, 42, 'USD', '2020-11-23'),
(30, 10, 1, 44, 'USD', '2020-11-23'),
(31, 15, 1, 45, 'USD', '2020-11-23'),
(32, 10, 1, 46, 'USD', '2020-11-23'),
(33, 15, 1, 47, 'USD', '2020-11-23'),
(34, 10, 1, 48, 'USD', '2020-11-23'),
(35, 21, 1, 49, 'USD', '2020-11-24'),
(36, 10, 1, 50, 'USD', '2020-11-24'),
(37, 13, 1, 51, 'USD', '2020-11-28'),
(38, 23, 1, 52, 'USD', '2020-11-28'),
(39, 28, 1, 53, 'USD', '2020-12-01'),
(40, 40, 2, 54, 'USD', '2020-12-04'),
(41, 15, 1, 55, 'USD', '2020-12-05'),
(42, 7, 2, 56, 'USD', '2020-12-13'),
(43, 7, 2, 57, 'USD', '2020-12-13'),
(44, 7, 1, 58, 'USD', '2020-12-13'),
(45, 12, 2, 59, 'USD', '2020-12-13'),
(46, 7, 2, 60, 'USD', '2020-12-14'),
(47, 10, 13, 61, 'USD', '2020-12-14'),
(48, 42, 12, 62, 'USD', '2020-12-14'),
(49, 14, 14, 63, 'USD', '2020-12-14'),
(50, 90, 12, 64, 'USD', '2020-12-14'),
(51, 30, 15, 65, 'USD', '2020-12-14'),
(52, 7, 16, 66, 'USD', '2020-12-14'),
(53, 7, 17, 67, 'USD', '2020-12-14'),
(54, 10, 12, 68, 'USD', '2020-12-14'),
(55, 7, 18, 69, 'USD', '2020-12-14'),
(56, 21, 12, 70, 'USD', '2020-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `gender_type` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `gender_type`, `stock`) VALUES
(1, 1, 3, 'Academy Red Backpack', 21, 'All red, leather backpack                                                                                                                                                                                                                                                ', '../Images/Product/redbackpack.jpeg', 'Unisex', 95),
(2, 1, 3, 'Academy Blue Backpack ', 21, 'Blue backpack with Varsity Zipper                                        ', '../Images/Product/bluebackpack.jpeg', 'Unisex', 20),
(3, 1, 3, 'Academy Multi Backpack', 21, 'Multicolored with varsity zipper                                                                                                    ', '../Images/Product/multicolored.jpeg', 'Unisex', 14),
(4, 11, 2, 'Red Shoulder Bag', 15, 'Solid red leather bag                                                                                                                                                                                                                                                                                                            ', '../Images/Product/shoulderred.jpeg', 'Female', 1),
(5, 11, 2, 'Colorblock Shoulder Bag', 15, 'Snake details, with pink and wine                                                            ', '../Images/Product/colorblock.jpeg', 'Female', 92),
(6, 11, 2, 'Red Gucci shoulder bag', 15, 'Gucci prints                                                                                                    ', '../Images/Product/redguccis.jpeg', 'Female', 45),
(7, 4, 1, 'Purple coin clutch', 10, 'Cute purple and black clutch                                                            ', '../Images/Product/clutchp.jpeg', 'Female', 32),
(8, 4, 1, 'White ringed clutch', 13, 'White with golden rings                                        ', '../Images/Product/whiteclutch.jpeg', 'Female', 97),
(10, 5, 4, 'Brown wallet', 10, 'Mens wallet                    ', '../Images/Product/brwnwllt.jpeg', 'Male', 4),
(11, 5, 4, 'Blue black wallet', 10, 'Blue on black patterns                    ', '../Images/Product/blueblackw.jpeg', 'Male', 43),
(12, 5, 3, 'Black and blue wallet', 16, 'Blue zipper on black wallet                    ', '../Images/Product/bluezip.jpeg', 'Male', 100),
(15, 2, 4, 'Pink Fur bag', 20, 'Pink furs with golden locks                                        ', '../Images/Product/pinkcutie.jpeg', 'Female', 50),
(17, 4, 4, 'Famous inscription bag', 15, 'red and yellow on cream                    ', '../Images/Product/famous.jpeg', 'Female', 50),
(22, 6, 8, 'Blue-Red belt bag', 25, 'Red and blue belt bag with silver zip', '../Images/Product/beltbag1.jpeg', 'Unisex', 90),
(23, 6, 3, 'Vintage belt bag', 30, 'Brown vintage belt bag', '../Images/Product/bb2.jpeg', 'Unisex', 14),
(24, 2, 8, 'Yellow and gold hand bag', 21, 'Deep yellow hand bag with golden locks', '../Images/Product/hb1.jpeg', 'Female', 33),
(25, 2, 1, 'Coach black hand bag', 15, 'All black', '../Images/Product/blackhb.jpeg', 'Female', 32),
(26, 3, 8, 'Brown Travel bag', 80, 'No wheels, shoulder travel bag', '../Images/Product/travel.jpeg', 'Unisex', 22),
(27, 3, 3, 'Camou-print luggage', 90, 'Green black camou luggage', '../Images/Product/balsck.jpeg', 'Unisex', 44),
(28, 3, 8, 'Brown luggage', 67, 'brown luggage with black zips', '../Images/Product/brwon.jpeg', 'Unisex', 12),
(29, 6, 4, 'Multicolored belt bag', 32, 'Multi colors                    ', '../Images/Product/bb3.jpeg', 'Female', 3),
(30, 12, 8, 'Light pink purse', 12, 'Salmon', '../Images/Product/salmon.jpeg', 'Female', 33),
(31, 12, 8, 'Cute white-pink coin pouch', 7, 'White and pink patterns', '../Images/Product/coint.jpeg', 'Female', 35),
(32, 12, 4, 'Black Multi-bag', 23, 'long handle                    ', '../Images/Product/multiii.jpeg', 'Unisex', 24);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`review_id`, `user_id`, `product_id`, `review`, `title`, `date`) VALUES
(18, 1, 15, 'It didnt come as the color i asked for', 'Color', '2020-11-28'),
(21, 1, 30, 'It goes with different types of clothing', 'Lovely bag', '2020-12-01'),
(22, 2, 7, 'I went for a party and was getting really good reviews. All of a sudden, I could no longer find the bag', 'Someone stole mine', '2020-12-01'),
(23, 2, 25, 'Elite bag', 'Nice', '2020-12-02'),
(24, 1, 25, 'This bag will look goos with anything ', 'Beautiful', '2020-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(150) NOT NULL,
  `user_country` varchar(30) NOT NULL,
  `user_city` varchar(30) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_country`, `user_city`, `user_contact`, `user_role`) VALUES
(1, 'Marian-Bernice Haligah', 'hmarnice@gmail.com', '8609f08cf2e73eb6b949f5d26ed189ab', 'Ghana', 'Tema', '0207120551', 2),
(2, 'Maria Bali', 'hmarnice@yahoo.com', '8609f08cf2e73eb6b949f5d26ed189ab', 'Ghana', 'Accra', '0207120551', 2),
(12, 'Admin', 'admin@gmail.com', '8609f08cf2e73eb6b949f5d26ed189ab', 'Ghana', 'Tema', '0300200200', 1),
(13, 'Henry', 'hane@gmail.com', '8609f08cf2e73eb6b949f5d26ed189ab', 'Ghana', 'Accra', '020282829939', 2),
(14, 'David Plange', 'dplange@gmail.com', 'dfb4a8b671053c0632b544f71515883a', 'Ghana', 'Kumasi', '02046364738', 2),
(15, 'Fredrick Sampah', 'fsampah@gmail.com', 'dfb4a8b671053c0632b544f71515883a', 'Ghana', 'Takoradi', '0207120551', 2),
(16, 'Fred Peter Sampah', 'fpsampah@gmail.com', 'dfb4a8b671053c0632b544f71515883a', 'Ghana', 'Takoradi', '0207120551', 2),
(17, 'Fred David', 'fdavid@gmail.com', 'dfb4a8b671053c0632b544f71515883a', 'Ghana', 'Ada', '02023423493', 2),
(18, 'David Fred', 'dfred@gmail.com', 'dfb4a8b671053c0632b544f71515883a', 'Ghana', 'Ada', '02020393992', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archived`
--
ALTER TABLE `archived`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_brand` (`product_brand`),
  ADD KEY `product_cat` (`product_cat`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_brand` (`product_brand`),
  ADD KEY `product_cat` (`product_cat`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archived`
--
ALTER TABLE `archived`
  ADD CONSTRAINT `archived_ibfk_1` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `archived_ibfk_2` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);

--
-- Constraints for table `product_review`
--
ALTER TABLE `product_review`
  ADD CONSTRAINT `product_review_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `product_review_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
