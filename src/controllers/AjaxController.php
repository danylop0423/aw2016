<?php

class AjaxController extends AbstractAjaxController
{
    public function testAction($request, $response, $args)
    {
        $array = array(
            'hola' => 'HOLA',
            'adios' => 'ADIOS',
        );

        return $this->renderJSON($response, $array);
    }
}
