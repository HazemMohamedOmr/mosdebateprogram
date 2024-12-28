@extends('invitation.layouts.app')

@section('content')


    <div class="d-flex justify-content-center align-items-center vh-100">
        <img src="{{ asset('images/public.png') }}" alt="Logo">
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                imageUrl: "{{ asset('images/public.png') }}",
                imageWidth: 200,
                title: 'غير مسموح',
                text: 'عذرا يجب عليك تسجيل الدخول اولا',
                confirmButtonText: 'حسنًا',
                didOpen: () => {
                    // Add transform scale effect using CSS
                    const image = document.querySelector('.swal2-image');
                    if (image) {
                        image.style.transform = 'scale(1.7)';
                    }
                }
            });
        });
    </script>


@endsection

