@extends('admin.layouts.base')

@section('title', 'دورى المناظرات | لوحة القيادة')

@section('content')
    @include('admin.partials.aside')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">

        @include('admin.partials.nav')

        <div class="container-fluid py-4">

            {{--  Close/Open The Forms  --}}
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h4 class="mb-0">غلـق وفتـح التسجيل</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-6 mb-md-0 mb-4">
                                    <div
                                        class="form-check form-switch card card-body border card-plain border-radius-lg d-flex justify-content-between align-items-center flex-row p-3 px-4" >
                                        <div class="d-flex justify-content-center align-items-center">
                                            <i class="material-icons opacity-10" style="font-size: 2rem">edit_note</i>

                                            <p class="mb-0 pe-2" style="font-size: 1.25rem; font-weight: bold">
                                                نموذج حضور
                                            </p>
                                        </div>
                                        <div>
                                            <input class="form-check-input ms-auto toggle-form" type="checkbox"
                                                   id="toggleInvitationForm" data-type="invitation" {{ $invitationFormStatus ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div
                                        class="form-check form-switch card card-body border card-plain border-radius-lg d-flex justify-content-between align-items-center flex-row p-3 px-4" >
                                        <div class="d-flex justify-content-center align-items-center">
                                            <i class="material-icons opacity-10" style="font-size: 2rem">edit_note</i>

                                            <p class="mb-0 pe-2" style="font-size: 1.25rem; font-weight: bold">
                                                نموذج تسجيل الفرق الجامعية
                                            </p>
                                        </div>
                                        <div>
                                            <input class="form-check-input ms-auto toggle-form" type="checkbox"
                                                   id="toggleStudentsForm" data-type="students" {{ $studentsFormStatus ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{--  Update Event Date Range  --}}
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h4 class="mb-0">إعدادات الحدث</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <form id="dateForm" action="{{ route('admin.eventDate') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-md-0 mb-4">
                                        <div
                                            class="form-check form-switch card card-body border card-plain border-radius-lg d-flex justify-content-between align-items-center flex-row p-3 px-4" >
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i class="material-icons opacity-10" style="font-size: 2rem">date_range</i>

                                                <label for="startRange" class="mb-0 pe-2" style="font-size: 1.25rem; font-weight: bold">
                                                    تاريخ البداية
                                                </label>
                                            </div>
                                            <div>
                                                <input type="text" id="startRange" name="startRange" class="form-control datepicker" style="direction: ltr"
                                                       placeholder="اختر تاريخ البداية" value="{{ $startRange ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="form-check form-switch card card-body border card-plain border-radius-lg d-flex justify-content-between align-items-center flex-row p-3 px-4" >
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i class="material-icons opacity-10" style="font-size: 2rem">date_range</i>

                                                <label for="startRange" class="mb-0 pe-2" style="font-size: 1.25rem; font-weight: bold">
                                                    تاريخ النهاية
                                                </label>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <input type="text" id="endRange" name="endRange" class="form-control datepicker" style="direction: ltr"
                                                       placeholder="اختر تاريخ النهاية" value="{{ $endRange ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body p-0 px-3">
                            <div class="row">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" form="dateForm" class="btn btn-info">حفظ الإعدادات</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.partials.footer')

        </div>


    </main>

@endsection
