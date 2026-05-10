<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="dr-layout-main">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <main class="dr-content fade-in">
        <div class="dr-page-header">
            <h1 class="dr-page-title"><i class="fas fa-user-plus"></i> Nuevo Cliente</h1>
            <a href="index.php?controller=cliente&action=index" class="dr-btn dr-btn-outline">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="dr-card">
            <div class="dr-card-body">
                <form method="POST" action="index.php?controller=cliente&action=create" class="dr-form">
                    <div class="dr-form-row">
                        <div class="dr-form-group">
                            <label for="nombre" class="dr-label">Nombre *</label>
                            <input type="text" class="dr-input" id="nombre" name="nombre" required>
                        </div>
                        <div class="dr-form-group">
                            <label for="apellido" class="dr-label">Apellido *</label>
                            <input type="text" class="dr-input" id="apellido" name="apellido" required>
                        </div>
                    </div>

                    <div class="dr-form-row">
                        <div class="dr-form-group">
                            <label for="dni" class="dr-label">DNI *</label>
                            <input type="text" class="dr-input" id="dni" name="dni" maxlength="8" required>
                        </div>
                        <div class="dr-form-group">
                            <label for="telefono" class="dr-label">Teléfono</label>
                            <input type="text" class="dr-input" id="telefono" name="telefono" maxlength="9">
                        </div>
                    </div>

                    <div class="dr-form-group">
                        <label for="correo" class="dr-label">Correo Electrónico</label>
                        <input type="email" class="dr-input" id="correo" name="correo">
                    </div>

                    <div class="dr-form-group">
                        <label for="direccion" class="dr-label">Dirección</label>
                        <textarea class="dr-input" id="direccion" name="direccion" rows="2"></textarea>
                    </div>

                    <div class="dr-form-actions">
                        <button type="submit" class="dr-btn dr-btn-primary">
                            <i class="fas fa-save"></i> Guardar Cliente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>