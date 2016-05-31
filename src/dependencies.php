<?php

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// database access
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new \Slim\PDO\Database(
        "mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'] . ';charset=utf8',
        $db['user'],
        $db['pass']
    );
    return $pdo;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG));
    return $logger;
};

// 404 handler
$container['notFoundHandler'] = function ($c) {
    return function ($request, $reponse) use ($c) {
        $data['title'] = 'Página no encontrada';
        $data['url'] = $request->getUri()->getBaseUrl() . $request->getUri()->getPath();

        return $c['renderer']->renderPartial($reponse, 'error404.php', $data)->withStatus(404);
    };
};
