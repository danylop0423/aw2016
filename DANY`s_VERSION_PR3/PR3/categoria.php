<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="UTF-8">
    <title>Categoría</title>
    <link href="css/default.css" rel="stylesheet" type="text/css" />
    <link href="css/categoria.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="all">

  <?php
$app->doInclude('comun/cabecera.php');
?>

    <div id="contenedor">
        <div class="content">
            <div class="menu">
                <h2>Electrónica</h2>

                <p class="list-title">Encuentra:</p>
                <ul>
                    <li><a href="subcategoria.php">Móviles y Tablets</a></li>
                    <li><a href="subcategoria.php">PC y Juegos</a></li>
                    <li><a href="subcategoria.php">TV</a></li>
                    <li><a href="subcategoria.php">Consolas y Videojuegos</a></li>
                </ul>
            </div>

            <div class="banner">
                <img src="img/subcatbanner.png" alt="">
            </div>

            <div class="user-menu">
                <div class="box">
                    <a href="miperfil.php#mispujas">Mis pujas</a>
                    <a href="subastar.php">Subastar producto</a>
                </div>
            </div>
        </div>

        <div class="outstanding">
            <h3>Subastas destacadas:</h3>

            <div class="product">
                <img src="img/ps3.jpg" alt="" class="thumbnail">
                <p class="title">Producto X</p>
                <p class="remaining-time">
                    Tiempo restante: 00:04:20
                </p>
                <p class="lowest-bid">
                    Puja mínima: 5,00€
                </p>
            </div>

            <div class="product">
                <img src="img/iwatch.jpg" alt="" class="thumbnail">
                <p class="title">Producto Y</p>
                <p class="remaining-time">
                    Tiempo restante: 00:04:20
                </p>
                <p class="lowest-bid">
                    Puja mínima: 5,00€
                </p>
            </div>

            <div class="product">
                <img src="img/ps3.jpg" alt="" class="thumbnail">
                <p class="title">Producto Z</p>
                <p class="remaining-time">
                    Tiempo restante: 00:04:20
                </p>
                <p class="lowest-bid">
                    Puja mínima: 5,00€
                </p>
            </div>

            <div class="product">
                <img src="img/iwatch.jpg" alt="" class="thumbnail">
                <p class="title">Producto W</p>
                <p class="remaining-time">
                    Tiempo restante: 00:04:20
                </p>
                <p class="lowest-bid">
                    Puja mínima: 5,00€
                </p>
            </div>
        </div>
    </div>

  <?php
$app->doInclude('comun/cabecera.php');
?>

  </div>
</body>
</html>
