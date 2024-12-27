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
                        <div class="row mb-3">
                            <div class="col">
                                <h6>المشاريع</h6>
                                <p class="text-sm">
                                    <i class="fa fa-check text-info" aria-hidden="true"></i>
                                    <span class="font-weight-bold ms-1">30 انتهى</span> هذا الشهر
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        المشروع</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        أعضاء</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ميزانية</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        إكمال</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-xd.svg"
                                                     class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Material XD الإصدار</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Ryan Tompson">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Romina Hadid">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Alexander Smith">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Jessica Doe">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-4.jpg">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $14,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">60%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60"
                                                     role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-atlassian.svg"
                                                     class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">أضف مسار التقدم إلى التطبيق الداخلي
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Romina Hadid">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Jessica Doe">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-4.jpg">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $3,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">10%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-10"
                                                     role="progressbar" aria-valuenow="10" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-slack.svg"
                                                     class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إصلاح أخطاء النظام الأساسي</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Romina Hadid">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Jessica Doe">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-1.jpg">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> غير مضبوط </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success w-100"
                                                     role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-spotify.svg"
                                                     class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إطلاق تطبيق الهاتف المحمول الخاص بنا
                                                </h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Ryan Tompson">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-4.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Romina Hadid">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Alexander Smith">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-4.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Jessica Doe">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-1.jpg">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $20,500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success w-100"
                                                     role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-jira.svg"
                                                     class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">أضف صفحة التسعير الجديدة</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Ryan Tompson">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-4.jpg">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">25%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-25"
                                                     role="progressbar" aria-valuenow="25" aria-valuemin="0"
                                                     aria-valuemax="25"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{{ asset('assets') }}/img/small-logos/logo-invision.svg"
                                                     class="avatar avatar-sm ms-3">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">إعادة تصميم متجر جديد على الإنترنت</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Ryan Tompson">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                               data-bs-toggle="tooltip" data-bs-placement="bottom"
                                               title="Jessica Doe">
                                                <img alt="Image placeholder"
                                                     src="{{ asset('assets') }}/img/team-4.jpg">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $2,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">40%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-40"
                                                     role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                     aria-valuemax="40"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
