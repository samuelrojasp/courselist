<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'code'
     ];

    protected $dates = [];

    public static $putRules = [
        'code' => 'unique:courses|max:4'
    ];

    public static $postRules = [
        'name' => 'required',
        'code' => 'required|unique:courses|max:4'
    ];

    public static $customMessages = [
        // ...
    ];

    public function people()
    {
        return $this->hasMany('App\Person');
    }
}
