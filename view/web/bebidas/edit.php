<?php require ROOT_VIEW . '/template/header.php'; ?>
<?php
$pId = $_GET['id'] ?? null;
$pAccion = $_GET['accion'] ?? null;

$client = new HttpClient(HTTP_BASE);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $datajson = [
        'id' => $_POST['id'],
        'beb_nombre' => $_POST['beb_nombre'],
        'beb_tipo' => $_POST['beb_tipo'],
        'beb_marca' => $_POST['beb_marca'],
        'beb_precio' => $_POST['beb_precio'],
        'beb_cantidad' => $_POST['beb_cantidad'],
        'beb_proveedor' => $_POST['beb_proveedor'],
        'beb_codigo_barra' => $_POST['beb_codigo_barra'],
        'beb_volumen' => $_POST['beb_volumen'],
        'beb_calorias' => $_POST['beb_calorias'],
        'beb_azucar' => $_POST['beb_azucar'],
        'beb_alcohol' => $_POST['beb_alcohol'],
        'beb_ingredientes' => $_POST['beb_ingredientes'],
        'beb_descripcion' => $_POST['beb_descripcion'],
        'beb_stock' => $_POST['beb_stock'],
        'beb_sabor' => $_POST['beb_sabor']
    ];

    if ($pAccion == 'EDIT') {
        $result = $client->put('/controller/BebidasController.php', $datajson);
    } else if ($pAccion == 'NEW') {
        $result = $client->post('/controller/BebidasController.php', $datajson);
    } else if ($pAccion == 'DELETE') {
        $result = $client->delete('/controller/BebidasController.php', $datajson);
    }

    var_dump($result);
    if ($result["ESTADO"]) {
        echo "<script>alert('Operación realizada con éxito.');</script>";
        if ($pAccion == 'DELETE') {
            echo "<script>window.location.href = '" . HTTP_BASE . "/web/bebidas/list';</script>";
        }
    } else {
        echo "<script>alert('Hubo un problema, se debe contactar con el administrador. Mentira si se realizo la operacion con exito Caiste XD');</script>";
    }
}

if ($pAccion == 'NEW') {
    $record = [
        'id' => '',
        'beb_nombre' => '',
        'beb_tipo' => '',
        'beb_marca' => '',
        'beb_precio' => '',
        'beb_cantidad' => '',
        'beb_proveedor' => '',
        'beb_codigo_barra' => '',
        'beb_volumen' => '',
        'beb_calorias' => '',
        'beb_azucar' => '',
        'beb_alcohol' => '',
        'beb_ingredientes' => '',
        'beb_descripcion' => '',
        'beb_stock' => '',
        'beb_sabor' => '',
    ];
} else {
    $responseData = $client->get('/controller/BebidasController.php', [
        'ope' => 'filterId',
        'id' => $pId,
    ]);
    $record = $responseData['DATA'][0];
}

?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Bebidas</h5>
            </div>
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Bebidas</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                    <div class="card-body">
    <div class="form-group">
        <label for="fortxt01">Código Bebida</label>
        <input id="fortxt01"  class="form-control" placeholder="Código Bebida" name="id" value="<?php echo $record['id']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="fortxt02">Nombre</label>
        <input id="fortxt02" type="text" class="form-control" placeholder="Nombre" name="beb_nombre" value="<?php echo $record['beb_nombre']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt03">Tipo</label>
        <input id="fortxt03" type="text" class="form-control" placeholder="Tipo" name="beb_tipo" value="<?php echo $record['beb_tipo']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt04">Marca</label>
        <input id="fortxt04" type="text" class="form-control" placeholder="Marca" name="beb_marca" value="<?php echo $record['beb_marca']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt05">Precio</label>
        <input id="fortxt05"  class="form-control" placeholder="Precio" name="beb_precio" value="<?php echo $record['beb_precio']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt06">Cantidad</label>
        <input id="fortxt06"  class="form-control" placeholder="Cantidad" name="beb_cantidad" value="<?php echo $record['beb_cantidad']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt07">Proveedor</label>
        <input id="fortxt07" type="text" class="form-control" placeholder="Proveedor" name="beb_proveedor" value="<?php echo $record['beb_proveedor']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt08">Código de Barra</label>
        <input id="fortxt08"  class="form-control" placeholder="Código de Barra" name="beb_codigo_barra" value="<?php echo $record['beb_codigo_barra']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt09">Volumen</label>
        <input id="fortxt09" type="text" class="form-control" placeholder="Volumen" name="beb_volumen" value="<?php echo $record['beb_volumen']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt10">Calorías</label>
        <input id="fortxt10"  class="form-control" placeholder="Calorías" name="beb_calorias" value="<?php echo $record['beb_calorias']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt11">Azúcar</label>
        <input id="fortxt11"  class="form-control" placeholder="Azúcar" name="beb_azucar" value="<?php echo $record['beb_azucar']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt12">Alcohol</label>
        <input id="fortxt12"  class="form-control" placeholder="Alcohol" name="beb_alcohol" value="<?php echo $record['beb_alcohol']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt13">Ingredientes</label>
        <input id="fortxt13" type="text" class="form-control" placeholder="Ingredientes" name="beb_ingredientes" value="<?php echo $record['beb_ingredientes']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt14">Descripción</label>
        <input id="fortxt14" type="text" class="form-control" placeholder="Descripción" name="beb_descripcion" value="<?php echo $record['beb_descripcion']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt15">Stock</label>
        <input id="fortxt15"  class="form-control" placeholder="Stock" name="beb_stock" value="<?php echo $record['beb_stock']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
    <div class="form-group">
        <label for="fortxt16">Sabor</label>
        <input id="fortxt16" type="text" class="form-control" placeholder="Sabor" name="beb_sabor" value="<?php echo $record['beb_sabor']; ?>" <?php echo (($pAccion == 'VIEW' || $pAccion == 'DELETE') ? 'readonly' : ''); ?>>
    </div>
</div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <?php if ($pAccion != 'VIEW') : ?>
                                <button type="submit" class="btn btn-primary"><?php echo ($pAccion == 'DELETE' ? 'ELIMINAR' : 'GUARDAR'); ?></button>
                            <?php endif; ?>
                            <a href="<?php echo HTTP_BASE; ?>/web/cli/list" class="btn btn-primary">Volver</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php require ROOT_VIEW . '/template/footer.php'; ?> 
