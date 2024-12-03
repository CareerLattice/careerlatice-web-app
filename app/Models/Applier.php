<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applier extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function userHistories(): HasMany{
        return $this->hasMany(UserHistory::class, 'applier_id', 'id');
    }

    public function jobApplications(): HasMany{
        return $this->hasMany(JobApplication::class, 'applier_id', 'id');
    }

    public function educations(): HasMany{
        return $this->hasMany(Education::class, 'applier_id', 'id');
    }

    public function userSkills(): HasMany{
        return $this->hasMany(UserSkill::class, 'applier_id', 'id');
    }

    public function experiences(): HasMany{
        return $this->hasMany(Experience::class, 'applier_id', 'id');
    }
}
