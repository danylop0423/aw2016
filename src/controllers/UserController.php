<?php

class UserController extends AbstractController
{
    public function showProfileAction($request, $response, $args)
    {
        $args['title'] = 'Mi Perfil';

        $loggedUser = $request->getAttribute('loggedUser');

		$picDefault="/assets/images/add_user.png";
        if ($loggedUser) {
			            $email= $loggedUser['email'];
						$bdUser = $this->db->select()
									->from('usuarios')
									->where('email', '=', htmlspecialchars($email))
									->execute()
									->fetch()
								;
								if ($bdUser) {
									$args['nombre'] = $bdUser['nombre'];
									$args['apellido'] = $bdUser['apellido'];
									$args['email'] = $bdUser['email'];
									$args['telefono'] = $bdUser['telefono'];
									$args['calle'] = $bdUser['calle'];
									$args['cp'] = $bdUser['codigo_postal'];
									$args['poblacion'] = $bdUser['poblacion'];
									$args['ciudad'] = $bdUser['ciudad'];
									if($bdUser['foto']){
									  $args['foto']=$bdUser['foto'];
									   }else{
									     $args['foto']=$picDefault;
										 }
									$args['loggedUser'] = $loggedUser;
									$_SESSION['loggeduser'] = base64_encode(serialize($loggedUser));

									return $this->render($response,'miperfil.php', $args);
								}

								$args['error'] = 'Error al consultar los datos';
     } else {
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