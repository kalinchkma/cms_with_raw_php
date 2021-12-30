-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 05:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(6) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(10, 'universe'),
(11, 'Hawking'),
(19, 'Java'),
(22, 'oop'),
(23, 'Hunter'),
(24, 'Girl'),
(25, 'HTML5');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(19, 3, 'Syntiya', 'syntiya@hh.com', 'qwewqe', 'unapproved', '2020-11-29'),
(21, 3, 'Hunter', 'hunter@gmail.com', 'wqewqewqewqewqe', 'approved', '2020-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(3) NOT NULL,
  `post_category_id` varchar(225) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_autor` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_category_id`, `post_title`, `post_autor`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(3, 'universe', 'Anime Girl', 'Black Hunter', '2020-11-26', 'anime-girl-sweater-hoods-4k-p2-1920x1080.jpg', 'Japan is the great for the anime ', 'anime, girl, japan', 0, 'published', 19),
(71, 'Girl', 'Game', 'Hunter collins', '2020-12-01', 'attack-on-titan-art-4k-zp-1366x768.jpg', 'This is the main', 'anime, girl, japan', 0, 'published', 1),
(72, 'Girl', 'Hot pot', 'Collins', '2020-12-01', 'anime-girl-headphones-looking-away-4k-ls-1366x768.jpg', 'This is an anime girl.....................', 'anime, girl, japan', 0, 'published', 0),
(73, 'Girl', 'Japan', 'Hunter', '2020-12-01', 'journey-with-little-friend-4k-9x-1920x1080.jpg', 'The japanis anime are great and ...................', 'anime, girl, japan', 0, 'published', 0),
(74, 'Java', 'Game', 'Collins', '2020-12-01', 'guilt-of-a-hero-1920x1080.jpg', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'universe, nature, infiniti', 0, 'published', 0),
(75, 'Girl', 'Anime Girl', 'Collins', '2020-12-01', 'girl_winter_snowflake_shop_city_light_cold_9869_1920x1080.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'published', 0),
(76, 'universe', 'The universe is expending', 'Collins', '2020-12-01', 'neon-genesis-evangelion-redhead-twintails-4k-9o-1920x1080.jpg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'published', 0),
(77, 'universe', 'The universe is expending', 'Collins', '2020-12-01', 'colosseum-fantasy-1920x1080.jpg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'published', 0),
(78, 'universe', 'Anime Girl', 'Collins', '2020-12-01', 'anime-girl-torn-clothes-cat-ears-do-1920x1080.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'published', 0),
(79, 'universe', 'Game', 'Collins', '2020-12-01', 'Capture.PNG', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'universe, nature, infiniti', 0, 'published', 0),
(80, 'universe', 'Japan', 'Hunter', '2020-12-01', 'ino-r7-1920x1080.jpg', 'The japanis anime are great and ...................', 'anime, girl, japan', 0, 'published', 0),
(81, 'universe', 'Hot pot', 'Collins', '2020-12-01', 'red-planet-space-art-4k-ks-1920x1080.jpg', 'This is an anime girl.....................', 'anime, girl, japan', 0, 'draft', 0),
(84, 'universe', 'Game', 'Collins', '2020-12-01', 'ocean-3605547_1920.jpg', '            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'draft', 0),
(85, 'oop', 'Game', 'Collins', '2020-12-02', 'Capture.PNG', 'Hunter................', 'anime, girl, japan', 0, 'published', 0),
(86, 'oop', 'Game', 'Collins', '2020-12-02', 'Capture.PNG', 'Hunter................', 'anime, girl, japan', 0, 'published', 0),
(87, 'universe', 'Game', 'Collins', '2020-12-02', 'ocean-3605547_1920.jpg', '            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'draft', 0),
(88, 'universe', 'Game', 'Collins', '2020-12-02', 'ocean-3605547_1920.jpg', '            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'draft', 0),
(89, 'oop', 'Game', 'Collins', '2020-12-02', 'Capture.PNG', 'Hunter................', 'anime, girl, japan', 0, 'published', 0),
(90, 'oop', 'Game', 'Collins', '2020-12-02', 'Capture.PNG', 'Hunter................', 'anime, girl, japan', 0, 'published', 0),
(91, 'universe', 'Game', 'Collins', '2020-12-02', 'ocean-3605547_1920.jpg', '            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'draft', 0),
(92, 'universe', 'Hot pot', 'Collins', '2020-12-02', 'red-planet-space-art-4k-ks-1920x1080.jpg', 'This is an anime girl.....................', 'anime, girl, japan', 0, 'draft', 0),
(93, 'universe', 'Japan', 'Hunter', '2020-12-02', 'ino-r7-1920x1080.jpg', 'The japanis anime are great and ...................', 'anime, girl, japan', 0, 'published', 0),
(94, 'universe', 'Game', 'Collins', '2020-12-02', 'Capture.PNG', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'universe, nature, infiniti', 0, 'published', 0),
(95, 'universe', 'Anime Girl', 'Collins', '2020-12-02', 'anime-girl-torn-clothes-cat-ears-do-1920x1080.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'published', 0),
(96, 'universe', 'The universe is expending', 'Collins', '2020-12-02', 'colosseum-fantasy-1920x1080.jpg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'published', 0),
(97, 'universe', 'The universe is expending', 'Collins', '2020-12-02', 'neon-genesis-evangelion-redhead-twintails-4k-9o-1920x1080.jpg', ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'draft', 0),
(98, 'Girl', 'Anime Girl', 'Collins', '2020-12-02', 'girl_winter_snowflake_shop_city_light_cold_9869_1920x1080.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'anime, girl, japan', 0, 'draft', 0),
(99, 'Java', 'Game', 'Collins', '2020-12-02', 'guilt-of-a-hero-1920x1080.jpg', '  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam expedita reprehenderit in optio aliquam labore doloribus, quisquam adipisci mollitia necessitatibus harum soluta similique eaque perferendis accusamus ea veniam repellendus voluptatum cupiditate architecto quam est amet. Impedit aut labore, earum quia tenetur soluta mollitia blanditiis quibusdam iure obcaecati repellat facere, molestias adipisci nemo voluptatem minima placeat eos reiciendis. Repudiandae fugit magni id deleniti, quisquam mollitia porro voluptate, eum, dolor itaque dolorem numquam dicta impedit asperiores tempore voluptates animi earum eos et eius iusto vitae dignissimos doloremque. Maiores perferendis unde quia aliquam itaque necessitatibus suscipit consequuntur rerum inventore quasi nulla, fuga assumenda!', 'universe, nature, infiniti', 0, 'draft', 0),
(100, 'Girl', 'Japan', 'Hunter', '2020-12-02', 'journey-with-little-friend-4k-9x-1920x1080.jpg', 'The japanis anime are great and ...................', 'anime, girl, japan', 0, 'draft', 0),
(101, 'Girl', 'Hot pot', 'Collins', '2020-12-02', 'anime-girl-headphones-looking-away-4k-ls-1366x768.jpg', 'This is an anime girl.....................', 'anime, girl, japan', 0, 'draft', 0),
(102, 'Girl', 'Game', 'Hunter collins', '2020-12-02', 'attack-on-titan-art-4k-zp-1366x768.jpg', 'This is the main', 'anime, girl, japan', 0, 'draft', 0),
(103, 'universe', 'Anime Girl', 'Black Hunter', '2020-12-02', 'anime-girl-sweater-hoods-4k-p2-1920x1080.jpg', 'Japan is the great for the anime ', 'anime, girl, japan', 0, 'draft', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$theuniverseisgreat1021'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt`) VALUES
(15, 'hunter', '$2y$12$X5.SHLwQuhGw9PT/V.0jhuY4c.EotDkVjtWLjXyTrrvSNoy9x4o9q', 'Uzumaki', 'hunter', 'hunter@gmail.com', '', 'admin', '$2y$10$theuniverseisgreat1021'),
(17, 'sarada', '$2y$12$/50SEnEuqGRA48Opq46Nb.dM/YRUwnv0SAHIgcQzLNVyfaFUrrrl.', 'Sarada', 'Uchiha', 'sarada@yahoo.com', '', 'admin', '$2y$10$theuniverseisgreat1021'),
(18, 'boruto', '$2y$11$NXgM5IMvxIVILk0ntu8m3uG67ySGM5xJANRnGYVgfDWVsrgtQpl4W', '', '', 'boruto@gmail.com', '', 'subscriber', '$2y$10$theuniverseisgreat1021'),
(19, 'zukerbag', '$2y$11$5yGGmbE6JShPFeq6m7MTh.TF9fQdCt4fLoJb3kEbP5V1zRp3aiYNS', '', '', 'naruto@gmail.com', '', 'subscriber', '$2y$10$theuniverseisgreat1021'),
(21, 'naruto', '$2y$11$gr94fkAFOMRa6CM.hImh0.PpppVG2nnLU.OaAHgyyezMutFsksmHe', '', '', 'chakma.kalin1021177@gmail.com', '', 'subscriber', '$2y$10$theuniverseisgreat1021'),
(22, 'syntiya', '$2y$11$K9hqI0xD0V1VjjjmcnH7leAexCL5Pht1dKzNmwx99sw9hyofJTvTu', '', '', 'syntiya@gamil.com', '', 'subscriber', '$2y$10$theuniverseisgreat1021');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(7, 'vot66dqv0mmrglni1pbabjr7uh', 1606653108),
(8, 'dk798f70e7lfj550retloti8pq', 1606670773),
(9, '8hjtaotsmdiup07ud8q94u2ci0', 1606670769),
(10, 'qdb736qu76mhskplcb230rai7s', 1606653789),
(11, 'i25opss2ghacl5tetkr78c4hjg', 1606716986),
(12, 'nv40ko3qu56nosmpp4ptj4u1g6', 1606844201),
(13, 'h80921jgho4i37mp9oanjkd07g', 1606925423);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
