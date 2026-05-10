<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="dr-layout-main">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="dr-content fade-in">
        <div class="dr-page-header">
            <h1 class="dr-page-title"><i class="fas fa-shopping-cart"></i> Gestión de Pedidos</h1>
            <a href="index.php?controller=pedido&action=create" class="dr-btn dr-btn-primary">
                <i class="fas fa-plus"></i> Nuevo Pedido
            </a>
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

        <div class="dr-card">
            <div class="dr-card-body">
                <div class="dr-search-bar">
                    <form action="index.php" method="GET" class="dr-search-form">
                        <input type="hidden" name="controller" value="pedido">
                        <input type="hidden" name="action" value="index">
                        <div class="dr-input-icon-wrapper">
                            <i class="fas fa-search dr-input-icon"></i>
                            <input type="text" class="dr-input dr-input-with-icon" name="search" placeholder="Buscar por cliente o producto..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        </div>
                        <?php if(isset($_GET['search']) && $_GET['search']): ?>
                            <a href="index.php?controller=pedido&action=index" class="dr-btn dr-btn-outline">Limpiar</a>
                        <?php endif; ?>
                        <button type="submit" class="dr-btn dr-btn-primary">Buscar</button>
                    </form>
                </div>

                <div class="dr-table-wrapper">
                    <table class="dr-table">
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
                                        <td><?php echo htmlspecialchars($pedido['id_pedido']); ?></td>
                                        <td><?php echo htmlspecialchars($pedido['cliente_nombre'] . ' ' . $pedido['cliente_apellido']); ?></td>
                                        <td><?php echo htmlspecialchars($pedido['nombre_producto']); ?></td>
                                        <td><?php echo htmlspecialchars($pedido['cantidad']); ?></td>
                                        <td><strong><?php echo formatCurrency($pedido['total']); ?></strong></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($pedido['fecha_pedido'])); ?></td>
                                        <td>
                                            <div class="dr-dropdown">
                                                <button class="dr-btn dr-btn-sm dr-btn-<?php echo getStatusClass($pedido['estado_pedido']); ?>" type="button">
                                                    <?php echo ucfirst($pedido['estado_pedido']); ?>
                                                    <i class="fas fa-chevron-down ms-1" style="font-size: 0.8em;"></i>
                                                </button>
                                                <div class="dr-dropdown-menu">
                                                    <a class="dr-dropdown-item" href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=pendiente">Pendiente</a>
                                                    <a class="dr-dropdown-item" href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=pagado">Pagado</a>
                                                    <a class="dr-dropdown-item" href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=enviado">Enviado</a>
                                                    <a class="dr-dropdown-item" href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=entregado">Entregado</a>
                                                    <div class="dr-dropdown-divider"></div>
                                                    <a class="dr-dropdown-item dr-text-danger" href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=cancelado">Cancelado</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div style="display: flex; gap: 5px;">
                                                <a href="index.php?controller=pedido&action=show&id=<?php echo $pedido['id_pedido']; ?>" class="dr-btn dr-btn-sm dr-btn-icon dr-btn-info" title="Ver">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="index.php?controller=pedido&action=edit&id=<?php echo $pedido['id_pedido']; ?>" class="dr-btn dr-btn-sm dr-btn-icon dr-btn-warning" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="index.php?controller=pedido&action=delete&id=<?php echo $pedido['id_pedido']; ?>" class="dr-btn dr-btn-sm dr-btn-icon dr-btn-danger btn-delete" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8">
                                        <div class="dr-empty-state">
                                            <i class="fas fa-inbox"></i>
                                            <p>No hay pedidos registrados</p>
                                        </div>
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