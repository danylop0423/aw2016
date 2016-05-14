<?php
use es\ucm\fdi\aw;

//Funciones utiles llamadas por otros scripts, generalmente por vistas

//Verifica si existe usuario logueado
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

// verifica lo que se muestra en fución de usuario anónimo o logueado
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

//verifica: si usuario esta logueado accede a miperfil de lo contrario a login
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
