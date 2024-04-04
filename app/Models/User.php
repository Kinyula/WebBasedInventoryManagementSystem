<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'profile_image'
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

    public static function search($search)
    {
        if (auth()->user()->role_id === '0') {

            return empty($search) ? static::query() : static::query()

                ->where("email", "ILIKE", "%$search%")
                ->where('role_id', '=', '1')

                ->orWhere("username", "ILIKE", "%$search%");
        } elseif (auth()->user()->role_id === '1') {
            return empty($search) ? static::query() : static::query()

                ->where("email", "ILIKE", "%$search%")
                ->where('role_id', '=', '2')

                ->orWhere("username", "ILIKE", "%$search%");
        }
    }


    public function phone()
    {
        return $this->hasMany(PhoneNumber::class);
    }

    public function resources()
    {
        return $this->hasMany(ResourceAllocation::class);
    }

    public function resources_to_college()
    {
        return $this->hasMany(ResourceAllocationToCollege::class);
    }

    public function civeResources()
    {
        return $this->hasMany(CiveResource::class);
    }

    public function cnmsResources()
    {
        return $this->hasMany(CnmsResource::class);
    }

    public function chssResources()
    {
        return $this->hasMany(ChssResource::class);
    }

    public function cobeResources()
    {
        return $this->hasMany(CoBEResource::class);
    }

    public function sendingReports()
    {
        return $this->hasMany(SendingReport::class);
    }

    public function repliesReports()
    {
        return $this->hasOne(Replies::class);
    }
}
