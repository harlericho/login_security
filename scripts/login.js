
$("#btnIngresar").click(function (e) {
    if (validacion() == true) {
        let data = $("#login").serialize();
        //console.log(data);
        ingresar(data);
        $("#login")[0].reset();
        $("#email").focus();
    }
    e.preventDefault();
});
function ingresar(data) {
    $.ajax({
        type: "POST",
        url: "../controllers/enter.php",
        data: data,
        success: function (response) {
            if (response == 0) {
                Swal.fire({
                    position: 'right-end',
                    icon: 'error',
                    title: 'Usuario no exite, revisar',
                    showConfirmButton: false,
                    timer: 2500
                })
            } else if (response == 1) {
                Swal.fire({
                    position: 'right-end',
                    icon: 'success',
                    title: 'Bienvenido usuario',
                    showConfirmButton: false,
                    timer: 2500
                })
            }
        }
    });
}

function validacion() {
    let email = $("#email").val();
    let contra = $("#contra").val();
    if ($.trim(email) == "") {
        $.notify("Ingrese su email", "warn");
        $("#email").focus();
    } else if ($.trim(contra) == "") {
        $.notify("Ingrese su contraseña", "warn");
        $("#contra").focus();
    } else {
        if (validarEmail(email) == true) {
            return true;
        } else {
            return false;
        }
    }
}

function validarEmail(valor) {
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    if (emailRegex.test(valor)) {
        return true;
    } else {
        $.notify("Email no valido", "error");
        $("#email").focus();
        return false;
    }
}