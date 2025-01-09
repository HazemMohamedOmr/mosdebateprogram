@extends('admin.layouts.base')

@section('title', 'دورى المناظرات | المجموعات')

@section('content')
    @include('admin.partials.aside')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg overflow-x-hidden">

        @include('admin.partials.nav')


        <div class="m-2 my-sm-4 ms-sm-4 me-sm-3">
            <div class="">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col d-flex flex-wrap justify-content-between align-items-center">
                                <h6 class="" style="direction: ltr;">
                                    <span>{{ $date }}</span>
                                    <span>حضور الجامعات في يوم</span>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="team-tab"
                                        data-bs-toggle="tab" data-bs-target="#team"
                                        type="button" role="tab" aria-controls="team"
                                        aria-selected="true">قائدي المجموعات</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="student-tab"
                                        data-bs-toggle="tab" data-bs-target="#student"
                                        type="button" role="tab" aria-controls="student"
                                        aria-selected="false">الطلاب</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="team" role="tabpanel" aria-labelledby="team-tab">
                                @include('admin.team.register-statistics.leader')
                            </div>
                            <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="student-tab">
                                @include('admin.team.register-statistics.students')
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>

@endsection
