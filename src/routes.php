<?php

/* HomeController Routes */
$app->get('/', 'HomeController:homeAction');

$app->any('/login', 'HomeController:loginAction');

$app->get('/logout', 'HomeController:logoutAction');


/* UserController Routes */
$app->any('/nuevo-usuario', 'UserController:createUserAction');

$app->get('/profile','UserController:showProfileAction');

$app->any('/editProfile','UserController:editProfileAction');

$app->get('/subasta/{id}', 'AuctionController:showAuctionAction');

