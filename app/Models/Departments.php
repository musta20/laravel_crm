<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Departments
 *
 * @method static \Database\Factories\DepartmentsFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Departments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Departments onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Departments query()
 * @method static \Illuminate\Database\Eloquent\Builder|Departments withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Departments withoutTrashed()
 * @mixin \Eloquent
 */
class Departments extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'company_id',
        'uuid'
    ];
};
