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

        //var_dump($asunto); die;
        //Atributos del metodo mail
        if ($request->isPost()) {
            //Obtengo todos los datos del formulario (contact es un array)
            $contacto=$request->getParam('contact');
            $cabecera = 'From: reversebid@reversebid.com' . "\r\n" .'Reply-To: '. $contacto['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
            $para = 'chsuarez@ucm.es';
            $asunto = 'Formulario de Contacto';

            if(mail($para, $asunto, $contacto['mensaje'], $cabecera)){
                $args['error']='Tu mensaje ha sido enviado correctamente.';
            }
            else{
                $args['error']='Tu mensaje NO se ha enviado correctamente. ¡Intentalo de nuevo!'; 
            }

            $args['contacto']=array('nombre'=>'', 'email'=>'', 'mensaje'=>'');
            return $this->render($response, 'contacto.php', $args);
        }

        $args['contacto']= array('nombre'=>'', 'email'=>'', 'mensaje'=>'');
        return $this->render($response, 'contacto.php', $args);
    } 


    public function technicalassistantAction($request, $response, $args) {
        $args['title'] = 'Asistencia técnica';

        //Atributos del metodo mail
        if ($request->isPost()) {
            //Obtengo todos los datos del formulario (assistance es un array)
            $asistencia=$request->getParam('assistance');
            $cabecera = 'From: reversebid@reversebid.com' . "\r\n" .'Reply-To: '. $asistencia['email'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();

            $para = 'davidzam@ucm.es';
            $asunto = 'Formulario de Asistencia técnica';

            if(mail($para, $asunto, $asistencia['mensaje'], $cabecera)){
                $args['error']='Tu mensaje ha sido enviado correctamente.';
            }
            else{
                $args['error']='Tu mensaje NO se ha enviado correctamente. ¡Intentalo de nuevo!';  
            }
            $args['asistencia']=array('nombre'=>'', 'email'=>'', 'mensaje'=>'');
            return $this->render($response, 'asistencia.php', $args);
        }      

        $args['asistencia']= array('nombre'=>'', 'email'=>'', 'mensaje'=>'');
        return $this->render($response, 'asistencia.php', $args);
    }


    public function politicasAction($request, $response, $args) {
        $args['title'] = 'Políticas de Privacidad';
        
        return $this->render($response, 'politicas.php', $args);
    } 


    public function reembolsoAction($request, $response, $args) {
        $args['title'] = 'Venta y Reembolso';
        
        return $this->render($response, 'reembolso.php', $args);
    } 


    public function condicionesAction($request, $response, $args) {
        $args['title'] = 'Condiciones de Uso';
        
        return $this->render($response, 'condiciones.php', $args);
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