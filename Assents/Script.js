document.addEventListener('DOMContentLoaded', function () {
    // Validación del formulario en el cliente
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
        form.addEventListener('submit', function (event) {
            let valid = true;
            const inputs = form.querySelectorAll('input[required], select[required]');

            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    valid = false;
                    input.classList.add('error');
                    const errorLabel = document.createElement('label');
                    errorLabel.classList.add('error');
                    errorLabel.textContent = 'Este campo es obligatorio';
                    input.parentNode.insertBefore(errorLabel, input.nextSibling);
                } else {
                    input.classList.remove('error');
                    if (input.nextSibling && input.nextSibling.classList.contains('error')) {
                        input.nextSibling.remove();
                    }
                }
            });

            if (!valid) {
                event.preventDefault();
            }
        });
    });
});
