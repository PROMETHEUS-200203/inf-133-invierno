<?php require ROOT_VIEW . '/template/header.php'; ?>
<?php
$page = 1;
$ope = 'filterSearch';
$filter = '';
$items_per_page = 10;
$total_pages = 1;
$response = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $filter = urlencode(trim(isset($_POST['filter']) ? $_POST['filter'] : ''));
}
$client = new HttpClient(HTTP_BASE);
$page = isset($_POST['page']) ? $_POST['page'] : 1;
$filter = isset($_POST['filter']) ? $_POST['filter'] : '';

$responseData = $client->get('/controller/BebidasController.php', [
    'ope' => 'filterSearch',
    'page' => $page,
    'busqueda' => $filter,
]);
//var_dump($responseData);
$records = $responseData['DATA'];
$totalItems = $responseData['LENGHT'];
try {
    $total_pages =  ceil($totalItems / $items_per_page);
} catch (Exception $e) {
    $total_pages = 1;
}
//paginacion
$max_links = 5;
$half_max_link = floor($max_links / 2);
$start_page = $page - $half_max_link;
$end_page = $page + $half_max_link;
if ($start_page < 1) {
    $end_page += abs($start_page) + 1;
    $start_page = 1;
}
if ($end_page > $total_pages) {
    $start_page -= ($end_page - $total_pages);
    $end_page = $total_pages;
    if ($start_page < 1) {
        $start_page = 1;
    }
}
?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Lista de Bebidas</h5>
            </div>
            <div class="card-header">
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-lg" 
                        placeholder="Buscar por nombre" name="filter" 
                        value="<?php echo ((isset($filter) ? $filter : '')) ?>">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-header">
            <a href="<?php echo HTTP_BASE; ?>/web/cli/new/0" 
            class="btn btn-success">Nuevo</a>
            <a href="<?php echo HTTP_BASE; ?>/report/rptbebidasglobal.php"  target="_blank"
            class="btn btn-dark">Reporte</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">Opciones</th>
                            <th>Bebida ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Marca</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Proveedor</th>
                            <th>Código de Barra</th>
                            <th>Volumen</th>
                            <th>Calorías</th>
                            <th>Azúcar</th>
                            <th>Alcohol</th>
                            <th>Ingredientes</th>
                            <th>Descripción</th>
                            <th>Stock</th>
                            <th>Sabor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($records as $fila) : ?>
                            <tr>
                                <td>
                                <p>    
                                <a href="<?php echo HTTP_BASE . "/web/cli/view/" . $fila['id']; ?>"
                                 class="btn btn-info">Ver</a>
                                 <p>
                                 <a href="<?php echo HTTP_BASE . "/web/cli/edit/" . $fila['id']; ?>"
                                 class="btn btn-primary btn-sm">Editar</a>
                                 <p>
                                 <a href="<?php echo HTTP_BASE . "/web/cli/delete/" . $fila['id']; ?>"
                                 class="btn btn-danger">Eliminar</a>
                                 <p>
                                 <a href="<?php echo HTTP_BASE."/report/rptbebidas.php?id=".$fila['id'] ?>" 
                                 target="_blank"
                                 class="btn btn-dark">Reporte</a>
                                 <p>
                                </td>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['beb_nombre']; ?></td>
                                <td><?php echo $fila['beb_tipo']; ?></td>
                                <td><?php echo $fila['beb_marca']; ?></td>
                                <td><?php echo $fila['beb_precio']; ?></td>
                                <td><?php echo $fila['beb_cantidad']; ?></td>
                                <td><?php echo $fila['beb_proveedor']; ?></td>
                                <td><?php echo $fila['beb_codigo_barra']; ?></td>
                                <td><?php echo $fila['beb_volumen']; ?></td>
                                <td><?php echo $fila['beb_calorias']; ?></td>
                                <td><?php echo $fila['beb_azucar']; ?></td>
                                <td><?php echo $fila['beb_alcohol']; ?></td>
                                <td><?php echo $fila['beb_ingredientes']; ?></td>
                                <td><?php echo $fila['beb_descripcion']; ?></td>
                                <td><?php echo $fila['beb_stock']; ?></td>
                                <td><?php echo $fila['beb_sabor']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer ">

            </div>
            <div class="card-footer clearfix">
                <ul class="pagination">
                    <?php if ($page > 1) : ?>
                        <li class="page-item">
                            <form action="" method="POST">
                                <input type="hidden" name="page" value="1">
                                <button type="submit" class="page-link">Primera</button>
                            </form>
                        </li>
                        <li class="page-item">
                            <form action="" method="POST">
                                <input ty<div class="card-footer clearfix">
    <ul class="pagination">
        <?php if ($page > 1) : ?>
            <li class="page-item">
                <form action="" method="POST">
                    <input type="hidden" name="page" value="1">
                    <button type="submit" class="page-link">Primera</button>
                </form>
            </li>
            <li class="page-item">
                <form action="" method="POST">
                    <input type="hidden" name="page" value="<?php echo ($page - 1); ?>">
                    <button type="submit" class="page-link">&laquo;</button>
                </form>
            </li>
        <?php endif; ?>
        <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
            <li class="page-item <?php echo ($page == $i ? 'active' : '') ?>">
                <form action="" method="POST">
                    <input type="hidden" name="page" value="<?php echo ($i); ?>">
                    <button type="submit" class="page-link"><?php echo ($i); ?></button>
                </form>
            </li>
        <?php endfor; ?>
        <?php if ($page < $total_pages) : ?>
            <li class="page-item">
                <form action="" method="POST">
                    <input type="hidden" name="page" value="<?php echo ($page + 1); ?>">
                    <button type="submit" class="page-link">&raquo;</button>
                </form>
            </li>
            <li class="page-item">
                <form action="" method="POST">
                    <input type="hidden" name="page" value="<?php echo $total_pages; ?>">
                    <button type="submit" class="page-link">Última</button>
                </form>
            </li>
        <?php endif; ?>
    </ul>
</div>
pe="hidden" name="page" value="<?php echo ($page - 1); ?>">
                                <button type="submit" class="page-link">&laquo;</button>
                            </form>
                        </li>
                    <?php endif; ?>
                    <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
                        <li class="page-item <?php echo ($page == $i ? 'active' : '') ?>">
                            <form action="" method="POST">
                                <input type="hidden" name="page" value="<?php echo ($i); ?>">
                                <button type="submit" class="page-link"><?php echo ($i); ?></button>
                            </form>
                        </li>
                    <?php endfor; ?>
                    <?php if ($page < $total_pages) : ?>
                        <li class="page-item">
                            <form action="" method="POST">
                                <input type="hidden" name="page" value="<?php echo ($page+1);?>">
                                <button type="submit" class="page-link">&raquo;</button>
                            </form>
                        </li>
                        <li class="page-item">
                            <form action="" method="POST">
                                <input type="hidden" name="page" value="<?php echo $total_pages; ?>">
                                <button type="submit" class="page-link">Última</button>
                            </form>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php require ROOT_VIEW . '/template/footer.php'; ?>
