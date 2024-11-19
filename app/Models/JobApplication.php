<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $table = 'job_applications';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public $incrementing = true;
    public $timestamps = true;
    protected $primaryKey = 'id';

    public function job(): BelongsTo{
        return $this->belongsTo(Job::class);
    }

    public function applier(): BelongsTo{
        return $this->belongsTo(Applier::class);
    }
}
