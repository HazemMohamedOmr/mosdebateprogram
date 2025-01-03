<?php

namespace App\Models;

use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    protected $fillable = [
        'form_entry_id', 'first_name', 'second_name', 'sur_name', 'gender',
        'personal_photo', 'age_range', 'national_id', 'email', 'phone_number',
        'study_year_program', 'experience', 'invitation_key', 'is_invited',
        'attend', 'attendance_dates',
    ];

    protected $casts = [
        'attendance_dates' => 'json'
    ];

    public function Invitations()
    {
        return $this->belongsTo(Invitations::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($formEntry) {
            $formEntry->invitation_key = self::generateUniqueKey();
        });
    }

    public static function generateUniqueKey(): string
    {
        do {
            $key = Uuid::uuid() . Str::random(16);
            $key = strtoupper($key);
        } while (self::where('invitation_key', $key)->exists());

        return $key;
    }

}
