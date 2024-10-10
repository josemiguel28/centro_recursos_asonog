import mostrarLibros from './UI.js';
async function consultarAPI(offset) {
    try {
        const url = `/api/get-paginated-books?offset=${offset}`;

        const resultado = await fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (!resultado.ok) {
            throw new Error(`HTTP error! status: ${resultado.status}`);
        }
        const data = await resultado.json();

        mostrarLibros(data); // Llama a la función para mostrar los libros

    } catch (e) {
        console.log(e);
    }
}
export {consultarAPI};
