<!-- First, Second and Sur name in One Row -->
<div class="row mb-3">
    <div class="col-md-4">
        <div class="input-group has-validation">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <div class="form-floating">
                <input type="text" id="first_name_{{ $studentIndex }}" name="students[{{ $studentIndex }}][first_name]" value="{{ old('students.' . $studentIndex . '.first_name') }}" class="form-control" placeholder="الاسم الأول" required>
                <label for="first_name_{{ $studentIndex }}">الاسم الأول <span class="mandatory">*</span></label>
            </div>
            <div class="invalid-feedback text-right">الرجاء إدخال الاسم الأول.</div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="input-group has-validation">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <div class="form-floating">
                <input type="text" id="second_name_{{ $studentIndex }}" name="students[{{ $studentIndex }}][second_name]" value="{{ old('students.' . $studentIndex . '.second_name') }}" class="form-control" placeholder="الاسم الثاني" required>
                <label for="second_name_{{ $studentIndex }}">الاسم الثاني <span class="mandatory">*</span></label>
            </div>
            <div class="invalid-feedback text-right">الرجاء إدخال الاسم الثاني.</div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="input-group has-validation">
            <span class="input-group-text"><i class="fas fa-user"></i></span>
            <div class="form-floating">
                <input type="text" id="sur_name_{{ $studentIndex }}" name="students[{{ $studentIndex }}][sur_name]" value="{{ old('students.' . $studentIndex . '.sur_name') }}" class="form-control" placeholder="اسم العائلة" required>
                <label for="sur_name_{{ $studentIndex }}">اسم العائلة <span class="mandatory">*</span></label>
            </div>
            <div class="invalid-feedback text-right">الرجاء إدخال اسم العائلة.</div>
        </div>
    </div>

</div>

<!-- Gender -->
<div class="form-group mb-3">
    <div class="input-group has-validation">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        <div class="form-floating">
            <select id="gender_{{ $studentIndex }}" name="students[{{ $studentIndex }}][gender]"  class="form-select" >
                <option value="" disabled {{ old('students.' . $studentIndex . '.gender') === null ? 'selected' : '' }} selected>الجنس</option>
                <option value="0" {{ old('students.' . $studentIndex . '.gender') == "0" ? 'selected' : '' }}>ذكر</option>
                <option value="1" {{ old('students.' . $studentIndex . '.gender') == "1" ? 'selected' : '' }}>إنثي</option>

            </select>
            <label for="gender_{{ $studentIndex }}">الجنس</label>
        </div>
    </div>
</div>


<!-- Personal Photo -->
<div class="form-group mb-3">
    <label for="personal_photo_{{ $studentIndex }}" class="form-label">الصورة الشخصية *</label>
    <input type="file" id="personal_photo_{{ $studentIndex }}" name="students[{{ $studentIndex }}][personal_photo]" class="form-control" required>
    <small class="form-text text-muted text-right">يرجى رفع صورة بصيغة JPG أو PNG.</small>
</div>

<!-- Age Range -->
<div class="form-group mb-3">
    <div class="input-group has-validation">
        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
        <div class="form-floating">
            <select id="age_range_{{ $studentIndex }}" name="students[{{ $studentIndex }}][age_range]"  class="form-select" required>
                <option value="" disabled {{ old('students.' . $studentIndex . '.age_range') === null ? 'selected' : '' }} selected>اختر الفئة العمرية</option>
                <option value="15-20" {{ old('students.' . $studentIndex . '.age_range') == "15-20" ? 'selected' : '' }}>15-20</option>
                <option value="21-25" {{ old('students.' . $studentIndex . '.age_range') == "21-25" ? 'selected' : '' }}>21-25</option>
                <option value="26-30" {{ old('students.' . $studentIndex . '.age_range') == "26-30" ? 'selected' : '' }}>26-30</option>
                <option value="31-35" {{ old('students.' . $studentIndex . '.age_range') == "31-35" ? 'selected' : '' }}>31-35</option>
                <option value="+36" {{ old('students.' . $studentIndex . '.age_range') == "+36" ? 'selected' : '' }}>+36</option>
            </select>
            <label for="age_range_{{ $studentIndex }}">الفئة العمرية <span class="mandatory">*</span></label>
        </div>
        <div class="invalid-feedback text-right">الرجاء اختيار الفئة العمرية.</div>
    </div>
</div>

<!-- National ID -->
<div class="form-group mb-3">
    <div class="input-group has-validation">
        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
        <div class="form-floating">
            <input type="text" id="national_id_{{ $studentIndex }}" maxlength="10" minlength="10" name="students[{{ $studentIndex }}][national_id]" value="{{ old('students.' . $studentIndex . '.national_id') }}" class="form-control" placeholder="رقم الهوية الوطنية" required>
            <label for="national_id_{{ $studentIndex }}">رقم الهوية الوطنية <span class="mandatory">*</span></label>
        </div>
        <div class="invalid-feedback text-right">الرجاء إدخال رقم الهوية.</div>
    </div>
</div>

<!-- Email -->
<div class="form-group mb-3">
    <div class="input-group has-validation">
        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
        <div class="form-floating">
            <input type="email" id="email_{{ $studentIndex }}" name="students[{{ $studentIndex }}][email]" value="{{ old('students.' . $studentIndex . '.email') }}" class="form-control" placeholder="البريد الإلكترونى" required>
            <label for="email_{{ $studentIndex }}">البريد الإلكترونى  <span class="mandatory">*</span></label>
        </div>
        <div class="invalid-feedback text-right">الرجاء إدخال البريد الإلكترونى.</div>
    </div>
</div>

<!-- Phone Number with Country Code -->
<div class="form-group mb-3">
    <div class="input-group has-validation">
        <div class="form-floating">
            <input type="tel" id="phone_number_{{ $studentIndex }}" name="students[{{ $studentIndex }}][phone_number]" value="{{ old('students.' . $studentIndex . '.phone_number') }}"  placeholder="رقم الهاتف *" class="form-control phone_input" required>
        </div>
        <div class="invalid-feedback text-right">الرجاء إدخال رقم الهاتف.</div>
    </div>
</div>

<!-- Study Year Program -->
<div class="form-group mb-3">
    <div class="input-group has-validation">
        <span class="input-group-text"><i class="fas fa-book"></i></span>
        <div class="form-floating">
            <input type="text" id="study_year_program_{{ $studentIndex }}" name="students[{{ $studentIndex }}][study_year_program]" value="{{ old('students.' . $studentIndex . '.study_year_program') }}"  class="form-control" placeholder="التخصص الجامعي">
            <label for="study_year_program_{{ $studentIndex }}">سنة الدراسة/البرنامج  <span class="mandatory">*</span></label>
        </div>
    </div>
    <div>
        <p class="text-muted pt1">(مثال: السنة الثانية، بكالوريوس العلوم السياسية)</p>
    </div>
</div>

<!-- Experience -->
<div class="form-group mb-3">
    <div class="input-group has-validation">
        <span class="input-group-text"><i class="fas fa-book"></i></span>
        <div class="form-floating">
            <input type="text" id="experience_{{ $studentIndex }}" name="students[{{ $studentIndex }}][experience]" value="{{ old('students.' . $studentIndex . '.experience') }}" class="form-control" placeholder="التخصص الجامعي">
            <label for="experience_{{ $studentIndex }}">الخبرات/الإنجازات السابقة فى المناظرات  </label>
        </div>
    </div>
</div>
