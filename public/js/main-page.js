document.addEventListener('click', function (e) {
    if (e.target.id === 'register-button')
        window.location.href = '/src/views/register.php';
    if (e.target.id === 'login-button')
        window.location.href = '/src/views/login.php';
});
