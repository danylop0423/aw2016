<?php

namespace es\ucm\fdi\aw;

use es\ucm\fdi\aw\Aplicacion as App;

class Usuario {
	
  private $id;

  private $email;

  private $password;

  private $foto;
  
  private $tarjeta;
  
  private $direccion;

  private function __construct($id, $email, $password,$foto,$tarjeta,$direccion) {
    $this->id = $id;
    $this->email = $email;
    $this->password = $password;
    $this->foto = $foto;
	$this->tarjeta = $tarjeta;
	$this->direccion = $direccion;
  }

private static function buscaUsuario($email) {
    $app = App::getSingleton();
    $conn = $app->conexionBd();
    $query = sprintf("SELECT * FROM Usuarios WHERE email='%s'", $conn->real_escape_string($email));
    $rs = $conn->query($query);
    if ($rs && $rs->num_rows == 1) {
      $fila = $rs->fetch_assoc();
      $user = new Usuario($fila['id'], $fila['email'], $fila['password'],$fila['foto'],
													$fila['tarjeta'],$fila['direccion']);
      $rs->free();

      return $user;
    }
    return false;
  }

  
  public static function login($email, $password) {
    $user = self::buscaUsuario($email);
    if ($user && $user->compruebaPassword($password)) { 
      return $user;
    }    
    return false;
  }

  
  
  
  
  public function get_email() {
    return $this->email;
  }

  public function compruebaPassword($password) {
    return $this->password === $password;
  }
}
