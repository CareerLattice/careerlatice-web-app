<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{
    use HasFactory;

    protected $table = 'job_skills';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $guarded = [
        'id',
    ];

    public function job(){
        return $this->belongsTo(Job::class);
    }

    public function skill(){
        return $this->belongsTo(Skill::class);
    }
}
