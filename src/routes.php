<?php
// Routes

$app->get('/', 'HomeController:home');

$app->any('/login', 'HomeController:login');
