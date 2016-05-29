<?php

class UserController extends AbstractController
{
	
	public function editProfileAction($request, $response, $args)
    {
	  $loggedUser = $request->getAttribute('loggedUser');
	  $args['title'] = 'Edita Tus Datos';
	  if($loggedUser){
		
		if($request->isPost()){
     		return self::solve_editProfile_post($request, $response, $args,$loggedUser);
		}
		 else{   //si se trata de una petición Get:
		   $args['title'] = 'Edita Tus Datos';
		   $args['loggedUser'] = $loggedUser;	
		   return $this->render($response, 'editProfile.php', $args);
		   }
	 
	  }else{ 
		$args['error'] = 'Estas intentando acceder sin permisos';
		return $this->render($response, 'home.php', $args);}
   }
		
	
    public function showProfileAction($request, $response, $args)
    {
        $args['title'] = 'Mi Perfil';
        $loggedUser = $request->getAttribute('loggedUser');
		$picDefault="/assets/images/add_user.png";
        if ($loggedUser) {
			if(!$loggedUser['foto'])
				$loggedUser['foto']=$picDefault;										 
			$args['loggedUser'] = $loggedUser;
			return $this->render($response,'profile.php', $args);
        }else {
         $args['error'] = 'Primero debes iniciar sesión';
		 return $this->render($response,'login.php', $args);
     }
 }

    public function createUserAction($request, $response, $args)
    {
        $args['title'] = 'Nuevo usuario';

        if ($request->isPost()) {
            $user = $request->getParam('user');
            if (!$this->userExists($user['email'])) {
                unset($user['password-r']);
                //encriptar contraseña

                $id = $this->db->insert(array_keys($user))
                    ->into('usuarios')
                    ->values(array_values($user))
                    ->execute()
                ;

                if ($id) {
                    $args['title'] = 'Bienvenido ' . $user['nombre'];
                    $args['loggedUser'] = $user;
                    $_SESSION['loggeduser'] = base64_encode(serialize($user));

                    return $this->render($response, 'home.php', $args);
                }

                $args['error'] = 'Error al crear el usuario, vuelva a intentarlo';
            } else {
                $args['error'] = 'El usuario introducido ya existe';
            }
        }

        return $this->render($response, 'createUser.php', $args);
    }

	
//PRIVATE FUNCTIONS:
	
    private function userExists($email)
    {
        $user = $this->db->select()
            ->from('usuarios')
            ->where('email', '=', htmlspecialchars($email))
            ->execute()
            ->fetch()
        ;

        return $user !== false;
    }
	
	private function solve_editProfile_post($request,$response,$args,$loggedUser){
		   $picDefault="/assets/images/add_user.png";
		   $newUser = $request->getParam('user');
		   unset($newUser['password-r']);
		   if(!$newUser['foto'])
				$newUser['foto']=$picDefault;	
		   else 
			   $newUser['foto']=self::proc_profileImage($newUser['foto']);
		   
		   foreach ($newUser as $clave => $valor){
			   $newUser[$clave]=htmlspecialchars(trim(strip_tags($valor)));
		   }
		   
		   $id = $this->db->update($newUser)
					  ->table('usuarios')
                      ->where('email','=',$loggedUser['email'])
					  ->execute()
                      ;
            //si se ha actualizado usuario correctamente:				
		   if($id){
			  $args['title'] = 'Mi Perfil';	
			  $loggedUser=$newUser;
			  $_SESSION['loggeduser'] = base64_encode(serialize($loggedUser));									 
			  $args['loggedUser'] = $loggedUser;	
		      return $this->render($response, 'profile.php', $args);
		   }else{
			  $args['error'] = 'Error No se han podido actualizar tus datos vuelve a intentarlo';
		      return $this->render($response, 'editProfile.php', $args);}
		
	}
	
	//not finished, please don't touch
	private function proc_profileImage($originPic){ //devuelve la ruta a almacenar en la bd
	//para tratar la foto
	$picDefault="/assets/images/add_user.png";
	$originFile=isset($_FILES['pic'])? $_FILES['pic']:false;
	if($originFile){
	  $originName=$originFile['name'];
	  $originType=$originFile['type'];
	  if (((strpos($originType, "gif") || strpos($img_type, "jpeg") ||strpos($img_type, "jpg")) 
		     || strpos($img_type, "png"))){
				 $originName=htmlspecialchars(trim(strip_tags($originName))); 
				  //construir nueva imagen
				  return $picDefault;
			  }
	}
	
	
		
		return $picDefault;
		
	}
	
}