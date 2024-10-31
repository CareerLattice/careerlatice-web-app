<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobSkill extends Model
{
    use HasFactory;

    protected $table = 'job_skills';
    protected $primaryKey = 'id';
    public $incrementing = true;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function job(): BelongsTo{
        return $this->belongsTo(Job::class);
    }

    public function skill(): BelongsTo{
        return $this->belongsTo(Skill::class);
    }
}
