<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="UTF-8">
	<title>ReverseBid</title>
    <link id="estilo" href="css/default.css" rel="stylesheet" type="text/css" />
	<link id="estilo_principal" href="css/principal.css" rel="stylesheet" type="text/css" />
	<link id="estiloproducto" href="css/producto.css" rel="stylesheet" type="text/css" />
</head>


<body>
 <div id="all">

   <?php
$app->doInclude('comun/cabecera.php');
?>



   <div id="contenedor">

		<div id="panelizq">

			<div id="partesuperiorizq">
				<div id="texto">
					<span class="estado"> Estado: </span>
			  		<ul class="lista">
			  		<li>Mi Ultima Puja:</li>
			  		<li>Ganador: </li>
			  		<li>Tiempo restante:</li>
			  		</ul>
			  		<li><button class="pujar" name="pujar" type="button">Pujar:</button>
					<textarea class="precio" rows="1" cols="5">0,00 €</textarea></li>

				</div>

	  			<div id="imagencontexto">
	  				<img class="imagenproducto" src="img/productosmart.png"><img/>
		  			<p>
		  			<ul>
		  			<li>Combo Smart Watch Samsung</li>
		  			<li>Subastado por: UserX</li>
		  			</ul>
		  			</p>
	  			</div>

			</div>

			<div id="parteinferiorizq">

				<div id="texto">

					<p>
					<span class="ranking"> Ranking de subastador: </span>
	  				<img class="emptystar" src="img/Empty_Star.png">
	  				<img class="emptystar" src="img/Empty_Star.png">
	  				<img class="emptystar" src="img/Empty_Star.png">
	  				<img class="emptystar" src="img/Empty_Star.png">
	  				<img class="emptystar" src="img/Empty_Star.png">
	  				</p>
	  				<span class="comment"> Comentarios: </span>
	  				<ul>
	  				<li><span class="user">UserX:</span></li>
	  				<li>Subastador serio y correcto, pero los envíos tardan demasiado</li>
	  				<li><span class="user">UserY:</span></li>
	  				<li>Muy confiable</li>
	  				<li><a href="ranking.php"> Leer más </a></li>
	  				</ul>
				</div>

				<div id="cuadrotextocomentario">

	  				<button id="enviarcomentario" name="enviar" type="button">Enviar Comentario</button>
	 				<textarea class="areacomentario" name="comentario" rows="7" cols="28">Escribe tu comentario...</textarea>

				</div>


			</div>

		</div>

		<div id="panelder">

			<div id="partesuperiorder">
	  			<p> Bienvenido!! </p>
	  			<ul>
				<li><a href="miperfil.php#missubastas">Mis Productos Subastados</a></li>
				<li><a href="miperfil.php#mispujas">Mis Pujas</a></li>
				<li><a href="login.php">Cerrar Sesión</a></li>
				</ul>
			</div>

			<div id="parteinferiorder">
				<span class="msgsubastador"> Mensaje a subastador: </span>
				<span class="estado"> Estado: Conectado <img class="bolaverde" src="img/bolaverde.png"><img/> </span>
				<div class="chat">
					<p>
						<span class="comprador"> Pepe: </span>
						Una pregunta
						<span class="vendedor"> Subastador: </span>
						Claro, dime
					</p>
					<div class="enviar">
						<form method="post">
						<textarea class="textarea" name="mensaje" rows="1" cols="17"></textarea>
						<button class="send" type="submit"/> Enviar</button>
						</form>
					</div>
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
