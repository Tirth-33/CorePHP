<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function test1() {
        
        return view('index');
    }

    // public function index()
    // {
    //     return view('template.index');
    // }

    public function index()
    {
        return view('pod-talk.index');
    }

    public function about()
    {
        return view('pod-talk.about');
    }
}
