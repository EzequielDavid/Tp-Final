-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2020 a las 23:01:46
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
(123456, 'chicha', 'DP', 'ggg@123.com', '111', 0, '2020-11-08', 2, NULL),
(777777, 'eee', 'rrr', 'macadopazo@gmail.com', '888', 0, '2020-11-20', 0, 'ninguna'),
(2255888, 'Flash', 'dp', 'asd@111.com', '333', 0, '2020-11-02', 4, NULL),
(38286199, 'maca', 'Pazo', 'macadopazo@gmail.com', '456', NULL, NULL, 1, NULL),
(44444444, 'titan', 'dp', 'asb@789.com', '222', 0, '2020-11-02', 4, 'chau456');

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
  `tiempo_estimado` int(11) DEFAULT NULL,
  `tiempo_real` int(11) DEFAULT NULL,
  `tipo_carga` varchar(30) DEFAULT NULL,
  `id_factura` int(11) DEFAULT NULL,
  `matricula` varchar(30) DEFAULT NULL,
  `cliente` varchar(350) NOT NULL,
  `patente` varchar(30) NOT NULL,
  `id_combustible` int(11) NOT NULL,
  `id_gps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `estado`, `origen`, `destino`, `kilometro_viaje`, `tiempo_estimado`, `tiempo_real`, `tipo_carga`, `id_factura`, `matricula`, `cliente`, `patente`, `id_combustible`, `id_gps`) VALUES
(1, '', NULL, 'ninguno', NULL, NULL, NULL, NULL, NULL, 'ninguna', '', '', 0, 0),
(5, 'preparando despacho', NULL, 'Bs As', 35, NULL, NULL, NULL, NULL, 'chau456', 'Berta', 'hyh-789', 0, 0);

--
-- Índices para tablas volcadas
--

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
  ADD KEY `id_gps` (`id_gps`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `viaje`
--
ALTER TABLE `viaje`
  MODIFY `id_viaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
