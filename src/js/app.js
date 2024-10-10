import { consultarAPI } from './bibliotecaAPI/request.js';

let offset = 0; // Inicializa el offset

document.addEventListener('DOMContentLoaded', function () {
    iniciarApp();
    console.log('DOM cargado');
});

async function iniciarApp() {
    // Inicializa la API con el offset inicial
    //await consultarAPI(offset);
    document.querySelector('#mostrar-mas-btn').addEventListener('click', async () => {

        offset += 10; // Aumenta el offset en 10
        await consultarAPI(offset); // Llama a la API con el nuevo offset
    });
}