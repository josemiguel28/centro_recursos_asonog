import mostrarDocumentos from '../showMoreDocuments/UI.js';

async function filterDocumentsByTematicaAPI(tematica) {
    try {
        const url = `/api/filter-documents-by-tematica?tematica=${encodeURIComponent(tematica)}`;
        const resultado = await fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (!resultado.ok) {
            throw new Error(`HTTP error! status: ${resultado.status}`);
        }
        const data = await resultado.json();

        mostrarDocumentos(data, true); // Llama a la función para mostrar los documentos

    } catch (e) {
        console.log(e);
    }
}

export { filterDocumentsByTematicaAPI };
