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

        //var_dump($asunto); dead;
        //Atributos del metodo mail
        if ($request->isPost()) {
            //Obtengo todos los datos del formulario (contac es un array)
            $contacto=$request->getParam('contact');
            $cabecera = 'From: elchucky@decieza.com' . "\r\n" .'Reply-To: '. $contacto['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
            $para = 'chsuarez@ucm.es';
            $asunto = 'Formulario de Contacto';

            if(mail($para, $asunto, $contacto['mensaje'], $cabecera)){
                $args['error']='Tu mensaje ha sido enviado correctamente.';
                $args['contacto']= array('nombre'=>'', 'email'=>'', 'mensaje'=>'');//enviar para vaciar el campor nombre
            }
            else{
                $args['error']='Tu mensaje NO se ha enviado correctamente. ¡Intentalo de nuevo!';  
                $args['contacto']= $contacto;
            }

            return $this->render($response, 'contacto.php', $args);
        }

        //$args['contacto']= array('nombre'=>'', 'email'=>'', 'mensaje'=>'');
        return $this->render($response, 'contacto.php', $args);
    } 


    public function loginAction($request, $response, $args)
    {
        $args['title'] = 'Iniciar sesión';

        if ($request->isPost()) {
            $user = $request->getParam('user');
            $picDefault="/assets/images/add_user.png";
			//Desencriptar contraseña
            $pass = $request->getParam('password');


            $user = $this->db->select()
                ->from('usuarios')
                ->where('email', '=', htmlspecialchars($user))
                ->execute()
                ->fetch()
            ;

            $pass = $this->decryptPassword($request);
			if(!$user['foto'])
						$user['foto']=$picDefault;			
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



    public function newProductAction($request, $response, $args) {

        $args['title'] = 'Subastar';

        return $this->render($response, 'newProduct.php', $args);
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