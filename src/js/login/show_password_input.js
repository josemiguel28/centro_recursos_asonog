const passwordInput = document.getElementById('password');
const togglePasswordButton = document.getElementById('togglePassword');
const icon = togglePasswordButton.querySelector('i'); // Selecciona el ícono dentro del botón

togglePasswordButton.addEventListener('click', function () {
    // Cambiar el tipo de input entre 'password' y 'text'
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Cambiar el ícono
    icon.classList.toggle('fa-eye'); // Ojo visible
    icon.classList.toggle('fa-eye-slash'); // Ojo tachado
});