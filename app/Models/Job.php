<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'job_vacancies';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

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

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function applicants(){
        return $this->hasMany(JobApplication::class, 'job_id', 'id');
    }

    public function skills(){
        return $this->hasMany(JobSkill::class, 'job_id', 'id');
    }
}
