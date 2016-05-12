<?php

class UserController extends AbstractController
{
    public function createUser($request, $response, $args)
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
        if($user){
         return true;
	    }else{
		  return false;
		  }	
    }
}