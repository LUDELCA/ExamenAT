<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../modelos/Conexion.php';
require_once '../modelos/Mreporte.php';

$reporte = new Mreporte();

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'obtener_recargas') {
        $param['fecha_inicio'] = $_POST['fecha_inicio'];
        $param['fecha_fin'] = $_POST['fecha_fin'];
        $param['id_player'] = $_POST['id_player'];
        $resultado = $reporte->obtener_recargas($param);
        echo json_encode($resultado);
    } else {
        echo 'No se nombro la acción a ejecutar';
    }
} else {
    echo 'No existe acción a ejecutar';
}
