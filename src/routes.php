<?php
// Routes
$app->add(function ($request, $response, $next) use ($app) {
    $args['x'] = '¿Te gusta lo que ves?';
    // $response->write($args);
    // var_dump($app->get('renderer')->addAttribute());die;
    $renderer = $this->get('renderer');
    $renderer->addAttribute('x', $args['x']);
    $response = $next($request, $response, $args);

    return $response;
});

$app->get('/', 'HomeController:home');

$app->any('/login', 'HomeController:login');
