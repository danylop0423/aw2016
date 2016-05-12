<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subastas destacadas</title>
    <link href="css/default.css" rel="stylesheet" type="text/css" />
    <link href="css/destacadas.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="all">

<?php
$app->doInclude('comun/cabecera.php');
?>


        <div id="contenedor">
            <h1>SUBASTAS DESTACADAS</h1>
            <div class="outstanding">
                <div class="product">
                    <img src="img/ps3.jpg" alt="" class="thumbnail">

                    <div class="description">
                        <a href="producto.php" class="title">Producto X</a>
                        <p class="remaining-time">
                            Tiempo restante: 00:04:20
                        </p>
                        <p class="lowest-bid">
                            Puja mínima: 5,00€
                        </p>
                    </div>
                </div>

                <div class="product">
                    <img src="img/iwatch.jpg" alt="" class="thumbnail">

                    <div class="description">
                        <a href="producto.php" class="title">Producto Y</a>
                        <p class="remaining-time">
                            Tiempo restante: 00:04:20
                        </p>
                        <p class="lowest-bid">
                            Puja mínima: 5,00€
                        </p>
                    </div>
                </div>

                <div class="product">
                    <img src="img/ps3.jpg" alt="" class="thumbnail">

                    <div class="description">
                        <a href="producto.php" class="title">Producto Z</a>
                        <p class="remaining-time">
                            Tiempo restante: 00:04:20
                        </p>
                        <p class="lowest-bid">
                            Puja mínima: 5,00€
                        </p>
                    </div>
                </div>

                <div class="product">
                    <img src="img/iwatch.jpg" alt="" class="thumbnail">

                    <div class="description">
                        <a href="producto.php" class="title">Producto W</a>
                        <p class="remaining-time">
                            Tiempo restante: 00:04:20
                        </p>
                        <p class="lowest-bid">
                            Puja mínima: 5,00€
                        </p>
                    </div>
                </div>

                <div class="product">
                    <img src="img/smartw1.png" alt="" class="thumbnail">

                    <div class="description">
                        <a href="producto.php" class="title">Producto X</a>
                        <p class="remaining-time">
                            Tiempo restante: 00:04:20
                        </p>
                        <p class="lowest-bid">
                            Puja mínima: 5,00€
                        </p>
                    </div>
                </div>

                <div class="product">
                    <img src="img/smartw2.png" alt="" class="thumbnail">

                    <div class="description">
                        <a href="producto.php" class="title">Producto Y</a>
                        <p class="remaining-time">
                            Tiempo restante: 00:04:20
                        </p>
                        <p class="lowest-bid">
                            Puja mínima: 5,00€
                        </p>
                    </div>
                </div>

                <div class="product">
                    <img src="img/smartw3.png" alt="" class="thumbnail">

                    <div class="description">
                        <a href="producto.php" class="title">Producto Z</a>
                        <p class="remaining-time">
                            Tiempo restante: 00:04:20
                        </p>
                        <p class="lowest-bid">
                            Puja mínima: 5,00€
                        </p>
                    </div>
                </div>

                <div class="product">
                    <img src="img/smartw4.png" alt="" class="thumbnail">

                    <div class="description">
                        <a href="producto.php" class="title">Producto W</a>
                        <p class="remaining-time">
                            Tiempo restante: 00:04:20
                        </p>
                        <p class="lowest-bid">
                            Puja mínima: 5,00€
                        </p>
                    </div>
                </div>

                <div class="product">
                    <img src="img/ps3.jpg" alt="" class="thumbnail">

                    <div class="description">
                        <a href="producto.php" class="title">Producto X</a>
                        <p class="remaining-time">
                            Tiempo restante: 00:04:20
                        </p>
                        <p class="lowest-bid">
                            Puja mínima: 5,00€
                        </p>
                    </div>
                </div>
            </div>
        </div>

 <?php
$app->doInclude('comun/pie.php');
?>
    </div>
</body>
</html>
