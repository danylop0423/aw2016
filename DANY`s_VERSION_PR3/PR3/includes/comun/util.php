<?php
use es\ucm\fdi\aw;

function usuarioIn($aplicat) {
  $res = false;
  $app = $aplicat;
  $nombreUsuario = $app->nombreUsuario();
	if ($app->usuarioLogueado()) {
	  $res = $nombreUsuario;
	 } else {
		 $res = false ;
			}

  return $res;
}

function mostrarSaludo(){
	$app = aw\Aplicacion::getSingleton();
	$user=usuarioIn($app);
	$html=false;
	if($user){
		$logoutUrl = $app->resuelve('/logout.php');
		$html= "<h5>Bienvenido ${user}</h5><p><a href='${logoutUrl}'>- Cerrar Sesión -</a></p>
		<p>Puedes Acceder a tus datos desde la opción MI PERFIL bajo la pestaña  
		MI CUENTA o navegar desde la barra Menú </p>";
	}
	return $html;
}

function mostrarPerfil(){
	$app = aw\Aplicacion::getSingleton();
	$user=usuarioIn($app);
	$html=false;
	if($user){
		$html=$app->resuelve('/miperfil.php');
	}else{ $html=$app->resuelve('/login.php');}
	return $html;
}

		
?>
