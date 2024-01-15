<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JobTitle
 *
 * @method static \Database\Factories\JobTitleFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobTitle query()
 * @mixin \Eloquent
 */
class JobTitle extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'name'
    ];

}
