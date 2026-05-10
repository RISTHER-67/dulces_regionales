<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="dr-layout-main">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <main class="dr-content fade-in">
        <div class="dr-page-header">
            <h1 class="dr-page-title"><i class="fas fa-users"></i> Gestión de Clientes</h1>
            <a href="index.php?controller=cliente&action=create" class="dr-btn dr-btn-primary">
                <i class="fas fa-plus"></i> Nuevo Cliente
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
                        <input type="hidden" name="controller" value="cliente">
                        <input type="hidden" name="action" value="index">
                        <div class="dr-input-icon-wrapper">
                            <i class="fas fa-search dr-input-icon"></i>
                            <input type="text" class="dr-input dr-input-with-icon" name="search" placeholder="Buscar por nombre, apellido o DNI..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        </div>
                        <?php if(isset($_GET['search']) && $_GET['search']): ?>
                            <a href="index.php?controller=cliente&action=index" class="dr-btn dr-btn-outline">Limpiar</a>
                        <?php endif; ?>
                        <button type="submit" class="dr-btn dr-btn-primary">Buscar</button>
                    </form>
                </div>

                <div class="dr-table-wrapper">
                    <table class="dr-table">
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
                                        <td><?php echo htmlspecialchars($cliente['nombre']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['apellido']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['dni']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['telefono']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['correo']); ?></td>
                                        <td><?php echo htmlspecialchars($cliente['direccion']); ?></td>
                                        <td>
                                            <div class="dr-action-buttons">
                                                <a href="index.php?controller=cliente&action=show&id=<?php echo $cliente['id_cliente']; ?>" class="dr-btn-icon dr-btn-info" title="Ver">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="index.php?controller=cliente&action=edit&id=<?php echo $cliente['id_cliente']; ?>" class="dr-btn-icon dr-btn-warning" title="Editar">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="index.php?controller=cliente&action=delete&id=<?php echo $cliente['id_cliente']; ?>" class="dr-btn-icon dr-btn-danger" title="Eliminar" onclick="return confirm('¿Está seguro de eliminar este cliente?');">
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
                                            <p>No hay clientes registrados</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>