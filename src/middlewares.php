<?php

/* Logged user middleware */
$app->add(function ($request, $response, $next) {
    $loggeduser = isset($_SESSION['loggeduser']) ? unserialize(base64_decode($_SESSION['loggeduser'])) : false;

    $request = $request->withAttribute('loggedUser', $loggeduser);

    $renderer = $this->get('renderer');
    $renderer->addAttribute('loggedUser', $loggeduser);
    $response = $next($request, $response);

    return $response;
});

/* Menu content middleware */
$app->add(function ($request, $response, $next) {
    $categories = $this->db->select(array(
            'categoria.nombre as category',
            'subcategoria.nombre as subcategory',
        ))
        ->from('categoria')
        ->join('subcategoria', 'categoria.id', '=', 'subcategoria.categoria', 'INNER')
        ->execute()
        ->fetchAll()
    ;

    $orderedCategories = array();
    foreach ($categories as $elem) {
        $orderedCategories[$elem['category']][] = $elem['subcategory'];
    }

    $slug = urldecode($request->getRequestTarget());

    $renderer = $this->get('renderer');
    $renderer->addAttribute('menuCategories', $orderedCategories);
    $renderer->addAttribute('slug', $slug);
    $response = $next($request, $response);

    return $response;
});