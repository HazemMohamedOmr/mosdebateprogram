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
                                <div class="col-md-4">
                                    <p><strong>الاسم:</strong> {{ $invitation->first_name }} {{ $invitation->second_name }} {{ $invitation->sur_name }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>الفئة العمرية:</strong> {{ $invitation->age_range }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>رقم الهوية الوطنية:</strong> {{ $invitation->national_id }}</p>
                                </div>
                            </div>
                            <p><strong>البريد الإلكتروني:</strong> {{ $invitation->email }}</p>
                            <p><strong>رقم الهاتف:</strong> {{ $invitation->phone_number }}</p>
                            <p><strong>اسم الجامعة:</strong> {{ $invitation->university_name }}</p>
                            <p><strong>التخصص الجامعي:</strong> {{ $invitation->university_specialization }}</p>
                            <p><strong>تاريخ التخرج:</strong> {{ $invitation->graduation_date }}</p>
                            <p><strong>كيف سمعت عن البرنامج:</strong> {{ implode(', ', json_decode($invitation->heard_about, true) ?? []) }}</p>
                            <p><strong>سبب الحضور:</strong> {{ implode(', ', json_decode($invitation->reason_participation, true) ?? []) }}</p>
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
