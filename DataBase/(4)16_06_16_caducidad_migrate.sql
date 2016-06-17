ALTER TABLE `subasta` ADD `caducidad` DATETIME NULL DEFAULT NULL AFTER `pujaMin`;

ALTER TABLE `productos`  DROP `caducidad`;
