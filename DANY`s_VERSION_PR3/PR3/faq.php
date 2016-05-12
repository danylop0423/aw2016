<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="UTF-8">
	<title>Reverse Bid</title>
    <link id="estilo" href="css/default.css" rel="stylesheet" type="text/css" />
    <link id="estiloLogIn" href="css/faq.css" rel="stylesheet" type="text/css" />
</head>


<body>
  <div id="all">

  <?php
$app->doInclude('comun/cabecera.php');
?>

   <div id="contenedor">


   		<div id="faq">

   			<ul>

   			 	<li class="pregunta">Pregunta 1</li>
   			 	<li class="respuesta">Respuesta 1</li>
   			 	<li class="pregunta">Pregunta 2</li>
   			 	<li class="respuesta">Respuesta 2</li>
   			 	<li class="pregunta">Pregunta 3</li>
   			 	<li class="respuesta">Respuesta 3</li>
   			 	<li class="pregunta">Pregunta 4</li>
   			 	<li class="respuesta">Respuesta 4</li>

   			</ul>


   		</div>


<?php
$app->doInclude('comun/pie.php');
?>

 </div>
</body>
</html>
