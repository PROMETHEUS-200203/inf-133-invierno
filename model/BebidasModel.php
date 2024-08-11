<?php
require_once('../core/ModelBasePDO.php');

class BebidasModel extends ModeloBasePDO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAll()
    {
        $sql = "SELECT id, beb_nombre, beb_tipo, beb_marca, beb_precio, beb_cantidad, 
                       beb_proveedor, beb_codigo_barra, beb_volumen, beb_calorias, 
                       beb_azucar, beb_alcohol, beb_ingredientes, beb_descripcion, 
                       beb_stock, beb_sabor
                FROM bebidas;";
        $param = array();
        return parent::gselect($sql, $param);
    }

    public function findID($p_id)
    {
        $sql = 'SELECT id, beb_nombre, beb_tipo, beb_marca, beb_precio, beb_cantidad, 
                       beb_proveedor, beb_codigo_barra, beb_volumen, beb_calorias, 
                       beb_azucar, beb_alcohol, beb_ingredientes, beb_descripcion, 
                       beb_stock, beb_sabor
                FROM bebidas
                WHERE id = :p_id;';
        $params = array();
        array_push($params, [':p_id', $p_id, PDO::PARAM_INT]);
        return parent::gselect($sql, $params);
    }

    public function findPaginateAll($p_limit, $p_offset, $p_busqueda)
    {
        $sql = "SELECT id, beb_nombre, beb_tipo, beb_marca, beb_precio, beb_cantidad, 
                       beb_proveedor, beb_codigo_barra, beb_volumen, beb_calorias, 
                       beb_azucar, beb_alcohol, beb_ingredientes, beb_descripcion, 
                       beb_stock, beb_sabor
                FROM bebidas
                WHERE UPPER(CONCAT(IFNULL(id,''), IFNULL(beb_nombre,''), IFNULL(beb_tipo,''), 
                         IFNULL(beb_marca,''), IFNULL(beb_precio,''), IFNULL(beb_cantidad,''), 
                         IFNULL(beb_proveedor,''), IFNULL(beb_codigo_barra,''), IFNULL(beb_volumen,''), 
                         IFNULL(beb_calorias,''), IFNULL(beb_azucar,''), IFNULL(beb_alcohol,''), 
                         IFNULL(beb_ingredientes,''), IFNULL(beb_descripcion,''), IFNULL(beb_stock,''), 
                         IFNULL(beb_sabor,'')))
                LIKE CONCAT('%',UPPER(IFNULL(:p_busqueda,'')),'%')
                LIMIT :p_limit
                OFFSET :p_offset;";
        $params = array();
        array_push($params, [':p_limit', $p_limit, PDO::PARAM_INT]);
        array_push($params, [':p_offset', $p_offset, PDO::PARAM_INT]);
        array_push($params, [':p_busqueda', $p_busqueda, PDO::PARAM_STR]);
        $result = parent::gselect($sql, $params);

        $sqlCount = "SELECT COUNT(1) as cant
                     FROM bebidas
                     WHERE UPPER(CONCAT(IFNULL(id,''), IFNULL(beb_nombre,''), IFNULL(beb_tipo,''), 
                             IFNULL(beb_marca,''), IFNULL(beb_precio,''), IFNULL(beb_cantidad,''), 
                             IFNULL(beb_proveedor,''), IFNULL(beb_codigo_barra,''), IFNULL(beb_volumen,''), 
                             IFNULL(beb_calorias,''), IFNULL(beb_azucar,''), IFNULL(beb_alcohol,''), 
                             IFNULL(beb_ingredientes,''), IFNULL(beb_descripcion,''), IFNULL(beb_stock,''), 
                             IFNULL(beb_sabor,'')))
                     LIKE CONCAT('%',UPPER(IFNULL(:p_busqueda,'')),'%');";
        $paramsCount = array();
        array_push($paramsCount, [':p_busqueda', $p_busqueda, PDO::PARAM_STR]);
        $resultCount = parent::gselect($sqlCount, $paramsCount);

        $result['LENGTH'] = $resultCount['DATA'][0]['cant'];
        return $result;
    }

    public function insert(
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
    ) {
        $sql = "INSERT INTO bebidas(beb_nombre, beb_tipo, beb_marca, beb_precio, beb_cantidad, 
                                     beb_proveedor, beb_codigo_barra, beb_volumen, beb_calorias, 
                                     beb_azucar, beb_alcohol, beb_ingredientes, beb_descripcion, 
                                     beb_stock, beb_sabor)
                VALUES (:p_beb_nombre, :p_beb_tipo, :p_beb_marca, :p_beb_precio, :p_beb_cantidad, 
                        :p_beb_proveedor, :p_beb_codigo_barra, :p_beb_volumen, :p_beb_calorias, 
                        :p_beb_azucar, :p_beb_alcohol, :p_beb_ingredientes, :p_beb_descripcion, 
                        :p_beb_stock, :p_beb_sabor);";
        $params = array();
        array_push($params, [':p_beb_nombre', $p_beb_nombre, PDO::PARAM_STR]);
        array_push($params, [':p_beb_tipo', $p_beb_tipo, PDO::PARAM_STR]);
        array_push($params, [':p_beb_marca', $p_beb_marca, PDO::PARAM_STR]);
        array_push($params, [':p_beb_precio', $p_beb_precio, PDO::PARAM_STR]);
        array_push($params, [':p_beb_cantidad', $p_beb_cantidad, PDO::PARAM_INT]);
        array_push($params, [':p_beb_proveedor', $p_beb_proveedor, PDO::PARAM_STR]);
        array_push($params, [':p_beb_codigo_barra', $p_beb_codigo_barra, PDO::PARAM_STR]);
        array_push($params, [':p_beb_volumen', $p_beb_volumen, PDO::PARAM_STR]);
        array_push($params, [':p_beb_calorias', $p_beb_calorias, PDO::PARAM_INT]);
        array_push($params, [':p_beb_azucar', $p_beb_azucar, PDO::PARAM_STR]);
        array_push($params, [':p_beb_alcohol', $p_beb_alcohol, PDO::PARAM_STR]);
        array_push($params, [':p_beb_ingredientes', $p_beb_ingredientes, PDO::PARAM_STR]);
        array_push($params, [':p_beb_descripcion', $p_beb_descripcion, PDO::PARAM_STR]);
        array_push($params, [':p_beb_stock', $p_beb_stock, PDO::PARAM_INT]);
        array_push($params, [':p_beb_sabor', $p_beb_sabor, PDO::PARAM_STR]);
        return parent::ginsert($sql, $params);
    }

    public function update(
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
    ) {
        $sql = "UPDATE bebidas 
                SET beb_nombre=:p_beb_nombre, beb_tipo=:p_beb_tipo, beb_marca=:p_beb_marca, 
                    beb_precio=:p_beb_precio, beb_cantidad=:p_beb_cantidad, beb_proveedor=:p_beb_proveedor, 
                    beb_codigo_barra=:p_beb_codigo_barra, beb_volumen=:p_beb_volumen, beb_calorias=:p_beb_calorias, 
                    beb_azucar=:p_beb_azucar, beb_alcohol=:p_beb_alcohol, beb_ingredientes=:p_beb_ingredientes, 
                    beb_descripcion=:p_beb_descripcion, beb_stock=:p_beb_stock, beb_sabor=:p_beb_sabor
                WHERE id=:p_id;";
        $params = array();
        array_push($params, [':p_id', $p_id, PDO::PARAM_INT]);
        array_push($params, [':p_beb_nombre', $p_beb_nombre, PDO::PARAM_STR]);
        array_push($params, [':p_beb_tipo', $p_beb_tipo, PDO::PARAM_STR]);
        array_push($params, [':p_beb_marca', $p_beb_marca, PDO::PARAM_STR]);
        array_push($params, [':p_beb_precio', $p_beb_precio, PDO::PARAM_STR]);
        array_push($params, [':p_beb_cantidad', $p_beb_cantidad, PDO::PARAM_INT]);
        array_push($params, [':p_beb_proveedor', $p_beb_proveedor, PDO::PARAM_STR]);
        array_push($params, [':p_beb_codigo_barra', $p_beb_codigo_barra, PDO::PARAM_STR]);
        array_push($params, [':p_beb_volumen', $p_beb_volumen, PDO::PARAM_STR]);
        array_push($params, [':p_beb_calorias', $p_beb_calorias, PDO::PARAM_INT]);
        array_push($params, [':p_beb_azucar', $p_beb_azucar, PDO::PARAM_STR]);
        array_push($params, [':p_beb_alcohol', $p_beb_alcohol, PDO::PARAM_STR]);
        array_push($params, [':p_beb_ingredientes', $p_beb_ingredientes, PDO::PARAM_STR]);
        array_push($params, [':p_beb_descripcion', $p_beb_descripcion, PDO::PARAM_STR]);
        array_push($params, [':p_beb_stock', $p_beb_stock, PDO::PARAM_INT]);
        array_push($params, [':p_beb_sabor', $p_beb_sabor, PDO::PARAM_STR]);
        return parent::gupdate($sql, $params);
    }

    public function delete($p_id)
    {
        $sql = "DELETE FROM bebidas WHERE id = :p_id;";
        $params = array();
        array_push($params, [':p_id', $p_id, PDO::PARAM_INT]);
        return parent::gdelete($sql, $params);
    }
}
?>
