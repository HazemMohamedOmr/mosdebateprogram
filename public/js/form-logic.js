document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('invitationForm');
    if(form){
        form.addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent the form from submitting immediately
            let isValid = true;

            // Validate each input field
            form.querySelectorAll('input, select').forEach((input) => {
                if(!(input.classList.contains('reason_participation') || input.classList.contains('heard_about'))){
                    if (!input.checkValidity()) {
                        isValid = false;
                        input.classList.add('is-invalid');
                    } else {
                        input.classList.remove('is-invalid');
                        input.classList.add('is-valid');
                    }
                }
            });

            // If all inputs are valid, submit the form
            if (isValid) {
                form.submit();
            }
        });
        // Real-time validation
        form.querySelectorAll('input, select').forEach((input) => {
            input.addEventListener('input', () => {
                if (input.checkValidity()) {
                    input.classList.remove('is-invalid');
                    input.classList.add('is-valid');
                } else {
                    input.classList.remove('is-valid');
                    input.classList.add('is-invalid');
                }
            });
        });

        const heardOtherCheckbox = document.getElementById('heard_other');
        const heardOtherInputContainer = document.getElementById('heardOtherInputContainer');
        const heardOtherInput = document.getElementById('heardOtherInput');

        heardOtherCheckbox.addEventListener('change', function () {
            if (this.checked) {
                heardOtherInputContainer.style.display = 'block';
                heardOtherInput.setAttribute('name', 'heard_about[]'); // Add `name` when visible
            } else {
                heardOtherInputContainer.style.display = 'none';
                heardOtherInput.removeAttribute('name'); // Remove `name` when hidden
                heardOtherInput.value = '';
            }
        });

        const reasonOtherCheckbox = document.getElementById('reason_other');
        const reasonOtherInputContainer = document.getElementById('reasonOtherInputContainer');
        const reasonOtherInput = document.getElementById('reasonOtherInput');

        reasonOtherCheckbox.addEventListener('change', function () {
            if (this.checked) {
                reasonOtherInputContainer.style.display = 'block';
                reasonOtherInput.setAttribute('name', 'reason_participation[]'); // Add `name` when visible
            } else {
                reasonOtherInputContainer.style.display = 'none';
                reasonOtherInput.removeAttribute('name'); // Remove `name` when hidden
                reasonOtherInput.value = '';
            }
        });

        form.addEventListener('submit', (event) => {
            // Ensure inputs without valid values are excluded
            if (!heardOtherCheckbox.checked || !heardOtherInput.value.trim()) {
                heardOtherInput.removeAttribute('name'); // Ensure it's not submitted
            }

            if (!reasonOtherCheckbox.checked || !reasonOtherInput.value.trim()) {
                reasonOtherInput.removeAttribute('name'); // Ensure it's not submitted
            }
        });
    }
});
