<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Drawing;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $stories = Story::where('isFinished', true)->get();
        $drawings = Drawing::where('isFinished', true)->get();
        return view('welcome', compact('stories', 'drawings'));
    }
}
