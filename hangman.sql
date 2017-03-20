-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hangman`
--

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `total_games` int(11) NOT NULL,
  `won_games` int(11) NOT NULL,
  `date_deleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`email`, `password`, `birthdate`, `gender`, `total_games`, `won_games`, `date_deleted`) VALUES
('adasdaggg@abv.bg', 'ss', '2017-03-22', 'M', 21, 6, 0),
('ajijijsen@abv.bg', '2828', '2017-03-18', 'M', 0, 0, 0),
('asasdasdasdasdasdasden@abv.bg', '1234', '2017-03-14', 'M', 0, 0, NULL),
('asekkokon@abv.bg', '5858', '2017-02-01', 'M', 0, 0, 0),
('asen@abv.bg', '123', '2017-03-15', 'M', 37, 16, 0),
('test1@abv.bg', '123', '2017-03-01', 'M', 12, 1, NULL),
('test@abv.bg', '123', '2017-03-01', 'M', 3, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
