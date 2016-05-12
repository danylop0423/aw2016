<?php
// Routes

$app->get('/', 'HomeController:home');

$app->any('/login', 'HomeController:login');

$app->get('/logout', 'HomeController:logout');

$app->any('/nuevo-usuario', 'UserController:createUser');

$app->any('/miperfil','HomeController:createProfile');