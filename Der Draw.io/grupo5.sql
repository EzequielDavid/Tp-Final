-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2020 a las 00:22:09
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupo5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrastre`
--

CREATE TABLE `arrastre` (
  `tipo` varchar(25) NOT NULL,
  `patente` varchar(25) NOT NULL,
  `chasis` int(20) NOT NULL,
  `estado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arrastre`
--

INSERT INTO `arrastre` (`tipo`, `patente`, `chasis`, `estado`) VALUES
('Granel', 'AA712AD', 468708, 'Ocupado'),
('Araña', 'AC909AD', 485098, 'Ocupado'),
('Granel', 'AD690AS', 495851, 'Ocupado'),
('Araña', 'AA274AG', 498515, 'Ocupado'),
('Tanque', 'AC471AG', 510019, 'Disponible'),
('Jaula', 'AC383AD', 535330, 'Disponible'),
('Jaula', 'AD340AG', 549916, 'Disponible'),
('Tanque', 'AC559AS', 554550, 'Disponible'),
('Granel', 'AD602AG', 555608, 'Disponible'),
('Tanque', 'AB405AG', 583419, 'Disponible'),
('Araña', 'AA100AS', 585822, 'Disponible'),
('Jaula', 'AB318AD', 595287, 'Disponible'),
('Tanque', 'AB493AS', 595948, 'Disponible'),
('Araña', 'AC125AD', 605737, 'Disponible'),
('Granel', 'AB756AS', 616372, 'Disponible'),
('Araña', 'AC208AG', 642287, 'Disponible'),
('Granel', 'AC734AG', 661897, 'Disponible'),
('Araña', 'AB843AD', 670323, 'Disponible'),
('Araña', 'AB230AS', 678666, 'Disponible'),
('Tanque', 'AD427AS', 703673, 'Disponible'),
('Tanque', 'AD515AD', 704640, 'Disponible'),
('Araña', 'AB135AG', 705687, 'Disponible'),
('Granel', 'AC646AD', 710797, 'Disponible'),
('Araña', 'AA975AD', 726457, 'Disponible'),
('Araña', 'AD953AS', 729910, 'Disponible'),
('CarCarrier', 'AD100AZ', 730027, 'Disponible'),
('CarCarrier', 'AD100AQ', 730502, 'Disponible'),
('Araña', 'AC997AG', 730861, 'Disponible'),
('CarCarrier', 'AD100ER', 730978, 'Disponible'),
('Araña', 'AC821AS', 731202, 'Disponible'),
('CarCarrier', 'AD101EF', 731453, 'Disponible'),
('CarCarrier', 'AD102HG', 731929, 'Disponible'),
('CarCarrier', 'AD103LO', 732404, 'Disponible'),
('CarCarrier', 'AD104WE', 732880, 'Disponible'),
('CarCarrier', 'AD105ZP', 733355, 'Disponible'),
('Araña', 'AD865AG', 747642, 'Disponible'),
('Tanque', 'AA537AG', 752105, 'Disponible'),
('Araña', 'AD252AD', 758967, 'Disponible'),
('Granel', 'AB581AD', 761560, 'Disponible'),
('Araña', 'AA189AD', 775167, 'Disponible'),
('Araña', 'AA887AS', 777450, 'Disponible'),
('Araña', 'AB931AG', 806730, 'Disponible'),
('Granel', 'AB668AG', 815072, 'Disponible'),
('Araña', 'AD166AS', 815082, 'Disponible'),
('Granel', 'AA800AG', 820810, 'Disponible'),
('Jaula', 'AA362AS', 831768, 'Disponible'),
('Granel', 'AA624AS', 852157, 'Disponible'),
('Granel', 'AD778AD', 873758, 'Disponible'),
('Jaula', 'AC296AS', 882174, 'Disponible'),
('Tanque', 'AA449AD', 884654, 'Disponible');

--
-- Disparadores `arrastre`
--
DELIMITER $$
CREATE TRIGGER `darBajaArrastre` AFTER DELETE ON `arrastre` FOR EACH ROW INSERT INTO `arrastre_borrado`(`tipo`, `patente`, `chasis`) VALUES (OLD.tipo, OLD.patente, OLD.chasis)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrastre_borrado`
--

