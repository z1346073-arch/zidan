<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $table = 'destinations';

    protected $fillable = [
        'name',
        'description',
        'location',
        'working_day',
        'working_hours',
        'ticket_price',
    ];

    protected $casts = [
        'ticket_price' => 'integer',
    ];

    public function attractions()
    {
        return $this->hasMany(Attraction::class);
    }




}




