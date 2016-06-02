<?php

/* HomeController Routes */
$app->get('/', 'HomeController:homeAction');

$app->any('/login', 'HomeController:loginAction');

$app->get('/logout', 'HomeController:logoutAction');

$app->any('/contacto','HomeController:contactAction');

$app->get('/asistencia','HomeController:technicalAssistantAction');

$app->any('/newProduct','HomeController:newProductAction');


/* UserController Routes */
$app->any('/nuevo-usuario', 'UserController:createUserAction');

$app->get('/profile','UserController:showProfileAction');

$app->any('/editProfile','UserController:editProfileAction');


/* AuctionController Routes */
$app->get('/subastas[/{category}]', 'AuctionController:listAuctionsAction');

$app->get('/subastas/{category}/{subcategory}', 'AuctionController:listAuctionsAction');

$app->get('/subasta/{id}', 'AuctionController:showAuctionAction');

$app->any('/nuevaSubasta', 'AuctionController:createAuctionAction');

$app->any('/uploadImage', 'AuctionController:uploadImagerAction');

$app->any('/gestion/subastas', 'AuctionController:manageAuctionsAction');


/* AjaxController Routes Wrapper */
$app->any('/ajax/{method}', 'AjaxController:executeAction');
