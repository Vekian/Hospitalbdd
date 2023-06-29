-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jun 29, 2023 at 11:46 AM
-- Server version: 10.6.12-MariaDB-1:10.6.12+maria~ubu2004-log
-- PHP Version: 8.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalE2N`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `dateHour` datetime NOT NULL,
  `idPatients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `dateHour`, `idPatients`) VALUES
(2, '2023-06-29 01:56:00', 3),
(4, '2023-06-05 15:04:00', 8),
(5, '2023-06-29 15:45:00', 16),
(7, '2023-06-30 08:00:00', 17);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES
(1, 'Gérard', 'Mathieu', '2021-06-26', '0364958572', 'emeric@gmail.com'),
(2, 'Alexandre', 'Formateur', '2023-06-26', '0631092356', 'nemfefer@gmail.com'),
(3, 'Sebastien', 'Patrick', '2023-06-26', '0364958572', 'jeami@gmail.com'),
(4, 'Emeric', 'sauter', '2015-06-26', '0763584923', 'emeric@gmail.com'),
(6, 'Pierre', 'Paul', '2013-06-26', '0631092356', 'jeami@gmail.com'),
(8, 'Jeanpierre', 'Foucault', '1968-10-09', '0635263728', 'jeami@gmail.com'),
(9, 'Pata', 'Sproutch', '1990-06-26', '0364958572', 'nemfefer@gmail.com'),
(10, 'Yves', 'Longchamp', '2023-06-26', '0631092356', 'jeami@gmail.com'),
(11, 'Cristophe', 'Mae', '2023-06-26', '0635263728', 'nemare@gmail.com'),
(12, 'Sophie', 'Detfc', '2023-06-26', '0631092356', 'pierre@gmail.com'),
(13, 'Didi', 'Ddede', '2023-06-26', '0632666237', 'fezfezfz@gmail.com'),
(14, 'Fany', 'Michael', '2023-06-26', '0635263728', 'fezfezfz@gmail.com'),
(16, 'Sarkozy', 'Nicolas', '1980-06-26', '0631092356', 'jeami@gmail.com'),
(17, 'Mélanie', 'Dumas', '1996-04-14', '0632666237', 'mathieu23@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_appointments_id_patients` (`idPatients`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_appointments_id_patients` FOREIGN KEY (`idPatients`) REFERENCES `patients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
