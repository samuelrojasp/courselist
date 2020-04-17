<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'last_name',
        'age',
        'course_id'
    ];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
