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
        libroDiv.className = 'w-full mb-7 max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between';
        libroDiv.innerHTML = `
            <a href="libros/${libro.archivo_url}" class="flex justify-center">
                   <img class="p-8 rounded-t-lg" loading="lazy" src="imagenes/${libro.imagen}" alt="hero img">
            </a>
            <div class="px-5 pb-5 flex-grow">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900">${libro.titulo}</h5>
                </a>
                
                <div class="flex items-center mt-2.5 mb-5">
                                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                        <!-- SVG estrellas -->
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                        <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                        </svg>
                                    </div>
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                                </div>
            </div>
            <div class="flex items-center justify-end px-5 pb-5">
                <a href="libros/${libro.archivo_url}" target="_blank" class="text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ver Libro</a>
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
