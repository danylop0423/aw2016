<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="UTF-8">
    <title>Subastar producto</title>
    <link href="css/default.css" rel="stylesheet" type="text/css" />
    <link href="css/subastar.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="all">

  <?php
$app->doInclude('comun/cabecera.php');
?>

    <div id="contenedor">
        <div class="content">
            <div class="box">
                <form action="">
                    <label for="cat">Escoge producto*:</label>
                    <select name="cat" id="cat" class="input-form">
                        <option value="">Seleccione una categoría</option>
                        <option value="tv">Televisiones</option>
                        <option value="sound">Sonido</option>
                        <option value="it">Informática</option>
                        <option value="smartphones">Smartphones</option>
                    </select>
                    <br><br>

                    <label for="name">Nombre producto*:</label>
                    <input type="text" id="name" placeholder="Nombre del producto" class="input-form">
                    <br><br>

                    <label for="bid">Puja mínima en €*:</label>
                    <input type="text" class="input-form price-input" id="bid" placeholder="Puja mínima">
                    <br><br>

                    <label for="new">Producto nuevo</label>
                    <input type="radio" name="query" id="new" value="new_product">
                    <label for="used">Producto usado</label>
                    <input type="radio" name="query" id="used" value="used_product">
                    <br><br>

                    <label for="pic">Imagen del producto*:</label>
                    <input type="file" id="pic" placeholder="Imagen del producto" class="input-form">
                    <br><br>

                    <div class="message-container">
                        <label for="message">Mensaje:</label>
                        <textarea name="description" id="message" cols="45" rows="10" required></textarea>
                    </div>

                    <input type="submit" class="btn" value="Añadir subasta">
                </form>
            </div>
        </div>

        <div class="col">
            <div class="box">
                <a href="miperfil.php#missubastas">Productos subastados</a>
                <a href="miperfil.php#mispujas">Mis pujas</a>
                <a href="login.php">Cerrar sesión</a>
            </div>
        </div>
    </div>

 <?php
$app->doInclude('comun/pie.php');
?>

  </div>
</body>
</html>
