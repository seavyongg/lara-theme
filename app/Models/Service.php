<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //fillable
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'color',
        'order',
    ];
}
