<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function service() {
        return view('pages.service');
    }

    public function about() {
        return view('pages.about');
    }
}
