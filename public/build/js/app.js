import{CargarMasLibrosAPI}from"./bibliotecaAPI/showMoreBooks/request.js";import{filterBooksByCategoryAPI}from"./bibliotecaAPI/filterBooksByCategory/request.js";import{CargarMasDocumentosAPI}from"./documentosAPI/showMoreDocuments/request.js";import{filterDocumentsByTematicaAPI}from"./documentosAPI/filter/tematica.js";import{filterDocumentsByHerramientaAPI}from"./documentosAPI/filter/herramienta.js";let offset=0;async function biblioteca(){document.querySelector("#mostrar-mas-btn").addEventListener("click",(async()=>{offset+=10,await CargarMasLibrosAPI(offset)}))}async function filtrarLibroPorCategoria(){document.querySelector("#filtersContent1").addEventListener("input",(async t=>{let o=t.target.value;"todos"===o&&window.location.reload(),await filterBooksByCategoryAPI(o,offset)}))}async function documentos(){document.querySelector("#mostrar-mas-documentos-btn").addEventListener("click",(async()=>{offset+=10,await CargarMasDocumentosAPI(offset)}))}async function filtrarLibroPorTematica(){document.querySelector("#filtersContent2").addEventListener("input",(async t=>{let o=t.target.value;"todos"===o&&window.location.reload(),await filterDocumentsByTematicaAPI(o,offset)}))}async function filtrarLibroPorHerramienta(){document.querySelector("#filtersContent1").addEventListener("input",(async t=>{let o=t.target.value;"todos"===o&&window.location.reload(),await filterDocumentsByHerramientaAPI(o,offset)}))}document.addEventListener("DOMContentLoaded",(async function(){console.log("DOM cargado");const t=document.querySelectorAll("[data-section]");for(const o of t){const t=o.getAttribute("data-section");try{"biblioteca"===t&&(await biblioteca(),await filtrarLibroPorCategoria()),"documentos"===t&&(await documentos(),await filtrarLibroPorTematica(),await filtrarLibroPorHerramienta())}catch(o){console.error(`Error in section "${t}":`,o)}}}));