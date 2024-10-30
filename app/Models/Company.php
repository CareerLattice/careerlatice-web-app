<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
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

    public function jobs(){
        return $this->hasMany(Job::class, 'company_id', 'id');
    }
}