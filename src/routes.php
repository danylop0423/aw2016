<?php

/* HomeController Routes */
$app->get('/', 'HomeController:homeAction');

$app->any('/login', 'HomeController:loginAction');

$app->get('/logout', 'HomeController:logoutAction');


/* UserController Routes */
$app->any('/nuevo-usuario', 'UserController:createUserAction');

$app->get('/miperfil','UserController:showProfileAction');


/* AuctionController Routes */
$app->get('/subasta/{id}', 'AuctionController:showAuctionAction');
