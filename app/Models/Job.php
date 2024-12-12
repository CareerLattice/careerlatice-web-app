<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'job_vacancies';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function casts(): array{
        return [
            'is_active' => 'boolean',
        ];
    }

    public function company(): BelongsTo{
        return $this->belongsTo(Company::class);
    }

    public function applicants(): HasMany{
        return $this->hasMany(JobApplication::class, 'job_id', 'id');
    }
}
