import {CargarMasLibrosAPI} from './bibliotecaAPI/showMoreBooks/request.js';
import {filterBooksByCategoryAPI} from './bibliotecaAPI/filterBooksByCategory/request.js';
import {CargarMasDocumentosAPI} from "./documentosAPI/showMoreDocuments/request.js";
import { filterDocumentsByTematicaAPI } from "./documentosAPI/filter/tematica.js";
import { filterDocumentsByHerramientaAPI } from "./documentosAPI/filter/herramienta.js";


let offset = 0;

document.addEventListener('DOMContentLoaded', function () {
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
            filtrarLibroPorTematica();
            filtrarLibroPorHerramienta();
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

        await filterBooksByCategoryAPI(categoria, offset);
    });
}

async function documentos() {

    document.querySelector('#mostrar-mas-documentos-btn').addEventListener('click', async () => {

        offset += 10; // numero de libros que se manda a llamar
        await CargarMasDocumentosAPI(offset);
    });

}

async function filtrarLibroPorTematica() {
    //manda a llamar la api para filtrar los libros en la pagina de biblioteca
    document.querySelector('#filtersContent2').addEventListener('input', async (e) => {

        let tematica = e.target.value;

        if (tematica == 'todos') {
            window.location.reload();
        }

        await filterDocumentsByTematicaAPI(tematica, offset);
    });
}

async function filtrarLibroPorHerramienta() {
    //manda a llamar la api para filtrar los libros en la pagina de biblioteca
    document.querySelector('#filtersContent1').addEventListener('input', async (e) => {

        let herramienta = e.target.value;

        if (herramienta == 'todos') {
            window.location.reload();
        }

        await filterDocumentsByHerramientaAPI(herramienta, offset);
    });
}