CREATE TABLE `arrastre_borrado` (
  `tipo` varchar(25) NOT NULL,
  `patente` varchar(25) NOT NULL,
  `chasis` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arrastre_borrado`
--

INSERT INTO `arrastre_borrado` (`tipo`, `patente`, `chasis`) VALUES
('Araña', '111', 111),
('Tanque', 'FS23FSD', 5435326);

--
-- Disparadores `arrastre_borrado`
--
DELIMITER $$
CREATE TRIGGER `darAltaArrastre` AFTER DELETE ON `arrastre_borrado` FOR EACH ROW INSERT INTO `arrastre`(`tipo`, `patente`, `chasis`) VALUES (OLD.tipo, OLD.patente, OLD.chasis)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE `carga` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `peso_neto` int(11) NOT NULL,
  `hazard` varchar(5) NOT NULL,
  `imo_class` varchar(250) DEFAULT NULL,
  `reefer` varchar(5) NOT NULL,
  `temperatura` int(11) DEFAULT NULL,
  `cuit` int(11) DEFAULT NULL,
  `estado` varchar(30) NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carga`
--

INSERT INTO `carga` (`codigo`, `tipo`, `peso_neto`, `hazard`, `imo_class`, `reefer`, `temperatura`, `cuit`, `estado`) VALUES
(1, 'CarCarrier', 423, 'Si', 'Sustancias inflamables', 'Si', 20, 55954380, 'Ocupado'),
(2, 'Granel', 100, 'No', NULL, 'No', NULL, 79056163, 'Ocupado'),
(3, 'CarCarrier', 500, 'No', NULL, 'Si', 10, 98888228, 'Ocupado'),
(4, '20', 308, 'Si', 'Gases', 'No', 0, 28182003, 'Ocupado'),
(57, 'CarCarrier', 132, 'Si', 'Sólidos inflamables', 'Si', 132, 132, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `denominacion` varchar(250) NOT NULL,
  `cuit` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contacto1` varchar(250) NOT NULL,
  `contacto2` varchar(250) NOT NULL,
  `viaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`denominacion`, `cuit`, `direccion`, `telefono`, `email`, `contacto1`, `contacto2`, `viaje`) VALUES
('123', 132, '132', 132, 'dsa@gmail.com', '132', '132', 0),
('La empresa', 21695394, 'Paso 693', 63233554, 'laempresa@gmail.com', 'laem@gmail.com', '75198828', 1),
('Alt Muebles', 28182003, 'Primera Junta 889', 70732540, 'altmuebles@gmail.com', 'fatimarial@gmail.com', '48100162', 5),
('El cliente', 55954380, 'Pringles 106', 92074643, 'elcliente@gmail.com', '29794358', 'tamaralola@gmail.com', 4),
('El Mediterraneo', 67521442, 'F Ameghino 713', 14105349, 'elmediterraneo@gmail.com', '91093403', 'elmed@gmail.com', 0),
('Granja Verde', 79056163, 'Av Callao 892', 12496185, 'granjaverde@gmail.com', '70117152', 'annaheras@gmail.com', 3),
('Denom', 90146064, 'Guaraní 364', 36396784, 'denom@gmail.com', '96912246', 'dm@gmail.com', 0),
('Azul Hel', 98888228, 'San Martín 2812', 12250438, 'azulhel@gmail.com', '45319647', 'mauroleiva@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(11) NOT NULL,
  `fecha_mantenimiento` date DEFAULT NULL,
  `costo` decimal(10,0) DEFAULT NULL,
  `detalle_service` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id_mantenimiento`, `fecha_mantenimiento`, `costo`, `detalle_service`) VALUES
(1, '2020-12-18', '3000', 'se arregló el motor'),
(2, '2020-12-18', '4000', 'se arregló una puerta'),
(3, '2020-12-18', '6346', 'se arregló fallo técnico\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(0, 'Asignar'),
(1, 'Administrador'),
(2, 'Supervisor'),
(3, 'EncargadoDeTaller'),
(4, 'Chofer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pasword` varchar(30) NOT NULL,
  `licencia_conduccion` int(11) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `matricula` varchar(30) DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellido`, `email`, `pasword`, `licencia_conduccion`, `fecha_nac`, `id_rol`, `matricula`) VALUES
(111, 'administrador', 'adm', 'administrador@gmail.com', '123', NULL, '1989-03-25', 1, NULL),
(222, 'supervisor', 'super', 'supervisor@gmail.com', '123', 0, '2020-11-02', 2, NULL),
(333, 'encargado', 'de taller', 'encargado@gmail.com', '123', NULL, '1984-02-01', 3, NULL),
(444, 'chofer', 'el chofer', 'chofer@gmail.com', '123', 432, '2020-12-01', 4, 'AA233SS'),
(1234, 'nombre', 'apellido', 'email@gmail.com', '123', NULL, '2000-12-10', 2, NULL),
(4492354, 'Susana', 'Velasco', 'susanavelasco@gmail.com', '4hbdHdBEgY7M', 70645977, '1990-01-25', 4, NULL),
(7186480, 'Marcelo', 'Luna', 'marceloluna@gmail.com', '5JrvCnuQGrXc', 63195241, '1987-12-16', 4, 'AA150QW'),
(13693371, 'Ana', 'Santana', 'anasantana@gmail.com', 'yc5DPeKP8Mqw', 61476173, '1982-03-24', 4, 'AA123CD'),
(17942584, 'Gaspar', 'Afonso', 'gasparafonso@gmail.com', '6FXDxNn2qhcA', 8300967, '1997-01-31', 4, 'AA211ZX'),
(22611849, 'Vidal', 'Sainz', 'vidalsainz@gmail.com', '^xOD*q!aLL^8', 70223345, '2000-12-02', 4, NULL),
(30578734, 'Noe', 'Rosell', 'noelrosell@gmail.com', 'FN3i#NG!Gj%T', 68145039, '1994-04-06', 4, NULL),
(33914984, 'Gabriel', 'Pino', 'gabrielpino@gmail.com', 'KWdEDqxt5HtD', 41834542, '1976-06-04', 4, NULL),
(38286199, 'maca', 'Pazo', 'macadopazo@gmail.com', '456', NULL, NULL, 1, NULL),
(41874074, 'Rocio', 'Melgar', 'rociomelgar@gmail.com', 'S7jNFq@LMV#M', 69763232, '1988-05-01', 4, NULL),
(71354791, 'Joana', 'Frias', 'joanafrias@gmail.com', 'MCBTGzm8wPPE', 83451839, '1986-10-29', 4, NULL),
(88154756, 'Lazaro', 'Echeverria', 'lazaroecheverria@gmail.com', '7^!ui%LFk3by', 25553005, '1999-10-07', 4, NULL);

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `darBajaUsuario` AFTER DELETE ON `usuario` FOR EACH ROW INSERT INTO `usuario_borrado`(`dni`, `nombre`, `apellido`, `email`, `pasword`, `licencia_conduccion`, `fecha_nac`, `id_rol`, `matricula`) VALUES (OLD.dni, OLD.nombre, OLD.apellido, OLD.email, OLD.pasword, OLD.licencia_conduccion, OLD.fecha_nac, OLD.id_rol, OLD.matricula)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_borrado`
--

CREATE TABLE `usuario_borrado` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pasword` varchar(30) NOT NULL,
  `licencia_conduccion` int(11) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `matricula` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_borrado`
--

INSERT INTO `usuario_borrado` (`dni`, `nombre`, `apellido`, `email`, `pasword`, `licencia_conduccion`, `fecha_nac`, `id_rol`, `matricula`) VALUES
(98, 'chicha', 'DP', 'ggg@123.com', '111', 0, '2020-11-08', 2, NULL),
(769, 'titan', 'dp', 'asb@789.com', '222', 0, '2020-11-02', 4, 'chau456'),
(890, 'Flash', 'dp', 'asd@111.com', '333', 0, '2020-11-02', 4, NULL),
(123456, 'chicha', 'DP', 'ggg@123.com', '111', 0, '2020-11-08', 2, NULL),
(2255888, 'Flash', 'dp', 'asd@111.com', '333', 52355977, '2020-11-02', 4, NULL);

--
-- Disparadores `usuario_borrado`
--
DELIMITER $$
CREATE TRIGGER `darAltaUsuario` AFTER DELETE ON `usuario_borrado` FOR EACH ROW INSERT INTO `usuario`(`dni`, `nombre`, `apellido`, `email`, `pasword`, `licencia_conduccion`, `fecha_nac`, `id_rol`, `matricula`) VALUES (OLD.dni, OLD.nombre, OLD.apellido, OLD.email, OLD.pasword, OLD.licencia_conduccion, OLD.fecha_nac, OLD.id_rol, OLD.matricula)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `matricula` varchar(30) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `km_recorridos` double DEFAULT 0,
  `anio_fabricacion` date DEFAULT NULL,
  `numero_chasis` varchar(30) DEFAULT NULL,
  `numero_motor` varchar(30) DEFAULT NULL,
  `alarma` varchar(20) DEFAULT 'Si',
  `marca` varchar(20) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `id_mantenimiento` int(11) DEFAULT NULL,
  `ultimo_service` date NOT NULL DEFAULT current_timestamp(),
  `latitud` double NOT NULL,
  `longitud` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `estado`, `km_recorridos`, `anio_fabricacion`, `numero_chasis`, `numero_motor`, `alarma`, `marca`, `modelo`, `id_mantenimiento`, `ultimo_service`, `latitud`, `longitud`) VALUES
('AA123CD', 'Ocupado', 4001336, '2016-07-30', 'L53879558', '53879558', 'Si', 'IVECO', 'Cursor', 1, '2020-12-09', -58.3845, -34.6022),
('AA124DC', 'Mantenimiento', 5363, '2012-03-04', 'R69904367', '69904367', 'Si', 'IVECO', 'Cursor', 2, '2020-12-09', 0, 0),
('AA150QW', 'Ocupado', 106537, '2020-12-19', 'I82039512', '82039512', 'Si', 'SCANIA', 'G310', 3, '2020-12-09', 0, 0),
('AA211ZX', 'Ocupado', 7437, '2020-01-16', 'N82836641', '82836641', 'Si', 'IVECO', 'Cursor', NULL, '2020-12-09', 0, 0),
('AA233SS', 'Disponible', 7527, '2018-03-20', 'K26139668', '26139668', 'Si', 'IVECO', 'Cursor', NULL, '2020-12-09', 0, 0),
('AA342QZ', 'Disponible', 2347, '2017-07-02', 'C72582865', '72582865', 'Si', 'SCANIA', 'G410', NULL, '2020-12-09', 0, 0),
('AA534QD', 'Disponible', 242, '2013-03-13', 'A21357689', '21357689', 'Si', 'SCANIA', 'G460', NULL, '2020-12-09', 0, 0),
('AA726QW', 'Disponible', 4727, '2017-05-04', 'C54650513', '54650513', 'Si', 'M.BENZ', 'Actros 1846', NULL, '2020-12-09', 0, 0),
('AA918QZ', 'Disponible', 2661, '2018-03-31', 'C31256965', '31256965', 'Si', 'M.BENZ', 'Actros 1846', NULL, '2020-12-09', 0, 0),
('AB198QZ', 'Disponible', 74274, '2019-11-07', 'V18389741', '18389741', 'Si', 'SCANIA', 'G410', NULL, '2020-12-09', 0, 0),
('AB390QD', 'Disponible', 6542, '2016-07-30', 'Z32041290', '32041290', 'Si', 'SCANIA', 'G460', NULL, '2020-12-09', 0, 0),
('AB582QW', 'Disponible', 987, '2020-08-08', 'V17800122', '17800122', 'Si', 'M.BENZ', 'Actros 1846', NULL, '2020-12-09', 0, 0),
('AB774QZ', 'Disponible', 1536, '2017-04-20', 'J46753468', '46753468', 'Si', 'M.BENZ', 'Actros 1846', NULL, '2020-12-09', -58.3845, -34.6022),
('AB900QW', 'Disponible', 26263, '2017-04-02', 'F44301415', '44301415', 'Si', 'IVECO', 'Cursor', NULL, '2020-12-09', 0, 0),
('AB966QD', 'Disponible', 3613, '2015-10-09', 'B32632699', '32632699', 'Si', 'M.BENZ', 'Actros 1846', NULL, '2020-12-09', 0, 0),
('AC246QD', 'Disponible', 9764, '2018-10-17', 'O62500687', '62500687', 'Si', 'SCANIA', 'G460', NULL, '2020-12-09', 0, 0),
('AC342WW', 'Disponible', 86358, '2016-05-28', 'D44260023', '44260023', 'Si', 'IVECO', 'Cursor', NULL, '2020-12-09', 0, 0),
('AC438QW', 'Disponible', 1643, '2015-06-22', 'W54712451', '54712451', 'Si', 'SCANIA', 'G310', NULL, '2020-12-09', 0, 0),
('AC452WE', 'Disponible', 47442, '2019-02-06', 'R28204636', '28204636', 'Si', 'IVECO', 'Cursor', NULL, '2020-12-09', 0, 0),
('AC630QZ', 'Mantenimiento', 3643, '2019-07-12', 'G88648319', '88648319', 'Si', 'M.BENZ', 'Actros 1846', NULL, '2020-12-09', 0, 0),
('AC822QD', 'Disponible', 6326, '2016-02-18', 'J60916748', '60916748', 'Si', 'M.BENZ', 'Actros 1846', NULL, '2020-12-09', 0, 0),
('AC989QW', 'Disponible', 23632, '2015-03-04', 'F64092078', '64092078', 'Si', 'M.BENZ', 'Actros 1846', NULL, '2020-12-09', 0, 0),
('AD200XS', 'Disponible', 35474, '2015-01-19', 'R57193968', '57193968', 'Si', 'IVECO', 'Cursor', NULL, '2020-12-09', 0, 0),
('AD294QW', 'Disponible', 72374, '2020-09-24', 'T27510702', '27510702', 'Si', 'SCANIA', 'G310', NULL, '2020-12-09', 0, 0),
('AD486QZ', 'Disponible', 16636, '2014-05-05', 'L56284263', '56284263', 'Si', 'SCANIA', 'G410', NULL, '2020-12-09', 0, 0),
('AD678QD', 'Disponible', 57437, '2018-06-02', 'C23849041', '23849041', 'Si', 'M.BENZ', 'Actros 1846', NULL, '2020-12-09', 0, 0),
('AD870QW', 'Disponible', 9756, '2019-11-06', 'M30207594', '30207594', 'Si', 'M.BENZ', 'Actros 1846', NULL, '2020-12-09', 0, 0),
('chau456', 'Disponible', 0, '0000-00-00', '', '', 'Si', 'chevrolet', '', NULL, '2020-12-09', 0, 0),
('faffsd', 'Disponible', 0, '2020-12-02', 'fdsfsd2', '312312', 'Si', 'fdsfsd', 'sdfs', NULL, '2020-12-12', 0, 0),
('FDSDS', 'FDA', 0, '2020-12-01', '432EW', 'FDS', 'Si', 'FDS', 'FDS', NULL, '2020-12-09', 0, 0),
('ninguna', '', 0, '0000-00-00', '', '', 'Si', '', '', NULL, '2020-12-09', 0, 0);

--
-- Disparadores `vehiculo`
--
DELIMITER $$
CREATE TRIGGER `darBajaVehiculo` AFTER DELETE ON `vehiculo` FOR EACH ROW INSERT INTO `vehiculo_borrado` (`matricula`, `estado`, `km_recorridos`, `anio_fabricacion`, `numero_chasis`, `numero_motor`, `alarma`, `marca`, `modelo`, `id_mantenimiento`,`ultimo_service`, `latitud`, `longitud`) VALUES (OLD.matricula, OLD.estado, OLD.km_recorridos, OLD.anio_fabricacion, OLD.numero_chasis, OLD.numero_motor, OLD.alarma, OLD.marca, OLD.modelo, OLD.id_mantenimiento, OLD.ultimo_service, OLD.latitud, OLD.longitud)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_borrado`
--

CREATE TABLE `vehiculo_borrado` (
  `matricula` varchar(30) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `km_recorridos` double DEFAULT 0,
  `anio_fabricacion` date DEFAULT NULL,
  `numero_chasis` varchar(30) DEFAULT NULL,
  `numero_motor` varchar(30) DEFAULT NULL,
  `alarma` varchar(20) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `id_mantenimiento` int(11) DEFAULT NULL,
  `ultimo_service` date NOT NULL DEFAULT current_timestamp(),
  `latitud` double NOT NULL,
  `longitud` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo_borrado`
--

INSERT INTO `vehiculo_borrado` (`matricula`, `estado`, `km_recorridos`, `anio_fabricacion`, `numero_chasis`, `numero_motor`, `alarma`, `marca`, `modelo`, `id_mantenimiento`, `ultimo_service`, `latitud`, `longitud`) VALUES
('hola123', 'disponible', 0, '2020-11-10', '', '', NULL, 'Ford', '', NULL, '2020-12-09', 0, 0),
('hola1231', 'disponible', 0, '2020-11-10', NULL, NULL, NULL, 'Ford', NULL, NULL, '2020-12-09', 0, 0);

--
-- Disparadores `vehiculo_borrado`
--
DELIMITER $$
CREATE TRIGGER `darAltaVehiculo` AFTER DELETE ON `vehiculo_borrado` FOR EACH ROW INSERT INTO `vehiculo` (`matricula`, `estado`, `km_recorridos`, `anio_fabricacion`, `numero_chasis`, `numero_motor`, `alarma`, `marca`, `modelo`, `id_mantenimiento`,`ultimo_service`, `latitud`, `longitud`) VALUES (OLD.matricula, OLD.estado, OLD.km_recorridos, OLD.anio_fabricacion, OLD.numero_chasis, OLD.numero_motor, OLD.alarma, OLD.marca, OLD.modelo, OLD.id_mantenimiento, OLD.ultimo_service, OLD.latitud, OLD.longitud)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `origen` varchar(60) DEFAULT NULL,
  `destino` varchar(60) DEFAULT NULL,
  `km_recorridos` double DEFAULT 0,
  `fecha_carga` date DEFAULT NULL,
  `eta` date DEFAULT NULL,
  `tipo_carga` int(11) DEFAULT NULL,
  `matricula` varchar(30) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `arrastre` int(11) DEFAULT NULL,
  `combustible` double NOT NULL,
  `pasajes_peajes` double NOT NULL,
  `desviacion` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `estado`, `origen`, `destino`, `km_recorridos`, `fecha_carga`, `eta`, `tipo_carga`, `matricula`, `cliente`, `arrastre`, `combustible`, `pasajes_peajes`, `desviacion`) VALUES
