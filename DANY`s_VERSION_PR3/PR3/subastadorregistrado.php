<?php

require_once __DIR__.'/includes/config.php';

?><!DOCTYPE html>
<html lang=es>
<head>
    <meta charset="UTF-8">
	<title>ReverseBid</title>
    <link id="estilo" href="css/default.css" rel="stylesheet" type="text/css" />
    <link id="estiloSubastadorRegistrado" href="css/subastadorregistrado.css" rel="stylesheet" type="text/css" />
</head>


<body>
 <div id="all">

  <?php
$app->doInclude('comun/cabecera.php');
?>



   <div id="contenedor">

   		<div id="subastadorregister">

   			<form method="post" enctype="text/plain" id ="miniForm">

   				<div class = "Container" id="containerFirstName">

   				<label for="">Nombre *</label> <input type="text" name="name" id="nameText" required></input>

   				</div>

   				<div class = "Container" id="containerLastName">

   				<label for="">Apellidos *</label> <input type="text" name="lastname" id="lastnameText" required></input>

   				</div>

	   			<div class = "Container" id="containerCompany">

	   			<p id="company" >
	   				 <input name="accept" type="checkbox" value="on" class="checkbox"/> </input>
	   				 <label for="">Registrarse como empresa</label>
	   			</p>

   				<label for="">Empresa</label> <input type="text" name="company" id="companyText"></input>

   				</div>

   				<div class = "Container" id="containerEmail">

   				<label for="">Email *</label> <input type="email" name="email" id="emailText" required></input>

   				</div>

   				<div class = "Container" id="containerPass">

   				<label for="">Contraseña *</label> <input type="text" name="pass" id="passText" required></input>

   				</div>

   				<div class = "Container" id="containerPassAgain">

   				<label for="">Confirma Contraseña *</label> <input type="text" name="passagain" id="passagainText" required></input>

   				</div>

   				<div class = "Container" id="containerCountry">

   				<label for="">País *</label> <input type="text" name="country" id="countryText" required></input>

   				</div>

   				<div class = "Container" id="containerAddress">

   				<label for="">Dirección *</label> <input type="text" name="address" id="addressText" required></input>

   				</div>

   				<div class = "Container" id="containerCode">

   				<label for="">Código Postal</label> <input type="text" name="code" id="codeText"></input>

   				</div>

   				<div class = "Container" id="containerTarjetaCredito">

   				<label for="">Tarjeta De Credito *</label> <input type="text" name="creditcard" id="creditcardText" required></input>

   				</div>

   				<div class = "Container" id="containerPhone">

   				<label for="">Teléfono de Contacto *</label> <input type="text" name="phone" id="phoneText" required></input>

   				</div>

   				<div class = "Container" id="containerAccept">

	   				<p value="Accept" id="AcceptTerms" >
	   				 	<input name="accept" type="checkbox" value="on" class="checkbox"/> </input>
	   				 	<a href="politicas_privacidad.php">He leido y estoy de acuerdo con los términos y las condiciones de ReverseBid</a>
	   				</p>

	   			</div>

   				<div class = "Container" id="containerBotonRegister">

	   				 <a href="miperfil.php"><button class="submit" type="submit" value="Register" id="botonRegister" ><label for="">Registrarse como subastador</label>
	   				 </button></a>

	   			</div>

	   		</form>

   		</div>

   </div>

 <?php
$app->doInclude('comun/pie.php');
?>


  </div>
 </body>
</html>
