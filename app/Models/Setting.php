<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value'];

    protected $casts = [
        'value' => 'string',
    ];

    public static function isFormOpen($formKey)
    {
        return self::where('key', $formKey)->value('value') ?? false;
    }
}
