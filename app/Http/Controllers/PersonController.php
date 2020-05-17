<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    const MODEL = "App\Person";

    use RESTActions;
}
