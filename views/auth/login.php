<?php include_once __DIR__ . '/../layouts/header.php'; ?>

<div class="login-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="login-card">
                    <div class="login-header">
                        <i class="fas fa-cookie-bite"></i>
                        <h2>Dulces Regionales</h2>
                        <p class="mb-0">Doña Solina</p>
                    </div>
                    <div class="login-body">
                        <?php $flash = getFlash('error'); ?>
                        <?php if ($flash): ?>
                            <div class="alert alert-danger alert-custom alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle"></i> <?php echo $flash['message']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <?php $flashSuccess = getFlash('success'); ?>
                        <?php if ($flashSuccess): ?>
                            <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle"></i> <?php echo $flashSuccess['message']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="index.php?controller=auth&action=login">
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo Electrónico</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="correo" name="correo" required placeholder="correo@ejemplo.com">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="contrasena" name="contrasena" required placeholder="••••••••">
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary-custom btn-lg">
                                    <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>