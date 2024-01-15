<?php

namespace App\Models\Consern;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid(){

        static::creating(fn (Model $model) => $model->uuid = Str::uuid()->toString());

    }
}


?>