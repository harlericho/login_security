
$("#btnGuardar").click(function (e) {
    if (validaciones() == true) {
        let data = $("#registrer").serialize();
        //console.log(data);
        guardar(data);
    }
    e.preventDefault();
});

function guardar(data) {
    $.ajax({
        type: "POST",
        url: "../controllers/save.php",
        data: data,
        success: function (response) {
            if (response == 0) {
                $("#dni").focus();
                $.notify("Ese dni ya existe", "warn");
            } else if (response == 2) {
                $("#email").focus();
                $.notify("Ese email ya existe", "warn");
            } else if (response == 3) {
                $.notify("Error en captcha de comprobación", "error");
            } else {
                $("#registrer")[0].reset();
                $("#nombres").focus();
                grecaptcha.reset();
                $.notify("Usuario guardado", "success");
            }
        }
    });
}
function validaciones() {
    let nombre = $("#nombres").val();
    let dni = $("#dni").val();
    let email = $("#email").val();
    let contra = $("#contra").val();
    let recotra = $("#recontra").val();
    if ($.trim(nombre) == "") {
        $.notify("Ingrese sus nombres", "warn");
        $("#nombres").focus();
    } else if ($.trim(dni) == "") {
        $.notify("Ingrese su dni", "warn");
        $("#dni").focus();
    } else if ($.trim(email) == "") {
        $.notify("Ingrese su email", "warn");
        $("#email").focus();
    } else if ($.trim(contra) == "") {
        $.notify("Ingrese su contraseña", "warn");
        $("#contra").focus();
    } else if ($.trim(recotra) == "") {
        $.notify("Repetir la contraseña", "warn");
        $("#recontra").focus();
    } else if ($.trim(email) != "") {
        if (validarEmail(email) == true) {
            if (contra === recotra) {
                let response = grecaptcha.getResponse();
                if (response.length != 0) {
                    return true;
                } else {
                    $.notify("Elegir el captcha", "warn");
                    return false;
                }
            } else {
                $.notify("Las contraseñas no son iguales", "error");
                $("#recontra").focus();
            }
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