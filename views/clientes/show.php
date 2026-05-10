<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="dr-layout-main">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <main class="dr-content fade-in">
        <div class="dr-page-header">
            <h1 class="dr-page-title"><i class="fas fa-user"></i> Detalles del Cliente</h1>
            <a href="index.php?controller=cliente&action=index" class="dr-btn dr-btn-outline">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="dr-grid-panels">
            <div class="dr-card">
                <div class="dr-card-header">
                    <h2><i class="fas fa-info-circle"></i> Información del Cliente</h2>
                </div>
                <div class="dr-card-body">
                    <table class="dr-table-details">
                        <tr>
                            <th>ID:</th>
                            <td><?php echo $cliente['id_cliente']; ?></td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td><?php echo htmlspecialchars($cliente['nombre']); ?></td>
                        </tr>
                        <tr>
                            <th>Apellido:</th>
                            <td><?php echo htmlspecialchars($cliente['apellido']); ?></td>
                        </tr>
                        <tr>
                            <th>DNI:</th>
                            <td><?php echo htmlspecialchars($cliente['dni']); ?></td>
                        </tr>
                        <tr>
                            <th>Teléfono:</th>
                            <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
                        </tr>
                        <tr>
                            <th>Correo:</th>
                            <td><?php echo htmlspecialchars($cliente['correo']); ?></td>
                        </tr>
                        <tr>
                            <th>Dirección:</th>
                            <td><?php echo htmlspecialchars($cliente['direccion']); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="dr-card">
                <div class="dr-card-header">
                    <h2><i class="fas fa-cogs"></i> Acciones</h2>
                </div>
                <div class="dr-card-body">
                    <div class="dr-action-stack">
                        <a href="index.php?controller=cliente&action=edit&id=<?php echo $cliente['id_cliente']; ?>" class="dr-btn dr-btn-warning dr-btn-full">
                            <i class="fas fa-edit"></i> Editar Cliente
                        </a>
                        <a href="index.php?controller=cliente&action=delete&id=<?php echo $cliente['id_cliente']; ?>" class="dr-btn dr-btn-danger dr-btn-full" onclick="return confirm('¿Está seguro de eliminar este cliente?');">
                            <i class="fas fa-trash"></i> Eliminar Cliente
                        </a>
                        <a href="index.php?controller=cliente&action=index" class="dr-btn dr-btn-outline dr-btn-full">
                            <i class="fas fa-list"></i> Ver Todos los Clientes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>