<?php

/* HomeController Routes */
$app->get('/', 'HomeController:homeAction');

$app->any('/login', 'HomeController:loginAction');

$app->get('/logout', 'HomeController:logoutAction');

 $app->get('/contacto','HomeController:contactAction');

 $app->get('/asistencia','HomeController:technicalAssistantAction');


/* UserController Routes */
$app->any('/nuevo-usuario', 'UserController:createUserAction');

$app->get('/profile','UserController:showProfileAction');

$app->any('/editProfile','UserController:editProfileAction');


/* AuctionController Routes */
 $app->get('/subastas[/{category}/{subcategory}]', 'AuctionController:listAuctionsAction');

 $app->get('/subasta/{id}', 'AuctionController:showAuctionAction');



