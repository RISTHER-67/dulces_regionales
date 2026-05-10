<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="main-container">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-cart-plus"></i> Nuevo Pedido</h4>
            <a href="index.php?controller=pedido&action=index" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-custom">
                    <form method="POST" action="index.php?controller=pedido&action=create" id="pedidoForm">
                        <div class="mb-3">
                            <label for="id_cliente" class="form-label">Cliente *</label>
                            <select class="form-select" id="id_cliente" name="id_cliente" required>
                                <option value="">Seleccionar Cliente...</option>
                                <?php foreach ($clientes as $cliente): ?>
                                    <option value="<?php echo $cliente['id_cliente']; ?>">
                                        <?php echo $cliente['nombre'] . ' ' . $cliente['apellido'] . ' - DNI: ' . $cliente['dni']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_producto" class="form-label">Producto *</label>
                            <select class="form-select" id="id_producto" name="id_producto" required>
                                <option value="" data-precio="0">Seleccionar Producto...</option>
                                <?php foreach ($productos as $producto): ?>
                                    <option value="<?php echo $producto['id_producto']; ?>" data-precio="<?php echo $producto['precio']; ?>" data-stock="<?php echo $producto['stock']; ?>">
                                        <?php echo $producto['nombre_producto'] . ' - ' . formatCurrency($producto['precio']) . ' (Stock: ' . $producto['stock'] . ')'; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-text">Solo se muestran productos con stock disponible.</div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cantidad" class="form-label">Cantidad *</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" value="1" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="total" class="form-label">Total (S/)</label>
                                <input type="text" class="form-control" id="total" readonly value="0.00">
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary-custom">
                                <i class="fas fa-save"></i> Registrar Pedido
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-custom">
                    <div class="card-header bg-white">
                        <h6 class="mb-0"><i class="fas fa-info-circle"></i> Información</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0 small">
                            <li class="mb-2"><i class="fas fa-check text-success"></i> El stock se descuenta automáticamente</li>
                            <li class="mb-2"><i class="fas fa-check text-success"></i> El total se calcula automáticamente</li>
                            <li><i class="fas fa-check text-success"></i> El pedido se crea en estado "pendiente"</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>