<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserHistory extends Model
{
    use HasFactory;

    protected $table = 'user_histories';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public $incrementing = true;
    public $timestamps = true;
    protected $primaryKey = 'id';

    protected $casts = [
        'id' => 'string',
        'user_id' => 'string',
    ];

    public function applier(): BelongsTo{
        return $this->belongsTo(Applier::class);
    }
}
