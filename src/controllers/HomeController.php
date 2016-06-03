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

        //Atributos del metodo mail
        $para = 'chsuarez@ucm.es';
        $asunto = 'Te chivaste';
        $email = 'cesh_christian@yahoo.es';//$request->getParam('contact[email]');
        //$nombre = $request->getParam('contact[nombre]');
        $mensaje = 'hola';//$request->getParam('contact[mensaje]');
         $cabecera = 'From: elchucky@decieza.com' . "\r\n" .'Reply-To: '. $email . "\r\n" . 'X-Mailer: PHP/' . phpversion();

        if(mail($para, $asunto, $mensaje, $cabecera)){
        //if(mail('chsuarez@ucm.es', 'Prueba', 'Mensaje Prueba', '-cesh_christian@hotmail.com')){
           echo '<p>Tu mensaje ha sido enviado correctamente. ¡Gracias!</p>'; 
        }
        else{
            echo '<p>Tu mensaje NO ha sido enviado correctamente. ¡Intentalo de nuevo!</p>';  
        }
        //echo $resultado;
        // mail('chsuarez@ucm.es', 'Prueba', 'Mensaje Prueba', $cabecera);
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