<?php

class HomeController extends AbstractController
{
    public function home($request, $response, $args)
    {
        $args['title'] = 'Home';

        return $this->render($response, 'home.php', $args);
    }

    public function login($request, $response, $args)
    {
        $args['title'] = 'Iniciar sesión';

        if ($request->isPost()) {
            $user = $request->getParam('user');
            $pass = $request->getParam('password');

            $user = $this->db->select()
                ->from('usuarios')
                ->where('email', '=', htmlspecialchars($user))
                ->execute()
                ->fetch()
            ;

            var_dump($user);

            die;
        }

        return $this->render($response, 'login.php', $args);
    }
}