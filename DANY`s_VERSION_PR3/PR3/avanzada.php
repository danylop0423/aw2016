<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="UTF-8">
	<title>ReverseBid: Búsqueda Avanzada</title>
    <link id="estilo" href="css/default.css" rel="stylesheet" type="text/css" />
	<link id="estilo_avanzada" href="css/avanzada.css" media="screen" rel="stylesheet" type="text/css" />
</head>


<body>
 <div id="all">

 <?php
$app->doInclude('comun/cabecera.php');
?>

   <div id="contenedor">

   	<!---------------------------------------- INICIO BUSQUEDA AVANZADA ------------------------------>

	   	<div id="busqueda_avanzada">

		   	<form class="form_busqueda_avanzada" action="producto.php" method="post" type="text/plain">

		            	<h2>Búsqueda Avanzada</h2>

		           		<label for="clave">Palabra Clave<span class="requerido" > * </span>:</label>
		           		<input type="text" required>

		           		<label for="marca">Marca :</label>
		           		<input type="text">

		           		<label for="categoria">Categoría :</label>
			           	<select name="categorias">
			          		<option value>Cualquier Categoría</option>
			          		<option value="electronica">Electronica</option>
			          		<option value="deporte">Deporte</option>
			          		<option value="hogar">Hogar</option>
						</select>

						<label for="subcategoria">Sub-Categorías :</label>

			           	<select name="electronica">
			          		<option value>Cualquier Sub-Categoría</option>
			          		<option value="1">Discos Duros</option>
			          		<option value="2">Portatiles</option>
			          		<option value="3">SmartPhones</option>
			          		<option value="4">SmartWatches</option>
			          	</select>

		          <!--
			           	<select name="deporte" disabled="disabled">
			          		<option value>Cualquier Sub-Categoría</option>
			          		<option value="1">Bicicletas</option>
			          		<option value="2">Musculación</option>
			          		<option value="3">Accesorios</option>
			          		<option value="4">Zapatillas</option>
			          	</select>


			           	<select name="hogar" disabled="disabled">
			          		<option value>Cualquier Sub-Categoría</option>
			          		<option value="1">Muebles</option>
			          		<option value="2">Jardín</option>
			          		<option value="3">Electrodomésticos</option>
			          		<option value="4">Decoración</option>
			          	</select>
						-->

		         		<button class="submit" type="submit">Buscar</button>
		          		<button class="reset" type="reset">Borrar Búsqueda</button>

			</form>

		</div>

	<!---------------------------------------- FIN BUSQUEDA AVANZADA ------------------------------>

   </div>
 <?php
$app->doInclude('comun/pie.php');
?>

  </div>
 </body>
</html>
