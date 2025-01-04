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
                                    {{ $visitors }}
                                </h4>
                            </div>
                        </div>
                        <div class="card-footer p-1">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-lg-0 mb-4">
                    <div class="card h-100">
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
                        <div class="card-footer p-1">
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.partials.footer')

        </div>


    </main>

@endsection
