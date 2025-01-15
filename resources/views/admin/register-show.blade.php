@extends('admin.layouts.base')

@section('title', 'دورى المناظرات | الزائرين')

@section('content')
    @include('admin.partials.aside')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">

        @include('admin.partials.nav')

        <div class="m-2 my-sm-4 ms-sm-4 me-sm-3">
            <div class="">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row mb-3">
                            <div class="col">
                                <h6>تفاصيل الجامعات</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-2">

                        <div style="color: #344767;">
                            <p><strong>اسم الجامعة:</strong> {{ $invitation->university_name }}</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><strong>اسم المسؤول:</strong> {{ $invitation->first_name }} {{ $invitation->second_name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>البريد الإلكتروني:</strong> {{ $invitation->email }}</p>
                                </div>
                            </div>
                            <p><strong>رقم الهاتف:</strong> {{ $invitation->phone_number }}</p>
                            <p><strong>التخصص الجامعي:</strong> {{ $invitation->university_specialization }}</p>
                            <p><strong>قائد الفريق:</strong> {{ $invitation->team_leader ?? 'غير محدد' }}</p>
                            <p><strong>حالة الدعوة</strong> {{ $invitation->is_invited ? 'تم الدعوة' : 'لم يتم الدعوة' }}</p>
                            <p><strong>حضور:</strong> {{ $invitation->attended ? 'نعم' : 'لا' }}</p>
                            @if($invitation->attended)
                                <p><strong>أيام الحضور:</strong> {{ implode(', ', $invitation->attendance_dates ?? []) }}</p>
                            @endif
                            <p><strong>رابط الدعوة:</strong>
                                <a href="{{ route('visitor-invitation-qrcode', ['uuid' => $invitation->invitation_key]) }}"
                                   style="color: #e91e63; text-decoration: underline; font-weight: bold; transition: color 0.3s ease;"
                                   class="text-center" target="_blank">
                                    {{ $invitation->invitation_key }}
                                </a>
                            </p>


                            <div class="row">
                                @if ($invitation->students->isNotEmpty())
                                    @foreach ($invitation->students as $index => $student)
                                        <div class="col-md-6 mb-4">
                                            <div class="card">
                                                <div class="card-body text-center">
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
                                                    <p><strong>حالة الدعوة</strong> {{ $student->is_invited ? 'تم الدعوة' : 'لم يتم الدعوة' }}</p>
                                                    <p><strong>حضور:</strong> {{ $student->attend ? 'نعم' : 'لا' }}</p>
                                                    @if($student->attend)
                                                        <p><strong>أيام الحضور:</strong> {{ implode(', ', $student->attendance_dates ?? []) }}</p>
                                                    @endif
                                                    @if($student->is_invited)
                                                        <p><strong>رابط الدعوة:</strong>
                                                            <a href="{{ route('team-invitation-qrcode', ['uuid' => $student->invitation_key]) }}"
                                                               style="color: #e91e63; text-decoration: underline; font-weight: bold; transition: color 0.3s ease; display: block"
                                                               target="_blank">
                                                                {{ $student->invitation_key }}
                                                            </a>
                                                        </p>
                                                    @endif
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
                </div>
            </div>
        </div>

    </main>

@endsection
