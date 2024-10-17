-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 06:08:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concecionario1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas1`
--

CREATE TABLE `marcas1` (
  `id` int(11) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Origen` varchar(50) NOT NULL,
  `FechaFundacion` varchar(50) NOT NULL,
  `finalizada` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas1`
--

INSERT INTO `marcas1` (`id`, `Marca`, `Origen`, `FechaFundacion`, `finalizada`) VALUES
(1, 'Honda', 'Japon', '24 de Septiembre de 1948', NULL),
(2, 'Toyota', 'Japon', '28 de Agosto 1937', NULL),
(12, 'Ford', 'nose', 'nose', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(250) NOT NULL,
  `contraseña` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_usuario`, `contraseña`) VALUES
(6, 'webadmin', '$2y$10$.AtunnhDtzsFULbt8SrZxOzXkCY7rvbSpGpSYVjo5Qfz90XOky72K');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Kilometros` int(50) NOT NULL,
  `Patente` varchar(20) NOT NULL,
  `Modelo` varchar(50) NOT NULL,
  `finalizada` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `Marca`, `Kilometros`, `Patente`, `Modelo`, `finalizada`) VALUES
(5, 'Honda', 20000, 'AC-123-DB', 'Civic 2018', NULL),
(7, 'Toyota', 120, 'MFM639', 'Hilux CRV', NULL),
(8, 'Ford', 120, 'LFG-270', 'Ranger 2012 2.5', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marcas1`
--
ALTER TABLE `marcas1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Marca` (`Marca`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Marca` (`Marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marcas1`
--
ALTER TABLE `marcas1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`Marca`) REFERENCES `marcas1` (`Marca`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
