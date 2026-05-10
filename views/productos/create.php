<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="main-container">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="content">
        <div class="page-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-box-plus"></i> Nuevo Producto</h4>
            <a href="index.php?controller=producto&action=index" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="form-custom">
                    <form method="POST" action="index.php?controller=producto&action=create">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre_producto" class="form-label">Nombre del Producto *</label>
                                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="categoria" class="form-label">Categoría *</label>
                                <select class="form-select" id="categoria" name="categoria" required>
                                    <option value="">Seleccionar...</option>
                                    <option value="Café">Café</option>
                                    <option value="Cacao">Cacao</option>
                                    <option value="Miel">Miel</option>
                                    <option value="Textiles">Textiles</option>
                                    <option value="Artesanías">Artesanías</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="region_origen" class="form-label">Región de Origen</label>
                                <input type="text" class="form-control" id="region_origen" name="region_origen">
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="precio" class="form-label">Precio (S/) *</label>
                                <input type="number" class="form-control" id="precio" name="precio" step="0.01" min="0" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" min="0" value="0">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary-custom">
                                <i class="fas fa-save"></i> Guardar Producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>