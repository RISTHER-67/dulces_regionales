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

    const flashMessages = document.querySelectorAll('.alert');
    flashMessages.forEach(message => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(message);
            bsAlert.close();
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
});