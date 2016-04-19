<?php

namespace Core;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
*
*/
abstract class AbstractActions
{
    public function renderPartial($templatePath)
    {
        $templatePath = explode('/', $templatePath);
        $module = $templatePath[0];
        $template = $templatePath[1];

        extract(get_object_vars($this), EXTR_SKIP);
        ob_start();
        // $content = include sprintf(__DIR__ . '/../Templates/' . $module . '/' .$template . '.php');
        include sprintf(__DIR__ . '/../Layouts/defaultLayout.php');

        return new Response(ob_get_clean());
    }
}