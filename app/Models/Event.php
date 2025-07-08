<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'start',
        'end',
        'all_day',
        'background_color',
        'border_color',
        'text_color',
        'extended_props',
    ];

    protected $casts = [
        'all_day' => 'boolean',
        'extended_props' => 'array',
    ];
}
