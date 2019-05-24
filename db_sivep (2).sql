-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 11:16 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sivep`
--

-- --------------------------------------------------------

--
-- Table structure for table `cargo`
--

CREATE TABLE `cargo` (
  `ID_CARGO` int(11) NOT NULL,
  `NOM_CARGO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `ID_CONT` int(11) NOT NULL,
  `DNI_CONT` char(8) NOT NULL,
  `NOM_CONT` varchar(100) NOT NULL,
  `APP_CONT` varchar(100) NOT NULL,
  `APM_CONT` varchar(100) NOT NULL,
  `FENAC_CONT` date NOT NULL,
  `TEL_CONT` int(9) NOT NULL,
  `EMAIL_CONT` varchar(100) NOT NULL,
  `PAGO_CONT` int(11) NOT NULL,
  `OBS_CONT` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`ID_CONT`, `DNI_CONT`, `NOM_CONT`, `APP_CONT`, `APM_CONT`, `FENAC_CONT`, `TEL_CONT`, `EMAIL_CONT`, `PAGO_CONT`, `OBS_CONT`) VALUES
(1, '12345678', 'PEPITO', 'VARGAS', 'LOPEZ', '2000-05-11', 987655443, 'pepito@gmail.com', 300, 'aun se le debe'),
(2, '98876554', 'juanito', 'lopez', 'martinez', '2000-05-24', 980766545, 'hjzdjhsd@djsgdhgsfegf', 789, 'nohdhhd');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID_MENU` int(11) NOT NULL,
  `DESC_MENU` varchar(50) NOT NULL,
  `IMG_MENU` varchar(50) NOT NULL,
  `URL_MENU` varchar(100) NOT NULL,
  `ORD_MENU` int(11) NOT NULL,
  `ESTATUS_MENU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID_MENU`, `DESC_MENU`, `IMG_MENU`, `URL_MENU`, `ORD_MENU`, `ESTATUS_MENU`) VALUES
(1, 'Inicio', '', '/#', 1, 0),
(2, 'Valorizaciones', '', '#VALORIZACIONES', 2, 0),
(3, 'Usuarios', '', '#USUARIOS', 3, 0),
(4, 'Contactos', '', '#CONTACTOS', 4, 0),
(5, 'Reportes', '', '#REPORTES', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permisosmenu`
--

CREATE TABLE `permisosmenu` (
  `ID_PERMENU` int(11) NOT NULL,
  `COD_USU` varchar(20) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ESTATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `COD_USU` varchar(20) NOT NULL,
  `PASS_USU` varchar(50) DEFAULT NULL,
  `NOM_USU` varchar(50) DEFAULT NULL,
  `APP_USU` varchar(50) DEFAULT NULL,
  `APM_USU` varchar(50) DEFAULT NULL,
  `EMAIL_USU` varchar(50) DEFAULT NULL,
  `ESTADO_USU` char(1) DEFAULT NULL,
  `CARGO_USU` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`COD_USU`, `PASS_USU`, `NOM_USU`, `APP_USU`, `APM_USU`, `EMAIL_USU`, `ESTADO_USU`, `CARGO_USU`) VALUES
('gise', '2fadc5aa987469f4d29537f5b41766ed', 'Gisela', 'merino', 'Rivera', 'gise.gmr@gmail.com', 'A', 'AD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`ID_CARGO`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`DNI_CONT`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_MENU`);

--
-- Indexes for table `permisosmenu`
--
ALTER TABLE `permisosmenu`
  ADD PRIMARY KEY (`ID_PERMENU`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`COD_USU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_MENU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
