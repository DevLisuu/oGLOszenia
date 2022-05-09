-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 01:36 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ogloszeniowy`
--

-- --------------------------------------------------------

--
-- Table structure for table `ogloszenia`
--

CREATE TABLE `ogloszenia` (
  `id` int(11) NOT NULL,
  `tytul` varchar(64) COLLATE utf8_polish_ci DEFAULT NULL,
  `tresc` varchar(1024) COLLATE utf8_polish_ci DEFAULT NULL,
  `data_dodania` date DEFAULT current_timestamp(),
  `id_autora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `ogloszenia`
--

INSERT INTO `ogloszenia` (`id`, `tytul`, `tresc`, `data_dodania`, `id_autora`) VALUES
(1, 'Testowe Ogloszenie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quis aliquet sem. Pellentesque vehicula, ex a pulvinar dignissim, erat sapien fringilla sem, sit amet interdum justo neque ac felis. Cras.', '2022-04-27', 1),
(2, 'Drugie Testowe Ogloszenie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam quis aliquet sem..', '2022-04-27', 3),
(3, 'Dlugie Testowe Ogloszenie', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ante nulla, fermentum nec ante in, feugiat accumsan turpis. Curabitur porta nulla vitae cursus egestas. Sed sapien odio, consectetur ut nisi et, aliquet rutrum arcu. Sed in ipsum ut nibh accumsan molestie nec at justo. In pulvinar lectus commodo cursus efficitur. Proin maximus efficitur nisi sit amet mollis. Integer condimentum blandit justo, non varius odio maximus sit amet. Sed dictum, nunc nec finibus rhoncus, nulla felis egestas turpis, id imperdiet neque nunc sed elit. Aliquam id ultrices velit. Ut eu ultrices purus. Praesent vehicula magna eget mauris molestie elementum at et risus. Quisque faucibus pellentesque mauris, quis auctor massa euismod vitae.\r\n\r\nProin sem sem, viverra et ornare eget, bibendum eget nulla. Curabitur dui nunc, venenatis hendrerit varius sit amet, semper sit amet massa. Aenean facilisis quam nec eleifend elementum. Morbi nulla ipsum, pulvinar nec purus ut, porta tempor ipsum. Duis ex erat tincidunt.', '2022-04-27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `susers`
--

CREATE TABLE `susers` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_polish_ci NOT NULL,
  `token` int(11) NOT NULL,
  `data_utworzenia` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `susers`
--

INSERT INTO `susers` (`id`, `username`, `pass`, `token`, `data_utworzenia`) VALUES
(1, 'admin2115', '0987654321', 3406185, '2022-05-09'),
(2, 'kacper2115', '1234567890', 7854980, '2022-05-09'),
(3, 'admin12345', '0987654321', 9795273, '2022-05-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_autora` (`id_autora`);

--
-- Indexes for table `susers`
--
ALTER TABLE `susers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ogloszenia`
--
ALTER TABLE `ogloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `susers`
--
ALTER TABLE `susers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD CONSTRAINT `ogloszenia_ibfk_1` FOREIGN KEY (`id_autora`) REFERENCES `susers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