(1, 'A preparar', 'TCnel Giribone 789', 'Constitución 624', 0, '2020-11-30', '2020-12-06', NULL, NULL, 21695394, NULL, 0, 0, 0),
(2, 'En viaje', 'San Martín 199', 'Humahuaca 4425', 102155, '2020-12-13', '2020-12-14', 3, 'AA150QW', 98888228, 468708, 13556, 10852, 10200),
(3, 'En viaje', '25 De Mayo 627', 'Laprida 918', 4000765, '2020-12-23', '2020-12-31', 2, 'AA123CD', 79056163, 485098, 4000534, 4000245, 4000013),
(4, 'Preparando despacho', 'H Yrigoyen 1698', 'Calle 35 746', 0, '2020-12-23', '2020-12-24', 1, 'AA211ZX', 55954380, 495851, 0, 0, 0),
(5, 'Preparando despacho', 'Cayetano Bourdet 2452', 'French 213', 0, '2020-12-11', '2020-12-25', NULL, 'AA233SS', 28182003, NULL, 5124, 872, 0),
(117, 'A preparar', '132', '132', 0, '2020-12-26', '2020-12-25', NULL, NULL, 132, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_estimado`
--

CREATE TABLE `viaje_estimado` (
  `etd` date NOT NULL,
  `eta` date NOT NULL,
  `kilometros` int(11) NOT NULL,
  `combustible` int(11) NOT NULL,
  `viaticos` int(11) NOT NULL,
  `pasajes_peajes` int(11) NOT NULL,
  `extras` int(11) NOT NULL,
  `hazard` varchar(11) NOT NULL,
  `reefer` varchar(11) NOT NULL,
  `fee` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `viaje_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje_estimado`
--

INSERT INTO `viaje_estimado` (`etd`, `eta`, `kilometros`, `combustible`, `viaticos`, `pasajes_peajes`, `extras`, `hazard`, `reefer`, `fee`, `codigo`, `viaje_codigo`) VALUES
('2020-11-30', '2020-12-06', 1453, 1111111, 536, 875, 154, 'Granel', 'No', 111, 15, 1),
('2020-11-30', '2020-12-06', 2346, 1111111, 724, 367, 3646, 'Granel', 'No', 111, 16, 1),
('2020-11-30', '2020-12-06', 62366, 1111111, 477, 7473, 623, 'Granel', 'No', 111, 17, 1),
('2020-12-22', '2020-12-26', 16363, 423423, 43224, 24242, 42342, 'Granel', 'Si', 4232, 18, 1),
('2020-12-27', '2021-01-10', 4225, 543, 423, 432, 432, 'Granel', 'No', 543, 19, 1),
('2020-12-18', '2021-01-02', 312, 423, 432, 423, 23423, 'Granel', 'No', 423, 20, 1),
('2020-12-16', '2021-01-02', 42342, 432432, 423423, 423423, 32423, 'Granel', 'No', 424, 53, 1),
('2020-12-17', '2020-12-27', 123, 123, 123, 123, 123, 'Granel', 'No', 123, 54, 1),
('2020-12-17', '2020-12-27', 123, 123, 123, 123, 123, 'Granel', 'No', 123, 55, 1),
('2020-12-16', '2020-12-23', 200, 1200, 600, 500, 200, 'No', 'No', 10, 56, 1),
('2020-12-16', '2020-12-23', 200, 1200, 600, 500, 200, 'No', 'No', 10, 57, 1),
('2020-12-16', '2020-12-23', 200, 1200, 600, 500, 200, 'No', 'No', 10, 58, 1),
('2020-12-16', '2020-12-23', 200, 1200, 600, 500, 200, 'No', 'No', 10, 59, 1),
('2020-12-16', '2020-12-23', 200, 1200, 600, 500, 200, 'No', 'No', 10, 60, 1),
('2020-12-16', '2020-12-23', 200, 1200, 600, 500, 200, 'No', 'No', 10, 61, 1),
('2020-12-16', '2020-12-23', 200, 1200, 600, 500, 200, 'No', 'No', 10, 62, 1),
('2020-12-11', '2020-12-23', 312312, 312321, 312321, 312321, 12312, 'Granel', 'Si', 3123, 63, 1),
('2020-12-11', '2020-12-23', 312312, 312321, 312321, 312321, 12312, 'Granel', 'Si', 3123, 64, 1),
('2020-12-17', '2021-01-01', 100, 200, 300, 400, 500, 'Granel', 'Si', 600, 65, 1),
('2020-12-16', '2020-12-25', 111, 111, 111, 111, 111, 'Granel', 'No', 111, 66, 1),
('2020-12-16', '2020-12-25', 111, 111, 111, 111, 111, 'Granel', 'No', 111, 67, 1),
('2020-12-16', '2020-12-25', 111, 111, 111, 111, 111, 'Granel', 'No', 111, 68, 1),
('2020-12-27', '2020-12-20', 132, 132, 132, 132, 132, 'No', 'Si', 132, 69, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arrastre`
--
ALTER TABLE `arrastre`
  ADD PRIMARY KEY (`chasis`);

--
-- Indices de la tabla `arrastre_borrado`
--
ALTER TABLE `arrastre_borrado`
  ADD PRIMARY KEY (`chasis`);

--
-- Indices de la tabla `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `fk_carga_cliente` (`cuit`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cuit`),
  ADD KEY `viaje` (`viaje`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `usuario_borrado`
--
ALTER TABLE `usuario_borrado`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `id_mantenimiento` (`id_mantenimiento`);

--
-- Indices de la tabla `vehiculo_borrado`
--
ALTER TABLE `vehiculo_borrado`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `id_mantenimiento` (`id_mantenimiento`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `fk_viaje_cliente` (`cliente`),
  ADD KEY `fk_viaje_arrastre` (`arrastre`),
  ADD KEY `fk_viaje_carga` (`tipo_carga`);

--
-- Indices de la tabla `viaje_estimado`
--
ALTER TABLE `viaje_estimado`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carga`
--
ALTER TABLE `carga`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de la tabla `viaje_estimado`
--
ALTER TABLE `viaje_estimado`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `fk_carga_cliente` FOREIGN KEY (`cuit`) REFERENCES `cliente` (`cuit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_mantenimiento`) REFERENCES `mantenimiento` (`id_mantenimiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `fk_viaje_arrastre` FOREIGN KEY (`arrastre`) REFERENCES `arrastre` (`chasis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_viaje_carga` FOREIGN KEY (`tipo_carga`) REFERENCES `carga` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_viaje_cliente` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`cuit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
