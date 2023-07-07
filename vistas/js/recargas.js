/* global baseurl, ciCsrfToken, moment */

$(function () {
    $('.div_resultado').hide();

    obtener_bancos();

    $('#btn_consultar').click(function () {
        obtener_detalle();
    });
    $('#btn_recargar').click(function () {
        guardar_recarga();
    });
    $('#btn_editar').click(function () {
        editar_recarga();
    });
    $('#btn_eliminar').click(function () {
        eliminar();
    });
});

function obtener_bancos() {
    $.post('./controladores/Banco.php?action=obtener_bancos', {
        texto: ''
    })
            .done(function (data) {
                try {
                    var dato = JSON.parse(data);
                    if (dato.length > 0) {
                        $.each(dato, function (index, item) {
                            $('#banco').append('<option value="' + item.id_banco + '">' + item.nom_banco + ' - ' + item.num_cuenta + '</option>');
                            $('#mc_banco').append('<option value="' + item.id_banco + '">' + item.nom_banco + ' - ' + item.num_cuenta + '</option>');
                        });
                    }
                } catch (e) {
                    console.log(e);
                }
            })
            .fail(function (xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            });
}


var cod_cliente = 0;

function obtener_detalle() {
    cod_cliente = 0;
    $('.div_sin_resultado').show();
    $('.div_resultado').hide();
    $('#nombre').val('');
    $('#canal').val('0');
    $('#banco').val('0');
    $('#comprobante').val('');
    $('#monto').val('');
    $('#tbl_recargas').html(
            '<thead>'
            + '<tr>'
            + ' <th class="text-center">#</th>'
            + ' <th class="text-center">Registro</th>'
            + ' <th class="text-center">Canal</th>'
            + ' <th class="text-center">Banco</th>'
            + ' <th class="text-center">Monto</th>'
            + ' <th class="text-center">Fecha</th>'
            + ' <th class="text-center">Editar</th>'
            + '</tr>'
            + '</thead>'
            + '<tbody>'
            );
    var id_player = $('#id_player').val();

    $.post('./controladores/Recarga.php?action=obtener_detalle', {
        id_player: id_player
    })
            .done(function (data) {
                try {
                    //console.log(data);return false;
                    var dato = JSON.parse(data);
                    //console.log(dato);return false;
                    if(parseInt(dato.http_code) === 200){
                        var saldo_del_cliente = 0;
                        $('.div_resultado').removeAttr('hidden');
                        $('.div_sin_resultado').hide();
                        $('.div_resultado').show();
                        cod_cliente = dato.cliente.codigo;
                        $('#nombre').val(dato.cliente.nombre + ' ' + dato.cliente.apellido);
                        if (dato.trans.length > 0) {
                            $.each(dato.trans, function (index, item) {
                                var parametros = "'" + item.id_transaccion + "','" + item.id_canal + "','" +
                                        item.id_banco + "','" + item.monto + "','" + item.fecha + "','" + item.comprobante + "'";
                                $('#tbl_recargas').append(
                                        '<tr>' +
                                        '<td class="text-center">' + (index + 1) + '</td>' +
                                        '<td class="text-center">' + item.fecha_hora_registro + '</td>' +
                                        '<td class="text-center">' + item.canal + '</td>' +
                                        '<td class="text-center">' + item.nom_banco + '</td>' +
                                        '<td class="text-center">' + item.monto + '</td>' +
                                        '<td class="text-center">' + item.fecha + '</td>' +
                                        '<td class="text-center">' +
                                        '   <div class="btn-group">' +
                                        '       <button class="btn btn-warning" title="Editar" style="padding: 0px 12px 0px 12px;" ' +
                                        '           onclick="modal_recarga(' + parametros + ')" >' +
                                        '           <i class="fa-solid fa-edit" style="font-size: 1em;color:white;"></i>' +
                                        '       </button>' +
                                        '       <button class="btn btn-danger" title="Eliminar" style="padding: 0px 12px 0px 12px;" ' +
                                        '           onclick="modal_eliminar(' + item.id_transaccion + ')" >' +
                                        '           <i class="fa-solid fa-trash" style="font-size: 1em;color:white;"></i>' +
                                        '       </button>' +
                                        '   </div>' +
                                        '</td>' +
                                        '</tr>'
                                        );

                                saldo_del_cliente = parseFloat(saldo_del_cliente) + parseFloat(item.monto);
                                saldo_del_cliente = parseFloat(saldo_del_cliente).toFixed(2)
                                $('#msaldo').val(saldo_del_cliente);
                            });
                        } else {
                            $('#tbl_recargas').append('<tr><td colspan="6" class="text-center">Sin recargas ...</td></tr>');
                        }
                    } else {
                        alert('No existe el cliente');
                    }
                } catch (e) {
                    console.log("Error de TRY-CATCH -- Error: " + e);
                }
            })
            .fail(function (xhr, status, error) {
                console.log("Error de .FAIL -- Error: " + error);
            });
}

