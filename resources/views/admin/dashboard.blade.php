@extends('admin.layouts.base')

@section('title', 'دورى المناظرات | لوحة القيادة')

@section('content')
    @include('admin.partials.aside')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">

        @include('admin.partials.nav')

        <div class="container-fluid py-4">

            {{--  Statistics About The Forms  --}}
            <div class="row d-flex justify-content-md-center">
                <div class="col-lg-4 col-sm-6 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">leaderboard</i>
                            </div>
                            <div class="text-start pt-1">
                                <p class="text-lg mb-0">الزائرين</p>
                                <h4 class="mb-0">
                                    {{--                                <span class="text-danger text-sm font-weight-bolder ms-1">-2%</span>--}}
                                    {{ $visitors }}
                                </h4>
                            </div>
                        </div>
                        {{--                    <hr class="dark horizontal my-0">--}}
                        <div class="card-footer p-1">
                            {{--                        <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+5%--}}
                            {{--                                </span>من الشهر الماضي</p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">groups</i>
                            </div>
                            <div class="text-start pt-1">
                                <p class="text-lg mb-0">الفرق الجماعية</p>
                                <h4 class="mb-0">{{ $groups }}</h4>
                            </div>
                        </div>
                        {{--                    <hr class="dark horizontal my-0">--}}
                        <div class="card-footer p-1">
                            {{--                        <p class="mb-0 text-start"><span class="text-success text-sm font-weight-bolder ms-1">+7%--}}
                            {{--                                </span>مقارنة بيوم أمس</p>--}}
                        </div>
                    </div>
                </div>
            </div>

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
