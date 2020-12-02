-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2020 a las 23:52:10
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

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`denominacion`, `cuit`, `direccion`, `telefono`, `email`, `contacto1`, `contacto2`, `viaje`) VALUES
('funciona', 132, 'funciona', 123, 'funciona@gmail.com', 'funciona', 'funciona', 0),
('111', 111111, '1', 11111, 'a@gmail.com', '11111111', '1111111', 0),
('22222', 2222, '1111111', 22222, 'e222@gmail.com', '22222222222', '1111222222222222222222222', 0),
('333333', 2147483647, '3333333333333333333', 33333333, 'adasd@gmail.com', '333333333333333333333333333', '33333333333333333333333', 0);

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
(111, 'administrador', 'admin', 'administrador@gmail.com', '123', NULL, NULL, 1, NULL),
(222, 'supervisor', 'super', 'supervisor@gmail.com', '123', 0, '2020-11-02', 2, 'chau456'),
(123456, 'chicha', 'DP', 'ggg@123.com', '111', 0, '2020-11-08', 2, NULL),
(2255888, 'Flash', 'dp', 'asd@111.com', '333', 0, '2020-11-02', 4, NULL);

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
  `id_mantenimiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`matricula`, `estado`, `posicion_gps`, `kilometros_recorridos`, `aÃ±o_fabricacion`, `numero_chasis`, `numero_motor`, `alarma`, `marca`, `modelo`, `id_mantenimiento`) VALUES
('chau456', 'ocupado', NULL, NULL, NULL, NULL, NULL, NULL, 'chevrolet', NULL, NULL),
('hola123', 'disponible', NULL, 4500, '2020-11-10', NULL, NULL, NULL, 'Ford', NULL, NULL),
('ninguna', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_real`
--

CREATE TABLE `viaje_real` (
  `etd` date NOT NULL,
  `eta` date NOT NULL,
  `kilometros` int(11) NOT NULL,
  `combustible` int(11) NOT NULL,
  `viaticos` int(11) NOT NULL,
  `pasajes_peajes` int(11) NOT NULL,
  `extras` int(11) NOT NULL,
  `hazard` int(11) NOT NULL,
  `reefer` int(11) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
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
