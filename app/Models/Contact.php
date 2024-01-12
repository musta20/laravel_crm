<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'first_name',
        'uuid',
        'middle_name',
        'last_name',
        'preferred_name',
        'email',
        'phone'
    ];

}
