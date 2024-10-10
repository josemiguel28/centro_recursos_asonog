function mostrarLibros(data) {
    const contenedorLibros = document.querySelector('.contenedor-libros');

    const libros = data.libros; // Get the books from the data
    const hasMoreBooks = data.hasMoreBooks; // Get the hasMoreBooks from the data

    hideShowMoreButton(hasMoreBooks);

    libros.forEach(libro => {
        const libroDiv = document.createElement('div');
        libroDiv.className = 'w-full mb-7 max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between';
        libroDiv.innerHTML = `
            <a href="/libros/ver?id=${libro.id}" class="flex justify-center">
                <picture>
                   <source srcset="build/img/img.webp" type="image/webp">
                   <source srcset="build/img/img.jpg" type="image/jpeg">
                   <img class="p-8 rounded-t-lg" loading="lazy" src="build/img/img.png" alt="hero img">
                </picture>
            </a>
            <div class="px-5 pb-5 flex-grow">
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900">${libro.titulo}</h5>
                </a>
            </div>
            <div class="flex items-center justify-end px-5 pb-5">
                <a href="/libros/ver?id=${libro.id}" class="text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ver Libro</a>
            </div>
        `;
        contenedorLibros.appendChild(libroDiv); // Append to the end of the container
    });
}

function hideShowMoreButton(hasMoreBooks) {
    // Hide the button if there are no more books
    if (!hasMoreBooks) {
        document.querySelector('#mostrar-mas-btn').classList.add('hidden');
        const contenedor = document.querySelector('.contenedor'); // Ensure the container exists
        const mensaje = document.createElement('p');
        mensaje.className = 'text-center text-gray-500';
        mensaje.textContent = 'No hay más libros para mostrar';
        contenedor.appendChild(mensaje); // Agrega el mensaje al contenedor
    }
}
export default mostrarLibros;