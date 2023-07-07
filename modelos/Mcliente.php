<?php

class Mcliente {

    private $db;
    private $clientes;

    public function __construct() {
        $this->db = Conexion::poo();
        $this->clientes = array();
    }

    public function obtener_clientes($texto) {
        $query = "
        SELECT
            id_cliente,
            id_player,
            tipo_documento,
            ( CASE tipo_documento WHEN 1 THEN 'DNI' ELSE 'CARNET DE EXTRANJERIA' END ) tipo_documento,
            num_documento,
            nombre,
            apellido,
            celular,
            correo_electronico,
            estado 
        FROM
                tbl_cliente
        WHERE estado = 1 
        ";
        if (strlen($texto) > 0) {
            $query .= "
        AND ( 
            id_player = '" . $texto . "' 
            OR num_documento = '" . $texto . "' 
            OR celular = '" . $texto . "' 
            OR correo_electronico = '" . $texto . "' 
            OR CONCAT(nombre, ' ', apellido, ' ', nombre) LIKE '%" . $texto . "%' 
            )
        ";
        }
        $res_query = $this->db->query($query);
        while ($rows = $res_query->fetch_assoc()) {
            $this->clientes[] = $rows;
        }
        return $this->clientes;
    }

    public function guardar_cliente($param) {
        if ((int) $param['cod_cliente'] === 0) {
            $sql_query = "
        SELECT
            id_cliente
        FROM
                tbl_cliente
        WHERE estado = 1 
        AND (
            id_player = '" . $param['id_player'] . "' 
            OR num_documento = '" . $param['num_doc'] . "' 
            OR celular = '" . $param['celular'] . "' 
            OR correo_electronico = '" . $param['correo_electronico'] . "' 
            )
";
            $res_query = $this->db->query($sql_query);
            if ($res_query->num_rows === 0) {
                $sql_guardar = "
INSERT INTO tbl_cliente (
id_player,
tipo_documento,
num_documento,
nombre,
apellido,
celular,
correo_electronico,
dinero_actual,
estado,
fecha_hora_registro
) VALUES (
'" . $param['id_player'] . "',
'" . $param['tipo_doc'] . "',
'" . $param['num_doc'] . "',
'" . $param['nombre'] . "',
'" . $param['apellido'] . "',
'" . $param['celular'] . "',
'" . $param['correo_electronico'] . "',
0,
1,
now()
);
";
                $this->db->query($sql_guardar);
                return 1;
            } else if ($res_query->num_rows > 0) {
                return 'Los datos ya han sido registrados.' . $sql_query;
            } else {
                return 'Ocurrio un error al guardar.';
            }
        } elseif (is_numeric($param['cod_cliente']) == true && $param['cod_cliente'] > 0) {
            $sql_query = "
            SELECT
                id_cliente
            FROM
                tbl_cliente
            WHERE 
                id_cliente != '" . $param['cod_cliente'] . "' 
                AND estado = 1 
                AND (
                    id_player = '" . $param['id_player'] . "' 
                    OR num_documento = '" . $param['num_doc'] . "' 
                    OR celular = '" . $param['celular'] . "' 
                    OR correo_electronico = '" . $param['correo_electronico'] . "' 
                    )
             ";
            $res_query = $this->db->query($sql_query);
            if ($res_query->num_rows === 0) {
                $sql_editar = "
UPDATE tbl_cliente 
SET 
    id_player='" . $param['id_player'] . "',
    tipo_documento='" . $param['tipo_doc'] . "',
    num_documento='" . $param['num_doc'] . "',
    nombre='" . $param['nombre'] . "',
    apellido='" . $param['apellido'] . "',
    celular='" . $param['celular'] . "',
    correo_electronico='" . $param['correo_electronico'] . "'
WHERE
    id_cliente='" . $param['cod_cliente'] . "'
";
                $this->db->query($sql_editar);
                return 1;
            } else if ($res_query->num_rows > 0) {
                return 'La informacion proporcionada ya esta siendo usada por otro cliente.' /* . $sql_query */;
            } else {
                return 'Ocurrio un error al editar.';
            }
        } else {
            return 'Ocurrio un error al recibir los parámetros.';
        }
    }

    public function eliminar_cliente($cod_cliente) {
        $sql_eliminar = "
UPDATE tbl_cliente 
SET estado=0 
WHERE id_cliente='" . $cod_cliente . "' 
";
        $this->db->query($sql_eliminar);
        return 1;
    }

}
