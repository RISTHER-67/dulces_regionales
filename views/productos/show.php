<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="dr-layout-main">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="dr-content">
        <div class="dr-page-header-content">
            <h4><i class="fas fa-box"></i> Detalles del Producto</h4>
            <a href="index.php?controller=producto&action=index" class="dr-btn dr-btn-outline">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="dr-show-row">
            <div class="dr-show-col">
                <div class="dr-card">
                    <div class="dr-card-header">
                        <h5>Información del Producto</h5>
                    </div>
                    <div class="dr-card-body">
                        <table class="dr-table-details">
                            <tr>
                                <th width="35%">ID:</th>
                                <td><?php echo htmlspecialchars($producto['id_producto']); ?></td>
                            </tr>
                            <tr>
                                <th>Nombre:</th>
                                <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                            </tr>
                            <tr>
                                <th>Categoría:</th>
                                <td><span class="dr-badge dr-badge-secondary"><?php echo htmlspecialchars($producto['categoria']); ?></span></td>
                            </tr>
                            <tr>
                                <th>Región de Origen:</th>
                                <td><?php echo htmlspecialchars($producto['region_origen']); ?></td>
                            </tr>
                            <tr>
                                <th>Precio:</th>
                                <td><strong class="dr-text-success"><?php echo formatCurrency($producto['precio']); ?></strong></td>
                            </tr>
                            <tr>
                                <th>Stock:</th>
                                <td>
                                    <?php if ($producto['stock'] < 10): ?>
                                        <span class="dr-badge dr-badge-danger"><?php echo htmlspecialchars($producto['stock']); ?> (Bajo)</span>
                                    <?php else: ?>
                                        <span class="dr-badge dr-badge-success"><?php echo htmlspecialchars($producto['stock']); ?></span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Descripción:</th>
                                <td><?php echo nl2br(htmlspecialchars($producto['descripcion'])); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="dr-action-col">
                <div class="dr-card">
                    <div class="dr-card-header">
                        <h5>Acciones</h5>
                    </div>
                    <div class="dr-card-body">
                        <div class="dr-action-stack">
                            <a href="index.php?controller=producto&action=edit&id=<?php echo htmlspecialchars($producto['id_producto']); ?>" class="dr-btn dr-btn-warning">
                                <i class="fas fa-edit"></i> Editar Producto
                            </a>
                            <a href="index.php?controller=producto&action=delete&id=<?php echo htmlspecialchars($producto['id_producto']); ?>" class="dr-btn dr-btn-danger btn-delete">
                                <i class="fas fa-trash"></i> Eliminar Producto
                            </a>
                            <a href="index.php?controller=producto&action=index" class="dr-btn dr-btn-outline">
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