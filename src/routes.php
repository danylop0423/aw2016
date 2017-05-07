<?php

/* HomeController Routes */
$app->get('/', 'HomeController:homeAction');

$app->any('/login', 'HomeController:loginAction');

$app->get('/logout', 'HomeController:logoutAction');

$app->any('/contacto','HomeController:contactAction');

$app->any('/asistencia','HomeController:technicalassistantAction');

$app->any('/condiciones','HomeController:condicionesAction');

$app->any('/politicas','HomeController:politicasAction');

$app->any('/reembolso','HomeController:reembolsoAction');


/* UserController Routes */
$app->any('/nuevo-usuario', 'UserController:createUserAction');

$app->get('/profile','UserController:showProfileAction');

$app->any('/editProfile','UserController:editProfileAction');

$app->get('/bidList','UserController:listBidAction');


/* AuctionController Routes */
$app->get('/subastas[/{category}]', 'AuctionController:listAuctionsAction');

$app->get('/subastas/{category}/{subcategory}', 'AuctionController:listAuctionsAction');

$app->get('/subasta/{id}', 'AuctionController:showAuctionAction');


/* ManagementController Routes */
$app->any('/gestion/subastas[/{action}]', 'ManagementController:manageAuctionsAction');

$app->any('/gestion/productos[/{action}]', 'ManagementController:manageProductsAction');


/* AjaxController Routes Wrapper */
$app->any('/ajax/{method}', 'AjaxController:executeAction');
