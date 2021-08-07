<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * Get the creator of the background if it's custom.
     */
    public function creator()
    {
        return $this->hasOne(User::class) ?? null;
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }
}
