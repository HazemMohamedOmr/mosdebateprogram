<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invitations extends Model
{
    protected $fillable = [
        'first_name', 'second_name', 'sur_name', 'age_range', 'national_id',
        'email', 'phone_number', 'university_name', 'university_specialization', 'team_leader',
        'graduation_date', 'heard_about', 'reason_participation', 'attended', 'invitation_key', 'type'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // Generate unique invitation_key before saving
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($formEntry) {
            $formEntry->invitation_key = self::generateUniqueKey();
        });
    }

    public static function generateUniqueKey()
    {
        do {
            $key = Str::random(16);
        } while (self::where('invitation_key', $key)->exists());

        return $key;
    }
}
