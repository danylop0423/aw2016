<?php

class HomeController extends AbstractController
{
    public function home($request, $response, $args)
    {
        $args['title'] = 'Home';

        return $this->render($response, 'home.php', $args);
    }

	public function userIn($request){
		$user = $request->getParam('user');
            $pass = $request->getParam('password');

            $user = $this->db->select()
                ->from('usuarios')
                ->where('email', '=', htmlspecialchars($user))
                ->execute()
                ->fetch()
            ;

            if ($user && $user['password'] === $pass) {
				return $user;
			} else return false;
	}
	
	
    public function login($request, $response, $args)
    {
        $args['title'] = 'Iniciar sesión';

        if ($request->isPost()) {
            $user=self::userIn($request);
			
			if ( $user !== false) {
                $args['loggedUser'] = $user;
                $_SESSION['loggeduser'] = base64_encode(serialize($user));

                return $this->home($request, $response, $args);
            }

            $args['error'] = 'Usuario o contraseña incorrectas';
        }

        return $this->render($response, 'login.php', $args);
    }

	
	
    public function logout($request, $response, $args)
    {
        unset($_SESSION['loggeduser']);

        return $response->withStatus(302)->withHeader('Location', '/');
    }

// acceso a mi perfil, solo si el usuario tiene sesión abierta	
    public function createProfile($request, $response, $args)
    {
        $args['title'] = 'Mi Perfil';
        $flag=isset($_SESSION['loggeduser'])?$_SESSION['loggeduser']:false;
		
		if($flag !==false)	{
         return $this->render($response,'miperfil.php', $args);
        }else{
		 return $this->render($response,'login.php', $args);
		}	
	}
	
	
	
}