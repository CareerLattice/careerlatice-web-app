<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $guarded = [
        'id',
    ];

    public $incrementing = true;
    protected $primaryKey = 'id';

    public function userSkill(): HasMany{
        return $this->hasMany(UserSkill::class, 'skill_id', 'id');
    }

    public function jobSkill(): HasMany{
        return $this->hasMany(JobSkill::class,'skill_id', 'id');
    }
}
