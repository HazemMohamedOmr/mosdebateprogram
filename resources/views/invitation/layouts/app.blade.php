<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>دوري المناظرات</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
        <link rel="icon" href="{{ asset('images/public.png') }}" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
              integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/css/intlTelInput.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">

    </head>
    <body class="primary-bg">
        <div class="container">
            @yield('content')
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        <script src="{{ asset('js/form-logic.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@25.2.0/build/js/intlTelInput.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                function initializeIntlTelInputs() {
                    // Get all phone input elements
                    const phoneInputs = document.querySelectorAll(".phone_input");

                    // Loop through each phone input and initialize intl-tel-input
                    phoneInputs.forEach((phoneInput) => {
                        const iti = intlTelInput(phoneInput, {
                            onlyCountries: ["sa"], // Include only Saudi Arabia
                            initialCountry: "sa", // Set the default country to Saudi Arabia
                            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js", // Utility functions for formatting
                            separateDialCode: true, // Show the dial code separately
                            customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
                                // Translate the placeholder to Arabic
                                return "رقم الهاتف";
                            },
                        });

                        // Example: Log the formatted phone number on blur
                        phoneInput.addEventListener("blur", () => {
                            const phoneNumber = iti.getNumber(); // E.164 format
                            console.log("Formatted Phone Number:", phoneNumber);
                        });
                    });
                }

                // Call the function to initialize inputs
                initializeIntlTelInputs();

                // Reinitialize intl-tel-input after dynamic content rendering
                document.addEventListener("content:updated", () => {
                    initializeIntlTelInputs();
                });
            })
        </script>

        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>

        <script>
            // Initialize Flatpickr with monthSelect plugin
            flatpickr(".month-year-picker", {
                plugins: [
                    new monthSelectPlugin({
                        shorthand: true, // Use shorthand month names (e.g., Jan, Feb)
                        dateFormat: "Y-m", // Format as Year-Month
                        altFormat: "F Y", // Display as Full Month and Year (e.g., January 2024)
                    }),
                ],
            });
        </script>

    </body>
</html>
