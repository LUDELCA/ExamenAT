<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../modelos/Conexion.php';
require_once '../modelos/Mbanco.php';

$banco = new Mbanco();

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'obtener_bancos') {
        $resultado = $banco->obtener_bancos($_POST['texto']);
        echo json_encode($resultado);
    } elseif ($_GET['action'] === 'guardar') {
        $param['cod_banco'] = $_POST['cod_banco'];
        $param['nombre'] = $_POST['nombre'];
        $param['num_cuenta'] = $_POST['num_cuenta'];
        $resultado = $banco->guardar_banco($param);
        echo $resultado;
    } elseif ($_GET['action'] === 'eliminar') {
        $resultado = $banco->eliminar_banco($_POST['cod_banco']);
        echo $resultado;
    } else {
        echo 'No se nombro la acción a ejecutar';
    }
} else {
    echo 'No existe acción a ejecutar';
}
