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

        if (id != documento.id) {

            const libroDiv = document.createElement('div');
            libroDiv.className = 'w-full mb-7 max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between';
            libroDiv.innerHTML = `
            <a href="/documentos/${documento.archivo_url}" class="flex justify-center">
  
                   <img class="p-8 rounded-t-lg" loading="lazy" src="imagenesDocumentos/${documento.imagen}" alt="hero img">
         
            </a>
            <div class="flex flex-col justify-between h-full px-5 pb-5">
                <a href="/documentos/${documento.archivo_url}">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900">${documento.nombre_herramienta}</h5>
                </a>
                
            <div class="flex items-center mt-2.5 gap-5">
                  <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        <span class="text-gray-400">${documento.fecha_emision}</span>
                  </div>
                  <div class="flex items-start space-x-1 rtl:space-x-reverse px-2.5 py-1 rounded-[1rem] bg-secondary-500">
                        <p class="text-sm text-white">${documento.tipo_herramienta}</p>
                  </div>
            </div>
            
            </div>
            <div class="flex items-center justify-end px-5 pb-5">
                <a href="/documentos/${documento.archivo_url}" class="text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ver recurso</a>
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
