<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="main-container">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-chart-line"></i> Dashboard</h4>
            <span class="text-muted">Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?></span>
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

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card stat-card primary">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-number"><?php echo $totalClientes; ?></div>
                            <div class="stat-label">Total Clientes</div>
                        </div>
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card success">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-number"><?php echo $totalProductos; ?></div>
                            <div class="stat-label">Total Productos</div>
                        </div>
                        <i class="fas fa-box"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card warning">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-number"><?php echo $totalPedidos; ?></div>
                            <div class="stat-label">Total Pedidos</div>
                        </div>
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card danger">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="stat-number"><?php echo count($productosLowStock); ?></div>
                            <div class="stat-label">Stock Bajo</div>
                        </div>
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card card-custom">
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0"><i class="fas fa-exclamation-triangle text-warning"></i> Productos con Stock Bajo</h5>
                    </div>
                    <div class="card-body">
                        <?php if (count($productosLowStock) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($productosLowStock as $producto): ?>
                                            <tr>
                                                <td><?php echo $producto['nombre_producto']; ?></td>
                                                <td><span class="badge bg-danger"><?php echo $producto['stock']; ?></span></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-muted mb-0"><i class="fas fa-check-circle text-success"></i> Todos los productos tienen stock suficiente</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card card-custom">
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0"><i class="fas fa-clock text-info"></i> Pedidos Recientes</h5>
                    </div>
                    <div class="card-body">
                        <?php if (count($pedidosRecientes) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Cliente</th>
                                            <th>Producto</th>
                                            <th>Total</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pedidosRecientes as $pedido): ?>
                                            <tr>
                                                <td><?php echo $pedido['cliente_nombre'] . ' ' . $pedido['cliente_apellido']; ?></td>
                                                <td><?php echo $pedido['nombre_producto']; ?></td>
                                                <td><?php echo formatCurrency($pedido['total']); ?></td>
                                                <td><span class="badge bg-<?php echo getStatusClass($pedido['estado_pedido']); ?>"><?php echo ucfirst($pedido['estado_pedido']); ?></span></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <p class="text-muted mb-0"><i class="fas fa-inbox"></i> No hay pedidos recientes</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>