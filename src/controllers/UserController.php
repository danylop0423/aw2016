<?php

class UserController extends AbstractController
{
    public function showProfileAction($request, $response, $args)
    {
        $args['title'] = 'Mi Perfil';

        $loggedUser = $request->getAttribute('loggedUser');

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

            if (!$this->userExist($user['email'])) {
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

    private function userExist($email)
    {
        $user = $this->db->select()
            ->from('usuarios')
            ->where('email', '=', htmlspecialchars($email))
            ->execute()
            ->fetch()
        ;

        return $user !== null;
    }
}