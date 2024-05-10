-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 03:02 PM
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
-- Database: `admin1`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_content`
--

CREATE TABLE `about_content` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_content`
--

INSERT INTO `about_content` (`id`, `heading`, `image_path`, `video_link`, `description`) VALUES
(4, 'ABOUT US', 'img/img_2.jpg', 'https://youtu.be/xqKcHz47E5A?si=cg-VdvEehXV5Q1pM', 'A hotel is a commercial establishment that provides lodging, meals, and other services to guests, travelers, and tourists. Hotels can range from small family-run businesses to large international chains. Most hotels list a variety of services, such as room service, laundry, and concierge.'),
(5, 'HOTEL BAR', 'img/pexels-pixabay-33265.jpg', 'https://youtu.be/xqKcHz47E5A?si=cg-VdvEehXV5Q1pM', 'A bar is a place in a hotel or other establishment that serves alcoholic and non-alcoholic drinks, as well as light snacks. Bars can range in size and atmosphere, from small, intimate lounges to large, bustling taverns. They are often a popular gathering spot for guests, offering a relaxed and social environment to unwind and mingle. In addition to drinks and snacks, bars may also offer entertainment, such as live music or sports games on TV. Some hotels may have multiple bars with different themes and settings to cater to different preferences and occasions.'),
(6, 'CAFE', 'img/cafe.jpg', 'https://youtu.be/NC9KlaxtfLg?si=St6kKWSPUS2u3IoJ', 'A cafe is a small restaurant focusing on caffeinated drinks such as classic drip coffee, cappuccinos, espresso, and tea. The food is typically straightforward, with a selection of sandwiches, pastries, and other baked goods that customers order at the counter and take to their tables.');

-- --------------------------------------------------------

--
-- Table structure for table `about_heading_image`
--

CREATE TABLE `about_heading_image` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `caption_heading` varchar(255) DEFAULT NULL,
  `caption_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_heading_image`
--

INSERT INTO `about_heading_image` (`id`, `image_path`, `caption_heading`, `caption_text`) VALUES
(4, 'img/h6.jpg', 'CAFE IN HOTEL', 'Awaken your senses'),
(5, 'img/BAR.jpg', 'BAR', 'Shake the stress off'),
(6, 'img/gym.jpg', 'GYM', 'Fitter, healthier, happier');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `check_in` varchar(100) DEFAULT NULL,
  `check_out` varchar(100) NOT NULL,
  `total_price` int(10) NOT NULL,
  `remaining_price` int(10) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `max_person` int(112) NOT NULL,
  `advance_payment` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_id`, `room_id`, `booking_date`, `check_in`, `check_out`, `total_price`, `remaining_price`, `payment_status`, `max_person`, `advance_payment`) VALUES
(25, 107, 2, '2024-03-07 18:30:00', '2024-03-05', '2024-03-06', 18000, 1380, 1, 12, 120),
(26, 108, 3, '2024-03-08 18:30:00', '2024-03-28', '2024-03-21', 12000, 778, 1, 6, 1222),
(27, 109, 2, '2024-03-08 18:30:00', '2024-03-28', '2024-03-29', 4500, 0, 1, 3, 0),
(28, 110, 5, '2024-03-13 18:30:00', '2024-03-14', '2024-03-16', 2000, 800, 1, 2, 200),
(29, 111, 5, '2024-03-17 18:30:00', '2024-03-19', '2024-03-21', 1000, 0, 1, 1, 0),
(30, 112, 9, '2024-04-08 18:30:00', '2024-04-10', '2024-04-25', 12000, 818, 1, 12, 182),
(32, 114, 3, '2024-04-21 18:30:00', '2024-04-25', '2024-04-26', 1500, 0, 0, 1, 0),
(33, 115, 17, '2024-04-21 18:30:00', '2024-04-25', '2024-04-27', 6110, 0, 0, 1, 0),
(34, 116, 1, '2024-04-21 18:30:00', '2024-04-23', '2024-04-25', 1155, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `email`, `number`, `add`) VALUES
(106, 'radhesh joshi', 'rjoshi43@rku.ac.in', '31313813913', 'rajkot'),
(107, 'nenis mul', 'jenilgajera43@gmail.com', '8780689090', 'amreli ,rajkot'),
(108, 'denish dobariya', 'jenilgajera43@gmail.com', '8849870776', 'mahamad'),
(109, 'naman patel', 'nmana43@gmail.com', '87806888890', 'junagdha'),
(110, 'nenis rudni', 'cavasakilala@gmail.com', '92366023154', 'egfth'),
(111, 'nen rudan', 'nrudani449@rku.ac.in', '9429032526', 'ujijhjgkytbgiyguiybiu'),
(112, 'jen fn', 'jaysankaliya2005@gmail.com', '8238273342', 'ahdjfhahfh'),
(114, 'MARINA STALKS', 'rudaninenis7@gmail.com', '07851692131', 'jhdajbh bdbfka'),
(115, 'namu nenu', 'jaysankaliya205@gmail.com', '7487289472', 'd,n,gsbhbfsdfsdf'),
(116, 'kry rudan', 'nrudani4129@rku.ac.in', '09429032526', 'ujijhjgkytbgiyguiybiu');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_header`
--

