<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="UTF-8">
	<title>ReverseBid</title>
    <link id="estilo" href="css/default.css" rel="stylesheet" type="text/css" />
	<link id="estilo_principal" href="css/miperfil.css" rel="stylesheet" type="text/css" />
</head>


<body>
 <div id="all">
 
<?php
$app->doInclude('comun/cabecera.php');
?>

 
   <div id="contenedor">
		<div id="data">
			<h1>Mi Perfil:</h1>
			<img src="img/avatar2.png" alt=“ReverseBid_img” />
			<ul>
				<li><h2>Datos Personales</h2></li>
				<li><p class="campo">Name: </p> <p class="dato">Pepe</p></li>
				<li><p class="campo">Apellido:  </p> <p class="dato">Smith</p></li>
				<li><p class="campo">Subastas Activas: </p> <p class="dato">2</p></li>
				<li><p class="campo">Pujas Activas: </p> <p class="dato">2</p></li>
			</ul>
        </div>
		
	   <div id= "derecont">
	   
		<div class="puja_subasta">
		   <h1 id="mispujas">Mis Pujas:</h1>
		   
		   <div class="puja">
				<div class="pujadatos">
					<p>Producto: X</p>
					<ul>
						<li>Estado de la Subasta: Activa</li> 
						<li>Puja Ganadora: 3,00 €</li>
						<li>Mi Ultima Puja: 1,00 €</li>
						<li>Tiempo Restante: 00:03:45</li>
						<li>He Ganado: Aún No</li>
					</ul>
					<form></form>
				  </div>
				 <div class="pic_prod">
					<img src="img/smartw4.png" alt=“ReverseBid_img” />
                 </div>
			 </div>
			 
		   <div id="pujalink">
		     <a href="logout.php">Cerrar Sesión</a>
		   </div>
		  
        </div>
		
		<div class="puja_subasta">
			 <h1 id="missubastas">Mis Subastas:</h1>
		   
		   <div class="subasta">
				<div class="subastadatos">
					<p>Producto: X</p>
					<ul>
						<li>Estado de la Subasta: Activa</li> 
						<li>Puja Mínima: 3,00 €</li>
						<li>Cantidad Ganadora: 1,00 €</li>
						<li>Tiempo Restante: 00:03:45</li>
						<li>Total Acumulado: 350,00 €</li>
					</ul>
				 </div>
				  
				 <div class="pic_prod">
					<img src="img/smartw6.png" alt=“ReverseBid_img” />
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