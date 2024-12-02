<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSkill extends Model
{
    use HasFactory;

    protected $table = 'user_skills';
    protected $guarded = [];

    public function applier(): BelongsTo{
        return $this->belongsTo(Applier::class);
    }

    public function skill(): BelongsTo{
        return $this->belongsTo(Skill::class);
    }
}
