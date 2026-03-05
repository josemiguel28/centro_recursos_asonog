import mostrarDocumentos from './UI.js';
async function CargarMasDocumentosAPI(offset) {
    try {
        const url = `/api/get-paginated-documents?offset=${offset}`;

        const resultado = await fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (!resultado.ok) {
            throw new Error(`HTTP error! status: ${resultado.status}`);
        }
        const data = await resultado.json();

        mostrarDocumentos(data); // Llama a la función para mostrar los libros

    } catch (e) {
        console.error(e);
    }
}
export {CargarMasDocumentosAPI};
