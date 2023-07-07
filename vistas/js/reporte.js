/* global baseurl, ciCsrfToken, moment */

$(function () {

    //console.log(fecha_hoy);
    $('#fecha_inicio').val(fecha_hoy);
    $('#fecha_fin').val(fecha_hoy);
    obtener_recargas();

    $('#btn_buscar').click(function () {
        obtener_recargas();
    });

});

function obtener_recargas() {
    $('#tbl_recargas').html(
            '<thead>'
            + '<tr>'
            + ' <th>#</th>'
            + ' <th class="text-center">Registro</th>'
            + ' <th class="text-center">Player-ID</th>'
            + ' <th>Cliente</th>'
            + ' <th class="text-center">Canal</th>'
            + ' <th class="text-center">Banco</th>'
            + ' <th class="text-center">Monto</th>'
            + ' <th class="text-center">Fecha</th>'
            + '</tr>'
            + '</thead>'
            + '<tbody>'
            );
    var fecha_inicio = $('#fecha_inicio').val();
    var fecha_fin = $('#fecha_fin').val();
    var id_player = $('#id_player').val();

    $.post('./controladores/Reporte.php?action=obtener_recargas', {
        fecha_inicio: fecha_inicio,
        fecha_fin: fecha_fin,
        id_player: id_player
    })
            .done(function (data) {
                try {
                    var dato = JSON.parse(data);
                    if (dato.length > 0) {
                        $.each(dato, function (index, item) {
                            $('#tbl_recargas').append(
                                    '<tr>' +
                                    '<td class="text-center">' + (index + 1) + '</td>' +
                                    '<td class="text-center">' + item.fecha_hora_registro + '</td>' +
                                    '<td class="text-center">' + item.id_player + '</td>' +
                                    '<td class="text-center">' + item.nombre + ' ' + item.apellido + '</td>' +
                                    '<td class="text-center">' + item.canal + '</td>' +
                                    '<td class="text-center">' + item.nom_banco + '</td>' +
                                    '<td class="text-center">' + item.monto + '</td>' +
                                    '<td class="text-center">' + item.fecha + '</td>' +
                                    '</tr>'
                                    );
                        });
                    } else {
                        $('#tbl_clientes').append('<tr><td colspan="8" class="text-center">Sin resultados ...</td></tr>');
                    }
                } catch (e) {
                    console.log("Error de TRY-CATCH -- Error: " + e);
                }
            })
            .fail(function (xhr, status, error) {
                console.log("Error de .FAIL -- Error: " + error);
            });
}
