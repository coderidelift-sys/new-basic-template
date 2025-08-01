<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = ['avatar_url'];

    /**
     * Get the user's avatar.
     *
     * @param string $value
     * @return string
     */
    public function getAvatarUrlAttribute($value): string
    {
        return $this->avatar ? asset($this->avatar) : asset('/materialize/assets/img/avatars/1.png');
    }

    /**
     * The schools that belong to the user.
     */
    public function schools()
    {
        return $this->belongsToMany(School::class, 'admin_schools', 'school_id', 'admin_id');
    }

    /**
     * The teachers that belong to the user.
     */
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}
