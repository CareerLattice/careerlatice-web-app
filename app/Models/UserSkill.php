<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasFactory;

    protected $table = 'user_skills';
    
    protected $guarded = [];
    public $incrementing = true;
    public $timestamps = true;

    protected $casts = [
        'user_id' => 'string',
        'skill_id' => 'string',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function skill(){
        return $this->belongsTo(Skill::class);
    }
}
