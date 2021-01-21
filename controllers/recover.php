<?php
require_once "../models/crud.php";
session_start();
if (Crud::_usuarioExistenteemail($_POST['email'])) {
    echo 1;
    $_SESSION['user'] = $_POST['email'];
} else {
    echo 2;
}
