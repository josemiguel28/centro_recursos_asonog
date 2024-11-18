import mostrarLibros from '../showMoreBooks/UI.js';

async function filterBooksByCategoryAPI(category, offset) {
    try {
        const url = `/api/filter-books-by-category?categoria=${encodeURIComponent(category)}&offset=${offset}`;
        const resultado = await fetch(url, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        });

        if (!resultado.ok) {
            throw new Error(`HTTP error! status: ${resultado.status}`);
        }
        const data = await resultado.json();

        mostrarLibros(data, true); // Llama a la función para mostrar los libros

    } catch (e) {
        console.error(e);
    }
}

export {filterBooksByCategoryAPI};
