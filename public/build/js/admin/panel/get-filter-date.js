async function getAppointmentsWithFilter(t){try{const r=`http://localhost:3000/api/admin/appointment?filtro-fecha=${t}`,e=await fetch(r);if(!e.ok)throw new Error(`HTTP error! status: ${e.status}`);return await e.json()}catch(t){return console.error("Error fetching appointments:",t),[]}}export default getAppointmentsWithFilter;