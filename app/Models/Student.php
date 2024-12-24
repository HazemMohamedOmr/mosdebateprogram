<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'form_entry_id', 'first_name', 'second_name', 'sur_name', 'gender',
        'personal_photo', 'age_range', 'national_id', 'email', 'phone_number',
        'study_year_program', 'experience'
    ];

    public function Invitations()
    {
        return $this->belongsTo(Invitations::class);
    }
}
