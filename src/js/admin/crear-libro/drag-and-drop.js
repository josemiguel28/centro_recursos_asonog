const dropzone = document.getElementById('dropzone');
const inputFile = document.getElementById('dropzone-file');
const filePreview = document.getElementById('file-preview');

// Evitar el comportamiento por defecto de abrir el archivo
dropzone.addEventListener('dragover', (event) => {
    event.preventDefault();
});

dropzone.addEventListener('drop', (event) => {
    event.preventDefault();

    // Obtener los archivos arrastrados
    const files = event.dataTransfer.files;
    inputFile.files = files;

    showFilePreview(files[0]);
});

inputFile.addEventListener('change', (event) => {
    const files = event.target.files;

    showFilePreview(files[0]);
});

function showFilePreview(file) {
    // Limpiar contenido anterior
    filePreview.innerHTML = '';

    const fileName = document.createElement('p');
    fileName.classList.add('text-sm', 'text-gray-500', "text-center", "font-semibold", "max-w-xs", "truncate");
    fileName.textContent = `Archivo: ${file.name}`;

    filePreview.appendChild(fileName);
}
