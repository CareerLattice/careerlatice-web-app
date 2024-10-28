<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'job_vacancies';

    protected $fillable = [
        'id',
        'company_id',
        'job_type',
        'title',
        'location',
        'skill_required',
        'description',
        'requirement',
        'person_in_charge',
        'contact_person',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function applicants(){
        return $this->hasMany(JobApplication::class, 'job_id', 'id');
    }
}
