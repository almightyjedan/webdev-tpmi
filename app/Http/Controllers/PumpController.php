<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PumpController extends Controller
{
    public function index()
    {
        return view('pumpselector.index');
    }

    public function cenO()
    {
        return view('pumpselector.cen-o');
    }

    public function cenSv()
    {
        return view('pumpselector.cen-sv');
    }
}