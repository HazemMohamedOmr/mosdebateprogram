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
                                            <span
                                                class="text-xs font-weight-bold">  {{ $invitation->university_name . ' - ' . $invitation->university_specialization }} </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                                            <span
                                                class="text-xs font-weight-bold">  {{ $invitation->phone_number }} </span>
                    </td>
                    <td class="align-middle">

                        <div class="d-flex justify-content-center">
                            <a class="mx-2" title="أظهر البيانات"
                               href="{{ route('admin.register.show', ['id' => $invitation->id]) }}">
                                <i class="material-icons opacity-10">visibility</i>
                            </a>

                        </div>
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

