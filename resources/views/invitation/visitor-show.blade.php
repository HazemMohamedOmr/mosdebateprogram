@extends('invitation.layouts.app')

@section('content')

    <div class="container pb-5">
        <div class="form-container mx-auto" style="max-width: 700px;">
            <div class="mb-5 separator">
                <div class="row">
                    <div
                        class="col-md-4 d-flex justify-content-center align-items-center order-2 order-md-1 mb-4 mb-md-0">
                        <h1 style="font-weight: bold;">
                            @if ($invitation->type === 0)
                                بيانات دعوة الزائر
                            @else
                                بيانات دعوة المشارك
                            @endif
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
                    @if ($invitation->type === 0)
                        <h3>بيانات الدعوة</h3>
                    @else
                        <h3> بيانات المسؤول</h3>
                    @endif

                </div>
                <div class="card-body">
                    @if ($invitation->type === 0)
                        <!-- Type 0: Display Specific Attributes -->
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <strong>الاسم:</strong> {{ $invitation->first_name }} {{ $invitation->second_name }} {{ $invitation->sur_name }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>الفئة العمرية:</strong> {{ $invitation->age_range }}</p>
                            </div>
                        </div>
                        @isset($invitation->card_type)
                            <p><strong>الجنسية:</strong> {{ $invitation->nationality }}</p>
                            <p><strong>نوع البطاقة:</strong> {{ $invitation->card_type ? 'جواز السفر' : 'بطاقة الهوية الوطنية' }}</p>
                        @endisset
                        <p><strong>{{ $invitation->card_type ? 'رقم جواز السفر' : 'رقم الهوية الوطنية' }}:</strong> {{ $invitation->national_id }}</p>
                        <p><strong>البريد الإلكتروني:</strong> {{ $invitation->email }}</p>
                        <p><strong>رقم الهاتف:</strong> {{ $invitation->phone_number }}</p>
                        @isset($invitation->region)
                            <p><strong>المنطقة:</strong> {{ $invitation->region }}</p>
                            <p><strong>المدينة:</strong> {{ $invitation->city }}</p>
                            <p><strong>المؤهلات العلمية:</strong> {{ $invitation->academic_qualifications }}</p>
                        @endisset
                        <p><strong>اسم الجامعة:</strong> {{ $invitation->university_name }}</p>
                        <p><strong>التخصص الجامعي:</strong> {{ $invitation->university_specialization }}</p>
{{--                        <p><strong>تاريخ التخرج:</strong> {{ $invitation->graduation_date }}</p>--}}
                        @if(implode(', ', json_decode($invitation->heard_about, true) ?? []))
                            <p><strong>كيف سمعت عن
                                    البرنامج:</strong> {{ implode(', ', json_decode($invitation->heard_about, true) ?? []) }}
                            </p>
                        @endif
                        @if(implode(', ', json_decode($invitation->reason_participation, true) ?? []))
                            <p><strong>سبب
                                    الحضور:</strong> {{ implode(', ', json_decode($invitation->reason_participation, true) ?? []) }}
                            </p>
                        @endif
                    @elseif ($invitation->type === 1)
                        <!-- Type 1: Display Attributes and Students -->
                        <p><strong>اسم الجامعة:</strong> {{ $invitation->university_name }}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>اسم
                                        المسؤول:</strong> {{ $invitation->first_name }} {{ $invitation->second_name }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>البريد الإلكتروني:</strong> {{ $invitation->email }}</p>
                            </div>
                        </div>
                        <p><strong>رقم الهاتف:</strong> {{ $invitation->phone_number }}</p>
                        <p><strong>التخصص الجامعي:</strong> {{ $invitation->university_specialization }}</p>
                        <p><strong>قائد الفريق:</strong> {{ $invitation->team_leader ?? 'غير محدد' }}</p>
                    @endif
                </div>
            </div>
            @if ($invitation->type === 1)
                <div class="card mb-4">
                    <div class="card-header text-center">
                        <h3>بيانات الأعضاء</h3>
                    </div>
                    <div class="card-body">
                        <!-- Display Students -->
                        <div class="row">
                            @if ($invitation->students->isNotEmpty())
                                @foreach ($invitation->students as $index => $student)
                                    <div class="col-md-6 mb-4">
                                        <div class="card">
                                            <div class="card-body text-center">
                                                <!-- Personal Photo -->
                                                @if ($student->personal_photo)
                                                    <img src="{{ asset('storage/' . $student->personal_photo) }}"
                                                         alt="صورة العضو"
                                                         class="img-thumbnail student-photo mb-3"
                                                         style="width: 120px; height: 120px;">
                                                @else
                                                    <img src="{{ asset('images/default-profile.png') }}"
                                                         alt="صورة افتراضية"
                                                         class="img-thumbnail student-photo mb-3"
                                                         style="width: 120px; height: 120px;">
                                                @endif

                                                <!-- Student Information -->
                                                <p>
                                                    <strong>الاسم:</strong> {{ $student->first_name }} {{ $student->second_name }} {{ $student->sur_name }}
                                                </p>
                                                <p>
                                                    <strong>الجنس:</strong> {{ $student->gender === null ? '' : ($student->gender ? 'أنثى' : 'ذكر') }}
                                                </p>
                                                <p><strong>رقم الهوية:</strong> {{ $student->national_id }}</p>
                                                <p><strong>البريد الإلكتروني:</strong> {{ $student->email }}</p>
                                                <p><strong>رقم الهاتف:</strong> {{ $student->phone_number }}</p>
                                                <p><strong>الفئة العمرية:</strong> {{ $student->age_range }}</p>
                                                <p><strong>سنة الدراسة:</strong> {{ $student->study_year_program }}</p>
                                                <p><strong>الخبرة:</strong> {{ $student->experience ?? 'لا يوجد' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center">لا توجد تفاصيل للطلاب.</p>
                            @endif
                        </div>

                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
