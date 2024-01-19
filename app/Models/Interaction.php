<?php

namespace App\Models;

use App\Models\Consern\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Interaction
 *
 * @method static \Database\Factories\InteractionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Interaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Interaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Interaction query()
 * @mixin \Eloquent
 */
class Interaction extends Model
{
    use HasFactory;
    use HasUuid;


    protected $fillable = [
        'uuid',
        'type',
        'content',
        'user_id',
        'contact_id',
        'project_id'
    ];

    public function owner()
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey:'user_id'
        );
    }

    public function contact(){
        return $this->belongsTo(
            related:Contact::class,
            foreignKey:'contact_id'
        );
    }

    public function project(){
        return $this->belongsTo(
            related:Project::class,
            foreignKey:'project_id'
        );
    }


}
