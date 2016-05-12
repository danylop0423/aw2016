<?php

require_once __DIR__.'/includes/config.php';

$app->logout();

?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="<?= $app->resuelve('/css/default.css') ?>" />
  <title>Logout</title>
</head>
<body>
<div id="all">
<?php
$app->doInclude('comun/cabecera.php');
?>
	<div id="contenedor">
		<h1 id="despedida">Hasta pronto!</h1>
	</div>
<?php
$app->doInclude('comun/pie.php');
?>
</div>
</body>
</html>
