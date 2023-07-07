<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../modelos/Conexion.php';
require_once '../modelos/Mrecarga.php';

$recarga = new Mrecarga();

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'obtener_detalle') {
        $resultado = $recarga->obtener_detalle($_POST['id_player']);
        echo json_encode($resultado);
    } elseif ($_GET['action'] === 'guardar') {
        date_default_timezone_set("America/Lima");
        $file_name = "file_" . $_POST['cod_cliente'] . "_" . date('YmdHis') . "_" . rand(1, 9999) . $_POST['file_ext'];
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "../imagenes/" . $file_name)) {
            $param['cod_cliente'] = $_POST['cod_cliente'];
            $param['canal'] = $_POST['canal'];
            $param['banco'] = $_POST['banco'];
            $param['monto'] = $_POST['monto'];
            $param['fecha'] = $_POST['fecha'];
            $param['comprobante'] = "imagenes/" . $file_name;
            $resultado = $recarga->guardar_recarga($param);
            echo $resultado;
        } else {
            echo "No se pudo guardar el comprobante.";
        }
    } elseif ($_GET['action'] === 'editar') {
        $param['cod_recarga'] = $_POST['cod_recarga'];
        $param['canal'] = $_POST['canal'];
        $param['banco'] = $_POST['banco'];
        $param['monto'] = $_POST['monto'];
        $param['fecha'] = $_POST['fecha'];
        $resultado = $recarga->editar_recarga($param);
        echo $resultado;
    } elseif ($_GET['action'] === 'eliminar') {
        $resultado = $recarga->eliminar_recarga($_POST['cod_recarga']);
        echo $resultado;
    } else {
        echo 'No se nombro la acción a ejecutar';
    }
} else {
    echo 'No existe acción a ejecutar';
}
