document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('invitationForm');

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
});


document.addEventListener('DOMContentLoaded', () => {
    const heardOtherCheckbox = document.getElementById('heard_other');
    const heardOtherInputContainer = document.getElementById('heardOtherInputContainer');
    const heardOtherInput = document.getElementById('heardOtherInput');

    heardOtherCheckbox.addEventListener('change', function () {
        if (this.checked) {
            heardOtherInputContainer.style.display = 'block';
        } else {
            heardOtherInputContainer.style.display = 'none';
            heardOtherInput.value = '';
        }
    });

    const reasonOtherCheckbox = document.getElementById('reason_other');
    const reasonOtherInputContainer = document.getElementById('reasonOtherInputContainer');
    const reasonOtherInput = document.getElementById('reasonOtherInput');

    reasonOtherCheckbox.addEventListener('change', function () {
        if (this.checked) {
            reasonOtherInputContainer.style.display = 'block';
        } else {
            reasonOtherInputContainer.style.display = 'none';
            reasonOtherInput.value = '';
        }
    });

    // Add dynamic inputs to the form on submission
    const form = document.getElementById('invitationForm');
    form.addEventListener('submit', function () {
        if (heardOtherCheckbox.checked && heardOtherInput.value.trim()) {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'heard_about[]';
            hiddenInput.value = heardOtherInput.value.trim();
            form.appendChild(hiddenInput);
        }

        if (reasonOtherCheckbox.checked && reasonOtherInput.value.trim()) {
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'reason_participation[]';
            hiddenInput.value = reasonOtherInput.value.trim();
            form.appendChild(hiddenInput);
        }
    });
});
