<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="main-container">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-edit"></i> Editar Pedido</h4>
            <a href="index.php?controller=pedido&action=index" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-custom">
                    <form method="POST" action="index.php?controller=pedido&action=edit&id=<?php echo $pedido['id_pedido']; ?>">
                        <div class="mb-3">
                            <label for="id_cliente" class="form-label">Cliente *</label>
                            <select class="form-select" id="id_cliente" name="id_cliente" required>
                                <option value="">Seleccionar Cliente...</option>
                                <?php foreach ($clientes as $cliente): ?>
                                    <option value="<?php echo $cliente['id_cliente']; ?>" <?php echo $cliente['id_cliente'] == $pedido['id_cliente'] ? 'selected' : ''; ?>>
                                        <?php echo $cliente['nombre'] . ' ' . $cliente['apellido'] . ' - DNI: ' . $cliente['dni']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="id_producto" class="form-label">Producto *</label>
                            <select class="form-select" id="id_producto" name="id_producto" required>
                                <option value="">Seleccionar Producto...</option>
                                <?php foreach ($productos as $producto): ?>
                                    <option value="<?php echo $producto['id_producto']; ?>" data-precio="<?php echo $producto['precio']; ?>" <?php echo $producto['id_producto'] == $pedido['id_producto'] ? 'selected' : ''; ?>>
                                        <?php echo $producto['nombre_producto'] . ' - ' . formatCurrency($producto['precio']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cantidad" class="form-label">Cantidad *</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" value="<?php echo $pedido['cantidad']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="estado_pedido" class="form-label">Estado del Pedido *</label>
                                <select class="form-select" id="estado_pedido" name="estado_pedido" required>
                                    <option value="pendiente" <?php echo $pedido['estado_pedido'] === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                                    <option value="pagado" <?php echo $pedido['estado_pedido'] === 'pagado' ? 'selected' : ''; ?>>Pagado</option>
                                    <option value="enviado" <?php echo $pedido['estado_pedido'] === 'enviado' ? 'selected' : ''; ?>>Enviado</option>
                                    <option value="entregado" <?php echo $pedido['estado_pedido'] === 'entregado' ? 'selected' : ''; ?>>Entregado</option>
                                    <option value="cancelado" <?php echo $pedido['estado_pedido'] === 'cancelado' ? 'selected' : ''; ?>>Cancelado</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Total Actual</label>
                            <input type="text" class="form-control" value="<?php echo formatCurrency($pedido['total']); ?>" readonly>
                            <div class="form-text">El total se recalculará si cambia la cantidad o producto.</div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary-custom">
                                <i class="fas fa-save"></i> Actualizar Pedido
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>