-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-12-2022 a las 21:23:37
-- Versión del servidor: 8.0.27
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_ROL` int NOT NULL,
  `ROL` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_ROL`, `ROL`) VALUES
(1, 'Administrador'),
(2, 'Comprador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int NOT NULL,
  `NOMBRE` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `APELLIDO` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EDAD` int NOT NULL,
  `FOTO` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `TIPO_DOCUMENTO` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOCUMENTO` int NOT NULL,
  `ID_ROL` int NOT NULL,
  `FECHA` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOMBRE`, `APELLIDO`, `EDAD`, `FOTO`, `TIPO_DOCUMENTO`, `DOCUMENTO`, `ID_ROL`, `FECHA`) VALUES
(1, 'Albert', 'Ramirez', 24, NULL, 'NIT', 124356789, 2, '2022-12-15 19:56:51'),
(2, 'Daniel Arias', 'Baron', 32, NULL, 'RUC', 32113651, 2, '2022-12-15 20:12:10'),
(3, 'Bryan', 'Ramirez', 22, NULL, 'Cedula', 3546567, 1, '2022-12-15 20:17:31'),
(4, 'Hugo', 'SAIZ', 4, NULL, 'Tarjeta Identidad', 345676543, 1, '2022-12-15 20:49:26'),
(5, 'Alejandra', 'Cortes Cardona', 23, NULL, 'RUC', 12343122, 2, '2022-12-15 20:51:38'),
(6, 'Liliana', 'Baron', 43, NULL, 'NIT', 253462345, 2, '2022-12-15 20:57:58'),
(7, 'ALBERTO', 'Baron', 43, NULL, 'RUC', 125213, 1, '2022-12-18 14:23:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_ROL`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_rol` (`ID_ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_ROL` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`ID_ROL`) REFERENCES `rol` (`ID_ROL`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
