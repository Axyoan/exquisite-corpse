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
        $stories = Story::where('isFinished', true)->get()->all();
        $drawings = Drawing::where('isFinished', true)->get()->all();
        foreach ($stories as $story) {
            $story->type = "story";
        }
        foreach ($drawings as $drawing) {
            $drawing->type = "drawing";
        }
        $all_posts = array_merge($stories, $drawings);
        return view('welcome', compact('all_posts'));
    }
}
