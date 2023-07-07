<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../modelos/Conexion.php';
require_once '../modelos/Mcliente.php';

$cliente = new Mcliente();

if (isset($_GET['action'])) {
    if ($_GET['action'] === 'obtener_clientes') {
        $resultado = $cliente->obtener_clientes($_POST['texto']);
        echo json_encode($resultado);
    } elseif ($_GET['action'] === 'guardar') {
        $param['cod_cliente'] = $_POST['cod_cliente'];
        $param['id_player'] = $_POST['id_player'];
        $param['nombre'] = $_POST['nombre'];
        $param['apellido'] = $_POST['apellido'];
        $param['tipo_doc'] = $_POST['tipo_doc'];
        $param['num_doc'] = $_POST['num_doc'];
        $param['celular'] = $_POST['celular'];
        $param['correo_electronico'] = $_POST['correo_electronico'];
        $resultado = $cliente->guardar_cliente($param);
        echo $resultado;
    } elseif ($_GET['action'] === 'eliminar') {
        $resultado = $cliente->eliminar_cliente($_POST['cod_cliente']);
        echo $resultado;
    } else {
        echo 'No se nombro la acción a ejecutar';
    }
} else {
    echo 'No existe acción a ejecutar';
}
