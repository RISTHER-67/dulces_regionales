<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="dr-layout-main">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="dr-content fade-in">
        <div class="dr-page-header-content">
            <h4><i class="fas fa-edit"></i> Editar Pedido</h4>
            <a href="index.php?controller=pedido&action=index" class="dr-btn dr-btn-outline">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="dr-show-row">
            <div class="dr-show-col" style="flex: 2;">
                <div class="dr-card">
                    <div class="dr-card-body">
                        <form method="POST" action="index.php?controller=pedido&action=edit&id=<?php echo $pedido['id_pedido']; ?>">
                            <div class="dr-form-group">
                                <label for="id_cliente" class="dr-form-label">Cliente *</label>
                                <select class="dr-form-select" id="id_cliente" name="id_cliente" required>
                                    <option value="">Seleccionar Cliente...</option>
                                    <?php foreach ($clientes as $cliente): ?>
                                        <option value="<?php echo htmlspecialchars($cliente['id_cliente']); ?>" <?php echo $cliente['id_cliente'] == $pedido['id_cliente'] ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($cliente['nombre'] . ' ' . $cliente['apellido'] . ' - DNI: ' . $cliente['dni']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="dr-form-group">
                                <label for="id_producto" class="dr-form-label">Producto *</label>
                                <select class="dr-form-select" id="id_producto" name="id_producto" required>
                                    <option value="">Seleccionar Producto...</option>
                                    <?php foreach ($productos as $producto): ?>
                                        <option value="<?php echo htmlspecialchars($producto['id_producto']); ?>" data-precio="<?php echo htmlspecialchars($producto['precio']); ?>" <?php echo $producto['id_producto'] == $pedido['id_producto'] ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($producto['nombre_producto']) . ' - ' . formatCurrency($producto['precio']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="dr-form-row">
                                <div class="dr-form-col">
                                    <div class="dr-form-group">
                                        <label for="cantidad" class="dr-form-label">Cantidad *</label>
                                        <input type="number" class="dr-form-control" id="cantidad" name="cantidad" min="1" value="<?php echo htmlspecialchars($pedido['cantidad']); ?>" required>
                                    </div>
                                </div>
                                <div class="dr-form-col">
                                    <div class="dr-form-group">
                                        <label for="estado_pedido" class="dr-form-label">Estado del Pedido *</label>
                                        <select class="dr-form-select" id="estado_pedido" name="estado_pedido" required>
                                            <option value="pendiente" <?php echo $pedido['estado_pedido'] === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                                            <option value="pagado" <?php echo $pedido['estado_pedido'] === 'pagado' ? 'selected' : ''; ?>>Pagado</option>
                                            <option value="enviado" <?php echo $pedido['estado_pedido'] === 'enviado' ? 'selected' : ''; ?>>Enviado</option>
                                            <option value="entregado" <?php echo $pedido['estado_pedido'] === 'entregado' ? 'selected' : ''; ?>>Entregado</option>
                                            <option value="cancelado" <?php echo $pedido['estado_pedido'] === 'cancelado' ? 'selected' : ''; ?>>Cancelado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="dr-form-group">
                                <label class="dr-form-label">Total Actual</label>
                                <input type="text" class="dr-form-control" value="<?php echo formatCurrency($pedido['total']); ?>" readonly style="background-color: var(--dr-accent-light);">
                                <div style="font-size: 0.85rem; color: var(--dr-text-muted); margin-top: 5px;">El total se recalculará si cambia la cantidad o producto.</div>
                            </div>

                            <div class="dr-form-actions">
                                <button type="submit" class="dr-btn dr-btn-primary">
                                    <i class="fas fa-save"></i> Actualizar Pedido
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="dr-show-col" style="flex: 1;"></div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>