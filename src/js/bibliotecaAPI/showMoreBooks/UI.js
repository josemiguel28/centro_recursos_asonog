function mostrarLibros(data, limpiar = false) {
    const contenedorLibros = document.querySelector('.contenedor-libros');

    // Si `limpiar` es true, vacía el contenedor antes de agregar nuevos libros
    if (limpiar) {
        contenedorLibros.innerHTML = '';
        const mensaje = document.querySelector('.mensaje');
        if (mensaje) {
            mensaje.remove(); // Elimina el mensaje si existe
        }
    }

    const libros = data.libros;
    const hasMoreBooks = data.hasMoreBooks; // Obtener si hay más libros

    hideShowMoreButton(hasMoreBooks);

    libros.forEach(libro => {
        const libroDiv = document.createElement('div');
        libroDiv.className = 'w-full mb-7 max-w-sm bg-white flex flex-col justify-between sm:max-w-xs';
        libroDiv.innerHTML = `
            <a href="libros/${libro.archivo_url}" class="flex justify-center" target="_blank" style="background-color: #FCFCF7;">
                <img class="p-4 sm:p-8" loading="lazy" src="imagenesLibros/${libro.imagen}" alt="hero img">
            </a>
            <div class="flex flex-col justify-between h-full px-3 sm:px-5 pb-3 sm:pb-5">
                <a href="libros/${libro.archivo_url}" target="_blank">
                    <h5 class="text-lg sm:text-xl font-semibold tracking-tight text-gray-900 dark:text-white line-clamp-4">${libro.titulo}</h5>
                </a>
                <div class="flex items-center mt-2.5 mb-4 sm:mb-5">
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        <div class="flex items-start space-x-1 rtl:space-x-reverse px-2 py-1 rounded-[1rem] bg-secondary-500">
                            <p class="text-xs sm:text-sm text-white max-w-[150px] truncate">${libro.id_categoria}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end px-3 sm:px-5 pb-3 sm:pb-5">
                <a href="libros/${libro.archivo_url}" target="_blank" class="text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none text-sm sm:text-lg py-3 px-6 rounded-full text-center w-full">Ver Libro</a>
            </div>
        `;
        contenedorLibros.appendChild(libroDiv);
    });
}

function hideShowMoreButton(hasMoreBooks) {
    const btnMostrarMas = document.querySelector('#mostrar-mas-btn');

    if (!hasMoreBooks) {
        btnMostrarMas.classList.add('hidden');
        const contenedor = document.querySelector('.contenedor');
        const mensaje = document.createElement('p');
        mensaje.className = 'text-center text-gray-500 mensaje';
        mensaje.textContent = 'No hay más libros para mostrar';
        contenedor.appendChild(mensaje); // Muestra el mensaje al final
    } else {
        btnMostrarMas.classList.remove('hidden');
    }
}

export default mostrarLibros;