CREATE TABLE `gallery_header` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery_header`
--

INSERT INTO `gallery_header` (`id`, `title`, `subtitle`) VALUES
(2, 'Welcome to Our Gallery', 'Experience luxury and comfort at our hotel');

-- --------------------------------------------------------

--
-- Table structure for table `gym_heading`
--

CREATE TABLE `gym_heading` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gym_heading`
--

INSERT INTO `gym_heading` (`id`, `heading`) VALUES
(1, 'Our Gym');

-- --------------------------------------------------------

--
-- Table structure for table `gym_images`
--

CREATE TABLE `gym_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `modal_id` varchar(20) DEFAULT NULL,
  `modal_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gym_images`
--

INSERT INTO `gym_images` (`id`, `image_path`, `modal_id`, `modal_description`) VALUES
(0, 'img/gym3.jpg', 'exampleModal1', 'dfd'),
(1, 'img/gym2.jpg', 'exampleModal1', 'Description for Gym Image 1'),
(2, 'img/gym1.jpg', 'exampleModal2', 'fssdere');

-- --------------------------------------------------------

--
-- Table structure for table `hotelfeatures`
--

CREATE TABLE `hotelfeatures` (
  `id` int(11) NOT NULL,
  `feature_name` varchar(255) DEFAULT NULL,
  `flaticon_class` varchar(255) DEFAULT NULL,
  `i_class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelfeatures`
--

INSERT INTO `hotelfeatures` (`id`, `feature_name`, `flaticon_class`, `i_class`) VALUES
(1, 'Swimming Pool', 'flaticon-pool1', 'fa-solid fa-water-ladder'),
(2, 'Free Wifi', 'flaticon-desk', 'fa-solid fa-wifi'),
(3, 'Fire Exit', 'flaticon-exit', 'fa-solid fa-fire-extinguisher'),
(4, 'Car Parking', 'flaticon-parking', 'fa-solid fa-square-parking'),
(5, 'Hair Dryer', 'flaticon-hair-dryer', 'fa-solid fa-wind'),
(6, 'Minibar', 'flaticon-minibar', 'fa-solid fa-champagne-glasses'),
(7, 'Drinks', 'flaticon-drink', 'fa-solid fa-martini-glass'),
(8, 'Best View', 'flaticon-cab', 'fa-solid fa-mountain-sun');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_main_page`
--

CREATE TABLE `hotel_main_page` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `caption_heading` varchar(255) DEFAULT NULL,
  `caption_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_main_page`
--

INSERT INTO `hotel_main_page` (`id`, `image_path`, `caption_heading`, `caption_text`) VALUES
(1, 'img/h1.jpg', 'HOTEL ROOMS', 'LUXURIOUS ROOMS'),
(2, 'img/h7.jpg', 'RELAXING ROOM', 'Your Room Your Stay'),
(3, 'img/h3.jpg', 'Unique Experience', 'Enjoy with us');

-- --------------------------------------------------------

--
-- Table structure for table `interior_headings`
--

