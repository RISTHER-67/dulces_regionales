<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="dr-layout-main">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <main class="dr-content fade-in">
        <div class="dr-page-header">
            <h1 class="dr-page-title"><i class="fas fa-chart-line"></i> Dashboard</h1>
            <span class="dr-user-greeting">Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?></span>
        </div>

        <div class="dr-hero-banner">
            <div class="dr-hero-content">
                <h2>Tradición Artesanal</h2>
                <p>Gestiona tus productos y pedidos con la esencia de lo regional. Calidad Doña Solina en cada detalle.</p>
            </div>
        </div>

        <?php $flash = getFlash('success'); ?>
        <?php if ($flash): ?>
            <div class="dr-alert dr-alert-success">
                <i class="fas fa-check-circle"></i> <?php echo $flash['message']; ?>
            </div>
        <?php endif; ?>

        <?php $flashError = getFlash('error'); ?>
        <?php if ($flashError): ?>
            <div class="dr-alert dr-alert-danger">
                <i class="fas fa-exclamation-circle"></i> <?php echo $flashError['message']; ?>
            </div>
        <?php endif; ?>

        <div class="dr-grid-stats">
            <div class="dr-stat-card dr-stat-primary">
                <div class="dr-stat-info">
                    <div class="dr-stat-value"><?php echo $totalClientes; ?></div>
                    <div class="dr-stat-label">Total Clientes</div>
                </div>
                <div class="dr-stat-icon"><i class="fas fa-users"></i></div>
            </div>
            
            <div class="dr-stat-card dr-stat-success">
                <div class="dr-stat-info">
                    <div class="dr-stat-value"><?php echo $totalProductos; ?></div>
                    <div class="dr-stat-label">Total Productos</div>
                </div>
                <div class="dr-stat-icon"><i class="fas fa-box"></i></div>
            </div>
            
            <div class="dr-stat-card dr-stat-warning">
                <div class="dr-stat-info">
                    <div class="dr-stat-value"><?php echo $totalPedidos; ?></div>
                    <div class="dr-stat-label">Total Pedidos</div>
                </div>
                <div class="dr-stat-icon"><i class="fas fa-shopping-cart"></i></div>
            </div>
            
            <div class="dr-stat-card dr-stat-danger">
                <div class="dr-stat-info">
                    <div class="dr-stat-value"><?php echo count($productosLowStock); ?></div>
                    <div class="dr-stat-label">Stock Bajo</div>
                </div>
                <div class="dr-stat-icon"><i class="fas fa-exclamation-triangle"></i></div>
            </div>
        </div>

        <div class="dr-grid-panels">
            <div class="dr-card">
                <div class="dr-card-header">
                    <h2><i class="fas fa-exclamation-triangle dr-text-warning"></i> Productos con Stock Bajo</h2>
                </div>
                <div class="dr-card-body">
                    <?php if (count($productosLowStock) > 0): ?>
                        <div class="dr-table-wrapper">
                            <table class="dr-table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productosLowStock as $producto): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                                            <td><span class="dr-badge dr-badge-danger"><?php echo $producto['stock']; ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="dr-empty-state">
                            <i class="fas fa-check-circle dr-text-success"></i>
                            <p>Todos los productos tienen stock suficiente</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="dr-card">
                <div class="dr-card-header">
                    <h2><i class="fas fa-clock dr-text-info"></i> Pedidos Recientes</h2>
                </div>
                <div class="dr-card-body">
                    <?php if (count($pedidosRecientes) > 0): ?>
                        <div class="dr-table-wrapper">
                            <table class="dr-table">
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
                                            <td><?php echo htmlspecialchars($pedido['cliente_nombre'] . ' ' . $pedido['cliente_apellido']); ?></td>
                                            <td><?php echo htmlspecialchars($pedido['nombre_producto']); ?></td>
                                            <td><?php echo formatCurrency($pedido['total']); ?></td>
                                            <td>
                                                <span class="dr-badge dr-badge-<?php echo getStatusClass($pedido['estado_pedido']); ?>">
                                                    <?php echo ucfirst($pedido['estado_pedido']); ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="dr-empty-state">
                            <i class="fas fa-inbox"></i>
                            <p>No hay pedidos recientes</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>