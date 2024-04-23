<?php

namespace App\Http\Controllers;

class AdminPagesController extends Controller
{
    public function admin()
    {
        return view('pages.admin.admin');
    }
}
