/* global baseurl, ciCsrfToken, moment */

$(function () {

    obtener_bancos();

    $('#btn_buscar').click(function () {
        obtener_bancos();
    });
    $('#btn_nuevo').click(function () {
        nuevo();
    });
    $('#btn_guardar').click(function () {
        guardar();
    });
    $('#btn_eliminar').click(function () {
        eliminar();
    });
});

function obtener_bancos() {
    $('#tbl_bancos').html(
            '<thead>'
            + '<tr>'
            + ' <th class="text-center">#</th>'
            + ' <th class="text-center">Nombre Banco</th>'
            + ' <th class="text-center">Núm. Cuenta</th>'
            + ' <th class="text-center">Editar</th>'
            + '</tr>'
            + '</thead>'
            + '<tbody>'
            );
    var texto = $('#texto').val();

    $.post('./controladores/Banco.php?action=obtener_bancos', {
        texto: texto
    })
            .done(function (data) {
                try {
                    var dato = JSON.parse(data);
                    if (dato.length > 0) {
                        $.each(dato, function (index, item) {
                            var parametros = "'" + item.id_banco + "','" + item.nom_banco + "','" + item.num_cuenta + "'";
                            $('#tbl_bancos').append(
                                    '<tr>' +
                                    '<td class="text-center">' + (index + 1) + '</td>' +
                                    '<td class="text-center">' + item.nom_banco + '</td>' +
                                    '<td class="text-center">' + item.num_cuenta + '</td>' +
                                    '<td class="text-center">' +
                                    '   <div class="btn-group">' +
                                    '       <button class="btn btn-warning" title="Editar" style="padding: 0px 12px 0px 12px;" ' +
                                    '           onclick="modal_banco(' + parametros + ')" >' +
                                    '           <i class="fa-solid fa-edit" style="font-size: 1em;color:white;"></i>' +
                                    '       </button>' +
                                    '       <button class="btn btn-danger" title="Eliminar" style="padding: 0px 12px 0px 12px;" ' +
                                    '           onclick="modal_eliminar(' + item.id_banco + ')" >' +
                                    '           <i class="fa-solid fa-trash" style="font-size: 1em;color:white;"></i>' +
                                    '       </button>' +
                                    '   </div>' +
                                    '</td>' +
                                    '</tr>'
                                    );
                        });
                    } else {
                        $('#tbl_bancos').append('<tr><td colspan="4" class="text-center">Sin resultados ...</td></tr>');
                    }
                } catch (e) {
                    console.log("Error de TRY-CATCH -- Error: " + e);
                }
            })
            .fail(function (xhr, status, error) {
                console.log("Error de .FAIL -- Error: " + error);
            });
}


//***************************************************************************************************************************************************************
//***************************************************************************************************************************************************************
// MODAL    *****************************************************************************************************************************************************
//***************************************************************************************************************************************************************
//***************************************************************************************************************************************************************
var cod_banco = 0;
function nuevo() {
    cod_banco = 0;
    $('#nombre').val('');
    $('#num_cuenta').val('');

    $("#modal_banco").modal('show');
}
function guardar() {
    $('#btn_guardar').hide();

    var nombre = $('#nombre').val();
    var num_cuenta = $('#num_cuenta').val();

    if (!((nombre.length) > 0)) {
        $('#btn_guardar').show();
        return false;
    }
    if (!((num_cuenta.length) > 0)) {
        $('#btn_guardar').show();
        return false;
    }

    var parametros = {
        "cod_banco": cod_banco,
        "nombre": nombre,
        "num_cuenta": num_cuenta
    };
    $.ajax({
        data: parametros,
        url: './controladores/Banco.php?action=guardar',
        type: 'POST',
        success: function (result) {
            var resultado = $.trim(result);
            if (parseInt(resultado) > 0) {
                $("#modal_banco").modal('hide');
                alert('OK');
                obtener_bancos();
            } else {
                alert(resultado);
            }
            $('#btn_guardar').show();
        },
        error: function (result) {
            alert('Error');
            $('#btn_guardar').show();
        }
    });
}
function modal_banco(codigo, nom_banco, num_cuenta) {
    cod_banco = codigo;
    $('#nombre').val(nom_banco);
    $('#num_cuenta').val(num_cuenta);

    $("#modal_banco").modal('show');
}
function modal_eliminar(codigo) {
    cod_banco = codigo;

    $("#modal_eliminar").modal('show');
}
function eliminar() {
    $('#btn_eliminar').hide();

    var parametros = {
        "cod_banco": cod_banco
    };
    $.ajax({
        data: parametros,
        url: './controladores/Banco.php?action=eliminar',
        type: 'POST',
        success: function (result) {
            var resultado = $.trim(result);
            if (parseInt(resultado) > 0) {
                $("#modal_eliminar").modal('hide');
                alert('OK');
                obtener_bancos();
            } else {
                alert(resultado);
            }
            $('#btn_eliminar').show();
        },
        error: function (result) {
            alert('Error');
            $('#btn_eliminar').show();
        }
    });
}