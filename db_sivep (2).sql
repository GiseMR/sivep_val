-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 05:32 PM
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
-- Database: `ejemplos`
--

-- --------------------------------------------------------

--
-- Table structure for table `expedientes`
--

CREATE TABLE `expedientes` (
  `ID` int(11) NOT NULL,
  `NRO_EXPEDIENTE` varchar(20) NOT NULL,
  `DEMANDANTE` varchar(200) NOT NULL,
  `DEMANDADO` varchar(200) NOT NULL,
  `MATERIA` varchar(200) NOT NULL,
  `ESPECIALIDAD` varchar(200) NOT NULL,
  `OBSERVACIONES` varchar(500) NOT NULL,
  `UBICACION` varchar(100) NOT NULL,
  `DILIGENCIA` varchar(200) NOT NULL,
  `FEC_AUDIENCIA` varchar(20) NOT NULL,
  `ESTADO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expedientes`
--

INSERT INTO `expedientes` (`ID`, `NRO_EXPEDIENTE`, `DEMANDANTE`, `DEMANDADO`, `MATERIA`, `ESPECIALIDAD`, `OBSERVACIONES`, `UBICACION`, `DILIGENCIA`, `FEC_AUDIENCIA`, `ESTADO`) VALUES
(6, '20-2019-0', 'gtg', 'tgerttgrtt', 'trt', 'GJFFFFFFFFFFF', 'GGGGGGGGGGGGG', 'FGDYDBVJBKNKHIJH', 'HGIYFIYFYG', '12/1012', '0'),
(9, '655-233-4', 'HHG', 'VFC', 'VFF', '', 'HG', '', '', '', 'Pendiente'),
(10, '725-2018', 'BETZABET CHIRINOS PONCE', 'MARIO CHIRINOS MOLINA \r\nBELARMINO CHIRINNOS MOLINA', 'PETICION Y/O EXCLUSION DE HERENCIA', 'JUZGADO CIVIL', 'NO SE PEUEDEE', 'JUZGADO', 'ENTREGA DE DOC', '20/01/2019', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_sistema`
--

CREATE TABLE `menu_sistema` (
  `ID` int(11) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `IMAGEN` varchar(50) NOT NULL DEFAULT 'imagenes/not_found.png',
  `URL` varchar(50) DEFAULT NULL,
  `ORDENAMIENTO` int(11) NOT NULL DEFAULT '0',
  `ESTATUS` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_sistema`
--

INSERT INTO `menu_sistema` (`ID`, `DESCRIPCION`, `IMAGEN`, `URL`, `ORDENAMIENTO`, `ESTATUS`) VALUES
(1, 'Inicio', 'imagenes/Customer.png', '#', 1, 0),
(2, 'Agregar Usuarios', 'imagenes/Proveedores.png', '/usuarios/nuevo', 3, 0),
(3, 'Listar Usuarios', 'imagenes/Product.png', '/usuarios', 2, 0),
(4, 'Listar Expedientes', 'imagenes/Customer.png', '/expedientes', 4, 0),
(5, 'Agregar Expedientes', 'imagenes/not_found.png', '/expedientes/nuevo', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permisosmenu`
--

CREATE TABLE `permisosmenu` (
  `ID` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_MENU` int(11) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permisosmenu`
--

INSERT INTO `permisosmenu` (`ID`, `ID_USUARIO`, `ID_MENU`, `ESTATUS`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 1, 3, 0),
(5, 2, 1, 0),
(6, 2, 3, 0),
(7, 2, 2, 1),
(8, 1, 4, 0),
(9, 2, 4, 0),
(10, 1, 5, 0),
(11, 3, 1, 0),
(12, 3, 3, 1),
(13, 3, 4, 0),
(14, 3, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `FECHA_REGISTRO` varchar(20) NOT NULL,
  `ESTATUS` int(11) NOT NULL DEFAULT '0',
  `TIPO` varchar(20) NOT NULL DEFAULT 'Invitado',
  `PASSWORD` varchar(50) DEFAULT '123'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOMBRE`, `APELLIDOS`, `EMAIL`, `FECHA_REGISTRO`, `ESTATUS`, `TIPO`, `PASSWORD`) VALUES
(1, 'Gisela', 'Merino Rivera', 'elcapo@programando.com', '2014-07-30 14:39:06', 0, 'Administrador', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Maria', 'Cortes Crisanto', 'crisant_89@hotmail.com', '2014-07-30 14:39:06', 0, 'Invitado', '263bce650e68ab4e23f28263760b9fa5'),
(3, 'Americo', 'Salaverry', 'americo@gmail.com', '2019-01-04 01:07:09', 0, 'Invitado', 'd0970714757783e6cf17b26fb8e2298f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expedientes`
--
ALTER TABLE `expedientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `menu_sistema`
--
ALTER TABLE `menu_sistema`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `permisosmenu`
--
ALTER TABLE `permisosmenu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expedientes`
--
ALTER TABLE `expedientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu_sistema`
--
ALTER TABLE `menu_sistema`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permisosmenu`
--
ALTER TABLE `permisosmenu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
