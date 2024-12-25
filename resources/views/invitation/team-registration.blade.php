@extends('invitation.layouts.app')

@section('content')

    <div class="container pb-5">
        <div class="form-container mx-auto" style="max-width: 700px;">
            <div class="my-5 separator">
                <div class="row">
                    <div
                        class="col-md-4 d-flex justify-content-center align-items-center order-2 order-md-1 mb-4 mb-md-0">
                        <h1 style="font-weight: bold;">
                            نموذج تسجيل الفرق الجامعية
                        </h1>
                    </div>
                    <div class="col-md-8 order-1 order-md-2">
                        <img src="{{ asset('images/public.png') }}" class="img-fluid zoom-image">
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger my-5">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h4 class="text-right mb-4">معلومات المسؤول الشخصية</h4>

            <!-- Form -->
            <form id="invitationForm" action="{{ route('team-invitation-submit') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf

                <!-- University Name -->
                <div class="form-group mb-3">
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-building"></i></span>
                        <div class="form-floating">
                            <input type="text" id="university_name" name="university_name"
                                   value="{{ old('university_name') }}" class="form-control" placeholder="اسم الجامعة">
                            <label for="university_name">اسم الجامعة <span class="mandatory">*</span></label>
                        </div>
                    </div>
                </div>

                <!-- First, Second name in One Row -->
                <div class="row mb-3">
                    <label class="py-2" for="">اسم الشخص المسؤول ( الاتصال الرئيسي )</label>
                    <div class="col-md-6">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <div class="form-floating">
                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                       class="form-control" placeholder="الاسم الأول" required>
                                <label for="first_name">الاسم الأول <span class="mandatory">*</span></label>
                            </div>
                            <div class="invalid-feedback text-right">الرجاء إدخال الاسم الأول.</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <div class="form-floating">
                                <input type="text" id="second_name" name="second_name" value="{{ old('second_name') }}"
                                       class="form-control" placeholder="الاسم الثاني" required>
                                <label for="second_name">الاسم الثاني <span class="mandatory">*</span></label>
                            </div>
                            <div class="invalid-feedback text-right">الرجاء إدخال الاسم الثاني.</div>
                        </div>
                    </div>

                </div>

                <!-- Email -->
                <div class="form-group mb-3">
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <div class="form-floating">
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control"
                                   placeholder="البريد الإلكترونى" required>
                            <label for="email">البريد الإلكترونى للشخص المسؤول <span class="mandatory">*</span></label>
                        </div>
                        <div class="invalid-feedback text-right">الرجاء إدخال البريد الإلكترونى.</div>
                    </div>
                </div>

                <!-- Phone Number with Country Code -->
                <div class="form-group mb-3">
                    <div class="input-group has-validation">
                        <div class="form-floating">
                            <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                                   placeholder="رقم هاتف الشخص المسؤول *" class="form-control phone_input" required>
                        </div>
                        <div class="invalid-feedback text-right">الرجاء إدخال رقم الهاتف.</div>
                    </div>
                </div>

                <!-- University Specialization -->
                <div class="form-group mb-3">
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                        <div class="form-floating">
                            <input type="text" id="university_specialization" name="university_specialization"
                                   value="{{ old('university_specialization') }}" class="form-control"
                                   placeholder="التخصص الجامعي">
                            <label for="university_specialization">اسم القسم/الكلية/البرنامج <span
                                    class="mandatory">*</span></label>
                        </div>
                    </div>
                    <div>
                        <p class="text-muted pt1">(مثال : نادي المناظرات، كلية العلوم السياسية)</p>
                    </div>
                </div>

                <!-- Team Leader -->
                <div class="form-group mb-3">
                    <div class="input-group has-validation">
                        <span class="input-group-text"><i class="fas fa-book"></i></span>
                        <div class="form-floating">
                            <input type="text" id="team_leader" name="team_leader" value="{{ old('team_leader') }}"
                                   class="form-control" placeholder="التخصص الجامعي">
                            <label for="team_leader">اسم قائد الفريق (إذا كان مختلفاً عن الشخض المسؤول)</label>
                        </div>
                    </div>
                </div>

                @for ($i = 1; $i <= 4; $i++)
                    @if($i == 1)
                        <h4 class="text-right mb-4">العضو الأول</h4>
                    @elseif($i == 2)
                        <h4 class="text-right mb-4">العضو الثاني</h4>
                    @elseif($i == 3)
                        <h4 class="text-right mb-4">العضو الثالث</h4>
                    @else
                        <h4 class="text-right mb-4">العضو الرابع</h4>
                    @endif

                    @include('invitation.partials.student_fields', ['studentIndex' => $i]) <!-- Include a student fields partial -->
                @endfor

                <!-- Heard About Section -->
                <div class="form-group mb-3">
                    <label class="form-label">كيف سمعت عن دوري المناظرات؟</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input heard_about" id="social_media"
                               value="وسائل التواصل الاجتماعي" name="heard_about[]">
                        <label class="form-check-label" for="social_media">وسائل التواصل الاجتماعي</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input heard_about" id="email_ads"
                               value="البريد الإلكتروني" name="heard_about[]">
                        <label class="form-check-label" for="email_ads">البريد الإلكتروني</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input heard_about" id="friends" value="الأصدقاء"
                               name="heard_about[]">
                        <label class="form-check-label" for="friends">الأصدقاء</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input heard_about" id="heard_other">
                        <label class="form-check-label" for="other">أخرى ( يرجى التحديد )</label>
                    </div>
                    <!-- Input for "Other" option -->
                    <div id="heardOtherInputContainer" class="mt-2" style="display: none;">
                        <input type="text" id="heardOtherInput" class="form-control"
                               placeholder="أخرى">

                    </div>
                </div>

                <!-- Reason Participation Section -->
                <div class="form-group mb-4">
                    <label class="form-label">لماذا لديك الرغبة بالحضور؟</label>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input reason_participation" id="academic_test"
                               value="الاهتمام الأكاديمي" name="reason_participation[]">
                        <label class="form-check-label" for="academic_test">الاهتمام الأكاديمي</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input reason_participation" id="personal_interest"
                               value="الاهتمام الشخصي بالمناظرات" name="reason_participation[]">
                        <label class="form-check-label" for="personal_interest">الاهتمام الشخصي بالمناظرات</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input reason_participation" id="networking"
                               value="فرصة للتواصل وبناء علاقات" name="reason_participation[]">
                        <label class="form-check-label" for="networking">فرصة للتواصل وبناء علاقات</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input reason_participation" id="networking"
                               value="متطلبات الفريق/الجامع" name="reason_participation[]">
                        <label class="form-check-label" for="networking">متطلبات الفريق/الجامعة</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input reason_participation" id="reason_other">
                        <label class="form-check-label" for="reason_other">أخرى ( يرجى التحديد )</label>
                    </div>
                    <!-- Input for "Other" option -->
                    <div id="reasonOtherInputContainer" class="mt-2" style="display: none;">
                        <input type="text" id="reasonOtherInput" class="form-control"
                               placeholder="اخرى">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-paper-plane"></i> إرسال
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
