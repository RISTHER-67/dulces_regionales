<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="dr-layout-main">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="dr-content fade-in">
        <div class="dr-page-header-content">
            <h4><i class="fas fa-shopping-bag"></i> Detalles del Pedido</h4>
            <a href="index.php?controller=pedido&action=index" class="dr-btn dr-btn-outline">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="dr-show-row">
            <div class="dr-show-col">
                <div class="dr-card">
                    <div class="dr-card-header">
                        <h2>Información del Pedido</h2>
                    </div>
                    <div class="dr-card-body" style="padding: 0;">
                        <table class="dr-table-details" style="width: 100%; border-collapse: collapse;">
                            <tr>
                                <th style="padding: 15px 25px; width: 40%;">ID Pedido:</th>
                                <td style="padding: 15px 25px;"><?php echo htmlspecialchars($pedido['id_pedido']); ?></td>
                            </tr>
                            <tr>
                                <th style="padding: 15px 25px;">Fecha:</th>
                                <td style="padding: 15px 25px;"><?php echo date('d/m/Y H:i', strtotime($pedido['fecha_pedido'])); ?></td>
                            </tr>
                            <tr>
                                <th style="padding: 15px 25px;">Estado:</th>
                                <td style="padding: 15px 25px;"><span class="dr-badge dr-badge-<?php echo getStatusClass($pedido['estado_pedido']); ?>"><?php echo ucfirst($pedido['estado_pedido']); ?></span></td>
                            </tr>
                            <tr>
                                <th style="padding: 15px 25px;">Producto:</th>
                                <td style="padding: 15px 25px;"><?php echo htmlspecialchars($pedido['nombre_producto']); ?></td>
                            </tr>
                            <tr>
                                <th style="padding: 15px 25px;">Precio Unitario:</th>
                                <td style="padding: 15px 25px;"><?php echo formatCurrency($pedido['precio_unitario']); ?></td>
                            </tr>
                            <tr>
                                <th style="padding: 15px 25px;">Cantidad:</th>
                                <td style="padding: 15px 25px;"><?php echo htmlspecialchars($pedido['cantidad']); ?></td>
                            </tr>
                            <tr>
                                <th style="padding: 15px 25px; border-bottom: none;">Total:</th>
                                <td style="padding: 15px 25px; border-bottom: none;"><strong class="dr-text-success" style="font-size: 1.25rem;"><?php echo formatCurrency($pedido['total']); ?></strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="dr-show-col">
                <div class="dr-card" style="margin-bottom: 25px;">
                    <div class="dr-card-header">
                        <h2>Información del Cliente</h2>
                    </div>
                    <div class="dr-card-body" style="padding: 0;">
                        <table class="dr-table-details" style="width: 100%; border-collapse: collapse;">
                            <tr>
                                <th style="padding: 15px 25px; width: 40%;">Nombre:</th>
                                <td style="padding: 15px 25px;"><?php echo htmlspecialchars($pedido['cliente_nombre'] . ' ' . $pedido['cliente_apellido']); ?></td>
                            </tr>
                            <tr>
                                <th style="padding: 15px 25px;">DNI:</th>
                                <td style="padding: 15px 25px;"><?php echo htmlspecialchars($pedido['cliente_dni']); ?></td>
                            </tr>
                            <tr>
                                <th style="padding: 15px 25px; border-bottom: none;">Teléfono:</th>
                                <td style="padding: 15px 25px; border-bottom: none;"><?php echo htmlspecialchars($pedido['cliente_telefono']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="dr-card">
                    <div class="dr-card-header">
                        <h2>Acciones</h2>
                    </div>
                    <div class="dr-card-body">
                        <div style="display: flex; gap: 10px; margin-bottom: 20px;">
                            <a href="index.php?controller=pedido&action=edit&id=<?php echo $pedido['id_pedido']; ?>" class="dr-btn dr-btn-warning" style="flex: 1;">
                                <i class="fas fa-edit"></i> Editar Pedido
                            </a>
                            <a href="index.php?controller=pedido&action=delete&id=<?php echo $pedido['id_pedido']; ?>" class="dr-btn dr-btn-danger btn-delete" style="flex: 1;">
                                <i class="fas fa-trash"></i> Eliminar
                            </a>
                        </div>
                        
                        <div style="border-top: 1px solid var(--dr-accent-light); padding-top: 20px;">
                            <div style="color: var(--dr-text-muted); font-size: 0.9rem; margin-bottom: 10px;">Cambiar Estado:</div>
                            <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                                <a href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=pendiente" class="dr-btn dr-btn-sm dr-btn-outline" style="border-color: var(--dr-warning); color: var(--dr-warning);">Pendiente</a>
                                <a href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=pagado" class="dr-btn dr-btn-sm dr-btn-outline" style="border-color: var(--dr-info); color: var(--dr-info);">Pagado</a>
                                <a href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=enviado" class="dr-btn dr-btn-sm dr-btn-outline" style="border-color: var(--dr-primary); color: var(--dr-primary);">Enviado</a>
                                <a href="index.php?controller=pedido&action=updateStatus&id=<?php echo $pedido['id_pedido']; ?>&estado=entregado" class="dr-btn dr-btn-sm dr-btn-outline" style="border-color: var(--dr-success); color: var(--dr-success);">Entregado</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>