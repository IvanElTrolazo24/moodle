<?php
require __DIR__.'/config.php';
require __DIR__.'/app/autoload.php';

// se reciben los parametros del formulario
use MVC\Models\Rol;

$roles = Rol::getRoles();

var_dump($roles);