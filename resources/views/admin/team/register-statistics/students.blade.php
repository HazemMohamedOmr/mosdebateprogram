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
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">
                                    {{ $student->first_name . ' ' . $student->second_name . ' ' . $student->sur_name }}
                                </h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold">  {{ $student->email }} </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold">  {{ ($student->Invitations->university_name ?? '') . ' - ' . ($student->Invitations->university_specialization ?? '') }} </span>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold">  {{ $student->phone_number }} </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if(!count($students))
        <div class="d-flex justify-content-center">
            لا يوجد بيانات
        </div>
    @endif

    {{ $students->links() }}

</div>

