<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'website',
    ];

    public function getLogoUrlAttribute()
    {
        return \Storage::disk('images')->url($this->logo);
    }
}
