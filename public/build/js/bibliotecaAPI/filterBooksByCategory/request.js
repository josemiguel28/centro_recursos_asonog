import mostrarLibros from"../showMoreBooks/UI.js";async function filterBooksByCategoryAPI(o,t){try{const r=`/api/filter-books-by-category?categoria=${encodeURIComponent(o)}&offset=${t}`,e=await fetch(r,{headers:{"X-Requested-With":"XMLHttpRequest"}});if(!e.ok)throw new Error(`HTTP error! status: ${e.status}`);const s=await e.json();mostrarLibros(s,!0)}catch(o){console.log(o)}}export{filterBooksByCategoryAPI};