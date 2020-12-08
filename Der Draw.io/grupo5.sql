-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2020 a las 01:18:25
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
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE `carga` (
  `codigo` int(11) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `peso_neto` int(11) NOT NULL,
  `hazard` varchar(5) NOT NULL,
  `imo_class` varchar(250) DEFAULT NULL,
  `reefer` varchar(5) NOT NULL,
  `temperatura` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carga`
--

INSERT INTO `carga` (`codigo`, `tipo`, `peso_neto`, `hazard`, `imo_class`, `reefer`, `temperatura`) VALUES
(4, 'Granel', 13, 'No', 'null', 'No', 0);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `kilometro_viaje_total` int(11) DEFAULT NULL,
  `costo_total` decimal(9,2) DEFAULT NULL,
  `tipo_carga` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(11) NOT NULL,
  `fecha_mantenimiento` date DEFAULT NULL,
  `costo` decimal(9,2) DEFAULT NULL,
  `detalle_service` varchar(100) DEFAULT NULL,
  `id_repuestos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id_repuestos` int(11) NOT NULL,
  `descricpion_repuesto` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'Encargado de taller'),
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
  `matricula` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellido`, `email`, `pasword`, `licencia_conduccion`, `fecha_nac`, `id_rol`, `matricula`) VALUES
