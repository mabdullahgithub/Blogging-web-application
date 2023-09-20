-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 11:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `username`, `first_name`, `last_name`, `email`, `password`, `role`) VALUES
(1, 'umair', 'umair', 'ali', 'umair@gmail.com', 'umair', 1),
(2, 'umair', 'umair', 'ali', 'umair@gmail.com', 'umair', 1),
(3, 'abdullah', 'abdullah', 'rasheed', 'abdullah@gmail.com', 'umair', 0),
(4, 'umair', 'umair', 'ali', 'umair@gmail.com', 'umair', 1),
(5, 'abdullah', 'abdullah', 'rasheed', 'abdullah@gmail.com', 'umair', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `post` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'funny', 1),
(2, ' entertainment', 1),
(3, 'superior', 2),
(4, 'sports', 0),
(5, 'With News', 1),
(6, 'Universities', 1),
(7, 'Blogging', 0),
(8, 'technology blog', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `date`, `category`, `author`, `image`) VALUES
(10, 'The Good News', 'some pages integrated in our blogging web application. some pages integrated in our blogging web application. some pages integrated in our blogging web application. some pages integrated in our blogging web application. some pages integrated in our blogging web application', '0000-00-00', 3, 3, '1695153910-globe-g9bd504def_1280.jpg'),
(11, 'Umair Blogging', 'Fusce quis ipsum pellentesque, suscipit sapien eget, elementum nisi. Cras mattis libero at enim vestibulum aliquet. Pellentesque pulvinar, eros ut dapibus efficitur, nulla turpis rhoncus urna, eget lobortis urna purus placerat velit. Vestibulum a hendrerit diam. Praesent volutpat orci sit amet leo consectetur mollis. Suspendisse euismod ipsum sit amet faucibus convallis. Fusce fringilla diam lacus, sed accumsan diam tristique a. Donec mollis vulputate enim, ac tempus ex lacinia sed. Maecenas sit amet ipsum eu risus malesuada congue. Ut dapibus, leo eget porta dapibus, metus enim condimentum turpis, a mollis orci sapien sed orci. Nulla pulvinar neque ut enim sodales imperdiet.\r\n\r\nCurabitur nec tortor auctor magna interdum efficitur ac et libero. In cursus nibh lorem. Ut quis justo et urna bibendum facilisis eget ac est. Quisque sed tincidunt lectus. Aenean ex lectus, pulvinar id sagittis sit amet, varius iaculis ex. Fusce sit amet turpis eget arcu convallis dapibus. Aliquam vulputate posuere dolor vitae scelerisque. Nullam pulvinar augue sed pharetra rhoncus. Fusce molestie, justo vitae molestie lacinia, nunc urna porta mi, ullamcorper ullamcorper nulla eros ut massa. Donec varius orci in diam aliquam ullamcorper. Proin nec lobortis nisl. Cras eleifend sit amet ex et pretium.', '0000-00-00', 5, 3, '1695155299-pexels-irina-iriser-1379636.jpg'),
(12, 'Project Completion', 'Nullam euismod sagittis mauris, a vestibulum elit hendrerit id. Proin eget eros urna. Suspendisse potenti. Suspendisse eu ante varius, pretium erat vel, ullamcorper risus. Cras scelerisque tristique erat nec ultrices. Curabitur non eros enim. Mauris pellentesque viverra enim, non auctor lorem interdum sit amet. Ut venenatis dapibus lacus, id fermentum dolor mollis in. Ut non ligula nisi. Pellentesque aliquam molestie vehicula. Vivamus maximus nulla enim, quis condimentum lectus pulvinar non. Donec tristique euismod tristique. Mauris auctor scelerisque lacus, sit amet lacinia felis tincidunt id. Integer rutrum ex at diam facilisis, nec convallis arcu rutrum. Sed sit amet pretium enim. Vestibulum hendrerit ornare ligula.', '0000-00-00', 6, 3, '1695155352-pexels-pok-rie-2049422.jpg'),
(13, 'AMazing things', 'Nullam euismod sagittis mauris, a vestibulum elit hendrerit id. Proin eget eros urna. Suspendisse potenti. Suspendisse eu ante varius, pretium erat vel, ullamcorper risus. Cras scelerisque tristique erat nec ultrices. Curabitur non eros enim. Mauris pellentesque viverra enim, non auctor lorem interdum sit amet. Ut venenatis dapibus lacus, id fermentum dolor mollis in. Ut non ligula nisi. Pellentesque aliquam molestie vehicula. Vivamus maximus nulla enim, quis condimentum lectus pulvinar non. Donec tristique euismod tristique. Mauris auctor scelerisque lacus, sit amet lacinia felis tincidunt id. Integer rutrum ex at diam facilisis, nec convallis arcu rutrum. Sed sit amet pretium enim. Vestibulum hendrerit ornare ligula.', '0000-00-00', 8, 3, '1695155379-pexels-ryan-west-1719648.jpg'),
(14, 'Addtion for date', 'Nullam euismod sagittis mauris, a vestibulum elit hendrerit id. Proin eget eros urna. Suspendisse potenti. Suspendisse eu ante varius, pretium erat vel, ullamcorper risus. Cras scelerisque tristique erat nec ultrices. Curabitur non eros enim. Mauris pellentesque viverra enim, non auctor lorem interdum sit amet. Ut venenatis dapibus lacus, id fermentum dolor mollis in. Ut non ligula nisi. Pellentesque aliquam molestie vehicula. Vivamus maximus nulla enim, quis condimentum lectus pulvinar non. Donec tristique euismod tristique. Mauris auctor scelerisque lacus, sit amet lacinia felis tincidunt id. Integer rutrum ex at diam facilisis, nec convallis arcu rutrum. Sed sit amet pretium enim. Vestibulum hendrerit ornare ligula.', '19 Sep, 2023', 1, 3, '1695156859-pexels-erik-mclean-9846087.jpg'),
(17, 'testing post', 'centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now', '20 Sep, 2023', 2, 3, '1695195957-pexels-irina-iriser-1379636.jpg'),
(18, 'ABuzar ', 'centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now', '20 Sep, 2023', 3, 5, '1695199440-Blog_single@2x.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `websitename` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `footerdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `websitename`, `logo`, `footerdesc`) VALUES
(1, 'iprimetimes', '1695196845-Logo_2.svg', '@2023 designed by iprimetimes a blogging Company\r\nAll Right Reserved.'),
(2, 'iprimetimes', '1695196845-Logo_2.svg', '@2023 designed by iprimetimes a blogging Company\r\nAll Right Reserved.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first-name` varchar(255) NOT NULL,
  `last-name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first-name`, `last-name`, `username`, `email`, `password`, `role`) VALUES
(3, 'Muhammad', 'Abdullah', 'abdullah', 'aaaa20112003@gmail.com', '93ec71b22793a81569c94ca17e4d9c293d8e201f', 1),
(4, 'umiar', 'tufail', 'umair', 'umair@gmail.com', 'c9b9c416cb908bff0c82dd9bec5372d0d4b21607', 0),
(5, 'Abuzar', 'Talha', 'talha', 'talha@gmail.com', '93ec71b22793a81569c94ca17e4d9c293d8e201f', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
