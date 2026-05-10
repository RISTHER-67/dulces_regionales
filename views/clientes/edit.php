<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="main-container">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-user-edit"></i> Editar Cliente</h4>
            <a href="index.php?controller=cliente&action=index" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-custom">
                    <form method="POST" action="index.php?controller=cliente&action=edit&id=<?php echo $cliente['id_cliente']; ?>">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Nombre *</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $cliente['nombre']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apellido" class="form-label">Apellido *</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $cliente['apellido']; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="dni" class="form-label">DNI *</label>
                                <input type="text" class="form-control" id="dni" name="dni" maxlength="8" value="<?php echo $cliente['dni']; ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" maxlength="9" value="<?php echo $cliente['telefono']; ?>">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $cliente['correo']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <textarea class="form-control" id="direccion" name="direccion" rows="2"><?php echo $cliente['direccion']; ?></textarea>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary-custom">
                                <i class="fas fa-save"></i> Actualizar Cliente
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>