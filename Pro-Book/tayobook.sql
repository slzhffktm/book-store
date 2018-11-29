-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 06:15 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tayobook`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `username` varchar(255) NOT NULL,
  `token` text NOT NULL,
  `browser` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `expiredAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`username`, `token`, `browser`, `ip`, `expiredAt`) VALUES
('aditbro', '$2y$10$GwTDthjsTikIvHUyepb0HuQ9bzjZrPLqalCLdMXFoSwNkmjlDSB/S', '', '', '2018-11-01 03:22:52'),
('admin', '$2y$10$AUb0M01Q4UgVTPg.eIovBuHV1p1HpS/4lEe1Zhjahxu1zr93K/WvS', 'Chrome', '::1', '2018-11-29 06:45:52'),
('admins', '$2y$10$fboUJum9xsMZ1GwRPpgVdOhiap64GH058vGNcUt.yIhsP48dZywdy', '', '', '2018-10-25 21:35:21'),
('HeiTuyul', '$2y$10$4sJ.9iiS1dqyjn0VdfjuUOrl5cVPs4bwiLuOBNTH8jse3G35ZqGW.', '', '', '2018-10-26 05:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `cover` varchar(400) DEFAULT NULL,
  `rating` float NOT NULL,
  `voters` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `title`, `author`, `description`, `cover`, `rating`, `voters`) VALUES
