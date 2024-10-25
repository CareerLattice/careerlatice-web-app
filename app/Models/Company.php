<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $guarded = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    public $timestamps = true;
    public $incrementing = true;
    protected $primaryKey = 'id';

    // Method untuk mendefinisikan relasi one-to-many dengan model Job
    public function jobs(){
        return $this->hasMany(Job::class, 'company_id', 'id');
    }
}