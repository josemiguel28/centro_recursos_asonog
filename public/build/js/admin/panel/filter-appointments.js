import getAppointmentsWithFilter from"./get-filter-appointments.js";function iniciarApp(){filtrarCitasPorFecha()}function filtrarCitasPorFecha(){document.querySelector("#fecha").addEventListener("change",(async function(n){const a=n.target.value;if(a){actualizarVistaConCitas(await getAppointmentsWithFilter(a))}}))}function actualizarVistaConCitas(n){const a=document.querySelector(".mostrar-citas");if(a.innerHTML="",0===n.length)return void(a.innerHTML='\n            <p class="no-citas">\n                <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24">\n                    <path fill="none" stroke="#cccccc" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 21H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v6.5M16 3v4M8 3v4m-4 4h16m2 11l-5-5m0 5l5-5" />\n                </svg>\n                <span>No hay citas para este día</span>\n            </p>\n        ');const e=document.createElement("ul");e.className="citas";let t=0,i=null,s=null;if(n.forEach((n=>{const a=parseFloat(n.precio.toString().replace(/[^0-9.-]+/g,""));if(i!==n.id){if(s){const n=document.createElement("h3");n.className="total__pagar",n.innerHTML=`Total a pagar <span id="total">${number_format(t,2)} L</span>`,s.appendChild(n)}t=0,s=document.createElement("li"),s.innerHTML=`\n            <p>ID: <span>${htmlspecialchars(n.id)}</span></p>\n            <p>Hora: <span>${htmlspecialchars(n.hora)}</span></p>\n            <p>Fecha: <span>${htmlspecialchars(n.fecha)}</span></p>\n            <p>Cliente: <span>${htmlspecialchars(n.cliente)}</span></p>\n            <p>E-mail: <span>${htmlspecialchars(n.email)}</span></p>\n            <p>Teléfono: <span>${htmlspecialchars(n.telefono)}</span></p>\n            <h3>Servicios</h3>\n        `,e.appendChild(s),i=n.id}const r=document.createElement("p");r.className="servicio",r.innerHTML=`&#10003; ${htmlspecialchars(n.servicio)} ${number_format(a,2)} L`,s.appendChild(r),t+=a})),t>0&&s){const n=document.createElement("h3");n.className="total__pagar",n.innerHTML=`Total a pagar <span id="total">${number_format(t,2)} L</span>`,s.appendChild(n)}a.appendChild(e)}function htmlspecialchars(n){const a=document.createElement("div");return a.innerText=n,a.innerHTML}function number_format(n,a=2){return parseFloat(n).toFixed(a)}document.addEventListener("DOMContentLoaded",(function(){iniciarApp()}));