CREATE TABLE `interior_headings` (
  `id` int(11) NOT NULL,
  `heading` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interior_headings`
--

INSERT INTO `interior_headings` (`id`, `heading`) VALUES
(1, 'Our Interior');

-- --------------------------------------------------------

--
-- Table structure for table `interior_images`
--

CREATE TABLE `interior_images` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `modal_target` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interior_images`
--

INSERT INTO `interior_images` (`id`, `image_path`, `modal_target`) VALUES
(1, 'img/int1.jpg', '#exampleModal1'),
(2, 'img/int2.jpg', '#exampleModal2'),
(3, 'img/int3.jpg', '#exampleModal3');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','inactive') DEFAULT 'inactive',
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `image`, `email`, `password`, `mobile`, `address`, `gender`, `token`, `date`, `status`, `role`) VALUES
(1, 'rkq', '66158318a467daward.jpg', 'jaysankaliya2005@gmail.com', 'RS123kj*$', '8780689090', 'amreli', 'male', '660d686222ee6660d686222eec', '2024-04-03 03:32:02', 'active', 'user'),
(2, 'jess', '66158318a467daward.jpg', 'jgajea441@rku.ac.in', 'RS123kj*@', '6351259367', 'rajkot', 'male', '660d686222ee6660d686222eec', '2024-04-04 04:53:24', 'active', 'admin'),
(7, 'jemi', '66158318a467daward.jpg', 'krupansusorathiya@gmail.com', 'RS123kj*@', '35375919542', 'bhadala', 'male', '6616087370ec06616087370ec2', '2024-04-10 03:33:07', 'active', 'user'),
(15, 'jenil', NULL, 'jenildonga111@gmail.com', 'Jenil@1234', NULL, NULL, NULL, '6621dae63a49b6621dae63a4a0', '2024-04-19 02:45:58', 'active', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `roomid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`, `roomid`) VALUES
(13, 'nishu', 2, 'v', 1713782658, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `check_in_status` tinyint(1) NOT NULL,
  `check_out_status` tinyint(1) NOT NULL,
  `deleteStatus` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type_id`, `room_no`, `status`, `check_in_status`, `check_out_status`, `deleteStatus`) VALUES
(1, 2, 'A-101', 0, 0, 0, 0),
(2, 2, 'A-102', NULL, 0, 0, 0),
(3, 3, 'A-103', NULL, 0, 0, 0),
(4, 4, 'A-104', NULL, 0, 0, 0),
(5, 1, 'B-101', NULL, 0, 0, 0),
(6, 2, 'B-102', NULL, 0, 0, 1),
(7, 3, 'B-103', NULL, 0, 0, 0),
(8, 4, 'B-104', NULL, 0, 0, 1),
(9, 1, 'C-101', NULL, 0, 0, 0),
(10, 2, 'C-102', NULL, 0, 0, 0),
(11, 3, 'C-103', NULL, 0, 0, 1),
(12, 4, 'C-104', NULL, 0, 0, 0),
(13, 4, 'D-101', NULL, 0, 0, 1),
(14, 5, 'K-699', NULL, 0, 0, 0),
(15, 5, 'K-799', NULL, 0, 0, 0),
(16, 5, 'K-899', NULL, 0, 0, 0),
(17, 6, 'M-333', NULL, 0, 0, 0),
(18, 6, 'M-444', NULL, 0, 0, 0),
(19, 6, 'M-555', NULL, 0, 0, 0),
(20, 9, 'P-696', NULL, 0, 0, 0),
(21, 10, 'M-966', NULL, 0, 0, 0),
(22, 10, 'M-869', NULL, 0, 0, 0),
(23, 8, 'Z-666', NULL, 0, 0, 0),
(24, 7, 'X-969', NULL, 0, 0, 0),
(25, 8, 'Z-111', NULL, 0, 0, 0),
(26, 6, 'M-135', NULL, 0, 0, 0),
(30, 5, 'k-201', NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms_page_image`
--

CREATE TABLE `rooms_page_image` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `modal_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms_page_image`
--

INSERT INTO `rooms_page_image` (`id`, `image_path`, `modal_id`) VALUES
(2, 'img/h1.jpg', 'exampleModal2'),
(3, 'img/img_4.jpg', 'exampleModal3');

-- --------------------------------------------------------

--
-- Table structure for table `room_heading`
--

CREATE TABLE `room_heading` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_heading`
--

INSERT INTO `room_heading` (`id`, `heading`) VALUES
(1, 'Our Rooms');

-- --------------------------------------------------------

--
-- Table structure for table `room_page`
--

CREATE TABLE `room_page` (
  `id` int(11) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `caption_heading` varchar(255) DEFAULT NULL,
  `caption_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_page`
--

INSERT INTO `room_page` (`id`, `image_path`, `caption_heading`, `caption_text`) VALUES
(1, 'img/h7.jpg', 'HOTEL ROOMS', 'LUXURIOUS ROOMS');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `room_type_id` int(10) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `max_person` int(10) NOT NULL,
  `offers` int(50) NOT NULL,
  `description` varchar(120) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type`, `price`, `max_person`, `offers`, `description`, `image`) VALUES
