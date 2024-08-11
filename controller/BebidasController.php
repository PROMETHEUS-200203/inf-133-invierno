<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/clientes/config/global.php");

require_once(ROOT_DIR . "/model/BebidasModel.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

try {
    $Path_Info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
    $request = explode('/', trim($Path_Info, '/'));
} catch (Exception $e) {
    echo $e->getMessage();
}

switch ($method) {
    case 'GET': // consulta
        $p_ope = !empty($input['ope']) ? $input['ope'] : $_GET['ope'];
        if (!empty($p_ope)) {
            if ($p_ope == 'filterId') {
                filterId($input);
            } elseif ($p_ope == 'filterSearch') {
                filterPaginateAll($input);
            } elseif ($p_ope == 'filterall') {
                filterAll($input);
            }
        }
        break;
    case 'POST': // inserta
        insert($input);
        break;
    case 'PUT': // actualiza
        update($input);
        break;
    case 'DELETE': // elimina
        delete($input);
        break;
    default: // metodo NO soportado
        echo 'METODO NO SOPORTADO';
        break;
}

function filterAll($input) {
    $tobj = new BebidasModel();
    $var = $tobj->findAll();
    echo json_encode($var);
}

function filterId($input) {
    $p_id = !empty($input['id']) ? $input['id'] : $_GET['id'];
    $tobj = new BebidasModel();
    $var = $tobj->findID($p_id);
    echo json_encode($var);
}

function filterPaginateAll($input) {
    $page = !empty($input['page']) ? $input['page'] : $_GET['page'];
    $p_busqueda = !empty($input['busqueda']) ? $input['busqueda'] : $_GET['busqueda'];
    $nro_record_page = 10;
    $p_limit = 10;
    $p_offset = 0;
    $p_offset = abs(($page - 1) * $nro_record_page);
    $tobj = new BebidasModel();
    $var = $tobj->findPaginateAll($p_limit, $p_offset, $p_busqueda);
    echo json_encode($var);
}

function insert($input) {
    $p_beb_nombre = !empty($input['beb_nombre']) ? $input['beb_nombre'] : $_POST['beb_nombre'];
    $p_beb_tipo = !empty($input['beb_tipo']) ? $input['beb_tipo'] : $_POST['beb_tipo'];
    $p_beb_marca = !empty($input['beb_marca']) ? $input['beb_marca'] : $_POST['beb_marca'];
    $p_beb_precio = !empty($input['beb_precio']) ? $input['beb_precio'] : $_POST['beb_precio'];
    $p_beb_cantidad = !empty($input['beb_cantidad']) ? $input['beb_cantidad'] : $_POST['beb_cantidad'];
    $p_beb_proveedor = !empty($input['beb_proveedor']) ? $input['beb_proveedor'] : $_POST['beb_proveedor'];
    $p_beb_codigo_barra = !empty($input['beb_codigo_barra']) ? $input['beb_codigo_barra'] : $_POST['beb_codigo_barra'];
    $p_beb_volumen = !empty($input['beb_volumen']) ? $input['beb_volumen'] : $_POST['beb_volumen'];
    $p_beb_calorias = !empty($input['beb_calorias']) ? $input['beb_calorias'] : $_POST['beb_calorias'];
    $p_beb_azucar = !empty($input['beb_azucar']) ? $input['beb_azucar'] : $_POST['beb_azucar'];
    $p_beb_alcohol = !empty($input['beb_alcohol']) ? $input['beb_alcohol'] : $_POST['beb_alcohol'];
    $p_beb_ingredientes = !empty($input['beb_ingredientes']) ? $input['beb_ingredientes'] : $_POST['beb_ingredientes'];
    $p_beb_descripcion = !empty($input['beb_descripcion']) ? $input['beb_descripcion'] : $_POST['beb_descripcion'];
    $p_beb_stock = !empty($input['beb_stock']) ? $input['beb_stock'] : $_POST['beb_stock'];
    $p_beb_sabor = !empty($input['beb_sabor']) ? $input['beb_sabor'] : $_POST['beb_sabor'];
    
    $tobj = new BebidasModel();
    $var = $tobj->insert(
        $p_beb_nombre,
        $p_beb_tipo,
        $p_beb_marca,
        $p_beb_precio,
        $p_beb_cantidad,
        $p_beb_proveedor,
        $p_beb_codigo_barra,
        $p_beb_volumen,
        $p_beb_calorias,
        $p_beb_azucar,
        $p_beb_alcohol,
        $p_beb_ingredientes,
        $p_beb_descripcion,
        $p_beb_stock,
        $p_beb_sabor
    );
    echo json_encode($var);
}

function update($input) {
    $p_id = !empty($input['id']) ? $input['id'] : $_POST['id'];
    $p_beb_nombre = !empty($input['beb_nombre']) ? $input['beb_nombre'] : $_POST['beb_nombre'];
    $p_beb_tipo = !empty($input['beb_tipo']) ? $input['beb_tipo'] : $_POST['beb_tipo'];
    $p_beb_marca = !empty($input['beb_marca']) ? $input['beb_marca'] : $_POST['beb_marca'];
    $p_beb_precio = !empty($input['beb_precio']) ? $input['beb_precio'] : $_POST['beb_precio'];
    $p_beb_cantidad = !empty($input['beb_cantidad']) ? $input['beb_cantidad'] : $_POST['beb_cantidad'];
    $p_beb_proveedor = !empty($input['beb_proveedor']) ? $input['beb_proveedor'] : $_POST['beb_proveedor'];
    $p_beb_codigo_barra = !empty($input['beb_codigo_barra']) ? $input['beb_codigo_barra'] : $_POST['beb_codigo_barra'];
    $p_beb_volumen = !empty($input['beb_volumen']) ? $input['beb_volumen'] : $_POST['beb_volumen'];
    $p_beb_calorias = !empty($input['beb_calorias']) ? $input['beb_calorias'] : $_POST['beb_calorias'];
    $p_beb_azucar = !empty($input['beb_azucar']) ? $input['beb_azucar'] : $_POST['beb_azucar'];
    $p_beb_alcohol = !empty($input['beb_alcohol']) ? $input['beb_alcohol'] : $_POST['beb_alcohol'];
    $p_beb_ingredientes = !empty($input['beb_ingredientes']) ? $input['beb_ingredientes'] : $_POST['beb_ingredientes'];
    $p_beb_descripcion = !empty($input['beb_descripcion']) ? $input['beb_descripcion'] : $_POST['beb_descripcion'];
    $p_beb_stock = !empty($input['beb_stock']) ? $input['beb_stock'] : $_POST['beb_stock'];
    $p_beb_sabor = !empty($input['beb_sabor']) ? $input['beb_sabor'] : $_POST['beb_sabor'];
    
    $tobj = new BebidasModel();
    $var = $tobj->update(
        $p_id,
        $p_beb_nombre,
        $p_beb_tipo,
        $p_beb_marca,
        $p_beb_precio,
        $p_beb_cantidad,
        $p_beb_proveedor,
        $p_beb_codigo_barra,
        $p_beb_volumen,
        $p_beb_calorias,
        $p_beb_azucar,
        $p_beb_alcohol,
        $p_beb_ingredientes,
        $p_beb_descripcion,
        $p_beb_stock,
        $p_beb_sabor
    );
    echo json_encode($var);
}

function delete($input) {
    $p_id = !empty($input['id']) ? $input['id'] : $_POST['id'];
    $tobj = new BebidasModel();
    $var = $tobj->delete($p_id);
    echo json_encode($var);
}
?>
