-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2020 at 09:37 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gametester`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `msg_id` int(11) NOT NULL,
  `sender_name` varchar(24) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `sender_number` varchar(24) NOT NULL,
  `status` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`msg_id`, `sender_name`, `sender_email`, `sender_number`, `status`, `message`) VALUES
(1, 'ubaida dib', 'ubaidadib@gmail.com', '76-574780', 0, 'hello , dear \r\n i wanna  buy PUBG Mobile game , can you help me to know where can i find it .\r\nThanks'),
(2, 'rashed', 'momo_kaka32@yahoo.com', '76767676', 1, 'hello :)'),
(11, 'rashed2', 'aaaa@hotmail.com', '75757575', 0, 'hi'),
(12, 'rashed2', 'aaaa@hotmail.com', '75757575', 0, 'hi'),
(14, 'fexor1', 'qqqq@hotmail.com', '55555', 0, 'helloz\r\n'),
(15, 'dawsdas', 'hamza@eqsols.com', '123121231', 0, '12312313132'),
(16, 'rashed', '51630062@students.liu.edu.lb', '156135', 1, 'heloooooooooooooz'),
(17, 'aaaaa', 'rashed.aldohel.000@gmail.com', '21212121', 1, 'hhhhhhhh'),
(18, 'nm,n,m', 'qqqq@hotmail.com', '76767676', 0, ',l;mklm'),
(19, 'rashed', 'qqqq@hotmail.com', '76767676', 0, 'jkhjknjknh'),
(20, 'rashed', 'ubaidadib@gmail.com', '75757575', 0, 'helooooooo'),
(21, 'rashed', 'rashed.aldohel.000@gmail.com', '76-946618', 1, 'hello iam rashed'),
(22, 'rashed', 'rashed.aldohel.000@gmail.com', '76-946618', 1, 'hello owner iam rashed');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gid` int(11) NOT NULL,
  `game_name` varchar(24) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `rate` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `image` text NOT NULL,
  `recpid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gid`, `game_name`, `category`, `price`, `rate`, `post_date`, `image`, `recpid`) VALUES
(12, 'Fortnite', 'action,shooter', 0, 2020, '0000-00-00', '7.PNG', 2),
(14, 'PUBG', 'action', 12, 2020, '0000-00-00', '3a2d7b572b4d96b4808cf9b6b2c0c996ba7e11f8.jpg', 2),
(18, 'Supraland', 'advanture', 20, 2020, '2020-05-07', '4.PNG', 2),
(20, 'new', 'action,shooter', 10, 2020, '2020-05-31', 'unnamed.png', 2),
(23, 'Fortnite', 'action,shooter', 0, 2020, '0000-00-00', '400px-FortniteBattleRoyaleGhoulTrooper.jpg', 2),
(24, 'Mario', 'advanture', 30, 2020, '0000-00-00', 'New-Super-Mario-Bros.-U-Deluxe-1200x900.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pc_features`
--

CREATE TABLE `pc_features` (
  `id` int(11) NOT NULL,
  `cpu` varchar(24) NOT NULL,
  `gpu` varchar(24) NOT NULL,
  `ram` varchar(24) NOT NULL,
  `storage` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pc_features`
--

INSERT INTO `pc_features` (`id`, `cpu`, `gpu`, `ram`, `storage`) VALUES
(2, 'i5', 'GTX1050', '32GB', '2TB'),
(5, 'i9', 'GTX1080', '16GB', '254GB'),
(6, 'i3', 'GTX1050', '8GB', '254GB'),
(7, 'i9', 'GTX660', '16GB', '500GB'),
(8, 'i7', 'RTX2080', '64GB', '500GB'),
(9, 'i9', 'RTX2070', '64GB', '2TB');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `post_title` varchar(20) NOT NULL,
  `post_content` text NOT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `replied_message`
--

CREATE TABLE `replied_message` (
  `reply_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(24) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `username`, `password`, `email`, `phone`, `role`) VALUES
(24, 'bader', 'bader', 'bd1', '1234', 'bader@hotmmail.com', '777777', 0),
(44, 'mahmoud', 'hasan', 'mah12', '1234', 'rs@hotmail.com', '76-998877', 0),
(45, 'rashed', 'hasan', 'fexor', '1234', 'momo_kaka32@yahoo.com', '76-946618', 1),
(48, 'rashed', 'hasan', 'rashedha', '12345', 'rashed.aldohel.000@gmail.com', '76-946618', 0),
(49, 'rami', 'hsasn', 'rami12', '1234', 'momo_kaka32@yahoo.com', '76-4545454', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_features`
--

CREATE TABLE `user_features` (
  `pid` int(11) NOT NULL,
  `cpu` varchar(24) NOT NULL,
  `gpu` varchar(24) NOT NULL,
  `ram` varchar(24) NOT NULL,
  `storage` varchar(24) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_features`
--

INSERT INTO `user_features` (`pid`, `cpu`, `gpu`, `ram`, `storage`, `uid`) VALUES
(15, 'corei3', 'GTX1050', '', '500', 24),
(43, 'i3', 'GTX1050', '8GB', '500GB', 48);

-- --------------------------------------------------------

--
-- Table structure for table `user_games`
--

CREATE TABLE `user_games` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gid`),
  ADD KEY `recpid` (`recpid`);

--
-- Indexes for table `pc_features`
--
ALTER TABLE `pc_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `publisher_id` (`publisher_id`);

--
-- Indexes for table `replied_message`
--
ALTER TABLE `replied_message`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `msg_id` (`msg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_features`
--
ALTER TABLE `user_features`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user_games`
--
ALTER TABLE `user_games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gid` (`gid`),
  ADD KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pc_features`
--
ALTER TABLE `pc_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `replied_message`
--
ALTER TABLE `replied_message`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user_features`
--
ALTER TABLE `user_features`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_games`
--
ALTER TABLE `user_games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`recpid`) REFERENCES `pc_features` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`publisher_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replied_message`
--
ALTER TABLE `replied_message`
  ADD CONSTRAINT `replied_message_ibfk_1` FOREIGN KEY (`msg_id`) REFERENCES `contact_us` (`msg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_features`
--
ALTER TABLE `user_features`
  ADD CONSTRAINT `user_features_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_games`
--
ALTER TABLE `user_games`
  ADD CONSTRAINT `user_games_ibfk_1` FOREIGN KEY (`gid`) REFERENCES `game` (`gid`),
  ADD CONSTRAINT `user_games_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
