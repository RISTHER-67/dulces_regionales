<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="main-container">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-users"></i> Gestión de Clientes</h4>
            <a href="index.php?controller=cliente&action=create" class="btn btn-primary-custom">
                <i class="fas fa-plus"></i> Nuevo Cliente
            </a>
        </div>

        <?php $flash = getFlash('success'); ?>
        <?php if ($flash): ?>
            <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> <?php echo $flash['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php $flashError = getFlash('error'); ?>
        <?php if ($flashError): ?>
            <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle"></i> <?php echo $flashError['message']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card card-custom">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="search-box">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="searchInput" placeholder="Buscar por nombre, apellido o DNI..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                                <?php if(isset($_GET['search']) && $_GET['search']): ?>
                                    <a href="index.php?controller=cliente&action=index" class="btn btn-outline-secondary">Limpiar</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>DNI</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Dirección</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($clientes) > 0): ?>
                                <?php foreach ($clientes as $cliente): ?>
                                    <tr>
                                        <td><?php echo $cliente['id_cliente']; ?></td>
                                        <td><?php echo $cliente['nombre']; ?></td>
                                        <td><?php echo $cliente['apellido']; ?></td>
                                        <td><?php echo $cliente['dni']; ?></td>
                                        <td><?php echo $cliente['telefono']; ?></td>
                                        <td><?php echo $cliente['correo']; ?></td>
                                        <td><?php echo $cliente['direccion']; ?></td>
                                        <td class="action-buttons">
                                            <a href="index.php?controller=cliente&action=show&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-sm btn-info" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="index.php?controller=cliente&action=edit&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-sm btn-warning" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="index.php?controller=cliente&action=delete&id=<?php echo $cliente['id_cliente']; ?>" class="btn btn-sm btn-danger btn-delete" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-2x mb-2"></i>
                                        <p class="mb-0">No hay clientes registrados</p>
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