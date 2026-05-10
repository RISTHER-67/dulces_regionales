<?php include_once __DIR__ . '/../layouts/header.php'; ?>

<div class="dr-auth-wrapper fade-in">
    <div class="dr-auth-card">
        <div class="dr-auth-header">
            <div class="dr-auth-logo">
                <i class="fas fa-cookie-bite"></i>
            </div>
            <h2>Dulces Regionales</h2>
            <p>Doña Solina</p>
        </div>
        
        <div class="dr-auth-body">
            <?php $flash = getFlash('error'); ?>
            <?php if ($flash): ?>
                <div class="dr-alert dr-alert-danger">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $flash['message']; ?>
                </div>
            <?php endif; ?>

            <?php $flashSuccess = getFlash('success'); ?>
            <?php if ($flashSuccess): ?>
                <div class="dr-alert dr-alert-success">
                    <i class="fas fa-check-circle"></i> <?php echo $flashSuccess['message']; ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="index.php?controller=auth&action=login" class="dr-auth-form">
                <div class="dr-input-group">
                    <label for="correo" class="dr-label">Correo Electrónico</label>
                    <div class="dr-input-icon-wrapper">
                        <i class="fas fa-envelope dr-input-icon"></i>
                        <input type="email" class="dr-input dr-input-with-icon" id="correo" name="correo" required placeholder="correo@ejemplo.com">
                    </div>
                </div>
                
                <div class="dr-input-group">
                    <label for="contrasena" class="dr-label">Contraseña</label>
                    <div class="dr-input-icon-wrapper">
                        <i class="fas fa-lock dr-input-icon"></i>
                        <input type="password" class="dr-input dr-input-with-icon" id="contrasena" name="contrasena" required placeholder="••••••••">
                    </div>
                </div>
                
                <button type="submit" class="dr-btn dr-btn-primary dr-btn-full">
                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                </button>
            </form>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>