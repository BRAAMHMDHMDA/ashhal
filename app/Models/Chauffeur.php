<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Chauffeur extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const STATUS_DRAFT = 'draft';

    protected $appends = ['image_path'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'phone', 'DOB', 'email', 'password', 'status', 'image'
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
        'created_at' => 'datetime',
//        'DOB' => 'age',
    ];

    public function getImagePathAttribute()
    {
        return asset('media/' . $this->image);
    }

    /**
     * Accessor for Age.
     */
    public function age()
    {
        return Carbon::parse($this->attributes['DOB'])->age;
    }

    public static function validateRules($id){
        return [
            'name' => ['required','min:3'],
            'username' => ['required','min:3',Rule::unique('chauffeurs', 'username')->ignore($id)],
            'image' => 'nullable|image',
            'phone' => 'nullable|string|min:6|max:20',
            'DOB' => 'nullable',
            'email' => 'nullable|email',
            'password' => 'sometimes|min:6|confirmed',
            'status' => 'in:' . self::STATUS_ACTIVE . ',' . self::STATUS_DRAFT,
        ];
    }
}

