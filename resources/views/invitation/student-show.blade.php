@extends('invitation.layouts.app')

@section('content')

    <div class="container pb-5">
        <div class="form-container mx-auto" style="max-width: 700px;">
            <div class="mb-5 separator">
                <div class="row">
                    <div
                        class="col-md-4 d-flex justify-content-center align-items-center order-2 order-md-1 mb-4 mb-md-0">
                        <h1 style="font-weight: bold;">
                            بيانات دعوة المشارك
                        </h1>
                    </div>
                    <div class="col-md-8 order-1 order-md-2 d-flex justify-content-center">
                        <img src="{{ asset('images/public.png') }}" class="img-fluid zoom-image image-smaller">
                    </div>
                </div>
            </div>



            <!-- Display General Information -->
            <div class="card mb-4">
                <div class="card-header text-center">
                    <h3>تفاصيل الدعوة</h3>
                </div>
                <div class="card-body d-flex flex-column align-items-center">
                    <!-- Personal Photo -->
                    @if ($student->personal_photo)
                        <img src="{{ asset('storage/' . $student->personal_photo) }}" alt="صورة العضو"
                             class="img-thumbnail student-photo mb-3" style="width: 120px; height: 120px;">
                    @else
                        <img src="{{ asset('images/default-profile.png') }}" alt="صورة افتراضية"
                             class="img-thumbnail student-photo mb-3" style="width: 120px; height: 120px;">
                    @endif

                    <!-- Student Information -->
                    <p><strong>الاسم:</strong> {{ $student->first_name }} {{ $student->second_name }} {{ $student->sur_name }}</p>
                    <p><strong>الجنس:</strong> {{ $student->gender === null ? '' : ($student->gender ? 'أنثى' : 'ذكر') }}</p>
                    <p><strong>رقم الهوية:</strong> {{ $student->national_id }}</p>
                    <p><strong>البريد الإلكتروني:</strong> {{ $student->email }}</p>
                    <p><strong>رقم الهاتف:</strong> {{ $student->phone_number }}</p>
                    <p><strong>الفئة العمرية:</strong> {{ $student->age_range }}</p>
                    <p><strong>سنة الدراسة:</strong> {{ $student->study_year_program }}</p>
                    <p><strong>الخبرة:</strong> {{ $student->experience ?? 'لا يوجد' }}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
