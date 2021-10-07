<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Validation\Rule;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT = 'draft';

    protected $appends = ['image_path'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'phone', 'email', 'password', 'status', 'image'
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

    public function getImagePathAttribute()
    {
        return asset('media/' . $this->image);
    }

    public static function validateRules($id){
        return [
            'name' => ['required','min:3'],
            'username' => ['required','min:3',Rule::unique('users', 'username')->ignore($id)],
            'image' => 'nullable|image',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required|array|exists:roles,id',
            'status' => 'in:' . self::STATUS_ACTIVE . ',' . self::STATUS_DRAFT,
        ];
    }
}
