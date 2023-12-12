<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TestingDBController extends Controller
{
    public function index() {

        // license-key: 8-4-4-4-19
        $string = Str::random(8) . "-" . Str::random(4) . "-" . Str::random(4) . "-" . Str::random(4) .  "-" . Str::random(19);

        return Str::lower($string);
    }
}