(1, 'Single', 1000, 1, 10, 'amrelk', 'h1.jpg'),
(2, 'Double', 1500, 2, 23, 'jhd ihifhiuf', 'h2.jpg'),
(3, 'Triple', 2000, 3, 25, 'jdajsiah', 'h7.jpg'),
(4, 'Family', 3000, 2, 10, 'bbbhb hbfc', 'img_2.jpg'),
(5, 'King Sized', 5500, 4, 7, 'hjvjsajs', 'h2.jpg'),
(6, 'Master Suite', 6500, 6, 6, 'hdasd]', 'h7.jpg'),
(7, 'Mini-Suite', 3600, 3, 5, 'bbsdjhf ksbkfha', 'img_3.jpg'),
(8, 'Connecting Rooms', 8000, 6, 30, 'jhjaf jha bhbj  b', 'h2.jpg'),
(9, 'Presidential Suite', 21000, 4, 40, 'dbsbjhfbdhfdk ', 'h4.jpg'),
(10, 'Murphy Room', 6900, 3, 20, 'bbfdfdbhjbkh afd', 'h3.jpg'),
(15, 'Standard Room', 1000, 12, 20, 'jess gajerajnajknfnf', 'h2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `Department` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `email`, `phone`, `Department`, `address`, `salary`, `image`) VALUES
(1, 'FLOUY CARDOZ', 'rudaninenis7@gmail.com', '7851692131', 'cleaning', 'jhdajbh bdbfka', 2500.00, 'staff_image/chef2.jpg'),
(2, 'CRISTINE SMITH', 'rudaninenis7@gmail.com', '7851692131', 'cleaning', 'jhdajbh bdbfka', 25000.00, 'staff_image/chef3.jpg'),
(3, 'MARINA STALKS', 'rudaninenis7@gmail.com', '7851692131', 'cleaning', 'jhdajbh bdbfka', 25000.00, 'staff_image/chef4.jpg'),
(4, 'MEGAN PEARSON', 'rudaninenis7@gmail.com', '7851692131', 'cleaning', 'jhdajbh bdbfka', 25000.00, 'staff_image/chef5.jpg'),
(5, 'FARROKH KHAMBATA', 'rudaninenis7@gmail.com', '7851692131', 'cleaning', 'jhdajbh bdbfka', 25000.00, 'staff_image/chef6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sent_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(256) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `email`, `sent_time`, `token`, `otp`) VALUES
(12, 'jaysankaliya2005@gmail.com', '2024-04-09 06:00:30', '7105ceec9a43f8bee9838f90135b39c91754b5a3debdfd27e2ce6ea1dbc6af6f0b55895bf15457c00f2c5af97e030081bb0107c0b23922e3f60919a230e64a46', 623275);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `a_id` int(12) NOT NULL,
  `a_name` varchar(30) NOT NULL,
  `a_email` varchar(20) NOT NULL,
  `password` int(11) NOT NULL,
  `phone` int(15) NOT NULL,
  `address` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`a_id`, `a_name`, `a_email`, `password`, `phone`, `address`) VALUES
(1, 'jess', 'jgajera441@rku.ac.in', 123, 643434343, 'rajkot ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_content`
--
ALTER TABLE `about_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_heading_image`
--
ALTER TABLE `about_heading_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_header`
--
ALTER TABLE `gallery_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym_heading`
--
ALTER TABLE `gym_heading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym_images`
--
ALTER TABLE `gym_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelfeatures`
--
ALTER TABLE `hotelfeatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_main_page`
--
ALTER TABLE `hotel_main_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interior_headings`
--
ALTER TABLE `interior_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interior_images`
--
ALTER TABLE `interior_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `rooms_page_image`
--
ALTER TABLE `rooms_page_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_heading`
--
ALTER TABLE `room_heading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_page`
--
ALTER TABLE `room_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`a_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_content`
--
ALTER TABLE `about_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `about_heading_image`
--
ALTER TABLE `about_heading_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery_header`
--
ALTER TABLE `gallery_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gym_heading`
--
ALTER TABLE `gym_heading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotelfeatures`
--
ALTER TABLE `hotelfeatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotel_main_page`
--
ALTER TABLE `hotel_main_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `interior_headings`
--
ALTER TABLE `interior_headings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `interior_images`
--
ALTER TABLE `interior_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `rooms_page_image`
--
ALTER TABLE `rooms_page_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_heading`
--
ALTER TABLE `room_heading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_page`
--
ALTER TABLE `room_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `room_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `a_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
