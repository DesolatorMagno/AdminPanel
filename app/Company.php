<?php

namespace App;

use App\Traits\ModelFileManager;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use ModelFileManager;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'website',
    ];

    Protected $disk = 'images';

    public function getLogoUrlAttribute()
    {
        return \Storage::disk('images')->url($this->logo);
    }

    public function employees()
    {
        return $this->hasMany('App\Employee');
    }

    public function employeesCount()
    {
        return $this->employees()->count();
    }

    public function claseName()
    {
        return "class_basename($this)";
    }
}
