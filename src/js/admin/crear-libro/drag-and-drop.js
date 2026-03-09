const dropzone = document.getElementById('dropzone');
const inputFile = document.getElementById('dropzone-file');
const filePreview = document.getElementById('file-preview');
const hiddenPdfInput = document.getElementById('pdf-filename');

// El endpoint de subida/borrado se lee del atributo data del dropzone.
// Por defecto apunta al endpoint de libros (retrocompatible con formulario_libros.php).
const uploadUrl = dropzone.dataset.uploadUrl || '/api/libros/upload-pdf';
const deleteUrl  = dropzone.dataset.deleteUrl  || '/api/libros/delete-pdf';

let uploadedFilename = null;
let isUploading = false;
let isNewlyUploaded = false; // Para distinguir archivos nuevos de los existentes

// Inicializar: si ya existe un archivo en modo UPDATE, mostrar el estado
document.addEventListener('DOMContentLoaded', () => {
    if (hiddenPdfInput && hiddenPdfInput.value) {
        uploadedFilename = hiddenPdfInput.value;
        showExistingFileState(uploadedFilename);
    }
});

// Evitar el comportamiento por defecto de abrir el archivo
dropzone.addEventListener('dragover', (event) => {
    event.preventDefault();
    if (!isUploading) {
        dropzone.classList.add('border-blue-500', 'bg-blue-50');
    }
});

dropzone.addEventListener('dragleave', (event) => {
    event.preventDefault();
    dropzone.classList.remove('border-blue-500', 'bg-blue-50');
});

dropzone.addEventListener('drop', (event) => {
    event.preventDefault();
    dropzone.classList.remove('border-blue-500', 'bg-blue-50');

    if (isUploading) return;

    // Obtener los archivos arrastrados
    const files = event.dataTransfer.files;
    
    if (files.length > 0 && files[0].type === 'application/pdf') {
        uploadFile(files[0]);
    } else {
        showError('Por favor, selecciona un archivo PDF válido.');
    }
});

inputFile.addEventListener('change', (event) => {
    if (isUploading) return;

    const files = event.target.files;
    
    if (files.length > 0) {
        uploadFile(files[0]);
    }
});

async function uploadFile(file) {
    // Validar tamaño (100MB)
    const maxSize = 100 * 1024 * 1024;
    if (file.size > maxSize) {
        showError('El archivo es demasiado grande. Máximo 100 MB.');
        return;
    }

    // Validar tipo
    if (file.type !== 'application/pdf') {
        showError('Solo se permiten archivos PDF.');
        return;
    }

    isUploading = true;
    showUploadingState(file.name);

    const formData = new FormData();
    formData.append('archivo', file);

    try {
        const response = await fetch(uploadUrl, {
            method: 'POST',
            body: formData
        });

        const result = await response.json();

        if (result.success) {
            uploadedFilename = result.data.filename;
            hiddenPdfInput.value = uploadedFilename;
            isNewlyUploaded = true;
            showSuccessState(file.name, result.data.size);
        } else {
            showError(result.message || 'Error al subir el archivo.');
            uploadedFilename = null;
            hiddenPdfInput.value = '';
        }
    } catch (error) {
        console.error('Error:', error);
        showError('Error de conexión. Por favor, intenta de nuevo.');
        uploadedFilename = null;
        hiddenPdfInput.value = '';
    } finally {
        isUploading = false;
    }
}

function showUploadingState(filename) {
    filePreview.innerHTML = `
        <div class="flex flex-col items-center">
            <svg class="animate-spin h-10 w-10 text-blue-500 mb-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <p class="text-sm text-blue-600 font-semibold mb-1">Subiendo archivo...</p>
            <p class="text-xs text-gray-500 max-w-xs truncate">${filename}</p>
        </div>
    `;
}

function showSuccessState(filename, filesize) {
    const size = formatFileSize(filesize);
    filePreview.innerHTML = `
        <div class="flex flex-col items-center">
            <svg class="w-12 h-12 text-green-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-sm text-green-600 font-semibold mb-1">✓ Archivo subido correctamente</p>
            <p class="text-xs text-gray-700 font-medium max-w-xs truncate mb-1">${filename}</p>
            <p class="text-xs text-gray-500">${size}</p>
            <button type="button" onclick="removeUploadedFile()" class="mt-3 text-xs text-red-600 hover:text-red-800 underline">
                Eliminar y subir otro archivo
            </button>
        </div>
    `;
}

function showExistingFileState(filename) {
    filePreview.innerHTML = `
        <div class="flex flex-col items-center">
            <svg class="w-12 h-12 text-blue-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <p class="text-sm text-blue-600 font-semibold mb-1">PDF actual guardado</p>
            <p class="text-xs text-gray-500 max-w-xs truncate mb-1">${filename}</p>
            <button type="button" onclick="resetDropzone()" class="mt-2 text-xs text-orange-600 hover:text-orange-800 underline">
                Reemplazar con otro archivo
            </button>
        </div>
    `;
}

function showError(message) {
    filePreview.innerHTML = `
        <div class="flex flex-col items-center">
            <svg class="w-12 h-12 text-red-500 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <p class="text-sm text-red-600 font-semibold mb-2">${message}</p>
            <button type="button" onclick="resetDropzone()" class="text-xs text-blue-600 hover:text-blue-800 underline">
                Intentar de nuevo
            </button>
        </div>
    `;
    inputFile.value = '';
}

function resetDropzone() {
    filePreview.innerHTML = `
        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
             xmlns="http://www.w3.org/2000/svg"
             fill="none" viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                  stroke-width="2"
                  d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
        </svg>
        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
            <span class="font-semibold">Click para subir el PDF del libro</span>
        </p>
        <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
    `;
    inputFile.value = '';
    uploadedFilename = null;
    hiddenPdfInput.value = '';
    isNewlyUploaded = false;
}

async function removeUploadedFile() {
    if (!uploadedFilename) return;

    // Solo eliminar del servidor si fue subido en esta sesión
    if (isNewlyUploaded) {
        try {
            const response = await fetch(deleteUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ filename: uploadedFilename })
            });

            const result = await response.json();
            
            if (!result.success) {
                console.error('Error al eliminar archivo:', result.message);
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }

    resetDropzone();
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
}

// Hacer la función disponible globalmente
window.removeUploadedFile = removeUploadedFile;
window.resetDropzone = resetDropzone;