function guardar_recarga() {
    $('#btn_recargar').hide();

    var canal = $('#canal').val();
    var banco = $('#banco').val();
    var monto = $('#monto').val();
    var comprobante = $('#comprobante').val();
    var comprobante_file = $("#comprobante")[0].files[0];
    var comprobante_extension = comprobante.substring(comprobante.lastIndexOf("."));
    var fecha = $('#fecha').val();


    if (!(parseInt(banco) > 0)) {
        $('#btn_recargar').show();
        alert('Debe seleccionar un banco.');
        return false;
    }
    if (comprobante_extension !== ".png" && comprobante_extension !== ".PNG" &&
            comprobante_extension !== ".jpg" && comprobante_extension !== ".JPG" &&
            comprobante_extension !== ".jpeg" && comprobante_extension !== ".JPEG") {
        $('#btn_recargar').show();
        alert('Debe seleccionar una imágen.');
        return false;
    }
    if (!(parseFloat(monto) > 0)) {
        $('#btn_recargar').show();
        alert('Debe ingresar un monto mayor a 0.');
        return false;
    }

    var fmdata = new FormData();
    fmdata.append('cod_cliente', cod_cliente);
    fmdata.append('canal', canal);
    fmdata.append('banco', banco);
    fmdata.append('monto', monto);
    fmdata.append('fecha', fecha);
    fmdata.append('file', comprobante_file);
    fmdata.append('file_ext', comprobante_extension);

    $.ajax({
        type: 'POST',
        url: './controladores/Recarga.php?action=guardar',
        data: fmdata,
        processData: false,
        cache: false,
        contentType: false,
        success: function (result) {
            var resultado = $.trim(result);
            if (parseInt(resultado) > 0) {
                $('#canal').val('1');
                $('#banco').val('0');
                $('#comprobante').val('');
                $('#monto').val('');
                alert('OK');
                obtener_detalle();
            } else {
                alert(resultado);
            }
            $('#btn_recargar').show();
        },
        error: function (result) {
            alert('Error');
            $('#btn_recargar').show();
        }
    });
    $('#btn_recargar').show();
}
var cod_recarga = 0;
function modal_recarga(codigo, id_canal, id_banco, monto, fecha, imagen) {
    cod_recarga = codigo;
    $('#mc_comprobante').removeAttr("src");
    $('#mc_comprobante').attr("src", "./" + imagen);
    $('#mc_canal').val(id_canal);
    $('#mc_banco').val(id_banco);
    $('#mc_monto').val(monto);
    $('#mc_fecha').val(fecha);

    $('#modal_recarga').modal('show');
}
function editar_recarga() {
    $('#btn_editar').hide();

    var canal = $('#mc_canal').val();
    var banco = $('#mc_banco').val();
    var monto = $('#mc_monto').val();
    var fecha = $('#mc_fecha').val();

    if (!(parseInt(banco) > 0)) {
        $('#btn_editar').show();
        alert('Debe seleccionar un banco.');
        return false;
    }
    if (!(parseFloat(monto) > 0)) {
        $('#btn_editar').show();
        alert('Debe ingresar un monto mayor a 0.');
        return false;
    }
    var parametros = {
        "cod_recarga": cod_recarga,
        "canal": canal,
        "banco": banco,
        "monto": monto,
        "fecha": fecha
    };
    $.ajax({
        data: parametros,
        url: './controladores/Recarga.php?action=editar',
        type: 'POST',
        success: function (result) {
            var resultado = $.trim(result);
            if (parseInt(resultado) > 0) {
                $("#modal_recarga").modal('hide');
                alert('OK');
                obtener_detalle();
            } else {
                alert(resultado);
            }
            $('#btn_editar').show();
        },
        error: function (result) {
            alert('Error');
            $('#btn_editar').show();
        }
    });
}
function modal_eliminar(codigo) {
    cod_recarga = codigo;
    $("#modal_eliminar").modal('show');
}
function eliminar() {
    $('#btn_eliminar').hide();

    var parametros = {
        "cod_recarga": cod_recarga
    };
    $.ajax({
        data: parametros,
        url: './controladores/Recarga.php?action=eliminar',
        type: 'POST',
        success: function (result) {
            var resultado = $.trim(result);
            if (parseInt(resultado) > 0) {
                $("#modal_eliminar").modal('hide');
                alert('OK');
                obtener_detalle();
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