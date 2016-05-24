<?php

class UserController extends AbstractController
{
	
	public function editProfileAction($request, $response, $args)
    {
	  $args['title'] = 'Edita Tus Datos';
	  $loggedUser = $request->getAttribute('loggedUser');
	  $picDefault="/assets/images/add_user.png";
	  if($loggedUser){
		if($request->isPost()){
			/*
			 // UPDATE users SET usr = ? , pwd = ? WHERE id = ?
			$updateStatement = $slimPdo->update(array('usr' => 'your_new_username'))
                           ->set(array('pwd' => 'your_new_password'))
                           ->table('users')
                           ->where('id', '=', 1234);

$affectedRows = $updateStatement->execute();
			*/
			//actualizar datos
		   $newUser = $request->getParam('user');
		   unset($newUser['password-r']);

                $id = $this->db->update($newUser)
                    ->table('usuarios')
                    ->where('id','=',$loggedUser['email'])
					//->execute()
                ;

		        $args['title'] = 'Mi Perfil Nuevo';
				if(!$loggedUser['foto'])
					$loggedUser['foto']=$picDefault;										 
				$args['loggedUser'] = $loggedUser;	
		        return $this->render($response, 'profile.php', $args);
		   
		   
		}else{   
		  $args['loggedUser'] = $loggedUser;	
		  return $this->render($response, 'editProfile.php', $args);
		 }
	  } else{
		  $args['error'] = 'Estas intentando acceder sin permisos';
		  return $this->render($response, 'home.php', $args);
		}
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
}