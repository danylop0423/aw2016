<?php
// Application middleware

/* Logged user middleware */
$app->add(function ($request, $response, $next) {
    $loggeduser = isset($_SESSION['loggeduser']) ? unserialize(base64_decode($_SESSION['loggeduser'])) : false;

    $renderer = $this->get('renderer');
    $renderer->addAttribute('loggedUser', $loggeduser);
    $response = $next($request, $response);

    return $response;
});