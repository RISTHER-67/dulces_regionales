<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="dr-layout-main">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="dr-content fade-in">
        <div class="dr-page-header-content">
            <h4><i class="fas fa-cart-plus"></i> Nuevo Pedido</h4>
            <a href="index.php?controller=pedido&action=index" class="dr-btn dr-btn-outline">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="dr-show-row">
            <div class="dr-show-col" style="flex: 2;">
                <div class="dr-card">
                    <div class="dr-card-body">
                        <form method="POST" action="index.php?controller=pedido&action=create" id="pedidoForm">
                            <div class="dr-form-group">
                                <label for="id_cliente" class="dr-form-label">Cliente *</label>
                                <select class="dr-form-select" id="id_cliente" name="id_cliente" required>
                                    <option value="">Seleccionar Cliente...</option>
                                    <?php foreach ($clientes as $cliente): ?>
                                        <option value="<?php echo htmlspecialchars($cliente['id_cliente']); ?>">
                                            <?php echo htmlspecialchars($cliente['nombre'] . ' ' . $cliente['apellido'] . ' - DNI: ' . $cliente['dni']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="dr-form-group">
                                <label for="id_producto" class="dr-form-label">Producto *</label>
                                <select class="dr-form-select" id="id_producto" name="id_producto" required>
                                    <option value="" data-precio="0">Seleccionar Producto...</option>
                                    <?php foreach ($productos as $producto): ?>
                                        <option value="<?php echo htmlspecialchars($producto['id_producto']); ?>" data-precio="<?php echo htmlspecialchars($producto['precio']); ?>" data-stock="<?php echo htmlspecialchars($producto['stock']); ?>">
                                            <?php echo htmlspecialchars($producto['nombre_producto']) . ' - ' . formatCurrency($producto['precio']) . ' (Stock: ' . htmlspecialchars($producto['stock']) . ')'; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div style="font-size: 0.85rem; color: var(--dr-text-muted); margin-top: 5px;">Solo se muestran productos con stock disponible.</div>
                            </div>

                            <div class="dr-form-row">
                                <div class="dr-form-col">
                                    <div class="dr-form-group">
                                        <label for="cantidad" class="dr-form-label">Cantidad *</label>
                                        <input type="number" class="dr-form-control" id="cantidad" name="cantidad" min="1" value="1" required>
                                    </div>
                                </div>
                                <div class="dr-form-col">
                                    <div class="dr-form-group">
                                        <label for="total" class="dr-form-label">Total (S/)</label>
                                        <input type="text" class="dr-form-control" id="total" readonly value="0.00" style="background-color: var(--dr-accent-light);">
                                    </div>
                                </div>
                            </div>

                            <div class="dr-form-actions">
                                <button type="submit" class="dr-btn dr-btn-primary">
                                    <i class="fas fa-save"></i> Registrar Pedido
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="dr-show-col" style="flex: 1;">
                <div class="dr-card">
                    <div class="dr-card-header">
                        <h2><i class="fas fa-info-circle"></i> Información</h2>
                    </div>
                    <div class="dr-card-body">
                        <ul style="list-style: none; padding: 0; margin: 0; font-size: 0.95rem; color: var(--dr-text-muted);">
                            <li style="margin-bottom: 12px;"><i class="fas fa-check dr-text-success" style="width: 20px;"></i> El stock se descuenta automáticamente</li>
                            <li style="margin-bottom: 12px;"><i class="fas fa-check dr-text-success" style="width: 20px;"></i> El total se calcula automáticamente</li>
                            <li><i class="fas fa-check dr-text-success" style="width: 20px;"></i> El pedido se crea en estado "pendiente"</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>