<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'phone_number',
        'address',
        'description',
        'birth_date',
        'start_date_premium',
        'end_date_premium',
        'profile_picture',
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

    public $timestamps = true;
    public $incrementing = true;
    protected $primaryKey = 'id';

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

    public function userHistories(){
        return $this->hasMany(UserHistory::class, 'user_id', 'id');
    }

    public function jobApplications(){
        return $this->hasMany(JobApplication::class, 'user_id', 'id');  
    }

    public function educations(){
        return $this->hasMany(Education::class, 'user_id', 'id');
    }

    public function userSkills(){
        return $this->hasMany(UserSkill::class, 'user_id', 'id');
    }
}
