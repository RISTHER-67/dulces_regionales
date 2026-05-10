<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="main-container">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-shopping-cart"></i> Gestión de Pedidos</h4>
            <a href="index.php?controller=pedido&action=create" class="btn btn-primary-custom">
                <i class="fas fa-plus"></i> Nuevo Pedido
            </a>
        </div>

        <?php $flash = getFlash('success'); ?>
        <?php if ($flash): ?>
            <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> <?php echo $flash['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php $flashError = getFlash('error'); ?>
        <?php if ($flashError): ?>
            <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> <?php echo $flashError['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card card-custom">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="search-box">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="searchInput" placeholder="Buscar por cliente o producto..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                                <?php if(isset($_GET['search']) && $_GET['search']): ?>
                                    <a href="index.php?controller=pedido&action=index" class="btn btn-outline-secondary">Limpiar</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($pedidos) > 0): ?>
                                <?php foreach ($pedidos as $pedido): ?>
                                    <tr>
                                        <td><?php echo $pedido['id_pedido']; ?></td>
                                        <td><?php echo $pedido['cliente_nombre'] . ' ' . $pedido['cliente_apellido']; ?></td>
                                        <td><?php echo $pedido['nombre_producto']; ?></td>
                                        <td><?php echo $pedido['cantidad']; ?></td>
                                        <td><strong><?php echo formatCurrency($pedido['total']); ?></strong></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($pedido['fecha_pedido'])); ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-<?php echo getStatusClass($pedido['estado_pedido']); ?> dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                    <?php echo ucfirst($pedido['estado_pedido']); ?>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=pendiente">Pendiente</a></li>
                                                    <li><a class="dropdown-item" href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=pagado">Pagado</a></li>
                                                    <li><a class="dropdown-item" href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=enviado">Enviado</a></li>
                                                    <li><a class="dropdown-item" href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=entregado">Entregado</a></li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li><a class="dropdown-item text-danger" href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=cancelado">Cancelado</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="action-buttons">
                                            <a href="index.php?controller=pedido&action=show&id=<?php echo $pedido['id_pedido']; ?>" class="btn btn-sm btn-info" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="index.php?controller=pedido&action=edit&id=<?php echo $pedido['id_pedido']; ?>" class="btn btn-sm btn-warning" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="index.php?controller=pedido&action=delete&id=<?php echo $pedido['id_pedido']; ?>" class="btn btn-sm btn-danger btn-delete" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-2x mb-2"></i>
                                        <p class="mb-0">No hay pedidos registrados</p>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>