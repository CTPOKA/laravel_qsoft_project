<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.homepage');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function sale()
    {
        return view('pages.sale');
    }

    public function finance()
    {
        return view('pages.finance');
    }

    public function clients()
    {
        return view('pages.clients');
    }
}
