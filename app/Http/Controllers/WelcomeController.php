<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //retrieve value
    public function welcome($name)
    {
        return "Welcome, " . $name . "!";
    }
}