(111, 'administrador', 'adm', 'administrador@gmail.com', '123', NULL, '1989-03-25', 1, NULL),
(222, 'supervisor', 'super', 'supervisor@gmail.com', '123', 0, '2020-11-02', 2, NULL),
(333, 'encargado', 'de taller', 'encargado@gmail.com', '123', NULL, '1984-02-01', 3, NULL);

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
(543, 'ter', 'tre', 'tre', 'tr', 432, '2020-12-01', 3, 'AA342QZ'),
(123456, 'chicha', 'DP', 'ggg@123.com', '111', 0, '2020-11-08', 2, NULL),
(2255888, 'Flash', 'dp', 'asd@111.com', '333', 0, '2020-11-02', 4, NULL);

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
  `estado` varchar(20) NOT NULL,
  `posicion_gps` varchar(60) DEFAULT NULL,
  `kilometros_recorridos` int(11) NOT NULL,
  `anio_fabricacion` date NOT NULL,
  `numero_chasis` varchar(30) NOT NULL,
  `numero_motor` varchar(30) NOT NULL,
  `alarma` varchar(20) DEFAULT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `id_mantenimiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `estado`, `posicion_gps`, `kilometros_recorridos`, `anio_fabricacion`, `numero_chasis`, `numero_motor`, `alarma`, `marca`, `modelo`, `id_mantenimiento`) VALUES
('AA123CD', 'Disponible', NULL, 0, '2016-07-30', 'L53879558', '53879558', NULL, 'IVECO', 'Cursor', NULL),
('AA124DC', 'Disponible', NULL, 0, '2012-03-04', 'R69904367', '69904367', NULL, 'IVECO', 'Cursor', NULL),
('AA150QW', 'Disponible', NULL, 0, '2020-12-19', 'I82039512', '82039512', NULL, 'SCANIA', 'G310', NULL),
('AA211ZX', 'Disponible', NULL, 0, '2020-01-16', 'N82836641', '82836641', NULL, 'IVECO', 'Cursor', NULL),
('AA233SS', 'Disponible', NULL, 0, '2018-03-20', 'K26139668', '26139668', NULL, 'IVECO', 'Cursor', NULL),
('AA342QZ', 'Disponible', NULL, 0, '2017-07-02', 'C72582865', '72582865', NULL, 'SCANIA', 'G410', NULL),
('AA534QD', 'Disponible', NULL, 0, '2013-03-13', 'A21357689', '21357689', NULL, 'SCANIA', 'G460', NULL),
('AA726QW', 'Disponible', NULL, 0, '2017-05-04', 'C54650513', '54650513', NULL, 'M.BENZ', 'Actros 1846', NULL),
('AA918QZ', 'Disponible', NULL, 0, '2018-03-31', 'C31256965', '31256965', NULL, 'M.BENZ', 'Actros 1846', NULL),
('AB198QZ', 'Disponible', NULL, 0, '2019-11-07', 'V18389741', '18389741', NULL, 'SCANIA', 'G410', NULL),
('AB390QD', 'Disponible', NULL, 0, '2016-07-30', 'Z32041290', '32041290', NULL, 'SCANIA', 'G460', NULL),
('AB582QW', 'Disponible', NULL, 0, '2020-08-08', 'V17800122', '17800122', NULL, 'M.BENZ', 'Actros 1846', NULL),
('AB774QZ', 'Disponible', NULL, 0, '2017-04-20', 'J46753468', '46753468', NULL, 'M.BENZ', 'Actros 1846', NULL),
('AB900QW', 'Disponible', NULL, 0, '2017-04-02', 'F44301415', '44301415', NULL, 'IVECO', 'Cursor', NULL),
('AB966QD', 'Disponible', NULL, 0, '2015-10-09', 'B32632699', '32632699', NULL, 'M.BENZ', 'Actros 1846', NULL),
('AC246QD', 'Disponible', NULL, 0, '2018-10-17', 'O62500687', '62500687', NULL, 'SCANIA', 'G460', NULL),
('AC342WW', 'Disponible', NULL, 0, '2016-05-28', 'D44260023', '44260023', NULL, 'IVECO', 'Cursor', NULL),
('AC438QW', 'Disponible', NULL, 0, '2015-06-22', 'W54712451', '54712451', NULL, 'SCANIA', 'G310', NULL),
('AC452WE', 'Disponible', NULL, 0, '2019-02-06', 'R28204636', '28204636', NULL, 'IVECO', 'Cursor', NULL),
('AC630QZ', 'Disponible', NULL, 0, '2019-07-12', 'G88648319', '88648319', NULL, 'M.BENZ', 'Actros 1846', NULL),
('AC822QD', 'Disponible', NULL, 0, '2016-02-18', 'J60916748', '60916748', NULL, 'M.BENZ', 'Actros 1846', NULL),
('AC989QW', 'Disponible', NULL, 0, '2015-03-04', 'F64092078', '64092078', NULL, 'M.BENZ', 'Actros 1846', NULL),
('AD200XS', 'Disponible', NULL, 0, '2015-01-19', 'R57193968', '57193968', NULL, 'IVECO', 'Cursor', NULL),
('AD294QW', 'Disponible', NULL, 0, '2020-09-24', 'T27510702', '27510702', NULL, 'SCANIA', 'G310', NULL),
('AD486QZ', 'Disponible', NULL, 0, '2014-05-05', 'L56284263', '56284263', NULL, 'SCANIA', 'G410', NULL),
('AD678QD', 'Disponible', NULL, 0, '2018-06-02', 'C23849041', '23849041', NULL, 'M.BENZ', 'Actros 1846', NULL),
('AD870QW', 'Disponible', NULL, 0, '2019-11-06', 'M30207594', '30207594', NULL, 'M.BENZ', 'Actros 1846', NULL);

--
-- Disparadores `vehiculo`
--
DELIMITER $$
CREATE TRIGGER `darBajaVehiculo` AFTER DELETE ON `vehiculo` FOR EACH ROW INSERT INTO `vehiculo_borrado` (`matricula`, `estado`, `posicion_gps`, `kilometros_recorridos`, `anio_fabricacion`, `numero_chasis`, `numero_motor`, `alarma`, `marca`, `modelo`, `id_mantenimiento`) VALUES (OLD.matricula, OLD.estado, OLD.posicion_gps, OLD.kilometros_recorridos, OLD.anio_fabricacion, OLD.numero_chasis, OLD.numero_motor, OLD.alarma, OLD.marca, OLD.modelo, OLD.id_mantenimiento)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_borrado`
--

