<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    use HasFactory;
    protected $table = 'experience';

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected function casts(): array{
        return [
            'applier_id' => 'string',
        ];
    }

    public function applier(): BelongsTo {
        return $this->belongsTo(Applier::class);
    }
}
