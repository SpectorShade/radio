-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql306.byetcluster.com
-- Generation Time: Feb 25, 2025 at 10:45 PM
-- Server version: 10.6.19-MariaDB
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
-- Database: `if0_38238326_radio`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabina`
--

CREATE TABLE `cabina` (
  `cabinaID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Locacion` varchar(100) DEFAULT NULL,
  `Capacidad` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cancion`
--

CREATE TABLE `cancion` (
  `cancionID` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Artista` varchar(100) NOT NULL,
  `Album` varchar(100) DEFAULT NULL,
  `ReleaseYear` year(4) NOT NULL,
  `GeneroID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frecuencia`
--

CREATE TABLE `frecuencia` (
  `FrecuenciaID` int(11) NOT NULL,
  `onda` varchar(10) NOT NULL,
  `valor` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genero`
--

CREATE TABLE `genero` (
  `GeneroID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `genero`
--

INSERT INTO `genero` (`GeneroID`, `Nombre`, `Descripcion`) VALUES
(1, 'Death Metal', 'Brutal');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `PlaylistID` int(11) NOT NULL,
  `ProgramaID` int(11) NOT NULL,
  `CancionID` int(11) NOT NULL,
  `Posicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programas`
--

CREATE TABLE `programas` (
  `ProgramaID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `AirTime` time NOT NULL,
  `DuracionMinutos` int(10) UNSIGNED NOT NULL,
  `FrecuenciaID` int(11) DEFAULT NULL,
  `HostID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `radio_host`
--

CREATE TABLE `radio_host` (
  `HostID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Alias` varchar(50) DEFAULT NULL,
  `Experiencia` int(10) UNSIGNED DEFAULT NULL,
  `cabinaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabina`
--
ALTER TABLE `cabina`
  ADD PRIMARY KEY (`cabinaID`);

--
-- Indexes for table `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`cancionID`),
  ADD KEY `GeneroID` (`GeneroID`);

--
-- Indexes for table `frecuencia`
--
ALTER TABLE `frecuencia`
  ADD PRIMARY KEY (`FrecuenciaID`),
  ADD UNIQUE KEY `valor` (`valor`);

--
-- Indexes for table `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`GeneroID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`PlaylistID`),
  ADD KEY `ProgramaID` (`ProgramaID`),
  ADD KEY `CancionID` (`CancionID`);

--
-- Indexes for table `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`ProgramaID`),
  ADD KEY `FrecuenciaID` (`FrecuenciaID`),
  ADD KEY `HostID` (`HostID`);

--
-- Indexes for table `radio_host`
--
ALTER TABLE `radio_host`
  ADD PRIMARY KEY (`HostID`),
  ADD UNIQUE KEY `Alias` (`Alias`),
  ADD KEY `cabinaID` (`cabinaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabina`
--
ALTER TABLE `cabina`
  MODIFY `cabinaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cancion`
--
ALTER TABLE `cancion`
  MODIFY `cancionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frecuencia`
--
ALTER TABLE `frecuencia`
  MODIFY `FrecuenciaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genero`
--
ALTER TABLE `genero`
  MODIFY `GeneroID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `PlaylistID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programas`
--
ALTER TABLE `programas`
  MODIFY `ProgramaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `radio_host`
--
ALTER TABLE `radio_host`
  MODIFY `HostID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_ibfk_1` FOREIGN KEY (`GeneroID`) REFERENCES `genero` (`GeneroID`) ON DELETE SET NULL;

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_ibfk_1` FOREIGN KEY (`ProgramaID`) REFERENCES `programas` (`ProgramaID`) ON DELETE CASCADE,
  ADD CONSTRAINT `playlist_ibfk_2` FOREIGN KEY (`CancionID`) REFERENCES `cancion` (`cancionID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programas_ibfk_1` FOREIGN KEY (`FrecuenciaID`) REFERENCES `frecuencia` (`FrecuenciaID`) ON DELETE CASCADE,
  ADD CONSTRAINT `programas_ibfk_2` FOREIGN KEY (`HostID`) REFERENCES `radio_host` (`HostID`) ON DELETE SET NULL;

--
-- Constraints for table `radio_host`
--
ALTER TABLE `radio_host`
  ADD CONSTRAINT `radio_host_ibfk_1` FOREIGN KEY (`cabinaID`) REFERENCES `cabina` (`cabinaID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
