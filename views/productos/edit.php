<?php include_once __DIR__ . '/../layouts/header.php'; ?>
<?php include_once __DIR__ . '/../layouts/navbar.php'; ?>

<div class="dr-layout-main">
    <?php include_once __DIR__ . '/../layouts/sidebar.php'; ?>
    
    <div class="dr-content">
        <div class="dr-page-header-content">
            <h4><i class="fas fa-box-edit"></i> Editar Producto</h4>
            <a href="index.php?controller=producto&action=index" class="dr-btn dr-btn-outline">
                <i class="fas fa-arrow-left"></i> Volver
            </a>
        </div>

        <div class="dr-card">
            <div class="dr-card-body">
                <div class="form-custom">
                    <form method="POST" action="index.php?controller=producto&action=edit&id=<?php echo $producto['id_producto']; ?>">
                        <div class="dr-form-row">
                            <div class="dr-form-col">
                                <div class="dr-form-group">
                                    <label for="nombre_producto" class="dr-form-label">Nombre del Producto *</label>
                                    <input type="text" class="dr-form-control" id="nombre_producto" name="nombre_producto" value="<?php echo htmlspecialchars($producto['nombre_producto']); ?>" required>
                                </div>
                            </div>
                            <div class="dr-form-col">
                                <div class="dr-form-group">
                                    <label for="categoria" class="dr-form-label">Categoría *</label>
                                    <select class="dr-form-select" id="categoria" name="categoria" required>
                                        <option value="">Seleccionar...</option>
                                        <option value="Café" <?php echo $producto['categoria'] === 'Café' ? 'selected' : ''; ?>>Café</option>
                                        <option value="Cacao" <?php echo $producto['categoria'] === 'Cacao' ? 'selected' : ''; ?>>Cacao</option>
                                        <option value="Miel" <?php echo $producto['categoria'] === 'Miel' ? 'selected' : ''; ?>>Miel</option>
                                        <option value="Textiles" <?php echo $producto['categoria'] === 'Textiles' ? 'selected' : ''; ?>>Textiles</option>
                                        <option value="Artesanías" <?php echo $producto['categoria'] === 'Artesanías' ? 'selected' : ''; ?>>Artesanías</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="dr-form-row">
                            <div class="dr-form-col">
                                <div class="dr-form-group">
                                    <label for="region_origen" class="dr-form-label">Región de Origen</label>
                                    <input type="text" class="dr-form-control" id="region_origen" name="region_origen" value="<?php echo htmlspecialchars($producto['region_origen']); ?>">
                                </div>
                            </div>
                            <div class="dr-form-col">
                                <div class="dr-form-group">
                                    <label for="precio" class="dr-form-label">Precio (S/) *</label>
                                    <input type="number" class="dr-form-control" id="precio" name="precio" step="0.01" min="0" value="<?php echo htmlspecialchars($producto['precio']); ?>" required>
                                </div>
                            </div>
                            <div class="dr-form-col">
                                <div class="dr-form-group">
                                    <label for="stock" class="dr-form-label">Stock</label>
                                    <input type="number" class="dr-form-control" id="stock" name="stock" min="0" value="<?php echo htmlspecialchars($producto['stock']); ?>">
                                </div>
                            </div>
                        </div>

                        <div class="dr-form-group">
                            <label for="descripcion" class="dr-form-label">Descripción</label>
                            <textarea class="dr-form-textarea" id="descripcion" name="descripcion" rows="3"><?php echo htmlspecialchars($producto['descripcion']); ?></textarea>
                        </div>

                        <div class="dr-form-actions">
                            <button type="submit" class="dr-btn dr-btn-primary">
                                <i class="fas fa-save"></i> Actualizar Producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>