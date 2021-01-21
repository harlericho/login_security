<?php
require_once "../models/crud.php";
require_once "../config/sha1.php";
$arrayName = array(
    'nombres' => $_POST['nombres'],
    'dni' => $_POST['dni'],
    'email' => $_POST['email'],
    'contrasena' => SHA1::_encryptacion($_POST['recontra']),
);
if (Crud::_usuarioExistentedni($_POST['dni'])) {
    echo 0;
} elseif (Crud::_usuarioExistenteemail($_POST['email'])) {
    echo 2;
} else {
    $captcha = $_POST['g-recaptcha-response'];
    $secret = '6LeP6zQaAAAAAPsf1SfzK5yNvaDo6_KWX2XfZil7';
    $userIP = $_SERVER['REMOTE_ADDR'];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
    $response = json_decode($response);
    if ($response->success) {
        echo Crud::_guardarUsuario($arrayName);
    } else {
        echo 3;
    }
}
