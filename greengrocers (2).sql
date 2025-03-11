-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 02:04 PM
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
-- Database: `greengrocers`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'unilever'),
(2, 'greengrocers'),
(3, 'Irani'),
(4, 'chinese'),
(5, 'coca cola'),
(6, 'Sapphire');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'vegetables'),
(2, 'fruits'),
(3, 'dry fruits'),
(5, 'drinks'),
(6, 'Khadi');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 4, 786964696, 10, 1, 'pending'),
(2, 4, 794923669, 7, 2, 'pending'),
(3, 4, 850958728, 4, 1, 'pending'),
(4, 4, 1225679427, 10, 1, 'pending'),
(5, 4, 643367972, 3, 1, 'pending'),
(6, 4, 1652344973, 11, 1, 'pending'),
(7, 4, 183572469, 7, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image`, `product_price`, `date`, `status`) VALUES
(1, 'potatos', 'potatos', 'potatos,fresh potatos,big potatos', 1, 2, 'potato.jpg', '85', '2025-02-27 12:48:34', 'true'),
(2, 'Apple', 'Fresh Apple', 'Apple,Fresh Apple,Green Grocers,Good Apple,', 2, 2, 'apple.jpg', '400', '2025-01-24 10:48:44', 'true'),
(3, 'Cauliflower (Gobhi)', 'Fresh Cauliflower, Fresh Gobhi', 'Cauliflower,Fresh Cauliflower,Good Cauliflower,Green Grocers,Gobhi', 1, 2, 'cauliflower.jpg', '200', '2025-01-24 10:49:41', 'true'),
(4, 'Spinach (Palak)', 'Spinach Palak', 'Spinach,Palak,Fresh Palak,Green Grocers,Good spinach', 1, 2, 'spinach.jpg', '200', '2025-01-24 10:49:58', 'true'),
(5, 'Capsicum (Shmila)', 'Capsicum, Shimla Mirch', 'capsicum,Shimla mirch,fresh shimla,', 1, 2, 'capsicum.jpg', '400', '2025-01-24 10:50:08', 'true'),
(6, 'Bitter Ground (karila)', 'Bitter Ground, Karila ', 'karila,fresh karila,Bitter Ground,green grocers', 1, 2, 'bitter-ground.jpg', '300', '2025-01-24 10:50:17', 'true'),
(7, 'dates (khajoor)', 'Dates Khajoor ', 'Best Khajoor, best dates,dry khajoor,dry fruites', 3, 3, 'dates.jpg', '1000', '2025-01-24 10:48:22', 'true'),
(8, 'Broccoli', 'Broccoli an edible green plant in the cabbage family', 'Broccoli,good Broccoli,fresh Broccoli,green grocers,', 1, 2, 'broccoli.jpg', '450', '2025-01-24 10:50:22', 'true'),
(9, 'Fig Irani Dried (Doda Anjeer)', 'Fig Irani Dried (Anjeer)', 'Fig, Anjeer, dry Irani Anjeet', 3, 3, 'fig.jpg', '1400', '2025-01-24 10:48:33', 'true'),
(10, 'Apricot Chinese dried fruit ', 'Apricot Chinese dried fruit ', 'Apricot,Apricot Chinese dried fruit,chinese,dry fruit,', 3, 4, 'apricot-chinese.jpg', '1200', '2025-01-24 11:07:30', 'true'),
(12, 'Okra (Bhindi)', 'Okra,Bhandi', 'Bhandi,fresh bhindi,okra', 1, 2, 'Okra-vegetable.jpg', '300', '2025-02-27 13:47:00', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 4, 2600, 786964696, 3, '2025-02-02 16:48:39', 'complete'),
(2, 4, 2800, 794923669, 2, '2025-02-04 20:14:09', 'complete'),
(3, 4, 540, 850958728, 3, '2025-02-13 17:01:10', 'complete'),
(4, 4, 3600, 1225679427, 3, '2025-02-16 10:59:48', 'pending'),
(5, 4, 340, 643367972, 2, '2025-02-16 11:00:42', 'pending'),
(6, 4, 45, 1652344973, 1, '2025-02-16 11:13:46', 'pending'),
(7, 4, 1000, 183572469, 1, '2025-03-03 15:42:29', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payment`
--

INSERT INTO `user_payment` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 786964696, 2600, 'Cash on delivery', '2025-02-02 16:48:39'),
(2, 1, 786964696, 2600, 'Cash on delivery', '2025-02-02 16:49:52'),
(3, 2, 794923669, 2800, 'Cash on delivery', '2025-02-04 20:14:09'),
(4, 3, 850958728, 540, 'Cash on delivery', '2025-02-13 17:01:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(4, 'green', 'green@gmail.com', '$2y$10$HRgWYezi06vmlOX8DMmKiu76kSAFAWCZH9w37Hrt66NQ.HN7X3eTi', 'green1.png', '127.0.0.1', 'Askari 11, Lahore', '032112345671'),
(5, 'Azlan', 'azlan@gmail.com', '$2y$10$j5WHc4ejB84nsxZ4zDekqecNC8.XERr1mO3TVJ3.9KKpbmRbuW39u', 'azlan.jpg', '127.0.0.1', 'Askari 11, Lahore', '032111122233');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
