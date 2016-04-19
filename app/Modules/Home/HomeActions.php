<?php

namespace Modules\Home;

use Core;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
*
*/
class HomeActions extends Core\AbstractActions
{
    public function indexAction(Request $request)
    {
        return $this->renderPartial('Home/home');
    }

    public function helloAction(Request $request, $name)
    {
        $this->name = ucfirst($name);
        $this->age = $request->get('age', 0);

        return $this->renderPartial('Home/hello');
    }
}