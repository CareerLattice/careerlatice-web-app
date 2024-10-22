<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone_number',
        'description',
        'logo',
        'field',
        'location',
        'password',
        'is_active',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    
    protected $guarded = [];

    protected $casts = [
        'id' => 'string',
        'is_active' => 'boolean',
    ];

    public $timestamps = true;
    protected $primaryKey = 'id';
    public $incrementing = false;

    // Method untuk mendefinisikan relasi one-to-many dengan model Job
    public function jobs(){
        return $this->hasMany(Job::class, 'company_id', 'id');
    }
}