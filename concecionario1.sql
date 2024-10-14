-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2024 a las 21:22:23
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
  `FechaFundacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas1`
--

INSERT INTO `marcas1` (`id`, `Marca`, `Origen`, `FechaFundacion`) VALUES
(1, 'Honda', 'Japon', '24 de Septiembre de 1948'),
(2, 'Toyota', 'Japon', '28 de Agosto 1937'),
(3, 'Ford', 'Estados Unidos', '16 de junio de 1903');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Kilometros` int(50) NOT NULL,
  `Patente` varchar(20) NOT NULL,
  `Detalles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `Marca`, `Kilometros`, `Patente`, `Detalles`) VALUES
(1, 'Ford', 120, 'LFG-270', 'Ford Focus TITANIUM'),
(2, 'Honda', 20000, 'AC-123-DB', 'Honda Civic 2018'),
(3, 'Toyota', 180000, 'MFM639', 'Hilux SRV 2013');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
