<?php
require '../models/conexion.php';
require '../models/usuario.php';

// se reciben los parametros del formulario
$user = 'root';
$pwd = 'root';

$usuario = Usuario::login($user, $pwd);
var_dump($usuario);