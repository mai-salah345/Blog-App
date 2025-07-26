-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2025 at 02:57 PM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(2, 'Wild Life', 'this is for wild life category'),
(6, 'uncategorized', 'this is dkjglesdp\r\n'),
(7, 'food', 'this is for food'),
(9, 'Art', 'this is art category'),
(10, 'music', 'this is music category'),
(11, 'science &amp; technology', 'gcfuihujli;kol');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(10, 'jojo', 'y sentences have a tendency to keep going when I write them onscreen. This goes for concentrated writing as well as correspondence. (Twain probably believed that correspondence, in an ideal world, also demands concentration. But he never used email.) Last week I caught myself packing four conjunctions into a three-line sentence in an email. That&rsquo;s inexcusable. Since then, I have tried to eschew conjunctions whenever possible. Gone are the commas, the and&rsquo;s, but&rsquo;s, and so&rsquo;s; in are staccato declaratives. Bette\r\nbeen noticing how my sentences have a tendency to keep going when I write them onscreen. This goes for concentrated writing as well as correspondence. (Twain probably believed that correspondence, in an ideal world, also demands concentration. But he never used email.) Last week I caught myself packing four conjunctions into a three-line sentence in an email. That&rsquo;s inexcusable. Since then, I have tried to eschew conjunctions whenever possible. Gone are the commas, the and&rsquo;s, but&rsquo;s, and so&rsquo;s; in are staccato declaratives. Better to read like bad Hemingway than bad Faulkner.\r\n\r\nLength&ndash;as we all know, and for lack of a more original or effective way of saying it&ndash;matters. But (ahem), it&rsquo;s also a matter of how you use it. Style and length are technically two different things.', '1753316508blog32.jpg', '2025-07-24 00:21:48', 6, 15, 0),
(12, 'post', 'mostly my own, too–Mark Twain’s observation undoubtedly applies: “I didn’t have time to write a short letter, so I wrote a long one instead.” The principle holds across genres, in letters, reporting, and other writing. It’s harder to be concise than to blather. (Full disclosure, this blog post will clock in at a blather-esque 803 words.) Good writing is boiled down, not baked full of air like a souffl??. No matter how yummy souffl??s may be. Which they are. Yummy like a Grisham novel.&#13;&#10;&#13;&#10;Lately, I’ve been noticing how my sentences have a tendency to keep going when I write them onscreen. This goes for concentrated writing as well as correspondence. (Twain probably believed that correspondence, in an ideal world, also demands concentration. But he never used email.) Last week I caught myself packing four conjunctions into a three-line sentence in an email. That’s inexcusable. Since then, I have tried to eschew conjunctions whenever possible. Gone are the commas, the and’s, but’s, and so’s; in are staccato declaratives. Better to read like bad Hemingway than bad Faulkner.&#13;&#10;&#13;&#10;Length–as we all know, and for lack of a more original or effective way of saying it–matters. But (ahem), it’s also a matter of how you use it. Style and length are technically two different things.&#13;&#10;&#13;&#10;Try putting some prose onscreen, though, and they mix themselves up pretty quickly. This has much to do with the time constraints we claim to feel in the digital age. We don’t have time to compose letters and post them anymore–much less pay postage, what with all the banks kinda-sorta losing our money these days–so we blast a few emails. We don’t have time to talk, so we text. We don’t have time to text to specific people, so we update our Facebook status. We don’t have time to write essays, so we blog.&#13;&#10;&#13;&#10;I’m less interested by the superficial reduction of words–i.e. the always charming imho or c u l8r–than the genres in which those communications occur: blogs, texts, tweets, emails. All these interstitial communiques, do they really reflect super brevity that would make Twain proud? Or do they just reflect poorly stylized writing that desperately seeks a clearer form?', '1753478944blog5.jpg', '2025-07-25 21:29:04', 9, 1, 0),
(13, 'jkl;csd', 'Lately, I&rsquo;ve been noticing how my sentences have a tendency to keep going when I write them onscreen. This goes for concentrated writing as well as correspondence. (Twain probably believed that correspondence, in an ideal world, also demands concentration. But he never used email.) Last week I caught myself packing four conjunctions into a three-line sentence in an email. That&rsquo;s inexcusable. Since then, I have tried to eschew conjunctions whenever possible. Gone are the commas, the and&rsquo;s, but&rsquo;s, and so&rsquo;s; in are staccato declaratives. Better to read like bad Hemingway than bad Faulkner.\r\n\r\nLength&ndash;as we all know, and for lack of a more original or effective way of saying it&ndash;matters. But (ahem), it&rsquo;s also a matter of how you use it. Style and length are technically two different things.\r\n\r\nTry putting some prose onscreen, though, and they mix themselves up pretty quickly. This has much to do with the time constraints we claim to feel in the digital age. We don&rsquo;t have time to compose letters and post them anymore&ndash;much less pay postage, what with all the banks kinda-sorta losing our money these days&ndash;so we blast a few emails. We don&rsquo;t have time to talk, so we text. We don&rsquo;t have time to text to specific people, so we update our Facebook status. We don&rsquo;t have time to write essays, so we blog.\r\n\r\nI&rsquo;m less interested by the superficial reduction of words&ndash;i.e. the always charming imho or c u l8r&ndash;than the genres in which those communications occur: blogs, texts, tweets, emails. All these interstitial communiques, do they really reflect super', '1753482972blog15.jpg', '2025-07-25 22:36:12', 11, 1, 0),
(14, 'strange', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1753484794blog3.jpg', '2025-07-25 23:06:34', 2, 17, 0),
(15, 'yummy😋', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '1753484877blog13.jpg', '2025-07-25 23:07:57', 7, 17, 0),
(16, 'my new friend😂', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '1753485529-blog16.jpg', '2025-07-25 23:18:07', 11, 18, 1),
(17, 'tfyguh', 'tyuiokpl[fyguih ftyguhijlk', '1753487135blog18.jpg', '2025-07-25 23:45:35', 9, 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(1, 'mai', 'salah', 'memo', 'maisalah3042005@gmail.com', '$2y$10$iaDK65hL8Ul3OR4Z3l8p5u3giQ9bDhHYi.dy8RTfUxA2J8Z2.PP7C', '1753226709image (1).png', 1),
(10, 'ola', 'salah', 'ola', 'ola@gmail.com', '$2y$10$Qd9zTDQwc6QLtOTuB8wAveesxe1d6yvl/U2pquFrCQkOZHKoBDrx6', '1753281827avatar1.jpg', 0),
(11, 'ali', 'ahmed', 'ali', 'ali@gmail.com', '$2y$10$iw3.g6f26LJAKmfoD5LcbeVmcnyAa1Tq0UZY2NwKoSxVgE0osRc2O', '1753313621avatar11.jpg', 0),
(15, 'joe', 'do', 'joe', 'joe@gmail.com', '$2y$10$TRWyys7l88yvHCB1cyQVMO8lmp/ipXUphRutWDHaJeiaHgXc334PC', '1753316431avatar8.jpg', 0),
(16, 'mai', 'salah', 'momo', 'mai@gmail.com', '$2y$10$y4zgIM65x2LQqgtrt4R74O/vEMfDqYq.cX0tp.5EAbBjW4c0BBvEa', '1753319227avatar5.jpg', 1),
(17, 'Mai', 'Salah', 'mai', 'maisalah@gmail.com', '$2y$10$ci3bIWLJfIVS0IHwRzOPJe6RtCistjhZykI6DrUWoPfcq/Uy.GcJ2', '1753484693avatar12.jpg', 1),
(18, 'ali', 'ahmed', 'lol', 'aliahmed@gmail.com', '$2y$10$BYCkgEJ6b90aLe7.m4SoLO.m4YUVBNy/2u25j204ZETfuwNoZ392i', '1753485362avatar15.jpg', 0),
(21, 'mai', 'salah', 'mm', 'm@gmail.com', '$2y$10$M3wZTKRWr/qhHZNFUGgsoeTCcRcK1l.hlqr4dQRwItKGhzko/3VSO', '1753487101avatar7.jpg', 0),
(22, 'mai', 'salah', 'mmm', 'mmm@gmail.com', '$2y$10$.WtOx9H8014CvRBDUnqXiuykIDGtGGhNURYUCoXOjeXzFLHXpfIhi', '1753492233avatar2.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
