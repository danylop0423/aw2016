<?php

namespace es\ucm\fdi\aw;

class FormularioRegistro extends Form {

  const HTML5_EMAIL_REGEXP = '^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$';
  const HTML5_NAME_REGEXP ='^[a-zA-Z]+[a-zA-Z](?:[a-zA]-Z{0,61}[a-zA-Z])?(?:\.[a-zA-Z](?:[a-zA-Z]{0,61}[a-zA-Z])?)*$';
  
  public function __construct() {
    parent::__construct('formRegistro');
  }
  
  protected function generaCamposFormulario ($datos) {
	$username = '';
	$apellido ='';
	$email ='';
	$credito ='';
	$cvv = '';
	$caduca = '';
	$direccion ='';
    $password ='';
	$again ='';
	$on =false;
	  
    if ($datos) {
      $username = isset($datos['username']) ? $datos['username'] : $username;
	  $apellido = isset($datos['apellido']) ? $datos['apellido'] : $apellido;
	  $email = isset($datos['email']) ? $datos['email'] : $email;
	  $credito = isset($datos['credito']) ? $datos['credito'] : $credito;
	  $cvv = isset($datos['cvv']) ? $datos['cvv'] : $cvv;
	  $caduca = isset($datos['caduca']) ? $datos['caduca'] : $caduca;
	  $direccion = isset($datos['direccion']) ? $datos['direccion'] : $direccion;
	  $password = isset($datos['password']) ? $datos['password'] : $password;
	  $again = isset($datos['again']) ? $datos['again'] : $again;
	  $on = isset($datos['on']) ? $datos['on'] : $on;
    }

    $camposFormulario=<<<EOF
		<fieldset>
			<label>Nombre*:</label>
			<input type="text" name="username" value="$username"  placeholder="Tu nombre" size="25" required><br>
			<label>Apellido*:</label>
			<input type="text" name="apellido" value="$apellido" placeholder="Tu apellido" size="25"  required><br>
			<label>Email*:</label>
			<input type="email" name="email" value="$email" placeholder="Tu m@il" size="25"  required><br>
			<label>No.Tarjeta de Crédito*:</label>
			<input type="number" name="credito" value="$credito" placeholder="debe tener 16 Digitos" min="1000000000000000" max="9999999999999999"  required><br>
			<label>CVV *:</label>
			<input type="number" name="cvv" value="$cvv" placeholder="3 Digitos" min="100" max="999" required><br>
			<label>Caducidad*:</label>
			<input type="month" name="caduca" value="$caduca" placeholder=""    required><br>
			<label>Dirección:</label>
			<input type="text" name="direccion" value="$direccion" placeholder="Tu dirección" size="35"  required><br>
			<label>Contraseña*:</label>
			<input type="password" name="password" value="$password" placeholder="Entre 4 y 8 caracteres" size="25" required><br>
			<label>Confirmar Contraseña*:</label>
			<input type="password" name="again" value="$again" placeholder="Repite tu password"  size="25" required><br>
			<label>Acepto politicas:</label>
			<input type="checkbox"  name="on" value="$on" required>
			<p><a href="politicas_privacidad.php">He leido y estoy de acuerdo con los términos y las condiciones de ReverseBid</a></p><br>
			<button type="submit"  name="register"/>Registrar</button><br>			
		</fieldset>
EOF;
    return $camposFormulario;
  }

  /**
   * Procesa los datos del formulario.
   */
  protected function procesaFormulario($datos) {
    $result = array();
    $ok = true;
    
	$username = isset($datos['username']) ? $datos['username'] : null ;
	$apellido = isset($datos['apellido']) ? $datos['apellido'] : null ;
    if ( ! $username || ! $apellido || ! mb_ereg_match(self::HTML5_NAME_REGEXP, $username) || ! mb_ereg_match(self::HTML5_NAME_REGEXP, $apellido)) {
      $result[] = 'El Nombre Y Apellido Solo pueden Contener Letras sin espacios';
      $ok = false;
    }
	
	$email = isset($datos['email']) ? $datos['email'] : null ;
    if ( !$email || ! mb_ereg_match(self::HTML5_EMAIL_REGEXP, $email) ) {
      $result[] = 'El mail no es válido';
      $ok = false;
    }


	$credito = isset($datos['credito']) ? $datos['credito'] : null ;
    if ( ! $credito ||  mb_strlen($credito) !== 16 ) {
      $result[] = 'Tarjeta de Credito Nó Válida !!';
      $ok = false;
    }

	
	
	$cvv = isset($datos['cvv']) ? $datos['cvv'] : null ;
    if ( ! $cvv ||  mb_strlen($cvv) !== 3 ) {
      $result[] = 'Tarjeta de Credito Nó Válida !!';
      $ok = false;
    }

	
    $password = isset($datos['password']) ? $datos['password'] : null ;
    if ( ! $password ||  mb_strlen($password) < 4 || mb_strlen($password) > 8 ) {
      $result[] = 'La contraseña no es válida, debe tener Entre 4 y 8 caracteres';
      $ok = false;
    }
	
	$again = isset($datos['again']) ? $datos['again'] : null ;
    if ( $password !== $again ) {
      $result[] = 'la contraseña y la confirmación no Coinciden';
      $ok = false;
    }

	$direccion = isset($datos['direccion']) ? $datos['direccion'] : null ;
	$caduca = isset($datos['caduca']) ? $datos['caduca'] : null ;
	
    if ( $ok ) {
      $flag = Usuario::registraUsuario($username,$apellido,$email,$credito,$cvv,$caduca,$direccion,$password);
      if ( $flag ) {
		  $result[] = 'ERROR: El usuario '.$email.' ya ha sido registrado anteriormente ';
      }else {
        $result=\es\ucm\fdi\aw\Aplicacion::getSingleton()->resuelve('/login.php');
		
		//$result[] = 'El usuario se ha registrado correctamente en breve recibirá un mail informativo';
      }
    }
    return $result;
  }
}
