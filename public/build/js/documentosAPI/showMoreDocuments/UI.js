function mostrarDocumentos(e,t=!1){const n=document.querySelector(".contenedor-documentos");if(t){n.innerHTML="";const e=document.querySelector(".mensaje");e&&e.remove()}const o=e.documentos,s=e.hasMoreBooks;let r=0;hideShowMoreButton(s),o.forEach((e=>{if(r!=e.id){const t=document.createElement("div");t.className="w-full mb-7 max-w-sm bg-white border border-gray-200 rounded-lg shadow flex flex-col justify-between",t.innerHTML=`\n            <a href="/documentos/${e.archivo_url}" class="flex justify-center" target=_blank>\n  \n                   <img class="p-8 rounded-t-lg" loading="lazy" src="imagenesDocumentos/${e.imagen}" alt="hero img">\n         \n            </a>\n            <div class="flex flex-col justify-between h-full px-5 pb-5">\n                <a href="/documentos/${e.archivo_url}" target=_blank >\n                    <h5 class="text-xl font-semibold tracking-tight text-gray-900">${e.nombre_herramienta}</h5>\n                </a>\n                \n            <div class="flex items-center mt-2.5 gap-5">\n                  <div class="flex items-center space-x-1 rtl:space-x-reverse">\n                        <span class="text-gray-400">${e.fecha_emision}</span>\n                  </div>\n                  <div class="flex items-start space-x-1 rtl:space-x-reverse px-2.5 py-1 rounded-[1rem] bg-secondary-500">\n                        <p class="text-sm text-white">${e.tipo_herramienta}</p>\n                  </div>\n            </div>\n            \n            </div>\n            <div class="flex items-center justify-end px-5 pb-5">\n                <a href="/documentos/${e.archivo_url}" target=_blank class="text-white bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ver recurso</a>\n            </div>\n        `,n.appendChild(t)}r=e.id}))}function hideShowMoreButton(e){const t=document.querySelector("#mostrar-mas-documentos-btn");if(e)t.classList.remove("hidden");else{t.classList.add("hidden");const e=document.querySelector(".contenedor"),n=document.createElement("p");n.className="text-center text-gray-500 mensaje",n.textContent="No hay más documentos para mostrar",e.appendChild(n)}}export default mostrarDocumentos;