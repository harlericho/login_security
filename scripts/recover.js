$("#btnEnviar").click(function (e) {
    if (validacion() == true) {
        let data = $("#recover").serialize();
        //console.log(data);
        enviarDatos(data);

    }
    e.preventDefault();
});
function enviarDatos(data) {
    $.ajax({
        type: "POST",
        url: "../controllers/recover.php",
        data: data,
        success: function (response) {
            if (response == 1) {
                $.notify("Este usuario existe", "success");
                setTimeout("redirecionar()", 1000);
            } else if (response == 2) {
                $.notify("No existe email", "warn");
                $("#email").focus();
            }
        }
    });
}

function redirecionar() {
    $(location).attr('href', '../views/change.php');
}

function validacion() {
    let email = $("#email").val();
    if ($.trim(email) == "") {
        $.notify("Ingrese su email", "warn");
        $("#email").focus();
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