<?php
use es\ucm\fdi\aw;

function mostrarSaludo() {
  $html = '';
  $app = aw\Aplicacion::getSingleton();
  $nombreUsuario = $app->nombreUsuario();
	if ($app->usuarioLogueado()) {
	  $logoutUrl = $app->resuelve('/logout.php');
	  $html = "<p>Bienvenido ${nombreUsuario}</p><p><a href='${logoutUrl}'>- Cerrar Sesión -</a></p>";
	 } else {
		 $loginUrl = $app->resuelve('/login.php');
		 $html = false ;
			}

  return $html;
}
?>
