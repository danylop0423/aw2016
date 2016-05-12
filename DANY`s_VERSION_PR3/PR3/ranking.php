<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="UTF-8">
	<title>ReverseBid</title>
    <link id="estilo" href="css/default.css" rel="stylesheet" type="text/css" />
    <link id="estiloLogIn" href="css/ranking.css" rel="stylesheet" type="text/css" />
</head>


<body>
  <div id="all">

  <?php
$app->doInclude('comun/cabecera.php');
?>


   <div id="contenedor">


		<div id="rankingContainer">

			<div id="rankingStarsContainer">
				<label class="label" for="rankingsubastadorLabel">Ranking Subastador</label>
				<img class="estrella" id="estrella1" src="img/Empty_Star.png" alt="Puntuacion Estrella">
				<img class="estrella" id="estrella2" src="img/Empty_Star.png" alt="Puntuacion Estrella">
				<img class="estrella" id="estrella3" src="img/Empty_Star.png" alt="Puntuacion Estrella">
				<img class="estrella" id="estrella4" src="img/Empty_Star.png" alt="Puntuacion Estrella">
				<img class="estrella" id="estrella5" src="img/Empty_Star.png" alt="Puntuacion Estrella">

			</div>




			<div id="enviarComentarioContainer">

				<a href="#"><button value="#" id="botonEnviarComentario" >Enviar Comentario</button></a>

			</div>



			<div id="comentariosContainer">
				<label class="label" for="comentariosLabel">Comentarios</label>
				<div class="usuario">
					<label class="label" for="usuarioxLabel">UserX</label>
					<div class="comentarioUsuario">Subastador serio y correcto, pero los envios tardan Demasiado</div>
				</div>
				<div class="usuario">
					<label class="label" for="usuarioyLabel">UserY</label>
					<div class="comentarioUsuario">Muy confiable</div>
				</div>

			</div>

			<div id="textAreaContainer">

				<textarea id="textAreaComentario"></textarea>

			</div>



		</div>

 <?php
$app->doInclude('comun/pie.php');
?>

 </div>
</body>




</html>
