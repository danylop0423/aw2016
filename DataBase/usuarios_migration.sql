BEGIN;

-- CHANGE "NAME" OF "FIELD "direccion" -------------------------
ALTER TABLE `usuarios` CHANGE `direccion` `calle` VarChar( 50 ) NULL;
-- -------------------------------------------------------------

-- CREATE FIELD "nombre" ---------------------------------------
ALTER TABLE `usuarios` ADD COLUMN `nombre` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL;
-- -------------------------------------------------------------

-- CREATE FIELD "apellidos" ------------------------------------
ALTER TABLE `usuarios` ADD COLUMN `apellidos` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL;
-- -------------------------------------------------------------

-- CREATE FIELD "telefono" -------------------------------------
ALTER TABLE `usuarios` ADD COLUMN `telefono` VarChar( 9 ) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL;
-- -------------------------------------------------------------

-- CREATE FIELD "cvv" ------------------------------------------
ALTER TABLE `usuarios` ADD COLUMN `cvv` VarChar( 3 ) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL;
-- -------------------------------------------------------------

-- CREATE FIELD "caducidad_tarjeta" ----------------------------
ALTER TABLE `usuarios` ADD COLUMN `caducidad_tarjeta` VarChar( 10 ) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL;
-- -------------------------------------------------------------

-- CREATE FIELD "ciudad" ---------------------------------------
ALTER TABLE `usuarios` ADD COLUMN `ciudad` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL;
-- -------------------------------------------------------------

-- CREATE FIELD "poblacion" ------------------------------------
ALTER TABLE `usuarios` ADD COLUMN `poblacion` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL;
-- -------------------------------------------------------------

-- CREATE FIELD "codigo_postal" --------------------------------
ALTER TABLE `usuarios` ADD COLUMN `codigo_postal` VarChar( 6 ) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL;
-- -------------------------------------------------------------

COMMIT;