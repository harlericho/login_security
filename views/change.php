<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="icon" href="../images/favicon.ico">
    <title>Virtual SHOP</title>
</head>
<?php
session_start();
require_once "../models/crud.php";
if (!isset($_SESSION['user'])) {
    header("location: ../views/recover.html");
}
?>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-6 mt-5">
                <h1><img src="../images/keys.ico" width="50" height="50"> Cambio de contraseña </h1>
                <form id="change" method="POST">
                    <?php
                    foreach (Crud::_usuarioExistenteemail($_SESSION['user']) as $key => $value) {
                        $email = $value['email'];
                    ?>
                        <div class="mb-2">
                            <input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
                        </div>
                    <?php
                    } ?>
                    <div class="mb-2">
                        <label for="contranueva" class="form-label">Contraseña nueva</label>
                        <input type="password" class="form-control" id="contranueva" name="contranueva" autofocus>
                    </div>
                    <div class="mb-2">
                        <label for="recontra" class="form-label">Repetir contraseña</label>
                        <input type="password" class="form-control" id="recontra" name="recontra">
                    </div>
                    <button type="submit" class="btn btn-info" id="btnCambiar"> <i class="fas fa-key"></i> Cambiar</button>
                </form>
                <center>
                    <div class="justify-content-center mt-2">
                        <a href="out.php" class="link-success">Ir a login</a>
                    </div>
                </center>
            </div>
            <footer>
                <center>
                    <div class="copyright mt-5 mb-3">
                        &copy; Copyright <strong><span>Virtual SHOP</span></strong>
                        <a href="#">VirtualSHOP</a>
                    </div>
                </center>
            </footer>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script src="../scripts/change.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>