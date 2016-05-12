<?php

class ProfileController extends AbstractController{

    public function createProfile($request, $response, $args)
    {
        $args['title'] = 'Mi Perfil';
        
        return $this->render($response,'miperfil.php', $args);
    }

   
}