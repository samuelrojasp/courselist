<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'rut',
        'name',
        'last_name',
        'age',
        'course_id'
    ];

    protected $dates = [];

    public static $putRules = [
        'rut' => 'unique:students|cl_rut|max:9',
        'name' => 'alpha',
        'last_name' => 'alpha',
        'age' => 'integer|gte:18',
        'course_id' => 'exists:courses,id'
    ];

    public static $postRules = [
        'rut' => 'required|unique:students|cl_rut|max:9',
        'name' => 'required|alpha',
        'last_name' => 'required|alpha',
        'age' => 'required|integer|gte:18',
        'course_id' => 'exists:courses,id'
    ];

    public static $customMessages = [
        'cl_rut' => 'rut is not valid',
        'exists' => 'the specified course id does not exist'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
