document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.btn-delete');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!confirm('¿Está seguro de que desea eliminar este registro?')) {
                e.preventDefault();
            }
        });
    });

    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                const url = new URL(window.location.href);
                url.searchParams.set('search', this.value);
                window.location.href = url.toString();
            }
        });
    }

    const flashMessages = document.querySelectorAll('.dr-alert');
    flashMessages.forEach(message => {
        setTimeout(() => {
            message.style.opacity = '0';
            message.style.transform = 'translateY(-10px)';
            message.style.transition = 'all 0.5s ease';
            setTimeout(() => message.remove(), 500);
        }, 5000);
    });

    const cantidadInput = document.getElementById('cantidad');
    const productoSelect = document.getElementById('id_producto');
    const totalInput = document.getElementById('total');

    function calculateTotal() {
        if (productoSelect && cantidadInput && totalInput) {
            const selectedOption = productoSelect.options[productoSelect.selectedIndex];
            const precio = selectedOption ? parseFloat(selectedOption.dataset.precio) || 0 : 0;
            const cantidad = parseInt(cantidadInput.value) || 0;
            totalInput.value = (precio * cantidad).toFixed(2);
        }
    }

    if (productoSelect) {
        productoSelect.addEventListener('change', calculateTotal);
    }
    if (cantidadInput) {
        cantidadInput.addEventListener('input', calculateTotal);
    }

    // --- Lógica de Dropdowns ---
    const dropdowns = document.querySelectorAll('.dr-dropdown');
    
    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dr-btn, .dr-dropdown-toggle');
        if (!toggle) return;

        toggle.addEventListener('click', function(e) {
            e.stopPropagation();
            
            // Cerrar otros dropdowns abiertos
            dropdowns.forEach(d => {
                if (d !== dropdown) d.classList.remove('show');
            });
            
            dropdown.classList.toggle('show');
        });
    });

    // Cerrar al hacer clic fuera
    document.addEventListener('click', function() {
        dropdowns.forEach(d => d.classList.remove('show'));
    });
});