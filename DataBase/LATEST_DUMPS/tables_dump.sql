# ************************************************************
# Sequel Pro SQL dump
# Versión 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: homestead.dev (MySQL 5.7.9)
# Base de datos: reverse_bid
# Tiempo de Generación: 2016-06-26 21:31:27 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla categoria
# ------------------------------------------------------------

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



# Volcado de tabla comentarios
# ------------------------------------------------------------

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origen` int(11) NOT NULL,
  `destino` int(11) NOT NULL,
  `texto` varchar(246) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `origen` (`origen`),
  KEY `destino` (`destino`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



# Volcado de tabla productos
# ------------------------------------------------------------

CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `subcategoria` int(11) NOT NULL,
  `marca` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `subcategoria` (`subcategoria`),
  CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`subcategoria`) REFERENCES `subcategoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



# Volcado de tabla pujas
# ------------------------------------------------------------

CREATE TABLE `pujas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `subasta` int(11) NOT NULL,
  `valor` double DEFAULT NULL,
  `ganadora` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usuario_puja` (`usuario`),
  KEY `subasta_puja` (`subasta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



# Volcado de tabla subasta
# ------------------------------------------------------------

CREATE TABLE `subasta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subastador` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `pujaMin` double NOT NULL,
  `caducidad` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `producto` (`producto`),
  KEY `subasta_usuario_producto` (`subastador`,`producto`),
  CONSTRAINT `subasta_ibfk_1` FOREIGN KEY (`subastador`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `subasta_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



# Volcado de tabla subcategoria
# ------------------------------------------------------------

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



# Volcado de tabla usuarios
# ------------------------------------------------------------

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(73) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `foto` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tarjeta` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `calle` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `telefono` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `cvv` varchar(3) COLLATE utf8_spanish2_ci NOT NULL,
  `caduca` varchar(255) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '',
  `ciudad` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `poblacion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_postal` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `salt` varchar(12) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
