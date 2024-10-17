import {CargarMasLibrosAPI} from './bibliotecaAPI/showMoreBooks/request.js';
import {filterBooksByCategoryAPI} from './bibliotecaAPI/filterBooksByCategory/request.js';
import {CargarMasDocumentosAPI} from "./documentosAPI/showMoreDocuments/request.js";

let offset = 0; // Inicializa el offset

document.addEventListener('DOMContentLoaded', function () {
    //iniciarApp();
    console.log('DOM cargado');

    // Obtener todas las secciones con el atributo data-section
    const sections = document.querySelectorAll('[data-section]');

    sections.forEach(section => {
        const sectionType = section.getAttribute('data-section');

        // Verifica el tipo de sección y ejecuta la función correspondiente
        if (sectionType === 'biblioteca') {
            biblioteca();
            filtrarLibroPorCategoria();
        }

        if (sectionType === 'documentos') {
            documentos();
        }
    });
});

async function biblioteca() {
    //manda a llamar la api para mostrar mas libros en la pagina de biblioteca
    document.querySelector('#mostrar-mas-btn').addEventListener('click', async () => {

        offset += 10; // numero de libros que se manda a llamar
        await CargarMasLibrosAPI(offset);
    });
}

async function filtrarLibroPorCategoria() {
    //manda a llamar la api para filtrar los libros en la pagina de biblioteca
    document.querySelector('#filtersContent1').addEventListener('input', async (e) => {

        let categoria = e.target.value;

        if (categoria == 'todos') {
            window.location.reload();
        }

        await filterBooksByCategoryAPI(categoria, offset); // Llama a la API con el nuevo offset
    });
}

async function documentos() {

    document.querySelector('#mostrar-mas-documentos-btn').addEventListener('click', async () => {

        offset += 10; // numero de libros que se manda a llamar
        await CargarMasDocumentosAPI(offset);
    });

}
