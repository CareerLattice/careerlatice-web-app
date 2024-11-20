<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'companies';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
    ];

    protected function casts(): array{
        return [
            'password' => 'hashed',
        ];
    }

    public $timestamps = true;
    public $incrementing = true;
    protected $primaryKey = 'id';

    public function jobs(): HasMany {
        return $this->hasMany(Job::class, 'company_id', 'id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
