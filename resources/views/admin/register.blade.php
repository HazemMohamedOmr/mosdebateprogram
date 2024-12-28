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
                                <h6>المجموعات</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th style="width: 20%;"
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        الاسم
                                    </th>
                                    <th style="width: 20%;"
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        البريد الالكتروني
                                    </th>
                                    <th style="width: 20%;"
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        الجامعة و التخصص
                                    </th>
                                    <th style="width: 20%;"
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        رقم الهاتف
                                    </th>
                                    <th style="width: 20%;"
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        خيارات
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invitations as $invitation)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $invitation->first_name . ' ' . $invitation->second_name . ' ' . $invitation->sur_name }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-xs font-weight-bold">  {{ $invitation->email }} </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="text-xs font-weight-bold">  {{ $invitation->university_name . ' - ' . $invitation->university_specialization }} </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span
                                                class="text-xs font-weight-bold">  {{ $invitation->phone_number }} </span>
                                        </td>
                                        <td class="align-middle">

                                            <div class="d-flex justify-content-center">
                                                <a class=""
                                                   href="{{ route('admin.register.show', ['id' => $invitation->id]) }}">
                                                    <i class="material-icons opacity-10">visibility</i>
                                                </a>

                                                <a class="mx-2" href="#" data-bs-toggle="modal"
                                                   data-bs-target="#exampleModal-{{$invitation->id}}">
                                                    <i class="material-icons opacity-10">mail</i>
                                                </a>
                                            </div>

                                            @include('admin.register-invite-modal')

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{ $invitations->links() }}

                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
