<?php

class Mreporte {

    private $db;
    private $recargas;

    public function __construct() {
        $this->db = Conexion::poo();
        $this->recargas = array();
    }

    public function obtener_recargas($param) {

        date_default_timezone_set("America/Lima");
        $query = "
        SELECT
            t.id_transaccion,
            c.id_player,
            c.nombre,
            c.apellido,
            t.id_canal,
            ( CASE t.id_canal WHEN 1 THEN 'Whatsapp' WHEN 2 THEN 'Telegram' ELSE 'Messenger' END ) canal,
            t.id_banco,
            b.nom_banco,
            t.monto,
            t.comprobante,
            t.fecha,
            t.estado,
            t.fecha_hora_registro
        FROM
            tbl_transaccion t
            JOIN tbl_banco b ON b.id_banco = t.id_banco
            JOIN tbl_cliente c ON c.id_cliente = t.id_cliente
        WHERE t.estado = 1 
        ";
        if (strlen($param['fecha_inicio']) > 0 && strlen($param['fecha_fin']) > 0) {
            $query .= " AND DATE(t.fecha_hora_registro) BETWEEN '" . $param['fecha_inicio'] . "' AND '" . $param['fecha_fin'] . "' ";
        } else {
            $query .= " AND DATE(t.fecha_hora_registro) = '" . date('Y-m-d') . "' ";
        }
        if (strlen($param['id_player']) > 0) {
            $query .= " AND c.id_player = '" . $param['id_player'] . "' ";
        }
        $res_query = $this->db->query($query);
        while ($rows = $res_query->fetch_assoc()) {
            $this->recargas[] = $rows;
        }
        return $this->recargas;
    }

}
