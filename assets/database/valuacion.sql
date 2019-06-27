-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2019 at 05:25 PM
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
-- Table structure for table `valuacion`
--

CREATE TABLE `valuacion` (
  `idvaluacion` int(11) NOT NULL,
  `nroValuacion` varchar(20) DEFAULT NULL,
  `tipoinmueble` varchar(50) DEFAULT NULL,
  `fechavaluacion` date DEFAULT NULL,
  `a101` varchar(500) DEFAULT NULL COMMENT '1.01 Objeto de Valuación',
  `a102a` varchar(500) DEFAULT NULL COMMENT '1.02 Propietarios dni',
  `a102b` varchar(45) DEFAULT NULL COMMENT '1.02 Propietarios nombre',
  `a103a` varchar(500) DEFAULT NULL COMMENT '1.03 Solicitante dni',
  `a103b` varchar(45) DEFAULT NULL COMMENT '1.03 Solicitante nombre',
  `a104a` varchar(500) DEFAULT NULL COMMENT '1.04 Entidad Financ ruc',
  `a104b` varchar(45) DEFAULT NULL COMMENT '1.04 Entidad Finan nombre\n',
  `a201` varchar(500) DEFAULT NULL COMMENT 'Registral',
  `a202` varchar(500) DEFAULT NULL COMMENT 'Autoavaluo',
  `a203a` varchar(50) DEFAULT NULL COMMENT 'Codigo departamento',
  `a203b` varchar(45) DEFAULT NULL COMMENT 'codigo provincia',
  `a203c` varchar(45) DEFAULT NULL COMMENT 'codigo distrito\n',
  `a204` varchar(200) DEFAULT NULL COMMENT 'Insitu',
  `a301` varchar(50) DEFAULT NULL COMMENT '3.01  Zonificación',
  `a302` varchar(50) DEFAULT NULL COMMENT '3.02 Linderos Fuente',
  `a302a` varchar(500) DEFAULT NULL COMMENT '3.02 Linderos Frente',
  `a302b` varchar(500) DEFAULT NULL COMMENT '3.02 Linderos Fondo',
  `a302c` varchar(500) DEFAULT NULL COMMENT '3.02 Linderos Derecha',
  `a302d` varchar(500) DEFAULT NULL COMMENT '3.02 Linderos Izquierda',
  `a303a` decimal(20,2) DEFAULT NULL COMMENT '3.03 Terreno Area',
  `a303b` varchar(100) DEFAULT NULL COMMENT '3.03 Terreno Perímetro',
  `a304` decimal(20,2) DEFAULT NULL COMMENT '3.04. Edificación estado - total area construida',
  `a304a` decimal(20,2) DEFAULT NULL COMMENT '3.04. Edificación estado',
  `a304b` int(11) DEFAULT NULL COMMENT '3.04. Edificación años antiguedad',
  `a305` varchar(500) DEFAULT NULL COMMENT '3.05 Ocupación - Uso',
  `a306` text COMMENT '3.06 Descripción del Predio',
  `a307a` varchar(200) DEFAULT NULL COMMENT '3.07 Fábrica- Especificaciones técnicas (Bloque Predominante) sistema constructivo',
  `a307b` varchar(200) DEFAULT NULL COMMENT '3.07 Fábrica- Especificaciones técnicas (Bloque Predominante) MUROS',
  `a307c` varchar(200) DEFAULT NULL COMMENT '3.07 Fábrica- Especificaciones técnicas (Bloque Predominante) techos',
  `a307d` varchar(200) DEFAULT NULL COMMENT '3.07 Fábrica- Especificaciones técnicas (Bloque Predominante) puertas',
  `a307e` varchar(200) DEFAULT NULL COMMENT '3.07 Fábrica- Especificaciones técnicas (Bloque Predominante) ventanas',
  `a307f` varchar(200) DEFAULT NULL COMMENT '3.07 Fábrica- Especificaciones técnicas (Bloque Predominante) revestimiento',
  `a307g` varchar(200) DEFAULT NULL COMMENT '3.07 Fábrica- Especificaciones técnicas (Bloque Predominante) pisos',
  `a307h` varchar(200) DEFAULT NULL COMMENT '3.07 Fábrica- Especificaciones técnicas (Bloque Predominante) ss.hh.',
  `a307i` varchar(200) DEFAULT NULL COMMENT '3.07 Fábrica- Especificaciones técnicas (Bloque Predominante) int. sanitarias',
  `a308` varchar(500) DEFAULT NULL COMMENT '3.08 Servidumbre',
  `a309` varchar(100) DEFAULT NULL COMMENT '3.09 Declaratoria de Fabrica',
  `a309a` decimal(5,2) DEFAULT NULL COMMENT '3.09 Declaratoria de Fabrica porcentaje',
  `a400` varchar(500) DEFAULT NULL COMMENT '4.00 ANALISIS DEL MEJOR Y MÁS INTENSIVO USOS POSIBLE DEL BIEN',
  `a500` text COMMENT '5.00 ALCANCES Y LIMITACIONES DEL TRABAJO EFECTUADO',
  `a600` date DEFAULT NULL COMMENT '6.00 FECHA DE ASIGNACIÓN DEL VALOR',
  `a700` varchar(100) DEFAULT NULL COMMENT '7.00 POLIZA DE SEGUROS',
  `b800` date DEFAULT NULL COMMENT '8.00 INSPECCIÓN OCULAR DEL BIEN',
  `b900a` varchar(500) DEFAULT NULL COMMENT '9.00 CARGAS Y GRAVÁMENES',
  `b900b` varchar(100) DEFAULT NULL COMMENT '9.00 CARGAS Y GRAVÁMENES fuente',
  `b1000a` varchar(100) DEFAULT NULL COMMENT '10.00 DATOS LEGALES oficina registral',
  `b1000b` varchar(100) DEFAULT NULL COMMENT '10.00 DATOS LEGALES codigo del predio',
  `b1000c` varchar(100) DEFAULT NULL COMMENT '10.00 DATOS LEGALES folio',
  `b1000d` varchar(100) DEFAULT NULL COMMENT '10.00 DATOS LEGALES asiento',
  `b1000e` varchar(100) NOT NULL COMMENT 'Número de Partida Electrónica SUNARP',
  `b1100a` varchar(100) DEFAULT NULL COMMENT '11.00 CÓDIGO DE SUMINISTROS energia electrica',
  `b1100b` varchar(100) DEFAULT NULL COMMENT '11.00 CÓDIGO DE SUMINISTROS. agua',
  `c1200` text COMMENT '12.00 BASES PARA SU DESARROLLO.',
  `c1300` text COMMENT '13.00 METODOLOGÍA UTILIZADA.',
  `c1400` text COMMENT '14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA mensaje 1',
  `c1400a` decimal(10,2) DEFAULT NULL COMMENT '14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA total',
  `c1400b` decimal(10,2) DEFAULT NULL COMMENT '14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA dolares',
  `c1400c` decimal(10,4) DEFAULT NULL COMMENT '14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA tipo de cambio',
  `c1400d` decimal(10,2) DEFAULT NULL COMMENT '14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA valor soles',
  `c1400e` text COMMENT '14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA mensaje 2',
  `c1400f` text COMMENT '14.00 INVESTIGACIÓN Y VALORES COMERCIALES DE REFERENCIA imagen mapa',
  `c1500a` int(11) DEFAULT NULL COMMENT '15.00 FACTIBILIDAD DE REALIZACION Y CLASE DE GARANTÍA caracteristicas',
  `c1500b` int(11) DEFAULT NULL COMMENT '15.00 FACTIBILIDAD DE REALIZACION Y CLASE DE GARANTÍA areas',
  `c1500c` int(11) DEFAULT NULL COMMENT 'ubicacion',
  `c1500d` int(11) DEFAULT NULL COMMENT '15.00 FACTIBILIDAD DE REALIZACION Y CLASE DE GARANTÍA servicios\n',
  `c1500e` int(11) DEFAULT NULL COMMENT '15.00 FACTIBILIDAD DE REALIZACION Y CLASE DE GARANTÍA puntaje',
  `c1500f` decimal(20,4) DEFAULT NULL COMMENT '15.00 FACTIBILIDAD DE REALIZACION Y CLASE DE GARANTÍA porcentaje',
  `c1500g` varchar(100) DEFAULT NULL COMMENT '15.00 FACTIBILIDAD DE REALIZACION Y CLASE DE GARANTÍA tipo de garantia\n',
  `c1600` decimal(20,4) DEFAULT NULL COMMENT ' 16.00 DEDUCCIONES APLICADAS',
  `c1700` varchar(500) DEFAULT NULL COMMENT '17.00  SUSTENTO',
  `d1800a` decimal(20,2) DEFAULT NULL COMMENT '18.00 VALOR COMERCIAL DEL PRECIO (VCP) area total',
  `d1800b` decimal(20,2) DEFAULT NULL COMMENT '18.00 VALOR COMERCIAL DEL PRECIO (VCP) valor comercial unitario',
  `d1800c` decimal(20,2) DEFAULT NULL COMMENT '18.00 VALOR COMERCIAL DEL PRECIO (VCP) valor comercial del terreno',
  `d1800d` decimal(20,4) DEFAULT NULL COMMENT '18.00 VALOR COMERCIAL DEL PRECIO (VCP) tipo de cambio',
  `d1901a` decimal(20,2) DEFAULT NULL COMMENT '19.1 Valor del terreno (VT) area m2',
  `d1901b` decimal(20,2) DEFAULT NULL COMMENT '19.1 Valor del terreno (VT)  valor $ m2',
  `d1901c` decimal(20,2) DEFAULT NULL COMMENT '19.1 Valor del terreno (VT)  valor total $',
  `d1901d` decimal(20,2) DEFAULT NULL COMMENT '19.1 Valor del terreno (VT) valor total S/\n',
  `d1902` varchar(45) DEFAULT NULL COMMENT '19.2 Valor de la Edificación (VE) region',
  `d1902a` decimal(20,2) DEFAULT NULL COMMENT '19.2 Valor de la Edificación (VE) valor m2',
  `d1902b` decimal(20,2) DEFAULT NULL COMMENT '19.2 Valor de la Edificación (VE) valor construccion',
  `d1902c` decimal(20,2) DEFAULT NULL COMMENT '19.2 Valor de la Edificación (VE) depreciacion porcentaje',
  `d1902d` decimal(20,2) DEFAULT NULL COMMENT '19.2 Valor de la Edificación (VE) depreciacion',
  `d1902e` decimal(20,2) DEFAULT NULL COMMENT '19.2 Valor de la Edificación (VE) subtotal',
  `d1902f` decimal(20,2) DEFAULT NULL COMMENT '19.2 Valor de la Edificación (VE) subtotal (VE final)',
  `d1903a` decimal(20,2) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) voc final',
  `d1903b` varchar(200) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) estado conservacion',
  `d1903c` int(11) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) antiguedad',
  `d1903d` decimal(20,2) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) vcp $',
  `d1903e` decimal(20,2) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) vcp s/',
  `d1903f` decimal(20,2) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) vnr %',
  `d1903g` decimal(20,2) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) vnr$',
  `d1903h` decimal(20,2) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) vnrs/',
  `d1903i` varchar(500) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) vcp texto en dolares',
  `d1903j` decimal(20,2) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) ver $',
  `d1903k` decimal(20,2) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) ver S/',
  `d1903l` decimal(20,4) DEFAULT NULL COMMENT '19.3 Valor de las Obras Complementarias (VOC) tipo de cambio\n',
  `e2000` text COMMENT '20.00 DECLARACION DE INDEPENDENCIA DE CRITERIO',
  `e2100` text COMMENT '21.00  RECONOCIMIENTO DE NORMAS APLICABLES',
  `e2200` text COMMENT '22.00 DECLARACIÓN JURADA',
  `e2300` text COMMENT '23.00 VIGENCIA DE LA VALUACIÓN',
  `e2400` text COMMENT '24.00 DE LA POSESIÓN DEL INMUEBLE',
  `e2500` text COMMENT '25.00 PERSONA QUE ATENDIÓ LA VERIFICACIÓN DEL INMUEBLE',
  `e2600` text COMMENT '26.00 CONSIDERACIONES PARA LA VALORIZACIÓN',
  `e2700` varchar(500) DEFAULT NULL COMMENT '27.00 OBSERVACIONES Y/O RECOMENDACIONES',
  `e2800a` varchar(200) DEFAULT NULL COMMENT '28.00 DOCUMENTACION UTILIZADA EN LA VALUACION titulo',
  `e2800b` varchar(200) DEFAULT NULL COMMENT '28.00 DOCUMENTACION UTILIZADA EN LA VALUACION certificado',
  `e2800c` varchar(200) DEFAULT NULL COMMENT '28.00 DOCUMENTACION UTILIZADA EN LA VALUACION autoavaluo',
  `e2800d` varchar(200) DEFAULT NULL COMMENT '28.00 DOCUMENTACION UTILIZADA EN LA VALUACION planos',
  `e2800e` varchar(200) DEFAULT NULL COMMENT '28.00 DOCUMENTACION UTILIZADA EN LA VALUACION memoria',
  `e2800f` varchar(200) DEFAULT NULL COMMENT '28.00 DOCUMENTACION UTILIZADA EN LA VALUACION otros\n',
  `e2900a` varchar(200) DEFAULT NULL COMMENT '29.00 DEL PERITO VALUADOR nombre',
  `e2900b` varchar(200) DEFAULT NULL COMMENT '29.00 DEL PERITO VALUADOR profesion',
  `e2900c` varchar(200) DEFAULT NULL COMMENT '29.00 DEL PERITO VALUADOR cap',
  `e2900d` varchar(200) DEFAULT NULL COMMENT '29.00 DEL PERITO VALUADOR  habilitacion',
  `e3000a` varchar(500) DEFAULT NULL COMMENT '30.00 PANEL FOTOGRÁFICO foto principal\n',
  `e3000b` varchar(500) DEFAULT NULL COMMENT '30.00 PANEL FOTOGRÁFICO foto principal dos',
  `e3000c` varchar(500) DEFAULT NULL COMMENT '30.00 PANEL FOTOGRÁFICO plano a4',
  `registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `idcontacto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `valuacion`
