<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array{
        return [
            'applier_id' => 'string',
            'is_active' => 'boolean',
        ];
    }

    public function applier(): BelongsTo {
        return $this->belongsTo(Applier::class);
    }
}
