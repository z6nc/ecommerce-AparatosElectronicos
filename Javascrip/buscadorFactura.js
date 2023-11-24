document.addEventListener('keyup', e => {
    if (e.target.matches('#codigo')) {
        const valorBuscado = e.target.value.toLowerCase();

        document.querySelectorAll('.id').forEach(emple => {
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

        document.querySelectorAll('.article').forEach(emple => {
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
    if (e.target.matches('#monto')) {
        const valorBuscado = e.target.value.toLowerCase();

        document.querySelectorAll('.m').forEach(emple => {
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
