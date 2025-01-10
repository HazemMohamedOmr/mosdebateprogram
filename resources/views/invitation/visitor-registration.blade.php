@extends('invitation.layouts.app')

@section('content')

    @if(!$formClosed)
        <div class="container pb-5">
            <div class="form-container mx-auto" style="max-width: 700px;">
                <div class="my-5 separator">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center align-items-center order-2 order-md-1 mb-4 mb-md-0">
                            <h1 style="font-weight: bold;">
                                نموذج حضور
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

                <h4 class="text-right mb-4">المعلومات الشخصية</h4>

                <!-- Form -->
                <form id="invitationForm" action="{{ route('visitor-invitation-submit') }}" method="POST" novalidate>
                    @csrf

                    <!-- First, Second, and Surname in One Row -->
                    <div class="row mb-3">
                        <div class="col-md-4">
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

                        <div class="col-md-4">
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

                        <div class="col-md-4">
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <div class="form-floating">
                                    <input type="text" id="surname" name="sur_name" value="{{ old('sur_name') }}"
                                           class="form-control" placeholder="اسم العائلة" required>
                                    <label for="surname">اسم العائلة <span class="mandatory">*</span></label>
                                </div>
                                <div class="invalid-feedback text-right">الرجاء إدخال اسم العائلة.</div>
                            </div>
                        </div>
                    </div>

                    <!-- Age Range -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <div class="form-floating">
                                <select id="age_range" name="age_range" class="form-select" required>
                                    <option value="" disabled selected>اختر الفئة العمرية</option>
                                    <option value="15-20">15-20</option>
                                    <option value="21-25">21-25</option>
                                    <option value="26-30">26-30</option>
                                    <option value="31-35">31-35</option>
                                    <option value="+36">+36</option>
                                </select>
                                <label for="age_range">الفئة العمرية <span class="mandatory">*</span></label>
                            </div>
                            <div class="invalid-feedback text-right">الرجاء اختيار الفئة العمرية.</div>
                        </div>
                    </div>

                    <!-- Nationality -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            <div class="form-floating">
                                <input type="text" id="nationality" name="nationality"
                                       value="{{ old('nationality') }}" class="form-control"
                                       placeholder="الجنسية" required>
                                <label for="nationality">الجنسية <span class="mandatory">*</span></label>
                            </div>
                            <div class="invalid-feedback text-right">الرجاء إدخال الجنسية.</div>
                        </div>
                    </div>

                    <!-- Card Type -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                            <div class="form-floating">
                                <select id="card_type" name="card_type" class="form-select" required>
                                    <option value="" disabled selected>اختر نوع البطاقة</option>
                                    <option value="0">بطاقة الهوية الوطنية</option>
                                    <option value="1 ">جواز السفر</option>
                                </select>
                                <label for="card_type">نوع البطاقة <span class="mandatory">*</span></label>
                            </div>
                            <div class="invalid-feedback text-right">الرجاء اختيار نوع البطاقة.</div>
                        </div>
                    </div>


                    <!-- National ID -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            <div class="form-floating">
                                <input type="text" id="national_id" name="national_id"
                                       value="{{ old('national_id') }}" class="form-control"
                                       placeholder="رقم الهوية الوطنية/ رقم الجواز" required>
                                <label for="national_id">رقم الهوية الوطنية/ رقم الجواز <span class="mandatory">*</span></label>
                            </div>
                            <div class="invalid-feedback text-right">الرجاء إدخال رقم الهوية/ رقم الجواز.</div>
                        </div>
                    </div>

                    <!--Region -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            <div class="form-floating">
                                <input type="text" id="region" name="region"
                                       value="{{ old('region') }}" class="form-control"
                                       placeholder="المنطقة" required>
                                <label for="region">المنطقة <span class="mandatory">*</span></label>
                            </div>
                            <div class="invalid-feedback text-right">الرجاء إدخال المنطقة.</div>
                        </div>
                    </div>

                    <!-- City -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            <div class="form-floating">
                                <input type="text" id="city" name="city"
                                       value="{{ old('city') }}" class="form-control"
                                       placeholder="المدينة" required>
                                <label for="city">المدينة <span class="mandatory">*</span></label>
                            </div>
                            <div class="invalid-feedback text-right">الرجاء إدخال المدينة.</div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <div class="form-floating">
                                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control"
                                       placeholder="البريد الإلكترونى" required>
                                <label for="email">البريد الإلكترونى <span class="mandatory">*</span></label>
                            </div>
                            <div class="invalid-feedback text-right">الرجاء إدخال البريد الإلكترونى.</div>
                        </div>
                    </div>


                    <!-- Phone Number with Country Code -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <div class="form-floating">
                                <input type="tel" id="phone_number" name="phone_number" value="{{ old('phone_number') }}"
                                       placeholder="رقم الهاتف *" class="form-control phone_input" required>
                            </div>
                            <div class="invalid-feedback text-right">الرجاء إدخال رقم الهاتف.</div>
                        </div>
                    </div>

                    <!-- Academic Qualifications -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            <div class="form-floating">
                                <input type="text" id="academic_qualifications" name="academic_qualifications"
                                       value="{{ old('academic_qualifications') }}" class="form-control" placeholder="المؤهلات العلمية" required>
                                <label for="academic_qualifications">المؤهلات العلمية <span class="mandatory">*</span></label>
                            </div>
                        </div>
                    </div>

                    <!-- University Name -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            <div class="form-floating">
                                <input type="text" id="university_name" name="university_name"
                                       value="{{ old('university_name') }}" class="form-control" placeholder="اسم الجامعة" required>
                                <label for="university_name">اسم الجامعة <span class="mandatory">*</span></label>
                            </div>
                        </div>
                    </div>

                    <!-- University Specialization -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-book"></i></span>
                            <div class="form-floating">
                                <input type="text" id="university_specialization" name="university_specialization"
                                       value="{{ old('university_specialization') }}" class="form-control"
                                       placeholder="التخصص الجامعي" required>
                                <label for="university_specialization">التخصص الجامعي <span class="mandatory">*</span></label>
                            </div>
                        </div>
                    </div>

                    <!-- Employer -->
                    <div class="form-group mb-3">
                        <div class="input-group has-validation">
                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                            <div class="form-floating">
                                <input type="text" id="employer" name="employer"
                                       value="{{ old('employer') }}" class="form-control" placeholder="جهة العمل" required>
                                <label for="employer">جهة العمل <span class="mandatory">*</span></label>
                            </div>
                        </div>
                    </div>

                    <!-- Graduation Date -->
{{--                    <div class="form-group mb-3">--}}
{{--                        <div class="input-group has-validation">--}}
{{--                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>--}}
{{--                            <div class="form-floating">--}}
{{--                                <input type="text" id="graduation_date" name="graduation_date"--}}
{{--                                       value="{{ old('graduation_date') }}" class="form-control month-year-picker"--}}
{{--                                       placeholder="اختر التاريخ" required>--}}
{{--                                <label for="graduation_date">سنة الدراسة</label>--}}
{{--                            </div>--}}
{{--                            <div class="invalid-feedback text-right">الرجاء اختيار تاريخ التخرج.</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

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
    @endif

    @if ($formClosed)
        <div class="d-flex justify-content-center align-items-center vh-100">
            <img src="{{ asset('images/public.png') }}" alt="Logo">
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @if ($formClosed)
                Swal.fire({
                    imageUrl: "{{ asset('images/public.png') }}",
                    imageWidth: 200,
                    title: 'النموذج مغلق',
                    text: 'عذراً، نموذج الحضور مغلق حالياًً.',
                    confirmButtonText: 'حسنًا',
                    didOpen: () => {
                        // Add transform scale effect using CSS
                        const image = document.querySelector('.swal2-image');
                        if (image) {
                            image.style.transform = 'scale(1.7)';
                        }
                    }
                });
                @endif
            });
        </script>
    @endif


@endsection
