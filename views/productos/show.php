<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="main-container">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-box"></i> Detalles del Producto</h4>
            <a href="index.php?controller=producto&action=index" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Información del Producto</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th width="35%">ID:</th>
                                <td><?php echo $producto['id_producto']; ?></td>
                            </tr>
                            <tr>
                                <th>Nombre:</th>
                                <td><?php echo $producto['nombre_producto']; ?></td>
                            </tr>
                            <tr>
                                <th>Categoría:</th>
                                <td><span class="badge bg-secondary"><?php echo $producto['categoria']; ?></span></td>
                            </tr>
                            <tr>
                                <th>Región de Origen:</th>
                                <td><?php echo $producto['region_origen']; ?></td>
                            </tr>
                            <tr>
                                <th>Precio:</th>
                                <td><strong class="text-success"><?php echo formatCurrency($producto['precio']); ?></strong></td>
                            </tr>
                            <tr>
                                <th>Stock:</th>
                                <td>
                                    <?php if ($producto['stock'] < 10): ?>
                                        <span class="badge bg-danger"><?php echo $producto['stock']; ?> (Bajo)</span>
                                    <?php else: ?>
                                        <span class="badge bg-success"><?php echo $producto['stock']; ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Descripción:</th>
                                <td><?php echo $producto['descripcion']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Acciones</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="index.php?controller=producto&action=edit&id=<?php echo $producto['id_producto']; ?>" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Editar Producto
                            </a>
                            <a href="index.php?controller=producto&action=delete&id=<?php echo $producto['id_producto']; ?>" class="btn btn-danger btn-delete">
                                <i class="fas fa-trash"></i> Eliminar Producto
                            </a>
                            <a href="index.php?controller=producto&action=index" class="btn btn-outline-secondary">
                                <i class="fas fa-list"></i> Ver Todos los Productos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>