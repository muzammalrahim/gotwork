<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'email_verified_at',
        'profile_photo_url',
        'profile_photo',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





    /* Start: Foreign Key Relationships */
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }


    public function reviews()
    {
        return $this->hasMany(Review::class,'user_id')->orderBy('id','DESC');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class,'user_id')->orderBy('id','DESC');
    }

    public function educations()
    {
        return $this->hasMany(Education::class,'user_id')->orderBy('id','DESC');
    }
    /* End: Foreign Key Relationships */
}
