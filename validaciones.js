function validate() {
    var valid = true;
    $(".demoInputBox").css('background-color', '');
    $(".info").html('');

    if (!$("#int-ci").val()) {
        $("#ci-info").html("(El Campo Cedula Es Obligatorio)");
        $("#int-ci").css('background-color', '#FFFFDF');
        $("#ci-info").css('color', 'red');
        valid = false;
    }

    if (!$("#txt-nom-ape").val()) {
        $("#txt-nom-ape-info").html("(El Campo Nombre/Apellido Es Obligatorio)");
        $("#txt-nom-ape").css('background-color', '#FFFFDF');
        $("#txt-nom-ape-info").css('color', 'red');
        valid = false;
    }

    if (!$("#int-telefono").val()) {
        $("#telefono-info").html("(El Campo Telefono Es Obligatorio)");
        $("#int-telefono").css('background-color', '#FFFFDF');
        $("#telefono-info").css('color', 'red');
        valid = false;
    }
    if (!$("#txt-centrovotacion").val()) {
        $("#txt-centrovotacion-info").html("(El Campo Centro de Votaci&oacute;n)");
        $("#txt-centrovotacion").css('background-color', '#FFFFDF');
        $("#txt-centrovotacion-info").css('color', 'red');
        valid = false;
    }




    return valid;
}
function enteros(objeto, e) {
    var keynum
    var keychar
    var numcheck
    if (window.event) { /*/ IE*/
        keynum = e.keyCode
    }
    else if (e.which) { /*/ Netscape/Firefox/Opera/*/
        keynum = e.which
    }
    if ((keynum >= 35 && keynum <= 37) || keynum == 8 || keynum == 9 || keynum == 46 || keynum == 39) {
        return true;
    }
    if ((keynum >= 95 && keynum <= 105) || (keynum >= 48 && keynum <= 57)) {
        return true;
    } else {
        return false;
    }
}
function validate_edit() {
    var valid = true;


    if (!$("#int-ci").val()) {
        $("#ci-info").html("(El Campo Cedula Es Obligatorio)");
        $("#int-ci").css('background-color', '#FFFFDF');
        $("#ci-info").css('color', 'red');
        valid = false;
    }

    if (!$("#txt-nom-ape").val()) {
        $("#txt-nom-ape-info").html("(El Campo Nombre/Apellido Es Obligatorio)");
        $("#txt-nom-ape").css('background-color', '#FFFFDF');
        $("#txt-nom-ape-info").css('color', 'red');
        valid = false;
    }

    if (!$("#int-telefono").val()) {
        $("#telefono-info").html("(El Campo Telefono Es Obligatorio)");
        $("#int-telefono").css('background-color', '#FFFFDF');
        $("#telefono-info").css('color', 'red');
        valid = false;
    }




    return valid;
}
function validate_new_votante() {
    var valid = true;


    if (!$("#int-ci-patrullero").val()) {
        $("#int-ci-patrullero-info").html("(El Campo Es Obligatorio)");
        $("#int-ci-patrullero").css('background-color', '#FFFFDF');
        $("#int-ci-patrullero-info").css('color', 'red');
        valid = false;
    }
    if (!$("#txt-nom-ape").val()) {
        $("#txt-nom-ape-info").html("(El Campo Es Obligatorio)");
        $("#txt-nom-ape").css('background-color', '#FFFFDF');
        $("#txt-nom-ape-info").css('color', 'red');
        valid = false;
    }
    if (!$("#ci-votante").val()) {
        $("#ci-votante-info").html("(El Campo Es Obligatorio)");
        $("#ci-votante").css('background-color', '#FFFFDF');
        $("#ci-votante-info").css('color', 'red');
        valid = false;
    }
    if (!$("#int-telefono").val()) {
        $("#int-telefono-info").html("(El Campo Es Obligatorio)");
        $("#int-telefono").css('background-color', '#FFFFDF');
        $("#int-telefono-info").css('color', 'red');
        valid = false;
    }
    if (!$("#txt-institucion").val()) {
        $("#txt-institucion-info").html("(El Campo Es Obligatorio)");
        $("#txt-institucion").css('background-color', '#FFFFDF');
        $("#txt-institucion-info").css('color', 'red');
        valid = false;
    }
    return valid;
}
















function validate_edit_jefe_votante() {
    var valid = true;


    if (!$("#int-ci").val()) {
        $("#ci-info").html("(El Campo Cedula Es Obligatorio)");
        $("#int-ci").css('background-color', '#FFFFDF');
        $("#ci-info").css('color', 'red');
        valid = false;
    }

    if (!$("#txt-nom-ape").val()) {
        $("#txt-nom-ape-info").html("(El Campo Nombre/Apellido Es Obligatorio)");
        $("#txt-nom-ape").css('background-color', '#FFFFDF');
        $("#txt-nom-ape-info").css('color', 'red');
        valid = false;
    }

    if (!$("#int-telefono").val()) {
        $("#telefono-info").html("(El Campo Telefono Es Obligatorio)");
        $("#int-telefono").css('background-color', '#FFFFDF');
        $("#telefono-info").css('color', 'red');
        valid = false;
    }

	
	
	
	
	    if (!$("#txt-Centro_Votacion_Jefe").val()) {
        $("#txt-Centro_Votacion_Jefe-info").html("(El Campo Telefono Es Obligatorio)");
        $("#txt-Centro_Votacion_Jefe").css('background-color', '#FFFFDF');
        $("#txt-Centro_Votacion_Jefe-info").css('color', 'red');
        valid = false;
    }

	    if (!$("#txt-Aporte_Institucion").val()) {
        $("#txt-Aporte_Institucion-info").html("(El Campo Telefono Es Obligatorio)");
        $("#txt-Aporte_Institucion").css('background-color', '#FFFFDF');
        $("#txt-Aporte_Institucion").css('color', 'red');
        valid = false;
    }

	
	



    return valid;
}
