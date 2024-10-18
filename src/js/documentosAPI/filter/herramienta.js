import mostrarDocumentos from '../showMoreDocuments/UI.js';

async function filterDocumentsByHerramientaAPI(herramienta, offset) {
    try {
        const url = `/api/filter-documents-by-herramienta?herramienta=${encodeURIComponent(herramienta)}&offset=${offset}`;
        const resultado = await fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (!resultado.ok) {
            throw new Error(`HTTP error! status: ${resultado.status}`);
        }
        const data = await resultado.json();

        mostrarDocumentos(data, true); // Llama a la función para mostrar los libros

    } catch (e) {
        console.log(e);
    }
}

export { filterDocumentsByHerramientaAPI };
