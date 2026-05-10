<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="main-container">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-shopping-bag"></i> Detalles del Pedido</h4>
            <a href="index.php?controller=pedido&action=index" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Información del Pedido</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th width="35%">ID Pedido:</th>
                                <td><?php echo $pedido['id_pedido']; ?></td>
                            </tr>
                            <tr>
                                <th>Fecha:</th>
                                <td><?php echo date('d/m/Y H:i', strtotime($pedido['fecha_pedido'])); ?></td>
                            </tr>
                            <tr>
                                <th>Estado:</th>
                                <td><span class="badge bg-<?php echo getStatusClass($pedido['estado_pedido']); ?>"><?php echo ucfirst($pedido['estado_pedido']); ?></span></td>
                            </tr>
                            <tr>
                                <th>Producto:</th>
                                <td><?php echo $pedido['nombre_producto']; ?></td>
                            </tr>
                            <tr>
                                <th>Precio Unitario:</th>
                                <td><?php echo formatCurrency($pedido['precio_unitario']); ?></td>
                            </tr>
                            <tr>
                                <th>Cantidad:</th>
                                <td><?php echo $pedido['cantidad']; ?></td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td><strong class="text-success fs-5"><?php echo formatCurrency($pedido['total']); ?></strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-custom mb-3">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Información del Cliente</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th width="35%">Nombre:</th>
                                <td><?php echo $pedido['cliente_nombre'] . ' ' . $pedido['cliente_apellido']; ?></td>
                            </tr>
                            <tr>
                                <th>DNI:</th>
                                <td><?php echo $pedido['cliente_dni']; ?></td>
                            </tr>
                            <tr>
                                <th>Teléfono:</th>
                                <td><?php echo $pedido['cliente_telefono']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card card-custom">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Acciones</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <div class="btn-group">
                                <a href="index.php?controller=pedido&action=edit&id=<?php echo $pedido['id_pedido']; ?>" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Editar Pedido
                                </a>
                                <a href="index.php?controller=pedido&action=delete&id=<?php echo $pedido['id_pedido']; ?>" class="btn btn-danger btn-delete">
                                    <i class="fas fa-trash"></i> Eliminar
                                </a>
                            </div>
                            <hr>
                            <div class="btn-group-vertical">
                                <span class="text-muted mb-2 small">Cambiar Estado:</span>
                                <div class="btn-group" role="group">
                                    <a href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=pendiente" class="btn btn-sm btn-outline-warning">Pendiente</a>
                                    <a href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=pagado" class="btn btn-sm btn-outline-info">Pagado</a>
                                    <a href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=enviado" class="btn btn-sm btn-outline-primary">Enviado</a>
                                    <a href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=entregado" class="btn btn-sm btn-outline-success">Entregado</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>