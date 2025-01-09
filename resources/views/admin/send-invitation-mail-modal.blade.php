<!-- Modal -->
<div class="modal fade" id="sendInvitationMail-{{$invitation->id}}" tabindex="-1" aria-labelledby="sendInvitationMail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content" style="overflow-y: auto;">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="sendInvitationMail">إعادة إرسال الدعوة</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">هل أنت متأكد من أنك تريد إعادة إرسال الدعوة الخاصة بـ
                    <strong> {{ $invitation->first_name }} {{ $invitation->second_name }} {{ $invitation->sur_name }} </strong>؟</p>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <a type="button" class="btn btn-primary"
                   href="">نعم</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">لا</button>
            </div>
        </div>
    </div>
</div>
