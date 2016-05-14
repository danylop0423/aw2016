<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="UTF-8">
	<title>ReverseBid</title>
    <link id="estilo" href="css/default.css" rel="stylesheet" type="text/css" />
    <link id="estiloRegister" href="css/registrouser.css" rel="stylesheet" type="text/css" />
</head>


<body>
 <div id="all">

  <?php
$app->doInclude('comun/cabecera.php');
?>
 

   <div id="contenedor">

   		<div id= "register">

   				<?php	
				  //gestion del formulario de registro de usuarios 
					$formRegistro = new \es\ucm\fdi\aw\FormularioRegistro();
					$formRegistro->gestiona(); 
				?>

   		</div>

   </div>

 <?php
$app->doInclude('comun/pie.php');
?>


  </div>
 </body>
</html>
