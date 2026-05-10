<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="main-container">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-box"></i> Gestión de Productos</h4>
            <a href="index.php?controller=producto&action=create" class="btn btn-primary-custom">
                <i class="fas fa-plus"></i> Nuevo Producto
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
                                <input type="text" class="form-control" id="searchInput" placeholder="Buscar por nombre o categoría..." value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                                <?php if(isset($_GET['search']) && $_GET['search']): ?>
                                    <a href="index.php?controller=producto&action=index" class="btn btn-outline-secondary">Limpiar</a>
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
                                <th>Categoría</th>
                                <th>Región</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($productos) > 0): ?>
                                <?php foreach ($productos as $producto): ?>
                                    <tr>
                                        <td><?php echo $producto['id_producto']; ?></td>
                                        <td><?php echo $producto['nombre_producto']; ?></td>
                                        <td><span class="badge bg-secondary"><?php echo $producto['categoria']; ?></span></td>
                                        <td><?php echo $producto['region_origen']; ?></td>
                                        <td><?php echo formatCurrency($producto['precio']); ?></td>
                                        <td>
                                            <?php if ($producto['stock'] < 10): ?>
                                                <span class="badge bg-danger"><?php echo $producto['stock']; ?></span>
                                            <?php else: ?>
                                                <span class="badge bg-success"><?php echo $producto['stock']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="action-buttons">
                                            <a href="index.php?controller=producto&action=show&id=<?php echo $producto['id_producto']; ?>" class="btn btn-sm btn-info" title="Ver">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="index.php?controller=producto&action=edit&id=<?php echo $producto['id_producto']; ?>" class="btn btn-sm btn-warning" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="index.php?controller=producto&action=delete&id=<?php echo $producto['id_producto']; ?>" class="btn btn-sm btn-danger btn-delete" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        <i class="fas fa-inbox fa-2x mb-2"></i>
                                        <p class="mb-0">No hay productos registrados</p>
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