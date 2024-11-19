<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $timestamps = true;
    public $incrementing = true;
    protected $primaryKey = 'id';

    protected $table = 'users';
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array{
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function company(): HasOne{
        return $this->hasOne(Company::class,'user_id','id');
    }

    public function applier(): HasOne{
        return $this->hasOne(Applier::class,'user_id','id');
    }
}
