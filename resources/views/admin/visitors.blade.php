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
                        <div class="row">
                            <div class="col d-flex flex-wrap justify-content-between align-items-center">
                                <h6 class="">الزائرين</h6>
                                <div class="ms-2">
                                    <a class="btn btn-primary btn-icon" href="{{ route('admin.visitors.exports') }}">
                                        <i class="material-icons">download</i> استخراج البيانات
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap justify-content-center align-items-center">
                                <div class="ms-2 search-fun">
                                    <form method="GET" action="{{ route('admin.visitors') }}" class="d-flex">
                                        <div class="flex-grow-1">
                                            <input type="text" name="search" class="form-control me-2 search-input" placeholder="بحث بالاسم أو البريد الإلكتروني" value="{{ request('search') }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary me-3">يحث</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th style="width: 20%;"
                                        class="text-uppercase text-secondary text-xx font-weight-bolder opacity-7">
                                        الاسم
                                    </th>
                                    <th style="width: 20%;"
                                        class="text-uppercase text-secondary text-xx font-weight-bolder opacity-7 ps-2">
                                        البريد الالكتروني
                                    </th>
                                    <th style="width: 20%;"
                                        class="text-center text-uppercase text-secondary text-xx font-weight-bolder opacity-7">
                                        الجامعة و التخصص
                                    </th>
                                    <th style="width: 20%;"
                                        class="text-center text-uppercase text-secondary text-xx font-weight-bolder opacity-7">
                                        رقم الهاتف
                                    </th>
                                    <th style="width: 20%;"
                                        class="text-center text-uppercase text-secondary text-xx font-weight-bolder opacity-7">
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
                                            <span class="text-xs font-weight-bold">  {{ $invitation->university_name . ' - ' . $invitation->university_specialization }} </span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="text-xs font-weight-bold">  {{ $invitation->phone_number }} </span>
                                        </td>
                                        <td class="align-middle">

                                            <div class="d-flex justify-content-center">
                                                <a class="mx-2" href="{{ route('admin.visitors.show', ['id' => $invitation->id]) }}" title="أظهر البيانات">
                                                    <i class="material-icons opacity-10">visibility</i>
                                                </a>
                                                <a class="mx-2"title="حذف" href="#" data-bs-toggle="modal"
                                                   data-bs-target="#deleteInvitationModal-{{$invitation->id}}">
                                                    <i class="material-icons opacity-10">delete</i>
                                                </a>
                                            </div>

                                            @include('admin.remove-invite-modal')
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                        @if(!count($invitations))
                           <div class="d-flex justify-content-center">
                               لا يوجد بيانات
                           </div>
                        @endif

                        {{ $invitations->links() }}

                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
