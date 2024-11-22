function mostrarDocumentos(data, limpiar = false) {
    const contenedordocumentos = document.querySelector('.contenedor-documentos');

    // Si `limpiar` es true, vacía el contenedor antes de agregar nuevos documentos
    if (limpiar) {
        contenedordocumentos.innerHTML = '';
        const mensaje = document.querySelector('.mensaje');
        if (mensaje) {
            mensaje.remove(); // Elimina el mensaje si existe
        }
    }

    const documentos = data.documentos;
    const hasMoreBooks = data.hasMoreBooks; // Obtener si hay más documentos
    let id = 0;

    hideShowMoreButton(hasMoreBooks);


    documentos.forEach(documento => {

        if (id !== documento.id) {

            const libroDiv = document.createElement('div');
            libroDiv.className = 'w-full mb-7 max-w-sm bg-white flex flex-col justify-between sm:max-w-xs';
            libroDiv.innerHTML = `
    <a href="/documentos/${documento.archivo_url}" class="flex justify-center p-4 sm:p-8" target="_blank" style="background-color: #FCFCF7;">
        <img class="rounded-xl" loading="lazy" src="imagenesDocumentos/${documento.imagen}" alt="hero img">
    </a>
    <div class="flex flex-col justify-between h-full px-3 sm:px-5 pb-3 sm:pb-5">
        <a href="/documentos/${documento.archivo_url}" target="_blank">
            <h5 class="text-lg sm:text-xl font-semibold tracking-tight text-gray-900 dark:text-white line-clamp-4">
                ${documento.nombre_herramienta}
            </h5>
        </a>
        <div class="flex items-center mt-2.5 mb-4 sm:mb-5">
            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                <div class="flex items-center space-x-1 px-2 rtl:space-x-reverse">
                    <span class="text-gray-400">${documento.fecha_emision}</span>
                </div>
                <div class="flex items-start space-x-1 rtl:space-x-reverse px-2 py-1 rounded-[1rem] bg-secondary-500 max-w-[120px]">
                    <p class="text-xs sm:text-sm text-white truncate overflow-hidden text-ellipsis whitespace-nowrap">
                        ${documento.tipo_herramienta}
                    </p>
                </div>

            </div>
        </div>
    </div>
    <div class="flex items-center justify-end px-3 sm:px-5 pb-3 sm:pb-5">
        <a href="/documentos/${documento.archivo_url}" target="_blank" class="text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium py-3 px-6 rounded-full text-center w-full">
            Visualizar
        </a>
    </div>
`;
            contenedordocumentos.appendChild(libroDiv);
        }

        id = documento.id;
    });
}

function hideShowMoreButton(hasMoreBooks) {
    const btnMostrarMas = document.querySelector('#mostrar-mas-documentos-btn');

    if (!hasMoreBooks) {
        btnMostrarMas.classList.add('hidden');
        const contenedor = document.querySelector('.contenedor');
        const mensaje = document.createElement('p');
        mensaje.className = 'text-center text-gray-500 mensaje';
        mensaje.textContent = 'No hay más documentos para mostrar';
        contenedor.appendChild(mensaje); // Muestra el mensaje al final
    } else {
        btnMostrarMas.classList.remove('hidden');
    }
}

export default mostrarDocumentos;
