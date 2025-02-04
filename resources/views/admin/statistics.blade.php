<div class="m-2 my-sm-4 ms-sm-4 me-sm-3">
    <div class="">
        <div class="card">
            <div class="card-header pb-0">
                <div class="row mb-3">
                    <div class="col-4 col-md-6 d-flex justify-content-between align-items-center">
                        <h6>الاحصائيات</h6>
                    </div>
                    <div class="col-8 col-md-6 d-flex justify-content-center justify-content-md-between align-items-center flex-wrap">
                        <div class="ms-2">
                            <a class="btn btn-primary btn-icon" href="{{ route('admin.visitors.thanks-mail') }}">
                                <i class="material-icons">mail</i>
                                ارسال شكر للزوار
                            </a>
                        </div>
                        <div class="ms-2">
                            <a class="btn btn-primary btn-icon" href="{{ route('admin.register.thanks-mail') }}">
                                <i class="material-icons">mail</i>
                                ارسال شكر للجامعات
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 pb-2">
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th style=""
                                class="text-center text-uppercase text-secondary text-xx font-weight-bolder opacity-7">
                                التاريخ
                            </th>
                            <th style=""
                                class="text-center text-uppercase text-secondary text-xx font-weight-bolder opacity-7">
                                عدد الزائرين
                            </th>
                            <th style=""
                                class="text-center text-uppercase text-secondary text-xx font-weight-bolder opacity-7">
                                عدد افراد المجموعات
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ranges as $range)
                            <tr>
                                <td class="text-center">
                                    <span class="text-xs font-weight-bold">  {{ $range->date }} </span>
                                </td>
                                <td class="text-center">
                                    <span class="text-xs font-weight-bold">
                                        <a href="{{ route('admin.visitors.statistics', ['date' => $range->date]) }}">
                                            {{ $range->visitors_count }}
                                        </a>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="text-xs font-weight-bold">
                                        <a href="{{ route('admin.register.statistics', ['date' => $range->date]) }}">
                                            {{ $range->team_count }}
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
