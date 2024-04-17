<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.homepage');
    }

    public function inner()
    {
        return view('pages.inner');
    }
}
