<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'items' => 'array'
    ]; // Dizendo para a Model considerar items como array e não string

    protected $dates = ['date'];

    public function user()
    {
        return $this->belongsTo('App/Models/User');
    }
}