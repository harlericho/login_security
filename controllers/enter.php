<?php
require_once "../models/crud.php";
require_once "../config/sha1.php";
$arrayName = array(
    'email' => $_POST['email'],
    'contrasena' => SHA1::_encryptacion($_POST['contra']),
    'estado' => 'A',
);
if (Crud::_ingresarUsuario($arrayName)) {
    echo 1;
} else {
    echo 0;
}