--

INSERT INTO `valuacion` (`idvaluacion`, `nroValuacion`, `tipoinmueble`, `fechavaluacion`, `a101`, `a102a`, `a102b`, `a103a`, `a103b`, `a104a`, `a104b`, `a201`, `a202`, `a203a`, `a203b`, `a203c`, `a204`, `a301`, `a302`, `a302a`, `a302b`, `a302c`, `a302d`, `a303a`, `a303b`, `a304`, `a304a`, `a304b`, `a305`, `a306`, `a307a`, `a307b`, `a307c`, `a307d`, `a307e`, `a307f`, `a307g`, `a307h`, `a307i`, `a308`, `a309`, `a309a`, `a400`, `a500`, `a600`, `a700`, `b800`, `b900a`, `b900b`, `b1000a`, `b1000b`, `b1000c`, `b1000d`, `b1000e`, `b1100a`, `b1100b`, `c1200`, `c1300`, `c1400`, `c1400a`, `c1400b`, `c1400c`, `c1400d`, `c1400e`, `c1400f`, `c1500a`, `c1500b`, `c1500c`, `c1500d`, `c1500e`, `c1500f`, `c1500g`, `c1600`, `c1700`, `d1800a`, `d1800b`, `d1800c`, `d1800d`, `d1901a`, `d1901b`, `d1901c`, `d1901d`, `d1902`, `d1902a`, `d1902b`, `d1902c`, `d1902d`, `d1902e`, `d1902f`, `d1903a`, `d1903b`, `d1903c`, `d1903d`, `d1903e`, `d1903f`, `d1903g`, `d1903h`, `d1903i`, `d1903j`, `d1903k`, `d1903l`, `e2000`, `e2100`, `e2200`, `e2300`, `e2400`, `e2500`, `e2600`, `e2700`, `e2800a`, `e2800b`, `e2800c`, `e2800d`, `e2800e`, `e2800f`, `e2900a`, `e2900b`, `e2900c`, `e2900d`, `e3000a`, `e3000b`, `e3000c`, `registro`, `idcontacto`) VALUES
(71, '1-2019', 'RURAL', '2019-06-27', 'Determinar el valor comercial y el de realización en el mercado del inmueble URBANO  de acuerdo a la Rs. S.B.S. N° 880 de fecha 15 de diciembre de 1997, modificada por las Resoluciones SBS N° 816-2005 y 12879 -2009, R.M.  Nº 172-2016-VIVIENDA', NULL, NULL, '70865274', 'GISELA MERINO RIVERA', '20603338813', 'SINDICATO CAJA AREQUIPA - SINCARE', 'A TRES CUADRAS D ELA PALAZA DE ARMAS D ELA LOCALIDAD DE TINTAY', ' LOTE DE TERRENO N°21 DE LA MANZANA ', '03', '04', '04', 'LOTE', 'RURAL', 'PROPIA', NULL, NULL, NULL, NULL, '90.00', '38', '90.00', NULL, NULL, 'Vivienda;Almacen', '<p>\n	EL PREDEIO SE ENCUENTRA A TRES CUDRASS</p>\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No cuenta con servidumbre para con las propiedades vecinas', 'No se encuentra inscrita', '0.00', 'Vivienda', '<p>\n	La valuaci&oacute;n es para determinar el valor comercial del predio.\\nNo hubo ninguna objeci&oacute;n para efectuar la evaluaci&oacute;n y valuaci&oacute;n del inmueble</p>\n', '2019-06-26', 'No cuenta con Poliza de Seguros', '2019-06-19', 'CAJA AREQUIPA', 'PROPIA', '123', '123', '123', '89', 'PK123', 'Sin información', 'Sin información', '<p>\n	Se ha realizado una visita de inspecci&oacute;n de campo a la vez el entorno del predio, para determinar valores comerciales de compra y venta de inmuebles con caracer&iacute;sticas similares.</p>\n', '<p>\n	El trabajo que se realiza en concordancia a lo establecido por las normas vigentes del SBS y el ReglamentoNacional de Tazaciones del Per&uacute;.</p>\n', '<p>\n	Se consider&oacute; una investigaci&oacute;n en el entorno del inmueble durante la inspecci&oacute;n, revisi&oacute;n de avisos econ&oacute;micos y la base de datos del perito.</p>\n', '800.00', '600.00', '3.3090', '1985.40', '<p>\n	Se toma el valor considerando las referencias y predios de caracter&iacute;sticas similares, con un criterio conservador y prudente asi mismo por encontrarse en la misma esquina.</p>\n', '<p>\n	assets/uploads/Screenshot_2016-09-22-22-57-53-1.png</p>\n', 4, 4, 4, 4, 16, '80.0000', 'Garantía Hipotecaria Preferida', '20.0000', 'El análisis efectuado nos permite indicar que las apreciaciones son las más razonables para determinar el valor del bien.', '90.00', '600.00', '54000.00', '3.3090', '90.00', '600.00', '54000.00', '178686.00', 'SIERRA', '177999.30', NULL, NULL, NULL, NULL, NULL, '76950.00', 'Seleccione...', 2, '131047.24', '433635.30', '80.00', '104837.79', '346908.24', 'CIENTO CUATRO MIL OCHOCIENTOS TREINTA Y SIETE  CON 79/100 DÓLARES AMERICANOS', '77047.23', '254949.30', '3.3090', '<p>\n	La presente valuaci&oacute;n se ha efectuado con total independencia, aplicada un criterio prudente y conservador en la determinaci&oacute;n del valor.</p>\n', '<p>\n	En la determinaci&oacute;n del valor se aplicaron las normas vigentes reconocidas por la S.B.S y el Reglamento Nacional de Tasaciones del Per&uacute;. Rs. S.B.S. N&deg; 11356-2008, R.M. N&ordm; 172-2016-VIVIENDA.</p>\n', '<p>\n	Declaro bajo juramento, no tener ning&uacute;n tipo de vinculaci&oacute;n familiar, econ&oacute;mico, relaci&oacute;n laboral entre el propietario, cliente y/o solicitante en la presente valorizaci&oacute;n.</p>\n', '<p>\n	Si no var&iacute;an las edificaciones del mercado, as&iacute; como no se surgir imponderables la valuaci&oacute;n tiene una vigencia de: 90 d&iacute;as.</p>\n', '<p>\n	VALERIO MERINO RUIZ, JUSTINA RIVERA BARRIENTOS DE MERINO</p>\n', '<p>\n	GISELA MERINO RIVERA</p>\n', '<p>\n	. Ubicaci&oacute;n del predio . Servicios de Infraestructura instalados: accesibilidad, pistas, agua potable, desague, electricidad y Comunicaciones. . Accesos directos desde la via p&uacute;blica. . Uso actual. . Zonificaci&oacute;n. . Equipamiento urbano que posee la zona. . Visita de inspecci&oacute;n. . Valor comercial del mercado inmobiliario. . Caracteristicas de la Edificaci&oacute;n. . Influencia poblacional.</p>\n', NULL, 'EN PROCESO', 'EN PROCESO', 'EN PROCESO', NULL, 'EN PROCESO', 'NADA', 'Cyntia Flor Ochoa Pino', 'Arquitecto', '12452', 'PROCESO;Vigente', 'assets/uploads/Screenshot_2016-09-03-13-08-34-1.png', 'assets/uploads/Screenshot_2016-09-23-09-20-41-1.png', 'assets/uploads/Screenshot_2016-09-18-00-21-27-1.png', '2019-06-27 01:11:56', 0),
(72, '2-2019', 'URBANO', '2019-06-27', 'Determinar el valor comercial y el de realización en el mercado del inmueble URBANO  de acuerdo a la Rs. S.B.S. N° 880 de fecha 15 de diciembre de 1997, modificada por las Resoluciones SBS N° 816-2005 y 12879 -2009, R.M.  Nº 172-2016-VIVIENDA', NULL, NULL, '', '', '', '', '', '', 'Seleccione...', 'Seleccione...', 'Seleccione...', '', 'Seleccione...', '', NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No cuenta con servidumbre para con las propiedades vecinas', 'No se encuentra inscrita', '0.00', NULL, 'La valuación es para determinar el valor comercial del predio.\\nNo hubo ninguna objeción para efectuar la evaluación y valuación del inmueble', '0000-00-00', 'No cuenta con Poliza de Seguros', '0000-00-00', '', '', '', '', '', '', '', 'Sin información', 'Sin información', 'Se ha realizado una visita de inspección de campo a la vez el entorno del predio, para determinar valores comerciales de compra y venta de inmuebles con caracerísticas similares.', 'El trabajo que se realiza en concordancia a lo establecido por las normas vigentes del SBS y el ReglamentoNacional de Tazaciones del Perú. ', 'Se consideró una investigación en el entorno del inmueble durante la inspección, revisión de avisos económicos y la base de datos del perito.', '0.00', '0.00', '0.0000', '0.00', 'Se toma el valor considerando las referencias y predios de características similares, con un criterio conservador y prudente asi mismo por encontrarse en la misma esquina.', '', 3, 3, 3, 3, 12, '60.0000', 'Seleccione...', '40.0000', 'El análisis efectuado nos permite indicar que las apreciaciones son las más razonables para determinar el valor del bien.', '0.00', '0.00', '0.00', '0.0000', '0.00', '0.00', '0.00', '0.00', 'Seleccione...', '0.00', NULL, NULL, NULL, NULL, NULL, '0.00', 'Seleccione...', 0, '0.00', '0.00', '80.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.0000', ' La presente  valuación se ha efectuado con total independencia, aplicada un criterio prudente y conservador en la determinación del valor.', ' En la determinación del valor se aplicaron las normas vigentes reconocidas por la S.B.S y el Reglamento Nacional de Tasaciones del Perú. Rs. S.B.S. N° 11356-2008, R.M.  Nº 172-2016-VIVIENDA.', ' Declaro bajo juramento, no tener ningún tipo de vinculación familiar, económico, relación laboral entre el propietario, cliente y/o solicitante en la presente valorización.', ' Si no varían las edificaciones del mercado, así como no se surgir imponderables la valuación tiene una vigencia de: 90 días.', '', '', '. Ubicación del predio		\r\n. Servicios de Infraestructura instalados: accesibilidad, pistas, agua potable, desague, electricidad y Comunicaciones.			\r\n. Accesos directos desde la via pública.\r\n. Uso actual.			\r\n. Zonificación.\r\n. Equipamiento urbano que posee la zona.			\r\n. Visita de inspección.\r\n. Valor comercial del mercado inmobiliario.			\r\n. Caracteristicas de la Edificación.					\r\n. Influencia poblacional.					\r\n', '', '', '', '', NULL, '', '', 'Cyntia Flor Ochoa Pino', 'Arquitecto', '12452', 'Vigente', '', '', '', '2019-06-27 05:35:23', 0),
(73, '3-2019', 'URBANO', '2019-06-27', 'Determinar el valor comercial y el de realización en el mercado del inmueble URBANO  de acuerdo a la Rs. S.B.S. N° 880 de fecha 15 de diciembre de 1997, modificada por las Resoluciones SBS N° 816-2005 y 12879 -2009, R.M.  Nº 172-2016-VIVIENDA', NULL, NULL, '', '', '', '', '', '', 'Seleccione...', 'Seleccione...', 'Seleccione...', '', 'Seleccione...', '', NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No cuenta con servidumbre para con las propiedades vecinas', 'No se encuentra inscrita', '0.00', NULL, 'La valuación es para determinar el valor comercial del predio.\\nNo hubo ninguna objeción para efectuar la evaluación y valuación del inmueble', '0000-00-00', 'No cuenta con Poliza de Seguros', '0000-00-00', '', '', '', '', '', '', '', 'Sin información', 'Sin información', 'Se ha realizado una visita de inspección de campo a la vez el entorno del predio, para determinar valores comerciales de compra y venta de inmuebles con caracerísticas similares.', 'El trabajo que se realiza en concordancia a lo establecido por las normas vigentes del SBS y el ReglamentoNacional de Tazaciones del Perú. ', 'Se consideró una investigación en el entorno del inmueble durante la inspección, revisión de avisos económicos y la base de datos del perito.', '0.00', '0.00', '0.0000', '0.00', 'Se toma el valor considerando las referencias y predios de características similares, con un criterio conservador y prudente asi mismo por encontrarse en la misma esquina.', '', 3, 3, 3, 3, 12, '60.0000', 'Seleccione...', '40.0000', 'El análisis efectuado nos permite indicar que las apreciaciones son las más razonables para determinar el valor del bien.', '0.00', '0.00', '0.00', '0.0000', '0.00', '0.00', '0.00', '0.00', 'Seleccione...', '0.00', NULL, NULL, NULL, NULL, NULL, '0.00', 'Seleccione...', 0, '0.00', '0.00', '80.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.0000', ' La presente  valuación se ha efectuado con total independencia, aplicada un criterio prudente y conservador en la determinación del valor.', ' En la determinación del valor se aplicaron las normas vigentes reconocidas por la S.B.S y el Reglamento Nacional de Tasaciones del Perú. Rs. S.B.S. N° 11356-2008, R.M.  Nº 172-2016-VIVIENDA.', ' Declaro bajo juramento, no tener ningún tipo de vinculación familiar, económico, relación laboral entre el propietario, cliente y/o solicitante en la presente valorización.', ' Si no varían las edificaciones del mercado, así como no se surgir imponderables la valuación tiene una vigencia de: 90 días.', '', '', '. Ubicación del predio		\r\n. Servicios de Infraestructura instalados: accesibilidad, pistas, agua potable, desague, electricidad y Comunicaciones.			\r\n. Accesos directos desde la via pública.\r\n. Uso actual.			\r\n. Zonificación.\r\n. Equipamiento urbano que posee la zona.			\r\n. Visita de inspección.\r\n. Valor comercial del mercado inmobiliario.			\r\n. Caracteristicas de la Edificación.					\r\n. Influencia poblacional.					\r\n', '', '', '', '', NULL, '', '', 'Cyntia Flor Ochoa Pino', 'Arquitecto', '12452', 'Vigente', '', '', '', '2019-06-27 05:44:05', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `valuacion`
--
ALTER TABLE `valuacion`
  ADD PRIMARY KEY (`idvaluacion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `valuacion`
--
ALTER TABLE `valuacion`
  MODIFY `idvaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
