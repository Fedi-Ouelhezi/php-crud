-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 10:01 PM
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
-- Database: `fedi`
--

-- --------------------------------------------------------

--
-- Table structure for table `employé`
--

CREATE TABLE `employé` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employé`
--

INSERT INTO `employé` (`id`, `nom`, `prenom`, `email`, `sexe`) VALUES
(42, 'test', 'qsd', 'qsdqsd@gmai.fr', 'female'),
(43, 'last', 'tttttttttttttttt', 'qsdq54sd@gmai.com', 'male'),
(44, 'Imed', 'bbbb', 'ssstaqqqlker16@gmail.com', 'male'),
(45, 'last', 'bbbbbbbbbbbbbbbbbb', 'parado8x-89@hotmail.fr', 'male'),
(46, 'fedi', 'bbbb', 'welhazimaha004@gmail.com', 'female'),
(47, 'Fedi', 'aaaaaa', 'welhezifedi@gmail.com654', 'male'),
(48, 'Fedi', 'test', 'wqqqqqelhezifedi@gmail.com', 'male'),
(49, 'Maha', 'aaaaaa', 'ssstqqqzezezealker16@gmail.com', 'male'),
(50, 'test', 'qsd', 'paradox-89@hotazeazeazeamail.fr', 'female'),
(52, 'fedi', 'bbbbbbbbbbbbbbbbbb', 'paradox-89@hotmail.fr', 'male'),
(53, 'fedi', 'qsd', 'paradoqsdqsdx-89@hotmail.fr', 'male'),
(54, 'fedi', 'aaaaaa', 'paraaaaaadox-89@hotmail.fr', 'male'),
(55, 'fedi', 'users', 'test@qsldi.fr', 'female'),
(56, 'fedi', 'test', 'qsldkqhsldkzahoihe@gmaiqsdqsd.fffrr', 'male'),
(57, 'fedi', 'qsdqsd', 'ssaaaaaaaaaaaastalker16@gmail.com', 'male'),
(58, 'fedi', 'aaaaaa', 'azeeeeeeeee@qslkdjqsd.fer', 'female'),
(59, 'fedi', 'bbbb', 'tadqsdqsdqsqsdest@gmail.com', 'male'),
(60, 'fedi', 'bbbb', 'paradox-89@hotmazeazeaail.fr', 'female'),
(61, 'fedi', 'qsd', 'paradox-azeazeazeaze89@hotmail.fr', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `email`) VALUES
(23, 'sdfsdfsfsdf@0'),
(24, 'uiouyoiuy@h'),
(25, 'ssstalker16@gmail.com'),
(26, 'ssstalker16@gmail.com'),
(27, 'paradox-89@hotmail.fr'),
(28, 'ssstalker16@gmail.com'),
(29, 'paradox-89@hotmail.fr');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `pass`) VALUES
(1, 'fedi', '611e4badd1153b2af84e4df3fc69a70f'),
(15, 'fedi', '81dc9bdb52d04dc20036dbd8313ed055'),
(18, 'Imed', '62933a2951ef01f4eafd9bdf4d3cd2f0'),
(19, 'Imed', '62933a2951ef01f4eafd9bdf4d3cd2f0'),
(25, 'maha', '06e3e081e1aa695794835cdd6a62ea1e'),
(29, 'Mondher', '202cb962ac59075b964b07152d234b70'),
(30, 'welhazimaha', 'dc6ddd01bb68b0f68afd02e53091118d'),
(31, 'mahahhh', 'dc6ddd01bb68b0f68afd02e53091118d'),
(32, 'mahalll', '92cd9ac76751265aca35ac63f6465275'),
(33, 'matata', '4297f44b13955235245b2497399d7a93'),
(34, '5555', '202cb962ac59075b964b07152d234b70'),
(35, 'qsdkljgcqshcjlkh', 'c4ca4238a0b923820dcc509a6f75849b'),
(36, 'sign', '202cb962ac59075b964b07152d234b70'),
(37, 'lqksjd', '202cb962ac59075b964b07152d234b70'),
(38, 'aaaaaa', 'fbade9e36a3f36d3d676c1b808451dd7'),
(39, '1', '900150983cd24fb0d6963f7d28e17f72'),
(40, 'test', '202cb962ac59075b964b07152d234b70'),
(41, 'fedi00', '900150983cd24fb0d6963f7d28e17f72'),
(42, 'azea', '0cc175b9c0f1b6a831c399e269772661');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employé`
--
ALTER TABLE `employé`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employé`
--
ALTER TABLE `employé`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
