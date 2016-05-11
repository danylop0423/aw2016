<?php

class UserController extends AbstractController
{
    public function createUser($request, $response, $args)
    {
        $args['title'] = 'Nuevo usuario';

        $this->render($response, 'createUser.php', $args);
    }
}