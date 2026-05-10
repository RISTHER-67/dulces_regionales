<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="dr-layout-main">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <main class="dr-content fade-in">
        <div class="dr-page-header">
            <h1 class="dr-page-title"><i class="fas fa-box-plus"></i> Nuevo Producto</h1>
            <a href="index.php?controller=producto&action=index" class="dr-btn dr-btn-outline">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="dr-card">
            <div class="dr-card-body">
                <form method="POST" action="index.php?controller=producto&action=create" class="dr-form">
                    <div class="dr-form-row">
                        <div class="dr-form-group">
                            <label for="nombre_producto" class="dr-label">Nombre del Producto *</label>
                            <input type="text" class="dr-input" id="nombre_producto" name="nombre_producto" required>
                        </div>
                        <div class="dr-form-group">
                            <label for="categoria" class="dr-label">Categoría *</label>
                            <select class="dr-input" id="categoria" name="categoria" required>
                                <option value="">Seleccionar...</option>
                                <option value="Café">Café</option>
                                <option value="Cacao">Cacao</option>
                                <option value="Miel">Miel</option>
                                <option value="Textiles">Textiles</option>
                                <option value="Artesanías">Artesanías</option>
                            </select>
                        </div>
                    </div>

                    <div class="dr-form-row">
                        <div class="dr-form-group">
                            <label for="region_origen" class="dr-label">Región de Origen</label>
                            <input type="text" class="dr-input" id="region_origen" name="region_origen">
                        </div>
                        <div class="dr-form-group">
                            <label for="precio" class="dr-label">Precio (S/) *</label>
                            <input type="number" class="dr-input" id="precio" name="precio" step="0.01" min="0" required>
                        </div>
                        <div class="dr-form-group">
                            <label for="stock" class="dr-label">Stock</label>
                            <input type="number" class="dr-input" id="stock" name="stock" min="0" value="0">
                        </div>
                    </div>

                    <div class="dr-form-group">
                        <label for="descripcion" class="dr-label">Descripción</label>
                        <textarea class="dr-input" id="descripcion" name="descripcion" rows="3"></textarea>
                    </div>

                    <div class="dr-form-actions">
                        <button type="submit" class="dr-btn dr-btn-primary">
                            <i class="fas fa-save"></i> Guardar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>