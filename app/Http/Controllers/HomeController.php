<?php

namespace App\Http\Controllers;

use App\Tutors;

class HomeController extends Controller
{
    public function show()
    {
        return view('pages.home', ['tutors' => Tutors::all()]);
    }
}
