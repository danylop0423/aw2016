<?php

spl_autoload_register(function ($classname) {
    require __DIR__  . ('/controllers/' . $classname . '.php');
});