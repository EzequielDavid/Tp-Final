DROP DATABASE IF EXISTS grupo5;
CREATE DATABASE IF NOT EXISTS grupo5;

USE grupo5;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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
(191, 'admin', 'administrador', 'admin@gmail.com', '123', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`);
COMMIT;