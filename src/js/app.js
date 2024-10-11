import { CargarMasLibrosAPI } from './bibliotecaAPI/showMoreBooks/request.js';
import { filterBooksByCategoryAPI } from './bibliotecaAPI/filterBooksByCategory/request.js';

let offset = 0; // Inicializa el offset

document.addEventListener('DOMContentLoaded', function () {
    iniciarApp();
    console.log('DOM cargado');
});

async function iniciarApp() {

    //manda a llamar la api para mostrar mas libros en la pagina de biblioteca
    document.querySelector('#mostrar-mas-btn').addEventListener('click', async () => {

        offset += 10; // numero de libros que se manda a llamar
        await CargarMasLibrosAPI(offset);
    });

    //manda a llamar la api para filtrar los libros en la pagina de biblioteca
    document.querySelector('#filtersContent1').addEventListener('input', async (e) => {
        let categoria = e.target.value;

        if(categoria == 'todos'){
            window.location.reload();
        }

        await filterBooksByCategoryAPI(categoria, offset); // Llama a la API con el nuevo offset
    });
}