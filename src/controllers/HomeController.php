<?php

class HomeController extends AbstractController
{
    public function homeAction($request, $response, $args)
    {
        $args['title'] = 'Home';

        return $this->render($response, 'home.php', $args);
    }

    public function contactAction($request, $response, $args) {
        $args['title'] = 'Contáctanos';

        return $this->render($response, 'contacto.php', $args);
    }   

    public function loginAction($request, $response, $args)
    {
        $args['title'] = 'Iniciar sesión';

        if ($request->isPost()) {
            $user = $request->getParam('user');
            //Desencriptar contraseña
            $pass = $request->getParam('password');


            $user = $this->db->select()
                ->from('usuarios')
                ->where('email', '=', htmlspecialchars($user))
                ->execute()
                ->fetch()
            ;

            $pass = $this->decryptPassword($request);

            if ($user && $user['password'] === $pass) {
                $args['loggedUser'] = $user;
                $_SESSION['loggeduser'] = base64_encode(serialize($user));

                return $this->homeAction($request, $response, $args);
            }

            $args['error'] = 'Usuario o contraseña incorrectas';
        }

        return $this->render($response, 'login.php', $args);
    }

    public function logoutAction($request, $response, $args)
    {
        unset($_SESSION['loggeduser']);

        return $response->withStatus(302)->withHeader('Location', '/');
    }


    private function decryptPassword($request){

        $user = $request->getParam('user');
        $pepper = 'estoeslaPimienta12389';
        $passIntend = $request->getParam('password');

        $user = $this->db->select()
                ->from('usuarios')
                ->where('email', '=', htmlspecialchars($user))
                ->execute()
                ->fetch()
            ;

        $salt = $user['salt'];

        $pass = $salt;
        $pass .= $passIntend;
        $pass .= $pepper;

        return  hash('sha256', $pass);

    }

}