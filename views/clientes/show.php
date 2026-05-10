<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="main-container">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-user"></i> Detalles del Cliente</h4>
            <a href="index.php?controller=cliente&action=index" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Información del Cliente</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th width="35%">ID:</th>
                                <td><?php echo $cliente['id_cliente']; ?></td>
                            </tr>
                            <tr>
                                <th>Nombre:</th>
                                <td><?php echo $cliente['nombre']; ?></td>
                            </tr>
                            <tr>
                                <th>Apellido:</th>
                                <td><?php echo $cliente['apellido']; ?></td>
                            </tr>
                            <tr>
                                <th>DNI:</th>
                                <td><?php echo $cliente['dni']; ?></td>
                            </tr>
                            <tr>
                                <th>Teléfono:</th>
                                <td><?php echo $cliente['telefono']; ?></td>
                            </tr>
                            <tr>
                                <th>Correo:</th>
                                <td><?php echo $cliente['correo']; ?></td>
                            </tr>
                            <tr>
                                <th>Dirección:</th>
                                <td><?php echo $cliente['direccion']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card card-custom">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Acciones</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="index.php?controller=cliente&action=edit&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Editar Cliente
                            </a>
                            <a href="index.php?controller=cliente&action=delete&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-danger btn-delete">
                                <i class="fas fa-trash"></i> Eliminar Cliente
                            </a>
                            <a href="index.php?controller=cliente&action=index" class="btn btn-outline-secondary">
                                <i class="fas fa-list"></i> Ver Todos los Clientes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>