-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2019 at 11:45 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `Collectors`
--

CREATE TABLE `Collectors` (
  `Registration` int(99) NOT NULL,
  `FullName` varchar(60) NOT NULL,
  `Birthday` date NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Collectors`
--

INSERT INTO `Collectors` (`Registration`, `FullName`, `Birthday`, `Phone`, `Email`, `Cpf`) VALUES
(1, 'Rayssa Ayla da Paz', '2000-06-26', '83986898919', 'rayssaay@jerasistemas.com.br', '11284495876'),
(2, 'AndrÃ© Carlos Eduardo', '1957-10-21', '31985341216', 'henrysales@pib.com.br', '48763624168'),
(3, 'Carlos Eduardo Augusto', '1982-12-07', '2137719410', 'porto@salvadorlogistica.com', '60507423321'),
(4, 'Bryan Yuri Melo', '1960-01-13', '6939111653', 'bbryanyurimelo@alcoa.com.br', '92133668330'),
(5, 'Yago Caleb Rezende', '1995-09-14', '14991701931', 'calebrezende@eletrovip.com', '71686549180'),
(6, 'Marlene Eduarda Barbosa', '1949-09-22', '8226422726', 'barbosa@grupoannaprado.com.br', '65308852936'),
(7, 'Stella Alice Alves', '1956-06-07', '9537249059', 'stellaalicealves@lvnonline.com', '83582083675'),
(8, 'Lifus Deviced', '2000-08-13', '988776655', 'lifusd@hotmail.com', '99988877766');

-- --------------------------------------------------------

--
-- Table structure for table `GroupCollectors`
--

CREATE TABLE `GroupCollectors` (
  `Id` int(99) NOT NULL,
  `GroupId` int(99) NOT NULL,
  `CollectorRegistration` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `GroupCollectors`
--

INSERT INTO `GroupCollectors` (`Id`, `GroupId`, `CollectorRegistration`) VALUES
(19, 1, 1),
(20, 1, 3),
(21, 1, 5),
(22, 2, 2),
(23, 2, 4),
(24, 2, 6),
(25, 3, 1),
(26, 3, 2),
(27, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Groups`
--

CREATE TABLE `Groups` (
  `Id` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `CreatedAt` date NOT NULL DEFAULT current_timestamp(),
  `AdminRegistration` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Groups`
--

INSERT INTO `Groups` (`Id`, `Name`, `Description`, `CreatedAt`, `AdminRegistration`) VALUES
(1, 'Quadrinhos', 'Para os colecionadores de quadrinhos raros', '2019-12-15', 1),
(2, 'Cartas', 'O grupo com as melhores cartas de diversors jogos', '2019-12-15', 4),
(3, 'Figuras de Ação', 'Se chama de boneco é melhor nem entrar no grupo', '2019-12-15', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Collectors`
--
ALTER TABLE `Collectors`
  ADD PRIMARY KEY (`Registration`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Cpf` (`Cpf`);

--
-- Indexes for table `GroupCollectors`
--
ALTER TABLE `GroupCollectors`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `GroupId` (`GroupId`),
  ADD KEY `CollectorRegistration` (`CollectorRegistration`);

--
-- Indexes for table `Groups`
--
ALTER TABLE `Groups`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `AdminRegistration` (`AdminRegistration`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Collectors`
--
ALTER TABLE `Collectors`
  MODIFY `Registration` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `GroupCollectors`
--
ALTER TABLE `GroupCollectors`
  MODIFY `Id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `Groups`
--
ALTER TABLE `Groups`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `GroupCollectors`
--
ALTER TABLE `GroupCollectors`
  ADD CONSTRAINT `GroupCollectors_ibfk_1` FOREIGN KEY (`GroupId`) REFERENCES `Groups` (`Id`),
  ADD CONSTRAINT `GroupCollectors_ibfk_2` FOREIGN KEY (`CollectorRegistration`) REFERENCES `Collectors` (`Registration`);

--
-- Constraints for table `Groups`
--
ALTER TABLE `Groups`
  ADD CONSTRAINT `Groups_ibfk_1` FOREIGN KEY (`AdminRegistration`) REFERENCES `Collectors` (`Registration`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