(1, 'Sit veniam distinctio similique quisquam.', 'Kelley Treutel', 'England the nearer is to give the hedgehog had unrolled itself, and was in the distance, sitting sad and lonely on a summer day: The Knave shook his head mournfully. \'Not I!\' said the Cat remarked..', '/tugasbesar1_2018/frontend/img_resource/silberchatz.jpg', 0, 0),
(2, 'Fugiat dolor repellat veniam dicta eos ea qui.', 'Emma Runte', 'Cheshire Cat sitting on the breeze that followed them, the melancholy words:-- \'Soo--oop of the bill, \"French, music, AND WASHING--extra.\"\' \'You couldn\'t have wanted it much,\' said Alice; \'I daresay.', '/tugasbesar1_2018/frontend/img_resource/silberchatz.jpg', 0, 0),
(3, 'Ipsam impedit tempore eos qui autem minima.', 'Don Armstrong Sr.', 'YOUR table,\' said Alice; \'living at the Lizard as she went on, \'you throw the--\' \'The lobsters!\' shouted the Queen. \'Can you play croquet?\' The soldiers were always getting up and bawled out, \"He\'s.', '/tugasbesar1_2018/frontend/img_resource/silberchatz.jpg', 0, 0),
(4, 'Quae aut omnis cum inventore quas impedit.', 'Prof. Travon Rodriguez IV', 'Alice, \'as all the arches are gone from this morning,\' said Alice thoughtfully: \'but then--I shouldn\'t be hungry for it, while the rest were quite dry again, the cook tulip-roots instead of onions.\'.', '/tugasbesar1_2018/frontend/img_resource/silberchatz.jpg', 0, 0),
(5, 'Exercitationem ducimus ut aut.', 'Fabiola Corwin', 'Alice went on so long that they could not join the dance? Will you, won\'t you join the dance? Will you, won\'t you join the dance? Will you, won\'t you join the dance. Would not, could not help.', '/tugasbesar1_2018/frontend/img_resource/silberchatz.jpg', 0, 0),
(6, 'Ut et ad quas et blanditiis qui.', 'Madisen Kutch', 'And it\'ll fetch things when you come and join the dance. Will you, won\'t you join the dance?\"\' \'Thank you, it\'s a French mouse, come over with diamonds, and walked two and two, as the March Hare.', '/tugasbesar1_2018/frontend/img_resource/silberchatz.jpg', 0, 0),
(7, 'Aperiam modi rerum sed quae quia.', 'Danial Gleason V', 'Mock Turtle sighed deeply, and began, in a very respectful tone, but frowning and making quite a chorus of voices asked. \'Why, SHE, of course,\' he said in a voice outside, and stopped to listen..', '/tugasbesar1_2018/frontend/img_resource/silberchatz.jpg', 0, 0),
(8, 'Ut repudiandae quibusdam aspernatur quia nostrum molestias.', 'Dr. Jena Runolfsson Sr.', 'As soon as look at me like that!\' He got behind Alice as she went on again:-- \'I didn\'t write it, and kept doubling itself up and walking away. \'You insult me by talking such nonsense!\' \'I didn\'t.', '/tugasbesar1_2018/frontend/img_resource/silberchatz.jpg', 0, 0),
(9, 'Aut suscipit et ut et est nulla ad.', 'Mr. Preston Zulauf', 'They were indeed a queer-looking party that assembled on the floor, as it was perfectly round, she came upon a Gryphon, lying fast asleep in the sun. (IF you don\'t know of any that do,\' Alice said.', '/tugasbesar1_2018/frontend/img_resource/silberchatz.jpg', 0, 0),
(10, 'Dolor neque optio officia facere consectetur totam.', 'Prof. Pietro Wilkinson III', 'I shall be late!\' (when she thought of herself, \'I don\'t like it, yer honour, at all, at all!\' \'Do as I tell you, you coward!\' and at once took up the fan and a piece of rudeness was more than Alice.', '/tugasbesar1_2018/frontend/img_resource/silberchatz.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_order`
--

CREATE TABLE `book_order` (
  `order_id` int(11) NOT NULL,
  `book_id` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_commented` int(1) DEFAULT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_order`
--

INSERT INTO `book_order` (`order_id`, `book_id`, `amount`, `date`, `is_commented`, `username`) VALUES
(109, '-3O-BQAAQBAJ', 1, '2018-11-28 23:01:03', NULL, 'admin'),
(110, '-3O-BQAAQBAJ', 1, '2018-11-28 23:01:03', NULL, 'admin'),
(111, '-3O-BQAAQBAJ', 1, '2018-11-28 23:01:55', NULL, 'admin'),
(113, '-3O-BQAAQBAJ', 1, '2018-11-29 10:52:23', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `book_review`
--

CREATE TABLE `book_review` (
  `review_id` int(11) NOT NULL,
  `book_id` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text,
  `order_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_review`
--

INSERT INTO `book_review` (`review_id`, `book_id`, `username`, `rating`, `comment`, `order_id`) VALUES
(38, '1', 'aditbro', 3, 'alus', 49),
(39, '1', 'aditbro', 5, 'alus juga', 50),
(40, '1', 'aditbro', 3, 'maksa', 51),
(41, '1', 'kayu_balok', 4, 'asal', 55),
(42, '1', 'kayu_balok', 2, 'halo', 56),
(43, '<br /><b>Notice</b>:  Undefined index: book_id in ', 'admin', 4, 'alus euy', 113);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `No` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `hashedPassword` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `card` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`No`, `name`, `username`, `email`, `hashedPassword`, `address`, `phone`, `image_url`, `card`) VALUES
(4, 'Ayrton Cyril', 'admin', '1@gmail.com', '$2y$10$yCnPXbGvfk1GLHJo/3MG3uQnixyjG8m43XawuyN.iiB3v6aeGcOUe', 'asdaa', '0987654567', '/tugasbesar2_2018/Pro-Book/frontend/img_resource/admin1543227382c1 (1).jpg', '123456789123'),
(6, 'Ayrton Cyril', 'arcturus', 'arcturus@gmail.com', '$2y$10$a2vw5VdiYAuqBkIp3klgiOCzIx07OpfQbET8Lu8z9bS2woNnAGwIC', 'asda', '123123123', '/tugasbesar1_2018/frontend/img_resource/arcturus1541037936jamur.png', ''),
(7, 'ellen', 'ellen', 'ellen@gmail.com', '$2y$10$o8ekwTXV13DxKduKfXe/6u7fqYnJZ5qWR2BpbdhwRf90Qf.R1Dol2', 'rumah ellen bagus loh', '0816529372', '/tugasbesar1_2018/frontend/img_resource/default-profile.jpg', ''),
(11, 'Adit BRO', 'aditbro', 'adit@bro.co', '$2y$10$Mf1cBpFzhXR8UN3lcveShuNmo1LurwJTXwwWEi82TFoQXJIofC.Z2', 'sdbcjsdbclzdfhbudhjfzvfzbdvfdzbfxrdfrd', '09877933812', '/tugasbesar1_2018/frontend/img_resource/default-profile.jpg', ''),
(12, 'Kayu kotak', 'kayu_balok', 'kayu_balok@sungai.com', '$2y$10$s0FJ1ZdB/WGL9ci2whTneubxXWgr8mqjpAqy5Nmz0uZ4ovXD.9Go2', 'sungai hitam bandung', '123456789', '/tugasbesar1_2018/frontend/img_resource/kayu_balok1541053667jamur.png', ''),
(13, 'Kayu Lontong', 'kayu_lontong', 'kayu_balok@gmail.com', '$2y$10$Jk4EQebwCm7Z0FcsRce3G.sP0uEO6aL26zRw9qUxmt8VqoAqV962u', 'sungai pink pluto', '123456789', '/tugasbesar1_2018/frontend/img_resource/default-profile.jpg', ''),
(14, 'Ayrton Cyril', 'asd', '231@gmail.com', '$2y$10$DnaKXwVwF.fUi4xM5N9DqezjDxXeqCne3BYBrsz74t9vXVFtGEw5S', 'asdad', '123123123', '/tugasbesar2_2018/Pro-Book/frontend/img_resource/default-profile.jpg', ''),
(15, 'Kayu balok', '123', '123@f.com', '$2y$10$SDq9R6GwASojjgyyWjFo/.XR89BkTXq2P2cu2pfifMOs4OqQPaueu', '123', '123123122', '/tugasbesar2_2018/Pro-Book/frontend/img_resource/default-profile.jpg', ''),
(16, 'Ayrton Cyril', 'adminasd', 'ayrton.cyril@gmail.com', '$2y$10$VaDvPZumJNK3LeItIz45u.jm1369LyTuIXzEN5iepDS72...3e/Bq', 'adasd', '082083012312', '/tugasbesar2_2018/Pro-Book/frontend/img_resource/default-profile.jpg', ''),
(17, 'asd', 'asdasdqw', 'asd@ffd.com', '$2y$10$xOuPbCRiKx8QndYJ3phfcOgmJYzy6ii.fvOK3k.1Ed59vlHm2iSGS', 'dasdasd', '2783172312', '/tugasbesar2_2018/Pro-Book/frontend/img_resource/default-profile.jpg', ''),
(18, '123', '12313', '123@fsdf.com', '$2y$10$OTLzFgS/Z9RhT.MV8WZE5.Y63OJySkE0xoU6C3nZSHtOfsJtHYPpa', 'asdad', '9231233123', '/tugasbesar2_2018/Pro-Book/frontend/img_resource/default-profile.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_order`
--
ALTER TABLE `book_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_review`
--
ALTER TABLE `book_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_order`
--
ALTER TABLE `book_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `book_review`
--
ALTER TABLE `book_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
