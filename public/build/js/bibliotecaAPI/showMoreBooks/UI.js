function mostrarLibros(e,t=!1){const s=document.querySelector(".contenedor-libros");if(t){s.innerHTML="";const e=document.querySelector(".mensaje");e&&e.remove()}const r=e.libros;hideShowMoreButton(e.hasMoreBooks),r.forEach((e=>{const t=document.createElement("div");t.className="w-full mb-7 max-w-sm bg-white flex flex-col justify-between sm:max-w-xs",t.innerHTML=`\n            <a href="libros/${e.archivo_url}" class="flex justify-center" target="_blank" style="background-color: #FCFCF7;">\n                <img class="p-4 sm:p-8" loading="lazy" src="imagenesLibros/${e.imagen}" alt="hero img">\n            </a>\n            <div class="flex flex-col justify-between h-full px-3 sm:px-5 pb-3 sm:pb-5">\n                <a href="libros/${e.archivo_url}" target="_blank">\n                    <h5 class="text-lg sm:text-xl font-semibold tracking-tight text-gray-900 dark:text-white line-clamp-4">${e.titulo}</h5>\n                </a>\n                <div class="flex items-center mt-2.5 mb-4 sm:mb-5">\n                    <div class="flex items-center space-x-1 rtl:space-x-reverse">\n                        <div class="flex items-start space-x-1 rtl:space-x-reverse px-2 py-1 rounded-[1rem] bg-secondary-500">\n                            <p class="text-xs sm:text-sm text-white max-w-[150px] truncate">${e.id_categoria}</p>\n                        </div>\n                    </div>\n                </div>\n            </div>\n            <div class="flex items-center justify-end px-3 sm:px-5 pb-3 sm:pb-5">\n                <a href="libros/${e.archivo_url}" target="_blank" class="text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none text-sm sm:text-lg py-3 px-6 rounded-full text-center w-full">Ver Libro</a>\n            </div>\n        `,s.appendChild(t)}))}function hideShowMoreButton(e){const t=document.querySelector("#mostrar-mas-btn");if(e)t.classList.remove("hidden");else{t.classList.add("hidden");const e=document.querySelector(".contenedor"),s=document.createElement("p");s.className="text-center text-gray-500 mensaje",s.textContent="No hay más libros para mostrar",e.appendChild(s)}}export default mostrarLibros;