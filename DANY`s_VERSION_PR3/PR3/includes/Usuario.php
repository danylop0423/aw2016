<?php

namespace es\ucm\fdi\aw;

use es\ucm\fdi\aw\Aplicacion as App;

class Usuario {
	
  private $id;
  
  private $username;
  
  private $apellido;

  private $email;

  private $password;

  private $foto;
  
  private $tarjeta;
  
  private $cvv;
  
  private $caduca;
  
  private $direccion;

  private function __construct($id,$username,$apellido,$email, $password,$foto,$tarjeta,$cvv,$caduca,$direccion) {
    $this->id = $id;
	$this->username= $username;
    $this->apellido=$apellido;
	$this->email = $email;
    $this->password = $password;
    $this->foto = $foto;
	$this->tarjeta = $tarjeta;
	$this->cvv = $cvv;
	$this->caduca = $caduca;
	$this->direccion = $direccion;
  }

private static function buscaUsuario($email) {
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("SELECT * FROM Usuarios WHERE email='%s'", $conn->real_escape_string($email));
    $rs = $conn->query($query);
    if ($rs && $rs->num_rows == 1) {
      $fila = $rs->fetch_assoc();
      $user = new Usuario($fila['id'],$fila['nombre'] ,$fila['apellido'],$fila['email'], $fila['password']
								,$fila['foto'],$fila['tarjeta'],$fila['cvv'],$fila['caduca'],$fila['direccion']);
      $rs->free();

      return $user;
    }
    return false;
  }

private static function insertaUsuario($username,$apellido,$email,$credito,$cvv,$caduca,$direccion,$password) {
    $foto='img/avatar2.png';
	$app = App::getSingleton();
    $conn = $app->conexionBd();

    $username = $cliente=htmlspecialchars(trim(strip_tags($username)));
    $apellido = $cliente=htmlspecialchars(trim(strip_tags($apellido)));
    $email = $cliente=htmlspecialchars(trim(strip_tags($email)));
    $credito = $cliente=htmlspecialchars(trim(strip_tags($credito)));
    $cvv = $cliente=htmlspecialchars(trim(strip_tags($cvv)));
    $caduca = $cliente=htmlspecialchars(trim(strip_tags($caduca)));
    $password = $cliente=htmlspecialchars(trim(strip_tags($password)));

    $query = "INSERT INTO usuarios(email,password,nombre,apellido,foto,tarjeta,cvv,direccion,caduca) 
							VALUES('$email','$password','$username','$apellido','$foto','$credito','$cvv',
							'$direccion','$caduca')";
    $rs = $conn->query($query);
    if($rs) {
      return false;
    }
    return true;
  }



  
  public static function login($email, $password) {
    $user = self::buscaUsuario($email);
    if ($user && $user->compruebaPassword($password)) { 
      return $user;
    }    
    return false;
  }

  
  public static function registraUsuario($username,$apellido,$email,$credito,$cvv,$caduca,$direccion,$password) {
    $user = self::buscaUsuario($email);
    if ($user) { 
      return true;
    }    
    return self::insertaUsuario($username,$apellido,$email,$credito,$cvv,$caduca,$direccion,$password);	
  }

  
  
  public function get_email() {
    return $this->email;
  }

  public function get_nombre() {
    return $this->username;
  }
  
  public function compruebaPassword($password) {
    return $this->password === $password;
  }
}
