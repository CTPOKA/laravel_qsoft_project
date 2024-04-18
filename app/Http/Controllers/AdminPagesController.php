<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function admin()
    {
        return view('pages.admin.admin');
    }
}
