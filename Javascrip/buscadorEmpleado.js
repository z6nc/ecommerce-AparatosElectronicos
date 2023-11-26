document.addEventListener('keyup', e => {
    if (e.target.matches('#buscador')) {
        const valorBuscado = e.target.value.toLowerCase();

        document.querySelectorAll('.articulos').forEach(emple => {
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
    if (e.target.matches('#Marca')) {
        const valorBuscado = e.target.value.toLowerCase();

        document.querySelectorAll('.articuloDos').forEach(emple => {
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
    if (e.target.matches('#stock')) {
        const valorBuscado = e.target.value.toLowerCase();

        document.querySelectorAll('.articuloTres').forEach(emple => {
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
