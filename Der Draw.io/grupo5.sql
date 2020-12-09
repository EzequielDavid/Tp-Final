-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2020 a las 22:09:47
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
  `patente` varchar(30) NOT NULL,
  `modelo` varchar(350) NOT NULL,
  `tipo` varchar(300) NOT NULL,
  `codigo` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arrastre`
--

INSERT INTO `arrastre` (`patente`, `modelo`, `tipo`, `codigo`, `estado`) VALUES
('abc-654', 'ford', 'container', 0, 'disponible'),
('hyh-789', 'ford', 'jaula', 9, 'disponible'),
('yui-999', '', 'container', 9, 'disponible');

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
  `cuit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carga`
--

INSERT INTO `carga` (`codigo`, `tipo`, `peso_neto`, `hazard`, `imo_class`, `reefer`, `temperatura`, `cuit`) VALUES
(9, 'Granel', 20, 'No', 'null', 'No', 0, 2147483647);

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
('hhhhh', 2147483647, 'Costa Rica 689', 2147483647, 'macadopazo@gmail.com', '789', '456', 0);

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

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id_mantenimiento`, `fecha_mantenimiento`, `costo`, `detalle_service`, `id_repuestos`) VALUES
(0, '2020-12-08', '5000.00', 'se arregló el motor', NULL);

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
(0, 'asginar'),
(1, 'administrador'),
(2, 'supervisor'),
(3, 'encargadoDeTaller'),
(4, 'chofer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pasword` varchar(30) DEFAULT NULL,
  `licencia_conduccion` int(11) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `matricula` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `apellido`, `email`, `pasword`, `licencia_conduccion`, `fecha_nac`, `id_rol`, `matricula`) VALUES
(111, 'administrador', 'adm', 'administrador@gmail.com', '123', NULL, '1989-03-25', 1, NULL),
(222, 'supervisor', 'super', 'supervisor@gmail.com', '123', 0, '2020-11-02', 2, NULL),
(333, 'encargado', 'de taller', 'encargado@gmail.com', '123', NULL, '1984-02-01', 3, NULL),
(123456, 'chicha', 'DP', 'ggg@123.com', '111', 0, '2020-11-08', 2, NULL),
(888888, 'hola', 'dp', 'asb@789.com', '888', NULL, '2020-12-07', 4, 'hola123'),
(987654, 'chofer', '999', 'ggg@123.com', '1', NULL, '2021-01-05', 4, 'chau456'),
(2255888, 'Flash', 'dp', 'asd@111.com', '333', 0, '2020-11-02', 4, 'ninguna'),
(38286199, 'maca', 'Pazo', 'macadopazo@gmail.com', '456', NULL, NULL, 1, NULL),
(44444444, 'titan', 'dp', 'asb@789.com', '222', 0, '2020-11-02', 4, 'ninguna');

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
  `estado` varchar(20) DEFAULT NULL,
  `posicion_gps` varchar(60) DEFAULT NULL,
  `kilometros_recorridos` int(11) DEFAULT NULL,
  `aÃ±o_fabricacion` date DEFAULT NULL,
  `numero_chasis` varchar(30) DEFAULT NULL,
  `numero_motor` varchar(30) DEFAULT NULL,
  `alarma` varchar(20) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `id_mantenimiento` int(11) DEFAULT NULL,
  `ultimo_service` date DEFAULT NULL,
  `patente` varchar(50) NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `estado`, `posicion_gps`, `kilometros_recorridos`, `aÃ±o_fabricacion`, `numero_chasis`, `numero_motor`, `alarma`, `marca`, `modelo`, `id_mantenimiento`, `ultimo_service`, `patente`, `latitud`, `longitud`) VALUES
('chau456', 'ocupado', NULL, NULL, NULL, NULL, NULL, NULL, 'chevrolet', NULL, NULL, NULL, 'hyh-789', 0, 0),
('hola123', 'ocupado', NULL, 4500, '2020-11-10', NULL, NULL, NULL, 'Ford', NULL, NULL, '2020-12-08', 'yui-999', -34.62360066948015, -58.786024912718204),
('ninguna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0);

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
  `tiempo_estimado` int(11) DEFAULT NULL,
  `tiempo_real` int(11) DEFAULT NULL,
  `tipo_carga` varchar(30) DEFAULT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `matricula` varchar(30) DEFAULT NULL,
  `cliente` int(11) NOT NULL,
  `id_combustible` int(11) NOT NULL,
  `fecha_carga` date DEFAULT NULL,
  `eta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `estado`, `origen`, `destino`, `kilometro_viaje`, `tiempo_estimado`, `tiempo_real`, `tipo_carga`, `id_factura`, `matricula`, `cliente`, `id_combustible`, `fecha_carga`, `eta`) VALUES
(1, '', NULL, 'ninguno', NULL, NULL, NULL, NULL, NULL, 'ninguna', 0, 0, NULL, NULL),
(60, 'preparando despacho', 'bs AS', 'Chubut', NULL, NULL, NULL, NULL, NULL, 'hola123', 2147483647, 0, '2021-01-01', '2021-01-02');

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
('2020-11-30', '2020-12-06', 1111, 1111111, 11111, 1111, 1111, 'Granel', 'No', 111, 17, 1),
('2021-01-01', '2021-01-02', 50000, 20000, 3000, 4000, 4000, 'No', 'No', 4444, 18, 1),
('2021-01-01', '2021-01-02', 50000, 20000, 3000, 4000, 4000, 'No', 'No', 4444, 19, 1),
('2021-01-01', '2021-01-02', 50000, 20000, 3000, 4000, 4000, 'No', 'No', 4444, 20, 1),
('2021-01-01', '2021-01-02', 50000, 20000, 3000, 4000, 4000, 'No', 'No', 4444, 21, 1),
('2021-01-01', '2021-01-02', 50000, 20000, 3000, 4000, 4000, 'No', 'No', 4444, 22, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arrastre`
--
ALTER TABLE `arrastre`
  ADD PRIMARY KEY (`patente`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cuit` (`cuit`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cuit`),
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
  ADD KEY `id_mantenimiento` (`id_mantenimiento`),
  ADD KEY `patente` (`patente`);

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
  ADD KEY `id_combustible` (`id_combustible`);

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
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `viaje_estimado`
--
ALTER TABLE `viaje_estimado`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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