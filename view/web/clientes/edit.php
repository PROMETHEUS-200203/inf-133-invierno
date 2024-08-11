<?php require ROOT_VIEW . '/template/header.php'; ?>
<?php
$pId = $_GET['id'] ?? null;
$pAccion = $_GET['accion'] ?? null;
//echo $pAccion;
$client = new HttpClient(HTTP_BASE);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $datajson = [
        'cliente_id' => $_POST['cliente_id'],
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'email' => $_POST['email'],
        'telefono' => $_POST['telefono'],
        'direccion' => $_POST['direccion']
    ];
    if ($pAccion == 'EDIT') {
        $result = $client->put('/controller/Ven_clientesController.php', $datajson);
    } else if ($pAccion == 'NEW') {
        $result = $client->post('/controller/Ven_clientesController.php', $datajson);
    } else  if ($pAccion == 'DELETE') {
        $result = $client->delete('/controller/Ven_clientesController.php', $datajson);
    }
    var_dump($result);
    if ($result["ESTADO"]) {
        echo "<script>alert('Operacion realizada con Exito.');</script>";
        if ($pAccion == 'DELETE') {
            echo "<script>window.location.href = '".HTTP_BASE."/web/cli/list';</script>";
        }
    } else {
        echo "<script>alert('Hubo un problema, se debe contactar con el adminsitrador.');</script>";
    }
}
if($pAccion == 'NEW')
{
    $record =  [
        'cliente_id' => '',
        'nombre' => '',
        'apellido' => '',
        'email' => '',
        'telefono' => '',
        'direccion' => '',
        'fecharegistro'=> '',
    ];
}else{
    $responseData = $client->get('/controller/Ven_clientesController.php', [
        'ope' => 'filterId',
        'cliente_id' => $pId,
    ]);
    $record = $responseData['DATA'][0];
}
//var_dump($record);
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5> Clientes</h5>
            </div>
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Clientes</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="fortxt01">Codigo Cliente</label>
                                <input id="fortxt01" type="text" class="form-control" placeholder="Codigo Cliente " name="cliente_id" value="<?php echo $record['cliente_id']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="fortxt02">Nombre</label>
                                <input id="fortxt02" type="text" class="form-control" placeholder="Nombre " 
                                name="nombre" 
                                value="<?php echo $record['nombre']; ?>" 
                                <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt03">Apellidos</label>
                                <input id="fortxt03" type="text" class="form-control" placeholder="Apellidos " name="apellido" value="<?php echo $record['apellido']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt04">Correo Electronico</label>
                                <input id="fortxt04" type="email" class="form-control" placeholder="Correo " name="email" e value="<?php echo $record['email']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt05">Telefono</label>
                                <input id="fortxt05" type="text" class="form-control" placeholder="Telefono" name="telefono" value="<?php echo $record['telefono']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt06">Direccion</label>
                                <input id="fortxt06" type="text" class="form-control" placeholder="Direccion " name="direccion" value="<?php echo $record['direccion']; ?>" <?php echo (($pAccion == 'VIEW' ? 'readonly' : ($pAccion == 'DELETE' ? 'readonly' : ''))) ?>>
                            </div>
                            <div class="form-group">
                                <label for="fortxt01">Fecha de Registro: <?php echo $record['fecharegistro']; ?></label>

                            </div>



                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <?php if ($pAccion != 'VIEW') :?>
                            <button type="submit" class="btn btn-primary"><?php echo ($pAccion == 'DELETE' ? 'ELIMINAR' : 'GUARDAR'); ?></button>
                            <?php endif;?>
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