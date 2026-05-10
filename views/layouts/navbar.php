<header class="dr-navbar">
    <div class="dr-navbar-brand">
        <a href="index.php?controller=home&action=dashboard">
            <img src="/dulces_regionales/imagenes/logo.png" alt="Logo Doña Solina" class="dr-navbar-logo">
            <span>Doña Solina</span>
        </a>
    </div>
    
    <div class="dr-navbar-menu">
        <div class="dr-dropdown">
            <button class="dr-dropdown-toggle">
                <i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['nombre_usuario']); ?>
                <i class="fas fa-chevron-down dr-dropdown-icon"></i>
            </button>
            <div class="dr-dropdown-menu">
                <div class="dr-dropdown-item dr-dropdown-text">
                    <strong>Rol:</strong> <?php echo htmlspecialchars($_SESSION['rol']); ?>
                </div>
                <div class="dr-dropdown-divider"></div>
                <a class="dr-dropdown-item dr-text-danger" href="index.php?controller=auth&action=logout">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </a>
            </div>
        </div>
    </div>
</header>