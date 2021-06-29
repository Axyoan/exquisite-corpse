<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Drawing;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller 
{
    public function index()
    {
        $stories = Story::where('isFinished', true)->get();
        $drawings = Drawing::where('isFinished', true)->get();
        return view('welcome', compact('stories', 'drawings'));
    }
}
