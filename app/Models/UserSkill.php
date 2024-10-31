<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserSkill extends Model
{
    use HasFactory;

    protected $table = 'user_skills';
    protected $guarded = [
        'id',
    ];
    
    public $incrementing = true;
    public $timestamps = true;

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function skill(): BelongsTo{
        return $this->belongsTo(Skill::class);
    }
}
