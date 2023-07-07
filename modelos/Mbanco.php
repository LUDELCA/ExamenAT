<?php

class Mbanco {

    private $db;
    private $bancos;

    public function __construct() {
        $this->db = Conexion::poo();
        $this->bancos = array();
    }

    public function obtener_bancos($texto) {
        $query = "
        SELECT
            id_banco,
            nom_banco,
            num_cuenta,
            estado
        FROM
                tbl_banco
        WHERE estado = 1 
        ";
        if (strlen($texto) > 0) {
            $query .= "
        AND ( 
            nom_banco = '" . $texto . "' 
            OR num_cuenta = '" . $texto . "' 
            )
        ";
        }
        $res_query = $this->db->query($query);
        while ($rows = $res_query->fetch_assoc()) {
            $this->bancos[] = $rows;
        }
        return $this->bancos;
    }

    public function guardar_banco($param) {
        if ((int) $param['cod_banco'] === 0) {
            $sql_query = "
         SELECT
             id_banco
         FROM
                tbl_banco
         WHERE estado = 1 
         AND (
             nom_banco = '" . $param['nombre'] . "' 
             OR num_cuenta = '" . $param['num_cuenta'] . "' 
             )
 ";
            $res_query = $this->db->query($sql_query);
            if ($res_query->num_rows === 0) {
                $sql_guardar = "
                    INSERT INTO tbl_banco (
                    nom_banco,
                    num_cuenta,
                    estado,
                    fecha_hora_registro
                    ) VALUES (
                    '" . $param['nombre'] . "',
                    '" . $param['num_cuenta'] . "',
                    1,
                    now()
                    );
                ";
                $this->db->query($sql_guardar);
                return 1;
            } else if ($res_query->num_rows > 0) {
                return 'Los datos ya han sido registrados.';
            } else {
                return 'Ocurrio un error al guardar.';
            }
        } elseif (is_numeric($param['cod_banco']) == true && $param['cod_banco'] > 0) {
            $sql_query = "
            SELECT
                id_banco
            FROM
                tbl_banco
            WHERE 
                id_banco != '" . $param['cod_banco'] . "' 
                AND estado = 1 
                AND (
                    nom_banco = '" . $param['nombre'] . "' 
                    OR num_cuenta = '" . $param['num_cuenta'] . "' 
                    )
             ";
            $res_query = $this->db->query($sql_query);
            if ($res_query->num_rows === 0) {
                $sql_editar = "
UPDATE tbl_banco 
SET 
    nom_banco='" . $param['nombre'] . "',
    num_cuenta='" . $param['num_cuenta'] . "'
WHERE
    id_banco='" . $param['cod_banco'] . "'
";
                $this->db->query($sql_editar);
                return 1;
            } else if ($res_query->num_rows > 0) {
                return 'Los datos ya han sido registrados.';
            } else {
                return 'Ocurrio un error al editar.';
            }
        } else {
            return 'Ocurrio un error al recibir los parámetros.';
        }
    }

    public function eliminar_banco($cod_banco) {
        $sql_eliminar = "
UPDATE tbl_banco 
SET estado=0 
WHERE id_banco='" . $cod_banco . "' 
";
        $this->db->query($sql_eliminar);
        return 1;
    }

}
