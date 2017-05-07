CREATE TABLE `pujas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `subasta` int(11) NOT NULL,
  `valor` double DEFAULT NULL,
  `ganadora` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usuario_puja` (`usuario`),
  KEY `subasta_puja` (`subasta`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;