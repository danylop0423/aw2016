<?php
use es\ucm\fdi\aw;

function mostrarSaludo() {
  $html = '';
  $app = aw\Aplicacion::getSingleton();
  $nombreUsuario = $app->nombreUsuario();
	if ($app->usuarioLogueado()) {
	  $logoutUrl = $app->resuelve('/logout.php');
	  $html = "<h5>Bienvenido ${nombreUsuario}</h5><p><a href='${logoutUrl}'>- Cerrar Sesión -</a></p>
				<p>Puedes Acceder a tus datos desde la opción MI PERFIL bajo la pestaña  
				MI CUENTA o navegar desde la barra Menú </p>";
	 } else {
		 $loginUrl = $app->resuelve('/login.php');
		 $html = false ;
			}

  return $html;
}
?>
