-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2016 a las 00:15:53
-- Versión del servidor: 5.5.40
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `reverse_bid`
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`, `apellido`, `foto`, `tarjeta`, `cvv`, `caduca`, `direccion`) VALUES(1, 'elenadonea@gmail.com', 'elena24', 'Elena', 'Donea', 'img/avatar2.png', '1000000000000006', 105, '2016-01-00', 'alguna calle');
INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`, `apellido`, `foto`, `tarjeta`, `cvv`, `caduca`, `direccion`) VALUES(2, 'danylop0423@hotmail.com', 'aguacate', 'Dani', 'Reyes', 'img/avatar2.png', '1000000000000009', 250, '2018-05-00', 'otra calle');
INSERT INTO `usuarios` (`id`, `email`, `password`, `nombre`, `apellido`, `foto`, `tarjeta`, `cvv`, `caduca`, `direccion`) VALUES(3, 'ivan@ucm.es', 'ivan18', 'Ivan', 'Canas', 'img/avatar2.png', '1000000000000004', 104, '2021-09-00', 'por ahi');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
