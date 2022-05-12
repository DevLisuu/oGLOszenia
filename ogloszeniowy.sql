-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 09:08 AM
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
  `tytul` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `tresc` varchar(1024) COLLATE utf8_polish_ci DEFAULT NULL,
  `data_dodania` date DEFAULT current_timestamp(),
  `id_autora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `ogloszenia`
--

INSERT INTO `ogloszenia` (`id`, `tytul`, `tresc`, `data_dodania`, `id_autora`) VALUES
(2, 'To jest pierwsze ogłoszenie na tej stronie!', 'Witam i pozdrawiam', '2022-05-11', 1),
(3, 'Sprzedam kod javascript po taniości', 'Witam sprzedaje kod java za 10zł sztuka', '2022-05-12', 1),
(4, '/r/BrawlStars #announcements', 'Maintenance and Optional update inbound!?\r\n\r\n✅Fixed issues with Power Match/Power League filtering and scrolling\r\n✅Fixed an issue where the spray VFX would appear on your own brawler when someone else in range would use a spray\r\n✅Improved performance on low-end devices\r\n', '2022-05-12', 2),
(5, 'To mój pierwszy post', 'Dzień dobry', '2022-05-12', 3),
(6, 'To już drugi post dzisiaj', 'Chciałbym tutaj poruszyć temat\r\nale nie wiem jaki\r\nczy ma ktoś jakieś sugestie\r\nprosze przeszyłać na mail lisusamogus@example.com', '2022-05-12', 3);

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
(1, 'bakayoko2115', '0987654321', 9987347, '2022-05-12'),
(2, 'nmasteroz', '1234567890', 368233, '2022-05-12'),
(3, 'Lisusamogus', '1234567890', 9956863, '2022-05-12');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
