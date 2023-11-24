document.addEventListener('keyup', e => {
    if (e.target.matches('#proveedor')) {
        const valorBuscado = e.target.value.toLowerCase();

        document.querySelectorAll('.pro').forEach(emple => {
            const textoEmpleado = emple.textContent.toLowerCase();
            const fila = emple.closest('tr');

            // Comprobar si el texto del empleado incluye el valor buscado
            if (textoEmpleado.includes(valorBuscado)) {
                fila.classList.remove('filtro');
               
            } else {
                fila.classList.add('filtro');
               
            }
        });
    }
});

document.addEventListener('keyup', e => {
    if (e.target.matches('#producto')) {
        const valorBuscado = e.target.value.toLowerCase();

        document.querySelectorAll('.pr').forEach(emple => {
            const textoEmpleado = emple.textContent.toLowerCase();
            const fila = emple.closest('tr');

            // Comprobar si el texto del empleado incluye el valor buscado
            if (textoEmpleado.includes(valorBuscado)) {
                fila.classList.remove('filtro');
               
            } else {
                fila.classList.add('filtro');
               
            }
        });
    }
});


document.addEventListener('keyup', e => {
    if (e.target.matches('#precio')) {
        const valorBuscado = e.target.value.toLowerCase();

        document.querySelectorAll('.pre').forEach(emple => {
            const textoEmpleado = emple.textContent.toLowerCase();
            const fila = emple.closest('tr');

            // Comprobar si el texto del empleado incluye el valor buscado
            if (textoEmpleado.includes(valorBuscado)) {
                fila.classList.remove('filtro');
               
            } else {
                fila.classList.add('filtro');
               
            }
        });
    }
});
