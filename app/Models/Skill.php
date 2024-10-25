<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    public $incrementing = true;
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'string',
        'user_id' => 'string',
    ];

    public function userSkill(){
        return $this->hasMany(UserSkill::class, 'skill_id', 'id');
    }
}
