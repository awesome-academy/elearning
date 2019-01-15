<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function home()
    {
        return view('homepages.homepage');
    }

    public function course()
    {
        return view('homepages.course');
    }

    public function discussion()
    {
        return view('homepages.discussion');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
}
