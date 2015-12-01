(function ($) {
    $(document).ready(function () {
        jQuery(function ($) {

            $("#int-telefono").mask("9999-9999-999");
            $("#telefono").mask("9999-9999-999");


        });
//        $("#int-telefono").mask("99/99/9999");
        $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            $(this).parent().siblings().removeClass('open');
            $(this).parent().toggleClass('open');
        });
    });
})(jQuery);
function validateNewUsuario() {
    var valid = true;

    if (!$("#cedula").val()) {
        $("#cedula-info").html("(El Campo Es Obligatorio)");
        $("#cedula").css('background-color', '#FFFFDF');
        $("#cedula-info").css('color', 'red');
        valid = false;
    }

    if (!$("#nombres").val()) {
        $("#nombres-info").html("(El Campo Es Obligatorio)");
        $("#nombres").css('background-color', '#FFFFDF');
        $("#nombres-info").css('color', 'red');
        valid = false;
    }
    if ($("#telefono").val() == 0) {
        $("#telefono").css('background-color', '#FFFFDF');
        $("#telefono-info").html("(El Campo Es Obligatorio)");
        $("#telefono-info").css('color', 'red');
        valid = false;
    }
    if ($("#id_rol").val() == 0) {
        $("#id_rol-info").html("(El Campo Es Obligatorio)");
        $("#id_rol").css('background-color', '#FFFFDF');
        $("#id_rol-info").css('color', 'red');
        valid = false;
    }
    if ($("#id_eje").val() == 0) {
        $("#id_eje-info").html("(El Campo Es Obligatorio)");
        $("#id_eje").css('background-color', '#FFFFDF');
        $("#id_eje-info").css('color', 'red');
        valid = false;
    }
    if (!$("#username").val()) {
        $("#username-info").html("(El Campo Es Obligatorio)");
        $("#username").css('background-color', '#FFFFDF');
        $("#username-info").css('color', 'red');
        valid = false;
    }
    if (!$("#password").val()) {
        $("#password-info").html("(El Campo Es Obligatorio)");
        $("#password").css('background-color', '#FFFFDF');
        $("#password-info").css('color', 'red');
        valid = false;
    }
    return valid;
}
function validateNuevoPatrullero() {
    var valid = true;
    /*validacion de la Cedula del patrullero*/
    if (!$("#int-ci").val()) {
        $("#int-ci-info").html("(El Campo Es Obligatorio)");
        $("#int-ci").css('background-color', '#FFFFDF');
        $("#int-ci-info ").css('color', 'red');
        $("#id-div-int-ci-patrullero").addClass("has-error");
        valid = false;
    }
    if ($("#int-ci").val()) {
        $("#int-ci-patrullero-info").html("");
        $("#id-div-int-ci-patrullero").removeClass("has-error");
        $("#int-ci-info").css('color', '');
        $("#int-ci").css('background-color', '#eee');
        valid = true;
    }
    /*Validacion del Campo Nombre del Patrullaro*/
    if (!$("#txt-nom-ape").val()) {
        $("#txt-nom-ape-info").html("(El Campo Es Obligatorio)");
        $("#txt-nom-ape").css('background-color', '#FFFFDF');
        $("#txt-nom-ape-info").css('color', 'red');
        $("#id-div-txt-nombre-patrullero").addClass("has-error");
        valid = false;
    }
    if ($("#txt-nom-ape").val()) {
        $("#txt-nom-ape-info").html("");
        $("#txt-nom-ape").css('background-color', '#eee');
        $("#txt-nom-ape-info").css('color', '');
        $("#id-div-txt-nombre-patrullero").removeClass("has-error");
        valid = true;
    }
    /*validacion para el telefono del jefe de patrulla*/
    if (!$("#txt-telefono-patrullero").val()) {
        $("#txt-telefono-patrullero-info").html("(El Campo Es Obligatorio)");
        $("#txt-telefono-patrullero").css('background-color', '#FFFFDF');
        $("#txt-telefono-patrullero-info").css('color', 'red');
        $("#id-div-txt-telefono-patrullero").removeClass("has-error");
        valid = false;
    }
    if ($("#txt-telefono-patrullero").val()) {
        $("#txt-telefono-patrullero-info").html("");
        $("#txt-telefono-patrullero").css('background-color', '#eee');
        $("#txt-telefono-patrullero-info").css('color', '');
        $("#id-div-txt-telefono-patrullero").removeClass("has-error");
        valid = false;
    }
    /*Validacion de la cedula patrullada*/
    if (!$("#int-ci-patrullado").val()) {
        $("#int-ci-patrullado-info").html("(El Campo Es Obligatorio)");
        $("#int-ci-patrullado-info").css('color', 'red');
        $("#int-ci-patrullado").css('background-color', '#FFFFDF');
        $("#id-div-cedula-patrullado").addClass("has-error");
        valid = false;
    }
    if ($("#int-ci-patrullado").val()) {
        $("#int-ci-patrullado-info").html("");
        $("#id-div-cedula-patrullado").removeClass("has-error");
        $("#ci-patrullado-info").css('color', '');
        $("#int-ci-patrullado").css('background-color', '#eee');
        valid = true;
    }
    /*Validacion del Nombre y el Apellido Patrullado*/
    if (!$("#txt-nombre-patrullado").val()) {
        $("#txt-nombre-patrullado-info").html("(El Campo Es Obligatorio)");
        $("#id-div-nombre-apellido-patrullado").addClass("has-error");
        $("#txt-nombre-patrullado").css('background-color', '#FFFFDF');
        $("#txt-nombre-patrullado-info").css('color', 'red');
        valid = false;
    }

    if ($("#txt-nombre-patrullado").val()) {
        $("#txt-nombre-patrullado-info").html("");
        $("#id-div-nombre-apellido-patrullado").removeClass("has-error");
        $("#txt-nombre-patrullado-info").css('color', '');
        $("#txt-nombre-patrullado").css('background-color', '#eee');
        valid = true;
    }
    /*Validacion del Municipio del Patrullado*/
    if (!$("#txt-municipio").val()) {
        $("#txt-municipio-info").html("(El Campo Es Obligatorio)");
        $("#txt-municipio").css('background-color', '#FFFFDF');
        $("#txt-municipio-info").css('color', 'red');
        $("#id-div-municipio-patrullado").addClass("has-error");
        valid = false;
    }
    if ($("#txt-municipio").val()) {
        $("#txt-municipio-info").html("");
        $("#txt-municipio").css('background-color', '#eee');
        $("#txt-municipio-info").css('color', '');
        $("#id-div-municipio-patrullado").removeClass("has-error");
        valid = true;
    }
    /*Validacion de la Parroquia del Patrullado*/
    if (!$("#txt-parroquia").val()) {
        $("#txt-parroquia-info").html("(El Campo Es Obligatorio)");
        $("#txt-parroquia").css('background-color', '#FFFFDF');
        $("#txt-parroquia-info").css('color', 'red');
        $("#id-div-parroquia-patrullado").addClass("has-error");
        valid = false;
    }
    if ($("#txt-parroquia").val()) {
        $("#txt-parroquia-info").html("");
        $("#txt-parroquia").css('background-color', '#eee');
        $("#txt-parroquia-info").css('color', '');
        $("#id-div-parroquia-patrullado").removeClass("has-error");
        valid = true;
    }
    if (!$("#txt-centrovotacion").val()) {
        $("#txt-centrovotacion-info").html("(El Campo Es Obligatorio)");
        $("#txt-centrovotacion").css('background-color', '#FFFFDF');
        $("#txt-centrovotacion-info").css('color', 'red');
        $("#id-div-centrovotacion-patrullado").addClass("has-error");
        valid = false;
    }
    if ($("#txt-centrovotacion").val()) {
        $("#txt-centrovotacion-info").html("");
        $("#txt-centrovotacion").css('background-color', '#eee');
        $("#txt-centrovotacion-info").css('color', '');
        $("#id-div-centrovotacion-patrullado").removeClass("has-error");
        valid = true;
    }

    if (!$("#int-telefono").val()) {
        $("#int-telefono-info").html("(El Campo Es Obligatorio)");
        $("#int-telefono").css('background-color', '#FFFFDF');
        $("#int-telefono-info").css('color', 'red');
        $("#id-div-tlf-patrullado").addClass("has-error");
        valid = false;
    }
    if ($("#int-telefono").val()) {
        $("#int-telefono-info").html("");
        $("#int-telefono").css('background-color', '#eee');
        $("#int-telefono-info").css('color', '');
        $("#id-div-tlf-patrullado").removeClass("has-error");
        valid = true;
    }
    if ($("#id-eje-patrullellero").val() == 0) {
        $("#id-eje-patrullellero-info").html("(El Campo Es Obligatorio)");
        $("#id-eje-patrullellero").css('background-color', '#FFFFDF');
        $("#id-eje-patrullellero-info").css('color', 'red');
        $("#id-div-eje-patrullellero").addClass("has-error");
        valid = false;
    }
    return valid;
}
function enteros(objeto, e) {
    var keynum
    var keychar
    var numcheck
    if (window.event) {
        keynum = e.keyCode
    } else if (e.which) {
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
function validate_new_Patrullado() {
    var valid = true;
    /*validacion de la Cedula del Jefe de patrulla*/
    if (!$("#int-ci-patrullero").val()) {
        $("#int-ci-patrullero-info").html("(El Campo Es Obligatorio)");
        $("#int-ci-patrullero").css('background-color', '#FFFFDF');
        $("#int-ci-patrullero-info ").css('color', 'red');
        $("#id-div-int-ci-patrullero").addClass("has-error");

        valid = false;
    }
    if ($("#int-ci-patrullero").val()) {
        $("#int-ci-patrullero-info").html("");
        $("#id-div-int-ci-patrullero").removeClass("has-error");
        $("#ci-patrullado-info").css('color', '');
        $("#int-ci-patrullero").css('background-color', '#eee');
        valid = true;
    }
    /*Validacion del Campo Nombre del Patrullaro*/
    if (!$("#txt-nombre-patrullero").val()) {
        $("#txt-nombre-patrullero-info").html("(El Campo Es Obligatorio)");
        $("#txt-nombre-patrullero").css('background-color', '#FFFFDF');
        $("#txt-nombre-patrullero-info").css('color', 'red');
        $("#id-div-txt-nombre-patrullero").addClass("has-error");
        valid = false;
    }
    if ($("#txt-nombre-patrullero").val()) {
        $("#txt-nombre-patrullero-info").html("");
        $("#txt-nombre-patrullero").css('background-color', '#eee');
        $("#txt-nombre-patrullero-info").css('color', '');
        $("#id-div-txt-nombre-patrullero").removeClass("has-error");
        valid = true;
    }
    /*validacion para el telefono del jefe de patrulla*/
    if (!$("#txt-telefono-patrullero").val()) {
        $("#txt-telefono-patrullero-info").html("(El Campo Es Obligatorio)");
        $("#txt-telefono-patrullero").css('background-color', '#FFFFDF');
        $("#txt-telefono-patrullero-info").css('color', 'red');
        $("#id-div-txt-telefono-patrullero").removeClass("has-error");
        valid = false;
    }
    if ($("#txt-telefono-patrullero").val()) {
        $("#txt-telefono-patrullero-info").html("");
        $("#txt-telefono-patrullero").css('background-color', '#eee');
        $("#txt-telefono-patrullero-info").css('color', '');
        $("#id-div-txt-telefono-patrullero").removeClass("has-error");
        valid = false;
    }
    /*Validacion de la cedula patrullada*/
    if (!$("#int-ci-patrullado").val()) {
        $("#int-ci-patrullado-info").html("(El Campo Es Obligatorio)");
        $("#int-ci-patrullado-info").css('color', 'red');
        $("#int-ci-patrullado").css('background-color', '#FFFFDF');
        $("#id-div-cedula-patrullado").addClass("has-error");
        valid = false;
    }
    if ($("#int-ci-patrullado").val()) {
        $("#int-ci-patrullado-info").html("");
        $("#id-div-cedula-patrullado").removeClass("has-error");
        $("#ci-patrullado-info").css('color', '');
        $("#int-ci-patrullado").css('background-color', '#eee');
        valid = true;
    }
    /*Validacion del Nombre y el Apellido Patrullado*/
    if (!$("#txt-nombre-patrullado").val()) {
        $("#txt-nombre-patrullado-info").html("(El Campo Es Obligatorio)");
        $("#id-div-nombre-apellido-patrullado").addClass("has-error");
        $("#txt-nombre-patrullado").css('background-color', '#FFFFDF');
        $("#txt-nombre-patrullado-info").css('color', 'red');
        valid = false;
    }

    if ($("#txt-nombre-patrullado").val()) {
        $("#txt-nombre-patrullado-info").html("");
        $("#id-div-nombre-apellido-patrullado").removeClass("has-error");
        $("#txt-nombre-patrullado-info").css('color', '');
        $("#txt-nombre-patrullado").css('background-color', '#eee');
        valid = true;
    }
    /*Validacion del Municipio del Patrullado*/
    if (!$("#txt-municipio").val()) {
        $("#txt-municipio-info").html("(El Campo Es Obligatorio)");
        $("#txt-municipio").css('background-color', '#FFFFDF');
        $("#txt-municipio-info").css('color', 'red');
        $("#id-div-municipio-patrullado").addClass("has-error");
        valid = false;
    }
    if ($("#txt-municipio").val()) {
        $("#txt-municipio-info").html("");
        $("#txt-municipio").css('background-color', '#eee');
        $("#txt-municipio-info").css('color', '');
        $("#id-div-municipio-patrullado").removeClass("has-error");
        valid = true;
    }
    /*Validacion de la Parroquia del Patrullado*/
    if (!$("#txt-parroquia").val()) {
        $("#txt-parroquia-info").html("(El Campo Es Obligatorio)");
        $("#txt-parroquia").css('background-color', '#FFFFDF');
        $("#txt-parroquia-info").css('color', 'red');
        $("#id-div-parroquia-patrullado").addClass("has-error");
        valid = false;
    }
    if ($("#txt-parroquia").val()) {
        $("#txt-parroquia-info").html("");
        $("#txt-parroquia").css('background-color', '#eee');
        $("#txt-parroquia-info").css('color', '');
        $("#id-div-parroquia-patrullado").removeClass("has-error");
        valid = true;
    }
    if (!$("#txt-centrovotacion").val()) {
        $("#txt-centrovotacion-info").html("(El Campo Es Obligatorio)");
        $("#txt-centrovotacion").css('background-color', '#FFFFDF');
        $("#txt-centrovotacion-info").css('color', 'red');
        $("#id-div-centrovotacion-patrullado").addClass("has-error");
        valid = false;
    }
    if ($("#txt-centrovotacion").val()) {
        $("#txt-centrovotacion-info").html("");
        $("#txt-centrovotacion").css('background-color', '#eee');
        $("#txt-centrovotacion-info").css('color', '');
        $("#id-div-centrovotacion-patrullado").removeClass("has-error");
        valid = true;
    }

    if (!$("#int-telefono").val()) {
        $("#int-telefono-info").html("(El Campo Es Obligatorio)");
        $("#int-telefono").css('background-color', '#FFFFDF');
        $("#int-telefono-info").css('color', 'red');
        $("#id-div-tlf-patrullado").addClass("has-error");
        valid = false;
    }
    if ($("#int-telefono").val()) {
        $("#int-telefono-info").html("");
        $("#int-telefono").css('background-color', '#eee');
        $("#int-telefono-info").css('color', '');
        $("#id-div-tlf-patrullado").removeClass("has-error");
        valid = true;
    }
    if ($("#id-eje-patrullado").val() == 0) {
        $("#id-eje-patrullado-info").html("(El Campo Es Obligatorio)");
        $("#id-eje-patrullado").css('background-color', '#FFFFDF');
        $("#id-eje-patrullado-info").css('color', 'red');
        $("#id-div-eje-patrullado").addClass("has-error");
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
function  buscarPatrullero() {

    var caso = "patrullero";
    var parametros = {
        "op": caso,
        "ci": $("#int-ci-busqueda_patrullero").val()
    };
    $('#loading').show();
    $.ajax({
        url: 'buscar.php',
        data: parametros,
        dataType: 'json',
        success: function (data) {
            if (data.noExiste == 'no') {
                $("#ci-patrullero").val("");
                $("#int-ci-patrullero").val("");
                $("#int-ci-busqueda_patrullero").val("");
                $("#txt-nombre-patrullero").val("");
                $("#txt-telefono-patrullero").val("");

                $("#btnPatrullero").removeClass("btn-info");
                $("#btnPatrullero").addClass("btn-danger");
                $("#int-ci-busqueda_patrullero").addClass("validateclase");
                alert("El Jefe de Patrulla No Existe");
                $('#loading').hide();
            } else if (data.vacio == 'si') {
                $("#int-ci-busqueda_patrullero").addClass("validateclase");
                $('#loading').hide();
                $("#btnPatrullero").removeClass("btn-info");
                $("#btnPatrullero").addClass("btn-danger");
                alert("El Campo Cedula del Jefe de Patrulla no Puede estar Vacio");
            } else {
                $("#ci-patrullero").val(data.cedula);
                $("#int-ci-patrullero").val(data.cedula);
                $("#txt-nombre-patrullero").val(data.nombre);
                $("#txt-telefono-patrullero").val(data.telefono);
                $("#int-ci-busqueda_patrullero").removeClass("validateclase");
                $("#btnPatrullero").addClass("btn-info");
                $("#btnPatrullero").removeClass("btn-danger");
                $("#btnNuevoBusquedaPatrullero").css('display', '');
//                $("#btnNuevoBusquedaPatrullero").show();
                $("#btnPatrullero").hide();
                $('#int-ci-busqueda_patrullero').prop('readonly', true);
                $('#loading').hide();
            }
        },
        error: function () {
            alert("Error de Sistema");
        }
    });
}
function  buscarPatrulleroOperador() {

    var caso = "patrullero";
    var parametros = {
        "op": caso,
        "ci": $("#int-ci-busqueda_patrullero").val()
    };
    $('#loading').show();
    $.ajax({
        url: '../buscar.php',
        data: parametros,
        dataType: 'json',
        success: function (data) {
            if (data.noExiste == 'no') {
                $("#ci-patrullero").val("");
                $("#int-ci-patrullero").val("");
                $("#int-ci-busqueda_patrullero").val("");
                $("#txt-nombre-patrullero").val("");
                $("#txt-telefono-patrullero").val("");

                $("#btnPatrullero").removeClass("btn-info");
                $("#btnPatrullero").addClass("btn-danger");
                $("#int-ci-busqueda_patrullero").addClass("validateclase");
                alert("El Jefe de Patrulla No Existe");
                $('#loading').hide();
            } else if (data.vacio == 'si') {
                $("#int-ci-busqueda_patrullero").addClass("validateclase");
                $('#loading').hide();
                $("#btnPatrullero").removeClass("btn-info");
                $("#btnPatrullero").addClass("btn-danger");
                alert("El Campo Cedula del Jefe de Patrulla no Puede estar Vacio");
            } else {
                $("#ci-patrullero").val(data.cedula);
                $("#int-ci-patrullero").val(data.cedula);
                $("#txt-nombre-patrullero").val(data.nombre);
                $("#txt-telefono-patrullero").val(data.telefono);
                $("#int-ci-busqueda_patrullero").removeClass("validateclase");
                $("#btnPatrullero").addClass("btn-info");
                $("#btnPatrullero").removeClass("btn-danger");
                $("#btnNuevoBusquedaPatrullero").css('display', '');
//                $("#btnNuevoBusquedaPatrullero").show();
                $("#btnPatrullero").hide();
                $('#int-ci-busqueda_patrullero').prop('readonly', true);
                $('#loading').hide();
            }
        },
        error: function () {
            alert("Error de Sistema");
        }
    });
}







function  buscarPatrullado() {
    var caso = "patrullado";
    var parametros = {
        "op": caso,
        "ci": $("#int-ci-busqueda_patrullado").val()
    };
    $('#loading').show();
    $.ajax({
        url: 'buscar.php',
        data: parametros,
        dataType: 'json',
        success: function (data) {
            if (data.vacio == 'si') {


                $("#int-ci-busqueda_patrullado").val("");
                $("#ci-patrullado").val("");
                $("#txt-nacionalidad-patrullado").val("");

                $("#txt-nombre-patrullado").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");


                $("#int-ci-busqueda_patrullado").addClass("validateclase");
                $("#btnPatrullado").addClass("btn-danger");
                $("#btnPatrullado").removeClass("btn-success");
                $('#loading').hide();
                alert("El Campo Buscar Patrullado No Puede estar Vacio");

            } else if (data.existePatrullero == 'si') {
                $("#int-ci-busqueda_patrullado").val("");
                $("#ci-patrullado").val("");
                $("#txt-nacionalidad-patrullado").val("");

                $("#txt-nombre-patrullado").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");

                $("#int-ci-busqueda_patrullado").addClass("validateclase");
                $("#btnPatrullado").addClass("btn-danger");
                $("#btnPatrullado").removeClass("btn-success");

                $('#loading').hide();
                alert("La Cedula ya Esta Registrada Como Jefe de Patrulla");
            } else if (data.existePatrullado == 'si') {
                $("#int-ci-busqueda_patrullado").val("");
                $("#ci-patrullado").val("");
                $("#txt-nacionalidad-patrullado").val("");

                $("#txt-nombre-patrullado").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");

                $("#int-ci-busqueda_patrullado").addClass("validateclase");
                $("#btnPatrullado").addClass("btn-danger");
                $("#btnPatrullado").removeClass("btn-success");

                $('#loading').hide();
                alert("La Cedula ya esta Patrullada");
            } else if (data.existePersona == 'no') {
                $("#int-ci-busqueda_patrullado").val("");
                $("#ci-patrullado").val("");
                $("#txt-nacionalidad-patrullado").val("");

                $("#txt-nombre-patrullado").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");

                $("#busqueda_patrullado").addClass("validateclase");
                $("#btnPatrullado").addClass("btn-danger");
                $("#btnPatrullado").removeClass("btn-success");

                $('#loading').hide();
                alert("El Numero de Cedula No Vota en Este Estado");
            } else {

                $("#int-ci-patrullado").val(data.cedula);
                $("#ci-patrullado").val(data.cedula);
                $("#txt-nacionalidad-patrullado").val("");

                $("#txt-nombre-patrullado").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");





                $("#txt-nombre-patrullado").val(data.nombres_apellidos);
                $("#txt-municipio").val(data.municipio);
                $("#txt-parroquia").val(data.parroquia);
                $("#txt-centrovotacion").val(data.nombre);
                $("#busqueda_patrullado").css('background-color', '');
                $("#busqueda_patrullado").css('border-color', '');



                $("#busqueda_patrullado").removeClass("validateclase");
                $("#btnNuevaBusquedaPatrullado").css('display', '');
                $("#btnPatrullado").hide();
                $('#int-ci-busqueda_patrullado').prop('readonly', true);
//                $("#btnPatrullado").css('display', 'none');
                $("#btnPatrullado").addClass("btn-success");
                $("#btnPatrullado").removeClass("btn-danger");
                $('#loading').hide();
            }
        },
        error: function (ajaxContext) {
            alert("Error de sistema");
        }
    });
}

function  buscarPatrulladoOperador() {
    var caso = "patrullado";
    var parametros = {
        "op": caso,
        "ci": $("#int-ci-busqueda_patrullado").val()
    };
    $('#loading').show();
    $.ajax({
        url: '../buscar.php',
        data: parametros,
        dataType: 'json',
        success: function (data) {
            if (data.vacio == 'si') {


                $("#int-ci-busqueda_patrullado").val("");
                $("#ci-patrullado").val("");
                $("#txt-nacionalidad-patrullado").val("");

                $("#txt-nombre-patrullado").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");


                $("#int-ci-busqueda_patrullado").addClass("validateclase");
                $("#btnPatrullado").addClass("btn-danger");
                $("#btnPatrullado").removeClass("btn-success");
                $('#loading').hide();
                alert("El Campo Buscar Patrullado No Puede estar Vacio");

            } else if (data.existePatrullero == 'si') {
                $("#int-ci-busqueda_patrullado").val("");
                $("#ci-patrullado").val("");
                $("#txt-nacionalidad-patrullado").val("");

                $("#txt-nombre-patrullado").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");

                $("#int-ci-busqueda_patrullado").addClass("validateclase");
                $("#btnPatrullado").addClass("btn-danger");
                $("#btnPatrullado").removeClass("btn-success");

                $('#loading').hide();
                alert("La Cedula ya Esta Registrada Como Jefe de Patrulla");
            } else if (data.existePatrullado == 'si') {
                $("#int-ci-busqueda_patrullado").val("");
                $("#ci-patrullado").val("");
                $("#txt-nacionalidad-patrullado").val("");

                $("#txt-nombre-patrullado").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");

                $("#int-ci-busqueda_patrullado").addClass("validateclase");
                $("#btnPatrullado").addClass("btn-danger");
                $("#btnPatrullado").removeClass("btn-success");

                $('#loading').hide();
                alert("La Cedula ya esta Patrullada");
            } else if (data.existePersona == 'no') {
                $("#int-ci-busqueda_patrullado").val("");
                $("#ci-patrullado").val("");
                $("#txt-nacionalidad-patrullado").val("");

                $("#txt-nombre-patrullado").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");

                $("#busqueda_patrullado").addClass("validateclase");
                $("#btnPatrullado").addClass("btn-danger");
                $("#btnPatrullado").removeClass("btn-success");

                $('#loading').hide();
                alert("El Numero de Cedula No Vota en Este Estado");
            } else {

                $("#int-ci-patrullado").val(data.cedula);
                $("#ci-patrullado").val(data.cedula);
                $("#txt-nacionalidad-patrullado").val("");

                $("#txt-nombre-patrullado").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");





                $("#txt-nombre-patrullado").val(data.nombres_apellidos);
                $("#txt-municipio").val(data.municipio);
                $("#txt-parroquia").val(data.parroquia);
                $("#txt-centrovotacion").val(data.nombre);
                $("#busqueda_patrullado").css('background-color', '');
                $("#busqueda_patrullado").css('border-color', '');



                $("#busqueda_patrullado").removeClass("validateclase");
                $("#btnNuevaBusquedaPatrullado").css('display', '');
                $("#btnPatrullado").hide();
                $('#int-ci-busqueda_patrullado').prop('readonly', true);
//                $("#btnPatrullado").css('display', 'none');
                $("#btnPatrullado").addClass("btn-success");
                $("#btnPatrullado").removeClass("btn-danger");
                $('#loading').hide();
            }
        },
        error: function (ajaxContext) {
            alert("Error de sistema");
        }
    });
}



function nuevaBusquedaPatrullado() {
    $("#int-ci-busqueda_patrullado").val("");
    $("#int-ci-patrullado").val("");
    $("#ci-patrullado").val("");
    $("#txt-nacionalidad-patrullado").val("");

    $("#txt-nombre-patrullado").val("");
    $("#txt-municipio").val("");
    $("#txt-parroquia").val("");
    $("#txt-centrovotacion").val("");



    $("#btnNuevaBusquedaPatrullado").hide();
    $("#btnPatrullado").show();
    $('#int-ci-busqueda_patrullado').prop('readonly', false);
}
function nuevaBusquedaPatrullero() {
    $("#ci-patrullero").val("");
    $("#int-ci-patrullero").val("");
    $("#int-ci-busqueda_patrullero").val("");
    $("#txt-nombre-patrullero").val("");
    $("#txt-telefono-patrullero").val("");




    $("#btnNuevoBusquedaPatrullero").hide();
    $("#btnPatrullero").show();
    $('#int-ci-busqueda_patrullero').prop('readonly', false);
}
function nuevaBusquedavswPatrullero() {

    $("#ci-patrullero").val("");
    $("#int-ci").val("");
    $("#txt-nom-ape").val("");
    $("#txt-municipio").val("");
    $("#txt-parroquia").val("");
    $("#txt-centrovotacion").val("");
    $("#int-telefono").val("");
    $("#id-eje-patrullellero").val("");

    $("#int-ci-busqueda_patrullero").val("");
    $('#int-ci-busqueda_patrullero').prop('readonly', false);
    $("#btnNuevaBusquedaPatrullero").hide();
    $("#btnPatrullero").show();

}
function  buscarvswPatrullero() {
    var caso = "patrullerovsw";
    var parametros = {
        "op": caso,
        "ci": $("#int-ci-busqueda_patrullero").val()
    };
    $('#loading').show();
    $.ajax({
        url: 'buscar.php',
        data: parametros,
        dataType: 'json',
        success: function (data) {
            if (data.existePatrullero == 'si') {
                $("#ci-patrullero").val("");
                $("#int-ci").val("");
                $("#txt-nom-ape").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");
                $("#int-telefono").val("");
                $("#id-eje-patrullellero").val("");
                $("#btnPatrullero").removeClass("btn-info");
                $("#btnPatrullero").addClass("btn-danger");
                $("#int-ci-busqueda_patrullero").addClass("validateclase");
                alert("El Patrullero ya Esta Registrado");
                $('#loading').hide();
            } else if (data.existePersona == 'no') {
                $("#ci-patrullero").val("");
                $("#int-ci").val("");
                $("#txt-nom-ape").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");
                $("#int-telefono").val("");
                $("#id-eje-patrullellero").val("");
                $("#btnPatrullero").removeClass("btn-info");
                $("#btnPatrullero").addClass("btn-danger");
                $("#int-ci-busqueda_patrullero").addClass("validateclase");
                alert("El Numero de Cedula No Vota en Este Estado");
                $('#loading').hide();
            } else
            {
                $("#ci-patrullero").val(data.cedula);
                $("#nacionalidad").val(data.nacinalidad);
                $("#int-ci").val(data.cedula);
                $("#txt-nom-ape").val(data.nombres_apellidos);
                $("#txt-municipio").val(data.municipio);
                $("#txt-parroquia").val(data.parroquia);
                $("#txt-centrovotacion").val(data.nombre);
                $("#btnPatrullero").removeClass("btn-danger");
                $("#btnPatrullero").addClass("btn-info");
                $("#int-ci-busqueda_patrullero").removeClass("validateclase");
                $('#int-ci-busqueda_patrullero').prop('readonly', true);
                $("#btnNuevaBusquedaPatrullero").show();
                $("#btnPatrullero").hide();
                $('#loading').hide();
            }
        },
        error: function () {
            alert("Error de Sistema");
        }
    });
}
function  buscarvswPatrulleroOperador() {
    var caso = "patrullerovsw";
    var parametros = {
        "op": caso,
        "ci": $("#int-ci-busqueda_patrullero").val()
    };
    $('#loading').show();
    $.ajax({
        url: '../buscar.php',
        data: parametros,
        dataType: 'json',
        success: function (data) {
            if (data.existePatrullero == 'si') {
                $("#ci-patrullero").val("");
                $("#int-ci").val("");
                $("#txt-nom-ape").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");
                $("#int-telefono").val("");
                $("#id-eje-patrullellero").val("");
                $("#btnPatrullero").removeClass("btn-info");
                $("#btnPatrullero").addClass("btn-danger");
                $("#int-ci-busqueda_patrullero").addClass("validateclase");
                alert("El Patrullero ya Esta Registrado");
                $('#loading').hide();
            } else if (data.existePersona == 'no') {
                $("#ci-patrullero").val("");
                $("#int-ci").val("");
                $("#txt-nom-ape").val("");
                $("#txt-municipio").val("");
                $("#txt-parroquia").val("");
                $("#txt-centrovotacion").val("");
                $("#int-telefono").val("");
                $("#id-eje-patrullellero").val("");
                $("#btnPatrullero").removeClass("btn-info");
                $("#btnPatrullero").addClass("btn-danger");
                $("#int-ci-busqueda_patrullero").addClass("validateclase");
                alert("El Numero de Cedula No Vota en Este Estado");
                $('#loading').hide();
            } else
            {
                $("#ci-patrullero").val(data.cedula);
                $("#nacionalidad").val(data.nacinalidad);
                $("#int-ci").val(data.cedula);
                $("#txt-nom-ape").val(data.nombres_apellidos);
                $("#txt-municipio").val(data.municipio);
                $("#txt-parroquia").val(data.parroquia);
                $("#txt-centrovotacion").val(data.nombre);
                $("#btnPatrullero").removeClass("btn-danger");
                $("#btnPatrullero").addClass("btn-info");
                $("#int-ci-busqueda_patrullero").removeClass("validateclase");
                $('#int-ci-busqueda_patrullero').prop('readonly', true);
                $("#btnNuevaBusquedaPatrullero").show();
                $("#btnPatrullero").hide();
                $('#loading').hide();
            }
        },
        error: function () {
            alert("Error de Sistema");
        }
    });
}