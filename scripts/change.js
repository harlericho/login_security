$("#btnCambiar").click(function (e) {
    if (validacion() == true) {
        let data = $("#change").serialize();
        //console.log(data);
        if (validacion() == true) {
            cambiarContrasena(data);
        }
        setTimeout("redirecionar()", 2000);
    }
    e.preventDefault();
});

function cambiarContrasena(data) {
    $.ajax({
        type: "POST",
        url: "../controllers/changes.php",
        data: data,
        success: function (response) {
            if (response) {
                Swal.fire({
                    position: 'right-end',
                    icon: 'info',
                    title: 'Su contraseña ha sido cambiada',
                    showConfirmButton: false,
                    timer: 1500
                })
            }

        }
    });
}
function validacion() {
    let contranueva = $("#contranueva").val();
    let recontra = $("#recontra").val();
    if ($.trim(contranueva) == "") {
        $.notify("Ingrese una contraseña nueva", "warn");
        $("#contranueva").focus();
    } else if ($.trim(recontra) == "") {
        $.notify("Repetir la contraseña nueva", "warn");
        $("#recontra").focus();
    } else {
        if (contranueva === recontra) {
            return true;
        } else {
            $.notify("Las contraseñas no son iguales", "error");
            $("#recontra").focus();
        }
    }
}

function redirecionar() {
    $(location).attr('href', '../views/out.php');
}