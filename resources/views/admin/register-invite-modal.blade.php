<!-- Modal -->
<div class="modal fade" id="exampleModal-{{ $invitation->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="overflow-y: auto;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ارسال الدعوات</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p><strong>اسم
                                المسؤول:</strong> {{ $invitation->first_name }} {{ $invitation->second_name }}</p>
                    </div>
                    <div class="col-12">
                        <p><strong>البريد الإلكتروني:</strong> {{ $invitation->email }}</p>
                    </div>

                    <div class="d-flex justify-content-between">
                        <p><strong>حالة الدعوة</strong> {{ $invitation->is_invited ? 'تم الدعوة' : 'لم يتم الدعوة' }}
                        </p>

                        <div>
                            <button class="btn btn-primary register-invitation" data-id="{{ $invitation->id }}" data-type="OWNER">ارسال الدعوة</button>
                        </div>
                    </div>


                    @if ($invitation->students->isNotEmpty())
                        @foreach ($invitation->students as $index => $student)
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <!-- Student Information -->
                                        <p><strong>الاسم:</strong>
                                            <br> {{ $student->first_name }} {{ $student->second_name }} {{ $student->sur_name }}
                                        </p>
                                        <p><strong>البريد الإلكتروني:</strong> <br> {{ $student->email }}</p>

                                        <p>
                                            <strong>حالة
                                                الدعوة</strong> {{ $student->is_invited ? 'تم الدعوة' : 'لم يتم الدعوة' }}
                                        </p>

                                        <div>
                                            <button class="btn btn-primary register-invitation" data-id="{{ $student->id }}" data-type="STUDENT">ارسال الدعوة</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-center">لا توجد تفاصيل للطلاب.</p>
                    @endif

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
            </div>

        </div>
    </div>
</div>
