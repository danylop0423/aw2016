<?php
// Routes

$app->get('/', 'HomeController:homeAction');

$app->any('/login', 'HomeController:loginAction');

$app->get('/logout', 'HomeController:logoutAction');

$app->any('/nuevo-usuario', 'UserController:createUserAction');

$app->get('/miperfil','UserController:showProfileAction');
