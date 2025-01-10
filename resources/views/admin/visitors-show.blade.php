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
                                <h6>تفاصيل الزائر</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-2">

                        <div style="color: #344767;">
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
                                <p><strong>نوع البطاقة:</strong> {{ $invitation->card_type ? 'جواز السفر' : 'بطاقة الهوية الوطنية/ الإقامة' }}</p>
                            @endisset
                            <p><strong>{{ $invitation->card_type ? 'رقم جواز السفر' : 'رقم الهوية الوطنية/ الإقامة' }}:</strong> {{ $invitation->national_id }}</p>
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
                            <p><strong>حضور:</strong> {{ $invitation->attended ? 'نعم' : 'لا' }}</p>
                            @if($invitation->attended)
                                <p><strong>أيام الحضور:</strong> {{ implode(', ', $invitation->attendance_dates ?? []) }}</p>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
