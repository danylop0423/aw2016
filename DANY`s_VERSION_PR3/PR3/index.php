<?php

require_once __DIR__.'/includes/config.php';
$app->doInclude('comun/util.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link rel="stylesheet" type="text/css" href="<?= $app->resuelve('/css/default.css') ?>" />
   <link rel="stylesheet" type="text/css" href="<?= $app->resuelve('/css/principal.css') ?>" /> 
  <title>Portada</title>
</head>
<body>

<div id="all">
<?php
$app->doInclude('comun/cabecera.php');
?>
	   <div id="contenedor">
		<div id=title1>
			<p>Subasta... Puja... Gana !!</p>
		</div>

		<div id="title2">
			<p>Participa En Nuestras Subastas:</p>
		</div>

		<div id= "principal_img">
		  <img src="img/principal1.png" alt=“ReverseBid_img” />
   		</div>

		<div id="how">
			<button  name="how1" value="#" type="button" >¿ Cómo Funciona ?<img  id="read_more" src="img/more.png"  /></button>
			<p>Subastar:</p>
			<p>Regístrate, Date dealta como Subastador,Sube tus productos, Establece una Puja Mínima y Empieza tu Subasta </p>
			<p>--------------------------------------</p>
			<p>Participar en una Subasta: </p>
			<p>Regístrate, Escoge un Producto, puedes pujar a partir de la puja mínima y seguir pujando hasta que finalice
				el tiempo de la subasta, El Ganador será aquel que haga una puja mínima Nó Repetida!! </p>
		</div>

		<div id="login">
		  
		  <?php
		  //control de usuario logueado o no, en caso No -> formulario y gestion del mismo
		  $html=mostrarSaludo();
            if($html===false) {
				$formLogin = new \es\ucm\fdi\aw\FormularioLogin();
				$formLogin->gestiona();
			}else {
				echo $html;
				}
		  ?>
		</div>


   </div>

<?php
$app->doInclude('comun/pie.php');
?>
</div>
</body>
</html>
