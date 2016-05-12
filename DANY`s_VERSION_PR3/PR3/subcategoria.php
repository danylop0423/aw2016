<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="UTF-8">
	<title>ReverseBid</title>
    <link id="estilo" href="css/default.css" rel="stylesheet" type="text/css" />
	<link id="estilo_subcategoria" href="css/subcategoria.css" rel="stylesheet" type="text/css" />
</head>


<body>
 <div id="all">
 
     <?php
$app->doInclude('comun/cabecera.php');
?>

 
   <div id="contenedor">
		<div id="detalles">
		  <h1>SmartWatches</h1>
		  <p> En esta Sección encontrarás todos los SmartWatches que se encuentran actualmente en Subasta..........
			  Apresúrate y haz tu elección antes de que se agote el Tiempo.. !!</p>
		</div>
		
		<div id="principal_pic">
			<img id="img" src="img/smartw1.png" />
		</div>
		
		<div id="enlaza">
			 <a href="miperfil.php#mispujas">Mis pujas</a>
             <a href="miperfil.php#missubastas">Mis Subastas</a>
		</div>
		
		<div id="downcont">
		
		  <div id="filtro">
		     <form action="#" method="post" enctype="text/plain">
				  <fieldset>
				    <legend> FILTRO:  </legend>
					<label class="enbloq">Por Marca:</label>
					<select class="enbloq" name="marcas">
						<option value="all_marks">-Todas-</option>
						<option value="samsung">Samsung</option>
						<option value="sony" selected>Sony</option>
						<option value="motorola" >Motorola</option>
						<option value="apple">Apple</option>
						<option value="pebble">Pebble</option>
					</select>
					
					<label class="enbloq">Por Conectividad:</label>
					<select class="enbloq" name="conect">
						<option value="all_conect">-Todas-</option>
						<option value="b2">Bluetooth</option>
						<option value="3g" selected>3G</option>
						<option value="wifi" > Wi-Fi</option>
					</select>
					
					<label class="enbloq">Por Procesador:</label>
					<select class="enbloq" name="processor">
						<option value="all_proc">-Todas-</option>
						<option value="quad">Quad Core</option>
						<option value="dual" selected>Dual Core</option>
						<option value="single" >Single Core</option>
						
					</select>
					
					<label class="enbloq">Por Pulgadas:</label>
					<select class="enbloq" name="pulgadas">
						<option value="all_size">-Todas-</option>
						<option value="38pulg">3.8 Pulgadas</option>
						<option value="25pulg" selected>2.5 Pulgadas</option>
						<option value="16pulg">1.6 Pulgadas</option>
						<option value="15pulg">1.5 Pulgadas</option>
						<option value="13pulg">1.3 Pulgadas</option>
						<option value="12pulg">1.2 Pulgadas</option>
					</select>
					
					<label class="enbloq">Por Género:</label>
					<input class="radiobut" type="radio" name="genero" value="hombre"checked="checked" >ParaEl</input> 
					<input class="radiobut" type="radio" name="genero" value="mujer" > Para Ella </input>					
					<button class="enbloq" type="submit"  name="filtro" value="#"/>Filtrar</button><br>
				  </fieldset>
		    </form>
		  </div>
		
		  <div class="producto">
			<div>
			  <img  src="img/smartw2.png" />
			  <a class="descrip" href="producto.php">Descripción: Producto X, Marca Y</a>
			  <p class= "restante"> Tiempo Restante: 00:03:47</p>
			  <p class="minim"> Puja Mínima: 1,00 €</p>
			</div>
			  
			<div >
			  <img  src="img/smartw3.png" />
			  <a class="descrip" href="producto.php">Descripción: Producto X, Marca Y</a>
			  <p class= "restante"> Tiempo Restante: 00:03:47</p>
			  <p class="minim"> Puja Mínima: 1,00 €</p>
			</div>
			
			<div>
			  <img src="img/smartw4.png" />
			  <a class="descrip" href="producto.php">Descripción: Producto X, Marca Y</a>
			  <p class= "restante"> Tiempo Restante: 00:03:47</p>
			  <p class="minim"> Puja Mínima: 1,00 €</p>
			</div>
			
			<div>
			  <img src="img/smartw5.png" />
			 <a class="descrip" href="producto.php">Descripción: Producto X, Marca Y</a>
			  <p class= "restante"> Tiempo Restante: 00:03:47</p>
			  <p class="minim"> Puja Mínima: 1,00 €</p>
			</div>
			
			<div>
			  <img src="img/smartw6.png" />
			  <a class="descrip" href="producto.php">Descripción: Producto X, Marca Y</a>
			  <p class= "restante"> Tiempo Restante: 00:03:47</p>
			  <p class="minim"> Puja Mínima: 1,00 €</p>
			</div>
			
			<div>
			  <img src="img/smartw7.png" />
			  <a class="descrip" href="producto.php">Descripción: Producto X, Marca Y</a>
			  <p class= "restante"> Tiempo Restante: 00:03:47</p>
			  <p class="minim"> Puja Mínima: 1,00 €</p>
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