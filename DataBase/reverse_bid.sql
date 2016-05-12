-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2016 a las 01:43:39
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `reverse_bid`
--
CREATE DATABASE IF NOT EXISTS `reverse_bid` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `reverse_bid`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `categoria`:
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(11) NOT NULL,
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `texto` varchar(246) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `comentarios`:
--   `origen`
--       `usuarios` -> `id`
--   `destino`
--       `subastador` -> `usuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `subcategoria` int(11) NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `caducidad` date NOT NULL,
  `fecha_alta` date NOT NULL,
  `descripcion` varchar(146) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `productos`:
--   `subcategoria`
--       `subcategoria` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas`
--

CREATE TABLE IF NOT EXISTS `pujas` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `subastador` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `ultimaPuja` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `pujas`:
--   `usuario`
--       `usuarios` -> `id`
--   `subastador`
--       `subastador` -> `usuario`
--   `producto`
--       `productos` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subasta`
--

CREATE TABLE IF NOT EXISTS `subasta` (
  `id` int(11) NOT NULL,
  `subastador` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `pujaMin` double NOT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `subasta`:
--   `subastador`
--       `subastador` -> `usuario`
--   `producto`
--       `productos` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastador`
--

CREATE TABLE IF NOT EXISTS `subastador` (
  `usuario` int(11) NOT NULL,
  `puntuacion` int(10) DEFAULT NULL,
  `empresa` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `cp` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `subastador`:
--   `usuario`
--       `usuarios` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `subcategoria`:
--   `categoria`
--       `categoria` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(8) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish2_ci NOT NULL,
  `calle` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `poblacion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_postal` varchar(5) COLLATE utf8_spanish2_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tarjeta` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `cvv` int(3) NOT NULL,
  `caduca` varchar(5) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `usuarios`:
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`), ADD KEY `origen` (`origen`), ADD KEY `destino` (`destino`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`), ADD KEY `subcategoria` (`subcategoria`);

--
-- Indices de la tabla `pujas`
--
ALTER TABLE `pujas`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `puja_usuario_producto` (`usuario`,`producto`), ADD KEY `subastador` (`subastador`), ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `subasta`
--
ALTER TABLE `subasta`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `subasta_usuario_producto` (`subastador`,`producto`), ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `subastador`
--
ALTER TABLE `subastador`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `subcat_categoria` (`categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pujas`
--
ALTER TABLE `pujas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subasta`
--
ALTER TABLE `subasta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `subastador` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`subcategoria`) REFERENCES `subcategoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pujas`
--
ALTER TABLE `pujas`
ADD CONSTRAINT `pujas_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pujas_ibfk_2` FOREIGN KEY (`subastador`) REFERENCES `subastador` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pujas_ibfk_3` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subasta`
--
ALTER TABLE `subasta`
ADD CONSTRAINT `subasta_ibfk_1` FOREIGN KEY (`subastador`) REFERENCES `subastador` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `subasta_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subastador`
--
ALTER TABLE `subastador`
ADD CONSTRAINT `subastador_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
