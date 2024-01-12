-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql203.epizy.com
-- Generation Time: May 19, 2023 at 09:18 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_34217970_activity`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(512) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`) VALUES
(7, 'kyle', '87cd084d190e436f147322b90e7384f6a8e0676c99d21ef519ea718e51d45f9c', 'guapzpito@gmail.com'),
(20, 'Norwin', '39d1da1f4f9fda75ac2c0b29b76c2149fe57256e3240ce35e1e74d6b6d898222', 'guapzpito2@gmail.com'),
(21, 'Marc', '39d1da1f4f9fda75ac2c0b29b76c2149fe57256e3240ce35e1e74d6b6d898222', 'marcjosephelementomalinao@gmail.com'),
(22, 'Kyle3', '39d1da1f4f9fda75ac2c0b29b76c2149fe57256e3240ce35e1e74d6b6d898222', 'guapz1974@gmail.com'),
(23, 'Stupid ', '4c8d06c479acb968ad59ccde4f6c92c7ee788c23f2d90e03b6d1a7c6266dbd25', 'wakoygmail@gmail.com'),
(24, 'gay', 'ba1cd1089548ae062e72c3f04906ce27347ac5cdfdaab4068b4f11d13a296d3c', 'gaytard@gmail.com'),
(25, 'geraldcanama', '4153c7a0e276bbe6ba3fd8513367ac1027bfb915b929689fa3f809cb42b7c51f', 'gervercan2019@gmail.com'),
(26, 'W', '39d1da1f4f9fda75ac2c0b29b76c2149fe57256e3240ce35e1e74d6b6d898222', 'ZackMaDeek@gmail.com'),
(27, '12', '39d1da1f4f9fda75ac2c0b29b76c2149fe57256e3240ce35e1e74d6b6d898222', '12@gmail.com'),
(28, 'ihappy', '87cd084d190e436f147322b90e7384f6a8e0676c99d21ef519ea718e51d45f9c', 'norwinkyle10.gmail.com'),
(29, 'Kyle123', '39d1da1f4f9fda75ac2c0b29b76c2149fe57256e3240ce35e1e74d6b6d898222', 'kylemamolo10@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