CREATE TABLE `vehiculo_borrado` (
  `matricula` varchar(30) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `posicion_gps` varchar(60) DEFAULT NULL,
  `kilometros_recorridos` int(11) NOT NULL,
  `anio_fabricacion` date NOT NULL,
  `numero_chasis` varchar(30) NOT NULL,
  `numero_motor` varchar(30) NOT NULL,
  `alarma` varchar(20) DEFAULT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `id_mantenimiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo_borrado`
--

INSERT INTO `vehiculo_borrado` (`matricula`, `estado`, `posicion_gps`, `kilometros_recorridos`, `anio_fabricacion`, `numero_chasis`, `numero_motor`, `alarma`, `marca`, `modelo`, `id_mantenimiento`) VALUES
('chau456', 'ocupado', NULL, 0, '0000-00-00', '', '', NULL, 'chevrolet', '', NULL),
('FDSDS', 'FDA', 'FDA', 2, '2020-12-01', '432EW', 'FDS', NULL, 'FDS', 'FDS', NULL),
('hola123', 'disponible', NULL, 4500, '2020-11-10', '', '', NULL, 'Ford', '', NULL),
('ninguna', '', NULL, 0, '0000-00-00', '', '', NULL, '', '', NULL);

--
-- Disparadores `vehiculo_borrado`
--
DELIMITER $$
CREATE TRIGGER `darAltaVehiculo` AFTER DELETE ON `vehiculo_borrado` FOR EACH ROW INSERT INTO `vehiculo` (`matricula`, `estado`, `posicion_gps`, `kilometros_recorridos`, `anio_fabricacion`, `numero_chasis`, `numero_motor`, `alarma`, `marca`, `modelo`, `id_mantenimiento`) VALUES (OLD.matricula, OLD.estado, OLD.posicion_gps, OLD.kilometros_recorridos, OLD.anio_fabricacion, OLD.numero_chasis, OLD.numero_motor, OLD.alarma, OLD.marca, OLD.modelo, OLD.id_mantenimiento)
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
  `kilometro_viaje` int(11) DEFAULT NULL,
  `fecha_carga` date DEFAULT NULL,
  `eta` date DEFAULT NULL,
  `tipo_carga` varchar(30) DEFAULT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `matricula` varchar(30) DEFAULT NULL,
  `cliente` int(250) NOT NULL,
  `patente` varchar(30) NOT NULL,
  `id_combustible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `estado`, `origen`, `destino`, `kilometro_viaje`, `fecha_carga`, `eta`, `tipo_carga`, `id_factura`, `matricula`, `cliente`, `patente`, `id_combustible`) VALUES
(52, '', '111', '111', NULL, '2020-11-30', '2020-12-06', NULL, NULL, NULL, 1, '', 0),
(53, '', '111', '111', NULL, '2020-11-30', '2020-12-06', NULL, NULL, NULL, 1, '', 0),
(54, '', '111', '111', NULL, '2020-11-30', '2020-12-06', NULL, NULL, NULL, 1, '', 0),
(55, '', '11', '11111111111111', NULL, '2020-11-30', '2020-12-06', NULL, NULL, NULL, 1, '', 0);

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
('2020-11-30', '2020-12-06', 1111, 1111111, 11111, 1111, 1111, 'Granel', 'No', 111, 15, 1),
('2020-11-30', '2020-12-06', 1111, 1111111, 11111, 1111, 1111, 'Granel', 'No', 111, 16, 1),
('2020-11-30', '2020-12-06', 1111, 1111111, 11111, 1111, 1111, 'Granel', 'No', 111, 17, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD KEY `viaje` (`viaje`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `id_repuestos` (`id_repuestos`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id_repuestos`);

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
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `matricula` (`matricula`),
  ADD KEY `patente` (`patente`),
  ADD KEY `id_combustible` (`id_combustible`),
  ADD KEY `cliente` (`cliente`);

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
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `viaje_estimado`
--
ALTER TABLE `viaje_estimado`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`id_repuestos`) REFERENCES `repuestos` (`id_repuestos`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_mantenimiento`) REFERENCES `mantenimiento` (`id_mantenimiento`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`matricula`) REFERENCES `vehiculo` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
