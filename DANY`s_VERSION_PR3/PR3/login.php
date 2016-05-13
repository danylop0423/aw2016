<?php

require_once __DIR__.'/includes/config.php';
$app->doInclude('comun/util.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="<?= $app->resuelve('/css/default.css') ?>" />
  <link rel="stylesheet" type="text/css" href="<?= $app->resuelve('/css/login.css') ?>" />
  <title>Login</title>
</head>
<body>
<div id="all">
<?php
$app->doInclude('comun/cabecera.php');
?>
	<div id="contenedor">
		<div id="login">	
		<?php 
			$html=mostrarSaludo();
            if($html===false) {
				$formLogin = new \es\ucm\fdi\aw\FormularioLogin();
				$formLogin->gestiona();
			}else {
			   echo $html;}
		?>
		</div>
	</div>
<?php
$app->doInclude('comun/pie.php');
?>
</div>
</body>
</html>
