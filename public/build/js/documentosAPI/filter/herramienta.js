import mostrarDocumentos from"../showMoreDocuments/UI.js";async function filterDocumentsByHerramientaAPI(t,e){try{const o=`/api/filter-documents-by-herramienta?herramienta=${encodeURIComponent(t)}&offset=${e}`,r=await fetch(o,{headers:{"X-Requested-With":"XMLHttpRequest"}});if(!r.ok)throw new Error(`HTTP error! status: ${r.status}`);const s=await r.json();mostrarDocumentos(s,!0)}catch(t){console.log(t)}}export{filterDocumentsByHerramientaAPI};