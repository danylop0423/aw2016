<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="UTF-8">
	<title>ReverseBid: Contacto</title>
    <link id="estilo" href="css/default.css" rel="stylesheet" type="text/css" />
	<link id="estilo_contacto" href="css/contacto.css" media="screen" rel="stylesheet" type="text/css" />
</head>


<body>
 <div id="all">

  <?php
$app->doInclude('comun/cabecera.php');
?>



   <div id="contenedor">

   	<!---------------------------------------- INICIO CONTACTO ------------------------------>

	   	<div id="contacto">

		   	<form action="MAILTO:chsuarez@ucm.es" method="post" enctype="text/plain">

		            	<h2>Contáctanos</h2>

		           		<label for="name">Nombre <span class="requerido" > * </span>:</label>
		           		<input type="text" name="Nombre" placeholder="Nombre Apellido" required />

		           		<label for="email">Email <span class="requerido" > * </span>:</label>
		           		<input type="email" name="e-mail" placeholder="user@domain.com" required />

		           		<label for="telefono">Teléfono:</label>
		          		<input type="tel" name="Teléfono" placeholder="Fijo o Movil" pattern="[0-9]{9}"/>

		           		<label for="asunto">Asunto <span class="requerido" > * </span>:</label>
		           		<input type="text" name="Asunto" placeholder="Información" required>
		          		<label for="mensaje">Mensaje <span class="requerido" > * </span>:</label>
		          		<textarea id="mensaje" name="Mensaje" cols="42" rows="6" placeholder="Escriba aquí su mensaje"required ></textarea>

						<input id="ceheckbox_condiciones"  type="checkbox" name="Condiciones Generales" value="Acepto las condiciones generales" required />
						<label id="politicas" for="Condiciones_Generales">He leído y acepto la  <a href="politicas_privacidad.php">Política de Privacidad.</a><span class="requerido" > * </span></label>

		         		<button class="submit" type="submit">Enviar</button>
		          		<button class="reset" type="reset">Borrar Formulario</button>

			</form>

		</div>

<!---------------------- SECCIION DOS DE CONTACTO ------------------>

		<div class="seccion_dos">

			<div class="medios_contacto">
				<div id="descripcion">
					<h3>Dirección</h3>
					<p>Calle del Prof. José García Santesmases, 9</p>
					<p>28040 Madrid - España</p>
				</div>
				<div id="icono">
					<a href="https://www.google.es/maps/place/Facultad+de+Inform%C3%A1tica/@40.4527899,-3.7356115,17z/data=!3m2!4b1!5s0xd4229d2abcc4e3d:0x64e122017d32a040!4m2!3m1!1s0xd4229d2a9f08b1f:0xcf68cce94ec84cb8"><img src="img/location.png"></a>
				</div>
			</div>


			<div class="medios_contacto">
				<div id="descripcion">
					<h3>Teléfono</h3>
					<p>Telf: +34 91 9191919</p>
					<p>Fax: +34 91 919191919</p>
				</div>
				<div id="icono">
					<img src="img/telephone.png">
				</div>
			</div>


			<div class="medios_contacto">
				<div id="descripcion">
					<h3>Correo Electronico</h3>
					<a  href="MAILTO:chsuarez@ucm.es"><p>chsuarez@ucm.es</p></a>
				</div>
				<div id="icono">
					<a  href="MAILTO:chsuarez@ucm.es"> <img src="img/email.png"> </a>
				</div>
			</div>


			<div class="redes_sociales">
					<a href="https://es-es.facebook.com/delegacionfdi"><img src="img/facebook.png" ></a>
					<a href="https://twitter.com/informaticaucm"><img src="img/twitter.png" ></a>
			</div>


		</div>

	<!---------------------------------------- FIN CONTACTO ------------------------------>

   </div>


 <?php
$app->doInclude('comun/pie.php');
?>

  </div>
 </body>
</html>
