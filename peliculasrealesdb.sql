-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2022 a las 04:19:50
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculasrealesdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`) VALUES
(1, 'Barranquilla'),
(2, 'Cartagena'),
(3, 'Santander'),
(4, 'Medellin'),
(5, 'Cali'),
(6, 'Bogota'),
(7, 'Malambo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `ciudad` int(11) NOT NULL,
  `tipo_negocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `ciudad`, `tipo_negocio`) VALUES
(11, 'Diego Benavides', 1, 1),
(12, 'xd', 7, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoscabecera`
--

CREATE TABLE `pedidoscabecera` (
  `id` int(11) NOT NULL,
  `valor_total` float NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidoscabecera`
--

INSERT INTO `pedidoscabecera` (`id`, `valor_total`, `cliente`) VALUES
(12, 5, 1),
(13, 3, 7),
(14, 4, 7),
(15, 2, 11),
(16, 5, 11),
(17, 4, 11),
(18, 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoscuerpo`
--

CREATE TABLE `pedidoscuerpo` (
  `id` int(11) NOT NULL,
  `valor_total` float NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidoscuerpo`
--

INSERT INTO `pedidoscuerpo` (`id`, `valor_total`, `nombre`) VALUES
(1, 15000, 'CrispetasL'),
(2, 10000, 'CrispetasM'),
(3, 7000, 'CrispetasS'),
(4, 2500, 'Gaseosa'),
(5, 3500, 'HotDog'),
(6, 2000, 'Agua'),
(7, 5000, 'Chocolate');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiponegocios`
--

CREATE TABLE `tiponegocios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiponegocios`
--

INSERT INTO `tiponegocios` (`id`, `nombre`) VALUES
(1, 'Autonomo'),
(2, 'Sociedad limitada'),
(3, 'Sociedad anónima'),
(4, 'Comunidad de bienes'),
(5, 'Sociedad laboral');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidoscabecera`
--
ALTER TABLE `pedidoscabecera`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidoscuerpo`
--
ALTER TABLE `pedidoscuerpo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiponegocios`
--
ALTER TABLE `tiponegocios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pedidoscabecera`
--
ALTER TABLE `pedidoscabecera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pedidoscuerpo`
--
ALTER TABLE `pedidoscuerpo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tiponegocios`
--
ALTER TABLE `tiponegocios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
